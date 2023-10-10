<?php namespace dtos;
/* Options:
Date: 2023-10-11 02:19:09
Version: 6.111
Tip: To override a DTO option, remove "//" prefix before updating
BaseUrl: https://localhost:5001

GlobalNamespace: dtos
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
use ServiceStack\{ResponseStatus,ResponseError,EmptyResponse,IdResponse,KeyValuePair2,StringResponse,StringsResponse,Tuple2,Tuple3,ByteArray};
use ServiceStack\{JsonConverters,Returns,TypeContext};


enum JobApplicationStatus : string
{
    case Applied = 'Applied';
    case PhoneScreening = 'PhoneScreening';
    case PhoneScreeningCompleted = 'PhoneScreeningCompleted';
    case Interview = 'Interview';
    case InterviewCompleted = 'InterviewCompleted';
    case Offer = 'Offer';
    case Disqualified = 'Disqualified';
}

enum Department : string
{
    case None = 'None';
    case Marketing = 'Marketing';
    case Accounts = 'Accounts';
    case Legal = 'Legal';
    case HumanResources = 'HumanResources';
}

class AppUser implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string */
        public string $displayName='',
        /** @var string|null */
        public ?string $email=null,
        /** @var string */
        public string $profileUrl='',
        /** @var Department|null */
        public ?Department $department=null,
        /** @var string|null */
        public ?string $title=null,
        /** @var string|null */
        public ?string $jobArea=null,
        /** @var string|null */
        public ?string $location=null,
        /** @var int */
        public int $salary=0,
        // @StringLength(2147483647)
        /** @var string|null */
        public ?string $about=null,

        /** @var bool|null */
        public ?bool $isArchived=null,
        /** @var DateTime|null */
        public ?DateTime $archivedDate=null,
        /** @var DateTime|null */
        public ?DateTime $lastLoginDate=null,
        /** @var string|null */
        public ?string $lastLoginIp=null,
        /** @var string|null */
        public ?string $userName=null,
        /** @var string|null */
        public ?string $primaryEmail=null,
        /** @var string|null */
        public ?string $firstName=null,
        /** @var string|null */
        public ?string $lastName=null,
        /** @var string|null */
        public ?string $company=null,
        /** @var string|null */
        public ?string $country=null,
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
        public ?string $culture=null,
        /** @var string|null */
        public ?string $fullName=null,
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
        public ?string $timeZone=null,
        /** @var string|null */
        public ?string $salt=null,
        /** @var string|null */
        public ?string $passwordHash=null,
        /** @var string|null */
        public ?string $digestHa1Hash=null,
        /** @var array<string>|null */
        public ?array $roles=null,
        /** @var array<string>|null */
        public ?array $permissions=null,
        /** @var DateTime */
        public DateTime $createdDate=new DateTime(),
        /** @var DateTime */
        public DateTime $modifiedDate=new DateTime(),
        /** @var int */
        public int $invalidLoginAttempts=0,
        /** @var DateTime|null */
        public ?DateTime $lastLoginAttempt=null,
        /** @var DateTime|null */
        public ?DateTime $lockedDate=null,
        /** @var string|null */
        public ?string $recoveryToken=null,
        /** @var int|null */
        public ?int $refId=null,
        /** @var string|null */
        public ?string $refIdStr=null,
        /** @var array<string,string>|null */
        public ?array $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['displayName'])) $this->displayName = $o['displayName'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['profileUrl'])) $this->profileUrl = $o['profileUrl'];
        if (isset($o['department'])) $this->department = JsonConverters::from('Department', $o['department']);
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['jobArea'])) $this->jobArea = $o['jobArea'];
        if (isset($o['location'])) $this->location = $o['location'];
        if (isset($o['salary'])) $this->salary = $o['salary'];
        if (isset($o['about'])) $this->about = $o['about'];
        if (isset($o['isArchived'])) $this->isArchived = $o['isArchived'];
        if (isset($o['archivedDate'])) $this->archivedDate = $o['archivedDate'];
        if (isset($o['lastLoginDate'])) $this->lastLoginDate = $o['lastLoginDate'];
        if (isset($o['lastLoginIp'])) $this->lastLoginIp = $o['lastLoginIp'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['primaryEmail'])) $this->primaryEmail = $o['primaryEmail'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['company'])) $this->company = $o['company'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['phoneNumber'])) $this->phoneNumber = $o['phoneNumber'];
        if (isset($o['birthDate'])) $this->birthDate = $o['birthDate'];
        if (isset($o['birthDateRaw'])) $this->birthDateRaw = $o['birthDateRaw'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['address2'])) $this->address2 = $o['address2'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['culture'])) $this->culture = $o['culture'];
        if (isset($o['fullName'])) $this->fullName = $o['fullName'];
        if (isset($o['gender'])) $this->gender = $o['gender'];
        if (isset($o['language'])) $this->language = $o['language'];
        if (isset($o['mailAddress'])) $this->mailAddress = $o['mailAddress'];
        if (isset($o['nickname'])) $this->nickname = $o['nickname'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['timeZone'])) $this->timeZone = $o['timeZone'];
        if (isset($o['salt'])) $this->salt = $o['salt'];
        if (isset($o['passwordHash'])) $this->passwordHash = $o['passwordHash'];
        if (isset($o['digestHa1Hash'])) $this->digestHa1Hash = $o['digestHa1Hash'];
        if (isset($o['roles'])) $this->roles = JsonConverters::fromArray('string', $o['roles']);
        if (isset($o['permissions'])) $this->permissions = JsonConverters::fromArray('string', $o['permissions']);
        if (isset($o['createdDate'])) $this->createdDate = JsonConverters::from('DateTime', $o['createdDate']);
        if (isset($o['modifiedDate'])) $this->modifiedDate = JsonConverters::from('DateTime', $o['modifiedDate']);
        if (isset($o['invalidLoginAttempts'])) $this->invalidLoginAttempts = $o['invalidLoginAttempts'];
        if (isset($o['lastLoginAttempt'])) $this->lastLoginAttempt = $o['lastLoginAttempt'];
        if (isset($o['lockedDate'])) $this->lockedDate = $o['lockedDate'];
        if (isset($o['recoveryToken'])) $this->recoveryToken = $o['recoveryToken'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['refIdStr'])) $this->refIdStr = $o['refIdStr'];
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->displayName)) $o['displayName'] = $this->displayName;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->profileUrl)) $o['profileUrl'] = $this->profileUrl;
        if (isset($this->department)) $o['department'] = JsonConverters::to('Department', $this->department);
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->jobArea)) $o['jobArea'] = $this->jobArea;
        if (isset($this->location)) $o['location'] = $this->location;
        if (isset($this->salary)) $o['salary'] = $this->salary;
        if (isset($this->about)) $o['about'] = $this->about;
        if (isset($this->isArchived)) $o['isArchived'] = $this->isArchived;
        if (isset($this->archivedDate)) $o['archivedDate'] = $this->archivedDate;
        if (isset($this->lastLoginDate)) $o['lastLoginDate'] = $this->lastLoginDate;
        if (isset($this->lastLoginIp)) $o['lastLoginIp'] = $this->lastLoginIp;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->primaryEmail)) $o['primaryEmail'] = $this->primaryEmail;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->company)) $o['company'] = $this->company;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->phoneNumber)) $o['phoneNumber'] = $this->phoneNumber;
        if (isset($this->birthDate)) $o['birthDate'] = $this->birthDate;
        if (isset($this->birthDateRaw)) $o['birthDateRaw'] = $this->birthDateRaw;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->address2)) $o['address2'] = $this->address2;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->culture)) $o['culture'] = $this->culture;
        if (isset($this->fullName)) $o['fullName'] = $this->fullName;
        if (isset($this->gender)) $o['gender'] = $this->gender;
        if (isset($this->language)) $o['language'] = $this->language;
        if (isset($this->mailAddress)) $o['mailAddress'] = $this->mailAddress;
        if (isset($this->nickname)) $o['nickname'] = $this->nickname;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->timeZone)) $o['timeZone'] = $this->timeZone;
        if (isset($this->salt)) $o['salt'] = $this->salt;
        if (isset($this->passwordHash)) $o['passwordHash'] = $this->passwordHash;
        if (isset($this->digestHa1Hash)) $o['digestHa1Hash'] = $this->digestHa1Hash;
        if (isset($this->roles)) $o['roles'] = JsonConverters::toArray('string', $this->roles);
        if (isset($this->permissions)) $o['permissions'] = JsonConverters::toArray('string', $this->permissions);
        if (isset($this->createdDate)) $o['createdDate'] = JsonConverters::to('DateTime', $this->createdDate);
        if (isset($this->modifiedDate)) $o['modifiedDate'] = JsonConverters::to('DateTime', $this->modifiedDate);
        if (isset($this->invalidLoginAttempts)) $o['invalidLoginAttempts'] = $this->invalidLoginAttempts;
        if (isset($this->lastLoginAttempt)) $o['lastLoginAttempt'] = $this->lastLoginAttempt;
        if (isset($this->lockedDate)) $o['lockedDate'] = $this->lockedDate;
        if (isset($this->recoveryToken)) $o['recoveryToken'] = $this->recoveryToken;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->refIdStr)) $o['refIdStr'] = $this->refIdStr;
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        return $o;
    }
}

class PhoneScreen extends AuditBase implements JsonSerializable
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
        DateTime $deletedDate=null,
        string $deletedBy=null,
        /** @var int */
        public int $id=0,
        // @References("typeof(TalentBlazor.ServiceModel.AppUser)")
        /** @var int */
        public int $appUserId=0,

        /** @var AppUser|null */
        public ?AppUser $appUser=null,
        // @References("typeof(TalentBlazor.ServiceModel.JobApplication)")
        /** @var int */
        public int $jobApplicationId=0,

        /** @var JobApplicationStatus|null */
        public ?JobApplicationStatus $applicationStatus=null,
        // @StringLength(2147483647)
        /** @var string */
        public string $notes=''
    ) {
        parent::__construct($createdDate,$createdBy,$modifiedDate,$modifiedBy,$deletedDate,$deletedBy);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['appUserId'])) $this->appUserId = $o['appUserId'];
        if (isset($o['appUser'])) $this->appUser = JsonConverters::from('AppUser', $o['appUser']);
        if (isset($o['jobApplicationId'])) $this->jobApplicationId = $o['jobApplicationId'];
        if (isset($o['applicationStatus'])) $this->applicationStatus = JsonConverters::from('JobApplicationStatus', $o['applicationStatus']);
        if (isset($o['notes'])) $this->notes = $o['notes'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->appUserId)) $o['appUserId'] = $this->appUserId;
        if (isset($this->appUser)) $o['appUser'] = JsonConverters::to('AppUser', $this->appUser);
        if (isset($this->jobApplicationId)) $o['jobApplicationId'] = $this->jobApplicationId;
        if (isset($this->applicationStatus)) $o['applicationStatus'] = JsonConverters::to('JobApplicationStatus', $this->applicationStatus);
        if (isset($this->notes)) $o['notes'] = $this->notes;
        return $o;
    }
}

class Interview extends AuditBase implements JsonSerializable
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
        DateTime $deletedDate=null,
        string $deletedBy=null,
        /** @var int */
        public int $id=0,
        /** @var DateTime */
        public DateTime $bookingTime=new DateTime(),
        // @References("typeof(TalentBlazor.ServiceModel.JobApplication)")
        /** @var int */
        public int $jobApplicationId=0,

        // @References("typeof(TalentBlazor.ServiceModel.AppUser)")
        /** @var int */
        public int $appUserId=0,

        /** @var AppUser|null */
        public ?AppUser $appUser=null,
        /** @var JobApplicationStatus|null */
        public ?JobApplicationStatus $applicationStatus=null,
        // @StringLength(2147483647)
        /** @var string */
        public string $notes=''
    ) {
        parent::__construct($createdDate,$createdBy,$modifiedDate,$modifiedBy,$deletedDate,$deletedBy);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['bookingTime'])) $this->bookingTime = JsonConverters::from('DateTime', $o['bookingTime']);
        if (isset($o['jobApplicationId'])) $this->jobApplicationId = $o['jobApplicationId'];
        if (isset($o['appUserId'])) $this->appUserId = $o['appUserId'];
        if (isset($o['appUser'])) $this->appUser = JsonConverters::from('AppUser', $o['appUser']);
        if (isset($o['applicationStatus'])) $this->applicationStatus = JsonConverters::from('JobApplicationStatus', $o['applicationStatus']);
        if (isset($o['notes'])) $this->notes = $o['notes'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->bookingTime)) $o['bookingTime'] = JsonConverters::to('DateTime', $this->bookingTime);
        if (isset($this->jobApplicationId)) $o['jobApplicationId'] = $this->jobApplicationId;
        if (isset($this->appUserId)) $o['appUserId'] = $this->appUserId;
        if (isset($this->appUser)) $o['appUser'] = JsonConverters::to('AppUser', $this->appUser);
        if (isset($this->applicationStatus)) $o['applicationStatus'] = JsonConverters::to('JobApplicationStatus', $this->applicationStatus);
        if (isset($this->notes)) $o['notes'] = $this->notes;
        return $o;
    }
}

class JobOffer extends AuditBase implements JsonSerializable
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
        DateTime $deletedDate=null,
        string $deletedBy=null,
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $salaryOffer=0,
        // @References("typeof(TalentBlazor.ServiceModel.JobApplication)")
        /** @var int */
        public int $jobApplicationId=0,

        // @References("typeof(TalentBlazor.ServiceModel.AppUser)")
        /** @var int */
        public int $appUserId=0,

        /** @var AppUser|null */
        public ?AppUser $appUser=null,
        // @StringLength(2147483647)
        /** @var string */
        public string $notes=''
    ) {
        parent::__construct($createdDate,$createdBy,$modifiedDate,$modifiedBy,$deletedDate,$deletedBy);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['salaryOffer'])) $this->salaryOffer = $o['salaryOffer'];
        if (isset($o['jobApplicationId'])) $this->jobApplicationId = $o['jobApplicationId'];
        if (isset($o['appUserId'])) $this->appUserId = $o['appUserId'];
        if (isset($o['appUser'])) $this->appUser = JsonConverters::from('AppUser', $o['appUser']);
        if (isset($o['notes'])) $this->notes = $o['notes'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->salaryOffer)) $o['salaryOffer'] = $this->salaryOffer;
        if (isset($this->jobApplicationId)) $o['jobApplicationId'] = $this->jobApplicationId;
        if (isset($this->appUserId)) $o['appUserId'] = $this->appUserId;
        if (isset($this->appUser)) $o['appUser'] = JsonConverters::to('AppUser', $this->appUser);
        if (isset($this->notes)) $o['notes'] = $this->notes;
        return $o;
    }
}

class SubType implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
}

enum Colors : string
{
    case Transparent = 'Transparent';
    case Red = 'Red';
    case Green = 'Green';
    case Blue = 'Blue';
}

class Attachment implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $fileName='',
        /** @var string */
        public string $filePath='',
        /** @var string */
        public string $contentType='',
        /** @var int */
        public int $contentLength=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['fileName'])) $this->fileName = $o['fileName'];
        if (isset($o['filePath'])) $this->filePath = $o['filePath'];
        if (isset($o['contentType'])) $this->contentType = $o['contentType'];
        if (isset($o['contentLength'])) $this->contentLength = $o['contentLength'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->fileName)) $o['fileName'] = $this->fileName;
        if (isset($this->filePath)) $o['filePath'] = $this->filePath;
        if (isset($this->contentType)) $o['contentType'] = $this->contentType;
        if (isset($this->contentLength)) $o['contentLength'] = $this->contentLength;
        return $o;
    }
}

class Poco implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
}

class InvoiceItems implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $invoiceLineId=0,
        /** @var int */
        public int $invoiceId=0,
        /** @var int */
        public int $trackId=0,
        /** @var float */
        public float $unitPrice=0.0,
        /** @var int */
        public int $quantity=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['invoiceLineId'])) $this->invoiceLineId = $o['invoiceLineId'];
        if (isset($o['invoiceId'])) $this->invoiceId = $o['invoiceId'];
        if (isset($o['trackId'])) $this->trackId = $o['trackId'];
        if (isset($o['unitPrice'])) $this->unitPrice = $o['unitPrice'];
        if (isset($o['quantity'])) $this->quantity = $o['quantity'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->invoiceLineId)) $o['invoiceLineId'] = $this->invoiceLineId;
        if (isset($this->invoiceId)) $o['invoiceId'] = $this->invoiceId;
        if (isset($this->trackId)) $o['trackId'] = $this->trackId;
        if (isset($this->unitPrice)) $o['unitPrice'] = $this->unitPrice;
        if (isset($this->quantity)) $o['quantity'] = $this->quantity;
        return $o;
    }
}

class Invoices implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $invoiceId=0,
        /** @var int */
        public int $customerId=0,
        /** @var DateTime */
        public DateTime $invoiceDate=new DateTime(),
        /** @var string */
        public string $billingAddress='',
        /** @var string */
        public string $billingCity='',
        /** @var string */
        public string $billingState='',
        /** @var string */
        public string $billingCountry='',
        /** @var string */
        public string $billingPostalCode='',
        /** @var float */
        public float $total=0.0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['invoiceId'])) $this->invoiceId = $o['invoiceId'];
        if (isset($o['customerId'])) $this->customerId = $o['customerId'];
        if (isset($o['invoiceDate'])) $this->invoiceDate = JsonConverters::from('DateTime', $o['invoiceDate']);
        if (isset($o['billingAddress'])) $this->billingAddress = $o['billingAddress'];
        if (isset($o['billingCity'])) $this->billingCity = $o['billingCity'];
        if (isset($o['billingState'])) $this->billingState = $o['billingState'];
        if (isset($o['billingCountry'])) $this->billingCountry = $o['billingCountry'];
        if (isset($o['billingPostalCode'])) $this->billingPostalCode = $o['billingPostalCode'];
        if (isset($o['total'])) $this->total = $o['total'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->invoiceId)) $o['invoiceId'] = $this->invoiceId;
        if (isset($this->customerId)) $o['customerId'] = $this->customerId;
        if (isset($this->invoiceDate)) $o['invoiceDate'] = JsonConverters::to('DateTime', $this->invoiceDate);
        if (isset($this->billingAddress)) $o['billingAddress'] = $this->billingAddress;
        if (isset($this->billingCity)) $o['billingCity'] = $this->billingCity;
        if (isset($this->billingState)) $o['billingState'] = $this->billingState;
        if (isset($this->billingCountry)) $o['billingCountry'] = $this->billingCountry;
        if (isset($this->billingPostalCode)) $o['billingPostalCode'] = $this->billingPostalCode;
        if (isset($this->total)) $o['total'] = $this->total;
        return $o;
    }
}

class MediaTypes implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $mediaTypeId=0,
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['mediaTypeId'])) $this->mediaTypeId = $o['mediaTypeId'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->mediaTypeId)) $o['mediaTypeId'] = $this->mediaTypeId;
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
}

class Playlists implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $playlistId=0,
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['playlistId'])) $this->playlistId = $o['playlistId'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->playlistId)) $o['playlistId'] = $this->playlistId;
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
}

class Tracks implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $trackId=0,
        // @Required()
        /** @var string */
        public string $name='',

        /** @var int|null */
        public ?int $albumId=null,
        /** @var int */
        public int $mediaTypeId=0,
        /** @var int|null */
        public ?int $genreId=null,
        /** @var string */
        public string $composer='',
        /** @var int */
        public int $milliseconds=0,
        /** @var int|null */
        public ?int $bytes=null,
        /** @var float */
        public float $unitPrice=0.0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['trackId'])) $this->trackId = $o['trackId'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['albumId'])) $this->albumId = $o['albumId'];
        if (isset($o['mediaTypeId'])) $this->mediaTypeId = $o['mediaTypeId'];
        if (isset($o['genreId'])) $this->genreId = $o['genreId'];
        if (isset($o['composer'])) $this->composer = $o['composer'];
        if (isset($o['milliseconds'])) $this->milliseconds = $o['milliseconds'];
        if (isset($o['bytes'])) $this->bytes = $o['bytes'];
        if (isset($o['unitPrice'])) $this->unitPrice = $o['unitPrice'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->trackId)) $o['trackId'] = $this->trackId;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->albumId)) $o['albumId'] = $this->albumId;
        if (isset($this->mediaTypeId)) $o['mediaTypeId'] = $this->mediaTypeId;
        if (isset($this->genreId)) $o['genreId'] = $this->genreId;
        if (isset($this->composer)) $o['composer'] = $this->composer;
        if (isset($this->milliseconds)) $o['milliseconds'] = $this->milliseconds;
        if (isset($this->bytes)) $o['bytes'] = $this->bytes;
        if (isset($this->unitPrice)) $o['unitPrice'] = $this->unitPrice;
        return $o;
    }
}

enum EmploymentType : string
{
    case FullTime = 'FullTime';
    case PartTime = 'PartTime';
    case Casual = 'Casual';
    case Contract = 'Contract';
}

class Job extends AuditBase implements JsonSerializable
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
        DateTime $deletedDate=null,
        string $deletedBy=null,
        /** @var int */
        public int $id=0,
        /** @var string */
        public string $title='',
        /** @var EmploymentType|null */
        public ?EmploymentType $employmentType=null,
        /** @var string */
        public string $company='',
        /** @var string */
        public string $location='',
        /** @var int */
        public int $salaryRangeLower=0,
        /** @var int */
        public int $salaryRangeUpper=0,
        // @StringLength(2147483647)
        /** @var string */
        public string $description='',

        /** @var array<JobApplication>|null */
        public ?array $applications=null,
        /** @var DateTime */
        public DateTime $closing=new DateTime()
    ) {
        parent::__construct($createdDate,$createdBy,$modifiedDate,$modifiedBy,$deletedDate,$deletedBy);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['employmentType'])) $this->employmentType = JsonConverters::from('EmploymentType', $o['employmentType']);
        if (isset($o['company'])) $this->company = $o['company'];
        if (isset($o['location'])) $this->location = $o['location'];
        if (isset($o['salaryRangeLower'])) $this->salaryRangeLower = $o['salaryRangeLower'];
        if (isset($o['salaryRangeUpper'])) $this->salaryRangeUpper = $o['salaryRangeUpper'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['applications'])) $this->applications = JsonConverters::fromArray('JobApplication', $o['applications']);
        if (isset($o['closing'])) $this->closing = JsonConverters::from('DateTime', $o['closing']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->employmentType)) $o['employmentType'] = JsonConverters::to('EmploymentType', $this->employmentType);
        if (isset($this->company)) $o['company'] = $this->company;
        if (isset($this->location)) $o['location'] = $this->location;
        if (isset($this->salaryRangeLower)) $o['salaryRangeLower'] = $this->salaryRangeLower;
        if (isset($this->salaryRangeUpper)) $o['salaryRangeUpper'] = $this->salaryRangeUpper;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->applications)) $o['applications'] = JsonConverters::toArray('JobApplication', $this->applications);
        if (isset($this->closing)) $o['closing'] = JsonConverters::to('DateTime', $this->closing);
        return $o;
    }
}

class Contact extends AuditBase implements JsonSerializable
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
        DateTime $deletedDate=null,
        string $deletedBy=null,
        /** @var int */
        public int $id=0,
        // @Computed()
        /** @var string */
        public string $displayName='',

        /** @var string */
        public string $profileUrl='',
        /** @var string */
        public string $firstName='',
        /** @var string */
        public string $lastName='',
        /** @var int|null */
        public ?int $salaryExpectation=null,
        /** @var string */
        public string $jobType='',
        /** @var int */
        public int $availabilityWeeks=0,
        /** @var EmploymentType|null */
        public ?EmploymentType $preferredWorkType=null,
        /** @var string */
        public string $preferredLocation='',
        /** @var string */
        public string $email='',
        /** @var string */
        public string $phone='',
        // @StringLength(2147483647)
        /** @var string */
        public string $about='',

        /** @var array<JobApplication>|null */
        public ?array $applications=null
    ) {
        parent::__construct($createdDate,$createdBy,$modifiedDate,$modifiedBy,$deletedDate,$deletedBy);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['displayName'])) $this->displayName = $o['displayName'];
        if (isset($o['profileUrl'])) $this->profileUrl = $o['profileUrl'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['salaryExpectation'])) $this->salaryExpectation = $o['salaryExpectation'];
        if (isset($o['jobType'])) $this->jobType = $o['jobType'];
        if (isset($o['availabilityWeeks'])) $this->availabilityWeeks = $o['availabilityWeeks'];
        if (isset($o['preferredWorkType'])) $this->preferredWorkType = JsonConverters::from('EmploymentType', $o['preferredWorkType']);
        if (isset($o['preferredLocation'])) $this->preferredLocation = $o['preferredLocation'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['about'])) $this->about = $o['about'];
        if (isset($o['applications'])) $this->applications = JsonConverters::fromArray('JobApplication', $o['applications']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->displayName)) $o['displayName'] = $this->displayName;
        if (isset($this->profileUrl)) $o['profileUrl'] = $this->profileUrl;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->salaryExpectation)) $o['salaryExpectation'] = $this->salaryExpectation;
        if (isset($this->jobType)) $o['jobType'] = $this->jobType;
        if (isset($this->availabilityWeeks)) $o['availabilityWeeks'] = $this->availabilityWeeks;
        if (isset($this->preferredWorkType)) $o['preferredWorkType'] = JsonConverters::to('EmploymentType', $this->preferredWorkType);
        if (isset($this->preferredLocation)) $o['preferredLocation'] = $this->preferredLocation;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->about)) $o['about'] = $this->about;
        if (isset($this->applications)) $o['applications'] = JsonConverters::toArray('JobApplication', $this->applications);
        return $o;
    }
}

class JobApplicationComment extends AuditBase implements JsonSerializable
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
        DateTime $deletedDate=null,
        string $deletedBy=null,
        /** @var int */
        public int $id=0,
        // @References("typeof(TalentBlazor.ServiceModel.AppUser)")
        /** @var int */
        public int $appUserId=0,

        /** @var AppUser|null */
        public ?AppUser $appUser=null,
        // @References("typeof(TalentBlazor.ServiceModel.JobApplication)")
        /** @var int */
        public int $jobApplicationId=0,

        // @StringLength(2147483647)
        /** @var string */
        public string $comment=''
    ) {
        parent::__construct($createdDate,$createdBy,$modifiedDate,$modifiedBy,$deletedDate,$deletedBy);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['appUserId'])) $this->appUserId = $o['appUserId'];
        if (isset($o['appUser'])) $this->appUser = JsonConverters::from('AppUser', $o['appUser']);
        if (isset($o['jobApplicationId'])) $this->jobApplicationId = $o['jobApplicationId'];
        if (isset($o['comment'])) $this->comment = $o['comment'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->appUserId)) $o['appUserId'] = $this->appUserId;
        if (isset($this->appUser)) $o['appUser'] = JsonConverters::to('AppUser', $this->appUser);
        if (isset($this->jobApplicationId)) $o['jobApplicationId'] = $this->jobApplicationId;
        if (isset($this->comment)) $o['comment'] = $this->comment;
        return $o;
    }
}

class JobApplicationAttachment implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        // @References("typeof(TalentBlazor.ServiceModel.JobApplication)")
        /** @var int */
        public int $jobApplicationId=0,

        /** @var string */
        public string $fileName='',
        /** @var string */
        public string $filePath='',
        /** @var string */
        public string $contentType='',
        /** @var int */
        public int $contentLength=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['jobApplicationId'])) $this->jobApplicationId = $o['jobApplicationId'];
        if (isset($o['fileName'])) $this->fileName = $o['fileName'];
        if (isset($o['filePath'])) $this->filePath = $o['filePath'];
        if (isset($o['contentType'])) $this->contentType = $o['contentType'];
        if (isset($o['contentLength'])) $this->contentLength = $o['contentLength'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->jobApplicationId)) $o['jobApplicationId'] = $this->jobApplicationId;
        if (isset($this->fileName)) $o['fileName'] = $this->fileName;
        if (isset($this->filePath)) $o['filePath'] = $this->filePath;
        if (isset($this->contentType)) $o['contentType'] = $this->contentType;
        if (isset($this->contentLength)) $o['contentLength'] = $this->contentLength;
        return $o;
    }
}

class JobApplicationEvent extends AuditBase implements JsonSerializable
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
        DateTime $deletedDate=null,
        string $deletedBy=null,
        /** @var int */
        public int $id=0,
        // @References("typeof(TalentBlazor.ServiceModel.JobApplication)")
        /** @var int */
        public int $jobApplicationId=0,

        // @References("typeof(TalentBlazor.ServiceModel.AppUser)")
        /** @var int */
        public int $appUserId=0,

        /** @var AppUser|null */
        public ?AppUser $appUser=null,
        // @StringLength(2147483647)
        /** @var string */
        public string $description='',

        /** @var JobApplicationStatus|null */
        public ?JobApplicationStatus $status=null,
        /** @var DateTime */
        public DateTime $eventDate=new DateTime()
    ) {
        parent::__construct($createdDate,$createdBy,$modifiedDate,$modifiedBy,$deletedDate,$deletedBy);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['jobApplicationId'])) $this->jobApplicationId = $o['jobApplicationId'];
        if (isset($o['appUserId'])) $this->appUserId = $o['appUserId'];
        if (isset($o['appUser'])) $this->appUser = JsonConverters::from('AppUser', $o['appUser']);
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['status'])) $this->status = JsonConverters::from('JobApplicationStatus', $o['status']);
        if (isset($o['eventDate'])) $this->eventDate = JsonConverters::from('DateTime', $o['eventDate']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->jobApplicationId)) $o['jobApplicationId'] = $this->jobApplicationId;
        if (isset($this->appUserId)) $o['appUserId'] = $this->appUserId;
        if (isset($this->appUser)) $o['appUser'] = JsonConverters::to('AppUser', $this->appUser);
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->status)) $o['status'] = JsonConverters::to('JobApplicationStatus', $this->status);
        if (isset($this->eventDate)) $o['eventDate'] = JsonConverters::to('DateTime', $this->eventDate);
        return $o;
    }
}

class JobApplication extends AuditBase implements JsonSerializable
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
        DateTime $deletedDate=null,
        string $deletedBy=null,
        /** @var int */
        public int $id=0,
        // @References("typeof(TalentBlazor.ServiceModel.Job)")
        /** @var int */
        public int $jobId=0,

        // @References("typeof(TalentBlazor.ServiceModel.Contact)")
        /** @var int */
        public int $contactId=0,

        /** @var Job|null */
        public ?Job $position=null,
        /** @var Contact|null */
        public ?Contact $applicant=null,
        /** @var array<JobApplicationComment>|null */
        public ?array $comments=null,
        /** @var DateTime */
        public DateTime $appliedDate=new DateTime(),
        /** @var JobApplicationStatus|null */
        public ?JobApplicationStatus $applicationStatus=null,
        /** @var array<JobApplicationAttachment>|null */
        public ?array $attachments=null,
        /** @var array<JobApplicationEvent>|null */
        public ?array $events=null,
        /** @var PhoneScreen|null */
        public ?PhoneScreen $phoneScreen=null,
        /** @var Interview|null */
        public ?Interview $interview=null,
        /** @var JobOffer|null */
        public ?JobOffer $jobOffer=null
    ) {
        parent::__construct($createdDate,$createdBy,$modifiedDate,$modifiedBy,$deletedDate,$deletedBy);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['jobId'])) $this->jobId = $o['jobId'];
        if (isset($o['contactId'])) $this->contactId = $o['contactId'];
        if (isset($o['position'])) $this->position = JsonConverters::from('Job', $o['position']);
        if (isset($o['applicant'])) $this->applicant = JsonConverters::from('Contact', $o['applicant']);
        if (isset($o['comments'])) $this->comments = JsonConverters::fromArray('JobApplicationComment', $o['comments']);
        if (isset($o['appliedDate'])) $this->appliedDate = JsonConverters::from('DateTime', $o['appliedDate']);
        if (isset($o['applicationStatus'])) $this->applicationStatus = JsonConverters::from('JobApplicationStatus', $o['applicationStatus']);
        if (isset($o['attachments'])) $this->attachments = JsonConverters::fromArray('JobApplicationAttachment', $o['attachments']);
        if (isset($o['events'])) $this->events = JsonConverters::fromArray('JobApplicationEvent', $o['events']);
        if (isset($o['phoneScreen'])) $this->phoneScreen = JsonConverters::from('PhoneScreen', $o['phoneScreen']);
        if (isset($o['interview'])) $this->interview = JsonConverters::from('Interview', $o['interview']);
        if (isset($o['jobOffer'])) $this->jobOffer = JsonConverters::from('JobOffer', $o['jobOffer']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->jobId)) $o['jobId'] = $this->jobId;
        if (isset($this->contactId)) $o['contactId'] = $this->contactId;
        if (isset($this->position)) $o['position'] = JsonConverters::to('Job', $this->position);
        if (isset($this->applicant)) $o['applicant'] = JsonConverters::to('Contact', $this->applicant);
        if (isset($this->comments)) $o['comments'] = JsonConverters::toArray('JobApplicationComment', $this->comments);
        if (isset($this->appliedDate)) $o['appliedDate'] = JsonConverters::to('DateTime', $this->appliedDate);
        if (isset($this->applicationStatus)) $o['applicationStatus'] = JsonConverters::to('JobApplicationStatus', $this->applicationStatus);
        if (isset($this->attachments)) $o['attachments'] = JsonConverters::toArray('JobApplicationAttachment', $this->attachments);
        if (isset($this->events)) $o['events'] = JsonConverters::toArray('JobApplicationEvent', $this->events);
        if (isset($this->phoneScreen)) $o['phoneScreen'] = JsonConverters::to('PhoneScreen', $this->phoneScreen);
        if (isset($this->interview)) $o['interview'] = JsonConverters::to('Interview', $this->interview);
        if (isset($this->jobOffer)) $o['jobOffer'] = JsonConverters::to('JobOffer', $this->jobOffer);
        return $o;
    }
}

enum RoomType : string
{
    case Single = 'Single';
    case Double = 'Double';
    case Queen = 'Queen';
    case Twin = 'Twin';
    case Suite = 'Suite';
}

/** @description Discount Coupons */
class Coupon implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $id='',
        /** @var string */
        public string $description='',
        /** @var int */
        public int $discount=0,
        /** @var DateTime */
        public DateTime $expiryDate=new DateTime()
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['discount'])) $this->discount = $o['discount'];
        if (isset($o['expiryDate'])) $this->expiryDate = JsonConverters::from('DateTime', $o['expiryDate']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->discount)) $o['discount'] = $this->discount;
        if (isset($this->expiryDate)) $o['expiryDate'] = JsonConverters::to('DateTime', $this->expiryDate);
        return $o;
    }
}

/** @description Booking Details */
class Booking extends AuditBase implements JsonSerializable
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
        DateTime $deletedDate=null,
        string $deletedBy=null,
        /** @var int */
        public int $id=0,
        /** @var string */
        public string $name='',
        /** @var RoomType|null */
        public ?RoomType $roomType=null,
        /** @var int */
        public int $roomNumber=0,
        /** @var DateTime */
        public DateTime $bookingStartDate=new DateTime(),
        /** @var DateTime|null */
        public ?DateTime $bookingEndDate=null,
        /** @var float */
        public float $cost=0.0,
        // @References("typeof(MyApp.ServiceModel.Coupon)")
        /** @var string|null */
        public ?string $couponId=null,

        /** @var Coupon|null */
        public ?Coupon $discount=null,
        /** @var string|null */
        public ?string $notes=null,
        /** @var bool|null */
        public ?bool $cancelled=null
    ) {
        parent::__construct($createdDate,$createdBy,$modifiedDate,$modifiedBy,$deletedDate,$deletedBy);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['roomType'])) $this->roomType = JsonConverters::from('RoomType', $o['roomType']);
        if (isset($o['roomNumber'])) $this->roomNumber = $o['roomNumber'];
        if (isset($o['bookingStartDate'])) $this->bookingStartDate = JsonConverters::from('DateTime', $o['bookingStartDate']);
        if (isset($o['bookingEndDate'])) $this->bookingEndDate = $o['bookingEndDate'];
        if (isset($o['cost'])) $this->cost = $o['cost'];
        if (isset($o['couponId'])) $this->couponId = $o['couponId'];
        if (isset($o['discount'])) $this->discount = JsonConverters::from('Coupon', $o['discount']);
        if (isset($o['notes'])) $this->notes = $o['notes'];
        if (isset($o['cancelled'])) $this->cancelled = $o['cancelled'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->roomType)) $o['roomType'] = JsonConverters::to('RoomType', $this->roomType);
        if (isset($this->roomNumber)) $o['roomNumber'] = $this->roomNumber;
        if (isset($this->bookingStartDate)) $o['bookingStartDate'] = JsonConverters::to('DateTime', $this->bookingStartDate);
        if (isset($this->bookingEndDate)) $o['bookingEndDate'] = $this->bookingEndDate;
        if (isset($this->cost)) $o['cost'] = $this->cost;
        if (isset($this->couponId)) $o['couponId'] = $this->couponId;
        if (isset($this->discount)) $o['discount'] = JsonConverters::to('Coupon', $this->discount);
        if (isset($this->notes)) $o['notes'] = $this->notes;
        if (isset($this->cancelled)) $o['cancelled'] = $this->cancelled;
        return $o;
    }
}

enum FileAccessType : string
{
    case Public = 'Public';
    case Team = 'Team';
    case Private = 'Private';
}

class FileSystemFile implements IFile, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string */
        public string $fileName='',
        /** @var string */
        public string $filePath='',
        /** @var string */
        public string $contentType='',
        /** @var int */
        public int $contentLength=0,
        // @References("typeof(MyApp.ServiceModel.FileSystemItem)")
        /** @var int */
        public int $fileSystemItemId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['fileName'])) $this->fileName = $o['fileName'];
        if (isset($o['filePath'])) $this->filePath = $o['filePath'];
        if (isset($o['contentType'])) $this->contentType = $o['contentType'];
        if (isset($o['contentLength'])) $this->contentLength = $o['contentLength'];
        if (isset($o['fileSystemItemId'])) $this->fileSystemItemId = $o['fileSystemItemId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->fileName)) $o['fileName'] = $this->fileName;
        if (isset($this->filePath)) $o['filePath'] = $this->filePath;
        if (isset($this->contentType)) $o['contentType'] = $this->contentType;
        if (isset($this->contentLength)) $o['contentLength'] = $this->contentLength;
        if (isset($this->fileSystemItemId)) $o['fileSystemItemId'] = $this->fileSystemItemId;
        return $o;
    }
}

class FileSystemItem implements IFileItem, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var FileAccessType|null */
        public ?FileAccessType $fileAccessType=null,
        /** @var FileSystemFile|null */
        public ?FileSystemFile $file=null,
        /** @var int */
        public int $appUserId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['fileAccessType'])) $this->fileAccessType = JsonConverters::from('FileAccessType', $o['fileAccessType']);
        if (isset($o['file'])) $this->file = JsonConverters::from('FileSystemFile', $o['file']);
        if (isset($o['appUserId'])) $this->appUserId = $o['appUserId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->fileAccessType)) $o['fileAccessType'] = JsonConverters::to('FileAccessType', $this->fileAccessType);
        if (isset($this->file)) $o['file'] = JsonConverters::to('FileSystemFile', $this->file);
        if (isset($this->appUserId)) $o['appUserId'] = $this->appUserId;
        return $o;
    }
}

/**
 * @property FileAccessType|null $fileAccessType
 */
interface IFileItem
{
}

enum PhoneKind : string
{
    case Home = 'Home';
    case Mobile = 'Mobile';
    case Work = 'Work';
}

class Phone implements JsonSerializable
{
    public function __construct(
        /** @var PhoneKind|null */
        public ?PhoneKind $kind=null,
        /** @var string */
        public string $number='',
        /** @var string */
        public string $ext=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['kind'])) $this->kind = JsonConverters::from('PhoneKind', $o['kind']);
        if (isset($o['number'])) $this->number = $o['number'];
        if (isset($o['ext'])) $this->ext = $o['ext'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->kind)) $o['kind'] = JsonConverters::to('PhoneKind', $this->kind);
        if (isset($this->number)) $o['number'] = $this->number;
        if (isset($this->ext)) $o['ext'] = $this->ext;
        return $o;
    }
}

class PlayerGameItem implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        // @References("typeof(MyApp.ServiceModel.Player)")
        /** @var int */
        public int $playerId=0,

        // @References("typeof(MyApp.ServiceModel.GameItem)")
        /** @var string */
        public string $gameItemName=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['playerId'])) $this->playerId = $o['playerId'];
        if (isset($o['gameItemName'])) $this->gameItemName = $o['gameItemName'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->playerId)) $o['playerId'] = $this->playerId;
        if (isset($this->gameItemName)) $o['gameItemName'] = $this->gameItemName;
        return $o;
    }
}

enum PlayerRole : string
{
    case Leader = 'Leader';
    case Player = 'Player';
    case NonPlayer = 'NonPlayer';
}

enum PlayerRegion : int
{
    case Africa = 1;
    case Americas = 2;
    case Asia = 3;
    case Australasia = 4;
    case Europe = 5;
}

class Profile extends AuditBase implements JsonSerializable
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
        DateTime $deletedDate=null,
        string $deletedBy=null,
        /** @var int */
        public int $id=0,
        /** @var PlayerRole|null */
        public ?PlayerRole $role=null,
        /** @var PlayerRegion|null */
        public ?PlayerRegion $region=null,
        /** @var string|null */
        public ?string $username=null,
        /** @var int */
        public int $highScore=0,
        /** @var int */
        public int $gamesPlayed=0,
        /** @var int */
        public int $energy=0,
        /** @var string|null */
        public ?string $profileUrl=null,
        /** @var string|null */
        public ?string $coverUrl=null,
        /** @var array<string,string>|null */
        public ?array $meta=null
    ) {
        parent::__construct($createdDate,$createdBy,$modifiedDate,$modifiedBy,$deletedDate,$deletedBy);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['role'])) $this->role = JsonConverters::from('PlayerRole', $o['role']);
        if (isset($o['region'])) $this->region = JsonConverters::from('PlayerRegion', $o['region']);
        if (isset($o['username'])) $this->username = $o['username'];
        if (isset($o['highScore'])) $this->highScore = $o['highScore'];
        if (isset($o['gamesPlayed'])) $this->gamesPlayed = $o['gamesPlayed'];
        if (isset($o['energy'])) $this->energy = $o['energy'];
        if (isset($o['profileUrl'])) $this->profileUrl = $o['profileUrl'];
        if (isset($o['coverUrl'])) $this->coverUrl = $o['coverUrl'];
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->role)) $o['role'] = JsonConverters::to('PlayerRole', $this->role);
        if (isset($this->region)) $o['region'] = JsonConverters::to('PlayerRegion', $this->region);
        if (isset($this->username)) $o['username'] = $this->username;
        if (isset($this->highScore)) $o['highScore'] = $this->highScore;
        if (isset($this->gamesPlayed)) $o['gamesPlayed'] = $this->gamesPlayed;
        if (isset($this->energy)) $o['energy'] = $this->energy;
        if (isset($this->profileUrl)) $o['profileUrl'] = $this->profileUrl;
        if (isset($this->coverUrl)) $o['coverUrl'] = $this->coverUrl;
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        return $o;
    }
}

class Player extends AuditBase implements JsonSerializable
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
        DateTime $deletedDate=null,
        string $deletedBy=null,
        /** @var int */
        public int $id=0,
        // @Required()
        /** @var string */
        public string $firstName='',

        /** @var string */
        public string $lastName='',
        /** @var string */
        public string $email='',
        /** @var array<Phone>|null */
        public ?array $phoneNumbers=null,
        /** @var array<PlayerGameItem>|null */
        public ?array $gameItems=null,
        /** @var Profile|null */
        public ?Profile $profile=null,
        /** @var int */
        public int $profileId=0,
        /** @var string */
        public string $savedLevelId='',
        /** @var int */
        public int $rowVersion=0,
        /** @var string */
        public string $capital=''
    ) {
        parent::__construct($createdDate,$createdBy,$modifiedDate,$modifiedBy,$deletedDate,$deletedBy);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['phoneNumbers'])) $this->phoneNumbers = JsonConverters::fromArray('Phone', $o['phoneNumbers']);
        if (isset($o['gameItems'])) $this->gameItems = JsonConverters::fromArray('PlayerGameItem', $o['gameItems']);
        if (isset($o['profile'])) $this->profile = JsonConverters::from('Profile', $o['profile']);
        if (isset($o['profileId'])) $this->profileId = $o['profileId'];
        if (isset($o['savedLevelId'])) $this->savedLevelId = $o['savedLevelId'];
        if (isset($o['rowVersion'])) $this->rowVersion = $o['rowVersion'];
        if (isset($o['capital'])) $this->capital = $o['capital'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->phoneNumbers)) $o['phoneNumbers'] = JsonConverters::toArray('Phone', $this->phoneNumbers);
        if (isset($this->gameItems)) $o['gameItems'] = JsonConverters::toArray('PlayerGameItem', $this->gameItems);
        if (isset($this->profile)) $o['profile'] = JsonConverters::to('Profile', $this->profile);
        if (isset($this->profileId)) $o['profileId'] = $this->profileId;
        if (isset($this->savedLevelId)) $o['savedLevelId'] = $this->savedLevelId;
        if (isset($this->rowVersion)) $o['rowVersion'] = $this->rowVersion;
        if (isset($this->capital)) $o['capital'] = $this->capital;
        return $o;
    }
}

class GameItem extends AuditBase implements JsonSerializable
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
        DateTime $deletedDate=null,
        string $deletedBy=null,
        // @StringLength(50)
        /** @var string */
        public string $name='',

        /** @var string */
        public string $imageUrl='',
        // @StringLength(2147483647)
        /** @var string|null */
        public ?string $description=null,

        /** @var DateTime */
        public DateTime $dateAdded=new DateTime()
    ) {
        parent::__construct($createdDate,$createdBy,$modifiedDate,$modifiedBy,$deletedDate,$deletedBy);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['imageUrl'])) $this->imageUrl = $o['imageUrl'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['dateAdded'])) $this->dateAdded = JsonConverters::from('DateTime', $o['dateAdded']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->imageUrl)) $o['imageUrl'] = $this->imageUrl;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->dateAdded)) $o['dateAdded'] = JsonConverters::to('DateTime', $this->dateAdded);
        return $o;
    }
}

// @DataContract
class Migration implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $name=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $description=null,

        // @DataMember(Order=4)
        // @Required()
        /** @var string */
        public string $createdDate='',

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $completedDate=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $connectionString=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $namedConnection=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $log=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $errorCode=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $errorMessage=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $errorStackTrace=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['createdDate'])) $this->createdDate = $o['createdDate'];
        if (isset($o['completedDate'])) $this->completedDate = $o['completedDate'];
        if (isset($o['connectionString'])) $this->connectionString = $o['connectionString'];
        if (isset($o['namedConnection'])) $this->namedConnection = $o['namedConnection'];
        if (isset($o['log'])) $this->log = $o['log'];
        if (isset($o['errorCode'])) $this->errorCode = $o['errorCode'];
        if (isset($o['errorMessage'])) $this->errorMessage = $o['errorMessage'];
        if (isset($o['errorStackTrace'])) $this->errorStackTrace = $o['errorStackTrace'];
        if (isset($o['meta'])) $this->meta = $o['meta'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->createdDate)) $o['createdDate'] = $this->createdDate;
        if (isset($this->completedDate)) $o['completedDate'] = $this->completedDate;
        if (isset($this->connectionString)) $o['connectionString'] = $this->connectionString;
        if (isset($this->namedConnection)) $o['namedConnection'] = $this->namedConnection;
        if (isset($this->log)) $o['log'] = $this->log;
        if (isset($this->errorCode)) $o['errorCode'] = $this->errorCode;
        if (isset($this->errorMessage)) $o['errorMessage'] = $this->errorMessage;
        if (isset($this->errorStackTrace)) $o['errorStackTrace'] = $this->errorStackTrace;
        if (isset($this->meta)) $o['meta'] = $this->meta;
        return $o;
    }
}

// @DataContract
class Order implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $customerId=null,

        // @DataMember(Order=3)
        /** @var int */
        public int $employeeId=0,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $orderDate=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $requiredDate=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $shippedDate=null,

        // @DataMember(Order=7)
        /** @var int|null */
        public ?int $shipVia=null,

        // @DataMember(Order=8)
        /** @var float */
        public float $freight=0.0,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $shipName=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $shipAddress=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $shipCity=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $shipRegion=null,

        // @DataMember(Order=13)
        /** @var string|null */
        public ?string $shipPostalCode=null,

        // @DataMember(Order=14)
        /** @var string|null */
        public ?string $shipCountry=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['customerId'])) $this->customerId = $o['customerId'];
        if (isset($o['employeeId'])) $this->employeeId = $o['employeeId'];
        if (isset($o['orderDate'])) $this->orderDate = $o['orderDate'];
        if (isset($o['requiredDate'])) $this->requiredDate = $o['requiredDate'];
        if (isset($o['shippedDate'])) $this->shippedDate = $o['shippedDate'];
        if (isset($o['shipVia'])) $this->shipVia = $o['shipVia'];
        if (isset($o['freight'])) $this->freight = $o['freight'];
        if (isset($o['shipName'])) $this->shipName = $o['shipName'];
        if (isset($o['shipAddress'])) $this->shipAddress = $o['shipAddress'];
        if (isset($o['shipCity'])) $this->shipCity = $o['shipCity'];
        if (isset($o['shipRegion'])) $this->shipRegion = $o['shipRegion'];
        if (isset($o['shipPostalCode'])) $this->shipPostalCode = $o['shipPostalCode'];
        if (isset($o['shipCountry'])) $this->shipCountry = $o['shipCountry'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->customerId)) $o['customerId'] = $this->customerId;
        if (isset($this->employeeId)) $o['employeeId'] = $this->employeeId;
        if (isset($this->orderDate)) $o['orderDate'] = $this->orderDate;
        if (isset($this->requiredDate)) $o['requiredDate'] = $this->requiredDate;
        if (isset($this->shippedDate)) $o['shippedDate'] = $this->shippedDate;
        if (isset($this->shipVia)) $o['shipVia'] = $this->shipVia;
        if (isset($this->freight)) $o['freight'] = $this->freight;
        if (isset($this->shipName)) $o['shipName'] = $this->shipName;
        if (isset($this->shipAddress)) $o['shipAddress'] = $this->shipAddress;
        if (isset($this->shipCity)) $o['shipCity'] = $this->shipCity;
        if (isset($this->shipRegion)) $o['shipRegion'] = $this->shipRegion;
        if (isset($this->shipPostalCode)) $o['shipPostalCode'] = $this->shipPostalCode;
        if (isset($this->shipCountry)) $o['shipCountry'] = $this->shipCountry;
        return $o;
    }
}

// @DataContract
class OrderDetail implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null,

        // @DataMember(Order=2)
        /** @var int */
        public int $orderId=0,

        // @DataMember(Order=3)
        /** @var int */
        public int $productId=0,

        // @DataMember(Order=4)
        /** @var float */
        public float $unitPrice=0.0,

        // @DataMember(Order=5)
        /** @var int */
        public int $quantity=0,

        // @DataMember(Order=6)
        /** @var float */
        public float $discount=0.0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['orderId'])) $this->orderId = $o['orderId'];
        if (isset($o['productId'])) $this->productId = $o['productId'];
        if (isset($o['unitPrice'])) $this->unitPrice = $o['unitPrice'];
        if (isset($o['quantity'])) $this->quantity = $o['quantity'];
        if (isset($o['discount'])) $this->discount = $o['discount'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->orderId)) $o['orderId'] = $this->orderId;
        if (isset($this->productId)) $o['productId'] = $this->productId;
        if (isset($this->unitPrice)) $o['unitPrice'] = $this->unitPrice;
        if (isset($this->quantity)) $o['quantity'] = $this->quantity;
        if (isset($this->discount)) $o['discount'] = $this->discount;
        return $o;
    }
}

// @DataContract
class Product implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $productName=null,

        // @DataMember(Order=3)
        /** @var int */
        public int $supplierId=0,

        // @DataMember(Order=4)
        /** @var int */
        public int $categoryId=0,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $quantityPerUnit=null,

        // @DataMember(Order=6)
        /** @var int */
        public int $unitPrice=0,

        // @DataMember(Order=7)
        /** @var int */
        public int $unitsInStock=0,

        // @DataMember(Order=8)
        /** @var int */
        public int $unitsOnOrder=0,

        // @DataMember(Order=9)
        /** @var int */
        public int $reorderLevel=0,

        // @DataMember(Order=10)
        /** @var int */
        public int $discontinued=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['productName'])) $this->productName = $o['productName'];
        if (isset($o['supplierId'])) $this->supplierId = $o['supplierId'];
        if (isset($o['categoryId'])) $this->categoryId = $o['categoryId'];
        if (isset($o['quantityPerUnit'])) $this->quantityPerUnit = $o['quantityPerUnit'];
        if (isset($o['unitPrice'])) $this->unitPrice = $o['unitPrice'];
        if (isset($o['unitsInStock'])) $this->unitsInStock = $o['unitsInStock'];
        if (isset($o['unitsOnOrder'])) $this->unitsOnOrder = $o['unitsOnOrder'];
        if (isset($o['reorderLevel'])) $this->reorderLevel = $o['reorderLevel'];
        if (isset($o['discontinued'])) $this->discontinued = $o['discontinued'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->productName)) $o['productName'] = $this->productName;
        if (isset($this->supplierId)) $o['supplierId'] = $this->supplierId;
        if (isset($this->categoryId)) $o['categoryId'] = $this->categoryId;
        if (isset($this->quantityPerUnit)) $o['quantityPerUnit'] = $this->quantityPerUnit;
        if (isset($this->unitPrice)) $o['unitPrice'] = $this->unitPrice;
        if (isset($this->unitsInStock)) $o['unitsInStock'] = $this->unitsInStock;
        if (isset($this->unitsOnOrder)) $o['unitsOnOrder'] = $this->unitsOnOrder;
        if (isset($this->reorderLevel)) $o['reorderLevel'] = $this->reorderLevel;
        if (isset($this->discontinued)) $o['discontinued'] = $this->discontinued;
        return $o;
    }
}

// @DataContract
class Region implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $regionDescription=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['regionDescription'])) $this->regionDescription = $o['regionDescription'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->regionDescription)) $o['regionDescription'] = $this->regionDescription;
        return $o;
    }
}

// @DataContract
class Shipper implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $companyName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $phone=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['companyName'])) $this->companyName = $o['companyName'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->companyName)) $o['companyName'] = $this->companyName;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        return $o;
    }
}

// @DataContract
class Supplier implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $companyName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $contactName=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $contactTitle=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $address=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $city=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $region=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $postalCode=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $country=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $phone=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $fax=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $homePage=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['companyName'])) $this->companyName = $o['companyName'];
        if (isset($o['contactName'])) $this->contactName = $o['contactName'];
        if (isset($o['contactTitle'])) $this->contactTitle = $o['contactTitle'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['region'])) $this->region = $o['region'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['fax'])) $this->fax = $o['fax'];
        if (isset($o['homePage'])) $this->homePage = $o['homePage'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->companyName)) $o['companyName'] = $this->companyName;
        if (isset($this->contactName)) $o['contactName'] = $this->contactName;
        if (isset($this->contactTitle)) $o['contactTitle'] = $this->contactTitle;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->region)) $o['region'] = $this->region;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->fax)) $o['fax'] = $this->fax;
        if (isset($this->homePage)) $o['homePage'] = $this->homePage;
        return $o;
    }
}

// @DataContract
class Territory implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $territoryDescription=null,

        // @DataMember(Order=3)
        /** @var int */
        public int $regionId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['territoryDescription'])) $this->territoryDescription = $o['territoryDescription'];
        if (isset($o['regionId'])) $this->regionId = $o['regionId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->territoryDescription)) $o['territoryDescription'] = $this->territoryDescription;
        if (isset($this->regionId)) $o['regionId'] = $this->regionId;
        return $o;
    }
}

class Todo implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string */
        public string $text='',
        /** @var bool|null */
        public ?bool $isFinished=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['text'])) $this->text = $o['text'];
        if (isset($o['isFinished'])) $this->isFinished = $o['isFinished'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->text)) $o['text'] = $this->text;
        if (isset($this->isFinished)) $o['isFinished'] = $this->isFinished;
        return $o;
    }
}

class UserAuthRole implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $userAuthId=0,
        /** @var string|null */
        public ?string $role=null,
        /** @var string|null */
        public ?string $permission=null,
        /** @var DateTime */
        public DateTime $createdDate=new DateTime(),
        /** @var DateTime */
        public DateTime $modifiedDate=new DateTime(),
        /** @var int|null */
        public ?int $refId=null,
        /** @var string|null */
        public ?string $refIdStr=null,
        /** @var array<string,string>|null */
        public ?array $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['userAuthId'])) $this->userAuthId = $o['userAuthId'];
        if (isset($o['role'])) $this->role = $o['role'];
        if (isset($o['permission'])) $this->permission = $o['permission'];
        if (isset($o['createdDate'])) $this->createdDate = JsonConverters::from('DateTime', $o['createdDate']);
        if (isset($o['modifiedDate'])) $this->modifiedDate = JsonConverters::from('DateTime', $o['modifiedDate']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['refIdStr'])) $this->refIdStr = $o['refIdStr'];
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->userAuthId)) $o['userAuthId'] = $this->userAuthId;
        if (isset($this->role)) $o['role'] = $this->role;
        if (isset($this->permission)) $o['permission'] = $this->permission;
        if (isset($this->createdDate)) $o['createdDate'] = JsonConverters::to('DateTime', $this->createdDate);
        if (isset($this->modifiedDate)) $o['modifiedDate'] = JsonConverters::to('DateTime', $this->modifiedDate);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->refIdStr)) $o['refIdStr'] = $this->refIdStr;
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        return $o;
    }
}

class ValidateRule implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $validator=null,
        /** @var string|null */
        public ?string $condition=null,
        /** @var string|null */
        public ?string $errorCode=null,
        /** @var string|null */
        public ?string $message=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['validator'])) $this->validator = $o['validator'];
        if (isset($o['condition'])) $this->condition = $o['condition'];
        if (isset($o['errorCode'])) $this->errorCode = $o['errorCode'];
        if (isset($o['message'])) $this->message = $o['message'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->validator)) $o['validator'] = $this->validator;
        if (isset($this->condition)) $o['condition'] = $this->condition;
        if (isset($this->errorCode)) $o['errorCode'] = $this->errorCode;
        if (isset($this->message)) $o['message'] = $this->message;
        return $o;
    }
}

class ValidationRule extends ValidateRule implements JsonSerializable
{
    /**
     * @param string|null $validator
     * @param string|null $condition
     * @param string|null $errorCode
     * @param string|null $message
     */
    public function __construct(
        string $validator=null,
        string $condition=null,
        string $errorCode=null,
        string $message=null,
        /** @var int */
        public int $id=0,
        // @Required()
        /** @var string */
        public string $type='',

        /** @var string|null */
        public ?string $field=null,
        /** @var string|null */
        public ?string $createdBy=null,
        /** @var DateTime|null */
        public ?DateTime $createdDate=null,
        /** @var string|null */
        public ?string $modifiedBy=null,
        /** @var DateTime|null */
        public ?DateTime $modifiedDate=null,
        /** @var string|null */
        public ?string $suspendedBy=null,
        /** @var DateTime|null */
        public ?DateTime $suspendedDate=null,
        /** @var string|null */
        public ?string $notes=null
    ) {
        parent::__construct($validator,$condition,$errorCode,$message);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['type'])) $this->type = $o['type'];
        if (isset($o['field'])) $this->field = $o['field'];
        if (isset($o['createdBy'])) $this->createdBy = $o['createdBy'];
        if (isset($o['createdDate'])) $this->createdDate = $o['createdDate'];
        if (isset($o['modifiedBy'])) $this->modifiedBy = $o['modifiedBy'];
        if (isset($o['modifiedDate'])) $this->modifiedDate = $o['modifiedDate'];
        if (isset($o['suspendedBy'])) $this->suspendedBy = $o['suspendedBy'];
        if (isset($o['suspendedDate'])) $this->suspendedDate = $o['suspendedDate'];
        if (isset($o['notes'])) $this->notes = $o['notes'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->type)) $o['type'] = $this->type;
        if (isset($this->field)) $o['field'] = $this->field;
        if (isset($this->createdBy)) $o['createdBy'] = $this->createdBy;
        if (isset($this->createdDate)) $o['createdDate'] = $this->createdDate;
        if (isset($this->modifiedBy)) $o['modifiedBy'] = $this->modifiedBy;
        if (isset($this->modifiedDate)) $o['modifiedDate'] = $this->modifiedDate;
        if (isset($this->suspendedBy)) $o['suspendedBy'] = $this->suspendedBy;
        if (isset($this->suspendedDate)) $o['suspendedDate'] = $this->suspendedDate;
        if (isset($this->notes)) $o['notes'] = $this->notes;
        return $o;
    }
}

// @DataContract
class Category implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $categoryName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $description=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['categoryName'])) $this->categoryName = $o['categoryName'];
        if (isset($o['description'])) $this->description = $o['description'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->categoryName)) $o['categoryName'] = $this->categoryName;
        if (isset($this->description)) $o['description'] = $this->description;
        return $o;
    }
}

// @DataContract
class Customer implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $companyName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $contactName=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $contactTitle=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $address=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $city=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $region=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $postalCode=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $country=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $phone=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $fax=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['companyName'])) $this->companyName = $o['companyName'];
        if (isset($o['contactName'])) $this->contactName = $o['contactName'];
        if (isset($o['contactTitle'])) $this->contactTitle = $o['contactTitle'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['region'])) $this->region = $o['region'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['fax'])) $this->fax = $o['fax'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->companyName)) $o['companyName'] = $this->companyName;
        if (isset($this->contactName)) $o['contactName'] = $this->contactName;
        if (isset($this->contactTitle)) $o['contactTitle'] = $this->contactTitle;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->region)) $o['region'] = $this->region;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->fax)) $o['fax'] = $this->fax;
        return $o;
    }
}

// @DataContract
class Employee implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $lastName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $firstName=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $photoPath=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $title=null,

        // @DataMember(Order=6)
        /** @var int|null */
        public ?int $reportsTo=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $titleOfCourtesy=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $birthDate=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $hireDate=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $address=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $city=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $region=null,

        // @DataMember(Order=13)
        /** @var string|null */
        public ?string $postalCode=null,

        // @DataMember(Order=14)
        /** @var string|null */
        public ?string $country=null,

        // @DataMember(Order=15)
        /** @var string|null */
        public ?string $homePhone=null,

        // @DataMember(Order=16)
        /** @var string|null */
        public ?string $extension=null,

        // @DataMember(Order=17)
        /** @var ByteArray|null */
        public ?ByteArray $photo=null,

        // @DataMember(Order=18)
        /** @var string|null */
        public ?string $notes=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['photoPath'])) $this->photoPath = $o['photoPath'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['reportsTo'])) $this->reportsTo = $o['reportsTo'];
        if (isset($o['titleOfCourtesy'])) $this->titleOfCourtesy = $o['titleOfCourtesy'];
        if (isset($o['birthDate'])) $this->birthDate = $o['birthDate'];
        if (isset($o['hireDate'])) $this->hireDate = $o['hireDate'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['region'])) $this->region = $o['region'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['homePhone'])) $this->homePhone = $o['homePhone'];
        if (isset($o['extension'])) $this->extension = $o['extension'];
        if (isset($o['photo'])) $this->photo = JsonConverters::from('ByteArray', $o['photo']);
        if (isset($o['notes'])) $this->notes = $o['notes'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->photoPath)) $o['photoPath'] = $this->photoPath;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->reportsTo)) $o['reportsTo'] = $this->reportsTo;
        if (isset($this->titleOfCourtesy)) $o['titleOfCourtesy'] = $this->titleOfCourtesy;
        if (isset($this->birthDate)) $o['birthDate'] = $this->birthDate;
        if (isset($this->hireDate)) $o['hireDate'] = $this->hireDate;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->region)) $o['region'] = $this->region;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->homePhone)) $o['homePhone'] = $this->homePhone;
        if (isset($this->extension)) $o['extension'] = $this->extension;
        if (isset($this->photo)) $o['photo'] = JsonConverters::to('ByteArray', $this->photo);
        if (isset($this->notes)) $o['notes'] = $this->notes;
        return $o;
    }
}

// @DataContract
class EmployeeTerritory implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null,

        // @DataMember(Order=2)
        /** @var int */
        public int $employeeId=0,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $territoryId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['employeeId'])) $this->employeeId = $o['employeeId'];
        if (isset($o['territoryId'])) $this->territoryId = $o['territoryId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->employeeId)) $o['employeeId'] = $this->employeeId;
        if (isset($this->territoryId)) $o['territoryId'] = $this->territoryId;
        return $o;
    }
}

class Albums implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $albumId=0,
        // @Required()
        /** @var string */
        public string $title='',

        /** @var int */
        public int $artistId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['albumId'])) $this->albumId = $o['albumId'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['artistId'])) $this->artistId = $o['artistId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->albumId)) $o['albumId'] = $this->albumId;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->artistId)) $o['artistId'] = $this->artistId;
        return $o;
    }
}

class Artists implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $artistId=0,
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['artistId'])) $this->artistId = $o['artistId'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->artistId)) $o['artistId'] = $this->artistId;
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
}

class Customers implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $customerId=0,
        // @Required()
        /** @var string */
        public string $firstName='',

        // @Required()
        /** @var string */
        public string $lastName='',

        /** @var string */
        public string $company='',
        /** @var string */
        public string $address='',
        /** @var string */
        public string $city='',
        /** @var string */
        public string $state='',
        /** @var string */
        public string $country='',
        /** @var string */
        public string $postalCode='',
        /** @var string */
        public string $phone='',
        /** @var string */
        public string $fax='',
        // @Required()
        /** @var string */
        public string $email='',

        /** @var int|null */
        public ?int $supportRepId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['customerId'])) $this->customerId = $o['customerId'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['company'])) $this->company = $o['company'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['fax'])) $this->fax = $o['fax'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['supportRepId'])) $this->supportRepId = $o['supportRepId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->customerId)) $o['customerId'] = $this->customerId;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->company)) $o['company'] = $this->company;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->fax)) $o['fax'] = $this->fax;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->supportRepId)) $o['supportRepId'] = $this->supportRepId;
        return $o;
    }
}

class Employees implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $employeeId=0,
        // @Required()
        /** @var string */
        public string $lastName='',

        // @Required()
        /** @var string */
        public string $firstName='',

        /** @var string */
        public string $title='',
        /** @var int|null */
        public ?int $reportsTo=null,
        /** @var DateTime|null */
        public ?DateTime $birthDate=null,
        /** @var DateTime|null */
        public ?DateTime $hireDate=null,
        /** @var string */
        public string $address='',
        /** @var string */
        public string $city='',
        /** @var string */
        public string $state='',
        /** @var string */
        public string $country='',
        /** @var string */
        public string $postalCode='',
        /** @var string */
        public string $phone='',
        /** @var string */
        public string $fax='',
        /** @var string */
        public string $email=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['employeeId'])) $this->employeeId = $o['employeeId'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['reportsTo'])) $this->reportsTo = $o['reportsTo'];
        if (isset($o['birthDate'])) $this->birthDate = $o['birthDate'];
        if (isset($o['hireDate'])) $this->hireDate = $o['hireDate'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['fax'])) $this->fax = $o['fax'];
        if (isset($o['email'])) $this->email = $o['email'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->employeeId)) $o['employeeId'] = $this->employeeId;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->reportsTo)) $o['reportsTo'] = $this->reportsTo;
        if (isset($this->birthDate)) $o['birthDate'] = $this->birthDate;
        if (isset($this->hireDate)) $o['hireDate'] = $this->hireDate;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->fax)) $o['fax'] = $this->fax;
        if (isset($this->email)) $o['email'] = $this->email;
        return $o;
    }
}

class Genres implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $genreId=0,
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['genreId'])) $this->genreId = $o['genreId'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->genreId)) $o['genreId'] = $this->genreId;
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
}

class Level implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $id='',
        /** @var ByteArray|null */
        public ?ByteArray $data=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['data'])) $this->data = JsonConverters::from('ByteArray', $o['data']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->data)) $o['data'] = JsonConverters::to('ByteArray', $this->data);
        return $o;
    }
}

/**
 * @property int $id
 * @property string $fileName
 * @property string $filePath
 * @property string $contentType
 * @property int $contentLength
 */
interface IFile
{
}

class GetContactsResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<Contact>|null */
        public ?array $results=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('Contact', $o['results']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('Contact', $this->results);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return $o;
    }
}

class TalentStatsResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $totalJobs=0,
        /** @var int */
        public int $totalContacts=0,
        /** @var int */
        public int $avgSalaryExpectation=0,
        /** @var int */
        public int $avgSalaryLower=0,
        /** @var int */
        public int $avgSalaryUpper=0,
        /** @var float */
        public float $preferredRemotePercentage=0.0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['totalJobs'])) $this->totalJobs = $o['totalJobs'];
        if (isset($o['totalContacts'])) $this->totalContacts = $o['totalContacts'];
        if (isset($o['avgSalaryExpectation'])) $this->avgSalaryExpectation = $o['avgSalaryExpectation'];
        if (isset($o['avgSalaryLower'])) $this->avgSalaryLower = $o['avgSalaryLower'];
        if (isset($o['avgSalaryUpper'])) $this->avgSalaryUpper = $o['avgSalaryUpper'];
        if (isset($o['preferredRemotePercentage'])) $this->preferredRemotePercentage = $o['preferredRemotePercentage'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->totalJobs)) $o['totalJobs'] = $this->totalJobs;
        if (isset($this->totalContacts)) $o['totalContacts'] = $this->totalContacts;
        if (isset($this->avgSalaryExpectation)) $o['avgSalaryExpectation'] = $this->avgSalaryExpectation;
        if (isset($this->avgSalaryLower)) $o['avgSalaryLower'] = $this->avgSalaryLower;
        if (isset($this->avgSalaryUpper)) $o['avgSalaryUpper'] = $this->avgSalaryUpper;
        if (isset($this->preferredRemotePercentage)) $o['preferredRemotePercentage'] = $this->preferredRemotePercentage;
        return $o;
    }
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
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->subType)) $o['subType'] = JsonConverters::to('SubType', $this->subType);
        if (isset($this->subTypes)) $o['subTypes'] = JsonConverters::toArray('SubType', $this->subTypes);
        if (isset($this->subTypeMap)) $o['subTypeMap'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','SubType']), $this->subTypeMap);
        if (isset($this->stringMap)) $o['stringMap'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->stringMap);
        if (isset($this->intStringMap)) $o['intStringMap'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['int','string']), $this->intStringMap);
        return $o;
    }
    public function getTypeName(): string { return 'EchoComplexTypes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new EchoComplexTypes(); }
}

// @Route("/echo/collections")
#[Returns('EchoCollections')]
class EchoCollections implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var array<string>|null */
        public ?array $stringList=null,
        /** @var string[] */
        public array $stringArray=[],
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
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->stringList)) $o['stringList'] = JsonConverters::toArray('string', $this->stringList);
        if (isset($this->stringArray)) $o['stringArray'] = JsonConverters::toArray('string', $this->stringArray);
        if (isset($this->stringMap)) $o['stringMap'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->stringMap);
        if (isset($this->intStringMap)) $o['intStringMap'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['int','string']), $this->intStringMap);
        return $o;
    }
    public function getTypeName(): string { return 'EchoCollections'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new EchoCollections(); }
}

#[Returns('FormDataTest')]
class FormDataTest implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var bool|null */
        public ?bool $hidden=null,
        /** @var string|null */
        public ?string $string=null,
        /** @var int */
        public int $int=0,
        /** @var DateTime */
        public DateTime $dateTime=new DateTime(),
        /** @var DateTime */
        public DateTime $dateOnly=new DateTime(),
        /** @var DateInterval|null */
        public ?DateInterval $timeSpan=null,
        /** @var DateInterval|null */
        public ?DateInterval $timeOnly=null,
        /** @var string|null */
        public ?string $password=null,
        /** @var string[]|null */
        public ?array $checkboxString=null,
        /** @var string|null */
        public ?string $radioString=null,
        /** @var Colors|null */
        public ?Colors $radioColors=null,
        /** @var Colors[]|null */
        public ?array $checkboxColors=null,
        /** @var Colors|null */
        public ?Colors $selectColors=null,
        /** @var Colors[]|null */
        public ?array $multiSelectColors=null,
        /** @var string|null */
        public ?string $profileUrl=null,
        /** @var array<Attachment>|null */
        public ?array $attachments=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['hidden'])) $this->hidden = $o['hidden'];
        if (isset($o['string'])) $this->string = $o['string'];
        if (isset($o['int'])) $this->int = $o['int'];
        if (isset($o['dateTime'])) $this->dateTime = JsonConverters::from('DateTime', $o['dateTime']);
        if (isset($o['dateOnly'])) $this->dateOnly = JsonConverters::from('DateTime', $o['dateOnly']);
        if (isset($o['timeSpan'])) $this->timeSpan = JsonConverters::from('DateInterval', $o['timeSpan']);
        if (isset($o['timeOnly'])) $this->timeOnly = JsonConverters::from('DateInterval', $o['timeOnly']);
        if (isset($o['password'])) $this->password = $o['password'];
        if (isset($o['checkboxString'])) $this->checkboxString = JsonConverters::fromArray('string', $o['checkboxString']);
        if (isset($o['radioString'])) $this->radioString = $o['radioString'];
        if (isset($o['radioColors'])) $this->radioColors = JsonConverters::from('Colors', $o['radioColors']);
        if (isset($o['checkboxColors'])) $this->checkboxColors = JsonConverters::fromArray('Colors', $o['checkboxColors']);
        if (isset($o['selectColors'])) $this->selectColors = JsonConverters::from('Colors', $o['selectColors']);
        if (isset($o['multiSelectColors'])) $this->multiSelectColors = JsonConverters::fromArray('Colors', $o['multiSelectColors']);
        if (isset($o['profileUrl'])) $this->profileUrl = $o['profileUrl'];
        if (isset($o['attachments'])) $this->attachments = JsonConverters::fromArray('Attachment', $o['attachments']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->hidden)) $o['hidden'] = $this->hidden;
        if (isset($this->string)) $o['string'] = $this->string;
        if (isset($this->int)) $o['int'] = $this->int;
        if (isset($this->dateTime)) $o['dateTime'] = JsonConverters::to('DateTime', $this->dateTime);
        if (isset($this->dateOnly)) $o['dateOnly'] = JsonConverters::to('DateTime', $this->dateOnly);
        if (isset($this->timeSpan)) $o['timeSpan'] = JsonConverters::to('DateInterval', $this->timeSpan);
        if (isset($this->timeOnly)) $o['timeOnly'] = JsonConverters::to('DateInterval', $this->timeOnly);
        if (isset($this->password)) $o['password'] = $this->password;
        if (isset($this->checkboxString)) $o['checkboxString'] = JsonConverters::toArray('string', $this->checkboxString);
        if (isset($this->radioString)) $o['radioString'] = $this->radioString;
        if (isset($this->radioColors)) $o['radioColors'] = JsonConverters::to('Colors', $this->radioColors);
        if (isset($this->checkboxColors)) $o['checkboxColors'] = JsonConverters::toArray('Colors', $this->checkboxColors);
        if (isset($this->selectColors)) $o['selectColors'] = JsonConverters::to('Colors', $this->selectColors);
        if (isset($this->multiSelectColors)) $o['multiSelectColors'] = JsonConverters::toArray('Colors', $this->multiSelectColors);
        if (isset($this->profileUrl)) $o['profileUrl'] = $this->profileUrl;
        if (isset($this->attachments)) $o['attachments'] = JsonConverters::toArray('Attachment', $this->attachments);
        return $o;
    }
    public function getTypeName(): string { return 'FormDataTest'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new FormDataTest(); }
}

#[Returns('ComboBoxExamples')]
class ComboBoxExamples implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $singleClientValues=null,
        /** @var array<string>|null */
        public ?array $multipleClientValues=null,
        /** @var string|null */
        public ?string $singleServerValues=null,
        /** @var array<string>|null */
        public ?array $multipleServerValues=null,
        /** @var string|null */
        public ?string $singleServerEntries=null,
        /** @var array<string>|null */
        public ?array $multipleServerEntries=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['singleClientValues'])) $this->singleClientValues = $o['singleClientValues'];
        if (isset($o['multipleClientValues'])) $this->multipleClientValues = JsonConverters::fromArray('string', $o['multipleClientValues']);
        if (isset($o['singleServerValues'])) $this->singleServerValues = $o['singleServerValues'];
        if (isset($o['multipleServerValues'])) $this->multipleServerValues = JsonConverters::fromArray('string', $o['multipleServerValues']);
        if (isset($o['singleServerEntries'])) $this->singleServerEntries = $o['singleServerEntries'];
        if (isset($o['multipleServerEntries'])) $this->multipleServerEntries = JsonConverters::fromArray('string', $o['multipleServerEntries']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->singleClientValues)) $o['singleClientValues'] = $this->singleClientValues;
        if (isset($this->multipleClientValues)) $o['multipleClientValues'] = JsonConverters::toArray('string', $this->multipleClientValues);
        if (isset($this->singleServerValues)) $o['singleServerValues'] = $this->singleServerValues;
        if (isset($this->multipleServerValues)) $o['multipleServerValues'] = JsonConverters::toArray('string', $this->multipleServerValues);
        if (isset($this->singleServerEntries)) $o['singleServerEntries'] = $this->singleServerEntries;
        if (isset($this->multipleServerEntries)) $o['multipleServerEntries'] = JsonConverters::toArray('string', $this->multipleServerEntries);
        return $o;
    }
    public function getTypeName(): string { return 'ComboBoxExamples'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new ComboBoxExamples(); }
}

class Movie implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $movieID='',
        /** @var int */
        public int $movieNo=0,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var string|null */
        public ?string $movieRef=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['movieID'])) $this->movieID = $o['movieID'];
        if (isset($o['movieNo'])) $this->movieNo = $o['movieNo'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['movieRef'])) $this->movieRef = $o['movieRef'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->movieID)) $o['movieID'] = $this->movieID;
        if (isset($this->movieNo)) $o['movieNo'] = $this->movieNo;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->movieRef)) $o['movieRef'] = $this->movieRef;
        return $o;
    }
}

class HelloResponse implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $result='',
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
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->result)) $o['result'] = $this->result;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return $o;
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
        /** @var bool|null */
        public ?bool $boolean=null,
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
        /** @var string */
        public string $string='',
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
        /** @var string[] */
        public array $stringArray=[],
        /** @var array<string,string>|null */
        public ?array $stringMap=null,
        /** @var array<string,string>|null */
        public ?array $intStringMap=null,
        /** @var SubType|null */
        public ?SubType $subType=null,
        /** @var array<int>|null */
        public ?array $nullableBytes=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['nullableId'])) $this->nullableId = $o['nullableId'];
        if (isset($o['boolean'])) $this->boolean = $o['boolean'];
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
        if (isset($o['nullableDateTime'])) $this->nullableDateTime = $o['nullableDateTime'];
        if (isset($o['nullableTimeSpan'])) $this->nullableTimeSpan = $o['nullableTimeSpan'];
        if (isset($o['stringList'])) $this->stringList = JsonConverters::fromArray('string', $o['stringList']);
        if (isset($o['stringArray'])) $this->stringArray = JsonConverters::fromArray('string', $o['stringArray']);
        if (isset($o['stringMap'])) $this->stringMap = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['stringMap']);
        if (isset($o['intStringMap'])) $this->intStringMap = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['int','string']), $o['intStringMap']);
        if (isset($o['subType'])) $this->subType = JsonConverters::from('SubType', $o['subType']);
        if (isset($o['nullableBytes'])) $this->nullableBytes = JsonConverters::fromArray('int', $o['nullableBytes']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->nullableId)) $o['nullableId'] = $this->nullableId;
        if (isset($this->boolean)) $o['boolean'] = $this->boolean;
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
        if (isset($this->nullableDateTime)) $o['nullableDateTime'] = $this->nullableDateTime;
        if (isset($this->nullableTimeSpan)) $o['nullableTimeSpan'] = $this->nullableTimeSpan;
        if (isset($this->stringList)) $o['stringList'] = JsonConverters::toArray('string', $this->stringList);
        if (isset($this->stringArray)) $o['stringArray'] = JsonConverters::toArray('string', $this->stringArray);
        if (isset($this->stringMap)) $o['stringMap'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->stringMap);
        if (isset($this->intStringMap)) $o['intStringMap'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['int','string']), $this->intStringMap);
        if (isset($this->subType)) $o['subType'] = JsonConverters::to('SubType', $this->subType);
        if (isset($this->nullableBytes)) $o['nullableBytes'] = JsonConverters::toArray('int', $this->nullableBytes);
        return $o;
    }
    public function getTypeName(): string { return 'AllTypes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new AllTypes(); }
}

#[Returns('AllCollectionTypes')]
class AllCollectionTypes implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int[] */
        public array $intArray=[],
        /** @var array<int>|null */
        public ?array $intList=null,
        /** @var string[] */
        public array $stringArray=[],
        /** @var array<string>|null */
        public ?array $stringList=null,
        /** @var float[] */
        public array $floatArray=[],
        /** @var array<float>|null */
        public ?array $doubleList=null,
        /** @var ByteArray|null */
        public ?ByteArray $byteArray=null,
        /** @var string[] */
        public array $charArray=[],
        /** @var array<float>|null */
        public ?array $decimalList=null,
        /** @var Poco[] */
        public array $pocoArray=[],
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
    public function jsonSerialize(): array
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
        return $o;
    }
    public function getTypeName(): string { return 'AllCollectionTypes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new AllCollectionTypes(); }
}

class HelloAllTypesResponse implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $result='',
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
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->result)) $o['result'] = $this->result;
        if (isset($this->allTypes)) $o['allTypes'] = JsonConverters::to('AllTypes', $this->allTypes);
        if (isset($this->allCollectionTypes)) $o['allCollectionTypes'] = JsonConverters::to('AllCollectionTypes', $this->allCollectionTypes);
        return $o;
    }
}

class ProfileGenResponse implements JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        return $o;
    }
}

// @Route("/contacts", "POST")
/**
 * @template array of Contact
 */
class StoreContacts extends \ArrayObject implements IReturnVoid, JsonSerializable
{
    public function __construct(Contact ...$items) {
        parent::__construct($items, \ArrayObject::STD_PROP_LIST);
    }
    
    /** @throws \Exception */
    public function append($value): void {
        if ($value instanceof Contact)
            parent::append($value);
        else
            throw new \Exception("Can only append a Contact to " . __CLASS__);
    }
    
    /** @throws Exception */
    public function fromMap($o): void {
        foreach ($o as $item) {
            $el = new Contact();
            $el->fromMap($item);
            $this->append($el);
        }
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array {
        return parent::getArrayCopy();
    }
    public function getTypeName(): string { return 'StoreContacts'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): void {}
}

// @Route("/contacts", "GET")
#[Returns('GetContactsResponse')]
class GetContacts implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        return $o;
    }
    public function getTypeName(): string { return 'GetContacts'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetContactsResponse(); }
}

#[Returns('PhoneScreen')]
/**
 * @template ICreateDb of PhoneScreen
 */
class CreatePhoneScreen implements IReturn, ICreateDb, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="GreaterThan(0)")
        /** @var int */
        public int $jobApplicationId=0,

        // @Validate(Validator="GreaterThan(0)", Message="An employee to perform the phone screening must be selected.")
        /** @var int */
        public int $appUserId=0,

        /** @var JobApplicationStatus|null */
        public ?JobApplicationStatus $applicationStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['jobApplicationId'])) $this->jobApplicationId = $o['jobApplicationId'];
        if (isset($o['appUserId'])) $this->appUserId = $o['appUserId'];
        if (isset($o['applicationStatus'])) $this->applicationStatus = JsonConverters::from('JobApplicationStatus', $o['applicationStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->jobApplicationId)) $o['jobApplicationId'] = $this->jobApplicationId;
        if (isset($this->appUserId)) $o['appUserId'] = $this->appUserId;
        if (isset($this->applicationStatus)) $o['applicationStatus'] = JsonConverters::to('JobApplicationStatus', $this->applicationStatus);
        return $o;
    }
    public function getTypeName(): string { return 'CreatePhoneScreen'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new PhoneScreen(); }
}

#[Returns('PhoneScreen')]
/**
 * @template IPatchDb of PhoneScreen
 */
class UpdatePhoneScreen implements IReturn, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int|null */
        public ?int $jobApplicationId=null,
        /** @var string|null */
        public ?string $notes=null,
        /** @var JobApplicationStatus|null */
        public ?JobApplicationStatus $applicationStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['jobApplicationId'])) $this->jobApplicationId = $o['jobApplicationId'];
        if (isset($o['notes'])) $this->notes = $o['notes'];
        if (isset($o['applicationStatus'])) $this->applicationStatus = JsonConverters::from('JobApplicationStatus', $o['applicationStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->jobApplicationId)) $o['jobApplicationId'] = $this->jobApplicationId;
        if (isset($this->notes)) $o['notes'] = $this->notes;
        if (isset($this->applicationStatus)) $o['applicationStatus'] = JsonConverters::to('JobApplicationStatus', $this->applicationStatus);
        return $o;
    }
    public function getTypeName(): string { return 'UpdatePhoneScreen'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new PhoneScreen(); }
}

#[Returns('Interview')]
/**
 * @template ICreateDb of Interview
 */
class CreateInterview implements IReturn, ICreateDb, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="NotNull")
        /** @var DateTime */
        public DateTime $bookingTime=new DateTime(),

        // @Validate(Validator="GreaterThan(0)")
        /** @var int */
        public int $jobApplicationId=0,

        // @Validate(Validator="GreaterThan(0)", Message="An employee to perform interview must be selected.")
        /** @var int */
        public int $appUserId=0,

        /** @var JobApplicationStatus|null */
        public ?JobApplicationStatus $applicationStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['bookingTime'])) $this->bookingTime = $o['bookingTime'];
        if (isset($o['jobApplicationId'])) $this->jobApplicationId = $o['jobApplicationId'];
        if (isset($o['appUserId'])) $this->appUserId = $o['appUserId'];
        if (isset($o['applicationStatus'])) $this->applicationStatus = JsonConverters::from('JobApplicationStatus', $o['applicationStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->bookingTime)) $o['bookingTime'] = $this->bookingTime;
        if (isset($this->jobApplicationId)) $o['jobApplicationId'] = $this->jobApplicationId;
        if (isset($this->appUserId)) $o['appUserId'] = $this->appUserId;
        if (isset($this->applicationStatus)) $o['applicationStatus'] = JsonConverters::to('JobApplicationStatus', $this->applicationStatus);
        return $o;
    }
    public function getTypeName(): string { return 'CreateInterview'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new Interview(); }
}

#[Returns('Interview')]
/**
 * @template IPatchDb of Interview
 */
class UpdateInterview implements IReturn, IPatchDb, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="GreaterThan(0)")
        /** @var int */
        public int $id=0,

        /** @var int|null */
        public ?int $jobApplicationId=null,
        /** @var string|null */
        public ?string $notes=null,
        /** @var JobApplicationStatus|null */
        public ?JobApplicationStatus $applicationStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['jobApplicationId'])) $this->jobApplicationId = $o['jobApplicationId'];
        if (isset($o['notes'])) $this->notes = $o['notes'];
        if (isset($o['applicationStatus'])) $this->applicationStatus = JsonConverters::from('JobApplicationStatus', $o['applicationStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->jobApplicationId)) $o['jobApplicationId'] = $this->jobApplicationId;
        if (isset($this->notes)) $o['notes'] = $this->notes;
        if (isset($this->applicationStatus)) $o['applicationStatus'] = JsonConverters::to('JobApplicationStatus', $this->applicationStatus);
        return $o;
    }
    public function getTypeName(): string { return 'UpdateInterview'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new Interview(); }
}

#[Returns('JobOffer')]
/**
 * @template ICreateDb of JobOffer
 */
class CreateJobOffer implements IReturn, ICreateDb, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="GreaterThan(0)")
        /** @var int */
        public int $salaryOffer=0,

        // @Validate(Validator="GreaterThan(0)")
        /** @var int */
        public int $jobApplicationId=0,

        /** @var JobApplicationStatus|null */
        public ?JobApplicationStatus $applicationStatus=null,
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $notes=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['salaryOffer'])) $this->salaryOffer = $o['salaryOffer'];
        if (isset($o['jobApplicationId'])) $this->jobApplicationId = $o['jobApplicationId'];
        if (isset($o['applicationStatus'])) $this->applicationStatus = JsonConverters::from('JobApplicationStatus', $o['applicationStatus']);
        if (isset($o['notes'])) $this->notes = $o['notes'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->salaryOffer)) $o['salaryOffer'] = $this->salaryOffer;
        if (isset($this->jobApplicationId)) $o['jobApplicationId'] = $this->jobApplicationId;
        if (isset($this->applicationStatus)) $o['applicationStatus'] = JsonConverters::to('JobApplicationStatus', $this->applicationStatus);
        if (isset($this->notes)) $o['notes'] = $this->notes;
        return $o;
    }
    public function getTypeName(): string { return 'CreateJobOffer'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new JobOffer(); }
}

#[Returns('TalentStatsResponse')]
class TalentStats implements IReturn, IGet, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        return $o;
    }
    public function getTypeName(): string { return 'TalentStats'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new TalentStatsResponse(); }
}

class Dummy implements JsonSerializable
{
    public function __construct(
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
        /** @var ConvertSessionToToken|null */
        public ?ConvertSessionToToken $convertSessionToToken=null,
        /** @var ConvertSessionToTokenResponse|null */
        public ?ConvertSessionToTokenResponse $convertSessionToTokenResponse=null,
        /** @var CancelRequest|null */
        public ?CancelRequest $cancelRequest=null,
        /** @var CancelRequestResponse|null */
        public ?CancelRequestResponse $cancelRequestResponse=null,
        /** @var UpdateEventSubscriber|null */
        public ?UpdateEventSubscriber $updateEventSubscriber=null,
        /** @var UpdateEventSubscriberResponse|null */
        public ?UpdateEventSubscriberResponse $updateEventSubscriberResponse=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['getNavItems'])) $this->getNavItems = JsonConverters::from('GetNavItems', $o['getNavItems']);
        if (isset($o['getNavItemsResponse'])) $this->getNavItemsResponse = JsonConverters::from('GetNavItemsResponse', $o['getNavItemsResponse']);
        if (isset($o['emptyResponse'])) $this->emptyResponse = JsonConverters::from('EmptyResponse', $o['emptyResponse']);
        if (isset($o['idResponse'])) $this->idResponse = JsonConverters::from('IdResponse', $o['idResponse']);
        if (isset($o['stringResponse'])) $this->stringResponse = JsonConverters::from('StringResponse', $o['stringResponse']);
        if (isset($o['stringsResponse'])) $this->stringsResponse = JsonConverters::from('StringsResponse', $o['stringsResponse']);
        if (isset($o['convertSessionToToken'])) $this->convertSessionToToken = JsonConverters::from('ConvertSessionToToken', $o['convertSessionToToken']);
        if (isset($o['convertSessionToTokenResponse'])) $this->convertSessionToTokenResponse = JsonConverters::from('ConvertSessionToTokenResponse', $o['convertSessionToTokenResponse']);
        if (isset($o['cancelRequest'])) $this->cancelRequest = JsonConverters::from('CancelRequest', $o['cancelRequest']);
        if (isset($o['cancelRequestResponse'])) $this->cancelRequestResponse = JsonConverters::from('CancelRequestResponse', $o['cancelRequestResponse']);
        if (isset($o['updateEventSubscriber'])) $this->updateEventSubscriber = JsonConverters::from('UpdateEventSubscriber', $o['updateEventSubscriber']);
        if (isset($o['updateEventSubscriberResponse'])) $this->updateEventSubscriberResponse = JsonConverters::from('UpdateEventSubscriberResponse', $o['updateEventSubscriberResponse']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->getNavItems)) $o['getNavItems'] = JsonConverters::to('GetNavItems', $this->getNavItems);
        if (isset($this->getNavItemsResponse)) $o['getNavItemsResponse'] = JsonConverters::to('GetNavItemsResponse', $this->getNavItemsResponse);
        if (isset($this->emptyResponse)) $o['emptyResponse'] = JsonConverters::to('EmptyResponse', $this->emptyResponse);
        if (isset($this->idResponse)) $o['idResponse'] = JsonConverters::to('IdResponse', $this->idResponse);
        if (isset($this->stringResponse)) $o['stringResponse'] = JsonConverters::to('StringResponse', $this->stringResponse);
        if (isset($this->stringsResponse)) $o['stringsResponse'] = JsonConverters::to('StringsResponse', $this->stringsResponse);
        if (isset($this->convertSessionToToken)) $o['convertSessionToToken'] = JsonConverters::to('ConvertSessionToToken', $this->convertSessionToToken);
        if (isset($this->convertSessionToTokenResponse)) $o['convertSessionToTokenResponse'] = JsonConverters::to('ConvertSessionToTokenResponse', $this->convertSessionToTokenResponse);
        if (isset($this->cancelRequest)) $o['cancelRequest'] = JsonConverters::to('CancelRequest', $this->cancelRequest);
        if (isset($this->cancelRequestResponse)) $o['cancelRequestResponse'] = JsonConverters::to('CancelRequestResponse', $this->cancelRequestResponse);
        if (isset($this->updateEventSubscriber)) $o['updateEventSubscriber'] = JsonConverters::to('UpdateEventSubscriber', $this->updateEventSubscriber);
        if (isset($this->updateEventSubscriberResponse)) $o['updateEventSubscriberResponse'] = JsonConverters::to('UpdateEventSubscriberResponse', $this->updateEventSubscriberResponse);
        return $o;
    }
    public function getTypeName(): string { return 'Dummy'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

// @Route("/profile-image")
// @Route("/profile-image/{Type}")
// @Route("/profile-image/{Type}/{Size}")
#[Returns('ByteArray')]
class GetProfileImage implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $type=null,
        /** @var string|null */
        public ?string $size=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['type'])) $this->type = $o['type'];
        if (isset($o['size'])) $this->size = $o['size'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->type)) $o['type'] = $this->type;
        if (isset($this->size)) $o['size'] = $this->size;
        return $o;
    }
    public function getTypeName(): string { return 'GetProfileImage'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new ByteArray(); }
}

#[Returns('Movie')]
class MovieGETRequest implements IReturn, JsonSerializable
{
    public function __construct(
        /** @description Unique Id of the movie */
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $movieID=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['movieID'])) $this->movieID = $o['movieID'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->movieID)) $o['movieID'] = $this->movieID;
        return $o;
    }
    public function getTypeName(): string { return 'MovieGETRequest'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new Movie(); }
}

#[Returns('Movie')]
class MoviePOSTRequest extends Movie implements IReturn, JsonSerializable
{
    /**
     * @param string $movieID
     * @param int $movieNo
     * @param string|null $name
     * @param string|null $description
     * @param string|null $movieRef
     */
    public function __construct(
        string $movieID='',
        int $movieNo=0,
        string $name=null,
        string $description=null,
        string $movieRef=null
    ) {
        parent::__construct($movieID,$movieNo,$name,$description,$movieRef);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['movieID'])) $this->movieID = $o['movieID'];
        if (isset($o['movieNo'])) $this->movieNo = $o['movieNo'];
        if (isset($o['movieRef'])) $this->movieRef = $o['movieRef'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->movieID)) $o['movieID'] = $this->movieID;
        if (isset($this->movieNo)) $o['movieNo'] = $this->movieNo;
        if (isset($this->movieRef)) $o['movieRef'] = $this->movieRef;
        return $o;
    }
    public function getTypeName(): string { return 'MoviePOSTRequest'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new Movie(); }
}

// @Route("/greet/{Name}")
#[Returns('HelloResponse')]
class Greet implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
    public function getTypeName(): string { return 'Greet'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new HelloResponse(); }
}

// @Route("/hello")
// @Route("/hello/{Name}")
#[Returns('HelloResponse')]
class Hello implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
    public function getTypeName(): string { return 'Hello'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new HelloResponse(); }
}

// @Route("/hello-long/{Name}", "PATCH,PUT")
// @Route("/hello-very-long/{Name}", "GET,POST,PUT")
// @ValidateRequest(Validator="HasRole(`Employee`)")
// @ValidateRequest(Validator="HasPermission(`ThePermission`)")
// @ValidateRequest(Validator="IsAuthenticated")
#[Returns('HelloResponse')]
class HelloVeryLongOperationNameVersions implements IReturn, IGet, IPost, IPut, IPatch, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null,
        /** @var string[]|null */
        public ?array $names=null,
        /** @var int[]|null */
        public ?array $ids=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['names'])) $this->names = JsonConverters::fromArray('string', $o['names']);
        if (isset($o['ids'])) $this->ids = JsonConverters::fromArray('int', $o['ids']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->names)) $o['names'] = JsonConverters::toArray('string', $this->names);
        if (isset($this->ids)) $o['ids'] = JsonConverters::toArray('int', $this->ids);
        return $o;
    }
    public function getTypeName(): string { return 'HelloVeryLongOperationNameVersions'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new HelloResponse(); }
}

// @Route("/hellosecure/{Name}", "PUT")
// @ValidateRequest(Validator="IsAuthenticated")
#[Returns('HelloResponse')]
class HelloSecure implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
    public function getTypeName(): string { return 'HelloSecure'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new HelloResponse(); }
}

// @DataContract
#[Returns('array')]
class HelloBookingList implements IReturn, JsonSerializable
{
    public function __construct(
        // @DataMember(Name="Alias", Order=1)
        /** @var string */
        public string $Alias=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['Alias'])) $this->Alias = $o['Alias'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->Alias)) $o['Alias'] = $this->Alias;
        return $o;
    }
    public function getTypeName(): string { return 'HelloBookingList'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return []; }
}

#[Returns('HelloAllTypesResponse')]
class HelloAllTypes implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $name='',
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
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->allTypes)) $o['allTypes'] = JsonConverters::to('AllTypes', $this->allTypes);
        if (isset($this->allCollectionTypes)) $o['allCollectionTypes'] = JsonConverters::to('AllCollectionTypes', $this->allCollectionTypes);
        return $o;
    }
    public function getTypeName(): string { return 'HelloAllTypes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new HelloAllTypesResponse(); }
}

#[Returns('ProfileGenResponse')]
class ProfileGen implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        return $o;
    }
    public function getTypeName(): string { return 'ProfileGen'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new ProfileGenResponse(); }
}

// @Route("/invoiceitems/{InvoiceLineId}", "PUT")
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of InvoiceItems
 */
class UpdateInvoiceItems implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $invoiceLineId=0,
        /** @var int */
        public int $invoiceId=0,
        /** @var int */
        public int $trackId=0,
        /** @var float */
        public float $unitPrice=0.0,
        /** @var int */
        public int $quantity=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['invoiceLineId'])) $this->invoiceLineId = $o['invoiceLineId'];
        if (isset($o['invoiceId'])) $this->invoiceId = $o['invoiceId'];
        if (isset($o['trackId'])) $this->trackId = $o['trackId'];
        if (isset($o['unitPrice'])) $this->unitPrice = $o['unitPrice'];
        if (isset($o['quantity'])) $this->quantity = $o['quantity'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->invoiceLineId)) $o['invoiceLineId'] = $this->invoiceLineId;
        if (isset($this->invoiceId)) $o['invoiceId'] = $this->invoiceId;
        if (isset($this->trackId)) $o['trackId'] = $this->trackId;
        if (isset($this->unitPrice)) $o['unitPrice'] = $this->unitPrice;
        if (isset($this->quantity)) $o['quantity'] = $this->quantity;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateInvoiceItems'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/invoices/{InvoiceId}", "PUT")
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Invoices
 */
class UpdateInvoices implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $invoiceId=0,
        /** @var int */
        public int $customerId=0,
        /** @var DateTime */
        public DateTime $invoiceDate=new DateTime(),
        /** @var string */
        public string $billingAddress='',
        /** @var string */
        public string $billingCity='',
        /** @var string */
        public string $billingState='',
        /** @var string */
        public string $billingCountry='',
        /** @var string */
        public string $billingPostalCode='',
        /** @var float */
        public float $total=0.0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['invoiceId'])) $this->invoiceId = $o['invoiceId'];
        if (isset($o['customerId'])) $this->customerId = $o['customerId'];
        if (isset($o['invoiceDate'])) $this->invoiceDate = JsonConverters::from('DateTime', $o['invoiceDate']);
        if (isset($o['billingAddress'])) $this->billingAddress = $o['billingAddress'];
        if (isset($o['billingCity'])) $this->billingCity = $o['billingCity'];
        if (isset($o['billingState'])) $this->billingState = $o['billingState'];
        if (isset($o['billingCountry'])) $this->billingCountry = $o['billingCountry'];
        if (isset($o['billingPostalCode'])) $this->billingPostalCode = $o['billingPostalCode'];
        if (isset($o['total'])) $this->total = $o['total'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->invoiceId)) $o['invoiceId'] = $this->invoiceId;
        if (isset($this->customerId)) $o['customerId'] = $this->customerId;
        if (isset($this->invoiceDate)) $o['invoiceDate'] = JsonConverters::to('DateTime', $this->invoiceDate);
        if (isset($this->billingAddress)) $o['billingAddress'] = $this->billingAddress;
        if (isset($this->billingCity)) $o['billingCity'] = $this->billingCity;
        if (isset($this->billingState)) $o['billingState'] = $this->billingState;
        if (isset($this->billingCountry)) $o['billingCountry'] = $this->billingCountry;
        if (isset($this->billingPostalCode)) $o['billingPostalCode'] = $this->billingPostalCode;
        if (isset($this->total)) $o['total'] = $this->total;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateInvoices'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/mediatypes/{MediaTypeId}", "PUT")
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of MediaTypes
 */
class UpdateMediaTypes implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $mediaTypeId=0,
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['mediaTypeId'])) $this->mediaTypeId = $o['mediaTypeId'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->mediaTypeId)) $o['mediaTypeId'] = $this->mediaTypeId;
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateMediaTypes'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/playlists/{PlaylistId}", "PUT")
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Playlists
 */
class UpdatePlaylists implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $playlistId=0,
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['playlistId'])) $this->playlistId = $o['playlistId'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->playlistId)) $o['playlistId'] = $this->playlistId;
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
    public function getTypeName(): string { return 'UpdatePlaylists'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/tracks/{TrackId}", "PUT")
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Tracks
 */
class UpdateTracks implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $trackId=0,
        /** @var string */
        public string $name='',
        /** @var int|null */
        public ?int $albumId=null,
        /** @var int */
        public int $mediaTypeId=0,
        /** @var int|null */
        public ?int $genreId=null,
        /** @var string */
        public string $composer='',
        /** @var int */
        public int $milliseconds=0,
        /** @var int|null */
        public ?int $bytes=null,
        /** @var float */
        public float $unitPrice=0.0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['trackId'])) $this->trackId = $o['trackId'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['albumId'])) $this->albumId = $o['albumId'];
        if (isset($o['mediaTypeId'])) $this->mediaTypeId = $o['mediaTypeId'];
        if (isset($o['genreId'])) $this->genreId = $o['genreId'];
        if (isset($o['composer'])) $this->composer = $o['composer'];
        if (isset($o['milliseconds'])) $this->milliseconds = $o['milliseconds'];
        if (isset($o['bytes'])) $this->bytes = $o['bytes'];
        if (isset($o['unitPrice'])) $this->unitPrice = $o['unitPrice'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->trackId)) $o['trackId'] = $this->trackId;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->albumId)) $o['albumId'] = $this->albumId;
        if (isset($this->mediaTypeId)) $o['mediaTypeId'] = $this->mediaTypeId;
        if (isset($this->genreId)) $o['genreId'] = $this->genreId;
        if (isset($this->composer)) $o['composer'] = $this->composer;
        if (isset($this->milliseconds)) $o['milliseconds'] = $this->milliseconds;
        if (isset($this->bytes)) $o['bytes'] = $this->bytes;
        if (isset($this->unitPrice)) $o['unitPrice'] = $this->unitPrice;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateTracks'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

#[Returns('Contact')]
/**
 * @template ICreateDb of Contact
 */
class CreateContact implements IReturn, ICreateDb, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $firstName='',

        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $lastName='',

        /** @var string|null */
        public ?string $profileUrl=null,
        /** @var int|null */
        public ?int $salaryExpectation=null,
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $jobType='',

        /** @var int */
        public int $availabilityWeeks=0,
        /** @var EmploymentType|null */
        public ?EmploymentType $preferredWorkType=null,
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $preferredLocation='',

        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $email='',

        /** @var string|null */
        public ?string $phone=null,
        /** @var string|null */
        public ?string $about=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['profileUrl'])) $this->profileUrl = $o['profileUrl'];
        if (isset($o['salaryExpectation'])) $this->salaryExpectation = $o['salaryExpectation'];
        if (isset($o['jobType'])) $this->jobType = $o['jobType'];
        if (isset($o['availabilityWeeks'])) $this->availabilityWeeks = $o['availabilityWeeks'];
        if (isset($o['preferredWorkType'])) $this->preferredWorkType = JsonConverters::from('EmploymentType', $o['preferredWorkType']);
        if (isset($o['preferredLocation'])) $this->preferredLocation = $o['preferredLocation'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['about'])) $this->about = $o['about'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->profileUrl)) $o['profileUrl'] = $this->profileUrl;
        if (isset($this->salaryExpectation)) $o['salaryExpectation'] = $this->salaryExpectation;
        if (isset($this->jobType)) $o['jobType'] = $this->jobType;
        if (isset($this->availabilityWeeks)) $o['availabilityWeeks'] = $this->availabilityWeeks;
        if (isset($this->preferredWorkType)) $o['preferredWorkType'] = JsonConverters::to('EmploymentType', $this->preferredWorkType);
        if (isset($this->preferredLocation)) $o['preferredLocation'] = $this->preferredLocation;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->about)) $o['about'] = $this->about;
        return $o;
    }
    public function getTypeName(): string { return 'CreateContact'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new Contact(); }
}

#[Returns('Contact')]
/**
 * @template IPatchDb of Contact
 */
class UpdateContact implements IReturn, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $firstName='',

        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $lastName='',

        /** @var string|null */
        public ?string $profileUrl=null,
        /** @var int|null */
        public ?int $salaryExpectation=null,
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $jobType='',

        /** @var int|null */
        public ?int $availabilityWeeks=null,
        /** @var EmploymentType|null */
        public ?EmploymentType $preferredWorkType=null,
        /** @var string|null */
        public ?string $preferredLocation=null,
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $email='',

        /** @var string|null */
        public ?string $phone=null,
        /** @var string|null */
        public ?string $about=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['profileUrl'])) $this->profileUrl = $o['profileUrl'];
        if (isset($o['salaryExpectation'])) $this->salaryExpectation = $o['salaryExpectation'];
        if (isset($o['jobType'])) $this->jobType = $o['jobType'];
        if (isset($o['availabilityWeeks'])) $this->availabilityWeeks = $o['availabilityWeeks'];
        if (isset($o['preferredWorkType'])) $this->preferredWorkType = JsonConverters::from('EmploymentType', $o['preferredWorkType']);
        if (isset($o['preferredLocation'])) $this->preferredLocation = $o['preferredLocation'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['about'])) $this->about = $o['about'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->profileUrl)) $o['profileUrl'] = $this->profileUrl;
        if (isset($this->salaryExpectation)) $o['salaryExpectation'] = $this->salaryExpectation;
        if (isset($this->jobType)) $o['jobType'] = $this->jobType;
        if (isset($this->availabilityWeeks)) $o['availabilityWeeks'] = $this->availabilityWeeks;
        if (isset($this->preferredWorkType)) $o['preferredWorkType'] = JsonConverters::to('EmploymentType', $this->preferredWorkType);
        if (isset($this->preferredLocation)) $o['preferredLocation'] = $this->preferredLocation;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->about)) $o['about'] = $this->about;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateContact'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new Contact(); }
}

/**
 * @template IDeleteDb of Contact
 */
class DeleteContact implements IReturnVoid, IDeleteDb, JsonSerializable
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
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteContact'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): void {}
}

#[Returns('Job')]
/**
 * @template ICreateDb of Job
 */
class CreateJob implements IReturn, ICreateDb, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $title='',
        // @Validate(Validator="GreaterThan(0)")
        /** @var int */
        public int $salaryRangeLower=0,

        // @Validate(Validator="GreaterThan(0)")
        /** @var int */
        public int $salaryRangeUpper=0,

        /** @var string */
        public string $description='',
        /** @var EmploymentType|null */
        public ?EmploymentType $employmentType=null,
        /** @var string */
        public string $company='',
        /** @var string */
        public string $location='',
        /** @var DateTime */
        public DateTime $closing=new DateTime()
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['salaryRangeLower'])) $this->salaryRangeLower = $o['salaryRangeLower'];
        if (isset($o['salaryRangeUpper'])) $this->salaryRangeUpper = $o['salaryRangeUpper'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['employmentType'])) $this->employmentType = JsonConverters::from('EmploymentType', $o['employmentType']);
        if (isset($o['company'])) $this->company = $o['company'];
        if (isset($o['location'])) $this->location = $o['location'];
        if (isset($o['closing'])) $this->closing = JsonConverters::from('DateTime', $o['closing']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->salaryRangeLower)) $o['salaryRangeLower'] = $this->salaryRangeLower;
        if (isset($this->salaryRangeUpper)) $o['salaryRangeUpper'] = $this->salaryRangeUpper;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->employmentType)) $o['employmentType'] = JsonConverters::to('EmploymentType', $this->employmentType);
        if (isset($this->company)) $o['company'] = $this->company;
        if (isset($this->location)) $o['location'] = $this->location;
        if (isset($this->closing)) $o['closing'] = JsonConverters::to('DateTime', $this->closing);
        return $o;
    }
    public function getTypeName(): string { return 'CreateJob'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new Job(); }
}

#[Returns('Job')]
/**
 * @template IPatchDb of Job
 */
class UpdateJob implements IReturn, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $title=null,
        /** @var int|null */
        public ?int $salaryRangeLower=null,
        /** @var int|null */
        public ?int $salaryRangeUpper=null,
        /** @var string|null */
        public ?string $description=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['salaryRangeLower'])) $this->salaryRangeLower = $o['salaryRangeLower'];
        if (isset($o['salaryRangeUpper'])) $this->salaryRangeUpper = $o['salaryRangeUpper'];
        if (isset($o['description'])) $this->description = $o['description'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->salaryRangeLower)) $o['salaryRangeLower'] = $this->salaryRangeLower;
        if (isset($this->salaryRangeUpper)) $o['salaryRangeUpper'] = $this->salaryRangeUpper;
        if (isset($this->description)) $o['description'] = $this->description;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateJob'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new Job(); }
}

#[Returns('Job')]
/**
 * @template IDeleteDb of Job
 */
class DeleteJob implements IReturn, IDeleteDb, JsonSerializable
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
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteJob'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new Job(); }
}

#[Returns('JobApplication')]
/**
 * @template ICreateDb of JobApplication
 */
class CreateJobApplication implements IReturn, ICreateDb, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="GreaterThan(0)")
        /** @var int */
        public int $jobId=0,

        // @Validate(Validator="GreaterThan(0)")
        /** @var int */
        public int $contactId=0,

        /** @var DateTime */
        public DateTime $appliedDate=new DateTime(),
        /** @var JobApplicationStatus|null */
        public ?JobApplicationStatus $applicationStatus=null,
        /** @var array<JobApplicationAttachment>|null */
        public ?array $attachments=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['jobId'])) $this->jobId = $o['jobId'];
        if (isset($o['contactId'])) $this->contactId = $o['contactId'];
        if (isset($o['appliedDate'])) $this->appliedDate = JsonConverters::from('DateTime', $o['appliedDate']);
        if (isset($o['applicationStatus'])) $this->applicationStatus = JsonConverters::from('JobApplicationStatus', $o['applicationStatus']);
        if (isset($o['attachments'])) $this->attachments = JsonConverters::fromArray('JobApplicationAttachment', $o['attachments']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->jobId)) $o['jobId'] = $this->jobId;
        if (isset($this->contactId)) $o['contactId'] = $this->contactId;
        if (isset($this->appliedDate)) $o['appliedDate'] = JsonConverters::to('DateTime', $this->appliedDate);
        if (isset($this->applicationStatus)) $o['applicationStatus'] = JsonConverters::to('JobApplicationStatus', $this->applicationStatus);
        if (isset($this->attachments)) $o['attachments'] = JsonConverters::toArray('JobApplicationAttachment', $this->attachments);
        return $o;
    }
    public function getTypeName(): string { return 'CreateJobApplication'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new JobApplication(); }
}

#[Returns('JobApplication')]
/**
 * @template IPatchDb of JobApplication
 */
class UpdateJobApplication implements IReturn, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int|null */
        public ?int $jobId=null,
        /** @var int|null */
        public ?int $contactId=null,
        /** @var DateTime|null */
        public ?DateTime $appliedDate=null,
        /** @var JobApplicationStatus|null */
        public ?JobApplicationStatus $applicationStatus=null,
        /** @var array<JobApplicationAttachment>|null */
        public ?array $attachments=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['jobId'])) $this->jobId = $o['jobId'];
        if (isset($o['contactId'])) $this->contactId = $o['contactId'];
        if (isset($o['appliedDate'])) $this->appliedDate = $o['appliedDate'];
        if (isset($o['applicationStatus'])) $this->applicationStatus = JsonConverters::from('JobApplicationStatus', $o['applicationStatus']);
        if (isset($o['attachments'])) $this->attachments = JsonConverters::fromArray('JobApplicationAttachment', $o['attachments']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->jobId)) $o['jobId'] = $this->jobId;
        if (isset($this->contactId)) $o['contactId'] = $this->contactId;
        if (isset($this->appliedDate)) $o['appliedDate'] = $this->appliedDate;
        if (isset($this->applicationStatus)) $o['applicationStatus'] = JsonConverters::to('JobApplicationStatus', $this->applicationStatus);
        if (isset($this->attachments)) $o['attachments'] = JsonConverters::toArray('JobApplicationAttachment', $this->attachments);
        return $o;
    }
    public function getTypeName(): string { return 'UpdateJobApplication'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new JobApplication(); }
}

/**
 * @template IDeleteDb of JobApplication
 */
class DeleteJobApplication implements IReturnVoid, IDeleteDb, JsonSerializable
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
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteJobApplication'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): void {}
}

#[Returns('JobApplicationEvent')]
/**
 * @template ICreateDb of JobApplicationEvent
 */
class CreateJobApplicationEvent implements IReturn, ICreateDb, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        return $o;
    }
    public function getTypeName(): string { return 'CreateJobApplicationEvent'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new JobApplicationEvent(); }
}

#[Returns('JobApplicationEvent')]
/**
 * @template IPatchDb of JobApplicationEvent
 */
class UpdateJobApplicationEvent implements IReturn, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var JobApplicationStatus|null */
        public ?JobApplicationStatus $status=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var DateTime|null */
        public ?DateTime $eventDate=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['status'])) $this->status = JsonConverters::from('JobApplicationStatus', $o['status']);
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['eventDate'])) $this->eventDate = $o['eventDate'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->status)) $o['status'] = JsonConverters::to('JobApplicationStatus', $this->status);
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->eventDate)) $o['eventDate'] = $this->eventDate;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateJobApplicationEvent'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new JobApplicationEvent(); }
}

/**
 * @template IDeleteDb of JobApplicationEvent
 */
class DeleteJobApplicationEvent implements IReturnVoid, IDeleteDb, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        return $o;
    }
    public function getTypeName(): string { return 'DeleteJobApplicationEvent'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): void {}
}

#[Returns('JobApplicationComment')]
/**
 * @template ICreateDb of JobApplicationComment
 */
class CreateJobApplicationComment implements IReturn, ICreateDb, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="GreaterThan(0)")
        /** @var int */
        public int $jobApplicationId=0,

        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $comment=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['jobApplicationId'])) $this->jobApplicationId = $o['jobApplicationId'];
        if (isset($o['comment'])) $this->comment = $o['comment'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->jobApplicationId)) $o['jobApplicationId'] = $this->jobApplicationId;
        if (isset($this->comment)) $o['comment'] = $this->comment;
        return $o;
    }
    public function getTypeName(): string { return 'CreateJobApplicationComment'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new JobApplicationComment(); }
}

#[Returns('JobApplicationComment')]
/**
 * @template IPatchDb of JobApplicationComment
 */
class UpdateJobApplicationComment implements IReturn, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int|null */
        public ?int $jobApplicationId=null,
        /** @var string|null */
        public ?string $comment=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['jobApplicationId'])) $this->jobApplicationId = $o['jobApplicationId'];
        if (isset($o['comment'])) $this->comment = $o['comment'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->jobApplicationId)) $o['jobApplicationId'] = $this->jobApplicationId;
        if (isset($this->comment)) $o['comment'] = $this->comment;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateJobApplicationComment'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new JobApplicationComment(); }
}

/**
 * @template IDeleteDb of JobApplicationComment
 */
class DeleteJobApplicationComment implements IReturnVoid, IDeleteDb, JsonSerializable
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
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteJobApplicationComment'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): void {}
}

/** @description Create a new Booking */
// @Route("/bookings", "POST")
// @ValidateRequest(Validator="HasRole(`Employee`)")
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Booking
 */
class CreateBooking implements IReturn, ICreateDb, JsonSerializable
{
    public function __construct(
        /** @description Name this Booking is for */
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $name='',

        /** @var RoomType|null */
        public ?RoomType $roomType=null,
        // @Validate(Validator="GreaterThan(0)")
        /** @var int */
        public int $roomNumber=0,

        // @Validate(Validator="GreaterThan(0)")
        /** @var float */
        public float $cost=0.0,

        // @Required()
        /** @var DateTime */
        public DateTime $bookingStartDate=new DateTime(),

        /** @var DateTime|null */
        public ?DateTime $bookingEndDate=null,
        /** @var string|null */
        public ?string $notes=null,
        /** @var string|null */
        public ?string $couponId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['roomType'])) $this->roomType = JsonConverters::from('RoomType', $o['roomType']);
        if (isset($o['roomNumber'])) $this->roomNumber = $o['roomNumber'];
        if (isset($o['cost'])) $this->cost = $o['cost'];
        if (isset($o['bookingStartDate'])) $this->bookingStartDate = JsonConverters::from('DateTime', $o['bookingStartDate']);
        if (isset($o['bookingEndDate'])) $this->bookingEndDate = $o['bookingEndDate'];
        if (isset($o['notes'])) $this->notes = $o['notes'];
        if (isset($o['couponId'])) $this->couponId = $o['couponId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->roomType)) $o['roomType'] = JsonConverters::to('RoomType', $this->roomType);
        if (isset($this->roomNumber)) $o['roomNumber'] = $this->roomNumber;
        if (isset($this->cost)) $o['cost'] = $this->cost;
        if (isset($this->bookingStartDate)) $o['bookingStartDate'] = JsonConverters::to('DateTime', $this->bookingStartDate);
        if (isset($this->bookingEndDate)) $o['bookingEndDate'] = $this->bookingEndDate;
        if (isset($this->notes)) $o['notes'] = $this->notes;
        if (isset($this->couponId)) $o['couponId'] = $this->couponId;
        return $o;
    }
    public function getTypeName(): string { return 'CreateBooking'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

/** @description Update an existing Booking */
// @Route("/booking/{Id}", "PATCH")
// @ValidateRequest(Validator="HasRole(`Employee`)")
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Booking
 */
class UpdateBooking implements IReturn, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null,
        /** @var RoomType|null */
        public ?RoomType $roomType=null,
        // @Validate(Validator="GreaterThan(0)")
        /** @var int|null */
        public ?int $roomNumber=null,

        // @Validate(Validator="GreaterThan(0)")
        /** @var float|null */
        public ?float $cost=null,

        /** @var DateTime|null */
        public ?DateTime $bookingStartDate=null,
        /** @var DateTime|null */
        public ?DateTime $bookingEndDate=null,
        /** @var string|null */
        public ?string $notes=null,
        /** @var string|null */
        public ?string $couponId=null,
        /** @var bool|null */
        public ?bool $cancelled=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['roomType'])) $this->roomType = JsonConverters::from('RoomType', $o['roomType']);
        if (isset($o['roomNumber'])) $this->roomNumber = $o['roomNumber'];
        if (isset($o['cost'])) $this->cost = $o['cost'];
        if (isset($o['bookingStartDate'])) $this->bookingStartDate = $o['bookingStartDate'];
        if (isset($o['bookingEndDate'])) $this->bookingEndDate = $o['bookingEndDate'];
        if (isset($o['notes'])) $this->notes = $o['notes'];
        if (isset($o['couponId'])) $this->couponId = $o['couponId'];
        if (isset($o['cancelled'])) $this->cancelled = $o['cancelled'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->roomType)) $o['roomType'] = JsonConverters::to('RoomType', $this->roomType);
        if (isset($this->roomNumber)) $o['roomNumber'] = $this->roomNumber;
        if (isset($this->cost)) $o['cost'] = $this->cost;
        if (isset($this->bookingStartDate)) $o['bookingStartDate'] = $this->bookingStartDate;
        if (isset($this->bookingEndDate)) $o['bookingEndDate'] = $this->bookingEndDate;
        if (isset($this->notes)) $o['notes'] = $this->notes;
        if (isset($this->couponId)) $o['couponId'] = $this->couponId;
        if (isset($this->cancelled)) $o['cancelled'] = $this->cancelled;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateBooking'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

/** @description Delete a Booking */
// @Route("/booking/{Id}", "DELETE")
// @ValidateRequest(Validator="HasRole(`Manager`)")
/**
 * @template IDeleteDb of Booking
 */
class DeleteBooking implements IReturnVoid, IDeleteDb, JsonSerializable
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
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteBooking'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): void {}
}

// @Route("/coupons", "POST")
// @ValidateRequest(Validator="HasRole(`Employee`)")
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Coupon
 */
class CreateCoupon implements IReturn, ICreateDb, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $description='',

        // @Validate(Validator="GreaterThan(0)")
        /** @var int */
        public int $discount=0,

        // @Validate(Validator="NotNull")
        /** @var DateTime */
        public DateTime $expiryDate=new DateTime()
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['discount'])) $this->discount = $o['discount'];
        if (isset($o['expiryDate'])) $this->expiryDate = JsonConverters::from('DateTime', $o['expiryDate']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->discount)) $o['discount'] = $this->discount;
        if (isset($this->expiryDate)) $o['expiryDate'] = JsonConverters::to('DateTime', $this->expiryDate);
        return $o;
    }
    public function getTypeName(): string { return 'CreateCoupon'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/coupons/{Id}", "PATCH")
// @ValidateRequest(Validator="HasRole(`Employee`)")
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Coupon
 */
class UpdateCoupon implements IReturn, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $id='',
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $description='',

        // @Validate(Validator="NotNull")
        // @Validate(Validator="GreaterThan(0)")
        /** @var int */
        public int $discount=0,

        // @Validate(Validator="NotNull")
        /** @var DateTime */
        public DateTime $expiryDate=new DateTime()
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['discount'])) $this->discount = $o['discount'];
        if (isset($o['expiryDate'])) $this->expiryDate = $o['expiryDate'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->discount)) $o['discount'] = $this->discount;
        if (isset($this->expiryDate)) $o['expiryDate'] = $this->expiryDate;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateCoupon'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

/** @description Delete a Coupon */
// @Route("/coupons/{Id}", "DELETE")
// @ValidateRequest(Validator="HasRole(`Manager`)")
/**
 * @template IDeleteDb of Coupon
 */
class DeleteCoupon implements IReturnVoid, IDeleteDb, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $id=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteCoupon'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): void {}
}

#[Returns('FileSystemItem')]
/**
 * @template ICreateDb of FileSystemItem
 */
class CreateFileSystemItem implements IReturn, ICreateDb, IFileItem, JsonSerializable
{
    public function __construct(
        /** @var FileAccessType|null */
        public ?FileAccessType $fileAccessType=null,
        /** @var FileSystemFile|null */
        public ?FileSystemFile $file=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['fileAccessType'])) $this->fileAccessType = JsonConverters::from('FileAccessType', $o['fileAccessType']);
        if (isset($o['file'])) $this->file = JsonConverters::from('FileSystemFile', $o['file']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->fileAccessType)) $o['fileAccessType'] = JsonConverters::to('FileAccessType', $this->fileAccessType);
        if (isset($this->file)) $o['file'] = JsonConverters::to('FileSystemFile', $this->file);
        return $o;
    }
    public function getTypeName(): string { return 'CreateFileSystemItem'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new FileSystemItem(); }
}

#[Returns('IdResponse')]
/**
 * @template ICreateDb of Player
 */
class CreatePlayer implements IReturn, ICreateDb, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $firstName='',

        /** @var string|null */
        public ?string $lastName=null,
        /** @var string|null */
        public ?string $email=null,
        /** @var array<Phone>|null */
        public ?array $phoneNumbers=null,
        // @Validate(Validator="NotNull")
        /** @var int */
        public int $profileId=0,

        /** @var string|null */
        public ?string $savedLevelId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['phoneNumbers'])) $this->phoneNumbers = JsonConverters::fromArray('Phone', $o['phoneNumbers']);
        if (isset($o['profileId'])) $this->profileId = $o['profileId'];
        if (isset($o['savedLevelId'])) $this->savedLevelId = $o['savedLevelId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->phoneNumbers)) $o['phoneNumbers'] = JsonConverters::toArray('Phone', $this->phoneNumbers);
        if (isset($this->profileId)) $o['profileId'] = $this->profileId;
        if (isset($this->savedLevelId)) $o['savedLevelId'] = $this->savedLevelId;
        return $o;
    }
    public function getTypeName(): string { return 'CreatePlayer'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

#[Returns('IdResponse')]
/**
 * @template IPatchDb of Player
 */
class UpdatePlayer implements IReturn, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $firstName='',

        /** @var string|null */
        public ?string $lastName=null,
        /** @var string|null */
        public ?string $email=null,
        /** @var array<Phone>|null */
        public ?array $phoneNumbers=null,
        /** @var int|null */
        public ?int $profileId=null,
        /** @var string|null */
        public ?string $savedLevelId=null,
        /** @var string */
        public string $capital=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['phoneNumbers'])) $this->phoneNumbers = JsonConverters::fromArray('Phone', $o['phoneNumbers']);
        if (isset($o['profileId'])) $this->profileId = $o['profileId'];
        if (isset($o['savedLevelId'])) $this->savedLevelId = $o['savedLevelId'];
        if (isset($o['capital'])) $this->capital = $o['capital'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->phoneNumbers)) $o['phoneNumbers'] = JsonConverters::toArray('Phone', $this->phoneNumbers);
        if (isset($this->profileId)) $o['profileId'] = $this->profileId;
        if (isset($this->savedLevelId)) $o['savedLevelId'] = $this->savedLevelId;
        if (isset($this->capital)) $o['capital'] = $this->capital;
        return $o;
    }
    public function getTypeName(): string { return 'UpdatePlayer'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

/**
 * @template IDeleteDb of Player
 */
class DeletePlayer implements IReturnVoid, IDeleteDb, JsonSerializable
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
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeletePlayer'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): void {}
}

#[Returns('IdResponse')]
/**
 * @template ICreateDb of Profile
 */
class CreateProfile implements IReturn, ICreateDb, JsonSerializable
{
    public function __construct(
        /** @var PlayerRole|null */
        public ?PlayerRole $role=null,
        /** @var PlayerRegion|null */
        public ?PlayerRegion $region=null,
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $username='',

        /** @var int */
        public int $highScore=0,
        /** @var int */
        public int $gamesPlayed=0,
        // @Validate(Validator="InclusiveBetween(0,100)")
        /** @var int */
        public int $energy=0,

        /** @var string|null */
        public ?string $profileUrl=null,
        /** @var string|null */
        public ?string $coverUrl=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['role'])) $this->role = JsonConverters::from('PlayerRole', $o['role']);
        if (isset($o['region'])) $this->region = JsonConverters::from('PlayerRegion', $o['region']);
        if (isset($o['username'])) $this->username = $o['username'];
        if (isset($o['highScore'])) $this->highScore = $o['highScore'];
        if (isset($o['gamesPlayed'])) $this->gamesPlayed = $o['gamesPlayed'];
        if (isset($o['energy'])) $this->energy = $o['energy'];
        if (isset($o['profileUrl'])) $this->profileUrl = $o['profileUrl'];
        if (isset($o['coverUrl'])) $this->coverUrl = $o['coverUrl'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->role)) $o['role'] = JsonConverters::to('PlayerRole', $this->role);
        if (isset($this->region)) $o['region'] = JsonConverters::to('PlayerRegion', $this->region);
        if (isset($this->username)) $o['username'] = $this->username;
        if (isset($this->highScore)) $o['highScore'] = $this->highScore;
        if (isset($this->gamesPlayed)) $o['gamesPlayed'] = $this->gamesPlayed;
        if (isset($this->energy)) $o['energy'] = $this->energy;
        if (isset($this->profileUrl)) $o['profileUrl'] = $this->profileUrl;
        if (isset($this->coverUrl)) $o['coverUrl'] = $this->coverUrl;
        return $o;
    }
    public function getTypeName(): string { return 'CreateProfile'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

#[Returns('IdResponse')]
/**
 * @template IPatchDb of Profile
 */
class UpdateProfile implements IReturn, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var PlayerRole|null */
        public ?PlayerRole $role=null,
        /** @var PlayerRegion|null */
        public ?PlayerRegion $region=null,
        /** @var string|null */
        public ?string $username=null,
        /** @var int|null */
        public ?int $highScore=null,
        /** @var int|null */
        public ?int $gamesPlayed=null,
        // @Validate(Validator="InclusiveBetween(0,100)")
        /** @var int|null */
        public ?int $energy=null,

        /** @var string|null */
        public ?string $profileUrl=null,
        /** @var string|null */
        public ?string $coverUrl=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['role'])) $this->role = JsonConverters::from('PlayerRole', $o['role']);
        if (isset($o['region'])) $this->region = JsonConverters::from('PlayerRegion', $o['region']);
        if (isset($o['username'])) $this->username = $o['username'];
        if (isset($o['highScore'])) $this->highScore = $o['highScore'];
        if (isset($o['gamesPlayed'])) $this->gamesPlayed = $o['gamesPlayed'];
        if (isset($o['energy'])) $this->energy = $o['energy'];
        if (isset($o['profileUrl'])) $this->profileUrl = $o['profileUrl'];
        if (isset($o['coverUrl'])) $this->coverUrl = $o['coverUrl'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->role)) $o['role'] = JsonConverters::to('PlayerRole', $this->role);
        if (isset($this->region)) $o['region'] = JsonConverters::to('PlayerRegion', $this->region);
        if (isset($this->username)) $o['username'] = $this->username;
        if (isset($this->highScore)) $o['highScore'] = $this->highScore;
        if (isset($this->gamesPlayed)) $o['gamesPlayed'] = $this->gamesPlayed;
        if (isset($this->energy)) $o['energy'] = $this->energy;
        if (isset($this->profileUrl)) $o['profileUrl'] = $this->profileUrl;
        if (isset($this->coverUrl)) $o['coverUrl'] = $this->coverUrl;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateProfile'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

/**
 * @template IDeleteDb of Profile
 */
class DeleteProfile implements IReturnVoid, IDeleteDb, JsonSerializable
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
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteProfile'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): void {}
}

#[Returns('IdResponse')]
/**
 * @template ICreateDb of GameItem
 */
class CreateGameItem implements IReturn, ICreateDb, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $name='',

        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $description='',

        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $imageUrl=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['imageUrl'])) $this->imageUrl = $o['imageUrl'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->imageUrl)) $o['imageUrl'] = $this->imageUrl;
        return $o;
    }
    public function getTypeName(): string { return 'CreateGameItem'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

#[Returns('IdResponse')]
/**
 * @template IPatchDb of GameItem
 */
class UpdateGameItem implements IReturn, IPatchDb, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $name='',

        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $description='',

        /** @var string|null */
        public ?string $imageUrl=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['imageUrl'])) $this->imageUrl = $o['imageUrl'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->imageUrl)) $o['imageUrl'] = $this->imageUrl;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateGameItem'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

/**
 * @template IDeleteDb of GameItem
 */
class DeleteGameItem implements IReturnVoid, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteGameItem'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): void {}
}

#[Returns('IdResponse')]
/**
 * @template ICreateDb of Booking
 */
class CreateMqBooking extends AuditBase implements IReturn, ICreateDb, JsonSerializable
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
        DateTime $deletedDate=null,
        string $deletedBy=null,
        /** @description Name this Booking is for */
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $name='',

        /** @var RoomType|null */
        public ?RoomType $roomType=null,
        // @Validate(Validator="GreaterThan(0)")
        /** @var int */
        public int $roomNumber=0,

        // @Validate(Validator="GreaterThan(0)")
        /** @var float */
        public float $cost=0.0,

        /** @var DateTime */
        public DateTime $bookingStartDate=new DateTime(),
        /** @var DateTime|null */
        public ?DateTime $bookingEndDate=null,
        /** @var string|null */
        public ?string $notes=null
    ) {
        parent::__construct($createdDate,$createdBy,$modifiedDate,$modifiedBy,$deletedDate,$deletedBy);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['roomType'])) $this->roomType = JsonConverters::from('RoomType', $o['roomType']);
        if (isset($o['roomNumber'])) $this->roomNumber = $o['roomNumber'];
        if (isset($o['cost'])) $this->cost = $o['cost'];
        if (isset($o['bookingStartDate'])) $this->bookingStartDate = JsonConverters::from('DateTime', $o['bookingStartDate']);
        if (isset($o['bookingEndDate'])) $this->bookingEndDate = $o['bookingEndDate'];
        if (isset($o['notes'])) $this->notes = $o['notes'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->roomType)) $o['roomType'] = JsonConverters::to('RoomType', $this->roomType);
        if (isset($this->roomNumber)) $o['roomNumber'] = $this->roomNumber;
        if (isset($this->cost)) $o['cost'] = $this->cost;
        if (isset($this->bookingStartDate)) $o['bookingStartDate'] = JsonConverters::to('DateTime', $this->bookingStartDate);
        if (isset($this->bookingEndDate)) $o['bookingEndDate'] = $this->bookingEndDate;
        if (isset($this->notes)) $o['notes'] = $this->notes;
        return $o;
    }
    public function getTypeName(): string { return 'CreateMqBooking'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/migrations/{Id}", "PATCH")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Migration
 */
class PatchMigration implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $name=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $description=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $createdDate=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $completedDate=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $connectionString=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $namedConnection=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $log=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $errorCode=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $errorMessage=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $errorStackTrace=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['createdDate'])) $this->createdDate = $o['createdDate'];
        if (isset($o['completedDate'])) $this->completedDate = $o['completedDate'];
        if (isset($o['connectionString'])) $this->connectionString = $o['connectionString'];
        if (isset($o['namedConnection'])) $this->namedConnection = $o['namedConnection'];
        if (isset($o['log'])) $this->log = $o['log'];
        if (isset($o['errorCode'])) $this->errorCode = $o['errorCode'];
        if (isset($o['errorMessage'])) $this->errorMessage = $o['errorMessage'];
        if (isset($o['errorStackTrace'])) $this->errorStackTrace = $o['errorStackTrace'];
        if (isset($o['meta'])) $this->meta = $o['meta'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->createdDate)) $o['createdDate'] = $this->createdDate;
        if (isset($this->completedDate)) $o['completedDate'] = $this->completedDate;
        if (isset($this->connectionString)) $o['connectionString'] = $this->connectionString;
        if (isset($this->namedConnection)) $o['namedConnection'] = $this->namedConnection;
        if (isset($this->log)) $o['log'] = $this->log;
        if (isset($this->errorCode)) $o['errorCode'] = $this->errorCode;
        if (isset($this->errorMessage)) $o['errorMessage'] = $this->errorMessage;
        if (isset($this->errorStackTrace)) $o['errorStackTrace'] = $this->errorStackTrace;
        if (isset($this->meta)) $o['meta'] = $this->meta;
        return $o;
    }
    public function getTypeName(): string { return 'PatchMigration'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/orders/{Id}", "PATCH")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Order
 */
class PatchOrder implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $customerId=null,

        // @DataMember(Order=3)
        /** @var int */
        public int $employeeId=0,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $orderDate=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $requiredDate=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $shippedDate=null,

        // @DataMember(Order=7)
        /** @var int|null */
        public ?int $shipVia=null,

        // @DataMember(Order=8)
        /** @var float */
        public float $freight=0.0,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $shipName=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $shipAddress=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $shipCity=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $shipRegion=null,

        // @DataMember(Order=13)
        /** @var string|null */
        public ?string $shipPostalCode=null,

        // @DataMember(Order=14)
        /** @var string|null */
        public ?string $shipCountry=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['customerId'])) $this->customerId = $o['customerId'];
        if (isset($o['employeeId'])) $this->employeeId = $o['employeeId'];
        if (isset($o['orderDate'])) $this->orderDate = $o['orderDate'];
        if (isset($o['requiredDate'])) $this->requiredDate = $o['requiredDate'];
        if (isset($o['shippedDate'])) $this->shippedDate = $o['shippedDate'];
        if (isset($o['shipVia'])) $this->shipVia = $o['shipVia'];
        if (isset($o['freight'])) $this->freight = $o['freight'];
        if (isset($o['shipName'])) $this->shipName = $o['shipName'];
        if (isset($o['shipAddress'])) $this->shipAddress = $o['shipAddress'];
        if (isset($o['shipCity'])) $this->shipCity = $o['shipCity'];
        if (isset($o['shipRegion'])) $this->shipRegion = $o['shipRegion'];
        if (isset($o['shipPostalCode'])) $this->shipPostalCode = $o['shipPostalCode'];
        if (isset($o['shipCountry'])) $this->shipCountry = $o['shipCountry'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->customerId)) $o['customerId'] = $this->customerId;
        if (isset($this->employeeId)) $o['employeeId'] = $this->employeeId;
        if (isset($this->orderDate)) $o['orderDate'] = $this->orderDate;
        if (isset($this->requiredDate)) $o['requiredDate'] = $this->requiredDate;
        if (isset($this->shippedDate)) $o['shippedDate'] = $this->shippedDate;
        if (isset($this->shipVia)) $o['shipVia'] = $this->shipVia;
        if (isset($this->freight)) $o['freight'] = $this->freight;
        if (isset($this->shipName)) $o['shipName'] = $this->shipName;
        if (isset($this->shipAddress)) $o['shipAddress'] = $this->shipAddress;
        if (isset($this->shipCity)) $o['shipCity'] = $this->shipCity;
        if (isset($this->shipRegion)) $o['shipRegion'] = $this->shipRegion;
        if (isset($this->shipPostalCode)) $o['shipPostalCode'] = $this->shipPostalCode;
        if (isset($this->shipCountry)) $o['shipCountry'] = $this->shipCountry;
        return $o;
    }
    public function getTypeName(): string { return 'PatchOrder'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/orderdetails/{Id}", "PATCH")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IPatchDb of OrderDetail
 */
class PatchOrderDetail implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null,

        // @DataMember(Order=2)
        /** @var int */
        public int $orderId=0,

        // @DataMember(Order=3)
        /** @var int */
        public int $productId=0,

        // @DataMember(Order=4)
        /** @var float */
        public float $unitPrice=0.0,

        // @DataMember(Order=5)
        /** @var int */
        public int $quantity=0,

        // @DataMember(Order=6)
        /** @var float */
        public float $discount=0.0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['orderId'])) $this->orderId = $o['orderId'];
        if (isset($o['productId'])) $this->productId = $o['productId'];
        if (isset($o['unitPrice'])) $this->unitPrice = $o['unitPrice'];
        if (isset($o['quantity'])) $this->quantity = $o['quantity'];
        if (isset($o['discount'])) $this->discount = $o['discount'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->orderId)) $o['orderId'] = $this->orderId;
        if (isset($this->productId)) $o['productId'] = $this->productId;
        if (isset($this->unitPrice)) $o['unitPrice'] = $this->unitPrice;
        if (isset($this->quantity)) $o['quantity'] = $this->quantity;
        if (isset($this->discount)) $o['discount'] = $this->discount;
        return $o;
    }
    public function getTypeName(): string { return 'PatchOrderDetail'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/products/{Id}", "PATCH")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Product
 */
class PatchProduct implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $productName=null,

        // @DataMember(Order=3)
        /** @var int */
        public int $supplierId=0,

        // @DataMember(Order=4)
        /** @var int */
        public int $categoryId=0,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $quantityPerUnit=null,

        // @DataMember(Order=6)
        /** @var int */
        public int $unitPrice=0,

        // @DataMember(Order=7)
        /** @var int */
        public int $unitsInStock=0,

        // @DataMember(Order=8)
        /** @var int */
        public int $unitsOnOrder=0,

        // @DataMember(Order=9)
        /** @var int */
        public int $reorderLevel=0,

        // @DataMember(Order=10)
        /** @var int */
        public int $discontinued=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['productName'])) $this->productName = $o['productName'];
        if (isset($o['supplierId'])) $this->supplierId = $o['supplierId'];
        if (isset($o['categoryId'])) $this->categoryId = $o['categoryId'];
        if (isset($o['quantityPerUnit'])) $this->quantityPerUnit = $o['quantityPerUnit'];
        if (isset($o['unitPrice'])) $this->unitPrice = $o['unitPrice'];
        if (isset($o['unitsInStock'])) $this->unitsInStock = $o['unitsInStock'];
        if (isset($o['unitsOnOrder'])) $this->unitsOnOrder = $o['unitsOnOrder'];
        if (isset($o['reorderLevel'])) $this->reorderLevel = $o['reorderLevel'];
        if (isset($o['discontinued'])) $this->discontinued = $o['discontinued'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->productName)) $o['productName'] = $this->productName;
        if (isset($this->supplierId)) $o['supplierId'] = $this->supplierId;
        if (isset($this->categoryId)) $o['categoryId'] = $this->categoryId;
        if (isset($this->quantityPerUnit)) $o['quantityPerUnit'] = $this->quantityPerUnit;
        if (isset($this->unitPrice)) $o['unitPrice'] = $this->unitPrice;
        if (isset($this->unitsInStock)) $o['unitsInStock'] = $this->unitsInStock;
        if (isset($this->unitsOnOrder)) $o['unitsOnOrder'] = $this->unitsOnOrder;
        if (isset($this->reorderLevel)) $o['reorderLevel'] = $this->reorderLevel;
        if (isset($this->discontinued)) $o['discontinued'] = $this->discontinued;
        return $o;
    }
    public function getTypeName(): string { return 'PatchProduct'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/regions/{Id}", "PATCH")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Region
 */
class PatchRegion implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $regionDescription=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['regionDescription'])) $this->regionDescription = $o['regionDescription'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->regionDescription)) $o['regionDescription'] = $this->regionDescription;
        return $o;
    }
    public function getTypeName(): string { return 'PatchRegion'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/shippers/{Id}", "PATCH")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Shipper
 */
class PatchShipper implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $companyName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $phone=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['companyName'])) $this->companyName = $o['companyName'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->companyName)) $o['companyName'] = $this->companyName;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        return $o;
    }
    public function getTypeName(): string { return 'PatchShipper'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/suppliers/{Id}", "PATCH")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Supplier
 */
class PatchSupplier implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $companyName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $contactName=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $contactTitle=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $address=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $city=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $region=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $postalCode=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $country=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $phone=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $fax=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $homePage=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['companyName'])) $this->companyName = $o['companyName'];
        if (isset($o['contactName'])) $this->contactName = $o['contactName'];
        if (isset($o['contactTitle'])) $this->contactTitle = $o['contactTitle'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['region'])) $this->region = $o['region'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['fax'])) $this->fax = $o['fax'];
        if (isset($o['homePage'])) $this->homePage = $o['homePage'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->companyName)) $o['companyName'] = $this->companyName;
        if (isset($this->contactName)) $o['contactName'] = $this->contactName;
        if (isset($this->contactTitle)) $o['contactTitle'] = $this->contactTitle;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->region)) $o['region'] = $this->region;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->fax)) $o['fax'] = $this->fax;
        if (isset($this->homePage)) $o['homePage'] = $this->homePage;
        return $o;
    }
    public function getTypeName(): string { return 'PatchSupplier'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/territories/{Id}", "PATCH")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Territory
 */
class PatchTerritory implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $territoryDescription=null,

        // @DataMember(Order=3)
        /** @var int */
        public int $regionId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['territoryDescription'])) $this->territoryDescription = $o['territoryDescription'];
        if (isset($o['regionId'])) $this->regionId = $o['regionId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->territoryDescription)) $o['territoryDescription'] = $this->territoryDescription;
        if (isset($this->regionId)) $o['regionId'] = $this->regionId;
        return $o;
    }
    public function getTypeName(): string { return 'PatchTerritory'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/todos/{Id}", "PATCH")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Todo
 */
class PatchTodo implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $text=null,

        // @DataMember(Order=3)
        /** @var int */
        public int $isFinished=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['text'])) $this->text = $o['text'];
        if (isset($o['isFinished'])) $this->isFinished = $o['isFinished'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->text)) $o['text'] = $this->text;
        if (isset($this->isFinished)) $o['isFinished'] = $this->isFinished;
        return $o;
    }
    public function getTypeName(): string { return 'PatchTodo'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/userauthroles/{Id}", "PATCH")
// @ValidateRequest(Validator="IsAdmin")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IPatchDb of UserAuthRole
 */
class PatchUserAuthRole implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var int */
        public int $userAuthId=0,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $role=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $permission=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $createdDate=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $modifiedDate=null,

        // @DataMember(Order=7)
        /** @var int|null */
        public ?int $refId=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $refIdStr=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['userAuthId'])) $this->userAuthId = $o['userAuthId'];
        if (isset($o['role'])) $this->role = $o['role'];
        if (isset($o['permission'])) $this->permission = $o['permission'];
        if (isset($o['createdDate'])) $this->createdDate = $o['createdDate'];
        if (isset($o['modifiedDate'])) $this->modifiedDate = $o['modifiedDate'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['refIdStr'])) $this->refIdStr = $o['refIdStr'];
        if (isset($o['meta'])) $this->meta = $o['meta'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->userAuthId)) $o['userAuthId'] = $this->userAuthId;
        if (isset($this->role)) $o['role'] = $this->role;
        if (isset($this->permission)) $o['permission'] = $this->permission;
        if (isset($this->createdDate)) $o['createdDate'] = $this->createdDate;
        if (isset($this->modifiedDate)) $o['modifiedDate'] = $this->modifiedDate;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->refIdStr)) $o['refIdStr'] = $this->refIdStr;
        if (isset($this->meta)) $o['meta'] = $this->meta;
        return $o;
    }
    public function getTypeName(): string { return 'PatchUserAuthRole'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/validationrules/{Id}", "PATCH")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IPatchDb of ValidationRule
 */
class PatchValidationRule implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $type=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $field=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $createdBy=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $createdDate=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $modifiedBy=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $modifiedDate=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $suspendedBy=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $suspendedDate=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $notes=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $validator=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $condition=null,

        // @DataMember(Order=13)
        /** @var string|null */
        public ?string $errorCode=null,

        // @DataMember(Order=14)
        /** @var string|null */
        public ?string $message=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['type'])) $this->type = $o['type'];
        if (isset($o['field'])) $this->field = $o['field'];
        if (isset($o['createdBy'])) $this->createdBy = $o['createdBy'];
        if (isset($o['createdDate'])) $this->createdDate = $o['createdDate'];
        if (isset($o['modifiedBy'])) $this->modifiedBy = $o['modifiedBy'];
        if (isset($o['modifiedDate'])) $this->modifiedDate = $o['modifiedDate'];
        if (isset($o['suspendedBy'])) $this->suspendedBy = $o['suspendedBy'];
        if (isset($o['suspendedDate'])) $this->suspendedDate = $o['suspendedDate'];
        if (isset($o['notes'])) $this->notes = $o['notes'];
        if (isset($o['validator'])) $this->validator = $o['validator'];
        if (isset($o['condition'])) $this->condition = $o['condition'];
        if (isset($o['errorCode'])) $this->errorCode = $o['errorCode'];
        if (isset($o['message'])) $this->message = $o['message'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->type)) $o['type'] = $this->type;
        if (isset($this->field)) $o['field'] = $this->field;
        if (isset($this->createdBy)) $o['createdBy'] = $this->createdBy;
        if (isset($this->createdDate)) $o['createdDate'] = $this->createdDate;
        if (isset($this->modifiedBy)) $o['modifiedBy'] = $this->modifiedBy;
        if (isset($this->modifiedDate)) $o['modifiedDate'] = $this->modifiedDate;
        if (isset($this->suspendedBy)) $o['suspendedBy'] = $this->suspendedBy;
        if (isset($this->suspendedDate)) $o['suspendedDate'] = $this->suspendedDate;
        if (isset($this->notes)) $o['notes'] = $this->notes;
        if (isset($this->validator)) $o['validator'] = $this->validator;
        if (isset($this->condition)) $o['condition'] = $this->condition;
        if (isset($this->errorCode)) $o['errorCode'] = $this->errorCode;
        if (isset($this->message)) $o['message'] = $this->message;
        return $o;
    }
    public function getTypeName(): string { return 'PatchValidationRule'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/appusers/{Id}", "PUT")
// @ValidateRequest(Validator="IsAdmin")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of AppUser
 */
class UpdateAppUser implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $displayName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $email=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $profileUrl=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $department=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $title=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $jobArea=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $location=null,

        // @DataMember(Order=9)
        /** @var int */
        public int $salary=0,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $about=null,

        // @DataMember(Order=11)
        /** @var int */
        public int $isArchived=0,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $archivedDate=null,

        // @DataMember(Order=13)
        /** @var string|null */
        public ?string $lastLoginDate=null,

        // @DataMember(Order=14)
        /** @var string|null */
        public ?string $lastLoginIp=null,

        // @DataMember(Order=15)
        /** @var string|null */
        public ?string $userName=null,

        // @DataMember(Order=16)
        /** @var string|null */
        public ?string $primaryEmail=null,

        // @DataMember(Order=17)
        /** @var string|null */
        public ?string $firstName=null,

        // @DataMember(Order=18)
        /** @var string|null */
        public ?string $lastName=null,

        // @DataMember(Order=19)
        /** @var string|null */
        public ?string $company=null,

        // @DataMember(Order=20)
        /** @var string|null */
        public ?string $country=null,

        // @DataMember(Order=21)
        /** @var string|null */
        public ?string $phoneNumber=null,

        // @DataMember(Order=22)
        /** @var string|null */
        public ?string $birthDate=null,

        // @DataMember(Order=23)
        /** @var string|null */
        public ?string $birthDateRaw=null,

        // @DataMember(Order=24)
        /** @var string|null */
        public ?string $address=null,

        // @DataMember(Order=25)
        /** @var string|null */
        public ?string $address2=null,

        // @DataMember(Order=26)
        /** @var string|null */
        public ?string $city=null,

        // @DataMember(Order=27)
        /** @var string|null */
        public ?string $state=null,

        // @DataMember(Order=28)
        /** @var string|null */
        public ?string $culture=null,

        // @DataMember(Order=29)
        /** @var string|null */
        public ?string $fullName=null,

        // @DataMember(Order=30)
        /** @var string|null */
        public ?string $gender=null,

        // @DataMember(Order=31)
        /** @var string|null */
        public ?string $language=null,

        // @DataMember(Order=32)
        /** @var string|null */
        public ?string $mailAddress=null,

        // @DataMember(Order=33)
        /** @var string|null */
        public ?string $nickname=null,

        // @DataMember(Order=34)
        /** @var string|null */
        public ?string $postalCode=null,

        // @DataMember(Order=35)
        /** @var string|null */
        public ?string $timeZone=null,

        // @DataMember(Order=36)
        /** @var string|null */
        public ?string $salt=null,

        // @DataMember(Order=37)
        /** @var string|null */
        public ?string $passwordHash=null,

        // @DataMember(Order=38)
        /** @var string|null */
        public ?string $digestHa1Hash=null,

        // @DataMember(Order=39)
        /** @var string|null */
        public ?string $roles=null,

        // @DataMember(Order=40)
        /** @var string|null */
        public ?string $permissions=null,

        // @DataMember(Order=41)
        /** @var string|null */
        public ?string $createdDate=null,

        // @DataMember(Order=42)
        /** @var string|null */
        public ?string $modifiedDate=null,

        // @DataMember(Order=43)
        /** @var int */
        public int $invalidLoginAttempts=0,

        // @DataMember(Order=44)
        /** @var string|null */
        public ?string $lastLoginAttempt=null,

        // @DataMember(Order=45)
        /** @var string|null */
        public ?string $lockedDate=null,

        // @DataMember(Order=46)
        /** @var string|null */
        public ?string $recoveryToken=null,

        // @DataMember(Order=47)
        /** @var int|null */
        public ?int $refId=null,

        // @DataMember(Order=48)
        /** @var string|null */
        public ?string $refIdStr=null,

        // @DataMember(Order=49)
        /** @var string|null */
        public ?string $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['displayName'])) $this->displayName = $o['displayName'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['profileUrl'])) $this->profileUrl = $o['profileUrl'];
        if (isset($o['department'])) $this->department = $o['department'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['jobArea'])) $this->jobArea = $o['jobArea'];
        if (isset($o['location'])) $this->location = $o['location'];
        if (isset($o['salary'])) $this->salary = $o['salary'];
        if (isset($o['about'])) $this->about = $o['about'];
        if (isset($o['isArchived'])) $this->isArchived = $o['isArchived'];
        if (isset($o['archivedDate'])) $this->archivedDate = $o['archivedDate'];
        if (isset($o['lastLoginDate'])) $this->lastLoginDate = $o['lastLoginDate'];
        if (isset($o['lastLoginIp'])) $this->lastLoginIp = $o['lastLoginIp'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['primaryEmail'])) $this->primaryEmail = $o['primaryEmail'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['company'])) $this->company = $o['company'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['phoneNumber'])) $this->phoneNumber = $o['phoneNumber'];
        if (isset($o['birthDate'])) $this->birthDate = $o['birthDate'];
        if (isset($o['birthDateRaw'])) $this->birthDateRaw = $o['birthDateRaw'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['address2'])) $this->address2 = $o['address2'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['culture'])) $this->culture = $o['culture'];
        if (isset($o['fullName'])) $this->fullName = $o['fullName'];
        if (isset($o['gender'])) $this->gender = $o['gender'];
        if (isset($o['language'])) $this->language = $o['language'];
        if (isset($o['mailAddress'])) $this->mailAddress = $o['mailAddress'];
        if (isset($o['nickname'])) $this->nickname = $o['nickname'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['timeZone'])) $this->timeZone = $o['timeZone'];
        if (isset($o['salt'])) $this->salt = $o['salt'];
        if (isset($o['passwordHash'])) $this->passwordHash = $o['passwordHash'];
        if (isset($o['digestHa1Hash'])) $this->digestHa1Hash = $o['digestHa1Hash'];
        if (isset($o['roles'])) $this->roles = $o['roles'];
        if (isset($o['permissions'])) $this->permissions = $o['permissions'];
        if (isset($o['createdDate'])) $this->createdDate = $o['createdDate'];
        if (isset($o['modifiedDate'])) $this->modifiedDate = $o['modifiedDate'];
        if (isset($o['invalidLoginAttempts'])) $this->invalidLoginAttempts = $o['invalidLoginAttempts'];
        if (isset($o['lastLoginAttempt'])) $this->lastLoginAttempt = $o['lastLoginAttempt'];
        if (isset($o['lockedDate'])) $this->lockedDate = $o['lockedDate'];
        if (isset($o['recoveryToken'])) $this->recoveryToken = $o['recoveryToken'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['refIdStr'])) $this->refIdStr = $o['refIdStr'];
        if (isset($o['meta'])) $this->meta = $o['meta'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->displayName)) $o['displayName'] = $this->displayName;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->profileUrl)) $o['profileUrl'] = $this->profileUrl;
        if (isset($this->department)) $o['department'] = $this->department;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->jobArea)) $o['jobArea'] = $this->jobArea;
        if (isset($this->location)) $o['location'] = $this->location;
        if (isset($this->salary)) $o['salary'] = $this->salary;
        if (isset($this->about)) $o['about'] = $this->about;
        if (isset($this->isArchived)) $o['isArchived'] = $this->isArchived;
        if (isset($this->archivedDate)) $o['archivedDate'] = $this->archivedDate;
        if (isset($this->lastLoginDate)) $o['lastLoginDate'] = $this->lastLoginDate;
        if (isset($this->lastLoginIp)) $o['lastLoginIp'] = $this->lastLoginIp;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->primaryEmail)) $o['primaryEmail'] = $this->primaryEmail;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->company)) $o['company'] = $this->company;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->phoneNumber)) $o['phoneNumber'] = $this->phoneNumber;
        if (isset($this->birthDate)) $o['birthDate'] = $this->birthDate;
        if (isset($this->birthDateRaw)) $o['birthDateRaw'] = $this->birthDateRaw;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->address2)) $o['address2'] = $this->address2;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->culture)) $o['culture'] = $this->culture;
        if (isset($this->fullName)) $o['fullName'] = $this->fullName;
        if (isset($this->gender)) $o['gender'] = $this->gender;
        if (isset($this->language)) $o['language'] = $this->language;
        if (isset($this->mailAddress)) $o['mailAddress'] = $this->mailAddress;
        if (isset($this->nickname)) $o['nickname'] = $this->nickname;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->timeZone)) $o['timeZone'] = $this->timeZone;
        if (isset($this->salt)) $o['salt'] = $this->salt;
        if (isset($this->passwordHash)) $o['passwordHash'] = $this->passwordHash;
        if (isset($this->digestHa1Hash)) $o['digestHa1Hash'] = $this->digestHa1Hash;
        if (isset($this->roles)) $o['roles'] = $this->roles;
        if (isset($this->permissions)) $o['permissions'] = $this->permissions;
        if (isset($this->createdDate)) $o['createdDate'] = $this->createdDate;
        if (isset($this->modifiedDate)) $o['modifiedDate'] = $this->modifiedDate;
        if (isset($this->invalidLoginAttempts)) $o['invalidLoginAttempts'] = $this->invalidLoginAttempts;
        if (isset($this->lastLoginAttempt)) $o['lastLoginAttempt'] = $this->lastLoginAttempt;
        if (isset($this->lockedDate)) $o['lockedDate'] = $this->lockedDate;
        if (isset($this->recoveryToken)) $o['recoveryToken'] = $this->recoveryToken;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->refIdStr)) $o['refIdStr'] = $this->refIdStr;
        if (isset($this->meta)) $o['meta'] = $this->meta;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateAppUser'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/categories/{Id}", "PUT")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Category
 */
class UpdateCategory implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $categoryName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $description=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['categoryName'])) $this->categoryName = $o['categoryName'];
        if (isset($o['description'])) $this->description = $o['description'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->categoryName)) $o['categoryName'] = $this->categoryName;
        if (isset($this->description)) $o['description'] = $this->description;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateCategory'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/customers/{Id}", "PUT")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Customer
 */
class UpdateCustomer implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $companyName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $contactName=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $contactTitle=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $address=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $city=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $region=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $postalCode=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $country=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $phone=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $fax=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['companyName'])) $this->companyName = $o['companyName'];
        if (isset($o['contactName'])) $this->contactName = $o['contactName'];
        if (isset($o['contactTitle'])) $this->contactTitle = $o['contactTitle'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['region'])) $this->region = $o['region'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['fax'])) $this->fax = $o['fax'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->companyName)) $o['companyName'] = $this->companyName;
        if (isset($this->contactName)) $o['contactName'] = $this->contactName;
        if (isset($this->contactTitle)) $o['contactTitle'] = $this->contactTitle;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->region)) $o['region'] = $this->region;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->fax)) $o['fax'] = $this->fax;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateCustomer'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/employees/{Id}", "PUT")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Employee
 */
class UpdateEmployee implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $lastName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $firstName=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $title=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $titleOfCourtesy=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $birthDate=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $hireDate=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $address=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $city=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $region=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $postalCode=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $country=null,

        // @DataMember(Order=13)
        /** @var string|null */
        public ?string $homePhone=null,

        // @DataMember(Order=14)
        /** @var string|null */
        public ?string $extension=null,

        // @DataMember(Order=15)
        /** @var ByteArray|null */
        public ?ByteArray $photo=null,

        // @DataMember(Order=16)
        /** @var string|null */
        public ?string $notes=null,

        // @DataMember(Order=17)
        /** @var int|null */
        public ?int $reportsTo=null,

        // @DataMember(Order=18)
        /** @var string|null */
        public ?string $photoPath=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['titleOfCourtesy'])) $this->titleOfCourtesy = $o['titleOfCourtesy'];
        if (isset($o['birthDate'])) $this->birthDate = $o['birthDate'];
        if (isset($o['hireDate'])) $this->hireDate = $o['hireDate'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['region'])) $this->region = $o['region'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['homePhone'])) $this->homePhone = $o['homePhone'];
        if (isset($o['extension'])) $this->extension = $o['extension'];
        if (isset($o['photo'])) $this->photo = JsonConverters::from('ByteArray', $o['photo']);
        if (isset($o['notes'])) $this->notes = $o['notes'];
        if (isset($o['reportsTo'])) $this->reportsTo = $o['reportsTo'];
        if (isset($o['photoPath'])) $this->photoPath = $o['photoPath'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->titleOfCourtesy)) $o['titleOfCourtesy'] = $this->titleOfCourtesy;
        if (isset($this->birthDate)) $o['birthDate'] = $this->birthDate;
        if (isset($this->hireDate)) $o['hireDate'] = $this->hireDate;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->region)) $o['region'] = $this->region;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->homePhone)) $o['homePhone'] = $this->homePhone;
        if (isset($this->extension)) $o['extension'] = $this->extension;
        if (isset($this->photo)) $o['photo'] = JsonConverters::to('ByteArray', $this->photo);
        if (isset($this->notes)) $o['notes'] = $this->notes;
        if (isset($this->reportsTo)) $o['reportsTo'] = $this->reportsTo;
        if (isset($this->photoPath)) $o['photoPath'] = $this->photoPath;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateEmployee'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/employeeterritories/{Id}", "PUT")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of EmployeeTerritory
 */
class UpdateEmployeeTerritory implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null,

        // @DataMember(Order=2)
        /** @var int */
        public int $employeeId=0,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $territoryId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['employeeId'])) $this->employeeId = $o['employeeId'];
        if (isset($o['territoryId'])) $this->territoryId = $o['territoryId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->employeeId)) $o['employeeId'] = $this->employeeId;
        if (isset($this->territoryId)) $o['territoryId'] = $this->territoryId;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateEmployeeTerritory'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/filesystemfiles/{Id}", "PUT")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of FileSystemFile
 */
class UpdateFileSystemFile implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $fileName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $filePath=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $contentType=null,

        // @DataMember(Order=5)
        /** @var int */
        public int $contentLength=0,

        // @DataMember(Order=6)
        /** @var int */
        public int $fileSystemItemId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['fileName'])) $this->fileName = $o['fileName'];
        if (isset($o['filePath'])) $this->filePath = $o['filePath'];
        if (isset($o['contentType'])) $this->contentType = $o['contentType'];
        if (isset($o['contentLength'])) $this->contentLength = $o['contentLength'];
        if (isset($o['fileSystemItemId'])) $this->fileSystemItemId = $o['fileSystemItemId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->fileName)) $o['fileName'] = $this->fileName;
        if (isset($this->filePath)) $o['filePath'] = $this->filePath;
        if (isset($this->contentType)) $o['contentType'] = $this->contentType;
        if (isset($this->contentLength)) $o['contentLength'] = $this->contentLength;
        if (isset($this->fileSystemItemId)) $o['fileSystemItemId'] = $this->fileSystemItemId;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateFileSystemFile'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/filesystemitems/{Id}", "PUT")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of FileSystemItem
 */
class UpdateFileSystemItem implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $fileAccessType=null,

        // @DataMember(Order=3)
        /** @var int */
        public int $appUserId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['fileAccessType'])) $this->fileAccessType = $o['fileAccessType'];
        if (isset($o['appUserId'])) $this->appUserId = $o['appUserId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->fileAccessType)) $o['fileAccessType'] = $this->fileAccessType;
        if (isset($this->appUserId)) $o['appUserId'] = $this->appUserId;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateFileSystemItem'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/migrations/{Id}", "PUT")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Migration
 */
class UpdateMigration implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $name=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $description=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $createdDate=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $completedDate=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $connectionString=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $namedConnection=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $log=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $errorCode=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $errorMessage=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $errorStackTrace=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['createdDate'])) $this->createdDate = $o['createdDate'];
        if (isset($o['completedDate'])) $this->completedDate = $o['completedDate'];
        if (isset($o['connectionString'])) $this->connectionString = $o['connectionString'];
        if (isset($o['namedConnection'])) $this->namedConnection = $o['namedConnection'];
        if (isset($o['log'])) $this->log = $o['log'];
        if (isset($o['errorCode'])) $this->errorCode = $o['errorCode'];
        if (isset($o['errorMessage'])) $this->errorMessage = $o['errorMessage'];
        if (isset($o['errorStackTrace'])) $this->errorStackTrace = $o['errorStackTrace'];
        if (isset($o['meta'])) $this->meta = $o['meta'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->createdDate)) $o['createdDate'] = $this->createdDate;
        if (isset($this->completedDate)) $o['completedDate'] = $this->completedDate;
        if (isset($this->connectionString)) $o['connectionString'] = $this->connectionString;
        if (isset($this->namedConnection)) $o['namedConnection'] = $this->namedConnection;
        if (isset($this->log)) $o['log'] = $this->log;
        if (isset($this->errorCode)) $o['errorCode'] = $this->errorCode;
        if (isset($this->errorMessage)) $o['errorMessage'] = $this->errorMessage;
        if (isset($this->errorStackTrace)) $o['errorStackTrace'] = $this->errorStackTrace;
        if (isset($this->meta)) $o['meta'] = $this->meta;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateMigration'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/orders/{Id}", "PUT")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Order
 */
class UpdateOrder implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $customerId=null,

        // @DataMember(Order=3)
        /** @var int */
        public int $employeeId=0,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $orderDate=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $requiredDate=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $shippedDate=null,

        // @DataMember(Order=7)
        /** @var int|null */
        public ?int $shipVia=null,

        // @DataMember(Order=8)
        /** @var float */
        public float $freight=0.0,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $shipName=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $shipAddress=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $shipCity=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $shipRegion=null,

        // @DataMember(Order=13)
        /** @var string|null */
        public ?string $shipPostalCode=null,

        // @DataMember(Order=14)
        /** @var string|null */
        public ?string $shipCountry=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['customerId'])) $this->customerId = $o['customerId'];
        if (isset($o['employeeId'])) $this->employeeId = $o['employeeId'];
        if (isset($o['orderDate'])) $this->orderDate = $o['orderDate'];
        if (isset($o['requiredDate'])) $this->requiredDate = $o['requiredDate'];
        if (isset($o['shippedDate'])) $this->shippedDate = $o['shippedDate'];
        if (isset($o['shipVia'])) $this->shipVia = $o['shipVia'];
        if (isset($o['freight'])) $this->freight = $o['freight'];
        if (isset($o['shipName'])) $this->shipName = $o['shipName'];
        if (isset($o['shipAddress'])) $this->shipAddress = $o['shipAddress'];
        if (isset($o['shipCity'])) $this->shipCity = $o['shipCity'];
        if (isset($o['shipRegion'])) $this->shipRegion = $o['shipRegion'];
        if (isset($o['shipPostalCode'])) $this->shipPostalCode = $o['shipPostalCode'];
        if (isset($o['shipCountry'])) $this->shipCountry = $o['shipCountry'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->customerId)) $o['customerId'] = $this->customerId;
        if (isset($this->employeeId)) $o['employeeId'] = $this->employeeId;
        if (isset($this->orderDate)) $o['orderDate'] = $this->orderDate;
        if (isset($this->requiredDate)) $o['requiredDate'] = $this->requiredDate;
        if (isset($this->shippedDate)) $o['shippedDate'] = $this->shippedDate;
        if (isset($this->shipVia)) $o['shipVia'] = $this->shipVia;
        if (isset($this->freight)) $o['freight'] = $this->freight;
        if (isset($this->shipName)) $o['shipName'] = $this->shipName;
        if (isset($this->shipAddress)) $o['shipAddress'] = $this->shipAddress;
        if (isset($this->shipCity)) $o['shipCity'] = $this->shipCity;
        if (isset($this->shipRegion)) $o['shipRegion'] = $this->shipRegion;
        if (isset($this->shipPostalCode)) $o['shipPostalCode'] = $this->shipPostalCode;
        if (isset($this->shipCountry)) $o['shipCountry'] = $this->shipCountry;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateOrder'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/orderdetails/{Id}", "PUT")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of OrderDetail
 */
class UpdateOrderDetail implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null,

        // @DataMember(Order=2)
        /** @var int */
        public int $orderId=0,

        // @DataMember(Order=3)
        /** @var int */
        public int $productId=0,

        // @DataMember(Order=4)
        /** @var float */
        public float $unitPrice=0.0,

        // @DataMember(Order=5)
        /** @var int */
        public int $quantity=0,

        // @DataMember(Order=6)
        /** @var float */
        public float $discount=0.0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['orderId'])) $this->orderId = $o['orderId'];
        if (isset($o['productId'])) $this->productId = $o['productId'];
        if (isset($o['unitPrice'])) $this->unitPrice = $o['unitPrice'];
        if (isset($o['quantity'])) $this->quantity = $o['quantity'];
        if (isset($o['discount'])) $this->discount = $o['discount'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->orderId)) $o['orderId'] = $this->orderId;
        if (isset($this->productId)) $o['productId'] = $this->productId;
        if (isset($this->unitPrice)) $o['unitPrice'] = $this->unitPrice;
        if (isset($this->quantity)) $o['quantity'] = $this->quantity;
        if (isset($this->discount)) $o['discount'] = $this->discount;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateOrderDetail'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/products/{Id}", "PUT")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Product
 */
class UpdateProduct implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $productName=null,

        // @DataMember(Order=3)
        /** @var int */
        public int $supplierId=0,

        // @DataMember(Order=4)
        /** @var int */
        public int $categoryId=0,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $quantityPerUnit=null,

        // @DataMember(Order=6)
        /** @var int */
        public int $unitPrice=0,

        // @DataMember(Order=7)
        /** @var int */
        public int $unitsInStock=0,

        // @DataMember(Order=8)
        /** @var int */
        public int $unitsOnOrder=0,

        // @DataMember(Order=9)
        /** @var int */
        public int $reorderLevel=0,

        // @DataMember(Order=10)
        /** @var int */
        public int $discontinued=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['productName'])) $this->productName = $o['productName'];
        if (isset($o['supplierId'])) $this->supplierId = $o['supplierId'];
        if (isset($o['categoryId'])) $this->categoryId = $o['categoryId'];
        if (isset($o['quantityPerUnit'])) $this->quantityPerUnit = $o['quantityPerUnit'];
        if (isset($o['unitPrice'])) $this->unitPrice = $o['unitPrice'];
        if (isset($o['unitsInStock'])) $this->unitsInStock = $o['unitsInStock'];
        if (isset($o['unitsOnOrder'])) $this->unitsOnOrder = $o['unitsOnOrder'];
        if (isset($o['reorderLevel'])) $this->reorderLevel = $o['reorderLevel'];
        if (isset($o['discontinued'])) $this->discontinued = $o['discontinued'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->productName)) $o['productName'] = $this->productName;
        if (isset($this->supplierId)) $o['supplierId'] = $this->supplierId;
        if (isset($this->categoryId)) $o['categoryId'] = $this->categoryId;
        if (isset($this->quantityPerUnit)) $o['quantityPerUnit'] = $this->quantityPerUnit;
        if (isset($this->unitPrice)) $o['unitPrice'] = $this->unitPrice;
        if (isset($this->unitsInStock)) $o['unitsInStock'] = $this->unitsInStock;
        if (isset($this->unitsOnOrder)) $o['unitsOnOrder'] = $this->unitsOnOrder;
        if (isset($this->reorderLevel)) $o['reorderLevel'] = $this->reorderLevel;
        if (isset($this->discontinued)) $o['discontinued'] = $this->discontinued;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateProduct'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/regions/{Id}", "PUT")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Region
 */
class UpdateRegion implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $regionDescription=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['regionDescription'])) $this->regionDescription = $o['regionDescription'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->regionDescription)) $o['regionDescription'] = $this->regionDescription;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateRegion'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/shippers/{Id}", "PUT")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Shipper
 */
class UpdateShipper implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $companyName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $phone=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['companyName'])) $this->companyName = $o['companyName'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->companyName)) $o['companyName'] = $this->companyName;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateShipper'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/suppliers/{Id}", "PUT")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Supplier
 */
class UpdateSupplier implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $companyName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $contactName=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $contactTitle=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $address=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $city=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $region=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $postalCode=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $country=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $phone=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $fax=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $homePage=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['companyName'])) $this->companyName = $o['companyName'];
        if (isset($o['contactName'])) $this->contactName = $o['contactName'];
        if (isset($o['contactTitle'])) $this->contactTitle = $o['contactTitle'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['region'])) $this->region = $o['region'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['fax'])) $this->fax = $o['fax'];
        if (isset($o['homePage'])) $this->homePage = $o['homePage'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->companyName)) $o['companyName'] = $this->companyName;
        if (isset($this->contactName)) $o['contactName'] = $this->contactName;
        if (isset($this->contactTitle)) $o['contactTitle'] = $this->contactTitle;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->region)) $o['region'] = $this->region;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->fax)) $o['fax'] = $this->fax;
        if (isset($this->homePage)) $o['homePage'] = $this->homePage;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateSupplier'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/territories/{Id}", "PUT")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Territory
 */
class UpdateTerritory implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $territoryDescription=null,

        // @DataMember(Order=3)
        /** @var int */
        public int $regionId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['territoryDescription'])) $this->territoryDescription = $o['territoryDescription'];
        if (isset($o['regionId'])) $this->regionId = $o['regionId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->territoryDescription)) $o['territoryDescription'] = $this->territoryDescription;
        if (isset($this->regionId)) $o['regionId'] = $this->regionId;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateTerritory'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/todos/{Id}", "PUT")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Todo
 */
class UpdateTodo implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $text=null,

        // @DataMember(Order=3)
        /** @var int */
        public int $isFinished=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['text'])) $this->text = $o['text'];
        if (isset($o['isFinished'])) $this->isFinished = $o['isFinished'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->text)) $o['text'] = $this->text;
        if (isset($this->isFinished)) $o['isFinished'] = $this->isFinished;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateTodo'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/userauthroles/{Id}", "PUT")
// @ValidateRequest(Validator="IsAdmin")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of UserAuthRole
 */
class UpdateUserAuthRole implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var int */
        public int $userAuthId=0,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $role=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $permission=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $createdDate=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $modifiedDate=null,

        // @DataMember(Order=7)
        /** @var int|null */
        public ?int $refId=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $refIdStr=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['userAuthId'])) $this->userAuthId = $o['userAuthId'];
        if (isset($o['role'])) $this->role = $o['role'];
        if (isset($o['permission'])) $this->permission = $o['permission'];
        if (isset($o['createdDate'])) $this->createdDate = $o['createdDate'];
        if (isset($o['modifiedDate'])) $this->modifiedDate = $o['modifiedDate'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['refIdStr'])) $this->refIdStr = $o['refIdStr'];
        if (isset($o['meta'])) $this->meta = $o['meta'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->userAuthId)) $o['userAuthId'] = $this->userAuthId;
        if (isset($this->role)) $o['role'] = $this->role;
        if (isset($this->permission)) $o['permission'] = $this->permission;
        if (isset($this->createdDate)) $o['createdDate'] = $this->createdDate;
        if (isset($this->modifiedDate)) $o['modifiedDate'] = $this->modifiedDate;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->refIdStr)) $o['refIdStr'] = $this->refIdStr;
        if (isset($this->meta)) $o['meta'] = $this->meta;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateUserAuthRole'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/validationrules/{Id}", "PUT")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of ValidationRule
 */
class UpdateValidationRule implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $type=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $field=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $createdBy=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $createdDate=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $modifiedBy=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $modifiedDate=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $suspendedBy=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $suspendedDate=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $notes=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $validator=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $condition=null,

        // @DataMember(Order=13)
        /** @var string|null */
        public ?string $errorCode=null,

        // @DataMember(Order=14)
        /** @var string|null */
        public ?string $message=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['type'])) $this->type = $o['type'];
        if (isset($o['field'])) $this->field = $o['field'];
        if (isset($o['createdBy'])) $this->createdBy = $o['createdBy'];
        if (isset($o['createdDate'])) $this->createdDate = $o['createdDate'];
        if (isset($o['modifiedBy'])) $this->modifiedBy = $o['modifiedBy'];
        if (isset($o['modifiedDate'])) $this->modifiedDate = $o['modifiedDate'];
        if (isset($o['suspendedBy'])) $this->suspendedBy = $o['suspendedBy'];
        if (isset($o['suspendedDate'])) $this->suspendedDate = $o['suspendedDate'];
        if (isset($o['notes'])) $this->notes = $o['notes'];
        if (isset($o['validator'])) $this->validator = $o['validator'];
        if (isset($o['condition'])) $this->condition = $o['condition'];
        if (isset($o['errorCode'])) $this->errorCode = $o['errorCode'];
        if (isset($o['message'])) $this->message = $o['message'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->type)) $o['type'] = $this->type;
        if (isset($this->field)) $o['field'] = $this->field;
        if (isset($this->createdBy)) $o['createdBy'] = $this->createdBy;
        if (isset($this->createdDate)) $o['createdDate'] = $this->createdDate;
        if (isset($this->modifiedBy)) $o['modifiedBy'] = $this->modifiedBy;
        if (isset($this->modifiedDate)) $o['modifiedDate'] = $this->modifiedDate;
        if (isset($this->suspendedBy)) $o['suspendedBy'] = $this->suspendedBy;
        if (isset($this->suspendedDate)) $o['suspendedDate'] = $this->suspendedDate;
        if (isset($this->notes)) $o['notes'] = $this->notes;
        if (isset($this->validator)) $o['validator'] = $this->validator;
        if (isset($this->condition)) $o['condition'] = $this->condition;
        if (isset($this->errorCode)) $o['errorCode'] = $this->errorCode;
        if (isset($this->message)) $o['message'] = $this->message;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateValidationRule'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/albums", "POST")
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Albums
 */
class CreateAlbums implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $title='',

        // @Validate(Validator="GreaterThan(0)")
        /** @var int */
        public int $artistId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['artistId'])) $this->artistId = $o['artistId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->artistId)) $o['artistId'] = $this->artistId;
        return $o;
    }
    public function getTypeName(): string { return 'CreateAlbums'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/artists", "POST")
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Artists
 */
class CreateArtists implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
    public function getTypeName(): string { return 'CreateArtists'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/customers", "POST")
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Customers
 */
class CreateChinookCustomer implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $firstName='',
        /** @var string */
        public string $lastName='',
        /** @var string */
        public string $company='',
        /** @var string */
        public string $address='',
        /** @var string */
        public string $city='',
        /** @var string */
        public string $state='',
        /** @var string */
        public string $country='',
        /** @var string */
        public string $postalCode='',
        /** @var string */
        public string $phone='',
        /** @var string */
        public string $fax='',
        /** @var string */
        public string $email='',
        /** @var int|null */
        public ?int $supportRepId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['company'])) $this->company = $o['company'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['fax'])) $this->fax = $o['fax'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['supportRepId'])) $this->supportRepId = $o['supportRepId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->company)) $o['company'] = $this->company;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->fax)) $o['fax'] = $this->fax;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->supportRepId)) $o['supportRepId'] = $this->supportRepId;
        return $o;
    }
    public function getTypeName(): string { return 'CreateChinookCustomer'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/employees", "POST")
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Employees
 */
class CreateChinookEmployee implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $lastName='',
        /** @var string */
        public string $firstName='',
        /** @var string */
        public string $title='',
        /** @var int|null */
        public ?int $reportsTo=null,
        /** @var DateTime|null */
        public ?DateTime $birthDate=null,
        /** @var DateTime|null */
        public ?DateTime $hireDate=null,
        /** @var string */
        public string $address='',
        /** @var string */
        public string $city='',
        /** @var string */
        public string $state='',
        /** @var string */
        public string $country='',
        /** @var string */
        public string $postalCode='',
        /** @var string */
        public string $phone='',
        /** @var string */
        public string $fax='',
        /** @var string */
        public string $email=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['reportsTo'])) $this->reportsTo = $o['reportsTo'];
        if (isset($o['birthDate'])) $this->birthDate = $o['birthDate'];
        if (isset($o['hireDate'])) $this->hireDate = $o['hireDate'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['fax'])) $this->fax = $o['fax'];
        if (isset($o['email'])) $this->email = $o['email'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->reportsTo)) $o['reportsTo'] = $this->reportsTo;
        if (isset($this->birthDate)) $o['birthDate'] = $this->birthDate;
        if (isset($this->hireDate)) $o['hireDate'] = $this->hireDate;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->fax)) $o['fax'] = $this->fax;
        if (isset($this->email)) $o['email'] = $this->email;
        return $o;
    }
    public function getTypeName(): string { return 'CreateChinookEmployee'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/genres", "POST")
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Genres
 */
class CreateGenres implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
    public function getTypeName(): string { return 'CreateGenres'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/invoiceitems", "POST")
#[Returns('IdResponse')]
/**
 * @template ICreateDb of InvoiceItems
 */
class CreateInvoiceItems implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $invoiceId=0,
        /** @var int */
        public int $trackId=0,
        /** @var float */
        public float $unitPrice=0.0,
        /** @var int */
        public int $quantity=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['invoiceId'])) $this->invoiceId = $o['invoiceId'];
        if (isset($o['trackId'])) $this->trackId = $o['trackId'];
        if (isset($o['unitPrice'])) $this->unitPrice = $o['unitPrice'];
        if (isset($o['quantity'])) $this->quantity = $o['quantity'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->invoiceId)) $o['invoiceId'] = $this->invoiceId;
        if (isset($this->trackId)) $o['trackId'] = $this->trackId;
        if (isset($this->unitPrice)) $o['unitPrice'] = $this->unitPrice;
        if (isset($this->quantity)) $o['quantity'] = $this->quantity;
        return $o;
    }
    public function getTypeName(): string { return 'CreateInvoiceItems'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/invoices", "POST")
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Invoices
 */
class CreateInvoices implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $customerId=0,
        /** @var DateTime */
        public DateTime $invoiceDate=new DateTime(),
        /** @var string */
        public string $billingAddress='',
        /** @var string */
        public string $billingCity='',
        /** @var string */
        public string $billingState='',
        /** @var string */
        public string $billingCountry='',
        /** @var string */
        public string $billingPostalCode='',
        /** @var float */
        public float $total=0.0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['customerId'])) $this->customerId = $o['customerId'];
        if (isset($o['invoiceDate'])) $this->invoiceDate = JsonConverters::from('DateTime', $o['invoiceDate']);
        if (isset($o['billingAddress'])) $this->billingAddress = $o['billingAddress'];
        if (isset($o['billingCity'])) $this->billingCity = $o['billingCity'];
        if (isset($o['billingState'])) $this->billingState = $o['billingState'];
        if (isset($o['billingCountry'])) $this->billingCountry = $o['billingCountry'];
        if (isset($o['billingPostalCode'])) $this->billingPostalCode = $o['billingPostalCode'];
        if (isset($o['total'])) $this->total = $o['total'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->customerId)) $o['customerId'] = $this->customerId;
        if (isset($this->invoiceDate)) $o['invoiceDate'] = JsonConverters::to('DateTime', $this->invoiceDate);
        if (isset($this->billingAddress)) $o['billingAddress'] = $this->billingAddress;
        if (isset($this->billingCity)) $o['billingCity'] = $this->billingCity;
        if (isset($this->billingState)) $o['billingState'] = $this->billingState;
        if (isset($this->billingCountry)) $o['billingCountry'] = $this->billingCountry;
        if (isset($this->billingPostalCode)) $o['billingPostalCode'] = $this->billingPostalCode;
        if (isset($this->total)) $o['total'] = $this->total;
        return $o;
    }
    public function getTypeName(): string { return 'CreateInvoices'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/mediatypes", "POST")
#[Returns('IdResponse')]
/**
 * @template ICreateDb of MediaTypes
 */
class CreateMediaTypes implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
    public function getTypeName(): string { return 'CreateMediaTypes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/playlists", "POST")
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Playlists
 */
class CreatePlaylists implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
    public function getTypeName(): string { return 'CreatePlaylists'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/tracks", "POST")
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Tracks
 */
class CreateTracks implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $name='',
        /** @var int|null */
        public ?int $albumId=null,
        /** @var int */
        public int $mediaTypeId=0,
        /** @var int|null */
        public ?int $genreId=null,
        /** @var string */
        public string $composer='',
        /** @var int */
        public int $milliseconds=0,
        /** @var int|null */
        public ?int $bytes=null,
        /** @var float */
        public float $unitPrice=0.0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['albumId'])) $this->albumId = $o['albumId'];
        if (isset($o['mediaTypeId'])) $this->mediaTypeId = $o['mediaTypeId'];
        if (isset($o['genreId'])) $this->genreId = $o['genreId'];
        if (isset($o['composer'])) $this->composer = $o['composer'];
        if (isset($o['milliseconds'])) $this->milliseconds = $o['milliseconds'];
        if (isset($o['bytes'])) $this->bytes = $o['bytes'];
        if (isset($o['unitPrice'])) $this->unitPrice = $o['unitPrice'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->albumId)) $o['albumId'] = $this->albumId;
        if (isset($this->mediaTypeId)) $o['mediaTypeId'] = $this->mediaTypeId;
        if (isset($this->genreId)) $o['genreId'] = $this->genreId;
        if (isset($this->composer)) $o['composer'] = $this->composer;
        if (isset($this->milliseconds)) $o['milliseconds'] = $this->milliseconds;
        if (isset($this->bytes)) $o['bytes'] = $this->bytes;
        if (isset($this->unitPrice)) $o['unitPrice'] = $this->unitPrice;
        return $o;
    }
    public function getTypeName(): string { return 'CreateTracks'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/albums/{AlbumId}", "DELETE")
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Albums
 */
class DeleteAlbums implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $albumId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['albumId'])) $this->albumId = $o['albumId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->albumId)) $o['albumId'] = $this->albumId;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteAlbums'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/artists/{ArtistId}", "DELETE")
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Artists
 */
class DeleteArtists implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $artistId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['artistId'])) $this->artistId = $o['artistId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->artistId)) $o['artistId'] = $this->artistId;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteArtists'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/customers/{CustomerId}", "DELETE")
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Customers
 */
class DeleteChinookCustomer implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $customerId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['customerId'])) $this->customerId = $o['customerId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->customerId)) $o['customerId'] = $this->customerId;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteChinookCustomer'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/employees/{EmployeeId}", "DELETE")
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Employees
 */
class DeleteChinookEmployee implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $employeeId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['employeeId'])) $this->employeeId = $o['employeeId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->employeeId)) $o['employeeId'] = $this->employeeId;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteChinookEmployee'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/genres/{GenreId}", "DELETE")
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Genres
 */
class DeleteGenres implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $genreId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['genreId'])) $this->genreId = $o['genreId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->genreId)) $o['genreId'] = $this->genreId;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteGenres'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/invoiceitems/{InvoiceLineId}", "DELETE")
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of InvoiceItems
 */
class DeleteInvoiceItems implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $invoiceLineId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['invoiceLineId'])) $this->invoiceLineId = $o['invoiceLineId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->invoiceLineId)) $o['invoiceLineId'] = $this->invoiceLineId;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteInvoiceItems'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/invoices/{InvoiceId}", "DELETE")
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Invoices
 */
class DeleteInvoices implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $invoiceId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['invoiceId'])) $this->invoiceId = $o['invoiceId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->invoiceId)) $o['invoiceId'] = $this->invoiceId;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteInvoices'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/mediatypes/{MediaTypeId}", "DELETE")
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of MediaTypes
 */
class DeleteMediaTypes implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $mediaTypeId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['mediaTypeId'])) $this->mediaTypeId = $o['mediaTypeId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->mediaTypeId)) $o['mediaTypeId'] = $this->mediaTypeId;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteMediaTypes'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/playlists/{PlaylistId}", "DELETE")
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Playlists
 */
class DeletePlaylists implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $playlistId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['playlistId'])) $this->playlistId = $o['playlistId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->playlistId)) $o['playlistId'] = $this->playlistId;
        return $o;
    }
    public function getTypeName(): string { return 'DeletePlaylists'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/tracks/{TrackId}", "DELETE")
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Tracks
 */
class DeleteTracks implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $trackId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['trackId'])) $this->trackId = $o['trackId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->trackId)) $o['trackId'] = $this->trackId;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteTracks'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/albums/{AlbumId}", "PATCH")
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Albums
 */
class PatchAlbums implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $albumId=0,
        /** @var string */
        public string $title='',
        /** @var int */
        public int $artistId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['albumId'])) $this->albumId = $o['albumId'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['artistId'])) $this->artistId = $o['artistId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->albumId)) $o['albumId'] = $this->albumId;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->artistId)) $o['artistId'] = $this->artistId;
        return $o;
    }
    public function getTypeName(): string { return 'PatchAlbums'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/artists/{ArtistId}", "PATCH")
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Artists
 */
class PatchArtists implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $artistId=0,
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['artistId'])) $this->artistId = $o['artistId'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->artistId)) $o['artistId'] = $this->artistId;
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
    public function getTypeName(): string { return 'PatchArtists'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/customers/{CustomerId}", "PATCH")
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Customers
 */
class PatchChinookCustomer implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $customerId=0,
        /** @var string */
        public string $firstName='',
        /** @var string */
        public string $lastName='',
        /** @var string */
        public string $company='',
        /** @var string */
        public string $address='',
        /** @var string */
        public string $city='',
        /** @var string */
        public string $state='',
        /** @var string */
        public string $country='',
        /** @var string */
        public string $postalCode='',
        /** @var string */
        public string $phone='',
        /** @var string */
        public string $fax='',
        /** @var string */
        public string $email='',
        /** @var int|null */
        public ?int $supportRepId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['customerId'])) $this->customerId = $o['customerId'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['company'])) $this->company = $o['company'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['fax'])) $this->fax = $o['fax'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['supportRepId'])) $this->supportRepId = $o['supportRepId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->customerId)) $o['customerId'] = $this->customerId;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->company)) $o['company'] = $this->company;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->fax)) $o['fax'] = $this->fax;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->supportRepId)) $o['supportRepId'] = $this->supportRepId;
        return $o;
    }
    public function getTypeName(): string { return 'PatchChinookCustomer'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/employees/{EmployeeId}", "PATCH")
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Employees
 */
class PatchChinookEmployee implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $employeeId=0,
        /** @var string */
        public string $lastName='',
        /** @var string */
        public string $firstName='',
        /** @var string */
        public string $title='',
        /** @var int|null */
        public ?int $reportsTo=null,
        /** @var DateTime|null */
        public ?DateTime $birthDate=null,
        /** @var DateTime|null */
        public ?DateTime $hireDate=null,
        /** @var string */
        public string $address='',
        /** @var string */
        public string $city='',
        /** @var string */
        public string $state='',
        /** @var string */
        public string $country='',
        /** @var string */
        public string $postalCode='',
        /** @var string */
        public string $phone='',
        /** @var string */
        public string $fax='',
        /** @var string */
        public string $email=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['employeeId'])) $this->employeeId = $o['employeeId'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['reportsTo'])) $this->reportsTo = $o['reportsTo'];
        if (isset($o['birthDate'])) $this->birthDate = $o['birthDate'];
        if (isset($o['hireDate'])) $this->hireDate = $o['hireDate'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['fax'])) $this->fax = $o['fax'];
        if (isset($o['email'])) $this->email = $o['email'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->employeeId)) $o['employeeId'] = $this->employeeId;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->reportsTo)) $o['reportsTo'] = $this->reportsTo;
        if (isset($this->birthDate)) $o['birthDate'] = $this->birthDate;
        if (isset($this->hireDate)) $o['hireDate'] = $this->hireDate;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->fax)) $o['fax'] = $this->fax;
        if (isset($this->email)) $o['email'] = $this->email;
        return $o;
    }
    public function getTypeName(): string { return 'PatchChinookEmployee'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/genres/{GenreId}", "PATCH")
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Genres
 */
class PatchGenres implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $genreId=0,
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['genreId'])) $this->genreId = $o['genreId'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->genreId)) $o['genreId'] = $this->genreId;
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
    public function getTypeName(): string { return 'PatchGenres'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/invoiceitems/{InvoiceLineId}", "PATCH")
#[Returns('IdResponse')]
/**
 * @template IPatchDb of InvoiceItems
 */
class PatchInvoiceItems implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $invoiceLineId=0,
        /** @var int */
        public int $invoiceId=0,
        /** @var int */
        public int $trackId=0,
        /** @var float */
        public float $unitPrice=0.0,
        /** @var int */
        public int $quantity=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['invoiceLineId'])) $this->invoiceLineId = $o['invoiceLineId'];
        if (isset($o['invoiceId'])) $this->invoiceId = $o['invoiceId'];
        if (isset($o['trackId'])) $this->trackId = $o['trackId'];
        if (isset($o['unitPrice'])) $this->unitPrice = $o['unitPrice'];
        if (isset($o['quantity'])) $this->quantity = $o['quantity'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->invoiceLineId)) $o['invoiceLineId'] = $this->invoiceLineId;
        if (isset($this->invoiceId)) $o['invoiceId'] = $this->invoiceId;
        if (isset($this->trackId)) $o['trackId'] = $this->trackId;
        if (isset($this->unitPrice)) $o['unitPrice'] = $this->unitPrice;
        if (isset($this->quantity)) $o['quantity'] = $this->quantity;
        return $o;
    }
    public function getTypeName(): string { return 'PatchInvoiceItems'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/invoices/{InvoiceId}", "PATCH")
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Invoices
 */
class PatchInvoices implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $invoiceId=0,
        /** @var int */
        public int $customerId=0,
        /** @var DateTime */
        public DateTime $invoiceDate=new DateTime(),
        /** @var string */
        public string $billingAddress='',
        /** @var string */
        public string $billingCity='',
        /** @var string */
        public string $billingState='',
        /** @var string */
        public string $billingCountry='',
        /** @var string */
        public string $billingPostalCode='',
        /** @var float */
        public float $total=0.0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['invoiceId'])) $this->invoiceId = $o['invoiceId'];
        if (isset($o['customerId'])) $this->customerId = $o['customerId'];
        if (isset($o['invoiceDate'])) $this->invoiceDate = JsonConverters::from('DateTime', $o['invoiceDate']);
        if (isset($o['billingAddress'])) $this->billingAddress = $o['billingAddress'];
        if (isset($o['billingCity'])) $this->billingCity = $o['billingCity'];
        if (isset($o['billingState'])) $this->billingState = $o['billingState'];
        if (isset($o['billingCountry'])) $this->billingCountry = $o['billingCountry'];
        if (isset($o['billingPostalCode'])) $this->billingPostalCode = $o['billingPostalCode'];
        if (isset($o['total'])) $this->total = $o['total'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->invoiceId)) $o['invoiceId'] = $this->invoiceId;
        if (isset($this->customerId)) $o['customerId'] = $this->customerId;
        if (isset($this->invoiceDate)) $o['invoiceDate'] = JsonConverters::to('DateTime', $this->invoiceDate);
        if (isset($this->billingAddress)) $o['billingAddress'] = $this->billingAddress;
        if (isset($this->billingCity)) $o['billingCity'] = $this->billingCity;
        if (isset($this->billingState)) $o['billingState'] = $this->billingState;
        if (isset($this->billingCountry)) $o['billingCountry'] = $this->billingCountry;
        if (isset($this->billingPostalCode)) $o['billingPostalCode'] = $this->billingPostalCode;
        if (isset($this->total)) $o['total'] = $this->total;
        return $o;
    }
    public function getTypeName(): string { return 'PatchInvoices'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/mediatypes/{MediaTypeId}", "PATCH")
#[Returns('IdResponse')]
/**
 * @template IPatchDb of MediaTypes
 */
class PatchMediaTypes implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $mediaTypeId=0,
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['mediaTypeId'])) $this->mediaTypeId = $o['mediaTypeId'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->mediaTypeId)) $o['mediaTypeId'] = $this->mediaTypeId;
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
    public function getTypeName(): string { return 'PatchMediaTypes'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/playlists/{PlaylistId}", "PATCH")
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Playlists
 */
class PatchPlaylists implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $playlistId=0,
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['playlistId'])) $this->playlistId = $o['playlistId'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->playlistId)) $o['playlistId'] = $this->playlistId;
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
    public function getTypeName(): string { return 'PatchPlaylists'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/tracks/{TrackId}", "PATCH")
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Tracks
 */
class PatchTracks implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $trackId=0,
        /** @var string */
        public string $name='',
        /** @var int|null */
        public ?int $albumId=null,
        /** @var int */
        public int $mediaTypeId=0,
        /** @var int|null */
        public ?int $genreId=null,
        /** @var string */
        public string $composer='',
        /** @var int */
        public int $milliseconds=0,
        /** @var int|null */
        public ?int $bytes=null,
        /** @var float */
        public float $unitPrice=0.0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['trackId'])) $this->trackId = $o['trackId'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['albumId'])) $this->albumId = $o['albumId'];
        if (isset($o['mediaTypeId'])) $this->mediaTypeId = $o['mediaTypeId'];
        if (isset($o['genreId'])) $this->genreId = $o['genreId'];
        if (isset($o['composer'])) $this->composer = $o['composer'];
        if (isset($o['milliseconds'])) $this->milliseconds = $o['milliseconds'];
        if (isset($o['bytes'])) $this->bytes = $o['bytes'];
        if (isset($o['unitPrice'])) $this->unitPrice = $o['unitPrice'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->trackId)) $o['trackId'] = $this->trackId;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->albumId)) $o['albumId'] = $this->albumId;
        if (isset($this->mediaTypeId)) $o['mediaTypeId'] = $this->mediaTypeId;
        if (isset($this->genreId)) $o['genreId'] = $this->genreId;
        if (isset($this->composer)) $o['composer'] = $this->composer;
        if (isset($this->milliseconds)) $o['milliseconds'] = $this->milliseconds;
        if (isset($this->bytes)) $o['bytes'] = $this->bytes;
        if (isset($this->unitPrice)) $o['unitPrice'] = $this->unitPrice;
        return $o;
    }
    public function getTypeName(): string { return 'PatchTracks'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/albums/{AlbumId}", "PUT")
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Albums
 */
class UpdateAlbums implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $albumId=0,
        /** @var string */
        public string $title='',
        /** @var int */
        public int $artistId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['albumId'])) $this->albumId = $o['albumId'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['artistId'])) $this->artistId = $o['artistId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->albumId)) $o['albumId'] = $this->albumId;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->artistId)) $o['artistId'] = $this->artistId;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateAlbums'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/artists/{ArtistId}", "PUT")
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Artists
 */
class UpdateArtists implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $artistId=0,
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['artistId'])) $this->artistId = $o['artistId'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->artistId)) $o['artistId'] = $this->artistId;
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateArtists'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/customers/{CustomerId}", "PUT")
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Customers
 */
class UpdateChinookCustomer implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $customerId=0,
        /** @var string */
        public string $firstName='',
        /** @var string */
        public string $lastName='',
        /** @var string */
        public string $company='',
        /** @var string */
        public string $address='',
        /** @var string */
        public string $city='',
        /** @var string */
        public string $state='',
        /** @var string */
        public string $country='',
        /** @var string */
        public string $postalCode='',
        /** @var string */
        public string $phone='',
        /** @var string */
        public string $fax='',
        /** @var string */
        public string $email='',
        /** @var int|null */
        public ?int $supportRepId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['customerId'])) $this->customerId = $o['customerId'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['company'])) $this->company = $o['company'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['fax'])) $this->fax = $o['fax'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['supportRepId'])) $this->supportRepId = $o['supportRepId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->customerId)) $o['customerId'] = $this->customerId;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->company)) $o['company'] = $this->company;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->fax)) $o['fax'] = $this->fax;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->supportRepId)) $o['supportRepId'] = $this->supportRepId;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateChinookCustomer'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/employees/{EmployeeId}", "PUT")
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Employees
 */
class UpdateChinookEmployee implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $employeeId=0,
        /** @var string */
        public string $lastName='',
        /** @var string */
        public string $firstName='',
        /** @var string */
        public string $title='',
        /** @var int|null */
        public ?int $reportsTo=null,
        /** @var DateTime|null */
        public ?DateTime $birthDate=null,
        /** @var DateTime|null */
        public ?DateTime $hireDate=null,
        /** @var string */
        public string $address='',
        /** @var string */
        public string $city='',
        /** @var string */
        public string $state='',
        /** @var string */
        public string $country='',
        /** @var string */
        public string $postalCode='',
        /** @var string */
        public string $phone='',
        /** @var string */
        public string $fax='',
        /** @var string */
        public string $email=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['employeeId'])) $this->employeeId = $o['employeeId'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['reportsTo'])) $this->reportsTo = $o['reportsTo'];
        if (isset($o['birthDate'])) $this->birthDate = $o['birthDate'];
        if (isset($o['hireDate'])) $this->hireDate = $o['hireDate'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['fax'])) $this->fax = $o['fax'];
        if (isset($o['email'])) $this->email = $o['email'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->employeeId)) $o['employeeId'] = $this->employeeId;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->reportsTo)) $o['reportsTo'] = $this->reportsTo;
        if (isset($this->birthDate)) $o['birthDate'] = $this->birthDate;
        if (isset($this->hireDate)) $o['hireDate'] = $this->hireDate;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->fax)) $o['fax'] = $this->fax;
        if (isset($this->email)) $o['email'] = $this->email;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateChinookEmployee'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/genres/{GenreId}", "PUT")
#[Returns('IdResponse')]
/**
 * @template IUpdateDb of Genres
 */
class UpdateGenres implements IReturn, IPut, IUpdateDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $genreId=0,
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['genreId'])) $this->genreId = $o['genreId'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->genreId)) $o['genreId'] = $this->genreId;
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
    public function getTypeName(): string { return 'UpdateGenres'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/appusers", "GET")
// @Route("/appusers/{Id}", "GET")
// @ValidateRequest(Validator="IsAdmin")
// @DataContract
#[Returns('QueryResponse')]
/**
 * @template QueryDb of AppUser
 */
class QueryAppUsers extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
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
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryAppUsers'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['AppUser']); }
}

// @Route("/categories", "GET")
// @Route("/categories/{Id}", "GET")
// @DataContract
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Category
 */
class QueryCategories extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
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
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryCategories'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Category']); }
}

// @Route("/customers", "GET")
// @Route("/customers/{Id}", "GET")
// @DataContract
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Customer
 */
class QueryCustomers extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryCustomers'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Customer']); }
}

// @Route("/employees", "GET")
// @Route("/employees/{Id}", "GET")
// @DataContract
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Employee
 */
class QueryEmployees extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
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
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryEmployees'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Employee']); }
}

// @Route("/employeeterritories", "GET")
// @Route("/employeeterritories/{Id}", "GET")
// @DataContract
#[Returns('QueryResponse')]
/**
 * @template QueryDb of EmployeeTerritory
 */
class QueryEmployeeTerritories extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryEmployeeTerritories'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['EmployeeTerritory']); }
}

// @Route("/migrations", "GET")
// @Route("/migrations/{Id}", "GET")
// @DataContract
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Migration
 */
class QueryMigrations extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
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
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryMigrations'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Migration']); }
}

// @Route("/orderdetails", "GET")
// @Route("/orderdetails/{Id}", "GET")
// @DataContract
#[Returns('QueryResponse')]
/**
 * @template QueryDb of OrderDetail
 */
class QueryOrderDetails extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryOrderDetails'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['OrderDetail']); }
}

// @Route("/orders", "GET")
// @Route("/orders/{Id}", "GET")
// @DataContract
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Order
 */
class QueryOrders extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
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
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryOrders'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Order']); }
}

// @Route("/products", "GET")
// @Route("/products/{Id}", "GET")
// @DataContract
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Product
 */
class QueryProducts extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
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
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryProducts'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Product']); }
}

// @Route("/regions", "GET")
// @Route("/regions/{Id}", "GET")
// @DataContract
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Region
 */
class QueryRegions extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
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
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryRegions'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Region']); }
}

// @Route("/shippers", "GET")
// @Route("/shippers/{Id}", "GET")
// @DataContract
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Shipper
 */
class QueryShippers extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
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
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryShippers'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Shipper']); }
}

// @Route("/suppliers", "GET")
// @Route("/suppliers/{Id}", "GET")
// @DataContract
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Supplier
 */
class QuerySuppliers extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
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
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QuerySuppliers'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Supplier']); }
}

// @Route("/territories", "GET")
// @Route("/territories/{Id}", "GET")
// @DataContract
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Territory
 */
class QueryTerritories extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryTerritories'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Territory']); }
}

// @Route("/userauthroles", "GET")
// @Route("/userauthroles/{Id}", "GET")
// @ValidateRequest(Validator="IsAdmin")
// @DataContract
#[Returns('QueryResponse')]
/**
 * @template QueryDb of UserAuthRole
 */
class QueryUserAuthRoles extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
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
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryUserAuthRoles'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['UserAuthRole']); }
}

// @Route("/validationrules", "GET")
// @Route("/validationrules/{Id}", "GET")
// @DataContract
#[Returns('QueryResponse')]
/**
 * @template QueryDb of ValidationRule
 */
class QueryValidationRules extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
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
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryValidationRules'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['ValidationRule']); }
}

// @Route("/albums", "GET")
// @Route("/albums/{AlbumId}", "GET")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Albums
 */
class QueryAlbums extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $albumId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['albumId'])) $this->albumId = $o['albumId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->albumId)) $o['albumId'] = $this->albumId;
        return $o;
    }
    public function getTypeName(): string { return 'QueryAlbums'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Albums']); }
}

// @Route("/artists", "GET")
// @Route("/artists/{ArtistId}", "GET")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Artists
 */
class QueryArtists extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $artistId=null,
        /** @var int[] */
        public array $artistIdBetween=[],
        /** @var string */
        public string $nameStartsWith=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['artistId'])) $this->artistId = $o['artistId'];
        if (isset($o['artistIdBetween'])) $this->artistIdBetween = JsonConverters::fromArray('int', $o['artistIdBetween']);
        if (isset($o['nameStartsWith'])) $this->nameStartsWith = $o['nameStartsWith'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->artistId)) $o['artistId'] = $this->artistId;
        if (isset($this->artistIdBetween)) $o['artistIdBetween'] = JsonConverters::toArray('int', $this->artistIdBetween);
        if (isset($this->nameStartsWith)) $o['nameStartsWith'] = $this->nameStartsWith;
        return $o;
    }
    public function getTypeName(): string { return 'QueryArtists'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Artists']); }
}

// @Route("/customers", "GET")
// @Route("/customers/{CustomerId}", "GET")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Customers
 */
class QueryChinookCustomers extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $customerId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['customerId'])) $this->customerId = $o['customerId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->customerId)) $o['customerId'] = $this->customerId;
        return $o;
    }
    public function getTypeName(): string { return 'QueryChinookCustomers'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Customers']); }
}

// @Route("/employees", "GET")
// @Route("/employees/{EmployeeId}", "GET")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Employees
 */
class QueryChinookEmployees extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $employeeId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['employeeId'])) $this->employeeId = $o['employeeId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->employeeId)) $o['employeeId'] = $this->employeeId;
        return $o;
    }
    public function getTypeName(): string { return 'QueryChinookEmployees'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Employees']); }
}

// @Route("/genres", "GET")
// @Route("/genres/{GenreId}", "GET")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Genres
 */
class QueryGenres extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $genreId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['genreId'])) $this->genreId = $o['genreId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->genreId)) $o['genreId'] = $this->genreId;
        return $o;
    }
    public function getTypeName(): string { return 'QueryGenres'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Genres']); }
}

// @Route("/invoiceitems", "GET")
// @Route("/invoiceitems/{InvoiceLineId}", "GET")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of InvoiceItems
 */
class QueryInvoiceItems extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $invoiceLineId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['invoiceLineId'])) $this->invoiceLineId = $o['invoiceLineId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->invoiceLineId)) $o['invoiceLineId'] = $this->invoiceLineId;
        return $o;
    }
    public function getTypeName(): string { return 'QueryInvoiceItems'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['InvoiceItems']); }
}

// @Route("/invoices", "GET")
// @Route("/invoices/{InvoiceId}", "GET")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Invoices
 */
class QueryInvoices extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $invoiceId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['invoiceId'])) $this->invoiceId = $o['invoiceId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->invoiceId)) $o['invoiceId'] = $this->invoiceId;
        return $o;
    }
    public function getTypeName(): string { return 'QueryInvoices'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Invoices']); }
}

// @Route("/mediatypes", "GET")
// @Route("/mediatypes/{MediaTypeId}", "GET")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of MediaTypes
 */
class QueryMediaTypes extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $mediaTypeId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['mediaTypeId'])) $this->mediaTypeId = $o['mediaTypeId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->mediaTypeId)) $o['mediaTypeId'] = $this->mediaTypeId;
        return $o;
    }
    public function getTypeName(): string { return 'QueryMediaTypes'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['MediaTypes']); }
}

// @Route("/playlists", "GET")
// @Route("/playlists/{PlaylistId}", "GET")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Playlists
 */
class QueryPlaylists extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $playlistId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['playlistId'])) $this->playlistId = $o['playlistId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->playlistId)) $o['playlistId'] = $this->playlistId;
        return $o;
    }
    public function getTypeName(): string { return 'QueryPlaylists'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Playlists']); }
}

// @Route("/tracks", "GET")
// @Route("/tracks/{TrackId}", "GET")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Tracks
 */
class QueryTracks extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $trackId=null,
        /** @var string */
        public string $nameContains=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['trackId'])) $this->trackId = $o['trackId'];
        if (isset($o['nameContains'])) $this->nameContains = $o['nameContains'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->trackId)) $o['trackId'] = $this->trackId;
        if (isset($this->nameContains)) $o['nameContains'] = $this->nameContains;
        return $o;
    }
    public function getTypeName(): string { return 'QueryTracks'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Tracks']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb of JobApplicationAttachment
 */
class QueryJobApplicationAttachment extends QueryDb implements IReturn, JsonSerializable
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
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryJobApplicationAttachment'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['JobApplicationAttachment']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb of Contact
 */
class QueryContacts extends QueryDb implements IReturn, JsonSerializable
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
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryContacts'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Contact']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb of Job
 */
class QueryJob extends QueryDb implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $id=null,
        /** @var array<int>|null */
        public ?array $ids=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['ids'])) $this->ids = JsonConverters::fromArray('int', $o['ids']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->ids)) $o['ids'] = JsonConverters::toArray('int', $this->ids);
        return $o;
    }
    public function getTypeName(): string { return 'QueryJob'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Job']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb of JobApplication
 */
class QueryJobApplication extends QueryDb implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $id=null,
        /** @var array<int>|null */
        public ?array $ids=null,
        /** @var int|null */
        public ?int $jobId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['ids'])) $this->ids = JsonConverters::fromArray('int', $o['ids']);
        if (isset($o['jobId'])) $this->jobId = $o['jobId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->ids)) $o['ids'] = JsonConverters::toArray('int', $this->ids);
        if (isset($this->jobId)) $o['jobId'] = $this->jobId;
        return $o;
    }
    public function getTypeName(): string { return 'QueryJobApplication'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['JobApplication']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb of PhoneScreen
 */
class QueryPhoneScreen extends QueryDb implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $id=null,
        /** @var int|null */
        public ?int $jobApplicationId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['jobApplicationId'])) $this->jobApplicationId = $o['jobApplicationId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->jobApplicationId)) $o['jobApplicationId'] = $this->jobApplicationId;
        return $o;
    }
    public function getTypeName(): string { return 'QueryPhoneScreen'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['PhoneScreen']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb of Interview
 */
class QueryInterview extends QueryDb implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $id=null,
        /** @var int|null */
        public ?int $jobApplicationId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['jobApplicationId'])) $this->jobApplicationId = $o['jobApplicationId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->jobApplicationId)) $o['jobApplicationId'] = $this->jobApplicationId;
        return $o;
    }
    public function getTypeName(): string { return 'QueryInterview'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Interview']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb of JobOffer
 */
class QueryJobOffer extends QueryDb implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $id=null,
        /** @var int|null */
        public ?int $jobApplicationId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['jobApplicationId'])) $this->jobApplicationId = $o['jobApplicationId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->jobApplicationId)) $o['jobApplicationId'] = $this->jobApplicationId;
        return $o;
    }
    public function getTypeName(): string { return 'QueryJobOffer'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['JobOffer']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb of JobApplicationEvent
 */
class QueryJobAppEvents extends QueryDb implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $jobApplicationId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['jobApplicationId'])) $this->jobApplicationId = $o['jobApplicationId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->jobApplicationId)) $o['jobApplicationId'] = $this->jobApplicationId;
        return $o;
    }
    public function getTypeName(): string { return 'QueryJobAppEvents'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['JobApplicationEvent']); }
}

// @ValidateRequest(Validator="IsAuthenticated")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of AppUser
 */
class QueryAppUser extends QueryDb implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $emailContains=null,
        /** @var string|null */
        public ?string $firstNameContains=null,
        /** @var string|null */
        public ?string $lastNameContains=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['emailContains'])) $this->emailContains = $o['emailContains'];
        if (isset($o['firstNameContains'])) $this->firstNameContains = $o['firstNameContains'];
        if (isset($o['lastNameContains'])) $this->lastNameContains = $o['lastNameContains'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->emailContains)) $o['emailContains'] = $this->emailContains;
        if (isset($this->firstNameContains)) $o['firstNameContains'] = $this->firstNameContains;
        if (isset($this->lastNameContains)) $o['lastNameContains'] = $this->lastNameContains;
        return $o;
    }
    public function getTypeName(): string { return 'QueryAppUser'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['AppUser']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb of JobApplicationComment
 */
class QueryJobApplicationComments extends QueryDb implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $jobApplicationId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['jobApplicationId'])) $this->jobApplicationId = $o['jobApplicationId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->jobApplicationId)) $o['jobApplicationId'] = $this->jobApplicationId;
        return $o;
    }
    public function getTypeName(): string { return 'QueryJobApplicationComments'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['JobApplicationComment']); }
}

/** @description Find Bookings */
// @Route("/bookings", "GET")
// @Route("/bookings/{Id}", "GET")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Booking
 */
class QueryBookings extends QueryDb implements IReturn, JsonSerializable
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
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryBookings'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Booking']); }
}

/** @description Find Coupons */
// @Route("/coupons", "GET")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Coupon
 */
class QueryCoupons extends QueryDb implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $id=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryCoupons'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Coupon']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb of FileSystemItem
 */
class QueryFileSystemItems extends QueryDb implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $appUserId=null,
        /** @var FileAccessType|null */
        public ?FileAccessType $fileAccessType=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['appUserId'])) $this->appUserId = $o['appUserId'];
        if (isset($o['fileAccessType'])) $this->fileAccessType = JsonConverters::from('FileAccessType', $o['fileAccessType']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->appUserId)) $o['appUserId'] = $this->appUserId;
        if (isset($this->fileAccessType)) $o['fileAccessType'] = JsonConverters::to('FileAccessType', $this->fileAccessType);
        return $o;
    }
    public function getTypeName(): string { return 'QueryFileSystemItems'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['FileSystemItem']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb of FileSystemFile
 */
class QueryFileSystemFiles extends QueryDb implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        return $o;
    }
    public function getTypeName(): string { return 'QueryFileSystemFiles'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['FileSystemFile']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb of Player
 */
class QueryPlayer extends QueryDb implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        return $o;
    }
    public function getTypeName(): string { return 'QueryPlayer'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Player']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb of Profile
 */
class QueryProfile extends QueryDb implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        return $o;
    }
    public function getTypeName(): string { return 'QueryProfile'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Profile']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb of GameItem
 */
class QueryGameItem extends QueryDb implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $name=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->name)) $o['name'] = $this->name;
        return $o;
    }
    public function getTypeName(): string { return 'QueryGameItem'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['GameItem']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb of PlayerGameItem
 */
class QueryPlayerGameItem extends QueryDb implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $id=null,
        /** @var int|null */
        public ?int $playerId=null,
        /** @var string|null */
        public ?string $gameItemName=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['playerId'])) $this->playerId = $o['playerId'];
        if (isset($o['gameItemName'])) $this->gameItemName = $o['gameItemName'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->playerId)) $o['playerId'] = $this->playerId;
        if (isset($this->gameItemName)) $o['gameItemName'] = $this->gameItemName;
        return $o;
    }
    public function getTypeName(): string { return 'QueryPlayerGameItem'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['PlayerGameItem']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb of Level
 */
class QueryLevel extends QueryDb implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $id=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'QueryLevel'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Level']); }
}

// @Route("/todos", "GET")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Todo
 */
class QueryTodos extends QueryDb implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        return $o;
    }
    public function getTypeName(): string { return 'QueryTodos'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Todo']); }
}

// @Route("/appusers", "POST")
// @ValidateRequest(Validator="IsAdmin")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template ICreateDb of AppUser
 */
class CreateAppUser implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $displayName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $email=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $profileUrl=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $department=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $title=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $jobArea=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $location=null,

        // @DataMember(Order=9)
        /** @var int */
        public int $salary=0,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $about=null,

        // @DataMember(Order=11)
        /** @var int */
        public int $isArchived=0,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $archivedDate=null,

        // @DataMember(Order=13)
        /** @var string|null */
        public ?string $lastLoginDate=null,

        // @DataMember(Order=14)
        /** @var string|null */
        public ?string $lastLoginIp=null,

        // @DataMember(Order=15)
        /** @var string|null */
        public ?string $userName=null,

        // @DataMember(Order=16)
        /** @var string|null */
        public ?string $primaryEmail=null,

        // @DataMember(Order=17)
        /** @var string|null */
        public ?string $firstName=null,

        // @DataMember(Order=18)
        /** @var string|null */
        public ?string $lastName=null,

        // @DataMember(Order=19)
        /** @var string|null */
        public ?string $company=null,

        // @DataMember(Order=20)
        /** @var string|null */
        public ?string $country=null,

        // @DataMember(Order=21)
        /** @var string|null */
        public ?string $phoneNumber=null,

        // @DataMember(Order=22)
        /** @var string|null */
        public ?string $birthDate=null,

        // @DataMember(Order=23)
        /** @var string|null */
        public ?string $birthDateRaw=null,

        // @DataMember(Order=24)
        /** @var string|null */
        public ?string $address=null,

        // @DataMember(Order=25)
        /** @var string|null */
        public ?string $address2=null,

        // @DataMember(Order=26)
        /** @var string|null */
        public ?string $city=null,

        // @DataMember(Order=27)
        /** @var string|null */
        public ?string $state=null,

        // @DataMember(Order=28)
        /** @var string|null */
        public ?string $culture=null,

        // @DataMember(Order=29)
        /** @var string|null */
        public ?string $fullName=null,

        // @DataMember(Order=30)
        /** @var string|null */
        public ?string $gender=null,

        // @DataMember(Order=31)
        /** @var string|null */
        public ?string $language=null,

        // @DataMember(Order=32)
        /** @var string|null */
        public ?string $mailAddress=null,

        // @DataMember(Order=33)
        /** @var string|null */
        public ?string $nickname=null,

        // @DataMember(Order=34)
        /** @var string|null */
        public ?string $postalCode=null,

        // @DataMember(Order=35)
        /** @var string|null */
        public ?string $timeZone=null,

        // @DataMember(Order=36)
        /** @var string|null */
        public ?string $salt=null,

        // @DataMember(Order=37)
        /** @var string|null */
        public ?string $passwordHash=null,

        // @DataMember(Order=38)
        /** @var string|null */
        public ?string $digestHa1Hash=null,

        // @DataMember(Order=39)
        /** @var string|null */
        public ?string $roles=null,

        // @DataMember(Order=40)
        /** @var string|null */
        public ?string $permissions=null,

        // @DataMember(Order=41)
        /** @var string|null */
        public ?string $createdDate=null,

        // @DataMember(Order=42)
        /** @var string|null */
        public ?string $modifiedDate=null,

        // @DataMember(Order=43)
        /** @var int */
        public int $invalidLoginAttempts=0,

        // @DataMember(Order=44)
        /** @var string|null */
        public ?string $lastLoginAttempt=null,

        // @DataMember(Order=45)
        /** @var string|null */
        public ?string $lockedDate=null,

        // @DataMember(Order=46)
        /** @var string|null */
        public ?string $recoveryToken=null,

        // @DataMember(Order=47)
        /** @var int|null */
        public ?int $refId=null,

        // @DataMember(Order=48)
        /** @var string|null */
        public ?string $refIdStr=null,

        // @DataMember(Order=49)
        /** @var string|null */
        public ?string $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['displayName'])) $this->displayName = $o['displayName'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['profileUrl'])) $this->profileUrl = $o['profileUrl'];
        if (isset($o['department'])) $this->department = $o['department'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['jobArea'])) $this->jobArea = $o['jobArea'];
        if (isset($o['location'])) $this->location = $o['location'];
        if (isset($o['salary'])) $this->salary = $o['salary'];
        if (isset($o['about'])) $this->about = $o['about'];
        if (isset($o['isArchived'])) $this->isArchived = $o['isArchived'];
        if (isset($o['archivedDate'])) $this->archivedDate = $o['archivedDate'];
        if (isset($o['lastLoginDate'])) $this->lastLoginDate = $o['lastLoginDate'];
        if (isset($o['lastLoginIp'])) $this->lastLoginIp = $o['lastLoginIp'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['primaryEmail'])) $this->primaryEmail = $o['primaryEmail'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['company'])) $this->company = $o['company'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['phoneNumber'])) $this->phoneNumber = $o['phoneNumber'];
        if (isset($o['birthDate'])) $this->birthDate = $o['birthDate'];
        if (isset($o['birthDateRaw'])) $this->birthDateRaw = $o['birthDateRaw'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['address2'])) $this->address2 = $o['address2'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['culture'])) $this->culture = $o['culture'];
        if (isset($o['fullName'])) $this->fullName = $o['fullName'];
        if (isset($o['gender'])) $this->gender = $o['gender'];
        if (isset($o['language'])) $this->language = $o['language'];
        if (isset($o['mailAddress'])) $this->mailAddress = $o['mailAddress'];
        if (isset($o['nickname'])) $this->nickname = $o['nickname'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['timeZone'])) $this->timeZone = $o['timeZone'];
        if (isset($o['salt'])) $this->salt = $o['salt'];
        if (isset($o['passwordHash'])) $this->passwordHash = $o['passwordHash'];
        if (isset($o['digestHa1Hash'])) $this->digestHa1Hash = $o['digestHa1Hash'];
        if (isset($o['roles'])) $this->roles = $o['roles'];
        if (isset($o['permissions'])) $this->permissions = $o['permissions'];
        if (isset($o['createdDate'])) $this->createdDate = $o['createdDate'];
        if (isset($o['modifiedDate'])) $this->modifiedDate = $o['modifiedDate'];
        if (isset($o['invalidLoginAttempts'])) $this->invalidLoginAttempts = $o['invalidLoginAttempts'];
        if (isset($o['lastLoginAttempt'])) $this->lastLoginAttempt = $o['lastLoginAttempt'];
        if (isset($o['lockedDate'])) $this->lockedDate = $o['lockedDate'];
        if (isset($o['recoveryToken'])) $this->recoveryToken = $o['recoveryToken'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['refIdStr'])) $this->refIdStr = $o['refIdStr'];
        if (isset($o['meta'])) $this->meta = $o['meta'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->displayName)) $o['displayName'] = $this->displayName;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->profileUrl)) $o['profileUrl'] = $this->profileUrl;
        if (isset($this->department)) $o['department'] = $this->department;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->jobArea)) $o['jobArea'] = $this->jobArea;
        if (isset($this->location)) $o['location'] = $this->location;
        if (isset($this->salary)) $o['salary'] = $this->salary;
        if (isset($this->about)) $o['about'] = $this->about;
        if (isset($this->isArchived)) $o['isArchived'] = $this->isArchived;
        if (isset($this->archivedDate)) $o['archivedDate'] = $this->archivedDate;
        if (isset($this->lastLoginDate)) $o['lastLoginDate'] = $this->lastLoginDate;
        if (isset($this->lastLoginIp)) $o['lastLoginIp'] = $this->lastLoginIp;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->primaryEmail)) $o['primaryEmail'] = $this->primaryEmail;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->company)) $o['company'] = $this->company;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->phoneNumber)) $o['phoneNumber'] = $this->phoneNumber;
        if (isset($this->birthDate)) $o['birthDate'] = $this->birthDate;
        if (isset($this->birthDateRaw)) $o['birthDateRaw'] = $this->birthDateRaw;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->address2)) $o['address2'] = $this->address2;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->culture)) $o['culture'] = $this->culture;
        if (isset($this->fullName)) $o['fullName'] = $this->fullName;
        if (isset($this->gender)) $o['gender'] = $this->gender;
        if (isset($this->language)) $o['language'] = $this->language;
        if (isset($this->mailAddress)) $o['mailAddress'] = $this->mailAddress;
        if (isset($this->nickname)) $o['nickname'] = $this->nickname;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->timeZone)) $o['timeZone'] = $this->timeZone;
        if (isset($this->salt)) $o['salt'] = $this->salt;
        if (isset($this->passwordHash)) $o['passwordHash'] = $this->passwordHash;
        if (isset($this->digestHa1Hash)) $o['digestHa1Hash'] = $this->digestHa1Hash;
        if (isset($this->roles)) $o['roles'] = $this->roles;
        if (isset($this->permissions)) $o['permissions'] = $this->permissions;
        if (isset($this->createdDate)) $o['createdDate'] = $this->createdDate;
        if (isset($this->modifiedDate)) $o['modifiedDate'] = $this->modifiedDate;
        if (isset($this->invalidLoginAttempts)) $o['invalidLoginAttempts'] = $this->invalidLoginAttempts;
        if (isset($this->lastLoginAttempt)) $o['lastLoginAttempt'] = $this->lastLoginAttempt;
        if (isset($this->lockedDate)) $o['lockedDate'] = $this->lockedDate;
        if (isset($this->recoveryToken)) $o['recoveryToken'] = $this->recoveryToken;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->refIdStr)) $o['refIdStr'] = $this->refIdStr;
        if (isset($this->meta)) $o['meta'] = $this->meta;
        return $o;
    }
    public function getTypeName(): string { return 'CreateAppUser'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/categories", "POST")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Category
 */
class CreateCategory implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $categoryName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $description=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['categoryName'])) $this->categoryName = $o['categoryName'];
        if (isset($o['description'])) $this->description = $o['description'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->categoryName)) $o['categoryName'] = $this->categoryName;
        if (isset($this->description)) $o['description'] = $this->description;
        return $o;
    }
    public function getTypeName(): string { return 'CreateCategory'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/customers", "POST")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Customer
 */
class CreateCustomer implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $companyName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $contactName=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $contactTitle=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $address=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $city=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $region=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $postalCode=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $country=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $phone=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $fax=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['companyName'])) $this->companyName = $o['companyName'];
        if (isset($o['contactName'])) $this->contactName = $o['contactName'];
        if (isset($o['contactTitle'])) $this->contactTitle = $o['contactTitle'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['region'])) $this->region = $o['region'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['fax'])) $this->fax = $o['fax'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->companyName)) $o['companyName'] = $this->companyName;
        if (isset($this->contactName)) $o['contactName'] = $this->contactName;
        if (isset($this->contactTitle)) $o['contactTitle'] = $this->contactTitle;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->region)) $o['region'] = $this->region;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->fax)) $o['fax'] = $this->fax;
        return $o;
    }
    public function getTypeName(): string { return 'CreateCustomer'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/employees", "POST")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Employee
 */
class CreateEmployee implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $lastName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $firstName=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $title=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $titleOfCourtesy=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $birthDate=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $hireDate=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $address=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $city=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $region=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $postalCode=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $country=null,

        // @DataMember(Order=13)
        /** @var string|null */
        public ?string $homePhone=null,

        // @DataMember(Order=14)
        /** @var string|null */
        public ?string $extension=null,

        // @DataMember(Order=15)
        /** @var ByteArray|null */
        public ?ByteArray $photo=null,

        // @DataMember(Order=16)
        /** @var string|null */
        public ?string $notes=null,

        // @DataMember(Order=17)
        /** @var int|null */
        public ?int $reportsTo=null,

        // @DataMember(Order=18)
        /** @var string|null */
        public ?string $photoPath=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['titleOfCourtesy'])) $this->titleOfCourtesy = $o['titleOfCourtesy'];
        if (isset($o['birthDate'])) $this->birthDate = $o['birthDate'];
        if (isset($o['hireDate'])) $this->hireDate = $o['hireDate'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['region'])) $this->region = $o['region'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['homePhone'])) $this->homePhone = $o['homePhone'];
        if (isset($o['extension'])) $this->extension = $o['extension'];
        if (isset($o['photo'])) $this->photo = JsonConverters::from('ByteArray', $o['photo']);
        if (isset($o['notes'])) $this->notes = $o['notes'];
        if (isset($o['reportsTo'])) $this->reportsTo = $o['reportsTo'];
        if (isset($o['photoPath'])) $this->photoPath = $o['photoPath'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->titleOfCourtesy)) $o['titleOfCourtesy'] = $this->titleOfCourtesy;
        if (isset($this->birthDate)) $o['birthDate'] = $this->birthDate;
        if (isset($this->hireDate)) $o['hireDate'] = $this->hireDate;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->region)) $o['region'] = $this->region;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->homePhone)) $o['homePhone'] = $this->homePhone;
        if (isset($this->extension)) $o['extension'] = $this->extension;
        if (isset($this->photo)) $o['photo'] = JsonConverters::to('ByteArray', $this->photo);
        if (isset($this->notes)) $o['notes'] = $this->notes;
        if (isset($this->reportsTo)) $o['reportsTo'] = $this->reportsTo;
        if (isset($this->photoPath)) $o['photoPath'] = $this->photoPath;
        return $o;
    }
    public function getTypeName(): string { return 'CreateEmployee'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/employeeterritories", "POST")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template ICreateDb of EmployeeTerritory
 */
class CreateEmployeeTerritory implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null,

        // @DataMember(Order=2)
        /** @var int */
        public int $employeeId=0,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $territoryId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['employeeId'])) $this->employeeId = $o['employeeId'];
        if (isset($o['territoryId'])) $this->territoryId = $o['territoryId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->employeeId)) $o['employeeId'] = $this->employeeId;
        if (isset($this->territoryId)) $o['territoryId'] = $this->territoryId;
        return $o;
    }
    public function getTypeName(): string { return 'CreateEmployeeTerritory'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/filesystemfiles", "POST")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template ICreateDb of FileSystemFile
 */
class CreateFileSystemFile implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $fileName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $filePath=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $contentType=null,

        // @DataMember(Order=5)
        /** @var int */
        public int $contentLength=0,

        // @DataMember(Order=6)
        /** @var int */
        public int $fileSystemItemId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['fileName'])) $this->fileName = $o['fileName'];
        if (isset($o['filePath'])) $this->filePath = $o['filePath'];
        if (isset($o['contentType'])) $this->contentType = $o['contentType'];
        if (isset($o['contentLength'])) $this->contentLength = $o['contentLength'];
        if (isset($o['fileSystemItemId'])) $this->fileSystemItemId = $o['fileSystemItemId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->fileName)) $o['fileName'] = $this->fileName;
        if (isset($this->filePath)) $o['filePath'] = $this->filePath;
        if (isset($this->contentType)) $o['contentType'] = $this->contentType;
        if (isset($this->contentLength)) $o['contentLength'] = $this->contentLength;
        if (isset($this->fileSystemItemId)) $o['fileSystemItemId'] = $this->fileSystemItemId;
        return $o;
    }
    public function getTypeName(): string { return 'CreateFileSystemFile'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/migrations", "POST")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Migration
 */
class CreateMigration implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $name=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $description=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $createdDate=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $completedDate=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $connectionString=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $namedConnection=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $log=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $errorCode=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $errorMessage=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $errorStackTrace=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['createdDate'])) $this->createdDate = $o['createdDate'];
        if (isset($o['completedDate'])) $this->completedDate = $o['completedDate'];
        if (isset($o['connectionString'])) $this->connectionString = $o['connectionString'];
        if (isset($o['namedConnection'])) $this->namedConnection = $o['namedConnection'];
        if (isset($o['log'])) $this->log = $o['log'];
        if (isset($o['errorCode'])) $this->errorCode = $o['errorCode'];
        if (isset($o['errorMessage'])) $this->errorMessage = $o['errorMessage'];
        if (isset($o['errorStackTrace'])) $this->errorStackTrace = $o['errorStackTrace'];
        if (isset($o['meta'])) $this->meta = $o['meta'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->createdDate)) $o['createdDate'] = $this->createdDate;
        if (isset($this->completedDate)) $o['completedDate'] = $this->completedDate;
        if (isset($this->connectionString)) $o['connectionString'] = $this->connectionString;
        if (isset($this->namedConnection)) $o['namedConnection'] = $this->namedConnection;
        if (isset($this->log)) $o['log'] = $this->log;
        if (isset($this->errorCode)) $o['errorCode'] = $this->errorCode;
        if (isset($this->errorMessage)) $o['errorMessage'] = $this->errorMessage;
        if (isset($this->errorStackTrace)) $o['errorStackTrace'] = $this->errorStackTrace;
        if (isset($this->meta)) $o['meta'] = $this->meta;
        return $o;
    }
    public function getTypeName(): string { return 'CreateMigration'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/orders", "POST")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Order
 */
class CreateOrder implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $customerId=null,

        // @DataMember(Order=3)
        /** @var int */
        public int $employeeId=0,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $orderDate=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $requiredDate=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $shippedDate=null,

        // @DataMember(Order=7)
        /** @var int|null */
        public ?int $shipVia=null,

        // @DataMember(Order=8)
        /** @var float */
        public float $freight=0.0,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $shipName=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $shipAddress=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $shipCity=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $shipRegion=null,

        // @DataMember(Order=13)
        /** @var string|null */
        public ?string $shipPostalCode=null,

        // @DataMember(Order=14)
        /** @var string|null */
        public ?string $shipCountry=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['customerId'])) $this->customerId = $o['customerId'];
        if (isset($o['employeeId'])) $this->employeeId = $o['employeeId'];
        if (isset($o['orderDate'])) $this->orderDate = $o['orderDate'];
        if (isset($o['requiredDate'])) $this->requiredDate = $o['requiredDate'];
        if (isset($o['shippedDate'])) $this->shippedDate = $o['shippedDate'];
        if (isset($o['shipVia'])) $this->shipVia = $o['shipVia'];
        if (isset($o['freight'])) $this->freight = $o['freight'];
        if (isset($o['shipName'])) $this->shipName = $o['shipName'];
        if (isset($o['shipAddress'])) $this->shipAddress = $o['shipAddress'];
        if (isset($o['shipCity'])) $this->shipCity = $o['shipCity'];
        if (isset($o['shipRegion'])) $this->shipRegion = $o['shipRegion'];
        if (isset($o['shipPostalCode'])) $this->shipPostalCode = $o['shipPostalCode'];
        if (isset($o['shipCountry'])) $this->shipCountry = $o['shipCountry'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->customerId)) $o['customerId'] = $this->customerId;
        if (isset($this->employeeId)) $o['employeeId'] = $this->employeeId;
        if (isset($this->orderDate)) $o['orderDate'] = $this->orderDate;
        if (isset($this->requiredDate)) $o['requiredDate'] = $this->requiredDate;
        if (isset($this->shippedDate)) $o['shippedDate'] = $this->shippedDate;
        if (isset($this->shipVia)) $o['shipVia'] = $this->shipVia;
        if (isset($this->freight)) $o['freight'] = $this->freight;
        if (isset($this->shipName)) $o['shipName'] = $this->shipName;
        if (isset($this->shipAddress)) $o['shipAddress'] = $this->shipAddress;
        if (isset($this->shipCity)) $o['shipCity'] = $this->shipCity;
        if (isset($this->shipRegion)) $o['shipRegion'] = $this->shipRegion;
        if (isset($this->shipPostalCode)) $o['shipPostalCode'] = $this->shipPostalCode;
        if (isset($this->shipCountry)) $o['shipCountry'] = $this->shipCountry;
        return $o;
    }
    public function getTypeName(): string { return 'CreateOrder'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/orderdetails", "POST")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template ICreateDb of OrderDetail
 */
class CreateOrderDetail implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null,

        // @DataMember(Order=2)
        /** @var int */
        public int $orderId=0,

        // @DataMember(Order=3)
        /** @var int */
        public int $productId=0,

        // @DataMember(Order=4)
        /** @var float */
        public float $unitPrice=0.0,

        // @DataMember(Order=5)
        /** @var int */
        public int $quantity=0,

        // @DataMember(Order=6)
        /** @var float */
        public float $discount=0.0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['orderId'])) $this->orderId = $o['orderId'];
        if (isset($o['productId'])) $this->productId = $o['productId'];
        if (isset($o['unitPrice'])) $this->unitPrice = $o['unitPrice'];
        if (isset($o['quantity'])) $this->quantity = $o['quantity'];
        if (isset($o['discount'])) $this->discount = $o['discount'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->orderId)) $o['orderId'] = $this->orderId;
        if (isset($this->productId)) $o['productId'] = $this->productId;
        if (isset($this->unitPrice)) $o['unitPrice'] = $this->unitPrice;
        if (isset($this->quantity)) $o['quantity'] = $this->quantity;
        if (isset($this->discount)) $o['discount'] = $this->discount;
        return $o;
    }
    public function getTypeName(): string { return 'CreateOrderDetail'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/products", "POST")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Product
 */
class CreateProduct implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $productName=null,

        // @DataMember(Order=3)
        /** @var int */
        public int $supplierId=0,

        // @DataMember(Order=4)
        /** @var int */
        public int $categoryId=0,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $quantityPerUnit=null,

        // @DataMember(Order=6)
        /** @var int */
        public int $unitPrice=0,

        // @DataMember(Order=7)
        /** @var int */
        public int $unitsInStock=0,

        // @DataMember(Order=8)
        /** @var int */
        public int $unitsOnOrder=0,

        // @DataMember(Order=9)
        /** @var int */
        public int $reorderLevel=0,

        // @DataMember(Order=10)
        /** @var int */
        public int $discontinued=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['productName'])) $this->productName = $o['productName'];
        if (isset($o['supplierId'])) $this->supplierId = $o['supplierId'];
        if (isset($o['categoryId'])) $this->categoryId = $o['categoryId'];
        if (isset($o['quantityPerUnit'])) $this->quantityPerUnit = $o['quantityPerUnit'];
        if (isset($o['unitPrice'])) $this->unitPrice = $o['unitPrice'];
        if (isset($o['unitsInStock'])) $this->unitsInStock = $o['unitsInStock'];
        if (isset($o['unitsOnOrder'])) $this->unitsOnOrder = $o['unitsOnOrder'];
        if (isset($o['reorderLevel'])) $this->reorderLevel = $o['reorderLevel'];
        if (isset($o['discontinued'])) $this->discontinued = $o['discontinued'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->productName)) $o['productName'] = $this->productName;
        if (isset($this->supplierId)) $o['supplierId'] = $this->supplierId;
        if (isset($this->categoryId)) $o['categoryId'] = $this->categoryId;
        if (isset($this->quantityPerUnit)) $o['quantityPerUnit'] = $this->quantityPerUnit;
        if (isset($this->unitPrice)) $o['unitPrice'] = $this->unitPrice;
        if (isset($this->unitsInStock)) $o['unitsInStock'] = $this->unitsInStock;
        if (isset($this->unitsOnOrder)) $o['unitsOnOrder'] = $this->unitsOnOrder;
        if (isset($this->reorderLevel)) $o['reorderLevel'] = $this->reorderLevel;
        if (isset($this->discontinued)) $o['discontinued'] = $this->discontinued;
        return $o;
    }
    public function getTypeName(): string { return 'CreateProduct'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/regions", "POST")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Region
 */
class CreateRegion implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $regionDescription=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['regionDescription'])) $this->regionDescription = $o['regionDescription'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->regionDescription)) $o['regionDescription'] = $this->regionDescription;
        return $o;
    }
    public function getTypeName(): string { return 'CreateRegion'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/shippers", "POST")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Shipper
 */
class CreateShipper implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $companyName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $phone=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['companyName'])) $this->companyName = $o['companyName'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->companyName)) $o['companyName'] = $this->companyName;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        return $o;
    }
    public function getTypeName(): string { return 'CreateShipper'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/suppliers", "POST")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Supplier
 */
class CreateSupplier implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $companyName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $contactName=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $contactTitle=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $address=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $city=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $region=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $postalCode=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $country=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $phone=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $fax=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $homePage=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['companyName'])) $this->companyName = $o['companyName'];
        if (isset($o['contactName'])) $this->contactName = $o['contactName'];
        if (isset($o['contactTitle'])) $this->contactTitle = $o['contactTitle'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['region'])) $this->region = $o['region'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['fax'])) $this->fax = $o['fax'];
        if (isset($o['homePage'])) $this->homePage = $o['homePage'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->companyName)) $o['companyName'] = $this->companyName;
        if (isset($this->contactName)) $o['contactName'] = $this->contactName;
        if (isset($this->contactTitle)) $o['contactTitle'] = $this->contactTitle;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->region)) $o['region'] = $this->region;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->fax)) $o['fax'] = $this->fax;
        if (isset($this->homePage)) $o['homePage'] = $this->homePage;
        return $o;
    }
    public function getTypeName(): string { return 'CreateSupplier'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/territories", "POST")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Territory
 */
class CreateTerritory implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $territoryDescription=null,

        // @DataMember(Order=3)
        /** @var int */
        public int $regionId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['territoryDescription'])) $this->territoryDescription = $o['territoryDescription'];
        if (isset($o['regionId'])) $this->regionId = $o['regionId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->territoryDescription)) $o['territoryDescription'] = $this->territoryDescription;
        if (isset($this->regionId)) $o['regionId'] = $this->regionId;
        return $o;
    }
    public function getTypeName(): string { return 'CreateTerritory'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/todos", "POST")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template ICreateDb of Todo
 */
class CreateTodo implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $text=null,

        // @DataMember(Order=3)
        /** @var int */
        public int $isFinished=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['text'])) $this->text = $o['text'];
        if (isset($o['isFinished'])) $this->isFinished = $o['isFinished'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->text)) $o['text'] = $this->text;
        if (isset($this->isFinished)) $o['isFinished'] = $this->isFinished;
        return $o;
    }
    public function getTypeName(): string { return 'CreateTodo'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/userauthroles", "POST")
// @ValidateRequest(Validator="IsAdmin")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template ICreateDb of UserAuthRole
 */
class CreateUserAuthRole implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=2)
        /** @var int */
        public int $userAuthId=0,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $role=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $permission=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $createdDate=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $modifiedDate=null,

        // @DataMember(Order=7)
        /** @var int|null */
        public ?int $refId=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $refIdStr=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['userAuthId'])) $this->userAuthId = $o['userAuthId'];
        if (isset($o['role'])) $this->role = $o['role'];
        if (isset($o['permission'])) $this->permission = $o['permission'];
        if (isset($o['createdDate'])) $this->createdDate = $o['createdDate'];
        if (isset($o['modifiedDate'])) $this->modifiedDate = $o['modifiedDate'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['refIdStr'])) $this->refIdStr = $o['refIdStr'];
        if (isset($o['meta'])) $this->meta = $o['meta'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->userAuthId)) $o['userAuthId'] = $this->userAuthId;
        if (isset($this->role)) $o['role'] = $this->role;
        if (isset($this->permission)) $o['permission'] = $this->permission;
        if (isset($this->createdDate)) $o['createdDate'] = $this->createdDate;
        if (isset($this->modifiedDate)) $o['modifiedDate'] = $this->modifiedDate;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->refIdStr)) $o['refIdStr'] = $this->refIdStr;
        if (isset($this->meta)) $o['meta'] = $this->meta;
        return $o;
    }
    public function getTypeName(): string { return 'CreateUserAuthRole'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/validationrules", "POST")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template ICreateDb of ValidationRule
 */
class CreateValidationRule implements IReturn, IPost, ICreateDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $type=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $field=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $createdBy=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $createdDate=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $modifiedBy=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $modifiedDate=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $suspendedBy=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $suspendedDate=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $notes=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $validator=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $condition=null,

        // @DataMember(Order=13)
        /** @var string|null */
        public ?string $errorCode=null,

        // @DataMember(Order=14)
        /** @var string|null */
        public ?string $message=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['type'])) $this->type = $o['type'];
        if (isset($o['field'])) $this->field = $o['field'];
        if (isset($o['createdBy'])) $this->createdBy = $o['createdBy'];
        if (isset($o['createdDate'])) $this->createdDate = $o['createdDate'];
        if (isset($o['modifiedBy'])) $this->modifiedBy = $o['modifiedBy'];
        if (isset($o['modifiedDate'])) $this->modifiedDate = $o['modifiedDate'];
        if (isset($o['suspendedBy'])) $this->suspendedBy = $o['suspendedBy'];
        if (isset($o['suspendedDate'])) $this->suspendedDate = $o['suspendedDate'];
        if (isset($o['notes'])) $this->notes = $o['notes'];
        if (isset($o['validator'])) $this->validator = $o['validator'];
        if (isset($o['condition'])) $this->condition = $o['condition'];
        if (isset($o['errorCode'])) $this->errorCode = $o['errorCode'];
        if (isset($o['message'])) $this->message = $o['message'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->type)) $o['type'] = $this->type;
        if (isset($this->field)) $o['field'] = $this->field;
        if (isset($this->createdBy)) $o['createdBy'] = $this->createdBy;
        if (isset($this->createdDate)) $o['createdDate'] = $this->createdDate;
        if (isset($this->modifiedBy)) $o['modifiedBy'] = $this->modifiedBy;
        if (isset($this->modifiedDate)) $o['modifiedDate'] = $this->modifiedDate;
        if (isset($this->suspendedBy)) $o['suspendedBy'] = $this->suspendedBy;
        if (isset($this->suspendedDate)) $o['suspendedDate'] = $this->suspendedDate;
        if (isset($this->notes)) $o['notes'] = $this->notes;
        if (isset($this->validator)) $o['validator'] = $this->validator;
        if (isset($this->condition)) $o['condition'] = $this->condition;
        if (isset($this->errorCode)) $o['errorCode'] = $this->errorCode;
        if (isset($this->message)) $o['message'] = $this->message;
        return $o;
    }
    public function getTypeName(): string { return 'CreateValidationRule'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/appusers/{Id}", "DELETE")
// @ValidateRequest(Validator="IsAdmin")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of AppUser
 */
class DeleteAppUser implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteAppUser'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/categories/{Id}", "DELETE")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Category
 */
class DeleteCategory implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteCategory'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/customers/{Id}", "DELETE")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Customer
 */
class DeleteCustomer implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteCustomer'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/employees/{Id}", "DELETE")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Employee
 */
class DeleteEmployee implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteEmployee'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/employeeterritories/{Id}", "DELETE")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of EmployeeTerritory
 */
class DeleteEmployeeTerritory implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteEmployeeTerritory'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/filesystemfiles/{Id}", "DELETE")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of FileSystemFile
 */
class DeleteFileSystemFile implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteFileSystemFile'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/filesystemitems/{Id}", "DELETE")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of FileSystemItem
 */
class DeleteFileSystemItem implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteFileSystemItem'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/migrations/{Id}", "DELETE")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Migration
 */
class DeleteMigration implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteMigration'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/orders/{Id}", "DELETE")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Order
 */
class DeleteOrder implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteOrder'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/orderdetails/{Id}", "DELETE")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of OrderDetail
 */
class DeleteOrderDetail implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteOrderDetail'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/products/{Id}", "DELETE")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Product
 */
class DeleteProduct implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteProduct'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/regions/{Id}", "DELETE")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Region
 */
class DeleteRegion implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteRegion'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/shippers/{Id}", "DELETE")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Shipper
 */
class DeleteShipper implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteShipper'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/suppliers/{Id}", "DELETE")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Supplier
 */
class DeleteSupplier implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteSupplier'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/territories/{Id}", "DELETE")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Territory
 */
class DeleteTerritory implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteTerritory'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/todos/{Id}", "DELETE")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of Todo
 */
class DeleteTodo implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteTodo'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/userauthroles/{Id}", "DELETE")
// @ValidateRequest(Validator="IsAdmin")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of UserAuthRole
 */
class DeleteUserAuthRole implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteUserAuthRole'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/validationrules/{Id}", "DELETE")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of ValidationRule
 */
class DeleteValidationRule implements IReturn, IDelete, IDeleteDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        return $o;
    }
    public function getTypeName(): string { return 'DeleteValidationRule'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/appusers/{Id}", "PATCH")
// @ValidateRequest(Validator="IsAdmin")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IPatchDb of AppUser
 */
class PatchAppUser implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $displayName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $email=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $profileUrl=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $department=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $title=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $jobArea=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $location=null,

        // @DataMember(Order=9)
        /** @var int */
        public int $salary=0,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $about=null,

        // @DataMember(Order=11)
        /** @var int */
        public int $isArchived=0,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $archivedDate=null,

        // @DataMember(Order=13)
        /** @var string|null */
        public ?string $lastLoginDate=null,

        // @DataMember(Order=14)
        /** @var string|null */
        public ?string $lastLoginIp=null,

        // @DataMember(Order=15)
        /** @var string|null */
        public ?string $userName=null,

        // @DataMember(Order=16)
        /** @var string|null */
        public ?string $primaryEmail=null,

        // @DataMember(Order=17)
        /** @var string|null */
        public ?string $firstName=null,

        // @DataMember(Order=18)
        /** @var string|null */
        public ?string $lastName=null,

        // @DataMember(Order=19)
        /** @var string|null */
        public ?string $company=null,

        // @DataMember(Order=20)
        /** @var string|null */
        public ?string $country=null,

        // @DataMember(Order=21)
        /** @var string|null */
        public ?string $phoneNumber=null,

        // @DataMember(Order=22)
        /** @var string|null */
        public ?string $birthDate=null,

        // @DataMember(Order=23)
        /** @var string|null */
        public ?string $birthDateRaw=null,

        // @DataMember(Order=24)
        /** @var string|null */
        public ?string $address=null,

        // @DataMember(Order=25)
        /** @var string|null */
        public ?string $address2=null,

        // @DataMember(Order=26)
        /** @var string|null */
        public ?string $city=null,

        // @DataMember(Order=27)
        /** @var string|null */
        public ?string $state=null,

        // @DataMember(Order=28)
        /** @var string|null */
        public ?string $culture=null,

        // @DataMember(Order=29)
        /** @var string|null */
        public ?string $fullName=null,

        // @DataMember(Order=30)
        /** @var string|null */
        public ?string $gender=null,

        // @DataMember(Order=31)
        /** @var string|null */
        public ?string $language=null,

        // @DataMember(Order=32)
        /** @var string|null */
        public ?string $mailAddress=null,

        // @DataMember(Order=33)
        /** @var string|null */
        public ?string $nickname=null,

        // @DataMember(Order=34)
        /** @var string|null */
        public ?string $postalCode=null,

        // @DataMember(Order=35)
        /** @var string|null */
        public ?string $timeZone=null,

        // @DataMember(Order=36)
        /** @var string|null */
        public ?string $salt=null,

        // @DataMember(Order=37)
        /** @var string|null */
        public ?string $passwordHash=null,

        // @DataMember(Order=38)
        /** @var string|null */
        public ?string $digestHa1Hash=null,

        // @DataMember(Order=39)
        /** @var string|null */
        public ?string $roles=null,

        // @DataMember(Order=40)
        /** @var string|null */
        public ?string $permissions=null,

        // @DataMember(Order=41)
        /** @var string|null */
        public ?string $createdDate=null,

        // @DataMember(Order=42)
        /** @var string|null */
        public ?string $modifiedDate=null,

        // @DataMember(Order=43)
        /** @var int */
        public int $invalidLoginAttempts=0,

        // @DataMember(Order=44)
        /** @var string|null */
        public ?string $lastLoginAttempt=null,

        // @DataMember(Order=45)
        /** @var string|null */
        public ?string $lockedDate=null,

        // @DataMember(Order=46)
        /** @var string|null */
        public ?string $recoveryToken=null,

        // @DataMember(Order=47)
        /** @var int|null */
        public ?int $refId=null,

        // @DataMember(Order=48)
        /** @var string|null */
        public ?string $refIdStr=null,

        // @DataMember(Order=49)
        /** @var string|null */
        public ?string $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['displayName'])) $this->displayName = $o['displayName'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['profileUrl'])) $this->profileUrl = $o['profileUrl'];
        if (isset($o['department'])) $this->department = $o['department'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['jobArea'])) $this->jobArea = $o['jobArea'];
        if (isset($o['location'])) $this->location = $o['location'];
        if (isset($o['salary'])) $this->salary = $o['salary'];
        if (isset($o['about'])) $this->about = $o['about'];
        if (isset($o['isArchived'])) $this->isArchived = $o['isArchived'];
        if (isset($o['archivedDate'])) $this->archivedDate = $o['archivedDate'];
        if (isset($o['lastLoginDate'])) $this->lastLoginDate = $o['lastLoginDate'];
        if (isset($o['lastLoginIp'])) $this->lastLoginIp = $o['lastLoginIp'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['primaryEmail'])) $this->primaryEmail = $o['primaryEmail'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['company'])) $this->company = $o['company'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['phoneNumber'])) $this->phoneNumber = $o['phoneNumber'];
        if (isset($o['birthDate'])) $this->birthDate = $o['birthDate'];
        if (isset($o['birthDateRaw'])) $this->birthDateRaw = $o['birthDateRaw'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['address2'])) $this->address2 = $o['address2'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['culture'])) $this->culture = $o['culture'];
        if (isset($o['fullName'])) $this->fullName = $o['fullName'];
        if (isset($o['gender'])) $this->gender = $o['gender'];
        if (isset($o['language'])) $this->language = $o['language'];
        if (isset($o['mailAddress'])) $this->mailAddress = $o['mailAddress'];
        if (isset($o['nickname'])) $this->nickname = $o['nickname'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['timeZone'])) $this->timeZone = $o['timeZone'];
        if (isset($o['salt'])) $this->salt = $o['salt'];
        if (isset($o['passwordHash'])) $this->passwordHash = $o['passwordHash'];
        if (isset($o['digestHa1Hash'])) $this->digestHa1Hash = $o['digestHa1Hash'];
        if (isset($o['roles'])) $this->roles = $o['roles'];
        if (isset($o['permissions'])) $this->permissions = $o['permissions'];
        if (isset($o['createdDate'])) $this->createdDate = $o['createdDate'];
        if (isset($o['modifiedDate'])) $this->modifiedDate = $o['modifiedDate'];
        if (isset($o['invalidLoginAttempts'])) $this->invalidLoginAttempts = $o['invalidLoginAttempts'];
        if (isset($o['lastLoginAttempt'])) $this->lastLoginAttempt = $o['lastLoginAttempt'];
        if (isset($o['lockedDate'])) $this->lockedDate = $o['lockedDate'];
        if (isset($o['recoveryToken'])) $this->recoveryToken = $o['recoveryToken'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['refIdStr'])) $this->refIdStr = $o['refIdStr'];
        if (isset($o['meta'])) $this->meta = $o['meta'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->displayName)) $o['displayName'] = $this->displayName;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->profileUrl)) $o['profileUrl'] = $this->profileUrl;
        if (isset($this->department)) $o['department'] = $this->department;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->jobArea)) $o['jobArea'] = $this->jobArea;
        if (isset($this->location)) $o['location'] = $this->location;
        if (isset($this->salary)) $o['salary'] = $this->salary;
        if (isset($this->about)) $o['about'] = $this->about;
        if (isset($this->isArchived)) $o['isArchived'] = $this->isArchived;
        if (isset($this->archivedDate)) $o['archivedDate'] = $this->archivedDate;
        if (isset($this->lastLoginDate)) $o['lastLoginDate'] = $this->lastLoginDate;
        if (isset($this->lastLoginIp)) $o['lastLoginIp'] = $this->lastLoginIp;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->primaryEmail)) $o['primaryEmail'] = $this->primaryEmail;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->company)) $o['company'] = $this->company;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->phoneNumber)) $o['phoneNumber'] = $this->phoneNumber;
        if (isset($this->birthDate)) $o['birthDate'] = $this->birthDate;
        if (isset($this->birthDateRaw)) $o['birthDateRaw'] = $this->birthDateRaw;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->address2)) $o['address2'] = $this->address2;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->culture)) $o['culture'] = $this->culture;
        if (isset($this->fullName)) $o['fullName'] = $this->fullName;
        if (isset($this->gender)) $o['gender'] = $this->gender;
        if (isset($this->language)) $o['language'] = $this->language;
        if (isset($this->mailAddress)) $o['mailAddress'] = $this->mailAddress;
        if (isset($this->nickname)) $o['nickname'] = $this->nickname;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->timeZone)) $o['timeZone'] = $this->timeZone;
        if (isset($this->salt)) $o['salt'] = $this->salt;
        if (isset($this->passwordHash)) $o['passwordHash'] = $this->passwordHash;
        if (isset($this->digestHa1Hash)) $o['digestHa1Hash'] = $this->digestHa1Hash;
        if (isset($this->roles)) $o['roles'] = $this->roles;
        if (isset($this->permissions)) $o['permissions'] = $this->permissions;
        if (isset($this->createdDate)) $o['createdDate'] = $this->createdDate;
        if (isset($this->modifiedDate)) $o['modifiedDate'] = $this->modifiedDate;
        if (isset($this->invalidLoginAttempts)) $o['invalidLoginAttempts'] = $this->invalidLoginAttempts;
        if (isset($this->lastLoginAttempt)) $o['lastLoginAttempt'] = $this->lastLoginAttempt;
        if (isset($this->lockedDate)) $o['lockedDate'] = $this->lockedDate;
        if (isset($this->recoveryToken)) $o['recoveryToken'] = $this->recoveryToken;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->refIdStr)) $o['refIdStr'] = $this->refIdStr;
        if (isset($this->meta)) $o['meta'] = $this->meta;
        return $o;
    }
    public function getTypeName(): string { return 'PatchAppUser'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/categories/{Id}", "PATCH")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Category
 */
class PatchCategory implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $categoryName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $description=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['categoryName'])) $this->categoryName = $o['categoryName'];
        if (isset($o['description'])) $this->description = $o['description'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->categoryName)) $o['categoryName'] = $this->categoryName;
        if (isset($this->description)) $o['description'] = $this->description;
        return $o;
    }
    public function getTypeName(): string { return 'PatchCategory'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/customers/{Id}", "PATCH")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Customer
 */
class PatchCustomer implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $companyName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $contactName=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $contactTitle=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $address=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $city=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $region=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $postalCode=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $country=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $phone=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $fax=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['companyName'])) $this->companyName = $o['companyName'];
        if (isset($o['contactName'])) $this->contactName = $o['contactName'];
        if (isset($o['contactTitle'])) $this->contactTitle = $o['contactTitle'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['region'])) $this->region = $o['region'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['phone'])) $this->phone = $o['phone'];
        if (isset($o['fax'])) $this->fax = $o['fax'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->companyName)) $o['companyName'] = $this->companyName;
        if (isset($this->contactName)) $o['contactName'] = $this->contactName;
        if (isset($this->contactTitle)) $o['contactTitle'] = $this->contactTitle;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->region)) $o['region'] = $this->region;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->phone)) $o['phone'] = $this->phone;
        if (isset($this->fax)) $o['fax'] = $this->fax;
        return $o;
    }
    public function getTypeName(): string { return 'PatchCustomer'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/employees/{Id}", "PATCH")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IPatchDb of Employee
 */
class PatchEmployee implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $lastName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $firstName=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $title=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $titleOfCourtesy=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $birthDate=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $hireDate=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $address=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $city=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $region=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $postalCode=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $country=null,

        // @DataMember(Order=13)
        /** @var string|null */
        public ?string $homePhone=null,

        // @DataMember(Order=14)
        /** @var string|null */
        public ?string $extension=null,

        // @DataMember(Order=15)
        /** @var ByteArray|null */
        public ?ByteArray $photo=null,

        // @DataMember(Order=16)
        /** @var string|null */
        public ?string $notes=null,

        // @DataMember(Order=17)
        /** @var int|null */
        public ?int $reportsTo=null,

        // @DataMember(Order=18)
        /** @var string|null */
        public ?string $photoPath=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['titleOfCourtesy'])) $this->titleOfCourtesy = $o['titleOfCourtesy'];
        if (isset($o['birthDate'])) $this->birthDate = $o['birthDate'];
        if (isset($o['hireDate'])) $this->hireDate = $o['hireDate'];
        if (isset($o['address'])) $this->address = $o['address'];
        if (isset($o['city'])) $this->city = $o['city'];
        if (isset($o['region'])) $this->region = $o['region'];
        if (isset($o['postalCode'])) $this->postalCode = $o['postalCode'];
        if (isset($o['country'])) $this->country = $o['country'];
        if (isset($o['homePhone'])) $this->homePhone = $o['homePhone'];
        if (isset($o['extension'])) $this->extension = $o['extension'];
        if (isset($o['photo'])) $this->photo = JsonConverters::from('ByteArray', $o['photo']);
        if (isset($o['notes'])) $this->notes = $o['notes'];
        if (isset($o['reportsTo'])) $this->reportsTo = $o['reportsTo'];
        if (isset($o['photoPath'])) $this->photoPath = $o['photoPath'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->titleOfCourtesy)) $o['titleOfCourtesy'] = $this->titleOfCourtesy;
        if (isset($this->birthDate)) $o['birthDate'] = $this->birthDate;
        if (isset($this->hireDate)) $o['hireDate'] = $this->hireDate;
        if (isset($this->address)) $o['address'] = $this->address;
        if (isset($this->city)) $o['city'] = $this->city;
        if (isset($this->region)) $o['region'] = $this->region;
        if (isset($this->postalCode)) $o['postalCode'] = $this->postalCode;
        if (isset($this->country)) $o['country'] = $this->country;
        if (isset($this->homePhone)) $o['homePhone'] = $this->homePhone;
        if (isset($this->extension)) $o['extension'] = $this->extension;
        if (isset($this->photo)) $o['photo'] = JsonConverters::to('ByteArray', $this->photo);
        if (isset($this->notes)) $o['notes'] = $this->notes;
        if (isset($this->reportsTo)) $o['reportsTo'] = $this->reportsTo;
        if (isset($this->photoPath)) $o['photoPath'] = $this->photoPath;
        return $o;
    }
    public function getTypeName(): string { return 'PatchEmployee'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/employeeterritories/{Id}", "PATCH")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IPatchDb of EmployeeTerritory
 */
class PatchEmployeeTerritory implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null,

        // @DataMember(Order=2)
        /** @var int */
        public int $employeeId=0,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $territoryId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['employeeId'])) $this->employeeId = $o['employeeId'];
        if (isset($o['territoryId'])) $this->territoryId = $o['territoryId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->employeeId)) $o['employeeId'] = $this->employeeId;
        if (isset($this->territoryId)) $o['territoryId'] = $this->territoryId;
        return $o;
    }
    public function getTypeName(): string { return 'PatchEmployeeTerritory'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/filesystemfiles/{Id}", "PATCH")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IPatchDb of FileSystemFile
 */
class PatchFileSystemFile implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $fileName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $filePath=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $contentType=null,

        // @DataMember(Order=5)
        /** @var int */
        public int $contentLength=0,

        // @DataMember(Order=6)
        /** @var int */
        public int $fileSystemItemId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['fileName'])) $this->fileName = $o['fileName'];
        if (isset($o['filePath'])) $this->filePath = $o['filePath'];
        if (isset($o['contentType'])) $this->contentType = $o['contentType'];
        if (isset($o['contentLength'])) $this->contentLength = $o['contentLength'];
        if (isset($o['fileSystemItemId'])) $this->fileSystemItemId = $o['fileSystemItemId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->fileName)) $o['fileName'] = $this->fileName;
        if (isset($this->filePath)) $o['filePath'] = $this->filePath;
        if (isset($this->contentType)) $o['contentType'] = $this->contentType;
        if (isset($this->contentLength)) $o['contentLength'] = $this->contentLength;
        if (isset($this->fileSystemItemId)) $o['fileSystemItemId'] = $this->fileSystemItemId;
        return $o;
    }
    public function getTypeName(): string { return 'PatchFileSystemFile'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

// @Route("/filesystemitems/{Id}", "PATCH")
// @DataContract
#[Returns('IdResponse')]
/**
 * @template IPatchDb of FileSystemItem
 */
class PatchFileSystemItem implements IReturn, IPatch, IPatchDb, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $id=0,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $fileAccessType=null,

        // @DataMember(Order=3)
        /** @var int */
        public int $appUserId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['fileAccessType'])) $this->fileAccessType = $o['fileAccessType'];
        if (isset($o['appUserId'])) $this->appUserId = $o['appUserId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->fileAccessType)) $o['fileAccessType'] = $this->fileAccessType;
        if (isset($this->appUserId)) $o['appUserId'] = $this->appUserId;
        return $o;
    }
    public function getTypeName(): string { return 'PatchFileSystemItem'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

