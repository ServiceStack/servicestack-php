<?php namespace dtos;
/* Options:
Date: 2024-10-24 05:59:33
Version: 8.41
Tip: To override a DTO option, remove "//" prefix before updating
BaseUrl: https://test.servicestack.net

//GlobalNamespace: dtos
//MakePropertiesOptional: False
//AddServiceStackTypes: True
//AddResponseStatus: False
//AddImplicitVersion: 
//AddDescriptionAsComments: True
//IncludeTypes: 
//ExcludeTypes: 
//DefaultImports: 
*/


use DateTime;
use Exception;
use DateInterval;
use JsonSerializable;
use ServiceStack\{IReturn,IReturnVoid,IGet,IPost,IPut,IDelete,IPatch,IMeta,IHasSessionId,IHasBearerToken,IHasVersion};
use ServiceStack\{ICrud,ICreateDb,IUpdateDb,IPatchDb,IDeleteDb,ISaveDb,AuditBase,QueryDb,QueryDb2,QueryData,QueryData2,QueryResponse};
use ServiceStack\{ResponseStatus,ResponseError,EmptyResponse,IdResponse,ArrayList,KeyValuePair2,StringResponse,StringsResponse,Tuple2,Tuple3,ByteArray};
use ServiceStack\{JsonConverters,Returns,TypeContext};


class Item implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $description=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['description'])) $this->description = $o['description'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->description)) $o['description'] = $this->description;
        return empty($o) ? new class(){} : $o;
    }
}

class Poco implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
}

class CustomType implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
}

class SetterType implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
}

class DeclarativeChildValidation implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null,
        // @Validate(Validator="MaximumLength(20)")
        /** @var string|null */
        public ?string $value=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['value'])) $this->value = $o['value'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->value)) $o['value'] = $this->value;
        return empty($o) ? new class(){} : $o;
    }
}

class FluentChildValidation implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $value=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['value'])) $this->value = $o['value'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->value)) $o['value'] = $this->value;
        return empty($o) ? new class(){} : $o;
    }
}

class DeclarativeSingleValidation implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null,
        // @Validate(Validator="MaximumLength(20)")
        /** @var string|null */
        public ?string $value=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['value'])) $this->value = $o['value'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->value)) $o['value'] = $this->value;
        return empty($o) ? new class(){} : $o;
    }
}

class FluentSingleValidation implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $value=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['value'])) $this->value = $o['value'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->value)) $o['value'] = $this->value;
        return empty($o) ? new class(){} : $o;
    }
}

/**
 * @property string|null $refId
 * @property string|null $tag
 */
interface IGeneration
{
}

/**
 * @property string|null $provider
 * @property string|null $userId
 * @property string|null $accessToken
 * @property string|null $accessTokenSecret
 * @property string|null $refreshToken
 * @property DateTime|null $refreshTokenExpiry
 * @property string|null $requestToken
 * @property string|null $requestTokenSecret
 * @property array<string,string>|null $items
 */
interface IAuthTokens
{
}

// @DataContract
class AuthUserSession implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $referrerUrl=null,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $id=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $userAuthId=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $userAuthName=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $userName=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $twitterUserId=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $twitterScreenName=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $facebookUserId=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $facebookUserName=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $firstName=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $lastName=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $displayName=null,

        // @DataMember(Order=13)
        /** @var string|null */
        public ?string $company=null,

        // @DataMember(Order=14)
        /** @var string|null */
        public ?string $email=null,

        // @DataMember(Order=15)
        /** @var string|null */
        public ?string $primaryEmail=null,

        // @DataMember(Order=16)
        /** @var string|null */
        public ?string $phoneNumber=null,

        // @DataMember(Order=17)
        /** @var DateTime|null */
        public ?DateTime $birthDate=null,

        // @DataMember(Order=18)
        /** @var string|null */
        public ?string $birthDateRaw=null,

        // @DataMember(Order=19)
        /** @var string|null */
        public ?string $address=null,

        // @DataMember(Order=20)
        /** @var string|null */
        public ?string $address2=null,

        // @DataMember(Order=21)
        /** @var string|null */
        public ?string $city=null,

        // @DataMember(Order=22)
        /** @var string|null */
        public ?string $state=null,

        // @DataMember(Order=23)
        /** @var string|null */
        public ?string $country=null,

        // @DataMember(Order=24)
        /** @var string|null */
        public ?string $culture=null,

        // @DataMember(Order=25)
        /** @var string|null */
        public ?string $fullName=null,

        // @DataMember(Order=26)
        /** @var string|null */
        public ?string $gender=null,

        // @DataMember(Order=27)
        /** @var string|null */
        public ?string $language=null,

        // @DataMember(Order=28)
        /** @var string|null */
        public ?string $mailAddress=null,

        // @DataMember(Order=29)
        /** @var string|null */
        public ?string $nickname=null,

        // @DataMember(Order=30)
        /** @var string|null */
        public ?string $postalCode=null,

        // @DataMember(Order=31)
        /** @var string|null */
        public ?string $timeZone=null,

        // @DataMember(Order=32)
        /** @var string|null */
        public ?string $requestTokenSecret=null,

        // @DataMember(Order=33)
        /** @var DateTime */
        public DateTime $createdAt=new DateTime(),

        // @DataMember(Order=34)
        /** @var DateTime */
        public DateTime $lastModified=new DateTime(),

        // @DataMember(Order=35)
        /** @var array<string>|null */
        public ?array $roles=null,

        // @DataMember(Order=36)
        /** @var array<string>|null */
        public ?array $permissions=null,

        // @DataMember(Order=37)
        /** @var bool|null */
        public ?bool $isAuthenticated=null,

        // @DataMember(Order=38)
        /** @var bool|null */
        public ?bool $fromToken=null,

        // @DataMember(Order=39)
        /** @var string|null */
        public ?string $profileUrl=null,

        // @DataMember(Order=40)
        /** @var string|null */
        public ?string $sequence=null,

        // @DataMember(Order=41)
        /** @var int */
        public int $tag=0,

        // @DataMember(Order=42)
        /** @var string|null */
        public ?string $authProvider=null,

        // @DataMember(Order=43)
        /** @var array<IAuthTokens>|null */
        public ?array $providerOAuthAccess=null,

        // @DataMember(Order=44)
        /** @var array<string,string>|null */
        public ?array $meta=null,

        // @DataMember(Order=45)
        /** @var array<string>|null */
        public ?array $audiences=null,

        // @DataMember(Order=46)
        /** @var array<string>|null */
        public ?array $scopes=null,

        // @DataMember(Order=47)
        /** @var string|null */
        public ?string $dns=null,

        // @DataMember(Order=48)
        /** @var string|null */
        public ?string $rsa=null,

        // @DataMember(Order=49)
        /** @var string|null */
        public ?string $sid=null,

        // @DataMember(Order=50)
        /** @var string|null */
        public ?string $hash=null,

        // @DataMember(Order=51)
        /** @var string|null */
        public ?string $homePhone=null,

        // @DataMember(Order=52)
        /** @var string|null */
        public ?string $mobilePhone=null,

        // @DataMember(Order=53)
        /** @var string|null */
        public ?string $webpage=null,

        // @DataMember(Order=54)
        /** @var bool|null */
        public ?bool $emailConfirmed=null,

        // @DataMember(Order=55)
        /** @var bool|null */
        public ?bool $phoneNumberConfirmed=null,

        // @DataMember(Order=56)
        /** @var bool|null */
        public ?bool $twoFactorEnabled=null,

        // @DataMember(Order=57)
        /** @var string|null */
        public ?string $securityStamp=null,

        // @DataMember(Order=58)
        /** @var string|null */
        public ?string $type=null,

        // @DataMember(Order=59)
        /** @var string|null */
        public ?string $recoveryToken=null,

        // @DataMember(Order=60)
        /** @var int|null */
        public ?int $refId=null,

        // @DataMember(Order=61)
        /** @var string|null */
        public ?string $refIdStr=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['referrerUrl'])) $this->referrerUrl = $o['referrerUrl'];
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['userAuthId'])) $this->userAuthId = $o['userAuthId'];
        if (isset($o['userAuthName'])) $this->userAuthName = $o['userAuthName'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['twitterUserId'])) $this->twitterUserId = $o['twitterUserId'];
        if (isset($o['twitterScreenName'])) $this->twitterScreenName = $o['twitterScreenName'];
        if (isset($o['facebookUserId'])) $this->facebookUserId = $o['facebookUserId'];
        if (isset($o['facebookUserName'])) $this->facebookUserName = $o['facebookUserName'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['displayName'])) $this->displayName = $o['displayName'];
        if (isset($o['company'])) $this->company = $o['company'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['primaryEmail'])) $this->primaryEmail = $o['primaryEmail'];
        if (isset($o['phoneNumber'])) $this->phoneNumber = $o['phoneNumber'];
        if (isset($o['birthDate'])) $this->birthDate = JsonConverters::from('DateTime', $o['birthDate']);
        if (isset($o['birthDateRaw'])) $this->birthDateRaw = $o['birthDateRaw'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['address2'])) $this->address2 = $o['address2'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['culture'])) $this->culture = $o['culture'];
        if (isset($o['fullName'])) $this->fullName = $o['fullName'];
        if (isset($o['gender'])) $this->gender = $o['gender'];
        if (isset($o['language'])) $this->language = $o['language'];
        if (isset($o['mailAddress'])) $this->mailAddress = $o['mailAddress'];
        if (isset($o['nickname'])) $this->nickname = $o['nickname'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['timeZone'])) $this->timeZone = $o['timeZone'];
        if (isset($o['requestTokenSecret'])) $this->requestTokenSecret = $o['requestTokenSecret'];
        if (isset($o['createdAt'])) $this->createdAt = JsonConverters::from('DateTime', $o['createdAt']);
        if (isset($o['lastModified'])) $this->lastModified = JsonConverters::from('DateTime', $o['lastModified']);
        if (isset($o['roles'])) $this->roles = JsonConverters::fromArray('string', $o['roles']);
        if (isset($o['permissions'])) $this->permissions = JsonConverters::fromArray('string', $o['permissions']);
        if (isset($o['isAuthenticated'])) $this->isAuthenticated = $o['isAuthenticated'];
        if (isset($o['fromToken'])) $this->fromToken = $o['fromToken'];
        if (isset($o['profileUrl'])) $this->profileUrl = $o['profileUrl'];
        if (isset($o['sequence'])) $this->sequence = $o['sequence'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
        if (isset($o['authProvider'])) $this->authProvider = $o['authProvider'];
        if (isset($o['providerOAuthAccess'])) $this->providerOAuthAccess = JsonConverters::fromArray('IAuthTokens', $o['providerOAuthAccess']);
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
        if (isset($o['audiences'])) $this->audiences = JsonConverters::fromArray('string', $o['audiences']);
        if (isset($o['scopes'])) $this->scopes = JsonConverters::fromArray('string', $o['scopes']);
        if (isset($o['dns'])) $this->dns = $o['dns'];
        if (isset($o['rsa'])) $this->rsa = $o['rsa'];
        if (isset($o['sid'])) $this->sid = $o['sid'];
        if (isset($o['hash'])) $this->hash = $o['hash'];
        if (isset($o['homePhone'])) $this->homePhone = $o['homePhone'];
        if (isset($o['mobilePhone'])) $this->mobilePhone = $o['mobilePhone'];
        if (isset($o['webpage'])) $this->webpage = $o['webpage'];
        if (isset($o['emailConfirmed'])) $this->emailConfirmed = $o['emailConfirmed'];
        if (isset($o['phoneNumberConfirmed'])) $this->phoneNumberConfirmed = $o['phoneNumberConfirmed'];
        if (isset($o['twoFactorEnabled'])) $this->twoFactorEnabled = $o['twoFactorEnabled'];
        if (isset($o['securityStamp'])) $this->securityStamp = $o['securityStamp'];
        if (isset($o['type'])) $this->type = $o['type'];
        if (isset($o['recoveryToken'])) $this->recoveryToken = $o['recoveryToken'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['refIdStr'])) $this->refIdStr = $o['refIdStr'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->referrerUrl)) $o['referrerUrl'] = $this->referrerUrl;
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->userAuthId)) $o['userAuthId'] = $this->userAuthId;
        if (isset($this->userAuthName)) $o['userAuthName'] = $this->userAuthName;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->twitterUserId)) $o['twitterUserId'] = $this->twitterUserId;
        if (isset($this->twitterScreenName)) $o['twitterScreenName'] = $this->twitterScreenName;
        if (isset($this->facebookUserId)) $o['facebookUserId'] = $this->facebookUserId;
        if (isset($this->facebookUserName)) $o['facebookUserName'] = $this->facebookUserName;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->displayName)) $o['displayName'] = $this->displayName;
        if (isset($this->company)) $o['company'] = $this->company;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->primaryEmail)) $o['primaryEmail'] = $this->primaryEmail;
        if (isset($this->phoneNumber)) $o['phoneNumber'] = $this->phoneNumber;
        if (isset($this->birthDate)) $o['birthDate'] = JsonConverters::to('DateTime', $this->birthDate);
        if (isset($this->birthDateRaw)) $o['birthDateRaw'] = $this->birthDateRaw;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->address2)) $o['address2'] = $this->address2;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->culture)) $o['culture'] = $this->culture;
        if (isset($this->fullName)) $o['fullName'] = $this->fullName;
        if (isset($this->gender)) $o['gender'] = $this->gender;
        if (isset($this->language)) $o['language'] = $this->language;
        if (isset($this->mailAddress)) $o['mailAddress'] = $this->mailAddress;
        if (isset($this->nickname)) $o['nickname'] = $this->nickname;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->timeZone)) $o['timeZone'] = $this->timeZone;
        if (isset($this->requestTokenSecret)) $o['requestTokenSecret'] = $this->requestTokenSecret;
        if (isset($this->createdAt)) $o['createdAt'] = JsonConverters::to('DateTime', $this->createdAt);
        if (isset($this->lastModified)) $o['lastModified'] = JsonConverters::to('DateTime', $this->lastModified);
        if (isset($this->roles)) $o['roles'] = JsonConverters::toArray('string', $this->roles);
        if (isset($this->permissions)) $o['permissions'] = JsonConverters::toArray('string', $this->permissions);
        if (isset($this->isAuthenticated)) $o['isAuthenticated'] = $this->isAuthenticated;
        if (isset($this->fromToken)) $o['fromToken'] = $this->fromToken;
        if (isset($this->profileUrl)) $o['profileUrl'] = $this->profileUrl;
        if (isset($this->sequence)) $o['sequence'] = $this->sequence;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        if (isset($this->authProvider)) $o['authProvider'] = $this->authProvider;
        if (isset($this->providerOAuthAccess)) $o['providerOAuthAccess'] = JsonConverters::toArray('IAuthTokens', $this->providerOAuthAccess);
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        if (isset($this->audiences)) $o['audiences'] = JsonConverters::toArray('string', $this->audiences);
        if (isset($this->scopes)) $o['scopes'] = JsonConverters::toArray('string', $this->scopes);
        if (isset($this->dns)) $o['dns'] = $this->dns;
        if (isset($this->rsa)) $o['rsa'] = $this->rsa;
        if (isset($this->sid)) $o['sid'] = $this->sid;
        if (isset($this->hash)) $o['hash'] = $this->hash;
        if (isset($this->homePhone)) $o['homePhone'] = $this->homePhone;
        if (isset($this->mobilePhone)) $o['mobilePhone'] = $this->mobilePhone;
        if (isset($this->webpage)) $o['webpage'] = $this->webpage;
        if (isset($this->emailConfirmed)) $o['emailConfirmed'] = $this->emailConfirmed;
        if (isset($this->phoneNumberConfirmed)) $o['phoneNumberConfirmed'] = $this->phoneNumberConfirmed;
        if (isset($this->twoFactorEnabled)) $o['twoFactorEnabled'] = $this->twoFactorEnabled;
        if (isset($this->securityStamp)) $o['securityStamp'] = $this->securityStamp;
        if (isset($this->type)) $o['type'] = $this->type;
        if (isset($this->recoveryToken)) $o['recoveryToken'] = $this->recoveryToken;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->refIdStr)) $o['refIdStr'] = $this->refIdStr;
        return empty($o) ? new class(){} : $o;
    }
}

class NestedClass implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $value=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['value'])) $this->value = $o['value'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->value)) $o['value'] = $this->value;
        return empty($o) ? new class(){} : $o;
    }
}

enum EnumType : string
{
    case Value1 = 'Value1';
    case Value2 = 'Value2';
    case Value3 = 'Value3';
}

// @Flags()
enum EnumTypeFlags : int
{
    case Value1 = 0;
    case Value2 = 1;
    case Value3 = 2;
}

enum EnumWithValues : string
{
    case None = 'None';
    case Value1 = 'Member 1';
    case Value2 = 'Value2';
}

// @Flags()
enum EnumFlags : int
{
    case Value0 = 0;
    case Value1 = 1;
    case Value2 = 2;
    case Value3 = 4;
    case Value123 = 7;
}

enum EnumAsInt : int
{
    case Value1 = 1000;
    case Value2 = 2000;
    case Value3 = 3000;
}

enum EnumStyle : string
{
    case lower = 'lower';
    case UPPER = 'UPPER';
    case PascalCase = 'PascalCase';
    case camelCase = 'camelCase';
    case camelUPPER = 'camelUPPER';
    case PascalUPPER = 'PascalUPPER';
}

enum EnumStyleMembers : string
{
    case Lower = 'lower';
    case Upper = 'UPPER';
    case PascalCase = 'PascalCase';
    case CamelCase = 'camelCase';
    case CamelUpper = 'camelUPPER';
    case PascalUpper = 'PascalUPPER';
}

class SubType implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
}

class AllTypesBase implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int|null */
        public ?int $nullableId=null,
        /** @var int */
        public int $byte=0,
        /** @var int */
        public int $short=0,
        /** @var int */
        public int $int=0,
        /** @var int */
        public int $long=0,
        /** @var int */
        public int $uShort=0,
        /** @var int */
        public int $uInt=0,
        /** @var int */
        public int $uLong=0,
        /** @var float */
        public float $float=0.0,
        /** @var float */
        public float $double=0.0,
        /** @var float */
        public float $decimal=0.0,
        /** @var string|null */
        public ?string $string=null,
        /** @var DateTime */
        public DateTime $dateTime=new DateTime(),
        /** @var DateInterval|null */
        public ?DateInterval $timeSpan=null,
        /** @var DateTime */
        public DateTime $dateTimeOffset=new DateTime(),
        /** @var string */
        public string $guid='',
        /** @var string */
        public string $char='',
        /** @var KeyValuePair2<string, string>|null */
        public ?KeyValuePair2 $keyValuePair=null,
        /** @var DateTime|null */
        public ?DateTime $nullableDateTime=null,
        /** @var DateInterval|null */
        public ?DateInterval $nullableTimeSpan=null,
        /** @var array<string>|null */
        public ?array $stringList=null,
        /** @var string[]|null */
        public ?array $stringArray=null,
        /** @var array<string,string>|null */
        public ?array $stringMap=null,
        /** @var array<string,string>|null */
        public ?array $intStringMap=null,
        /** @var SubType|null */
        public ?SubType $subType=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['nullableId'])) $this->nullableId = $o['nullableId'];
        if (isset($o['byte'])) $this->byte = $o['byte'];
        if (isset($o['short'])) $this->short = $o['short'];
        if (isset($o['int'])) $this->int = $o['int'];
        if (isset($o['long'])) $this->long = $o['long'];
        if (isset($o['uShort'])) $this->uShort = $o['uShort'];
        if (isset($o['uInt'])) $this->uInt = $o['uInt'];
        if (isset($o['uLong'])) $this->uLong = $o['uLong'];
        if (isset($o['float'])) $this->float = $o['float'];
        if (isset($o['double'])) $this->double = $o['double'];
        if (isset($o['decimal'])) $this->decimal = $o['decimal'];
        if (isset($o['string'])) $this->string = $o['string'];
        if (isset($o['dateTime'])) $this->dateTime = JsonConverters::from('DateTime', $o['dateTime']);
        if (isset($o['timeSpan'])) $this->timeSpan = JsonConverters::from('DateInterval', $o['timeSpan']);
        if (isset($o['dateTimeOffset'])) $this->dateTimeOffset = JsonConverters::from('DateTime', $o['dateTimeOffset']);
        if (isset($o['guid'])) $this->guid = $o['guid'];
        if (isset($o['char'])) $this->char = $o['char'];
        if (isset($o['keyValuePair'])) $this->keyValuePair = JsonConverters::from(JsonConverters::context('KeyValuePair2',genericArgs:['string','string']), $o['keyValuePair']);
        if (isset($o['nullableDateTime'])) $this->nullableDateTime = JsonConverters::from('DateTime', $o['nullableDateTime']);
        if (isset($o['nullableTimeSpan'])) $this->nullableTimeSpan = JsonConverters::from('TimeSpan', $o['nullableTimeSpan']);
        if (isset($o['stringList'])) $this->stringList = JsonConverters::fromArray('string', $o['stringList']);
        if (isset($o['stringArray'])) $this->stringArray = JsonConverters::fromArray('string', $o['stringArray']);
        if (isset($o['stringMap'])) $this->stringMap = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['stringMap']);
        if (isset($o['intStringMap'])) $this->intStringMap = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['int','string']), $o['intStringMap']);
        if (isset($o['subType'])) $this->subType = JsonConverters::from('SubType', $o['subType']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->nullableId)) $o['nullableId'] = $this->nullableId;
        if (isset($this->byte)) $o['byte'] = $this->byte;
        if (isset($this->short)) $o['short'] = $this->short;
        if (isset($this->int)) $o['int'] = $this->int;
        if (isset($this->long)) $o['long'] = $this->long;
        if (isset($this->uShort)) $o['uShort'] = $this->uShort;
        if (isset($this->uInt)) $o['uInt'] = $this->uInt;
        if (isset($this->uLong)) $o['uLong'] = $this->uLong;
        if (isset($this->float)) $o['float'] = $this->float;
        if (isset($this->double)) $o['double'] = $this->double;
        if (isset($this->decimal)) $o['decimal'] = $this->decimal;
        if (isset($this->string)) $o['string'] = $this->string;
        if (isset($this->dateTime)) $o['dateTime'] = JsonConverters::to('DateTime', $this->dateTime);
        if (isset($this->timeSpan)) $o['timeSpan'] = JsonConverters::to('DateInterval', $this->timeSpan);
        if (isset($this->dateTimeOffset)) $o['dateTimeOffset'] = JsonConverters::to('DateTime', $this->dateTimeOffset);
        if (isset($this->guid)) $o['guid'] = $this->guid;
        if (isset($this->char)) $o['char'] = $this->char;
        if (isset($this->keyValuePair)) $o['keyValuePair'] = JsonConverters::to(JsonConverters::context('KeyValuePair2',genericArgs:['string','string']), $this->keyValuePair);
        if (isset($this->nullableDateTime)) $o['nullableDateTime'] = JsonConverters::to('DateTime', $this->nullableDateTime);
        if (isset($this->nullableTimeSpan)) $o['nullableTimeSpan'] = JsonConverters::to('TimeSpan', $this->nullableTimeSpan);
        if (isset($this->stringList)) $o['stringList'] = JsonConverters::toArray('string', $this->stringList);
        if (isset($this->stringArray)) $o['stringArray'] = JsonConverters::toArray('string', $this->stringArray);
        if (isset($this->stringMap)) $o['stringMap'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->stringMap);
        if (isset($this->intStringMap)) $o['intStringMap'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['int','string']), $this->intStringMap);
        if (isset($this->subType)) $o['subType'] = JsonConverters::to('SubType', $this->subType);
        return empty($o) ? new class(){} : $o;
    }
}

class HelloBase implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
}

/**
 * @template T
 */
class HelloBase1 implements JsonSerializable
{
    public array $genericArgs = [];
    public static function create(array $genericArgs=[]): HelloBase1 {
        $to = new HelloBase1();
        $to->genericArgs = $genericArgs;
        return $to;
    }

    public function __construct(
        /** @var array<T>|null */
        public mixed $items=null,
        /** @var array<int>|null */
        public mixed $counts=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['items'])) $this->items = JsonConverters::fromArray($this->genericArgs[0], $o['items']);
        if (isset($o['counts'])) $this->counts = JsonConverters::fromArray('int', $o['counts']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->items)) $o['items'] = JsonConverters::toArray($this->genericArgs[0], $this->items);
        if (isset($this->counts)) $o['counts'] = JsonConverters::toArray('int', $this->counts);
        return empty($o) ? new class(){} : $o;
    }
}

/**
 * @property string|null $name
 */
interface IPoco
{
}

interface IEmptyInterface
{
}

class EmptyClass implements JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
}

enum DayOfWeek : string
{
    case Sunday = 'Sunday';
    case Monday = 'Monday';
    case Tuesday = 'Tuesday';
    case Wednesday = 'Wednesday';
    case Thursday = 'Thursday';
    case Friday = 'Friday';
    case Saturday = 'Saturday';
}

// @DataContract
enum ScopeType : int
{
    case Global = 1;
    case Sale = 2;
}

class Channel implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $value=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['value'])) $this->value = $o['value'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->value)) $o['value'] = $this->value;
        return empty($o) ? new class(){} : $o;
    }
}

class Device implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $type=null,
        /** @var int */
        public int $timeStamp=0,
        /** @var array<Channel>|null */
        public ?array $channels=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['type'])) $this->type = $o['type'];
        if (isset($o['timeStamp'])) $this->timeStamp = $o['timeStamp'];
        if (isset($o['channels'])) $this->channels = JsonConverters::fromArray('Channel', $o['channels']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->type)) $o['type'] = $this->type;
        if (isset($this->timeStamp)) $o['timeStamp'] = $this->timeStamp;
        if (isset($this->channels)) $o['channels'] = JsonConverters::toArray('Channel', $this->channels);
        return empty($o) ? new class(){} : $o;
    }
}

class Logger implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var array<Device>|null */
        public ?array $devices=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['devices'])) $this->devices = JsonConverters::fromArray('Device', $o['devices']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->devices)) $o['devices'] = JsonConverters::toArray('Device', $this->devices);
        return empty($o) ? new class(){} : $o;
    }
}

class Rockstar implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $firstName=null,
        /** @var string|null */
        public ?string $lastName=null,
        /** @var int|null */
        public ?int $age=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['age'])) $this->age = $o['age'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->age)) $o['age'] = $this->age;
        return empty($o) ? new class(){} : $o;
    }
}

/**
 * @template From
 * @template Into
 * @template QueryDb2 of From
 * @template QueryDb21 of Into
 */
class QueryDbTenant2 extends QueryDb2 implements JsonSerializable
{
    public array $genericArgs = [];
    public static function create(array $genericArgs=[]): QueryDbTenant2 {
        $to = new QueryDbTenant2();
        $to->genericArgs = $genericArgs;
        return $to;
    }

    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
}

enum LivingStatus : string
{
    case Alive = 'Alive';
    case Dead = 'Dead';
}

class RockstarAuditTenant extends AuditBase implements JsonSerializable
{
    /**
     * @param DateTime $createdDate
     * @param string $createdBy
     * @param DateTime $modifiedDate
     * @param string $modifiedBy
     * @param DateTime|null $deletedDate
     * @param string|null $deletedBy
     */
    public function __construct(
        DateTime $createdDate=new DateTime(),
        string $createdBy='',
        DateTime $modifiedDate=new DateTime(),
        string $modifiedBy='',
        ?DateTime $deletedDate=null,
        ?string $deletedBy=null,
        /** @var int */
        public int $tenantId=0,
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $firstName=null,
        /** @var string|null */
        public ?string $lastName=null,
        /** @var int|null */
        public ?int $age=null,
        /** @var DateTime */
        public DateTime $dateOfBirth=new DateTime(),
        /** @var DateTime|null */
        public ?DateTime $dateDied=null,
        /** @var LivingStatus|null */
        public ?LivingStatus $livingStatus=null
    ) {
        parent::__construct($createdDate,$createdBy,$modifiedDate,$modifiedBy,$deletedDate,$deletedBy);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['tenantId'])) $this->tenantId = $o['tenantId'];
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['age'])) $this->age = $o['age'];
        if (isset($o['dateOfBirth'])) $this->dateOfBirth = JsonConverters::from('DateTime', $o['dateOfBirth']);
        if (isset($o['dateDied'])) $this->dateDied = JsonConverters::from('DateTime', $o['dateDied']);
        if (isset($o['livingStatus'])) $this->livingStatus = JsonConverters::from('LivingStatus', $o['livingStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->tenantId)) $o['tenantId'] = $this->tenantId;
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->age)) $o['age'] = $this->age;
        if (isset($this->dateOfBirth)) $o['dateOfBirth'] = JsonConverters::to('DateTime', $this->dateOfBirth);
        if (isset($this->dateDied)) $o['dateDied'] = JsonConverters::to('DateTime', $this->dateDied);
        if (isset($this->livingStatus)) $o['livingStatus'] = JsonConverters::to('LivingStatus', $this->livingStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class RockstarBase implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $firstName=null,
        /** @var string|null */
        public ?string $lastName=null,
        /** @var int|null */
        public ?int $age=null,
        /** @var DateTime */
        public DateTime $dateOfBirth=new DateTime(),
        /** @var DateTime|null */
        public ?DateTime $dateDied=null,
        /** @var LivingStatus|null */
        public ?LivingStatus $livingStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['age'])) $this->age = $o['age'];
        if (isset($o['dateOfBirth'])) $this->dateOfBirth = JsonConverters::from('DateTime', $o['dateOfBirth']);
        if (isset($o['dateDied'])) $this->dateDied = JsonConverters::from('DateTime', $o['dateDied']);
        if (isset($o['livingStatus'])) $this->livingStatus = JsonConverters::from('LivingStatus', $o['livingStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->age)) $o['age'] = $this->age;
        if (isset($this->dateOfBirth)) $o['dateOfBirth'] = JsonConverters::to('DateTime', $this->dateOfBirth);
        if (isset($this->dateDied)) $o['dateDied'] = JsonConverters::to('DateTime', $this->dateDied);
        if (isset($this->livingStatus)) $o['livingStatus'] = JsonConverters::to('LivingStatus', $this->livingStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class RockstarAuto extends RockstarBase implements JsonSerializable
{
    /**
     * @param string|null $firstName
     * @param string|null $lastName
     * @param int|null $age
     * @param DateTime $dateOfBirth
     * @param DateTime|null $dateDied
     * @param LivingStatus|null $livingStatus
     */
    public function __construct(
        ?string $firstName=null,
        ?string $lastName=null,
        ?int $age=null,
        DateTime $dateOfBirth=new DateTime(),
        ?DateTime $dateDied=null,
        ?LivingStatus $livingStatus=null,
        /** @var int */
        public int $id=0
    ) {
        parent::__construct($firstName,$lastName,$age,$dateOfBirth,$dateDied,$livingStatus);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
}

class OnlyDefinedInGenericType implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
}

class OnlyDefinedInGenericTypeFrom implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
}

class OnlyDefinedInGenericTypeInto implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
}

class RockstarAudit extends RockstarBase implements JsonSerializable
{
    /**
     * @param string|null $firstName
     * @param string|null $lastName
     * @param int|null $age
     * @param DateTime $dateOfBirth
     * @param DateTime|null $dateDied
     * @param LivingStatus|null $livingStatus
     */
    public function __construct(
        ?string $firstName=null,
        ?string $lastName=null,
        ?int $age=null,
        DateTime $dateOfBirth=new DateTime(),
        ?DateTime $dateDied=null,
        ?LivingStatus $livingStatus=null,
        /** @var int */
        public int $id=0,
        /** @var DateTime */
        public DateTime $createdDate=new DateTime(),
        /** @var string|null */
        public ?string $createdBy=null,
        /** @var string|null */
        public ?string $createdInfo=null,
        /** @var DateTime */
        public DateTime $modifiedDate=new DateTime(),
        /** @var string|null */
        public ?string $modifiedBy=null,
        /** @var string|null */
        public ?string $modifiedInfo=null
    ) {
        parent::__construct($firstName,$lastName,$age,$dateOfBirth,$dateDied,$livingStatus);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['createdDate'])) $this->createdDate = JsonConverters::from('DateTime', $o['createdDate']);
        if (isset($o['createdBy'])) $this->createdBy = $o['createdBy'];
        if (isset($o['createdInfo'])) $this->createdInfo = $o['createdInfo'];
        if (isset($o['modifiedDate'])) $this->modifiedDate = JsonConverters::from('DateTime', $o['modifiedDate']);
        if (isset($o['modifiedBy'])) $this->modifiedBy = $o['modifiedBy'];
        if (isset($o['modifiedInfo'])) $this->modifiedInfo = $o['modifiedInfo'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->createdDate)) $o['createdDate'] = JsonConverters::to('DateTime', $this->createdDate);
        if (isset($this->createdBy)) $o['createdBy'] = $this->createdBy;
        if (isset($this->createdInfo)) $o['createdInfo'] = $this->createdInfo;
        if (isset($this->modifiedDate)) $o['modifiedDate'] = JsonConverters::to('DateTime', $this->modifiedDate);
        if (isset($this->modifiedBy)) $o['modifiedBy'] = $this->modifiedBy;
        if (isset($this->modifiedInfo)) $o['modifiedInfo'] = $this->modifiedInfo;
        return empty($o) ? new class(){} : $o;
    }
}

/**
 * @template Table
 * @template TResponse
 * @template ICreateDb of Table
 */
class CreateAuditBase2 implements ICreateDb, JsonSerializable
{
    public array $genericArgs = [];
    public static function create(array $genericArgs=[]): CreateAuditBase2 {
        $to = new CreateAuditBase2();
        $to->genericArgs = $genericArgs;
        return $to;
    }

    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
}

/**
 * @template Table
 * @template TResponse
 * @template CreateAuditBase2 of Table
 * @template CreateAuditBase21 of TResponse
 */
class CreateAuditTenantBase2 extends CreateAuditBase2 implements JsonSerializable
{
    public array $genericArgs = [];
    public static function create(array $genericArgs=[]): CreateAuditTenantBase2 {
        $to = new CreateAuditTenantBase2();
        $to->genericArgs = $genericArgs;
        return $to;
    }

    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
}

/**
 * @template Table
 * @template TResponse
 * @template IUpdateDb of Table
 */
class UpdateAuditBase2 implements IUpdateDb, JsonSerializable
{
    public array $genericArgs = [];
    public static function create(array $genericArgs=[]): UpdateAuditBase2 {
        $to = new UpdateAuditBase2();
        $to->genericArgs = $genericArgs;
        return $to;
    }

    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
}

/**
 * @template Table
 * @template TResponse
 * @template UpdateAuditBase2 of Table
 * @template UpdateAuditBase21 of TResponse
 */
class UpdateAuditTenantBase2 extends UpdateAuditBase2 implements JsonSerializable
{
    public array $genericArgs = [];
    public static function create(array $genericArgs=[]): UpdateAuditTenantBase2 {
        $to = new UpdateAuditTenantBase2();
        $to->genericArgs = $genericArgs;
        return $to;
    }

    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
}

/**
 * @template Table
 * @template TResponse
 * @template IPatchDb of Table
 */
class PatchAuditBase2 implements IPatchDb, JsonSerializable
{
    public array $genericArgs = [];
    public static function create(array $genericArgs=[]): PatchAuditBase2 {
        $to = new PatchAuditBase2();
        $to->genericArgs = $genericArgs;
        return $to;
    }

    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
}

/**
 * @template Table
 * @template TResponse
 * @template PatchAuditBase2 of Table
 * @template PatchAuditBase21 of TResponse
 */
class PatchAuditTenantBase2 extends PatchAuditBase2 implements JsonSerializable
{
    public array $genericArgs = [];
    public static function create(array $genericArgs=[]): PatchAuditTenantBase2 {
        $to = new PatchAuditTenantBase2();
        $to->genericArgs = $genericArgs;
        return $to;
    }

    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
}

/**
 * @template Table
 * @template TResponse
 * @template IUpdateDb of Table
 */
class SoftDeleteAuditBase2 implements IUpdateDb, JsonSerializable
{
    public array $genericArgs = [];
    public static function create(array $genericArgs=[]): SoftDeleteAuditBase2 {
        $to = new SoftDeleteAuditBase2();
        $to->genericArgs = $genericArgs;
        return $to;
    }

    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
}

/**
 * @template Table
 * @template TResponse
 * @template SoftDeleteAuditBase2 of Table
 * @template SoftDeleteAuditBase21 of TResponse
 */
class SoftDeleteAuditTenantBase2 extends SoftDeleteAuditBase2 implements JsonSerializable
{
    public array $genericArgs = [];
    public static function create(array $genericArgs=[]): SoftDeleteAuditTenantBase2 {
        $to = new SoftDeleteAuditTenantBase2();
        $to->genericArgs = $genericArgs;
        return $to;
    }

    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
}

class RockstarVersion extends RockstarBase implements JsonSerializable
{
    /**
     * @param string|null $firstName
     * @param string|null $lastName
     * @param int|null $age
     * @param DateTime $dateOfBirth
     * @param DateTime|null $dateDied
     * @param LivingStatus|null $livingStatus
     */
    public function __construct(
        ?string $firstName=null,
        ?string $lastName=null,
        ?int $age=null,
        DateTime $dateOfBirth=new DateTime(),
        ?DateTime $dateDied=null,
        ?LivingStatus $livingStatus=null,
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $rowVersion=0
    ) {
        parent::__construct($firstName,$lastName,$age,$dateOfBirth,$dateDied,$livingStatus);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['rowVersion'])) $this->rowVersion = $o['rowVersion'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->rowVersion)) $o['rowVersion'] = $this->rowVersion;
        return empty($o) ? new class(){} : $o;
    }
}

// @Route("/messages/crud/{Id}", "PUT")
/**
 * @template ISaveDb of MessageCrud
 */
class MessageCrud implements IReturnVoid, ISaveDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'MessageCrud'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): void {}
}

/** @description Output object for generated artifacts */
class ArtifactOutput implements JsonSerializable
{
    public function __construct(
        /** @description URL to access the generated image */
        // @ApiMember(Description="URL to access the generated image")
        /** @var string|null */
        public ?string $url=null,

        /** @description Filename of the generated image */
        // @ApiMember(Description="Filename of the generated image")
        /** @var string|null */
        public ?string $fileName=null,

        /** @description Provider used for image generation */
        // @ApiMember(Description="Provider used for image generation")
        /** @var string|null */
        public ?string $provider=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['url'])) $this->url = $o['url'];
        if (isset($o['fileName'])) $this->fileName = $o['fileName'];
        if (isset($o['provider'])) $this->provider = $o['provider'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->url)) $o['url'] = $this->url;
        if (isset($this->fileName)) $o['fileName'] = $this->fileName;
        if (isset($this->provider)) $o['provider'] = $this->provider;
        return empty($o) ? new class(){} : $o;
    }
}

/** @description Output object for generated text */
class TextOutput implements JsonSerializable
{
    public function __construct(
        /** @description The generated text */
        // @ApiMember(Description="The generated text")
        /** @var string|null */
        public ?string $text=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['text'])) $this->text = $o['text'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->text)) $o['text'] = $this->text;
        return empty($o) ? new class(){} : $o;
    }
}

class UploadInfo implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $name='',
        /** @var string */
        public string $fileName='',
        /** @var int */
        public int $contentLength=0,
        /** @var string */
        public string $contentType=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['fileName'])) $this->fileName = $o['fileName'];
        if (isset($o['contentLength'])) $this->contentLength = $o['contentLength'];
        if (isset($o['contentType'])) $this->contentType = $o['contentType'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->fileName)) $o['fileName'] = $this->fileName;
        if (isset($this->contentLength)) $o['contentLength'] = $this->contentLength;
        if (isset($this->contentType)) $o['contentType'] = $this->contentType;
        return empty($o) ? new class(){} : $o;
    }
}

class MetadataTestNestedChild implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
}

class MetadataTestChild implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null,
        /** @var array<MetadataTestNestedChild>|null */
        public ?array $results=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('MetadataTestNestedChild', $o['results']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('MetadataTestNestedChild', $this->results);
        return empty($o) ? new class(){} : $o;
    }
}

class MenuItemExampleItem implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        // @ApiMember()
        /** @var string|null */
        public ?string $name1=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name1'])) $this->name1 = $o['name1'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name1)) $o['name1'] = $this->name1;
        return empty($o) ? new class(){} : $o;
    }
}

class MenuItemExample implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        // @ApiMember()
        /** @var string|null */
        public ?string $name1=null,

        /** @var MenuItemExampleItem|null */
        public ?MenuItemExampleItem $menuItemExampleItem=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name1'])) $this->name1 = $o['name1'];
        if (isset($o['menuItemExampleItem'])) $this->menuItemExampleItem = JsonConverters::from('MenuItemExampleItem', $o['menuItemExampleItem']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name1)) $o['name1'] = $this->name1;
        if (isset($this->menuItemExampleItem)) $o['menuItemExampleItem'] = JsonConverters::to('MenuItemExampleItem', $this->menuItemExampleItem);
        return empty($o) ? new class(){} : $o;
    }
}

// @DataContract
class MenuExample implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        // @ApiMember()
        /** @var MenuItemExample|null */
        public ?MenuItemExample $menuItemExample1=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['menuItemExample1'])) $this->menuItemExample1 = JsonConverters::from('MenuItemExample', $o['menuItemExample1']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->menuItemExample1)) $o['menuItemExample1'] = JsonConverters::to('MenuItemExample', $this->menuItemExample1);
        return empty($o) ? new class(){} : $o;
    }
}

class ListResult implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $result=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = $o['result'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = $this->result;
        return empty($o) ? new class(){} : $o;
    }
}

class ArrayResult implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $result=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = $o['result'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = $this->result;
        return empty($o) ? new class(){} : $o;
    }
}

class HelloResponseBase implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $refId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['refId'])) $this->refId = $o['refId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->refId)) $o['refId'] = $this->refId;
        return empty($o) ? new class(){} : $o;
    }
}

class HelloWithReturnResponse implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $result=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = $o['result'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = $this->result;
        return empty($o) ? new class(){} : $o;
    }
}

class HelloType implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $result=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = $o['result'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = $this->result;
        return empty($o) ? new class(){} : $o;
    }
}

class InnerType implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
}

enum InnerEnum : string
{
    case Foo = 'Foo';
    case Bar = 'Bar';
    case Baz = 'Baz';
}

class ReturnedDto implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
}

class CustomUserSession extends AuthUserSession implements JsonSerializable
{
    /**
     * @param string|null $referrerUrl
     * @param string|null $id
     * @param string|null $userAuthId
     * @param string|null $userAuthName
     * @param string|null $userName
     * @param string|null $twitterUserId
     * @param string|null $twitterScreenName
     * @param string|null $facebookUserId
     * @param string|null $facebookUserName
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $displayName
     * @param string|null $company
     * @param string|null $email
     * @param string|null $primaryEmail
     * @param string|null $phoneNumber
     * @param DateTime|null $birthDate
     * @param string|null $birthDateRaw
     * @param string|null $address
     * @param string|null $address2
     * @param string|null $city
     * @param string|null $state
     * @param string|null $country
     * @param string|null $culture
     * @param string|null $fullName
     * @param string|null $gender
     * @param string|null $language
     * @param string|null $mailAddress
     * @param string|null $nickname
     * @param string|null $postalCode
     * @param string|null $timeZone
     * @param string|null $requestTokenSecret
     * @param DateTime $createdAt
     * @param DateTime $lastModified
     * @param array<string>|null $roles
     * @param array<string>|null $permissions
     * @param bool|null $isAuthenticated
     * @param bool|null $fromToken
     * @param string|null $profileUrl
     * @param string|null $sequence
     * @param int $tag
     * @param string|null $authProvider
     * @param array<IAuthTokens>|null $providerOAuthAccess
     * @param array<string,string>|null $meta
     * @param array<string>|null $audiences
     * @param array<string>|null $scopes
     * @param string|null $dns
     * @param string|null $rsa
     * @param string|null $sid
     * @param string|null $hash
     * @param string|null $homePhone
     * @param string|null $mobilePhone
     * @param string|null $webpage
     * @param bool|null $emailConfirmed
     * @param bool|null $phoneNumberConfirmed
     * @param bool|null $twoFactorEnabled
     * @param string|null $securityStamp
     * @param string|null $type
     * @param string|null $recoveryToken
     * @param int|null $refId
     * @param string|null $refIdStr
     */
    public function __construct(
        ?string $referrerUrl=null,
        ?string $id=null,
        ?string $userAuthId=null,
        ?string $userAuthName=null,
        ?string $userName=null,
        ?string $twitterUserId=null,
        ?string $twitterScreenName=null,
        ?string $facebookUserId=null,
        ?string $facebookUserName=null,
        ?string $firstName=null,
        ?string $lastName=null,
        ?string $displayName=null,
        ?string $company=null,
        ?string $email=null,
        ?string $primaryEmail=null,
        ?string $phoneNumber=null,
        ?DateTime $birthDate=null,
        ?string $birthDateRaw=null,
        ?string $address=null,
        ?string $address2=null,
        ?string $city=null,
        ?string $state=null,
        ?string $country=null,
        ?string $culture=null,
        ?string $fullName=null,
        ?string $gender=null,
        ?string $language=null,
        ?string $mailAddress=null,
        ?string $nickname=null,
        ?string $postalCode=null,
        ?string $timeZone=null,
        ?string $requestTokenSecret=null,
        DateTime $createdAt=new DateTime(),
        DateTime $lastModified=new DateTime(),
        ?array $roles=null,
        ?array $permissions=null,
        ?bool $isAuthenticated=null,
        ?bool $fromToken=null,
        ?string $profileUrl=null,
        ?string $sequence=null,
        int $tag=0,
        ?string $authProvider=null,
        ?array $providerOAuthAccess=null,
        ?array $meta=null,
        ?array $audiences=null,
        ?array $scopes=null,
        ?string $dns=null,
        ?string $rsa=null,
        ?string $sid=null,
        ?string $hash=null,
        ?string $homePhone=null,
        ?string $mobilePhone=null,
        ?string $webpage=null,
        ?bool $emailConfirmed=null,
        ?bool $phoneNumberConfirmed=null,
        ?bool $twoFactorEnabled=null,
        ?string $securityStamp=null,
        ?string $type=null,
        ?string $recoveryToken=null,
        ?int $refId=null,
        ?string $refIdStr=null,
        // @DataMember
        /** @var string|null */
        public ?string $customName=null,

        // @DataMember
        /** @var string|null */
        public ?string $customInfo=null
    ) {
        parent::__construct($referrerUrl,$id,$userAuthId,$userAuthName,$userName,$twitterUserId,$twitterScreenName,$facebookUserId,$facebookUserName,$firstName,$lastName,$displayName,$company,$email,$primaryEmail,$phoneNumber,$birthDate,$birthDateRaw,$address,$address2,$city,$state,$country,$culture,$fullName,$gender,$language,$mailAddress,$nickname,$postalCode,$timeZone,$requestTokenSecret,$createdAt,$lastModified,$roles,$permissions,$isAuthenticated,$fromToken,$profileUrl,$sequence,$tag,$authProvider,$providerOAuthAccess,$meta,$audiences,$scopes,$dns,$rsa,$sid,$hash,$homePhone,$mobilePhone,$webpage,$emailConfirmed,$phoneNumberConfirmed,$twoFactorEnabled,$securityStamp,$type,$recoveryToken,$refId,$refIdStr);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['customName'])) $this->customName = $o['customName'];
        if (isset($o['customInfo'])) $this->customInfo = $o['customInfo'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->customName)) $o['customName'] = $this->customName;
        if (isset($this->customInfo)) $o['customInfo'] = $this->customInfo;
        return empty($o) ? new class(){} : $o;
    }
}

class UnAuthInfo implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $customInfo=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['customInfo'])) $this->customInfo = $o['customInfo'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->customInfo)) $o['customInfo'] = $this->customInfo;
        return empty($o) ? new class(){} : $o;
    }
}

class TypesGroup implements JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
}

class ChatMessage implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $channel=null,
        /** @var string|null */
        public ?string $fromUserId=null,
        /** @var string|null */
        public ?string $fromName=null,
        /** @var string|null */
        public ?string $displayName=null,
        /** @var string|null */
        public ?string $message=null,
        /** @var string|null */
        public ?string $userAuthId=null,
        /** @var bool|null */
        public ?bool $private=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['channel'])) $this->channel = $o['channel'];
        if (isset($o['fromUserId'])) $this->fromUserId = $o['fromUserId'];
        if (isset($o['fromName'])) $this->fromName = $o['fromName'];
        if (isset($o['displayName'])) $this->displayName = $o['displayName'];
        if (isset($o['message'])) $this->message = $o['message'];
        if (isset($o['userAuthId'])) $this->userAuthId = $o['userAuthId'];
        if (isset($o['private'])) $this->private = $o['private'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->channel)) $o['channel'] = $this->channel;
        if (isset($this->fromUserId)) $o['fromUserId'] = $this->fromUserId;
        if (isset($this->fromName)) $o['fromName'] = $this->fromName;
        if (isset($this->displayName)) $o['displayName'] = $this->displayName;
        if (isset($this->message)) $o['message'] = $this->message;
        if (isset($this->userAuthId)) $o['userAuthId'] = $this->userAuthId;
        if (isset($this->private)) $o['private'] = $this->private;
        return empty($o) ? new class(){} : $o;
    }
}

class GetChatHistoryResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<ChatMessage>|null */
        public ?array $results=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('ChatMessage', $o['results']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('ChatMessage', $this->results);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class GetUserDetailsResponse implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $provider=null,
        /** @var string|null */
        public ?string $userId=null,
        /** @var string|null */
        public ?string $userName=null,
        /** @var string|null */
        public ?string $fullName=null,
        /** @var string|null */
        public ?string $displayName=null,
        /** @var string|null */
        public ?string $firstName=null,
        /** @var string|null */
        public ?string $lastName=null,
        /** @var string|null */
        public ?string $company=null,
        /** @var string|null */
        public ?string $email=null,
        /** @var string|null */
        public ?string $phoneNumber=null,
        /** @var DateTime|null */
        public ?DateTime $birthDate=null,
        /** @var string|null */
        public ?string $birthDateRaw=null,
        /** @var string|null */
        public ?string $address=null,
        /** @var string|null */
        public ?string $address2=null,
        /** @var string|null */
        public ?string $city=null,
        /** @var string|null */
        public ?string $state=null,
        /** @var string|null */
        public ?string $country=null,
        /** @var string|null */
        public ?string $culture=null,
        /** @var string|null */
        public ?string $gender=null,
        /** @var string|null */
        public ?string $language=null,
        /** @var string|null */
        public ?string $mailAddress=null,
        /** @var string|null */
        public ?string $nickname=null,
        /** @var string|null */
        public ?string $postalCode=null,
        /** @var string|null */
        public ?string $timeZone=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['provider'])) $this->provider = $o['provider'];
        if (isset($o['userId'])) $this->userId = $o['userId'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['fullName'])) $this->fullName = $o['fullName'];
        if (isset($o['displayName'])) $this->displayName = $o['displayName'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['company'])) $this->company = $o['company'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['phoneNumber'])) $this->phoneNumber = $o['phoneNumber'];
        if (isset($o['birthDate'])) $this->birthDate = JsonConverters::from('DateTime', $o['birthDate']);
        if (isset($o['birthDateRaw'])) $this->birthDateRaw = $o['birthDateRaw'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['address2'])) $this->address2 = $o['address2'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['culture'])) $this->culture = $o['culture'];
        if (isset($o['gender'])) $this->gender = $o['gender'];
        if (isset($o['language'])) $this->language = $o['language'];
        if (isset($o['mailAddress'])) $this->mailAddress = $o['mailAddress'];
        if (isset($o['nickname'])) $this->nickname = $o['nickname'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['timeZone'])) $this->timeZone = $o['timeZone'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->provider)) $o['provider'] = $this->provider;
        if (isset($this->userId)) $o['userId'] = $this->userId;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->fullName)) $o['fullName'] = $this->fullName;
        if (isset($this->displayName)) $o['displayName'] = $this->displayName;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->company)) $o['company'] = $this->company;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->phoneNumber)) $o['phoneNumber'] = $this->phoneNumber;
        if (isset($this->birthDate)) $o['birthDate'] = JsonConverters::to('DateTime', $this->birthDate);
        if (isset($this->birthDateRaw)) $o['birthDateRaw'] = $this->birthDateRaw;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->address2)) $o['address2'] = $this->address2;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->culture)) $o['culture'] = $this->culture;
        if (isset($this->gender)) $o['gender'] = $this->gender;
        if (isset($this->language)) $o['language'] = $this->language;
        if (isset($this->mailAddress)) $o['mailAddress'] = $this->mailAddress;
        if (isset($this->nickname)) $o['nickname'] = $this->nickname;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->timeZone)) $o['timeZone'] = $this->timeZone;
        return empty($o) ? new class(){} : $o;
    }
}

class CustomHttpErrorResponse implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $custom=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['custom'])) $this->custom = $o['custom'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->custom)) $o['custom'] = $this->custom;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

/**
 * @template T
 */
class QueryResponseAlt implements JsonSerializable
{
    public array $genericArgs = [];
    public static function create(array $genericArgs=[]): QueryResponseAlt {
        $to = new QueryResponseAlt();
        $to->genericArgs = $genericArgs;
        return $to;
    }

    public function __construct(
        /** @var int */
        public mixed $offset=0,
        /** @var int */
        public mixed $total=0,
        /** @var array<Item>|null */
        public mixed $results=null,
        /** @var array<string,string>|null */
        public mixed $meta=null,
        /** @var ResponseStatus|null */
        public mixed $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['offset'])) $this->offset = $o['offset'];
        if (isset($o['total'])) $this->total = $o['total'];
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('Item', $o['results']);
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->offset)) $o['offset'] = $this->offset;
        if (isset($this->total)) $o['total'] = $this->total;
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('Item', $this->results);
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class Items implements JsonSerializable
{
    public function __construct(
        /** @var array<Item>|null */
        public ?array $results=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('Item', $o['results']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('Item', $this->results);
        return empty($o) ? new class(){} : $o;
    }
}

class ReturnCustom400Response implements JsonSerializable
{
    public function __construct(
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class ThrowTypeResponse implements JsonSerializable
{
    public function __construct(
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class ThrowValidationResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $age=0,
        /** @var string|null */
        public ?string $required=null,
        /** @var string|null */
        public ?string $email=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['age'])) $this->age = $o['age'];
        if (isset($o['required'])) $this->required = $o['required'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->age)) $o['age'] = $this->age;
        if (isset($this->required)) $o['required'] = $this->required;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class ThrowBusinessErrorResponse implements JsonSerializable
{
    public function __construct(
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

/** @description Response object for generation requests */
class GenerationResponse implements JsonSerializable
{
    public function __construct(
        /** @description List of generated outputs */
        // @ApiMember(Description="List of generated outputs")
        /** @var array<ArtifactOutput>|null */
        public ?array $outputs=null,

        /** @description List of generated text outputs */
        // @ApiMember(Description="List of generated text outputs")
        /** @var array<TextOutput>|null */
        public ?array $textOutputs=null,

        /** @description Detailed response status information */
        // @ApiMember(Description="Detailed response status information")
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['outputs'])) $this->outputs = JsonConverters::fromArray('ArtifactOutput', $o['outputs']);
        if (isset($o['textOutputs'])) $this->textOutputs = JsonConverters::fromArray('TextOutput', $o['textOutputs']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->outputs)) $o['outputs'] = JsonConverters::toArray('ArtifactOutput', $this->outputs);
        if (isset($this->textOutputs)) $o['textOutputs'] = JsonConverters::toArray('TextOutput', $this->textOutputs);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class TestFileUploadsResponse implements JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $id=null,
        /** @var string|null */
        public ?string $refId=null,
        /** @var array<UploadInfo>|null */
        public ?array $files=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['files'])) $this->files = JsonConverters::fromArray('UploadInfo', $o['files']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->files)) $o['files'] = JsonConverters::toArray('UploadInfo', $this->files);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class Account implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
}

class Project implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $account=null,
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['account'])) $this->account = $o['account'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->account)) $o['account'] = $this->account;
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
}

class SecuredResponse implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $result=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = $o['result'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = $this->result;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class CreateJwtResponse implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $token=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['token'])) $this->token = $o['token'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->token)) $o['token'] = $this->token;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class CreateRefreshJwtResponse implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $token=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['token'])) $this->token = $o['token'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->token)) $o['token'] = $this->token;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class MetadataTestResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var array<MetadataTestChild>|null */
        public ?array $results=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('MetadataTestChild', $o['results']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('MetadataTestChild', $this->results);
        return empty($o) ? new class(){} : $o;
    }
}

// @DataContract
class GetExampleResponse implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null,

        // @DataMember(Order=2)
        // @ApiMember()
        /** @var MenuExample|null */
        public ?MenuExample $menuExample1=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
        if (isset($o['menuExample1'])) $this->menuExample1 = JsonConverters::from('MenuExample', $o['menuExample1']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        if (isset($this->menuExample1)) $o['menuExample1'] = JsonConverters::to('MenuExample', $this->menuExample1);
        return empty($o) ? new class(){} : $o;
    }
}

// @Route("/messages/{Id}", "PUT")
#[Returns('Message')]
class Message implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'Message'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new Message(); }
}

class GetRandomIdsResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<string>|null */
        public ?array $results=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('string', $o['results']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('string', $this->results);
        return empty($o) ? new class(){} : $o;
    }
}

class HelloResponse implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $result=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = $o['result'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = $this->result;
        return empty($o) ? new class(){} : $o;
    }
}

/** @description Description on HelloAllResponse type */
// @DataContract
class HelloAnnotatedResponse implements JsonSerializable
{
    public function __construct(
        // @DataMember
        /** @var string|null */
        public ?string $result=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = $o['result'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = $this->result;
        return empty($o) ? new class(){} : $o;
    }
}

#[Returns('AllTypes')]
class AllTypes implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int|null */
        public ?int $nullableId=null,
        /** @var int */
        public int $byte=0,
        /** @var int */
        public int $short=0,
        /** @var int */
        public int $int=0,
        /** @var int */
        public int $long=0,
        /** @var int */
        public int $uShort=0,
        /** @var int */
        public int $uInt=0,
        /** @var int */
        public int $uLong=0,
        /** @var float */
        public float $float=0.0,
        /** @var float */
        public float $double=0.0,
        /** @var float */
        public float $decimal=0.0,
        /** @var string|null */
        public ?string $string=null,
        /** @var DateTime */
        public DateTime $dateTime=new DateTime(),
        /** @var DateInterval|null */
        public ?DateInterval $timeSpan=null,
        /** @var DateTime */
        public DateTime $dateTimeOffset=new DateTime(),
        /** @var string */
        public string $guid='',
        /** @var string */
        public string $char='',
        /** @var KeyValuePair2<string, string>|null */
        public ?KeyValuePair2 $keyValuePair=null,
        /** @var DateTime|null */
        public ?DateTime $nullableDateTime=null,
        /** @var DateInterval|null */
        public ?DateInterval $nullableTimeSpan=null,
        /** @var array<string>|null */
        public ?array $stringList=null,
        /** @var string[]|null */
        public ?array $stringArray=null,
        /** @var array<string,string>|null */
        public ?array $stringMap=null,
        /** @var array<string,string>|null */
        public ?array $intStringMap=null,
        /** @var SubType|null */
        public ?SubType $subType=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['nullableId'])) $this->nullableId = $o['nullableId'];
        if (isset($o['byte'])) $this->byte = $o['byte'];
        if (isset($o['short'])) $this->short = $o['short'];
        if (isset($o['int'])) $this->int = $o['int'];
        if (isset($o['long'])) $this->long = $o['long'];
        if (isset($o['uShort'])) $this->uShort = $o['uShort'];
        if (isset($o['uInt'])) $this->uInt = $o['uInt'];
        if (isset($o['uLong'])) $this->uLong = $o['uLong'];
        if (isset($o['float'])) $this->float = $o['float'];
        if (isset($o['double'])) $this->double = $o['double'];
        if (isset($o['decimal'])) $this->decimal = $o['decimal'];
        if (isset($o['string'])) $this->string = $o['string'];
        if (isset($o['dateTime'])) $this->dateTime = JsonConverters::from('DateTime', $o['dateTime']);
        if (isset($o['timeSpan'])) $this->timeSpan = JsonConverters::from('DateInterval', $o['timeSpan']);
        if (isset($o['dateTimeOffset'])) $this->dateTimeOffset = JsonConverters::from('DateTime', $o['dateTimeOffset']);
        if (isset($o['guid'])) $this->guid = $o['guid'];
        if (isset($o['char'])) $this->char = $o['char'];
        if (isset($o['keyValuePair'])) $this->keyValuePair = JsonConverters::from(JsonConverters::context('KeyValuePair2',genericArgs:['string','string']), $o['keyValuePair']);
        if (isset($o['nullableDateTime'])) $this->nullableDateTime = JsonConverters::from('DateTime', $o['nullableDateTime']);
        if (isset($o['nullableTimeSpan'])) $this->nullableTimeSpan = JsonConverters::from('TimeSpan', $o['nullableTimeSpan']);
        if (isset($o['stringList'])) $this->stringList = JsonConverters::fromArray('string', $o['stringList']);
        if (isset($o['stringArray'])) $this->stringArray = JsonConverters::fromArray('string', $o['stringArray']);
        if (isset($o['stringMap'])) $this->stringMap = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['stringMap']);
        if (isset($o['intStringMap'])) $this->intStringMap = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['int','string']), $o['intStringMap']);
        if (isset($o['subType'])) $this->subType = JsonConverters::from('SubType', $o['subType']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->nullableId)) $o['nullableId'] = $this->nullableId;
        if (isset($this->byte)) $o['byte'] = $this->byte;
        if (isset($this->short)) $o['short'] = $this->short;
        if (isset($this->int)) $o['int'] = $this->int;
        if (isset($this->long)) $o['long'] = $this->long;
        if (isset($this->uShort)) $o['uShort'] = $this->uShort;
        if (isset($this->uInt)) $o['uInt'] = $this->uInt;
        if (isset($this->uLong)) $o['uLong'] = $this->uLong;
        if (isset($this->float)) $o['float'] = $this->float;
        if (isset($this->double)) $o['double'] = $this->double;
        if (isset($this->decimal)) $o['decimal'] = $this->decimal;
        if (isset($this->string)) $o['string'] = $this->string;
        if (isset($this->dateTime)) $o['dateTime'] = JsonConverters::to('DateTime', $this->dateTime);
        if (isset($this->timeSpan)) $o['timeSpan'] = JsonConverters::to('DateInterval', $this->timeSpan);
        if (isset($this->dateTimeOffset)) $o['dateTimeOffset'] = JsonConverters::to('DateTime', $this->dateTimeOffset);
        if (isset($this->guid)) $o['guid'] = $this->guid;
        if (isset($this->char)) $o['char'] = $this->char;
        if (isset($this->keyValuePair)) $o['keyValuePair'] = JsonConverters::to(JsonConverters::context('KeyValuePair2',genericArgs:['string','string']), $this->keyValuePair);
        if (isset($this->nullableDateTime)) $o['nullableDateTime'] = JsonConverters::to('DateTime', $this->nullableDateTime);
        if (isset($this->nullableTimeSpan)) $o['nullableTimeSpan'] = JsonConverters::to('TimeSpan', $this->nullableTimeSpan);
        if (isset($this->stringList)) $o['stringList'] = JsonConverters::toArray('string', $this->stringList);
        if (isset($this->stringArray)) $o['stringArray'] = JsonConverters::toArray('string', $this->stringArray);
        if (isset($this->stringMap)) $o['stringMap'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->stringMap);
        if (isset($this->intStringMap)) $o['intStringMap'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['int','string']), $this->intStringMap);
        if (isset($this->subType)) $o['subType'] = JsonConverters::to('SubType', $this->subType);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'AllTypes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new AllTypes(); }
}

#[Returns('AllCollectionTypes')]
class AllCollectionTypes implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int[]|null */
        public ?array $intArray=null,
        /** @var array<int>|null */
        public ?array $intList=null,
        /** @var string[]|null */
        public ?array $stringArray=null,
        /** @var array<string>|null */
        public ?array $stringList=null,
        /** @var float[]|null */
        public ?array $floatArray=null,
        /** @var array<float>|null */
        public ?array $doubleList=null,
        /** @var ByteArray|null */
        public ?ByteArray $byteArray=null,
        /** @var string[]|null */
        public ?array $charArray=null,
        /** @var array<float>|null */
        public ?array $decimalList=null,
        /** @var Poco[]|null */
        public ?array $pocoArray=null,
        /** @var array<Poco>|null */
        public ?array $pocoList=null,
        /** @var array<string,Poco[]>|null */
        public ?array $pocoLookup=null,
        /** @var array<string,array<string,Poco>[]>|null */
        public ?array $pocoLookupMap=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['intArray'])) $this->intArray = JsonConverters::fromArray('int', $o['intArray']);
        if (isset($o['intList'])) $this->intList = JsonConverters::fromArray('int', $o['intList']);
        if (isset($o['stringArray'])) $this->stringArray = JsonConverters::fromArray('string', $o['stringArray']);
        if (isset($o['stringList'])) $this->stringList = JsonConverters::fromArray('string', $o['stringList']);
        if (isset($o['floatArray'])) $this->floatArray = JsonConverters::fromArray('float', $o['floatArray']);
        if (isset($o['doubleList'])) $this->doubleList = JsonConverters::fromArray('float', $o['doubleList']);
        if (isset($o['byteArray'])) $this->byteArray = JsonConverters::from('ByteArray', $o['byteArray']);
        if (isset($o['charArray'])) $this->charArray = JsonConverters::fromArray('string', $o['charArray']);
        if (isset($o['decimalList'])) $this->decimalList = JsonConverters::fromArray('float', $o['decimalList']);
        if (isset($o['pocoArray'])) $this->pocoArray = JsonConverters::fromArray('Poco', $o['pocoArray']);
        if (isset($o['pocoList'])) $this->pocoList = JsonConverters::fromArray('Poco', $o['pocoList']);
        if (isset($o['pocoLookup'])) $this->pocoLookup = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','List<Poco>']), $o['pocoLookup']);
        if (isset($o['pocoLookupMap'])) $this->pocoLookupMap = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','List<Dictionary<String,Poco>>']), $o['pocoLookupMap']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->intArray)) $o['intArray'] = JsonConverters::toArray('int', $this->intArray);
        if (isset($this->intList)) $o['intList'] = JsonConverters::toArray('int', $this->intList);
        if (isset($this->stringArray)) $o['stringArray'] = JsonConverters::toArray('string', $this->stringArray);
        if (isset($this->stringList)) $o['stringList'] = JsonConverters::toArray('string', $this->stringList);
        if (isset($this->floatArray)) $o['floatArray'] = JsonConverters::toArray('float', $this->floatArray);
        if (isset($this->doubleList)) $o['doubleList'] = JsonConverters::toArray('float', $this->doubleList);
        if (isset($this->byteArray)) $o['byteArray'] = JsonConverters::to('ByteArray', $this->byteArray);
        if (isset($this->charArray)) $o['charArray'] = JsonConverters::toArray('string', $this->charArray);
        if (isset($this->decimalList)) $o['decimalList'] = JsonConverters::toArray('float', $this->decimalList);
        if (isset($this->pocoArray)) $o['pocoArray'] = JsonConverters::toArray('Poco', $this->pocoArray);
        if (isset($this->pocoList)) $o['pocoList'] = JsonConverters::toArray('Poco', $this->pocoList);
        if (isset($this->pocoLookup)) $o['pocoLookup'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','List<Poco>']), $this->pocoLookup);
        if (isset($this->pocoLookupMap)) $o['pocoLookupMap'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','List<Dictionary<String,Poco>>']), $this->pocoLookupMap);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'AllCollectionTypes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new AllCollectionTypes(); }
}

class HelloAllTypesResponse implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $result=null,
        /** @var AllTypes|null */
        public ?AllTypes $allTypes=null,
        /** @var AllCollectionTypes|null */
        public ?AllCollectionTypes $allCollectionTypes=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = $o['result'];
        if (isset($o['allTypes'])) $this->allTypes = JsonConverters::from('AllTypes', $o['allTypes']);
        if (isset($o['allCollectionTypes'])) $this->allCollectionTypes = JsonConverters::from('AllCollectionTypes', $o['allCollectionTypes']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = $this->result;
        if (isset($this->allTypes)) $o['allTypes'] = JsonConverters::to('AllTypes', $this->allTypes);
        if (isset($this->allCollectionTypes)) $o['allCollectionTypes'] = JsonConverters::to('AllCollectionTypes', $this->allCollectionTypes);
        return empty($o) ? new class(){} : $o;
    }
}

class SubAllTypes extends AllTypesBase implements JsonSerializable
{
    /**
     * @param int $id
     * @param int|null $nullableId
     * @param int $byte
     * @param int $short
     * @param int $int
     * @param int $long
     * @param int $uShort
     * @param int $uInt
     * @param int $uLong
     * @param float $float
     * @param float $double
     * @param float $decimal
     * @param string|null $string
     * @param DateTime $dateTime
     * @param DateInterval|null $timeSpan
     * @param DateTime $dateTimeOffset
     * @param string $guid
     * @param string $char
     * @param KeyValuePair2<string, string>|null $keyValuePair
     * @param DateTime|null $nullableDateTime
     * @param DateInterval|null $nullableTimeSpan
     * @param array<string>|null $stringList
     * @param string[]|null $stringArray
     * @param array<string,string>|null $stringMap
     * @param array<string,string>|null $intStringMap
     * @param SubType|null $subType
     */
    public function __construct(
        int $id=0,
        ?int $nullableId=null,
        int $byte=0,
        int $short=0,
        int $int=0,
        int $long=0,
        int $uShort=0,
        int $uInt=0,
        int $uLong=0,
        float $float=0.0,
        float $double=0.0,
        float $decimal=0.0,
        ?string $string=null,
        DateTime $dateTime=new DateTime(),
        ?DateInterval $timeSpan=null,
        DateTime $dateTimeOffset=new DateTime(),
        string $guid='',
        string $char='',
        ?KeyValuePair2 $keyValuePair=null,
        ?DateTime $nullableDateTime=null,
        ?DateInterval $nullableTimeSpan=null,
        ?array $stringList=null,
        ?array $stringArray=null,
        ?array $stringMap=null,
        ?array $intStringMap=null,
        ?SubType $subType=null,
        /** @var int */
        public int $hierarchy=0
    ) {
        parent::__construct($id,$nullableId,$byte,$short,$int,$long,$uShort,$uInt,$uLong,$float,$double,$decimal,$string,$dateTime,$timeSpan,$dateTimeOffset,$guid,$char,$keyValuePair,$nullableDateTime,$nullableTimeSpan,$stringList,$stringArray,$stringMap,$intStringMap,$subType);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['hierarchy'])) $this->hierarchy = $o['hierarchy'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->hierarchy)) $o['hierarchy'] = $this->hierarchy;
        return empty($o) ? new class(){} : $o;
    }
}

#[Returns('HelloDateTime')]
class HelloDateTime implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var DateTime */
        public DateTime $dateTime=new DateTime()
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['dateTime'])) $this->dateTime = JsonConverters::from('DateTime', $o['dateTime']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->dateTime)) $o['dateTime'] = JsonConverters::to('DateTime', $this->dateTime);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloDateTime'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new HelloDateTime(); }
}

// @DataContract
class HelloWithDataContractResponse implements JsonSerializable
{
    public function __construct(
        // @DataMember(Name="result", Order=1, IsRequired=true, EmitDefaultValue=false)
        /** @var string|null */
        public ?string $result=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = $o['result'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = $this->result;
        return empty($o) ? new class(){} : $o;
    }
}

/** @description Description on HelloWithDescriptionResponse type */
class HelloWithDescriptionResponse implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $result=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = $o['result'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = $this->result;
        return empty($o) ? new class(){} : $o;
    }
}

class HelloWithInheritanceResponse extends HelloResponseBase implements JsonSerializable
{
    /**
     * @param int $refId
     */
    public function __construct(
        int $refId=0,
        /** @var string|null */
        public ?string $result=null
    ) {
        parent::__construct($refId);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['result'])) $this->result = $o['result'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->result)) $o['result'] = $this->result;
        return empty($o) ? new class(){} : $o;
    }
}

class HelloWithAlternateReturnResponse extends HelloWithReturnResponse implements JsonSerializable
{
    /**
     * @param string|null $result
     */
    public function __construct(
        ?string $result=null,
        /** @var string|null */
        public ?string $altResult=null
    ) {
        parent::__construct($result);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['altResult'])) $this->altResult = $o['altResult'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->altResult)) $o['altResult'] = $this->altResult;
        return empty($o) ? new class(){} : $o;
    }
}

class HelloWithRouteResponse implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $result=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = $o['result'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = $this->result;
        return empty($o) ? new class(){} : $o;
    }
}

class HelloWithTypeResponse implements JsonSerializable
{
    public function __construct(
        /** @var HelloType|null */
        public ?HelloType $result=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = JsonConverters::from('HelloType', $o['result']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = JsonConverters::to('HelloType', $this->result);
        return empty($o) ? new class(){} : $o;
    }
}

class HelloInnerTypesResponse implements JsonSerializable
{
    public function __construct(
        /** @var InnerType|null */
        public ?InnerType $innerType=null,
        /** @var InnerEnum|null */
        public ?InnerEnum $innerEnum=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['innerType'])) $this->innerType = JsonConverters::from('InnerType', $o['innerType']);
        if (isset($o['innerEnum'])) $this->innerEnum = JsonConverters::from('InnerEnum', $o['innerEnum']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->innerType)) $o['innerType'] = JsonConverters::to('InnerType', $this->innerType);
        if (isset($this->innerEnum)) $o['innerEnum'] = JsonConverters::to('InnerEnum', $this->innerEnum);
        return empty($o) ? new class(){} : $o;
    }
}

class HelloVerbResponse implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $result=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = $o['result'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = $this->result;
        return empty($o) ? new class(){} : $o;
    }
}

class EnumResponse implements JsonSerializable
{
    public function __construct(
        /** @var ScopeType|null */
        public ?ScopeType $operator=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['operator'])) $this->operator = JsonConverters::from('ScopeType', $o['operator']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->operator)) $o['operator'] = JsonConverters::to('ScopeType', $this->operator);
        return empty($o) ? new class(){} : $o;
    }
}

// @Route("/hellotypes/{Name}")
#[Returns('HelloTypes')]
class HelloTypes implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $string=null,
        /** @var bool|null */
        public ?bool $bool=null,
        /** @var int */
        public int $int=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['string'])) $this->string = $o['string'];
        if (isset($o['bool'])) $this->bool = $o['bool'];
        if (isset($o['int'])) $this->int = $o['int'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->string)) $o['string'] = $this->string;
        if (isset($this->bool)) $o['bool'] = $this->bool;
        if (isset($this->int)) $o['int'] = $this->int;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloTypes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new HelloTypes(); }
}

// @DataContract
class HelloZipResponse implements JsonSerializable
{
    public function __construct(
        // @DataMember
        /** @var string|null */
        public ?string $result=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = $o['result'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = $this->result;
        return empty($o) ? new class(){} : $o;
    }
}

class PingResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<string,ResponseStatus>|null */
        public ?array $responses=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['responses'])) $this->responses = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','ResponseStatus']), $o['responses']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->responses)) $o['responses'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','ResponseStatus']), $this->responses);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class RequiresRoleResponse implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $result=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = $o['result'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = $this->result;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class SendVerbResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $pathInfo=null,
        /** @var string|null */
        public ?string $requestMethod=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['pathInfo'])) $this->pathInfo = $o['pathInfo'];
        if (isset($o['requestMethod'])) $this->requestMethod = $o['requestMethod'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->pathInfo)) $o['pathInfo'] = $this->pathInfo;
        if (isset($this->requestMethod)) $o['requestMethod'] = $this->requestMethod;
        return empty($o) ? new class(){} : $o;
    }
}

class GetSessionResponse implements JsonSerializable
{
    public function __construct(
        /** @var CustomUserSession|null */
        public ?CustomUserSession $result=null,
        /** @var UnAuthInfo|null */
        public ?UnAuthInfo $unAuthInfo=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = JsonConverters::from('CustomUserSession', $o['result']);
        if (isset($o['unAuthInfo'])) $this->unAuthInfo = JsonConverters::from('UnAuthInfo', $o['unAuthInfo']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = JsonConverters::to('CustomUserSession', $this->result);
        if (isset($this->unAuthInfo)) $o['unAuthInfo'] = JsonConverters::to('UnAuthInfo', $this->unAuthInfo);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

// @DataContract(Namespace="http://schemas.servicestack.net/types")
class GetStuffResponse implements JsonSerializable
{
    public function __construct(
        // @DataMember
        /** @var DateTime|null */
        public ?DateTime $summaryDate=null,

        // @DataMember
        /** @var DateTime|null */
        public ?DateTime $summaryEndDate=null,

        // @DataMember
        /** @var string|null */
        public ?string $symbol=null,

        // @DataMember
        /** @var string|null */
        public ?string $email=null,

        // @DataMember
        /** @var bool|null */
        public ?bool $isEnabled=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['summaryDate'])) $this->summaryDate = JsonConverters::from('DateTime', $o['summaryDate']);
        if (isset($o['summaryEndDate'])) $this->summaryEndDate = JsonConverters::from('DateTime', $o['summaryEndDate']);
        if (isset($o['symbol'])) $this->symbol = $o['symbol'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['isEnabled'])) $this->isEnabled = $o['isEnabled'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->summaryDate)) $o['summaryDate'] = JsonConverters::to('DateTime', $this->summaryDate);
        if (isset($this->summaryEndDate)) $o['summaryEndDate'] = JsonConverters::to('DateTime', $this->summaryEndDate);
        if (isset($this->symbol)) $o['symbol'] = $this->symbol;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->isEnabled)) $o['isEnabled'] = $this->isEnabled;
        return empty($o) ? new class(){} : $o;
    }
}

class StoreLogsResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<Logger>|null */
        public ?array $existingLogs=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['existingLogs'])) $this->existingLogs = JsonConverters::fromArray('Logger', $o['existingLogs']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->existingLogs)) $o['existingLogs'] = JsonConverters::toArray('Logger', $this->existingLogs);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class TestAuthResponse implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $userId=null,
        /** @var string|null */
        public ?string $sessionId=null,
        /** @var string|null */
        public ?string $userName=null,
        /** @var string|null */
        public ?string $displayName=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['userId'])) $this->userId = $o['userId'];
        if (isset($o['sessionId'])) $this->sessionId = $o['sessionId'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['displayName'])) $this->displayName = $o['displayName'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->userId)) $o['userId'] = $this->userId;
        if (isset($this->sessionId)) $o['sessionId'] = $this->sessionId;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->displayName)) $o['displayName'] = $this->displayName;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

#[Returns('RequiresAdmin')]
class RequiresAdmin implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'RequiresAdmin'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new RequiresAdmin(); }
}

// @Route("/custom")
// @Route("/custom/{Data}")
#[Returns('CustomRoute')]
class CustomRoute implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $data=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['data'])) $this->data = $o['data'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->data)) $o['data'] = $this->data;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CustomRoute'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new CustomRoute(); }
}

// @Route("/wait/{ForMs}")
#[Returns('Wait')]
class Wait implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $forMs=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['forMs'])) $this->forMs = $o['forMs'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->forMs)) $o['forMs'] = $this->forMs;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'Wait'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new Wait(); }
}

// @Route("/echo/types")
#[Returns('EchoTypes')]
class EchoTypes implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $byte=0,
        /** @var int */
        public int $short=0,
        /** @var int */
        public int $int=0,
        /** @var int */
        public int $long=0,
        /** @var int */
        public int $uShort=0,
        /** @var int */
        public int $uInt=0,
        /** @var int */
        public int $uLong=0,
        /** @var float */
        public float $float=0.0,
        /** @var float */
        public float $double=0.0,
        /** @var float */
        public float $decimal=0.0,
        /** @var string|null */
        public ?string $string=null,
        /** @var DateTime */
        public DateTime $dateTime=new DateTime(),
        /** @var DateInterval|null */
        public ?DateInterval $timeSpan=null,
        /** @var DateTime */
        public DateTime $dateTimeOffset=new DateTime(),
        /** @var string */
        public string $guid='',
        /** @var string */
        public string $char=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['byte'])) $this->byte = $o['byte'];
        if (isset($o['short'])) $this->short = $o['short'];
        if (isset($o['int'])) $this->int = $o['int'];
        if (isset($o['long'])) $this->long = $o['long'];
        if (isset($o['uShort'])) $this->uShort = $o['uShort'];
        if (isset($o['uInt'])) $this->uInt = $o['uInt'];
        if (isset($o['uLong'])) $this->uLong = $o['uLong'];
        if (isset($o['float'])) $this->float = $o['float'];
        if (isset($o['double'])) $this->double = $o['double'];
        if (isset($o['decimal'])) $this->decimal = $o['decimal'];
        if (isset($o['string'])) $this->string = $o['string'];
        if (isset($o['dateTime'])) $this->dateTime = JsonConverters::from('DateTime', $o['dateTime']);
        if (isset($o['timeSpan'])) $this->timeSpan = JsonConverters::from('DateInterval', $o['timeSpan']);
        if (isset($o['dateTimeOffset'])) $this->dateTimeOffset = JsonConverters::from('DateTime', $o['dateTimeOffset']);
        if (isset($o['guid'])) $this->guid = $o['guid'];
        if (isset($o['char'])) $this->char = $o['char'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->byte)) $o['byte'] = $this->byte;
        if (isset($this->short)) $o['short'] = $this->short;
        if (isset($this->int)) $o['int'] = $this->int;
        if (isset($this->long)) $o['long'] = $this->long;
        if (isset($this->uShort)) $o['uShort'] = $this->uShort;
        if (isset($this->uInt)) $o['uInt'] = $this->uInt;
        if (isset($this->uLong)) $o['uLong'] = $this->uLong;
        if (isset($this->float)) $o['float'] = $this->float;
        if (isset($this->double)) $o['double'] = $this->double;
        if (isset($this->decimal)) $o['decimal'] = $this->decimal;
        if (isset($this->string)) $o['string'] = $this->string;
        if (isset($this->dateTime)) $o['dateTime'] = JsonConverters::to('DateTime', $this->dateTime);
        if (isset($this->timeSpan)) $o['timeSpan'] = JsonConverters::to('DateInterval', $this->timeSpan);
        if (isset($this->dateTimeOffset)) $o['dateTimeOffset'] = JsonConverters::to('DateTime', $this->dateTimeOffset);
        if (isset($this->guid)) $o['guid'] = $this->guid;
        if (isset($this->char)) $o['char'] = $this->char;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'EchoTypes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new EchoTypes(); }
}

// @Route("/echo/collections")
#[Returns('EchoCollections')]
class EchoCollections implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var array<string>|null */
        public ?array $stringList=null,
        /** @var string[]|null */
        public ?array $stringArray=null,
        /** @var array<string,string>|null */
        public ?array $stringMap=null,
        /** @var array<string,string>|null */
        public ?array $intStringMap=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['stringList'])) $this->stringList = JsonConverters::fromArray('string', $o['stringList']);
        if (isset($o['stringArray'])) $this->stringArray = JsonConverters::fromArray('string', $o['stringArray']);
        if (isset($o['stringMap'])) $this->stringMap = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['stringMap']);
        if (isset($o['intStringMap'])) $this->intStringMap = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['int','string']), $o['intStringMap']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->stringList)) $o['stringList'] = JsonConverters::toArray('string', $this->stringList);
        if (isset($this->stringArray)) $o['stringArray'] = JsonConverters::toArray('string', $this->stringArray);
        if (isset($this->stringMap)) $o['stringMap'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->stringMap);
        if (isset($this->intStringMap)) $o['intStringMap'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['int','string']), $this->intStringMap);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'EchoCollections'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new EchoCollections(); }
}

// @Route("/echo/complex")
#[Returns('EchoComplexTypes')]
class EchoComplexTypes implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var SubType|null */
        public ?SubType $subType=null,
        /** @var array<SubType>|null */
        public ?array $subTypes=null,
        /** @var array<string,SubType>|null */
        public ?array $subTypeMap=null,
        /** @var array<string,string>|null */
        public ?array $stringMap=null,
        /** @var array<string,string>|null */
        public ?array $intStringMap=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['subType'])) $this->subType = JsonConverters::from('SubType', $o['subType']);
        if (isset($o['subTypes'])) $this->subTypes = JsonConverters::fromArray('SubType', $o['subTypes']);
        if (isset($o['subTypeMap'])) $this->subTypeMap = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','SubType']), $o['subTypeMap']);
        if (isset($o['stringMap'])) $this->stringMap = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['stringMap']);
        if (isset($o['intStringMap'])) $this->intStringMap = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['int','string']), $o['intStringMap']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->subType)) $o['subType'] = JsonConverters::to('SubType', $this->subType);
        if (isset($this->subTypes)) $o['subTypes'] = JsonConverters::toArray('SubType', $this->subTypes);
        if (isset($this->subTypeMap)) $o['subTypeMap'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','SubType']), $this->subTypeMap);
        if (isset($this->stringMap)) $o['stringMap'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->stringMap);
        if (isset($this->intStringMap)) $o['intStringMap'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['int','string']), $this->intStringMap);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'EchoComplexTypes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new EchoComplexTypes(); }
}

// @Route("/rockstars", "POST")
#[Returns('StoreRockstars')]
/**
 * @template array of Rockstar
 */
class StoreRockstars extends \ArrayObject implements IReturn, JsonSerializable
{
    public function __construct(Rockstar ...$items) {
        parent::__construct($items, \ArrayObject::STD_PROP_LIST);
    }
    
    /** @throws \Exception */
    public function append($value): void {
        if ($value instanceof Rockstar)
            parent::append($value);
        else
            throw new \Exception("Can only append a Rockstar to " . __CLASS__);
    }
    
    /** @throws Exception */
    public function fromMap($o): void {
        foreach ($o as $item) {
            $el = new Rockstar();
            $el->fromMap($item);
            $this->append($el);
        }
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array {
        return parent::getArrayCopy();
    }
    public function getTypeName(): string { return 'StoreRockstars'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new StoreRockstars(); }
}

class RockstarWithIdResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class RockstarWithIdAndResultResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var RockstarAuto|null */
        public ?RockstarAuto $result=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['result'])) $this->result = JsonConverters::from('RockstarAuto', $o['result']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->result)) $o['result'] = JsonConverters::to('RockstarAuto', $this->result);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class RockstarWithIdAndCountResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $count=0,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['count'])) $this->count = $o['count'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->count)) $o['count'] = $this->count;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class RockstarWithIdAndRowVersionResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $rowVersion=0,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['rowVersion'])) $this->rowVersion = $o['rowVersion'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->rowVersion)) $o['rowVersion'] = $this->rowVersion;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb2 of Item
 * @template QueryDb21 of Poco
 */
class QueryItems extends QueryDb2 implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryItems'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Poco']); }
}

// @Route("/channels/{Channel}/raw")
class PostRawToChannel implements IReturnVoid, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $from=null,
        /** @var string|null */
        public ?string $toUserId=null,
        /** @var string|null */
        public ?string $channel=null,
        /** @var string|null */
        public ?string $message=null,
        /** @var string|null */
        public ?string $selector=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['from'])) $this->from = $o['from'];
        if (isset($o['toUserId'])) $this->toUserId = $o['toUserId'];
        if (isset($o['channel'])) $this->channel = $o['channel'];
        if (isset($o['message'])) $this->message = $o['message'];
        if (isset($o['selector'])) $this->selector = $o['selector'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->from)) $o['from'] = $this->from;
        if (isset($this->toUserId)) $o['toUserId'] = $this->toUserId;
        if (isset($this->channel)) $o['channel'] = $this->channel;
        if (isset($this->message)) $o['message'] = $this->message;
        if (isset($this->selector)) $o['selector'] = $this->selector;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'PostRawToChannel'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): void {}
}

// @Route("/channels/{Channel}/chat")
#[Returns('ChatMessage')]
class PostChatToChannel implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $from=null,
        /** @var string|null */
        public ?string $toUserId=null,
        /** @var string|null */
        public ?string $channel=null,
        /** @var string|null */
        public ?string $message=null,
        /** @var string|null */
        public ?string $selector=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['from'])) $this->from = $o['from'];
        if (isset($o['toUserId'])) $this->toUserId = $o['toUserId'];
        if (isset($o['channel'])) $this->channel = $o['channel'];
        if (isset($o['message'])) $this->message = $o['message'];
        if (isset($o['selector'])) $this->selector = $o['selector'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->from)) $o['from'] = $this->from;
        if (isset($this->toUserId)) $o['toUserId'] = $this->toUserId;
        if (isset($this->channel)) $o['channel'] = $this->channel;
        if (isset($this->message)) $o['message'] = $this->message;
        if (isset($this->selector)) $o['selector'] = $this->selector;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'PostChatToChannel'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new ChatMessage(); }
}

// @Route("/chathistory")
#[Returns('GetChatHistoryResponse')]
class GetChatHistory implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string[]|null */
        public ?array $channels=null,
        /** @var int|null */
        public ?int $afterId=null,
        /** @var int|null */
        public ?int $take=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['channels'])) $this->channels = JsonConverters::fromArray('string', $o['channels']);
        if (isset($o['afterId'])) $this->afterId = $o['afterId'];
        if (isset($o['take'])) $this->take = $o['take'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->channels)) $o['channels'] = JsonConverters::toArray('string', $this->channels);
        if (isset($this->afterId)) $o['afterId'] = $this->afterId;
        if (isset($this->take)) $o['take'] = $this->take;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetChatHistory'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new GetChatHistoryResponse(); }
}

// @Route("/reset")
class ClearChatHistory implements IReturnVoid, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ClearChatHistory'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): void {}
}

// @Route("/reset-serverevents")
class ResetServerEvents implements IReturnVoid, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ResetServerEvents'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): void {}
}

// @Route("/channels/{Channel}/object")
class PostObjectToChannel implements IReturnVoid, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $toUserId=null,
        /** @var string|null */
        public ?string $channel=null,
        /** @var string|null */
        public ?string $selector=null,
        /** @var CustomType|null */
        public ?CustomType $customType=null,
        /** @var SetterType|null */
        public ?SetterType $setterType=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['toUserId'])) $this->toUserId = $o['toUserId'];
        if (isset($o['channel'])) $this->channel = $o['channel'];
        if (isset($o['selector'])) $this->selector = $o['selector'];
        if (isset($o['customType'])) $this->customType = JsonConverters::from('CustomType', $o['customType']);
        if (isset($o['setterType'])) $this->setterType = JsonConverters::from('SetterType', $o['setterType']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->toUserId)) $o['toUserId'] = $this->toUserId;
        if (isset($this->channel)) $o['channel'] = $this->channel;
        if (isset($this->selector)) $o['selector'] = $this->selector;
        if (isset($this->customType)) $o['customType'] = JsonConverters::to('CustomType', $this->customType);
        if (isset($this->setterType)) $o['setterType'] = JsonConverters::to('SetterType', $this->setterType);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'PostObjectToChannel'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): void {}
}

// @Route("/account")
#[Returns('GetUserDetailsResponse')]
class GetUserDetails implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetUserDetails'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetUserDetailsResponse(); }
}

#[Returns('CustomHttpErrorResponse')]
class CustomHttpError implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $statusCode=0,
        /** @var string|null */
        public ?string $statusDescription=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['statusCode'])) $this->statusCode = $o['statusCode'];
        if (isset($o['statusDescription'])) $this->statusDescription = $o['statusDescription'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->statusCode)) $o['statusCode'] = $this->statusCode;
        if (isset($this->statusDescription)) $o['statusDescription'] = $this->statusDescription;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CustomHttpError'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new CustomHttpErrorResponse(); }
}

#[Returns('QueryResponseAlt')]
class AltQueryItems implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'AltQueryItems'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return QueryResponseAlt::create(genericArgs:['Item']); }
}

#[Returns('Items')]
class GetItems implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetItems'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new Items(); }
}

#[Returns('array')]
class GetNakedItems implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetNakedItems'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return ArrayList::create(["Item"]); }
}

// @ValidateRequest(Validator="IsAuthenticated")
class DeclarativeValidationAuth implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'DeclarativeValidationAuth'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

#[Returns('EmptyResponse')]
class DeclarativeCollectiveValidationTest implements IReturn, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="NotEmpty")
        // @Validate(Validator="MaximumLength(20)")
        /** @var string */
        public string $site='',

        /** @var array<DeclarativeChildValidation>|null */
        public ?array $declarativeValidations=null,
        /** @var array<FluentChildValidation>|null */
        public ?array $fluentValidations=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['site'])) $this->site = $o['site'];
        if (isset($o['declarativeValidations'])) $this->declarativeValidations = JsonConverters::fromArray('DeclarativeChildValidation', $o['declarativeValidations']);
        if (isset($o['fluentValidations'])) $this->fluentValidations = JsonConverters::fromArray('FluentChildValidation', $o['fluentValidations']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->site)) $o['site'] = $this->site;
        if (isset($this->declarativeValidations)) $o['declarativeValidations'] = JsonConverters::toArray('DeclarativeChildValidation', $this->declarativeValidations);
        if (isset($this->fluentValidations)) $o['fluentValidations'] = JsonConverters::toArray('FluentChildValidation', $this->fluentValidations);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'DeclarativeCollectiveValidationTest'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new EmptyResponse(); }
}

#[Returns('EmptyResponse')]
class DeclarativeSingleValidationTest implements IReturn, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="NotEmpty")
        // @Validate(Validator="MaximumLength(20)")
        /** @var string */
        public string $site='',

        /** @var DeclarativeSingleValidation|null */
        public ?DeclarativeSingleValidation $declarativeSingleValidation=null,
        /** @var FluentSingleValidation|null */
        public ?FluentSingleValidation $fluentSingleValidation=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['site'])) $this->site = $o['site'];
        if (isset($o['declarativeSingleValidation'])) $this->declarativeSingleValidation = JsonConverters::from('DeclarativeSingleValidation', $o['declarativeSingleValidation']);
        if (isset($o['fluentSingleValidation'])) $this->fluentSingleValidation = JsonConverters::from('FluentSingleValidation', $o['fluentSingleValidation']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->site)) $o['site'] = $this->site;
        if (isset($this->declarativeSingleValidation)) $o['declarativeSingleValidation'] = JsonConverters::to('DeclarativeSingleValidation', $this->declarativeSingleValidation);
        if (isset($this->fluentSingleValidation)) $o['fluentSingleValidation'] = JsonConverters::to('FluentSingleValidation', $this->fluentSingleValidation);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'DeclarativeSingleValidationTest'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new EmptyResponse(); }
}

class DummyTypes implements JsonSerializable
{
    public function __construct(
        /** @var array<HelloResponse>|null */
        public ?array $helloResponses=null,
        /** @var array<ListResult>|null */
        public ?array $listResult=null,
        /** @var ArrayResult[]|null */
        public ?array $arrayResult=null,
        /** @var CancelRequest|null */
        public ?CancelRequest $cancelRequest=null,
        /** @var CancelRequestResponse|null */
        public ?CancelRequestResponse $cancelRequestResponse=null,
        /** @var UpdateEventSubscriber|null */
        public ?UpdateEventSubscriber $updateEventSubscriber=null,
        /** @var UpdateEventSubscriberResponse|null */
        public ?UpdateEventSubscriberResponse $updateEventSubscriberResponse=null,
        /** @var GetApiKeys|null */
        public ?GetApiKeys $getApiKeys=null,
        /** @var GetApiKeysResponse|null */
        public ?GetApiKeysResponse $getApiKeysResponse=null,
        /** @var RegenerateApiKeys|null */
        public ?RegenerateApiKeys $regenerateApiKeys=null,
        /** @var RegenerateApiKeysResponse|null */
        public ?RegenerateApiKeysResponse $regenerateApiKeysResponse=null,
        /** @var UserApiKey|null */
        public ?UserApiKey $userApiKey=null,
        /** @var ConvertSessionToToken|null */
        public ?ConvertSessionToToken $convertSessionToToken=null,
        /** @var ConvertSessionToTokenResponse|null */
        public ?ConvertSessionToTokenResponse $convertSessionToTokenResponse=null,
        /** @var GetAccessToken|null */
        public ?GetAccessToken $getAccessToken=null,
        /** @var GetAccessTokenResponse|null */
        public ?GetAccessTokenResponse $getAccessTokenResponse=null,
        /** @var NavItem|null */
        public ?NavItem $navItem=null,
        /** @var GetNavItems|null */
        public ?GetNavItems $getNavItems=null,
        /** @var GetNavItemsResponse|null */
        public ?GetNavItemsResponse $getNavItemsResponse=null,
        /** @var EmptyResponse|null */
        public ?EmptyResponse $emptyResponse=null,
        /** @var IdResponse|null */
        public ?IdResponse $idResponse=null,
        /** @var StringResponse|null */
        public ?StringResponse $stringResponse=null,
        /** @var StringsResponse|null */
        public ?StringsResponse $stringsResponse=null,
        /** @var AuditBase|null */
        public ?AuditBase $auditBase=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['helloResponses'])) $this->helloResponses = JsonConverters::fromArray('HelloResponse', $o['helloResponses']);
        if (isset($o['listResult'])) $this->listResult = JsonConverters::fromArray('ListResult', $o['listResult']);
        if (isset($o['arrayResult'])) $this->arrayResult = JsonConverters::fromArray('ArrayResult', $o['arrayResult']);
        if (isset($o['cancelRequest'])) $this->cancelRequest = JsonConverters::from('CancelRequest', $o['cancelRequest']);
        if (isset($o['cancelRequestResponse'])) $this->cancelRequestResponse = JsonConverters::from('CancelRequestResponse', $o['cancelRequestResponse']);
        if (isset($o['updateEventSubscriber'])) $this->updateEventSubscriber = JsonConverters::from('UpdateEventSubscriber', $o['updateEventSubscriber']);
        if (isset($o['updateEventSubscriberResponse'])) $this->updateEventSubscriberResponse = JsonConverters::from('UpdateEventSubscriberResponse', $o['updateEventSubscriberResponse']);
        if (isset($o['getApiKeys'])) $this->getApiKeys = JsonConverters::from('GetApiKeys', $o['getApiKeys']);
        if (isset($o['getApiKeysResponse'])) $this->getApiKeysResponse = JsonConverters::from('GetApiKeysResponse', $o['getApiKeysResponse']);
        if (isset($o['regenerateApiKeys'])) $this->regenerateApiKeys = JsonConverters::from('RegenerateApiKeys', $o['regenerateApiKeys']);
        if (isset($o['regenerateApiKeysResponse'])) $this->regenerateApiKeysResponse = JsonConverters::from('RegenerateApiKeysResponse', $o['regenerateApiKeysResponse']);
        if (isset($o['userApiKey'])) $this->userApiKey = JsonConverters::from('UserApiKey', $o['userApiKey']);
        if (isset($o['convertSessionToToken'])) $this->convertSessionToToken = JsonConverters::from('ConvertSessionToToken', $o['convertSessionToToken']);
        if (isset($o['convertSessionToTokenResponse'])) $this->convertSessionToTokenResponse = JsonConverters::from('ConvertSessionToTokenResponse', $o['convertSessionToTokenResponse']);
        if (isset($o['getAccessToken'])) $this->getAccessToken = JsonConverters::from('GetAccessToken', $o['getAccessToken']);
        if (isset($o['getAccessTokenResponse'])) $this->getAccessTokenResponse = JsonConverters::from('GetAccessTokenResponse', $o['getAccessTokenResponse']);
        if (isset($o['navItem'])) $this->navItem = JsonConverters::from('NavItem', $o['navItem']);
        if (isset($o['getNavItems'])) $this->getNavItems = JsonConverters::from('GetNavItems', $o['getNavItems']);
        if (isset($o['getNavItemsResponse'])) $this->getNavItemsResponse = JsonConverters::from('GetNavItemsResponse', $o['getNavItemsResponse']);
        if (isset($o['emptyResponse'])) $this->emptyResponse = JsonConverters::from('EmptyResponse', $o['emptyResponse']);
        if (isset($o['idResponse'])) $this->idResponse = JsonConverters::from('IdResponse', $o['idResponse']);
        if (isset($o['stringResponse'])) $this->stringResponse = JsonConverters::from('StringResponse', $o['stringResponse']);
        if (isset($o['stringsResponse'])) $this->stringsResponse = JsonConverters::from('StringsResponse', $o['stringsResponse']);
        if (isset($o['auditBase'])) $this->auditBase = JsonConverters::from('AuditBase', $o['auditBase']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->helloResponses)) $o['helloResponses'] = JsonConverters::toArray('HelloResponse', $this->helloResponses);
        if (isset($this->listResult)) $o['listResult'] = JsonConverters::toArray('ListResult', $this->listResult);
        if (isset($this->arrayResult)) $o['arrayResult'] = JsonConverters::toArray('ArrayResult', $this->arrayResult);
        if (isset($this->cancelRequest)) $o['cancelRequest'] = JsonConverters::to('CancelRequest', $this->cancelRequest);
        if (isset($this->cancelRequestResponse)) $o['cancelRequestResponse'] = JsonConverters::to('CancelRequestResponse', $this->cancelRequestResponse);
        if (isset($this->updateEventSubscriber)) $o['updateEventSubscriber'] = JsonConverters::to('UpdateEventSubscriber', $this->updateEventSubscriber);
        if (isset($this->updateEventSubscriberResponse)) $o['updateEventSubscriberResponse'] = JsonConverters::to('UpdateEventSubscriberResponse', $this->updateEventSubscriberResponse);
        if (isset($this->getApiKeys)) $o['getApiKeys'] = JsonConverters::to('GetApiKeys', $this->getApiKeys);
        if (isset($this->getApiKeysResponse)) $o['getApiKeysResponse'] = JsonConverters::to('GetApiKeysResponse', $this->getApiKeysResponse);
        if (isset($this->regenerateApiKeys)) $o['regenerateApiKeys'] = JsonConverters::to('RegenerateApiKeys', $this->regenerateApiKeys);
        if (isset($this->regenerateApiKeysResponse)) $o['regenerateApiKeysResponse'] = JsonConverters::to('RegenerateApiKeysResponse', $this->regenerateApiKeysResponse);
        if (isset($this->userApiKey)) $o['userApiKey'] = JsonConverters::to('UserApiKey', $this->userApiKey);
        if (isset($this->convertSessionToToken)) $o['convertSessionToToken'] = JsonConverters::to('ConvertSessionToToken', $this->convertSessionToToken);
        if (isset($this->convertSessionToTokenResponse)) $o['convertSessionToTokenResponse'] = JsonConverters::to('ConvertSessionToTokenResponse', $this->convertSessionToTokenResponse);
        if (isset($this->getAccessToken)) $o['getAccessToken'] = JsonConverters::to('GetAccessToken', $this->getAccessToken);
        if (isset($this->getAccessTokenResponse)) $o['getAccessTokenResponse'] = JsonConverters::to('GetAccessTokenResponse', $this->getAccessTokenResponse);
        if (isset($this->navItem)) $o['navItem'] = JsonConverters::to('NavItem', $this->navItem);
        if (isset($this->getNavItems)) $o['getNavItems'] = JsonConverters::to('GetNavItems', $this->getNavItems);
        if (isset($this->getNavItemsResponse)) $o['getNavItemsResponse'] = JsonConverters::to('GetNavItemsResponse', $this->getNavItemsResponse);
        if (isset($this->emptyResponse)) $o['emptyResponse'] = JsonConverters::to('EmptyResponse', $this->emptyResponse);
        if (isset($this->idResponse)) $o['idResponse'] = JsonConverters::to('IdResponse', $this->idResponse);
        if (isset($this->stringResponse)) $o['stringResponse'] = JsonConverters::to('StringResponse', $this->stringResponse);
        if (isset($this->stringsResponse)) $o['stringsResponse'] = JsonConverters::to('StringsResponse', $this->stringsResponse);
        if (isset($this->auditBase)) $o['auditBase'] = JsonConverters::to('AuditBase', $this->auditBase);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'DummyTypes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

// @Route("/throwhttperror/{Status}")
class ThrowHttpError implements JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $status=null,
        /** @var string|null */
        public ?string $message=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['status'])) $this->status = $o['status'];
        if (isset($o['message'])) $this->message = $o['message'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->status)) $o['status'] = $this->status;
        if (isset($this->message)) $o['message'] = $this->message;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ThrowHttpError'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

// @Route("/throw404")
// @Route("/throw404/{Message}")
class Throw404 implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $message=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['message'])) $this->message = $o['message'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->message)) $o['message'] = $this->message;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'Throw404'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

// @Route("/throwcustom400")
// @Route("/throwcustom400/{Message}")
class ThrowCustom400 implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $message=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['message'])) $this->message = $o['message'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->message)) $o['message'] = $this->message;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ThrowCustom400'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

// @Route("/returncustom400")
// @Route("/returncustom400/{Message}")
#[Returns('ReturnCustom400Response')]
class ReturnCustom400 implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $message=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['message'])) $this->message = $o['message'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->message)) $o['message'] = $this->message;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ReturnCustom400'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new ReturnCustom400Response(); }
}

// @Route("/throw/{Type}")
#[Returns('ThrowTypeResponse')]
class ThrowType implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $type=null,
        /** @var string|null */
        public ?string $message=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['type'])) $this->type = $o['type'];
        if (isset($o['message'])) $this->message = $o['message'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->type)) $o['type'] = $this->type;
        if (isset($this->message)) $o['message'] = $this->message;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ThrowType'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new ThrowTypeResponse(); }
}

// @Route("/throwvalidation")
#[Returns('ThrowValidationResponse')]
class ThrowValidation implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $age=0,
        /** @var string|null */
        public ?string $required=null,
        /** @var string|null */
        public ?string $email=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['age'])) $this->age = $o['age'];
        if (isset($o['required'])) $this->required = $o['required'];
        if (isset($o['email'])) $this->email = $o['email'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->age)) $o['age'] = $this->age;
        if (isset($this->required)) $o['required'] = $this->required;
        if (isset($this->email)) $o['email'] = $this->email;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ThrowValidation'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new ThrowValidationResponse(); }
}

// @Route("/throwbusinesserror")
#[Returns('ThrowBusinessErrorResponse')]
class ThrowBusinessError implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ThrowBusinessError'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new ThrowBusinessErrorResponse(); }
}

/** @description Convert speech to text */
// @Api(Description="Convert speech to text")
#[Returns('GenerationResponse')]
class SpeechToText implements IReturn, IGeneration, JsonSerializable
{
    public function __construct(
        /** @description The audio stream containing the speech to be transcribed */
        // @ApiMember(Description="The audio stream containing the speech to be transcribed")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $audio=null,

        /** @description Optional client-provided identifier for the request */
        // @ApiMember(Description="Optional client-provided identifier for the request")
        /** @var string|null */
        public ?string $refId=null,

        /** @description Tag to identify the request */
        // @ApiMember(Description="Tag to identify the request")
        /** @var string|null */
        public ?string $tag=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['audio'])) $this->audio = JsonConverters::from('ByteArray', $o['audio']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->audio)) $o['audio'] = JsonConverters::to('ByteArray', $this->audio);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'SpeechToText'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new GenerationResponse(); }
}

#[Returns('TestFileUploadsResponse')]
class TestFileUploads implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $id=null,
        /** @var string|null */
        public ?string $refId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'TestFileUploads'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new TestFileUploadsResponse(); }
}

class RootPathRoutes implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $path=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['path'])) $this->path = $o['path'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->path)) $o['path'] = $this->path;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'RootPathRoutes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

#[Returns('Account')]
class GetAccount implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $account=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['account'])) $this->account = $o['account'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->account)) $o['account'] = $this->account;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetAccount'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new Account(); }
}

#[Returns('Project')]
class GetProject implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $account=null,
        /** @var string|null */
        public ?string $project=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['account'])) $this->account = $o['account'];
        if (isset($o['project'])) $this->project = $o['project'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->account)) $o['account'] = $this->account;
        if (isset($this->project)) $o['project'] = $this->project;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetProject'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new Project(); }
}

// @Route("/image-stream")
#[Returns('ByteArray')]
class ImageAsStream implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $format=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['format'])) $this->format = $o['format'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->format)) $o['format'] = $this->format;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ImageAsStream'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new ByteArray(); }
}

// @Route("/image-bytes")
#[Returns('ByteArray')]
class ImageAsBytes implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $format=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['format'])) $this->format = $o['format'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->format)) $o['format'] = $this->format;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ImageAsBytes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new ByteArray(); }
}

// @Route("/image-custom")
#[Returns('ByteArray')]
class ImageAsCustomResult implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $format=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['format'])) $this->format = $o['format'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->format)) $o['format'] = $this->format;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ImageAsCustomResult'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new ByteArray(); }
}

// @Route("/image-response")
#[Returns('ByteArray')]
class ImageWriteToResponse implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $format=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['format'])) $this->format = $o['format'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->format)) $o['format'] = $this->format;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ImageWriteToResponse'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new ByteArray(); }
}

// @Route("/image-file")
#[Returns('ByteArray')]
class ImageAsFile implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $format=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['format'])) $this->format = $o['format'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->format)) $o['format'] = $this->format;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ImageAsFile'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new ByteArray(); }
}

// @Route("/image-redirect")
class ImageAsRedirect implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $format=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['format'])) $this->format = $o['format'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->format)) $o['format'] = $this->format;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ImageAsRedirect'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

// @Route("/hello-image/{Name}")
#[Returns('ByteArray')]
class HelloImage implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $format=null,
        /** @var int|null */
        public ?int $width=null,
        /** @var int|null */
        public ?int $height=null,
        /** @var int|null */
        public ?int $fontSize=null,
        /** @var string|null */
        public ?string $fontFamily=null,
        /** @var string|null */
        public ?string $foreground=null,
        /** @var string|null */
        public ?string $background=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['format'])) $this->format = $o['format'];
        if (isset($o['width'])) $this->width = $o['width'];
        if (isset($o['height'])) $this->height = $o['height'];
        if (isset($o['fontSize'])) $this->fontSize = $o['fontSize'];
        if (isset($o['fontFamily'])) $this->fontFamily = $o['fontFamily'];
        if (isset($o['foreground'])) $this->foreground = $o['foreground'];
        if (isset($o['background'])) $this->background = $o['background'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->format)) $o['format'] = $this->format;
        if (isset($this->width)) $o['width'] = $this->width;
        if (isset($this->height)) $o['height'] = $this->height;
        if (isset($this->fontSize)) $o['fontSize'] = $this->fontSize;
        if (isset($this->fontFamily)) $o['fontFamily'] = $this->fontFamily;
        if (isset($this->foreground)) $o['foreground'] = $this->foreground;
        if (isset($this->background)) $o['background'] = $this->background;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloImage'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new ByteArray(); }
}

// @Route("/secured")
// @ValidateRequest(Validator="IsAuthenticated")
#[Returns('SecuredResponse')]
class Secured implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'Secured'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new SecuredResponse(); }
}

// @Route("/jwt")
#[Returns('CreateJwtResponse')]
class CreateJwt extends AuthUserSession implements IReturn, JsonSerializable
{
    /**
     * @param string|null $referrerUrl
     * @param string|null $id
     * @param string|null $userAuthId
     * @param string|null $userAuthName
     * @param string|null $userName
     * @param string|null $twitterUserId
     * @param string|null $twitterScreenName
     * @param string|null $facebookUserId
     * @param string|null $facebookUserName
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $displayName
     * @param string|null $company
     * @param string|null $email
     * @param string|null $primaryEmail
     * @param string|null $phoneNumber
     * @param DateTime|null $birthDate
     * @param string|null $birthDateRaw
     * @param string|null $address
     * @param string|null $address2
     * @param string|null $city
     * @param string|null $state
     * @param string|null $country
     * @param string|null $culture
     * @param string|null $fullName
     * @param string|null $gender
     * @param string|null $language
     * @param string|null $mailAddress
     * @param string|null $nickname
     * @param string|null $postalCode
     * @param string|null $timeZone
     * @param string|null $requestTokenSecret
     * @param DateTime $createdAt
     * @param DateTime $lastModified
     * @param array<string>|null $roles
     * @param array<string>|null $permissions
     * @param bool|null $isAuthenticated
     * @param bool|null $fromToken
     * @param string|null $profileUrl
     * @param string|null $sequence
     * @param int $tag
     * @param string|null $authProvider
     * @param array<IAuthTokens>|null $providerOAuthAccess
     * @param array<string,string>|null $meta
     * @param array<string>|null $audiences
     * @param array<string>|null $scopes
     * @param string|null $dns
     * @param string|null $rsa
     * @param string|null $sid
     * @param string|null $hash
     * @param string|null $homePhone
     * @param string|null $mobilePhone
     * @param string|null $webpage
     * @param bool|null $emailConfirmed
     * @param bool|null $phoneNumberConfirmed
     * @param bool|null $twoFactorEnabled
     * @param string|null $securityStamp
     * @param string|null $type
     * @param string|null $recoveryToken
     * @param int|null $refId
     * @param string|null $refIdStr
     */
    public function __construct(
        ?string $referrerUrl=null,
        ?string $id=null,
        ?string $userAuthId=null,
        ?string $userAuthName=null,
        ?string $userName=null,
        ?string $twitterUserId=null,
        ?string $twitterScreenName=null,
        ?string $facebookUserId=null,
        ?string $facebookUserName=null,
        ?string $firstName=null,
        ?string $lastName=null,
        ?string $displayName=null,
        ?string $company=null,
        ?string $email=null,
        ?string $primaryEmail=null,
        ?string $phoneNumber=null,
        ?DateTime $birthDate=null,
        ?string $birthDateRaw=null,
        ?string $address=null,
        ?string $address2=null,
        ?string $city=null,
        ?string $state=null,
        ?string $country=null,
        ?string $culture=null,
        ?string $fullName=null,
        ?string $gender=null,
        ?string $language=null,
        ?string $mailAddress=null,
        ?string $nickname=null,
        ?string $postalCode=null,
        ?string $timeZone=null,
        ?string $requestTokenSecret=null,
        DateTime $createdAt=new DateTime(),
        DateTime $lastModified=new DateTime(),
        ?array $roles=null,
        ?array $permissions=null,
        ?bool $isAuthenticated=null,
        ?bool $fromToken=null,
        ?string $profileUrl=null,
        ?string $sequence=null,
        int $tag=0,
        ?string $authProvider=null,
        ?array $providerOAuthAccess=null,
        ?array $meta=null,
        ?array $audiences=null,
        ?array $scopes=null,
        ?string $dns=null,
        ?string $rsa=null,
        ?string $sid=null,
        ?string $hash=null,
        ?string $homePhone=null,
        ?string $mobilePhone=null,
        ?string $webpage=null,
        ?bool $emailConfirmed=null,
        ?bool $phoneNumberConfirmed=null,
        ?bool $twoFactorEnabled=null,
        ?string $securityStamp=null,
        ?string $type=null,
        ?string $recoveryToken=null,
        ?int $refId=null,
        ?string $refIdStr=null,
        /** @var DateTime|null */
        public ?DateTime $jwtExpiry=null
    ) {
        parent::__construct($referrerUrl,$id,$userAuthId,$userAuthName,$userName,$twitterUserId,$twitterScreenName,$facebookUserId,$facebookUserName,$firstName,$lastName,$displayName,$company,$email,$primaryEmail,$phoneNumber,$birthDate,$birthDateRaw,$address,$address2,$city,$state,$country,$culture,$fullName,$gender,$language,$mailAddress,$nickname,$postalCode,$timeZone,$requestTokenSecret,$createdAt,$lastModified,$roles,$permissions,$isAuthenticated,$fromToken,$profileUrl,$sequence,$tag,$authProvider,$providerOAuthAccess,$meta,$audiences,$scopes,$dns,$rsa,$sid,$hash,$homePhone,$mobilePhone,$webpage,$emailConfirmed,$phoneNumberConfirmed,$twoFactorEnabled,$securityStamp,$type,$recoveryToken,$refId,$refIdStr);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['jwtExpiry'])) $this->jwtExpiry = JsonConverters::from('DateTime', $o['jwtExpiry']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->jwtExpiry)) $o['jwtExpiry'] = JsonConverters::to('DateTime', $this->jwtExpiry);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CreateJwt'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new CreateJwtResponse(); }
}

// @Route("/jwt-refresh")
#[Returns('CreateRefreshJwtResponse')]
class CreateRefreshJwt implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $userAuthId=null,
        /** @var DateTime|null */
        public ?DateTime $jwtExpiry=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['userAuthId'])) $this->userAuthId = $o['userAuthId'];
        if (isset($o['jwtExpiry'])) $this->jwtExpiry = JsonConverters::from('DateTime', $o['jwtExpiry']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->userAuthId)) $o['userAuthId'] = $this->userAuthId;
        if (isset($this->jwtExpiry)) $o['jwtExpiry'] = JsonConverters::to('DateTime', $this->jwtExpiry);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CreateRefreshJwt'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new CreateRefreshJwtResponse(); }
}

// @Route("/jwt-invalidate")
#[Returns('EmptyResponse')]
class InvalidateLastAccessToken implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'InvalidateLastAccessToken'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new EmptyResponse(); }
}

// @Route("/logs")
#[Returns('string')]
class ViewLogs implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var bool|null */
        public ?bool $clear=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['clear'])) $this->clear = $o['clear'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->clear)) $o['clear'] = $this->clear;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ViewLogs'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return 'string'; }
}

// @Route("/metadatatest")
#[Returns('MetadataTestResponse')]
class MetadataTest implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'MetadataTest'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new MetadataTestResponse(); }
}

// @Route("/metadatatest-array")
#[Returns('MetadataTestChild[]')]
class MetadataTestArray implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'MetadataTestArray'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return []; }
}

// @Route("/example", "GET")
// @DataContract
#[Returns('GetExampleResponse')]
class GetExample implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetExample'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetExampleResponse(); }
}

// @Route("/messages/{Id}", "GET")
#[Returns('Message')]
class RequestMessage implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'RequestMessage'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new Message(); }
}

// @Route("/randomids")
#[Returns('GetRandomIdsResponse')]
class GetRandomIds implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $take=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['take'])) $this->take = $o['take'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->take)) $o['take'] = $this->take;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetRandomIds'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new GetRandomIdsResponse(); }
}

// @Route("/textfile-test")
class TextFileTest implements JsonSerializable
{
    public function __construct(
        /** @var bool|null */
        public ?bool $asAttachment=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['asAttachment'])) $this->asAttachment = $o['asAttachment'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->asAttachment)) $o['asAttachment'] = $this->asAttachment;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'TextFileTest'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

// @Route("/return/text")
class ReturnText implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $text=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['text'])) $this->text = $o['text'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->text)) $o['text'] = $this->text;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ReturnText'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

// @Route("/return/html")
class ReturnHtml implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $text=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['text'])) $this->text = $o['text'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->text)) $o['text'] = $this->text;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ReturnHtml'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

// @Route("/hello")
// @Route("/hello/{Name}")
#[Returns('HelloResponse')]
class Hello implements IReturn, JsonSerializable
{
    public function __construct(
        // @Required()
        /** @var string */
        public string $name='',

        /** @var string|null */
        public ?string $title=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['title'])) $this->title = $o['title'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->title)) $o['title'] = $this->title;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'Hello'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new HelloResponse(); }
}

// @Route("/hello-secure/{Name}")
// @ValidateRequest(Validator="IsAuthenticated")
#[Returns('HelloResponse')]
class HelloSecure implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloSecure'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new HelloResponse(); }
}

/** @description Description on HelloAll type */
// @DataContract
#[Returns('HelloAnnotatedResponse')]
class HelloAnnotated implements IReturn, JsonSerializable
{
    public function __construct(
        // @DataMember
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloAnnotated'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new HelloAnnotatedResponse(); }
}

#[Returns('HelloResponse')]
class HelloWithNestedClass implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null,
        /** @var NestedClass|null */
        public ?NestedClass $nestedClassProp=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['nestedClassProp'])) $this->nestedClassProp = JsonConverters::from('NestedClass', $o['nestedClassProp']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->nestedClassProp)) $o['nestedClassProp'] = JsonConverters::to('NestedClass', $this->nestedClassProp);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloWithNestedClass'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new HelloResponse(); }
}

#[Returns('array')]
class HelloList implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var array<string>|null */
        public ?array $names=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['names'])) $this->names = JsonConverters::fromArray('string', $o['names']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->names)) $o['names'] = JsonConverters::toArray('string', $this->names);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloList'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return ArrayList::create(["ListResult"]); }
}

#[Returns('ArrayResult[]')]
class HelloArray implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var array<string>|null */
        public ?array $names=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['names'])) $this->names = JsonConverters::fromArray('string', $o['names']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->names)) $o['names'] = JsonConverters::toArray('string', $this->names);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloArray'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return []; }
}

#[Returns('array')]
class HelloMap implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var array<string>|null */
        public ?array $names=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['names'])) $this->names = JsonConverters::fromArray('string', $o['names']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->names)) $o['names'] = JsonConverters::toArray('string', $this->names);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloMap'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return ArrayList::create(["string","ArrayResult"]); }
}

#[Returns('QueryResponse')]
class HelloQueryResponse implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var array<string>|null */
        public ?array $names=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['names'])) $this->names = JsonConverters::fromArray('string', $o['names']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->names)) $o['names'] = JsonConverters::toArray('string', $this->names);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloQueryResponse'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['string']); }
}

class HelloWithEnum implements JsonSerializable
{
    public function __construct(
        /** @var EnumType|null */
        public ?EnumType $enumProp=null,
        /** @var EnumTypeFlags|null */
        public ?EnumTypeFlags $enumTypeFlags=null,
        /** @var EnumWithValues|null */
        public ?EnumWithValues $enumWithValues=null,
        /** @var EnumType|null */
        public ?EnumType $nullableEnumProp=null,
        /** @var EnumFlags|null */
        public ?EnumFlags $enumFlags=null,
        /** @var EnumAsInt|null */
        public ?EnumAsInt $enumAsInt=null,
        /** @var EnumStyle|null */
        public ?EnumStyle $enumStyle=null,
        /** @var EnumStyleMembers|null */
        public ?EnumStyleMembers $enumStyleMembers=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['enumProp'])) $this->enumProp = JsonConverters::from('EnumType', $o['enumProp']);
        if (isset($o['enumTypeFlags'])) $this->enumTypeFlags = JsonConverters::from('EnumTypeFlags', $o['enumTypeFlags']);
        if (isset($o['enumWithValues'])) $this->enumWithValues = JsonConverters::from('EnumWithValues', $o['enumWithValues']);
        if (isset($o['nullableEnumProp'])) $this->nullableEnumProp = JsonConverters::from('EnumType', $o['nullableEnumProp']);
        if (isset($o['enumFlags'])) $this->enumFlags = JsonConverters::from('EnumFlags', $o['enumFlags']);
        if (isset($o['enumAsInt'])) $this->enumAsInt = JsonConverters::from('EnumAsInt', $o['enumAsInt']);
        if (isset($o['enumStyle'])) $this->enumStyle = JsonConverters::from('EnumStyle', $o['enumStyle']);
        if (isset($o['enumStyleMembers'])) $this->enumStyleMembers = JsonConverters::from('EnumStyleMembers', $o['enumStyleMembers']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->enumProp)) $o['enumProp'] = JsonConverters::to('EnumType', $this->enumProp);
        if (isset($this->enumTypeFlags)) $o['enumTypeFlags'] = JsonConverters::to('EnumTypeFlags', $this->enumTypeFlags);
        if (isset($this->enumWithValues)) $o['enumWithValues'] = JsonConverters::to('EnumWithValues', $this->enumWithValues);
        if (isset($this->nullableEnumProp)) $o['nullableEnumProp'] = JsonConverters::to('EnumType', $this->nullableEnumProp);
        if (isset($this->enumFlags)) $o['enumFlags'] = JsonConverters::to('EnumFlags', $this->enumFlags);
        if (isset($this->enumAsInt)) $o['enumAsInt'] = JsonConverters::to('EnumAsInt', $this->enumAsInt);
        if (isset($this->enumStyle)) $o['enumStyle'] = JsonConverters::to('EnumStyle', $this->enumStyle);
        if (isset($this->enumStyleMembers)) $o['enumStyleMembers'] = JsonConverters::to('EnumStyleMembers', $this->enumStyleMembers);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloWithEnum'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

class HelloWithEnumList implements JsonSerializable
{
    public function __construct(
        /** @var array<EnumType>|null */
        public ?array $enumProp=null,
        /** @var array<EnumWithValues>|null */
        public ?array $enumWithValues=null,
        /** @var array<EnumType>|null */
        public ?array $nullableEnumProp=null,
        /** @var array<EnumFlags>|null */
        public ?array $enumFlags=null,
        /** @var array<EnumStyle>|null */
        public ?array $enumStyle=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['enumProp'])) $this->enumProp = JsonConverters::fromArray('EnumType', $o['enumProp']);
        if (isset($o['enumWithValues'])) $this->enumWithValues = JsonConverters::fromArray('EnumWithValues', $o['enumWithValues']);
        if (isset($o['nullableEnumProp'])) $this->nullableEnumProp = JsonConverters::fromArray('Nullable<EnumType>', $o['nullableEnumProp']);
        if (isset($o['enumFlags'])) $this->enumFlags = JsonConverters::fromArray('EnumFlags', $o['enumFlags']);
        if (isset($o['enumStyle'])) $this->enumStyle = JsonConverters::fromArray('EnumStyle', $o['enumStyle']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->enumProp)) $o['enumProp'] = JsonConverters::toArray('EnumType', $this->enumProp);
        if (isset($this->enumWithValues)) $o['enumWithValues'] = JsonConverters::toArray('EnumWithValues', $this->enumWithValues);
        if (isset($this->nullableEnumProp)) $o['nullableEnumProp'] = JsonConverters::toArray('Nullable<EnumType>', $this->nullableEnumProp);
        if (isset($this->enumFlags)) $o['enumFlags'] = JsonConverters::toArray('EnumFlags', $this->enumFlags);
        if (isset($this->enumStyle)) $o['enumStyle'] = JsonConverters::toArray('EnumStyle', $this->enumStyle);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloWithEnumList'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

class HelloWithEnumMap implements JsonSerializable
{
    public function __construct(
        /** @var array<string,EnumType>|null */
        public ?array $enumProp=null,
        /** @var array<string,EnumWithValues>|null */
        public ?array $enumWithValues=null,
        /** @var array<string,EnumType>|null */
        public ?array $nullableEnumProp=null,
        /** @var array<string,EnumFlags>|null */
        public ?array $enumFlags=null,
        /** @var array<string,EnumStyle>|null */
        public ?array $enumStyle=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['enumProp'])) $this->enumProp = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['EnumType','EnumType']), $o['enumProp']);
        if (isset($o['enumWithValues'])) $this->enumWithValues = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['EnumWithValues','EnumWithValues']), $o['enumWithValues']);
        if (isset($o['nullableEnumProp'])) $this->nullableEnumProp = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['Nullable<EnumType>','Nullable<EnumType>']), $o['nullableEnumProp']);
        if (isset($o['enumFlags'])) $this->enumFlags = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['EnumFlags','EnumFlags']), $o['enumFlags']);
        if (isset($o['enumStyle'])) $this->enumStyle = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['EnumStyle','EnumStyle']), $o['enumStyle']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->enumProp)) $o['enumProp'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['EnumType','EnumType']), $this->enumProp);
        if (isset($this->enumWithValues)) $o['enumWithValues'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['EnumWithValues','EnumWithValues']), $this->enumWithValues);
        if (isset($this->nullableEnumProp)) $o['nullableEnumProp'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['Nullable<EnumType>','Nullable<EnumType>']), $this->nullableEnumProp);
        if (isset($this->enumFlags)) $o['enumFlags'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['EnumFlags','EnumFlags']), $this->enumFlags);
        if (isset($this->enumStyle)) $o['enumStyle'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['EnumStyle','EnumStyle']), $this->enumStyle);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloWithEnumMap'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

class RestrictedAttributes implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null,
        /** @var Hello|null */
        public ?Hello $hello=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['hello'])) $this->hello = JsonConverters::from('Hello', $o['hello']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->hello)) $o['hello'] = JsonConverters::to('Hello', $this->hello);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'RestrictedAttributes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

/** @description AllowedAttributes Description */
// @Route("/allowed-attributes", "GET")
// @Api(Description="AllowedAttributes Description")
// @ApiResponse(Description="Your request was not understood", StatusCode=400)
// @DataContract
class AllowedAttributes implements JsonSerializable
{
    public function __construct(
        /** @description Range Description */
        // @DataMember(Name="Aliased")
        // @ApiMember(DataType="double", Description="Range Description", IsRequired=true, ParameterType="path")
        /** @var float */
        public float $Aliased=0.0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['Aliased'])) $this->Aliased = $o['Aliased'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->Aliased)) $o['Aliased'] = $this->Aliased;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'AllowedAttributes'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse():void {}
}

// @Route("/all-types")
#[Returns('HelloAllTypesResponse')]
class HelloAllTypes implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null,
        /** @var AllTypes|null */
        public ?AllTypes $allTypes=null,
        /** @var AllCollectionTypes|null */
        public ?AllCollectionTypes $allCollectionTypes=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['allTypes'])) $this->allTypes = JsonConverters::from('AllTypes', $o['allTypes']);
        if (isset($o['allCollectionTypes'])) $this->allCollectionTypes = JsonConverters::from('AllCollectionTypes', $o['allCollectionTypes']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->allTypes)) $o['allTypes'] = JsonConverters::to('AllTypes', $this->allTypes);
        if (isset($this->allCollectionTypes)) $o['allCollectionTypes'] = JsonConverters::to('AllCollectionTypes', $this->allCollectionTypes);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloAllTypes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new HelloAllTypesResponse(); }
}

#[Returns('SubAllTypes')]
class HelloSubAllTypes extends AllTypesBase implements IReturn, JsonSerializable
{
    /**
     * @param int $id
     * @param int|null $nullableId
     * @param int $byte
     * @param int $short
     * @param int $int
     * @param int $long
     * @param int $uShort
     * @param int $uInt
     * @param int $uLong
     * @param float $float
     * @param float $double
     * @param float $decimal
     * @param string|null $string
     * @param DateTime $dateTime
     * @param DateInterval|null $timeSpan
     * @param DateTime $dateTimeOffset
     * @param string $guid
     * @param string $char
     * @param KeyValuePair2<string, string>|null $keyValuePair
     * @param DateTime|null $nullableDateTime
     * @param DateInterval|null $nullableTimeSpan
     * @param array<string>|null $stringList
     * @param string[]|null $stringArray
     * @param array<string,string>|null $stringMap
     * @param array<string,string>|null $intStringMap
     * @param SubType|null $subType
     */
    public function __construct(
        int $id=0,
        ?int $nullableId=null,
        int $byte=0,
        int $short=0,
        int $int=0,
        int $long=0,
        int $uShort=0,
        int $uInt=0,
        int $uLong=0,
        float $float=0.0,
        float $double=0.0,
        float $decimal=0.0,
        ?string $string=null,
        DateTime $dateTime=new DateTime(),
        ?DateInterval $timeSpan=null,
        DateTime $dateTimeOffset=new DateTime(),
        string $guid='',
        string $char='',
        ?KeyValuePair2 $keyValuePair=null,
        ?DateTime $nullableDateTime=null,
        ?DateInterval $nullableTimeSpan=null,
        ?array $stringList=null,
        ?array $stringArray=null,
        ?array $stringMap=null,
        ?array $intStringMap=null,
        ?SubType $subType=null,
        /** @var int */
        public int $hierarchy=0
    ) {
        parent::__construct($id,$nullableId,$byte,$short,$int,$long,$uShort,$uInt,$uLong,$float,$double,$decimal,$string,$dateTime,$timeSpan,$dateTimeOffset,$guid,$char,$keyValuePair,$nullableDateTime,$nullableTimeSpan,$stringList,$stringArray,$stringMap,$intStringMap,$subType);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['hierarchy'])) $this->hierarchy = $o['hierarchy'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->hierarchy)) $o['hierarchy'] = $this->hierarchy;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloSubAllTypes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new SubAllTypes(); }
}

#[Returns('string')]
class HelloString implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloString'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return 'string'; }
}

class HelloVoid implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloVoid'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

// @DataContract
#[Returns('HelloWithDataContractResponse')]
class HelloWithDataContract implements IReturn, JsonSerializable
{
    public function __construct(
        // @DataMember(Name="name", Order=1, IsRequired=true, EmitDefaultValue=false)
        /** @var string|null */
        public ?string $name=null,

        // @DataMember(Name="id", Order=2, EmitDefaultValue=false)
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloWithDataContract'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new HelloWithDataContractResponse(); }
}

/** @description Description on HelloWithDescription type */
#[Returns('HelloWithDescriptionResponse')]
class HelloWithDescription implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloWithDescription'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new HelloWithDescriptionResponse(); }
}

#[Returns('HelloWithInheritanceResponse')]
class HelloWithInheritance extends HelloBase implements IReturn, JsonSerializable
{
    /**
     * @param int $id
     */
    public function __construct(
        int $id=0,
        /** @var string|null */
        public ?string $name=null
    ) {
        parent::__construct($id);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloWithInheritance'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new HelloWithInheritanceResponse(); }
}

/**
 * @template HelloBase1 of Poco
 */
class HelloWithGenericInheritance extends HelloBase1 implements JsonSerializable
{
    /**
     * @param array<T>|null $items
     * @param array<int>|null $counts
     */
    public function __construct(
        ?array $items=null,
        ?array $counts=null,
        /** @var string|null */
        public ?string $result=null
    ) {
        parent::__construct($items,$counts);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['result'])) $this->result = $o['result'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->result)) $o['result'] = $this->result;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloWithGenericInheritance'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

/**
 * @template HelloBase1 of Hello
 */
class HelloWithGenericInheritance2 extends HelloBase1 implements JsonSerializable
{
    /**
     * @param array<T>|null $items
     * @param array<int>|null $counts
     */
    public function __construct(
        ?array $items=null,
        ?array $counts=null,
        /** @var string|null */
        public ?string $result=null
    ) {
        parent::__construct($items,$counts);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['result'])) $this->result = $o['result'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->result)) $o['result'] = $this->result;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloWithGenericInheritance2'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

#[Returns('HelloWithAlternateReturnResponse')]
class HelloWithReturn implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloWithReturn'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new HelloWithAlternateReturnResponse(); }
}

// @Route("/helloroute")
#[Returns('HelloWithRouteResponse')]
class HelloWithRoute implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloWithRoute'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new HelloWithRouteResponse(); }
}

#[Returns('HelloWithTypeResponse')]
class HelloWithType implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloWithType'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new HelloWithTypeResponse(); }
}

class HelloInterface implements JsonSerializable
{
    public function __construct(
        /** @var IPoco|null */
        public ?IPoco $poco=null,
        /** @var IEmptyInterface|null */
        public ?IEmptyInterface $emptyInterface=null,
        /** @var EmptyClass|null */
        public ?EmptyClass $emptyClass=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['poco'])) $this->poco = JsonConverters::from('IPoco', $o['poco']);
        if (isset($o['emptyInterface'])) $this->emptyInterface = JsonConverters::from('IEmptyInterface', $o['emptyInterface']);
        if (isset($o['emptyClass'])) $this->emptyClass = JsonConverters::from('EmptyClass', $o['emptyClass']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->poco)) $o['poco'] = JsonConverters::to('IPoco', $this->poco);
        if (isset($this->emptyInterface)) $o['emptyInterface'] = JsonConverters::to('IEmptyInterface', $this->emptyInterface);
        if (isset($this->emptyClass)) $o['emptyClass'] = JsonConverters::to('EmptyClass', $this->emptyClass);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloInterface'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

#[Returns('HelloInnerTypesResponse')]
class HelloInnerTypes implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloInnerTypes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new HelloInnerTypesResponse(); }
}

class HelloBuiltin implements JsonSerializable
{
    public function __construct(
        /** @var DayOfWeek|null */
        public ?DayOfWeek $dayOfWeek=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['dayOfWeek'])) $this->dayOfWeek = JsonConverters::from('DayOfWeek', $o['dayOfWeek']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->dayOfWeek)) $o['dayOfWeek'] = JsonConverters::to('DayOfWeek', $this->dayOfWeek);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloBuiltin'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

#[Returns('HelloVerbResponse')]
class HelloGet implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloGet'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new HelloVerbResponse(); }
}

#[Returns('HelloVerbResponse')]
class HelloPost extends HelloBase implements IReturn, IPost, JsonSerializable
{
    /**
     * @param int $id
     */
    public function __construct(
        int $id=0
    ) {
        parent::__construct($id);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloPost'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new HelloVerbResponse(); }
}

#[Returns('HelloVerbResponse')]
class HelloPut implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloPut'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new HelloVerbResponse(); }
}

#[Returns('HelloVerbResponse')]
class HelloDelete implements IReturn, IDelete, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloDelete'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new HelloVerbResponse(); }
}

#[Returns('HelloVerbResponse')]
class HelloPatch implements IReturn, IPatch, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloPatch'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new HelloVerbResponse(); }
}

class HelloReturnVoid implements IReturnVoid, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloReturnVoid'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): void {}
}

#[Returns('EnumResponse')]
class EnumRequest implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var ScopeType|null */
        public ?ScopeType $operator=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['operator'])) $this->operator = JsonConverters::from('ScopeType', $o['operator']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->operator)) $o['operator'] = JsonConverters::to('ScopeType', $this->operator);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'EnumRequest'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new EnumResponse(); }
}

// @Route("/hellozip")
// @DataContract
#[Returns('HelloZipResponse')]
class HelloZip implements IReturn, JsonSerializable
{
    public function __construct(
        // @DataMember
        /** @var string|null */
        public ?string $name=null,

        // @DataMember
        /** @var array<string>|null */
        public ?array $test=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['test'])) $this->test = JsonConverters::fromArray('string', $o['test']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->test)) $o['test'] = JsonConverters::toArray('string', $this->test);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloZip'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new HelloZipResponse(); }
}

// @Route("/ping")
#[Returns('PingResponse')]
class Ping implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'Ping'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new PingResponse(); }
}

// @Route("/reset-connections")
class ResetConnections implements JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ResetConnections'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

// @Route("/requires-role")
#[Returns('RequiresRoleResponse')]
class RequiresRole implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'RequiresRole'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new RequiresRoleResponse(); }
}

// @Route("/return/string")
#[Returns('string')]
class ReturnString implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $data=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['data'])) $this->data = $o['data'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->data)) $o['data'] = $this->data;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ReturnString'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return 'string'; }
}

// @Route("/return/bytes")
#[Returns('ByteArray')]
class ReturnBytes implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var ByteArray|null */
        public ?ByteArray $data=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['data'])) $this->data = JsonConverters::from('ByteArray', $o['data']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->data)) $o['data'] = JsonConverters::to('ByteArray', $this->data);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ReturnBytes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new ByteArray(); }
}

// @Route("/return/stream")
#[Returns('ByteArray')]
class ReturnStream implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var ByteArray|null */
        public ?ByteArray $data=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['data'])) $this->data = JsonConverters::from('ByteArray', $o['data']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->data)) $o['data'] = JsonConverters::to('ByteArray', $this->data);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ReturnStream'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new ByteArray(); }
}

// @Route("/return/json")
class ReturnJson implements JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ReturnJson'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

// @Route("/return/json/header")
class ReturnJsonHeader implements JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ReturnJsonHeader'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

// @Route("/write/json")
class WriteJson implements JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'WriteJson'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

// @Route("/Request1", "GET")
#[Returns('array')]
class GetRequest1 implements IReturn, IGet, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetRequest1'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return ArrayList::create(["ReturnedDto"]); }
}

// @Route("/Request2", "GET")
#[Returns('array')]
class GetRequest2 implements IReturn, IGet, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetRequest2'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return ArrayList::create(["ReturnedDto"]); }
}

// @Route("/sendjson")
#[Returns('string')]
class SendJson implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null,
        /** @var ByteArray|null */
        public ?ByteArray $requestStream=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['requestStream'])) $this->requestStream = JsonConverters::from('ByteArray', $o['requestStream']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->requestStream)) $o['requestStream'] = JsonConverters::to('ByteArray', $this->requestStream);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'SendJson'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return 'string'; }
}

// @Route("/sendtext")
#[Returns('string')]
class SendText implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $contentType=null,
        /** @var ByteArray|null */
        public ?ByteArray $requestStream=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['contentType'])) $this->contentType = $o['contentType'];
        if (isset($o['requestStream'])) $this->requestStream = JsonConverters::from('ByteArray', $o['requestStream']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->contentType)) $o['contentType'] = $this->contentType;
        if (isset($this->requestStream)) $o['requestStream'] = JsonConverters::to('ByteArray', $this->requestStream);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'SendText'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return 'string'; }
}

// @Route("/sendraw")
#[Returns('ByteArray')]
class SendRaw implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $contentType=null,
        /** @var ByteArray|null */
        public ?ByteArray $requestStream=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['contentType'])) $this->contentType = $o['contentType'];
        if (isset($o['requestStream'])) $this->requestStream = JsonConverters::from('ByteArray', $o['requestStream']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->contentType)) $o['contentType'] = $this->contentType;
        if (isset($this->requestStream)) $o['requestStream'] = JsonConverters::to('ByteArray', $this->requestStream);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'SendRaw'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new ByteArray(); }
}

#[Returns('SendVerbResponse')]
class SendDefault implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'SendDefault'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new SendVerbResponse(); }
}

// @Route("/sendrestget/{Id}", "GET")
#[Returns('SendVerbResponse')]
class SendRestGet implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'SendRestGet'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new SendVerbResponse(); }
}

#[Returns('SendVerbResponse')]
class SendGet implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'SendGet'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new SendVerbResponse(); }
}

#[Returns('SendVerbResponse')]
class SendPost implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'SendPost'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new SendVerbResponse(); }
}

#[Returns('SendVerbResponse')]
class SendPut implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'SendPut'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new SendVerbResponse(); }
}

class SendReturnVoid implements IReturnVoid, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'SendReturnVoid'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): void {}
}

// @Route("/session")
#[Returns('GetSessionResponse')]
class GetSession implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetSession'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new GetSessionResponse(); }
}

// @Route("/session/edit/{CustomName}")
#[Returns('GetSessionResponse')]
class UpdateSession implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $customName=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['customName'])) $this->customName = $o['customName'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->customName)) $o['customName'] = $this->customName;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'UpdateSession'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new GetSessionResponse(); }
}

// @Route("/Stuff")
// @DataContract(Namespace="http://schemas.servicestack.net/types")
#[Returns('GetStuffResponse')]
class GetStuff implements IReturn, JsonSerializable
{
    public function __construct(
        // @DataMember
        // @ApiMember(DataType="DateTime", Name="Summary Date")
        /** @var DateTime|null */
        public ?DateTime $summaryDate=null,

        // @DataMember
        // @ApiMember(DataType="DateTime", Name="Summary End Date")
        /** @var DateTime|null */
        public ?DateTime $summaryEndDate=null,

        // @DataMember
        // @ApiMember(DataType="string", Name="Symbol")
        /** @var string|null */
        public ?string $symbol=null,

        // @DataMember
        // @ApiMember(DataType="string", Name="Email")
        /** @var string|null */
        public ?string $email=null,

        // @DataMember
        // @ApiMember(DataType="bool", Name="Is Enabled")
        /** @var bool|null */
        public ?bool $isEnabled=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['summaryDate'])) $this->summaryDate = JsonConverters::from('DateTime', $o['summaryDate']);
        if (isset($o['summaryEndDate'])) $this->summaryEndDate = JsonConverters::from('DateTime', $o['summaryEndDate']);
        if (isset($o['symbol'])) $this->symbol = $o['symbol'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['isEnabled'])) $this->isEnabled = $o['isEnabled'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->summaryDate)) $o['summaryDate'] = JsonConverters::to('DateTime', $this->summaryDate);
        if (isset($this->summaryEndDate)) $o['summaryEndDate'] = JsonConverters::to('DateTime', $this->summaryEndDate);
        if (isset($this->symbol)) $o['symbol'] = $this->symbol;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->isEnabled)) $o['isEnabled'] = $this->isEnabled;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetStuff'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new GetStuffResponse(); }
}

#[Returns('StoreLogsResponse')]
class StoreLogs implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var array<Logger>|null */
        public ?array $loggers=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['loggers'])) $this->loggers = JsonConverters::fromArray('Logger', $o['loggers']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->loggers)) $o['loggers'] = JsonConverters::toArray('Logger', $this->loggers);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'StoreLogs'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new StoreLogsResponse(); }
}

#[Returns('HelloResponse')]
class HelloAuth implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HelloAuth'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new HelloResponse(); }
}

// @Route("/testauth")
#[Returns('TestAuthResponse')]
class TestAuth implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'TestAuth'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new TestAuthResponse(); }
}

// @Route("/testdata/AllTypes")
#[Returns('AllTypes')]
class TestDataAllTypes implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'TestDataAllTypes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new AllTypes(); }
}

// @Route("/testdata/AllCollectionTypes")
#[Returns('AllCollectionTypes')]
class TestDataAllCollectionTypes implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'TestDataAllCollectionTypes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new AllCollectionTypes(); }
}

// @Route("/void-response")
class TestVoidResponse implements JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'TestVoidResponse'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

// @Route("/null-response")
class TestNullResponse implements JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'TestNullResponse'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

#[Returns('QueryResponse')]
/**
 * @template QueryDbTenant2 of RockstarAuditTenant
 * @template QueryDbTenant21 of RockstarAuto
 */
class QueryRockstarAudit extends QueryDbTenant2 implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $id=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryRockstarAudit'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['RockstarAuto']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb2 of RockstarAuditTenant
 * @template QueryDb21 of RockstarAuto
 */
class QueryRockstarAuditSubOr extends QueryDb2 implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $firstNameStartsWith=null,
        /** @var int|null */
        public ?int $ageOlderThan=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['firstNameStartsWith'])) $this->firstNameStartsWith = $o['firstNameStartsWith'];
        if (isset($o['ageOlderThan'])) $this->ageOlderThan = $o['ageOlderThan'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->firstNameStartsWith)) $o['firstNameStartsWith'] = $this->firstNameStartsWith;
        if (isset($this->ageOlderThan)) $o['ageOlderThan'] = $this->ageOlderThan;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryRockstarAuditSubOr'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['RockstarAuto']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb of OnlyDefinedInGenericType
 */
class QueryPocoBase extends QueryDb implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryPocoBase'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['OnlyDefinedInGenericType']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb2 of OnlyDefinedInGenericTypeFrom
 * @template QueryDb21 of OnlyDefinedInGenericTypeInto
 */
class QueryPocoIntoBase extends QueryDb2 implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryPocoIntoBase'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['OnlyDefinedInGenericTypeInto']); }
}

// @Route("/message/query/{Id}", "GET")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of MessageQuery
 */
class MessageQuery extends QueryDb implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'MessageQuery'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['MessageQuery']); }
}

// @Route("/rockstars", "GET")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Rockstar
 */
class QueryRockstars extends QueryDb implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryRockstars'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Rockstar']); }
}

#[Returns('RockstarWithIdResponse')]
/**
 * @template ICreateDb of RockstarAudit
 */
class CreateRockstarAudit extends RockstarBase implements IReturn, ICreateDb, JsonSerializable
{
    /**
     * @param string|null $firstName
     * @param string|null $lastName
     * @param int|null $age
     * @param DateTime $dateOfBirth
     * @param DateTime|null $dateDied
     * @param LivingStatus|null $livingStatus
     */
    public function __construct(
        ?string $firstName=null,
        ?string $lastName=null,
        ?int $age=null,
        DateTime $dateOfBirth=new DateTime(),
        ?DateTime $dateDied=null,
        ?LivingStatus $livingStatus=null
    ) {
        parent::__construct($firstName,$lastName,$age,$dateOfBirth,$dateDied,$livingStatus);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CreateRockstarAudit'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new RockstarWithIdResponse(); }
}

#[Returns('RockstarWithIdAndResultResponse')]
/**
 * @template CreateAuditTenantBase2 of RockstarAuditTenant
 * @template CreateAuditTenantBase21 of RockstarWithIdAndResultResponse
 */
class CreateRockstarAuditTenant extends CreateAuditTenantBase2 implements IReturn, IHasSessionId, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $sessionId=null,
        /** @var string|null */
        public ?string $firstName=null,
        /** @var string|null */
        public ?string $lastName=null,
        /** @var int|null */
        public ?int $age=null,
        /** @var DateTime */
        public DateTime $dateOfBirth=new DateTime(),
        /** @var DateTime|null */
        public ?DateTime $dateDied=null,
        /** @var LivingStatus|null */
        public ?LivingStatus $livingStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['sessionId'])) $this->sessionId = $o['sessionId'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['age'])) $this->age = $o['age'];
        if (isset($o['dateOfBirth'])) $this->dateOfBirth = JsonConverters::from('DateTime', $o['dateOfBirth']);
        if (isset($o['dateDied'])) $this->dateDied = JsonConverters::from('DateTime', $o['dateDied']);
        if (isset($o['livingStatus'])) $this->livingStatus = JsonConverters::from('LivingStatus', $o['livingStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->sessionId)) $o['sessionId'] = $this->sessionId;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->age)) $o['age'] = $this->age;
        if (isset($this->dateOfBirth)) $o['dateOfBirth'] = JsonConverters::to('DateTime', $this->dateOfBirth);
        if (isset($this->dateDied)) $o['dateDied'] = JsonConverters::to('DateTime', $this->dateDied);
        if (isset($this->livingStatus)) $o['livingStatus'] = JsonConverters::to('LivingStatus', $this->livingStatus);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CreateRockstarAuditTenant'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new RockstarWithIdAndResultResponse(); }
}

#[Returns('RockstarWithIdAndResultResponse')]
/**
 * @template UpdateAuditTenantBase2 of RockstarAuditTenant
 * @template UpdateAuditTenantBase21 of RockstarWithIdAndResultResponse
 */
class UpdateRockstarAuditTenant extends UpdateAuditTenantBase2 implements IReturn, IHasSessionId, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $sessionId=null,
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $firstName=null,
        /** @var LivingStatus|null */
        public ?LivingStatus $livingStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['sessionId'])) $this->sessionId = $o['sessionId'];
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['livingStatus'])) $this->livingStatus = JsonConverters::from('LivingStatus', $o['livingStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->sessionId)) $o['sessionId'] = $this->sessionId;
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->livingStatus)) $o['livingStatus'] = JsonConverters::to('LivingStatus', $this->livingStatus);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'UpdateRockstarAuditTenant'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new RockstarWithIdAndResultResponse(); }
}

#[Returns('RockstarWithIdAndResultResponse')]
/**
 * @template PatchAuditTenantBase2 of RockstarAuditTenant
 * @template PatchAuditTenantBase21 of RockstarWithIdAndResultResponse
 */
class PatchRockstarAuditTenant extends PatchAuditTenantBase2 implements IReturn, IHasSessionId, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $sessionId=null,
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $firstName=null,
        /** @var LivingStatus|null */
        public ?LivingStatus $livingStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['sessionId'])) $this->sessionId = $o['sessionId'];
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['livingStatus'])) $this->livingStatus = JsonConverters::from('LivingStatus', $o['livingStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->sessionId)) $o['sessionId'] = $this->sessionId;
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->livingStatus)) $o['livingStatus'] = JsonConverters::to('LivingStatus', $this->livingStatus);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'PatchRockstarAuditTenant'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new RockstarWithIdAndResultResponse(); }
}

#[Returns('RockstarWithIdAndResultResponse')]
/**
 * @template SoftDeleteAuditTenantBase2 of RockstarAuditTenant
 * @template SoftDeleteAuditTenantBase21 of RockstarWithIdAndResultResponse
 */
class SoftDeleteAuditTenant extends SoftDeleteAuditTenantBase2 implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'SoftDeleteAuditTenant'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new RockstarWithIdAndResultResponse(); }
}

#[Returns('RockstarWithIdResponse')]
/**
 * @template ICreateDb of RockstarAudit
 */
class CreateRockstarAuditMqToken extends RockstarBase implements IReturn, ICreateDb, IHasBearerToken, JsonSerializable
{
    /**
     * @param string|null $firstName
     * @param string|null $lastName
     * @param int|null $age
     * @param DateTime $dateOfBirth
     * @param DateTime|null $dateDied
     * @param LivingStatus|null $livingStatus
     */
    public function __construct(
        ?string $firstName=null,
        ?string $lastName=null,
        ?int $age=null,
        DateTime $dateOfBirth=new DateTime(),
        ?DateTime $dateDied=null,
        ?LivingStatus $livingStatus=null,
        /** @var string|null */
        public ?string $bearerToken=null
    ) {
        parent::__construct($firstName,$lastName,$age,$dateOfBirth,$dateDied,$livingStatus);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['bearerToken'])) $this->bearerToken = $o['bearerToken'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->bearerToken)) $o['bearerToken'] = $this->bearerToken;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CreateRockstarAuditMqToken'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new RockstarWithIdResponse(); }
}

#[Returns('RockstarWithIdAndCountResponse')]
/**
 * @template IDeleteDb of RockstarAuditTenant
 */
class RealDeleteAuditTenant implements IReturn, IDeleteDb, IHasSessionId, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $sessionId=null,
        /** @var int */
        public int $id=0,
        /** @var int|null */
        public ?int $age=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['sessionId'])) $this->sessionId = $o['sessionId'];
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['age'])) $this->age = $o['age'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->sessionId)) $o['sessionId'] = $this->sessionId;
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->age)) $o['age'] = $this->age;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'RealDeleteAuditTenant'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new RockstarWithIdAndCountResponse(); }
}

#[Returns('RockstarWithIdAndRowVersionResponse')]
/**
 * @template ICreateDb of RockstarVersion
 */
class CreateRockstarVersion extends RockstarBase implements IReturn, ICreateDb, JsonSerializable
{
    /**
     * @param string|null $firstName
     * @param string|null $lastName
     * @param int|null $age
     * @param DateTime $dateOfBirth
     * @param DateTime|null $dateDied
     * @param LivingStatus|null $livingStatus
     */
    public function __construct(
        ?string $firstName=null,
        ?string $lastName=null,
        ?int $age=null,
        DateTime $dateOfBirth=new DateTime(),
        ?DateTime $dateDied=null,
        ?LivingStatus $livingStatus=null
    ) {
        parent::__construct($firstName,$lastName,$age,$dateOfBirth,$dateDied,$livingStatus);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CreateRockstarVersion'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new RockstarWithIdAndRowVersionResponse(); }
}

