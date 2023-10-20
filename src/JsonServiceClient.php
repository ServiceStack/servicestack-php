<?php

namespace ServiceStack;

use Exception;
use JsonSerializable;
use ReflectionClass;
use Stringable;
use Throwable;

function combinePaths($path, ...$paths)
{
    $sb = $path;
    foreach ($paths as $arg) {
        if ($sb[-1] != '/')
            $sb .= '/';
        $sb .= ltrim($arg, '/');
    }
    return $sb;
}

function nameof($request)
{
    if (!isset($request))
        return null;
    if (is_array($request))
        return nameof($request[0]) . "[]";
    if (is_object($request) && method_exists($request, "getTypeName"))
        return $request->getTypeName();
    return get_class($request);
}

function hasRequestBody(string $method): bool
{
    return !($method == "GET" || $method == "DELETE" || $method == "HEAD" || $method == "OPTIONS");
}

function resolveHttpMethod($request): string
{
    if (method_exists($request, 'getMethod'))
        return $request->getMethod();
    if ($request instanceof IGet || $request instanceof QueryBase)
        return HttpMethods::GET;
    if ($request instanceof IPut)
        return HttpMethods::PUT;
    if ($request instanceof IPatch)
        return HttpMethods::PATCH;
    if ($request instanceof IDelete)
        return HttpMethods::DELETE;
    if ($request instanceof IOptions)
        return HttpMethods::OPTIONS;
    return HttpMethods::POST;
}

function resolveResponseType($request): mixed
{
    $response = $request instanceof IReturn
        ? $request->createResponse()
        : null;
    return $response;
}

function parseHeaders(?array $headers): array
{
    $cookies = [];
    $head = [];
    if (isset($headers)) {
        foreach ($headers as $k => $v) {
            $t = explode(':', $v, 2);
            if (isset($t[1])) {
                $key = trim($t[0]);
                $head[$key] = trim($t[1]);
                if ($key == "Set-Cookie") {
                    $cookie = parseCookie($head[$key]);
                    $cookies[$cookie['name']] = $cookie;
                }
            } else {
                $head[] = $v;
                if (preg_match("#HTTP/[0-9\.]+\s+([0-9]+)#", $v, $out))
                    $head['statusCode'] = intval($out[1]);
            }
        }
    }
    return [$head, $cookies];
}

function parseCookie($str)
{
    $cookies = [];
    $tok = strtok($str, ';');
    while ($tok !== false) {
        $a = sscanf($tok, "%[^=]=%[^;]");
        if (empty($cookies)) {
            $cookies['name'] = ltrim($a[0]);
            $cookies['value'] = urldecode($a[1]);
        } else {
            $cookies[ltrim($a[0])] = urldecode($a[1] ?? "");
        }
        $tok = strtok(';');
    }
    return $cookies;
}


/** @throws Exception */
function qsValue($arg): string
{
    if (!isset($arg))
        return "";
    if (is_bool($arg))
        return $arg ? "true" : "false";
    if (is_array($arg)) {
        if (array_is_list($arg))
            return "[" . implode(",", array_map(fn($x): string => qsValue($x), $arg)) . "]";
        return "{" . implode(",",
                array_map(fn($key, $val): string => $key . ":" . qsValue($val), array_keys($arg), $arg))
            . "}";
    }
    if (is_string($arg))
        return urlencode($arg);
    if (is_object($arg)) {
        $cls = get_class($arg);
        $converter = JsonConverters::getConverter($cls);
        if ($converter) {
            $val = $converter->toJson($arg, new TypeContext(class: $cls));
            return qsValue($val);
        }
        if ($arg instanceof JsonSerializable) {
            return qsValue($arg->jsonSerialize());
        }
        if ($arg instanceof Stringable) {
            return urlencode($arg->__toString());
        }
        throw new Exception("Could not convert unknown object '$cls' to string");
    }
    return urlencode("$arg");
}

/** @throws Exception */
function appendQueryString(string $url, mixed $args): string
{
    if (isset($args)) {
        if ($args instanceof JsonSerializable)
            $args = $args->jsonSerialize();

        foreach ($args as $key => $val) {
            if ($val == null)
                continue;
            $url .= str_contains($url, '?') ? '&' : '?';
            $qsVal = qsValue($val);
            $url .= $key . "=" . $qsVal;
        }
    }

    return $url;
}

class HttpMethods
{
    const GET = "GET";
    const POST = "POST";
    const PUT = "PUT";
    const PATCH = "PATCH";
    const DELETE = "DELETE";
    const OPTIONS = "OPTIONS";
    const HEAD = "HEAD";
}

class HttpHeaders
{
    const AUTHORIZATION = "Authorization";
    const COOKIE = "Cookie";
    const SET_COOKIE = "Set-Cookie";
    const CONTENT_LENGTH = "Content-Length";
    const ACCEPT = "Accept";
    const CONTENT_TYPE = "Content-Type";
    const USER_AGENT = "User-Agent";
}

interface RequestFilter
{
    public function call(SendContext $ctx);
}

interface ResponseFilter
{
    public function call(mixed $response, SendContext $ctx);
}

interface ExceptionFilter
{
    public function call(mixed $response, Exception $e);
}

interface Callback
{
    public function call(): void;
}

class WebServiceException extends Exception
{
    public function __construct(
        public int             $statusCode = 0,
        public ?string         $statusDescription = null,
        ?string                $message = null,
        public ?ResponseStatus $responseStatus = null,
        Throwable              $previous = null)
    {
        parent::__construct($message, $statusCode, $previous);
    }
}

class RefreshTokenException extends WebServiceException
{
    public function __construct(
        public int             $statusCode = 0,
        public ?string         $statusDescription = null,
        ?string                $message = null,
        public ?ResponseStatus $responseStatus = null,
        Throwable              $previous = null)
    {
        parent::__construct($statusCode, $statusDescription, $message, $responseStatus, $previous);
    }
}

class SendContext
{
    public function __construct(
        public ?array                         $headers = [],
        public ?array                         $cookies = [],
        public ?string                        $method = "POST",
        public array|IReturn|IReturnVoid|null $request = null,
        public ?string                        $url = null,
        public mixed                          $body = null,
        public mixed                          $args = null,
        public ?string                        $bodyString = null,
        public mixed                          $responseAs = null,
        public ?array                         $responseHeaders = null,
        public ?array                         $responseCookies = null,
        public ?RequestFilter                 $requestFilter = null,
        public ?ResponseFilter                $responseFilter = null)
    {
    }

    public function exec(): array
    {
        if (isset($this->request) && is_object($this->request)) {
            JsonConverters::registerNamespace((new ReflectionClass(get_class($this->request)))->getNamespaceName());
            if ($this->request instanceof IReturn) {
                $to = $this->request->createResponse();
                if (is_object($to)) {
                    JsonConverters::registerNamespace((new ReflectionClass(get_class($to)))->getNamespaceName());
                }
            }
        }
        if (isset($this->body) && is_object($this->body)) {
            JsonConverters::registerNamespace((new ReflectionClass(get_class($this->body)))->getNamespaceName());
        }
        if (isset($this->args) && is_object($this->args)) {
            JsonConverters::registerNamespace((new ReflectionClass(get_class($this->args)))->getNamespaceName());
        }

        $headers = $this->headers;
        $opts = [
            "http" => [
                'method' => $this->method,
                'ignore_errors' => true,
            ]
        ];
        if (hasRequestBody($this->method)) {
            if (!isset($headers["Content-Type"]))
                $headers["Content-Type"] = "application/json";
            $json = isset($this->body)
                ? $this->body instanceof JsonSerializable
                    ? json_encode($this->body->jsonSerialize())
                    : $this->body
                : $this->bodyString;
            $opts['http']['content'] = $json;
            $headers[HttpHeaders::CONTENT_LENGTH] = strlen($json);
        } else {
            if (isset($headers[HttpHeaders::CONTENT_TYPE]))
                unset($headers[HttpHeaders::CONTENT_TYPE]);
        }
        if (!empty($this->cookies)) {
            $headers['Cookie'] = implode("; ",
                array_map(fn($name, $cookie): string => $name . "=" . $cookie['value'], array_keys($this->cookies), $this->cookies));
        }
        $opts['http']['header'] = implode("\r\n",
            array_map(fn($key, $val): string => "$key: $val", array_keys($headers), $headers));
        Log::debug("REQUEST: " . $this->url);
        Log::debug($opts);
        $context = stream_context_create($opts);
        $response = file_get_contents($this->url, false, $context);
        if ($response === false) {
            throw new WebServiceException(statusCode: 500, statusDescription: "Request Failed",
                message: "Request to $this->url failed");
        }
        [$responseHeaders, $cookies] = parseHeaders($http_response_header);
        $this->responseCookies = $cookies;
        $this->responseHeaders = $responseHeaders;
        Log::debug("RESPONSE HEADERS:");
        if (!empty($this->responseCookies)) {
            Log::debug("COOKIES:");
            Log::debug($this->responseCookies);
        }
        Log::debug("RESPONSE: " . ($responseHeaders['statusCode'] ?? ""));
        Log::debug($responseHeaders);
        Log::debug($response);
        return [$response, $responseHeaders];
    }
}

class JsonServiceClient
{
    public static ?RequestFilter $globalRequestFilter;
    public ?RequestFilter $requestFilter;
    public static ?ResponseFilter $globalResponseFilter;
    public ?ResponseFilter $responseFilter;
    public static ?ExceptionFilter $globalExceptionFilter;
    public ?ExceptionFilter $exceptionFilter;
    public ?Callback $onAuthenticationRequired;

    public string $baseUrl = '';
    public string $replyBaseUrl = '';
    public string $oneWayBaseUrl = '';
    public ?string $userName = null;
    public ?string $password = null;
    public ?string $bearerToken = null;
    public ?string $refreshToken = null;
    public ?string $refreshTokenUri = null;
    public bool $useTokenCookie = false;
    public array $headers = [];
    public array $cookies = [];

    public static $HttpStatusCodes = [
        100 => "Continue",
        101 => "Switching Protocols",
        102 => "Processing",
        200 => "OK",
        201 => "Created",
        202 => "Accepted",
        203 => "Non-Authoritative Information",
        204 => "No Content",
        205 => "Reset Content",
        206 => "Partial Content",
        207 => "Multi-Status",
        300 => "Multiple Choices",
        301 => "Moved Permanently",
        302 => "Found",
        303 => "See Other",
        304 => "Not Modified",
        305 => "Use Proxy",
        306 => "(Unused)",
        307 => "Temporary Redirect",
        308 => "Permanent Redirect",
        400 => "Bad Request",
        401 => "Unauthorized",
        402 => "Payment Required",
        403 => "Forbidden",
        404 => "Not Found",
        405 => "Method Not Allowed",
        406 => "Not Acceptable",
        407 => "Proxy Authentication Required",
        408 => "Request Timeout",
        409 => "Conflict",
        410 => "Gone",
        411 => "Length Required",
        412 => "Precondition Failed",
        413 => "Request Entity Too Large",
        414 => "Request-URI Too Long",
        415 => "Unsupported Media Type",
        416 => "Requested Range Not Satisfiable",
        417 => "Expectation Failed",
        418 => "I'm a teapot",
        419 => "Authentication Timeout",
        420 => "Enhance Your Calm",
        422 => "Unprocessable Entity",
        423 => "Locked",
        424 => "Failed Dependency",
        425 => "Too Early",
        426 => "Upgrade Required",
        428 => "Precondition Required",
        429 => "Too Many Requests",
        431 => "Request Header Fields Too Large",
        451 => "Unavailable For Legal Reasons",
        500 => "Internal Server Error",
        501 => "Not Implemented",
        502 => "Bad Gateway",
        503 => "Service Unavailable",
        504 => "Gateway Timeout",
        505 => "HTTP Version Not Supported",
        506 => "Variant Also Negotiates",
        507 => "Insufficient Storage",
        508 => "Loop Detected",
        510 => "Not Extended",
        511 => "Network Authentication Required"];


    public function __construct(
        string $baseUrl
    )
    {
        if ($baseUrl[-1] != '/')
            $baseUrl .= '/';
        $this->baseUrl = $baseUrl;
        $this->replyBaseUrl = combinePaths($this->baseUrl, 'json/reply') . '/';
        $this->oneWayBaseUrl = combinePaths($this->baseUrl, 'json/oneway') . '/';
        $this->headers = [
            HttpHeaders::ACCEPT => 'application/json',
            HttpHeaders::USER_AGENT => 'servicestack/php',
        ];
    }

    public function setBasePath($path): void
    {
        if (empty($path)) {
            $this->replyBaseUrl = combinePaths($this->baseUrl, 'json/reply') . '/';
            $this->oneWayBaseUrl = combinePaths($this->baseUrl, 'json/oneway') . '/';
        } else {
            if ($path[0] != '/') {
                $path = '/' . $path;
            }
            $this->replyBaseUrl = combinePaths($this->baseUrl, $path) . '/';
            $this->oneWayBaseUrl = combinePaths($this->baseUrl, $path) . '/';
        }
    }

    public function setCredentials(?string $userName = null, ?string $password = null): void
    {
        $this->userName = $userName;
        $this->password = $password;
    }

    public function setBearerToken(?string $bearerToken): void
    {
        $this->bearerToken = $bearerToken;
    }

    public function setRefreshToken(?string $refreshToken): void
    {
        $this->refreshToken = $refreshToken;
    }

    /**
     * @throws Exception
     */
    public function createUrlFromDto(string $method, mixed $request): string
    {
        $url = combinePaths($this->replyBaseUrl, nameof($request));
        if (!hasRequestBody($method)) {
            $arr = JsonConverters::to(get_class($request), $request);
            $qs = "";
            foreach ($arr as $key => $val) {
                if (!isset($val)) continue;
                $qs .= empty($qs) ? "?" : "&";
                $qs .= $key . "=" . qsValue($val);
            }
            $url .= $qs;
        }
        return $url;
    }

    public static function create(string $baseUrl): JsonServiceClient
    {
        $to = new JsonServiceClient($baseUrl);
        $to->setBasePath('api');
        if (isset($to->headers[HttpHeaders::ACCEPT]))
            unset($to->headers[HttpHeaders::ACCEPT]);
        return $to;
    }

    public function toAbsoluteUrl($relativeOrAbsoluteUrl): string
    {
        return str_starts_with($relativeOrAbsoluteUrl, "http://") ||
        str_starts_with($relativeOrAbsoluteUrl, "https://")
            ? $relativeOrAbsoluteUrl
            : combinePaths($this->baseUrl, $relativeOrAbsoluteUrl);
    }

    /** @throws Exception */
    public function get(IReturn|IReturnVoid|string $request, ?array $args = null): mixed
    {
        return $this->send($request, method: HttpMethods::GET, args: $args);
    }

    /** @throws Exception */
    public function post(IReturn|IReturnVoid|string $request, mixed $body = null, ?array $args = null): mixed
    {
        return $this->send($request, method: HttpMethods::POST, body: $body, args: $args);
    }

    /** @throws Exception */
    public function put(IReturn|IReturnVoid|string $request, mixed $body = null, ?array $args = null): mixed
    {
        return $this->send($request, method: HttpMethods::PUT, body: $body, args: $args);
    }

    /** @throws Exception */
    public function patch(IReturn|IReturnVoid|string $request, mixed $body = null, ?array $args = null): mixed
    {
        return $this->send($request, method: HttpMethods::PATCH, body: $body, args: $args);
    }

    /** @throws Exception */
    public function delete(IReturn|IReturnVoid|string $request, ?array $args = null): mixed
    {
        return $this->send($request, method: HttpMethods::DELETE, args: $args);
    }

    /** @throws Exception */
    public function options(IReturn|IReturnVoid|string $request, ?array $args = null): mixed
    {
        return $this->send($request, method: HttpMethods::OPTIONS, args: $args);
    }

    /** @throws Exception */
    public function head(IReturn|IReturnVoid|string $request, ?array $args = null): mixed
    {
        return $this->send($request, method: HttpMethods::HEAD, args: $args);
    }

    /** @throws Exception */
    public function getUrl(string $path, mixed $responseAs = null, mixed $args = null): mixed
    {
        return $this->sendUrl($path, method: HttpMethods::GET, responseAs: $responseAs, args: $args);
    }

    /** @throws Exception */
    public function postUrl(string $path, mixed $responseAs = null, mixed $body = null, ?array $args = null): mixed
    {
        return $this->sendUrl($path, method: HttpMethods::POST, responseAs: $responseAs, body: $body, args: $args);
    }

    /** @throws Exception */
    public function putUrl(string $path, mixed $responseAs = null, mixed $body = null, ?array $args = null): mixed
    {
        return $this->sendUrl($path, method: HttpMethods::PUT, responseAs: $responseAs, body: $body, args: $args);
    }

    /** @throws Exception */
    public function patchUrl(string $path, mixed $responseAs = null, mixed $body = null, ?array $args = null): mixed
    {
        return $this->sendUrl($path, method: HttpMethods::PATCH, responseAs: $responseAs, body: $body, args: $args);
    }

    /** @throws Exception */
    public function deleteUrl(string $path, mixed $responseAs = null, mixed $args = null): mixed
    {
        return $this->sendUrl($path, method: HttpMethods::DELETE, responseAs: $responseAs, args: $args);
    }

    /** @throws Exception */
    public function optionsUrl(string $path, mixed $responseAs = null, mixed $args = null): mixed
    {
        return $this->sendUrl($path, method: HttpMethods::OPTIONS, responseAs: $responseAs, args: $args);
    }

    /** @throws Exception */
    public function headUrl(string $path, mixed $responseAs = null, mixed $args = null): mixed
    {
        return $this->sendUrl($path, method: HttpMethods::HEAD, responseAs: $responseAs, args: $args);
    }

    function raiseError(mixed $res, Exception $e): Exception
    {
        if (isset($this->exceptionFilter))
            $this->exceptionFilter->call($res, $e);
        if (isset(JsonServiceClient::$globalExceptionFilter))
            JsonServiceClient::$globalExceptionFilter->call($res, $e);
        return $e;
    }

    /**
     * @throws Exception
     */
    function handleError(mixed $holdRes, Exception $e)
    {
        if ($e instanceof WebServiceException)
            throw $this->raiseError($holdRes, $e);

        $webEx = new WebServiceException(
            statusCode: 500,
            statusDescription: $e->getMessage()
        );

        throw $this->raiseError($holdRes, $webEx);
    }

    /**
     * @throws Exception
     */
    public function sendUrl(string $path, ?string $method = null, mixed $responseAs = null, mixed $body = null, mixed $args = null): mixed
    {
        if (isset($body) && !isset($responseAs))
            $responseAs = resolveResponseType($body);

        return $this->sendRequest(new SendContext(
            headers: array_replace([], $this->headers),
            method: $method ?? resolveHttpMethod($body),
            url: $this->toAbsoluteUrl($path),
            body: $body,
            args: $args,
            responseAs: $responseAs,
        ));
    }

    /**
     * @throws Exception
     */
    public function send(IReturn|IReturnVoid|null $request, ?string $method = null, mixed $body = null, ?array $args = null): mixed
    {
        if (!($request instanceof IReturn || $request instanceof IReturnVoid))
            throw new Exception("Could not resolve Response Type for " . nameof($request));

        return $this->sendRequest(new SendContext(
            headers: array_replace([], $this->headers),
            method: $method ?? resolveHttpMethod($request),
            request: $request,
            body: $body,
            args: $args,
            responseAs: resolveResponseType($request),
        ));
    }

    /** @throws Exception */
    function assertValidBatchRequest(array $requestDtos): array
    {
        if (!is_array($requestDtos))
            throw new Exception(JsonConverters::getClass($requestDtos) . " is not an array of Request DTOs");

        if (count($requestDtos) == 0)
            return [null, null];

        $request = $requestDtos[0];
        if (!($request instanceof IReturn || $request instanceof IReturnVoid))
            throw new Exception(JsonConverters::getClass($request) . " does not implement IReturn or IReturnVoid");

        $itemResponseAs = resolveResponseType($request);
        if (!isset($itemResponseAs))
            throw new Exception("Could not resolve Response Type for " . JsonConverters::getClass($request));

        return [$request, $itemResponseAs];
    }

    /** @throws Exception */
    public function sendAll(array $requestDtos): mixed
    {
        [$request, $itemResponseAs] = $this->assertValidBatchRequest($requestDtos);
        if (!isset($request))
            return [];

        $url = combinePaths($this->replyBaseUrl, nameof($request) . "[]");

        /** @var ArrayList $arrayList */
        $arrayList = $this->sendRequest(new SendContext(
            headers: array_replace([], $this->headers),
            method: HttpMethods::POST,
            request: $requestDtos,
            url: $url,
            responseAs: ArrayList::create([nameof($itemResponseAs)]),
        ));
        return $arrayList->jsonSerialize();
    }

    /** @throws Exception */
    public function sendAllOneWay(array $requestDtos): void
    {
        if (!is_array($requestDtos))
            throw new Exception(JsonConverters::getClass($requestDtos) . " is not an array of Request DTOs");

        if (count($requestDtos) == 0)
            return;

        $request = $requestDtos[0];
        if (!($request instanceof IReturn || $request instanceof IReturnVoid))
            throw new Exception(JsonConverters::getClass($request) . " does not implement IReturn or IReturnVoid");

        $url = combinePaths($this->oneWayBaseUrl, nameof($request) . "[]");

        /** @var ArrayList $arrayList */
        $this->sendRequest(new SendContext(
            headers: array_replace([], $this->headers),
            method: HttpMethods::POST,
            request: $requestDtos,
            url: $url,
            responseAs: null,
        ));
    }

    /**
     * @throws Exception
     */
    function createRequest(SendContext $info): SendContext
    {
        $url = $info->url;
        $body = $info->body ?? $info->request;
        try {
            if (empty($url)) {
                $bodyNotRequestDto = $info->request != null && $info->body != null;
                $url = $bodyNotRequestDto
                    ? $this->createUrlFromDto("GET", $info->request)
                    : $this->createUrlFromDto($info->method, $body);
            }
            if (empty($url))
                throw new Exception("URL is empty");
            if (isset($info->args))
                $url = appendQueryString($url, $info->args);
        } catch (Exception $e) {
            $this->handleError(null, $e);
        }
        $info->url = $url;
        if (isset($info->requestFilter))
            $info->requestFilter->call($info);
        if (isset($this->requestFilter))
            $this->requestFilter->call($info);
        if (isset(JsonServiceClient::$globalRequestFilter))
            JsonServiceClient::$globalRequestFilter->call($info);

        if (hasRequestBody($info->method)) {
            if (is_string($body))
                $info->bodyString = $body;
            else if (isset($body))
                $info->bodyString = json_encode(JsonConverters::to(nameof($body), $body));
            else if (isset($info->args))
                $info->bodyString = ((is_object($info->args)
                    ? json_encode(JsonConverters::to(nameof($info->args), $info->args))
                    : is_array($info->args)) ? json_encode($info->args) : is_string($info->args))
                    ? $info->args
                    : null;
        }
        return $info;
    }

    public function createResponseStatus($o, $headers)
    {
        $desc = JsonServiceClient::$HttpStatusCodes[$headers['statusCode']] ?? "Unknown Error";
        $status = new ResponseStatus(errorCode: $headers['statusCode'], message: $desc);
        if (isset($o['responseStatus'])) {
            $status->fromMap($o['responseStatus']);
            Log::debug("responseStatus:");
            Log::debug($status->errors);
        }
        return $status;
    }

    /** @throws Exception */
    function assertSuccessResponse($response, $headers): void
    {
        if ($headers['statusCode'] >= 400) {
            $status = null;
            $desc = JsonServiceClient::$HttpStatusCodes[$headers['statusCode']] ?? "Unknown Error";
            try {
                $o = json_decode($response, associative: true);
                $status = $this->createResponseStatus($o, $headers);
            } catch (Exception $ex) {
                Log::error("Could not parse ResponseStatus", error: $ex);
            }
            Log::debug("ERROR: " . $headers['statusCode'] . ": $desc");
            Log::debug((isset($status) ? json_encode($status) : ""));

            throw $this->raiseError($headers, new WebServiceException(
                statusCode: $headers['statusCode'],
                statusDescription: $desc,
                message: isset($status) ? $status->message : $desc,
                responseStatus: $status
            ));
        }
    }

    function executeRequest(SendContext $info)
    {
        $info->cookies = isset($info->cookies)
            ? array_replace([], $this->cookies, $info->cookies)
            : $this->cookies;
        [$response, $headers] = $info->exec();

        if (isset($info->responseCookies)) {
            foreach ($info->responseCookies as $name => $cookie) {
                if (isset($cookie['expires'])) {
                    $expires = strtotime($cookie['expires']);
                    if ($expires < time()) {
                        if (isset($this->cookies[$name])) {
                            unset($this->cookies[$name]);
                            continue;
                        }
                    }
                }
                $this->cookies[$name] = $cookie;
            }
        }
        $info->cookies = array_replace([], $this->cookies);
        return [$response, $headers];
    }

    /**
     * @throws Exception
     */
    function resendRequest(SendContext $info)
    {
        if (isset($this->bearerToken))
            $info->headers[HttpHeaders::AUTHORIZATION] = "Bearer " . $this->bearerToken;
        if (isset($this->userName))
            $info->headers[HttpHeaders::AUTHORIZATION] = "Basic " . base64_encode($this->userName . ":" . $this->password);

        [$response, $headers] = $this->executeRequest($info);
        $this->assertSuccessResponse($response, $headers);

        $dto = $this->createResponse($response, $info);
        return [$dto, $headers];
    }

    /**
     * @throws Exception
     */
    function sendRequest(SendContext $info): mixed
    {
        $info = $this->createRequest($info);
        $dto = null;
        $headers = null;

        try {
            [$dto, $headers] = $this->resendRequest($info);
            return $dto;
        } catch (Exception $e) {
            Log::debug("sendRequest Exception: " . $e->getMessage());

            $hasRefreshTokenCookie = false;
            if (isset($this->refreshToken) || $this->useTokenCookie || $hasRefreshTokenCookie) {
                Log::debug("attempting to refresh bearer_token with refresh_token");
                $jwtRequest = new GetAccessToken(refreshToken: $this->refreshToken);
                $url = $this->refreshTokenUri ?? $this->createUrlFromDto(HttpMethods::POST, $jwtRequest);

                try {
                    $jwtInfo = $this->createRequest(new SendContext(
                        headers: array_replace([], $this->headers),
                        method: HttpMethods::POST,
                        request: $jwtRequest,
                        url: $url,
                        responseAs: resolveResponseType($jwtRequest),
                    ));
                    [$jwtRes, $jwtHeaders] = $this->executeRequest($jwtInfo);
                    $this->assertSuccessResponse($jwtRes, $jwtHeaders);

                    /** @var GetAccessTokenResponse $jwtResponse */
                    $jwtResponse = $this->createResponse($jwtRes, $info);
                    $this->bearerToken = $jwtResponse->accessToken;
                    Log::debug("sendRequest: bearerToken refreshed");
                    if (isset($info->headers[HttpHeaders::AUTHORIZATION]))
                        unset($info->headers[HttpHeaders::AUTHORIZATION]);
                    [$dto, $headers] = $this->resendRequest($info);
                    return $dto;
                } catch (Exception $jwtEx) {
                    Log::debug("sendRequest: jwtExt: " . $jwtEx->getMessage());
                    $this->handleError($dto, new RefreshTokenException(
                        statusCode: $headers['statusCode'] ?? 401,
                        statusDescription: $jwtEx->getMessage(),
                        responseStatus: ($jwtEx instanceof WebServiceException
                        ? $jwtEx->responseStatus
                        : null) ?? $this->createResponseStatus($dto, $headers),
                        previous: $jwtEx));
                }
            }
            if (isset($this->onAuthenticationRequired)) {
                $this->onAuthenticationRequired->call();
                [$dto, $headers] = $this->resendRequest($info);
                return $dto;
            }
            $this->handleError($dto, $e);
        }
    }

    /**
     * @throws WebServiceException
     * @throws Exception
     */
    function createResponse(mixed $response, SendContext $info)
    {
        if (isset($info->requestFilter))
            $info->responseFilter->call($response, $info);
        if (isset($this->responseFilter))
            $this->responseFilter->call($response, $info);
        if (isset(JsonServiceClient::$globalResponseFilter))
            JsonServiceClient::$globalResponseFilter->call($response, $info);

        $into = $info->responseAs;

        $ctx = new TypeContext(is_string($into) ? $into : nameof($into));

        if ($ctx->class == "string")
            return $response;

        $json = $response;

        $obj = json_decode($json, associative: true);

        if (!isset($into))
            return $obj;

        $converter = JsonConverters::getConverter($ctx->class);
        if ($converter != null) {
            return $converter->fromJson($obj, $ctx);
        }
        if (is_string($into)) {
            $into = JsonConverters::createInstance($into);
        }
        if (is_object($into) && method_exists($into, 'fromMap')) {
            $into->fromMap($obj);
            return $into;
        }
        throw new WebServiceException(message: "Failed to deserialize into '$ctx->class'");
    }

    public function getTokenCookie()
    {
        return $this->cookies['ss-tok'] ?? null;
    }

    public function getRefreshTokenCookie()
    {
        return $this->cookies['ss-reftok'] ?? null;
    }

}
