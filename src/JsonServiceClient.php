<?php

namespace Servicestack;

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
    $head = [];
    if (isset($headers)) {
        foreach ($headers as $k => $v) {
            $t = explode(':', $v, 2);
            if (isset($t[1])) {
                $head[trim($t[0])] = trim($t[1]);
            } else {
                $head[] = $v;
                if (preg_match("#HTTP/[0-9\.]+\s+([0-9]+)#", $v, $out))
                    $head['statusCode'] = intval($out[1]);
            }
        }
    }
    return $head;
}

class HttpMethods
{
    const GET = "GET";
    const POST = "POST";
    const PUT = "PUT";
    const PATCH = "PATCH";
    const DELETE = "DELETE";
    const OPTIONS = "OPTIONS";
}

interface RequestFilter
{
    public function call(SendContext $ctx);
}

interface ResponseFilter
{
    public function call(mixed $response);
}

interface ExceptionFilter
{
    public function call(mixed $response, Exception $e);
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
        public ?array                   $headers = [],
        public ?string                  $method = "POST",
        public IReturn|IReturnVoid|null $request = null,
        public ?string                  $url = null,
        public mixed                    $body = null,
        public mixed                    $args = null,
        public ?string                  $bodyString = null,
        public mixed                    $responseAs = null,
        public ?RequestFilter           $requestFilter = null,
        public ?ResponseFilter          $responseFilter = null)
    {
    }

    public function exec(): array
    {
        if (isset($this->request) && is_object($this->request)) {
            JsonConverters::registerNamespace((new ReflectionClass(get_class($this->request)))->getNamespaceName());
            if ($this->request instanceof IReturn) {
                $to = $this->request->createResponse();
                JsonConverters::registerNamespace((new ReflectionClass(get_class($to)))->getNamespaceName());
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
            $headers["Content-Length"] = strlen($json);
        } else {
            if (isset($headers["Content-Type"]))
                unset($headers["Content-Type"]);
        }
        $opts['http']['header'] = implode("\r\n",
            array_map(fn($key,$val):string => "$key: $val", array_keys($headers), $headers));
        print_r($opts);
        $context = stream_context_create($opts);
        $response = file_get_contents($this->url, false, $context);
        print_r($response);
        return [$response, parseHeaders($http_response_header)];
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
            'Accept' => 'application/json',
            'User-Agent' => 'servicestack/php',
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
                $qs .= empty($qs) ? "?" : "&";
                $qs .= $key . "=" . $this->qsValue($val);
            }
            $url .= $qs;
        }
        return $url;
    }

    public static function create(string $baseUrl): JsonServiceClient
    {
        $to = new JsonServiceClient($baseUrl);
        $to->setBasePath('api');
        $to->headers = [];
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
    public function get(IReturn|string $request, ?array $args = null): mixed
    {
        return $this->send($request, method: HttpMethods::GET, args: $args);
    }

    /** @throws Exception */
    public function post(IReturn|string $request, ?array $args = null): mixed
    {
        return $this->send($request, method: HttpMethods::POST, args: $args);
    }

    /** @throws Exception */
    public function put(IReturn|string $request, ?array $args = null): mixed
    {
        return $this->send($request, method: HttpMethods::PUT, args: $args);
    }

    /** @throws Exception */
    public function patch(IReturn|string $request, ?array $args = null): mixed
    {
        return $this->send($request, method: HttpMethods::PATCH, args: $args);
    }

    /** @throws Exception */
    public function delete(IReturn|string $request, ?array $args = null): mixed
    {
        return $this->send($request, method: HttpMethods::DELETE, args: $args);
    }

    /** @throws Exception */
    public function getUrl(string $path, mixed $responseAs=null, mixed $args = null): mixed
    {
        return $this->sendUrl($path, method: HttpMethods::GET, responseAs:$responseAs, args:$args);
    }

    /** @throws Exception */
    public function postUrl(string $path, mixed $responseAs=null, mixed $body=null, ?array $args = null): mixed
    {
        return $this->sendUrl($path, method: HttpMethods::POST, responseAs:$responseAs, body:$body, args:$args);
    }

    /**
     * @throws Exception
     */
    public function qsValue($arg): string
    {
        if (!isset($arg))
            return "";
        if (is_bool($arg))
            return $arg ? "true" : "false";
        if (is_array($arg)) {
            if (array_is_list($arg))
                return "[" . implode(",", array_map(fn($x): string => $this->qsValue($x), $arg)) . "]";
            return "{" . implode(",",
                    array_map(fn($key, $val): string => $key . ":" . $this->qsValue($val), array_keys($arg), $arg))
                . "}";
        }
        if (is_string($arg))
            return urlencode($arg);
        if (is_object($arg)) {
            $cls = get_class($arg);
            $converter = JsonConverters::getConverter($cls);
            if ($converter) {
                $val = $converter->toJson($arg, new TypeContext(class: $cls));
                return $this->qsValue($val);
            }
            if ($arg instanceof JsonSerializable) {
                return $this->qsValue($arg->jsonSerialize());
            }
            if ($arg instanceof Stringable) {
                return urlencode($arg->__toString());
            }
            throw new Exception("Could not convert unknown object '$cls' to string");
        }
        return urlencode("$arg");
    }

    function appendQueryString(string $url, mixed $args): string
    {
        if (isset($args)) {
            if ($args instanceof JsonSerializable)
                $args = $args->jsonSerialize();

            foreach ($args as $key => $val) {
                if ($val == null)
                    continue;
                $url .= str_contains($url, '?') ? '&' : '?';
                $qsVal = $this->qsValue($val);
                $url .= $key . "=" . $qsVal;
            }
        }

        return $url;
    }

    public function raiseError(mixed $res, Exception $e): Exception
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
    public function handleError(mixed $holdRes, Exception $e)
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

    /**
     * @throws Exception
     */
    public function createRequest(SendContext $info): SendContext
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
                $url = $this->appendQueryString($url, $info->args);
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

    /**
     * @throws Exception
     */
    function resendRequest(SendContext $info)
    {
        if (isset($this->bearerToken))
            $info->headers['Authorization'] = "Bearer " . $this->bearerToken;
        if (isset($this->userName))
            $info->headers['Authorization'] = "Basic " . base64_encode($this->userName . ":" . $this->password);

        [$response, $headers] = $info->exec();
        if ($headers['statusCode'] >= 400) {
            $status = null;
            try {
                $o = json_decode($response, associative: true);
                $status = new ResponseStatus();
                $status->fromMap($o);
            } catch (Exception $ignore) {
            }
            $desc = JsonServiceClient::$HttpStatusCodes[$headers['statusCode']] ?? "Unknown Error";
            echo "ERROR: " . $headers['statusCode'] . ": $desc\n" . (isset($status) ? json_encode($status) : "");
            throw $this->raiseError($headers, new WebServiceException(
                statusCode: $headers['statusCode'],
                statusDescription: $desc,
                message: isset($status) ? $status->message : $desc,
                responseStatus: $status
            ));
        }

        $dto = $this->createResponse($response, $info);
        return [$dto, $headers];
    }

    /**
     * @throws Exception
     */
    function sendRequest(SendContext $info): mixed
    {
        $info = $this->createRequest($info);

        try {
            [$dto, $headers] = $this->resendRequest($info);
            return $dto;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getFetch(IReturn|string $request, ?array $args = null): mixed
    {
        return !is_string($request)
            ? $this->fetch(HttpMethods::GET, $request, $args)
            : $this->fetch(HttpMethods::GET, null, $args, $this->toAbsoluteUrl($request));
    }

    /**
     * @param string $method
     * @param IReturn|string|null $request
     * @param array<string,mixed> $args
     * @param string|null $absoluteUrl
     * @return mixed
     */
    public function fetch(string $method, IReturn|string|null $request, ?array $args = null, ?string $absoluteUrl = null): mixed
    {
        $opts = [
            "http" => [
                'method' => $method,
                "header" => $this->headers,
                "ignore_errors" => true,
            ]
        ];

        $url = !empty($absoluteUrl)
            ? $absoluteUrl
            : combinePaths($this->replyBaseUrl, nameof($request));

        $context = stream_context_create($opts);
        $json = file_get_contents($url, false, $context);

        if ($request != null && method_exists($request, 'createResponse')) {
            $to = $request->createResponse();
            JsonConverters::registerNamespace((new \ReflectionClass(get_class($request)))->getNamespaceName());
            if ($to != null) {
                JsonConverters::registerNamespace((new \ReflectionClass(get_class($to)))->getNamespaceName());
            }

            $obj = json_decode($json, true);
            echo "RESPONSE::HEADERS\n";
            print_r(parseHeaders($http_response_header));
            echo "RESPONSE::BEGIN\n";
            print_r($obj);
            echo "RESPONSE::END\n";

            if (method_exists($to, 'fromMap')) {
                $to->fromMap($obj);
            }
            return $to;
        }
        return $json;
    }

    /**
     * @throws WebServiceException
     * @throws Exception
     */
    function createResponse(mixed $response, SendContext $info)
    {
        if (isset($info->requestFilter))
            $info->responseFilter->call($response);
        if (isset($this->requestFilter))
            $this->responseFilter->call($response);
        if (isset(JsonServiceClient::$globalResponseFilter))
            JsonServiceClient::$globalResponseFilter->call($response);

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
        throw new WebServiceException(message:"Failed to deserialize into '$ctx->class'");
    }

}
