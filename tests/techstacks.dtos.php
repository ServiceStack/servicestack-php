<?php namespace dtos;
/* Options:
Date: 2023-10-13 10:22:22
Version: 6.111
Tip: To override a DTO option, remove "//" prefix before updating
BaseUrl: https://techstacks.io

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
use ServiceStack\{ResponseStatus,ResponseError,EmptyResponse,IdResponse,ArrayList,KeyValuePair2,StringResponse,StringsResponse,Tuple2,Tuple3,ByteArray};
use ServiceStack\{JsonConverters,Returns,TypeContext};


enum PostType : string
{
    case Announcement = 'Announcement';
    case Post = 'Post';
    case Showcase = 'Showcase';
    case Question = 'Question';
    case Request = 'Request';
}

class Post implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $organizationId=0,
        /** @var int */
        public int $userId=0,
        /** @var PostType|null */
        public ?PostType $type=null,
        /** @var int */
        public int $categoryId=0,
        /** @var string|null */
        public ?string $title=null,
        /** @var string|null */
        public ?string $slug=null,
        /** @var string|null */
        public ?string $url=null,
        /** @var string|null */
        public ?string $imageUrl=null,
        // @StringLength(2147483647)
        /** @var string|null */
        public ?string $content=null,

        // @StringLength(2147483647)
        /** @var string|null */
        public ?string $contentHtml=null,

        /** @var int|null */
        public ?int $pinCommentId=null,
        /** @var int[]|null */
        public ?array $technologyIds=null,
        /** @var DateTime|null */
        public ?DateTime $fromDate=null,
        /** @var DateTime|null */
        public ?DateTime $toDate=null,
        /** @var string|null */
        public ?string $location=null,
        /** @var string|null */
        public ?string $metaType=null,
        /** @var string|null */
        public ?string $meta=null,
        /** @var bool|null */
        public ?bool $approved=null,
        /** @var int */
        public int $upVotes=0,
        /** @var int */
        public int $downVotes=0,
        /** @var int */
        public int $points=0,
        /** @var int */
        public int $views=0,
        /** @var int */
        public int $favorites=0,
        /** @var int */
        public int $subscribers=0,
        /** @var int */
        public int $replyCount=0,
        /** @var int */
        public int $commentsCount=0,
        /** @var int */
        public int $wordCount=0,
        /** @var int */
        public int $reportCount=0,
        /** @var int */
        public int $linksCount=0,
        /** @var int */
        public int $linkedToCount=0,
        /** @var int */
        public int $score=0,
        /** @var int */
        public int $rank=0,
        /** @var string[]|null */
        public ?array $labels=null,
        /** @var int[]|null */
        public ?array $refUserIds=null,
        /** @var string[]|null */
        public ?array $refLinks=null,
        /** @var int[]|null */
        public ?array $muteUserIds=null,
        /** @var DateTime|null */
        public ?DateTime $lastCommentDate=null,
        /** @var int|null */
        public ?int $lastCommentId=null,
        /** @var int|null */
        public ?int $lastCommentUserId=null,
        /** @var DateTime|null */
        public ?DateTime $deleted=null,
        /** @var string|null */
        public ?string $deletedBy=null,
        /** @var DateTime|null */
        public ?DateTime $locked=null,
        /** @var string|null */
        public ?string $lockedBy=null,
        /** @var DateTime|null */
        public ?DateTime $hidden=null,
        /** @var string|null */
        public ?string $hiddenBy=null,
        /** @var string|null */
        public ?string $status=null,
        /** @var DateTime|null */
        public ?DateTime $statusDate=null,
        /** @var string|null */
        public ?string $statusBy=null,
        /** @var bool|null */
        public ?bool $archived=null,
        /** @var DateTime|null */
        public ?DateTime $bumped=null,
        /** @var DateTime */
        public DateTime $created=new DateTime(),
        /** @var string|null */
        public ?string $createdBy=null,
        /** @var DateTime */
        public DateTime $modified=new DateTime(),
        /** @var string|null */
        public ?string $modifiedBy=null,
        /** @var int|null */
        public ?int $refId=null,
        /** @var string|null */
        public ?string $refSource=null,
        /** @var string|null */
        public ?string $refUrn=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['userId'])) $this->userId = $o['userId'];
        if (isset($o['type'])) $this->type = JsonConverters::from('PostType', $o['type']);
        if (isset($o['categoryId'])) $this->categoryId = $o['categoryId'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['url'])) $this->url = $o['url'];
        if (isset($o['imageUrl'])) $this->imageUrl = $o['imageUrl'];
        if (isset($o['content'])) $this->content = $o['content'];
        if (isset($o['contentHtml'])) $this->contentHtml = $o['contentHtml'];
        if (isset($o['pinCommentId'])) $this->pinCommentId = $o['pinCommentId'];
        if (isset($o['technologyIds'])) $this->technologyIds = JsonConverters::fromArray('int', $o['technologyIds']);
        if (isset($o['fromDate'])) $this->fromDate = JsonConverters::from('DateTime', $o['fromDate']);
        if (isset($o['toDate'])) $this->toDate = JsonConverters::from('DateTime', $o['toDate']);
        if (isset($o['location'])) $this->location = $o['location'];
        if (isset($o['metaType'])) $this->metaType = $o['metaType'];
        if (isset($o['meta'])) $this->meta = $o['meta'];
        if (isset($o['approved'])) $this->approved = $o['approved'];
        if (isset($o['upVotes'])) $this->upVotes = $o['upVotes'];
        if (isset($o['downVotes'])) $this->downVotes = $o['downVotes'];
        if (isset($o['points'])) $this->points = $o['points'];
        if (isset($o['views'])) $this->views = $o['views'];
        if (isset($o['favorites'])) $this->favorites = $o['favorites'];
        if (isset($o['subscribers'])) $this->subscribers = $o['subscribers'];
        if (isset($o['replyCount'])) $this->replyCount = $o['replyCount'];
        if (isset($o['commentsCount'])) $this->commentsCount = $o['commentsCount'];
        if (isset($o['wordCount'])) $this->wordCount = $o['wordCount'];
        if (isset($o['reportCount'])) $this->reportCount = $o['reportCount'];
        if (isset($o['linksCount'])) $this->linksCount = $o['linksCount'];
        if (isset($o['linkedToCount'])) $this->linkedToCount = $o['linkedToCount'];
        if (isset($o['score'])) $this->score = $o['score'];
        if (isset($o['rank'])) $this->rank = $o['rank'];
        if (isset($o['labels'])) $this->labels = JsonConverters::fromArray('string', $o['labels']);
        if (isset($o['refUserIds'])) $this->refUserIds = JsonConverters::fromArray('int', $o['refUserIds']);
        if (isset($o['refLinks'])) $this->refLinks = JsonConverters::fromArray('string', $o['refLinks']);
        if (isset($o['muteUserIds'])) $this->muteUserIds = JsonConverters::fromArray('int', $o['muteUserIds']);
        if (isset($o['lastCommentDate'])) $this->lastCommentDate = JsonConverters::from('DateTime', $o['lastCommentDate']);
        if (isset($o['lastCommentId'])) $this->lastCommentId = $o['lastCommentId'];
        if (isset($o['lastCommentUserId'])) $this->lastCommentUserId = $o['lastCommentUserId'];
        if (isset($o['deleted'])) $this->deleted = JsonConverters::from('DateTime', $o['deleted']);
        if (isset($o['deletedBy'])) $this->deletedBy = $o['deletedBy'];
        if (isset($o['locked'])) $this->locked = JsonConverters::from('DateTime', $o['locked']);
        if (isset($o['lockedBy'])) $this->lockedBy = $o['lockedBy'];
        if (isset($o['hidden'])) $this->hidden = JsonConverters::from('DateTime', $o['hidden']);
        if (isset($o['hiddenBy'])) $this->hiddenBy = $o['hiddenBy'];
        if (isset($o['status'])) $this->status = $o['status'];
        if (isset($o['statusDate'])) $this->statusDate = JsonConverters::from('DateTime', $o['statusDate']);
        if (isset($o['statusBy'])) $this->statusBy = $o['statusBy'];
        if (isset($o['archived'])) $this->archived = $o['archived'];
        if (isset($o['bumped'])) $this->bumped = JsonConverters::from('DateTime', $o['bumped']);
        if (isset($o['created'])) $this->created = JsonConverters::from('DateTime', $o['created']);
        if (isset($o['createdBy'])) $this->createdBy = $o['createdBy'];
        if (isset($o['modified'])) $this->modified = JsonConverters::from('DateTime', $o['modified']);
        if (isset($o['modifiedBy'])) $this->modifiedBy = $o['modifiedBy'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['refSource'])) $this->refSource = $o['refSource'];
        if (isset($o['refUrn'])) $this->refUrn = $o['refUrn'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->userId)) $o['userId'] = $this->userId;
        if (isset($this->type)) $o['type'] = JsonConverters::to('PostType', $this->type);
        if (isset($this->categoryId)) $o['categoryId'] = $this->categoryId;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->url)) $o['url'] = $this->url;
        if (isset($this->imageUrl)) $o['imageUrl'] = $this->imageUrl;
        if (isset($this->content)) $o['content'] = $this->content;
        if (isset($this->contentHtml)) $o['contentHtml'] = $this->contentHtml;
        if (isset($this->pinCommentId)) $o['pinCommentId'] = $this->pinCommentId;
        if (isset($this->technologyIds)) $o['technologyIds'] = JsonConverters::toArray('int', $this->technologyIds);
        if (isset($this->fromDate)) $o['fromDate'] = JsonConverters::to('DateTime', $this->fromDate);
        if (isset($this->toDate)) $o['toDate'] = JsonConverters::to('DateTime', $this->toDate);
        if (isset($this->location)) $o['location'] = $this->location;
        if (isset($this->metaType)) $o['metaType'] = $this->metaType;
        if (isset($this->meta)) $o['meta'] = $this->meta;
        if (isset($this->approved)) $o['approved'] = $this->approved;
        if (isset($this->upVotes)) $o['upVotes'] = $this->upVotes;
        if (isset($this->downVotes)) $o['downVotes'] = $this->downVotes;
        if (isset($this->points)) $o['points'] = $this->points;
        if (isset($this->views)) $o['views'] = $this->views;
        if (isset($this->favorites)) $o['favorites'] = $this->favorites;
        if (isset($this->subscribers)) $o['subscribers'] = $this->subscribers;
        if (isset($this->replyCount)) $o['replyCount'] = $this->replyCount;
        if (isset($this->commentsCount)) $o['commentsCount'] = $this->commentsCount;
        if (isset($this->wordCount)) $o['wordCount'] = $this->wordCount;
        if (isset($this->reportCount)) $o['reportCount'] = $this->reportCount;
        if (isset($this->linksCount)) $o['linksCount'] = $this->linksCount;
        if (isset($this->linkedToCount)) $o['linkedToCount'] = $this->linkedToCount;
        if (isset($this->score)) $o['score'] = $this->score;
        if (isset($this->rank)) $o['rank'] = $this->rank;
        if (isset($this->labels)) $o['labels'] = JsonConverters::toArray('string', $this->labels);
        if (isset($this->refUserIds)) $o['refUserIds'] = JsonConverters::toArray('int', $this->refUserIds);
        if (isset($this->refLinks)) $o['refLinks'] = JsonConverters::toArray('string', $this->refLinks);
        if (isset($this->muteUserIds)) $o['muteUserIds'] = JsonConverters::toArray('int', $this->muteUserIds);
        if (isset($this->lastCommentDate)) $o['lastCommentDate'] = JsonConverters::to('DateTime', $this->lastCommentDate);
        if (isset($this->lastCommentId)) $o['lastCommentId'] = $this->lastCommentId;
        if (isset($this->lastCommentUserId)) $o['lastCommentUserId'] = $this->lastCommentUserId;
        if (isset($this->deleted)) $o['deleted'] = JsonConverters::to('DateTime', $this->deleted);
        if (isset($this->deletedBy)) $o['deletedBy'] = $this->deletedBy;
        if (isset($this->locked)) $o['locked'] = JsonConverters::to('DateTime', $this->locked);
        if (isset($this->lockedBy)) $o['lockedBy'] = $this->lockedBy;
        if (isset($this->hidden)) $o['hidden'] = JsonConverters::to('DateTime', $this->hidden);
        if (isset($this->hiddenBy)) $o['hiddenBy'] = $this->hiddenBy;
        if (isset($this->status)) $o['status'] = $this->status;
        if (isset($this->statusDate)) $o['statusDate'] = JsonConverters::to('DateTime', $this->statusDate);
        if (isset($this->statusBy)) $o['statusBy'] = $this->statusBy;
        if (isset($this->archived)) $o['archived'] = $this->archived;
        if (isset($this->bumped)) $o['bumped'] = JsonConverters::to('DateTime', $this->bumped);
        if (isset($this->created)) $o['created'] = JsonConverters::to('DateTime', $this->created);
        if (isset($this->createdBy)) $o['createdBy'] = $this->createdBy;
        if (isset($this->modified)) $o['modified'] = JsonConverters::to('DateTime', $this->modified);
        if (isset($this->modifiedBy)) $o['modifiedBy'] = $this->modifiedBy;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->refSource)) $o['refSource'] = $this->refSource;
        if (isset($this->refUrn)) $o['refUrn'] = $this->refUrn;
        return empty($o) ? new class(){} : $o;
    }
}

enum ReportAction : string
{
    case Dismiss = 'Dismiss';
    case Delete = 'Delete';
}

enum FlagType : string
{
    case Violation = 'Violation';
    case Spam = 'Spam';
    case Abusive = 'Abusive';
    case Confidential = 'Confidential';
    case OffTopic = 'OffTopic';
    case Other = 'Other';
}

enum Frequency : int
{
    case Daily = 1;
    case Weekly = 7;
    case Monthly = 30;
    case Quarterly = 90;
}

enum TechnologyTier : string
{
    case ProgrammingLanguage = 'ProgrammingLanguage';
    case Client = 'Client';
    case Http = 'Http';
    case Server = 'Server';
    case Data = 'Data';
    case SoftwareInfrastructure = 'SoftwareInfrastructure';
    case OperatingSystem = 'OperatingSystem';
    case HardwareInfrastructure = 'HardwareInfrastructure';
    case ThirdPartyServices = 'ThirdPartyServices';
}

class TechnologyBase implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $vendorName=null,
        /** @var string|null */
        public ?string $vendorUrl=null,
        /** @var string|null */
        public ?string $productUrl=null,
        /** @var string|null */
        public ?string $logoUrl=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var DateTime */
        public DateTime $created=new DateTime(),
        /** @var string|null */
        public ?string $createdBy=null,
        /** @var DateTime */
        public DateTime $lastModified=new DateTime(),
        /** @var string|null */
        public ?string $lastModifiedBy=null,
        /** @var string|null */
        public ?string $ownerId=null,
        /** @var string|null */
        public ?string $slug=null,
        /** @var bool|null */
        public ?bool $logoApproved=null,
        /** @var bool|null */
        public ?bool $isLocked=null,
        /** @var TechnologyTier|null */
        public ?TechnologyTier $tier=null,
        /** @var DateTime|null */
        public ?DateTime $lastStatusUpdate=null,
        /** @var int|null */
        public ?int $organizationId=null,
        /** @var int|null */
        public ?int $commentsPostId=null,
        /** @var int */
        public int $viewCount=0,
        /** @var int */
        public int $favCount=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['vendorName'])) $this->vendorName = $o['vendorName'];
        if (isset($o['vendorUrl'])) $this->vendorUrl = $o['vendorUrl'];
        if (isset($o['productUrl'])) $this->productUrl = $o['productUrl'];
        if (isset($o['logoUrl'])) $this->logoUrl = $o['logoUrl'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['created'])) $this->created = JsonConverters::from('DateTime', $o['created']);
        if (isset($o['createdBy'])) $this->createdBy = $o['createdBy'];
        if (isset($o['lastModified'])) $this->lastModified = JsonConverters::from('DateTime', $o['lastModified']);
        if (isset($o['lastModifiedBy'])) $this->lastModifiedBy = $o['lastModifiedBy'];
        if (isset($o['ownerId'])) $this->ownerId = $o['ownerId'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['logoApproved'])) $this->logoApproved = $o['logoApproved'];
        if (isset($o['isLocked'])) $this->isLocked = $o['isLocked'];
        if (isset($o['tier'])) $this->tier = JsonConverters::from('TechnologyTier', $o['tier']);
        if (isset($o['lastStatusUpdate'])) $this->lastStatusUpdate = JsonConverters::from('DateTime', $o['lastStatusUpdate']);
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['commentsPostId'])) $this->commentsPostId = $o['commentsPostId'];
        if (isset($o['viewCount'])) $this->viewCount = $o['viewCount'];
        if (isset($o['favCount'])) $this->favCount = $o['favCount'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->vendorName)) $o['vendorName'] = $this->vendorName;
        if (isset($this->vendorUrl)) $o['vendorUrl'] = $this->vendorUrl;
        if (isset($this->productUrl)) $o['productUrl'] = $this->productUrl;
        if (isset($this->logoUrl)) $o['logoUrl'] = $this->logoUrl;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->created)) $o['created'] = JsonConverters::to('DateTime', $this->created);
        if (isset($this->createdBy)) $o['createdBy'] = $this->createdBy;
        if (isset($this->lastModified)) $o['lastModified'] = JsonConverters::to('DateTime', $this->lastModified);
        if (isset($this->lastModifiedBy)) $o['lastModifiedBy'] = $this->lastModifiedBy;
        if (isset($this->ownerId)) $o['ownerId'] = $this->ownerId;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->logoApproved)) $o['logoApproved'] = $this->logoApproved;
        if (isset($this->isLocked)) $o['isLocked'] = $this->isLocked;
        if (isset($this->tier)) $o['tier'] = JsonConverters::to('TechnologyTier', $this->tier);
        if (isset($this->lastStatusUpdate)) $o['lastStatusUpdate'] = JsonConverters::to('DateTime', $this->lastStatusUpdate);
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->commentsPostId)) $o['commentsPostId'] = $this->commentsPostId;
        if (isset($this->viewCount)) $o['viewCount'] = $this->viewCount;
        if (isset($this->favCount)) $o['favCount'] = $this->favCount;
        return empty($o) ? new class(){} : $o;
    }
}

class Technology extends TechnologyBase implements JsonSerializable
{
    /**
     * @param int $id
     * @param string|null $name
     * @param string|null $vendorName
     * @param string|null $vendorUrl
     * @param string|null $productUrl
     * @param string|null $logoUrl
     * @param string|null $description
     * @param DateTime $created
     * @param string|null $createdBy
     * @param DateTime $lastModified
     * @param string|null $lastModifiedBy
     * @param string|null $ownerId
     * @param string|null $slug
     * @param bool|null $logoApproved
     * @param bool|null $isLocked
     * @param TechnologyTier|null $tier
     * @param DateTime|null $lastStatusUpdate
     * @param int|null $organizationId
     * @param int|null $commentsPostId
     * @param int $viewCount
     * @param int $favCount
     */
    public function __construct(
        int $id=0,
        string $name=null,
        string $vendorName=null,
        string $vendorUrl=null,
        string $productUrl=null,
        string $logoUrl=null,
        string $description=null,
        DateTime $created=new DateTime(),
        string $createdBy=null,
        DateTime $lastModified=new DateTime(),
        string $lastModifiedBy=null,
        string $ownerId=null,
        string $slug=null,
        bool $logoApproved=null,
        bool $isLocked=null,
        TechnologyTier $tier=null,
        DateTime $lastStatusUpdate=null,
        int $organizationId=null,
        int $commentsPostId=null,
        int $viewCount=0,
        int $favCount=0
    ) {
        parent::__construct($id,$name,$vendorName,$vendorUrl,$productUrl,$logoUrl,$description,$created,$createdBy,$lastModified,$lastModifiedBy,$ownerId,$slug,$logoApproved,$isLocked,$tier,$lastStatusUpdate,$organizationId,$commentsPostId,$viewCount,$favCount);
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
}

class TechnologyView implements JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $id=null,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $vendorName=null,
        /** @var string|null */
        public ?string $vendorUrl=null,
        /** @var string|null */
        public ?string $productUrl=null,
        /** @var string|null */
        public ?string $logoUrl=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var DateTime|null */
        public ?DateTime $created=null,
        /** @var string|null */
        public ?string $createdBy=null,
        /** @var DateTime|null */
        public ?DateTime $lastModified=null,
        /** @var string|null */
        public ?string $lastModifiedBy=null,
        /** @var string|null */
        public ?string $ownerId=null,
        /** @var string|null */
        public ?string $slug=null,
        /** @var bool|null */
        public ?bool $logoApproved=null,
        /** @var bool|null */
        public ?bool $isLocked=null,
        /** @var TechnologyTier|null */
        public ?TechnologyTier $tier=null,
        /** @var DateTime|null */
        public ?DateTime $lastStatusUpdate=null,
        /** @var int|null */
        public ?int $organizationId=null,
        /** @var int|null */
        public ?int $commentsPostId=null,
        /** @var int|null */
        public ?int $viewCount=null,
        /** @var int|null */
        public ?int $favCount=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['vendorName'])) $this->vendorName = $o['vendorName'];
        if (isset($o['vendorUrl'])) $this->vendorUrl = $o['vendorUrl'];
        if (isset($o['productUrl'])) $this->productUrl = $o['productUrl'];
        if (isset($o['logoUrl'])) $this->logoUrl = $o['logoUrl'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['created'])) $this->created = JsonConverters::from('DateTime', $o['created']);
        if (isset($o['createdBy'])) $this->createdBy = $o['createdBy'];
        if (isset($o['lastModified'])) $this->lastModified = JsonConverters::from('DateTime', $o['lastModified']);
        if (isset($o['lastModifiedBy'])) $this->lastModifiedBy = $o['lastModifiedBy'];
        if (isset($o['ownerId'])) $this->ownerId = $o['ownerId'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['logoApproved'])) $this->logoApproved = $o['logoApproved'];
        if (isset($o['isLocked'])) $this->isLocked = $o['isLocked'];
        if (isset($o['tier'])) $this->tier = JsonConverters::from('TechnologyTier', $o['tier']);
        if (isset($o['lastStatusUpdate'])) $this->lastStatusUpdate = JsonConverters::from('DateTime', $o['lastStatusUpdate']);
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['commentsPostId'])) $this->commentsPostId = $o['commentsPostId'];
        if (isset($o['viewCount'])) $this->viewCount = $o['viewCount'];
        if (isset($o['favCount'])) $this->favCount = $o['favCount'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->vendorName)) $o['vendorName'] = $this->vendorName;
        if (isset($this->vendorUrl)) $o['vendorUrl'] = $this->vendorUrl;
        if (isset($this->productUrl)) $o['productUrl'] = $this->productUrl;
        if (isset($this->logoUrl)) $o['logoUrl'] = $this->logoUrl;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->created)) $o['created'] = JsonConverters::to('DateTime', $this->created);
        if (isset($this->createdBy)) $o['createdBy'] = $this->createdBy;
        if (isset($this->lastModified)) $o['lastModified'] = JsonConverters::to('DateTime', $this->lastModified);
        if (isset($this->lastModifiedBy)) $o['lastModifiedBy'] = $this->lastModifiedBy;
        if (isset($this->ownerId)) $o['ownerId'] = $this->ownerId;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->logoApproved)) $o['logoApproved'] = $this->logoApproved;
        if (isset($this->isLocked)) $o['isLocked'] = $this->isLocked;
        if (isset($this->tier)) $o['tier'] = JsonConverters::to('TechnologyTier', $this->tier);
        if (isset($this->lastStatusUpdate)) $o['lastStatusUpdate'] = JsonConverters::to('DateTime', $this->lastStatusUpdate);
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->commentsPostId)) $o['commentsPostId'] = $this->commentsPostId;
        if (isset($this->viewCount)) $o['viewCount'] = $this->viewCount;
        if (isset($this->favCount)) $o['favCount'] = $this->favCount;
        return empty($o) ? new class(){} : $o;
    }
}

interface IRegisterStats
{
}

class TechnologyStackBase implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $vendorName=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var string|null */
        public ?string $appUrl=null,
        /** @var string|null */
        public ?string $screenshotUrl=null,
        /** @var DateTime */
        public DateTime $created=new DateTime(),
        /** @var string|null */
        public ?string $createdBy=null,
        /** @var DateTime */
        public DateTime $lastModified=new DateTime(),
        /** @var string|null */
        public ?string $lastModifiedBy=null,
        /** @var bool|null */
        public ?bool $isLocked=null,
        /** @var string|null */
        public ?string $ownerId=null,
        /** @var string|null */
        public ?string $slug=null,
        // @StringLength(2147483647)
        /** @var string|null */
        public ?string $details=null,

        // @StringLength(2147483647)
        /** @var string|null */
        public ?string $detailsHtml=null,

        /** @var DateTime|null */
        public ?DateTime $lastStatusUpdate=null,
        /** @var int|null */
        public ?int $organizationId=null,
        /** @var int|null */
        public ?int $commentsPostId=null,
        /** @var int */
        public int $viewCount=0,
        /** @var int */
        public int $favCount=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['vendorName'])) $this->vendorName = $o['vendorName'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['appUrl'])) $this->appUrl = $o['appUrl'];
        if (isset($o['screenshotUrl'])) $this->screenshotUrl = $o['screenshotUrl'];
        if (isset($o['created'])) $this->created = JsonConverters::from('DateTime', $o['created']);
        if (isset($o['createdBy'])) $this->createdBy = $o['createdBy'];
        if (isset($o['lastModified'])) $this->lastModified = JsonConverters::from('DateTime', $o['lastModified']);
        if (isset($o['lastModifiedBy'])) $this->lastModifiedBy = $o['lastModifiedBy'];
        if (isset($o['isLocked'])) $this->isLocked = $o['isLocked'];
        if (isset($o['ownerId'])) $this->ownerId = $o['ownerId'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['details'])) $this->details = $o['details'];
        if (isset($o['detailsHtml'])) $this->detailsHtml = $o['detailsHtml'];
        if (isset($o['lastStatusUpdate'])) $this->lastStatusUpdate = JsonConverters::from('DateTime', $o['lastStatusUpdate']);
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['commentsPostId'])) $this->commentsPostId = $o['commentsPostId'];
        if (isset($o['viewCount'])) $this->viewCount = $o['viewCount'];
        if (isset($o['favCount'])) $this->favCount = $o['favCount'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->vendorName)) $o['vendorName'] = $this->vendorName;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->appUrl)) $o['appUrl'] = $this->appUrl;
        if (isset($this->screenshotUrl)) $o['screenshotUrl'] = $this->screenshotUrl;
        if (isset($this->created)) $o['created'] = JsonConverters::to('DateTime', $this->created);
        if (isset($this->createdBy)) $o['createdBy'] = $this->createdBy;
        if (isset($this->lastModified)) $o['lastModified'] = JsonConverters::to('DateTime', $this->lastModified);
        if (isset($this->lastModifiedBy)) $o['lastModifiedBy'] = $this->lastModifiedBy;
        if (isset($this->isLocked)) $o['isLocked'] = $this->isLocked;
        if (isset($this->ownerId)) $o['ownerId'] = $this->ownerId;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->details)) $o['details'] = $this->details;
        if (isset($this->detailsHtml)) $o['detailsHtml'] = $this->detailsHtml;
        if (isset($this->lastStatusUpdate)) $o['lastStatusUpdate'] = JsonConverters::to('DateTime', $this->lastStatusUpdate);
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->commentsPostId)) $o['commentsPostId'] = $this->commentsPostId;
        if (isset($this->viewCount)) $o['viewCount'] = $this->viewCount;
        if (isset($this->favCount)) $o['favCount'] = $this->favCount;
        return empty($o) ? new class(){} : $o;
    }
}

class TechnologyStack extends TechnologyStackBase implements JsonSerializable
{
    /**
     * @param int $id
     * @param string|null $name
     * @param string|null $vendorName
     * @param string|null $description
     * @param string|null $appUrl
     * @param string|null $screenshotUrl
     * @param DateTime $created
     * @param string|null $createdBy
     * @param DateTime $lastModified
     * @param string|null $lastModifiedBy
     * @param bool|null $isLocked
     * @param string|null $ownerId
     * @param string|null $slug
     * @param string|null $details
     * @param string|null $detailsHtml
     * @param DateTime|null $lastStatusUpdate
     * @param int|null $organizationId
     * @param int|null $commentsPostId
     * @param int $viewCount
     * @param int $favCount
     */
    public function __construct(
        int $id=0,
        string $name=null,
        string $vendorName=null,
        string $description=null,
        string $appUrl=null,
        string $screenshotUrl=null,
        DateTime $created=new DateTime(),
        string $createdBy=null,
        DateTime $lastModified=new DateTime(),
        string $lastModifiedBy=null,
        bool $isLocked=null,
        string $ownerId=null,
        string $slug=null,
        string $details=null,
        string $detailsHtml=null,
        DateTime $lastStatusUpdate=null,
        int $organizationId=null,
        int $commentsPostId=null,
        int $viewCount=0,
        int $favCount=0
    ) {
        parent::__construct($id,$name,$vendorName,$description,$appUrl,$screenshotUrl,$created,$createdBy,$lastModified,$lastModifiedBy,$isLocked,$ownerId,$slug,$details,$detailsHtml,$lastStatusUpdate,$organizationId,$commentsPostId,$viewCount,$favCount);
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
}

class TechnologyStackView implements JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $id=null,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $vendorName=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var string|null */
        public ?string $appUrl=null,
        /** @var string|null */
        public ?string $screenshotUrl=null,
        /** @var DateTime|null */
        public ?DateTime $created=null,
        /** @var string|null */
        public ?string $createdBy=null,
        /** @var DateTime|null */
        public ?DateTime $lastModified=null,
        /** @var string|null */
        public ?string $lastModifiedBy=null,
        /** @var bool|null */
        public ?bool $isLocked=null,
        /** @var string|null */
        public ?string $ownerId=null,
        /** @var string|null */
        public ?string $slug=null,
        /** @var string|null */
        public ?string $details=null,
        /** @var string|null */
        public ?string $detailsHtml=null,
        /** @var DateTime|null */
        public ?DateTime $lastStatusUpdate=null,
        /** @var int|null */
        public ?int $organizationId=null,
        /** @var int|null */
        public ?int $commentsPostId=null,
        /** @var int|null */
        public ?int $viewCount=null,
        /** @var int|null */
        public ?int $favCount=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['vendorName'])) $this->vendorName = $o['vendorName'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['appUrl'])) $this->appUrl = $o['appUrl'];
        if (isset($o['screenshotUrl'])) $this->screenshotUrl = $o['screenshotUrl'];
        if (isset($o['created'])) $this->created = JsonConverters::from('DateTime', $o['created']);
        if (isset($o['createdBy'])) $this->createdBy = $o['createdBy'];
        if (isset($o['lastModified'])) $this->lastModified = JsonConverters::from('DateTime', $o['lastModified']);
        if (isset($o['lastModifiedBy'])) $this->lastModifiedBy = $o['lastModifiedBy'];
        if (isset($o['isLocked'])) $this->isLocked = $o['isLocked'];
        if (isset($o['ownerId'])) $this->ownerId = $o['ownerId'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['details'])) $this->details = $o['details'];
        if (isset($o['detailsHtml'])) $this->detailsHtml = $o['detailsHtml'];
        if (isset($o['lastStatusUpdate'])) $this->lastStatusUpdate = JsonConverters::from('DateTime', $o['lastStatusUpdate']);
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['commentsPostId'])) $this->commentsPostId = $o['commentsPostId'];
        if (isset($o['viewCount'])) $this->viewCount = $o['viewCount'];
        if (isset($o['favCount'])) $this->favCount = $o['favCount'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->vendorName)) $o['vendorName'] = $this->vendorName;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->appUrl)) $o['appUrl'] = $this->appUrl;
        if (isset($this->screenshotUrl)) $o['screenshotUrl'] = $this->screenshotUrl;
        if (isset($this->created)) $o['created'] = JsonConverters::to('DateTime', $this->created);
        if (isset($this->createdBy)) $o['createdBy'] = $this->createdBy;
        if (isset($this->lastModified)) $o['lastModified'] = JsonConverters::to('DateTime', $this->lastModified);
        if (isset($this->lastModifiedBy)) $o['lastModifiedBy'] = $this->lastModifiedBy;
        if (isset($this->isLocked)) $o['isLocked'] = $this->isLocked;
        if (isset($this->ownerId)) $o['ownerId'] = $this->ownerId;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->details)) $o['details'] = $this->details;
        if (isset($this->detailsHtml)) $o['detailsHtml'] = $this->detailsHtml;
        if (isset($this->lastStatusUpdate)) $o['lastStatusUpdate'] = JsonConverters::to('DateTime', $this->lastStatusUpdate);
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->commentsPostId)) $o['commentsPostId'] = $this->commentsPostId;
        if (isset($this->viewCount)) $o['viewCount'] = $this->viewCount;
        if (isset($this->favCount)) $o['favCount'] = $this->favCount;
        return empty($o) ? new class(){} : $o;
    }
}

class UserVoiceUser implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $email=null,
        /** @var string|null */
        public ?string $avatarUrl=null,
        /** @var DateTime */
        public DateTime $createdAt=new DateTime(),
        /** @var DateTime */
        public DateTime $updatedAt=new DateTime()
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['avatarUrl'])) $this->avatarUrl = $o['avatarUrl'];
        if (isset($o['createdAt'])) $this->createdAt = JsonConverters::from('DateTime', $o['createdAt']);
        if (isset($o['updatedAt'])) $this->updatedAt = JsonConverters::from('DateTime', $o['updatedAt']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->avatarUrl)) $o['avatarUrl'] = $this->avatarUrl;
        if (isset($this->createdAt)) $o['createdAt'] = JsonConverters::to('DateTime', $this->createdAt);
        if (isset($this->updatedAt)) $o['updatedAt'] = JsonConverters::to('DateTime', $this->updatedAt);
        return empty($o) ? new class(){} : $o;
    }
}

class UserVoiceComment implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $text=null,
        /** @var string|null */
        public ?string $formattedText=null,
        /** @var DateTime */
        public DateTime $createdAt=new DateTime(),
        /** @var UserVoiceUser|null */
        public ?UserVoiceUser $creator=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['text'])) $this->text = $o['text'];
        if (isset($o['formattedText'])) $this->formattedText = $o['formattedText'];
        if (isset($o['createdAt'])) $this->createdAt = JsonConverters::from('DateTime', $o['createdAt']);
        if (isset($o['creator'])) $this->creator = JsonConverters::from('UserVoiceUser', $o['creator']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->text)) $o['text'] = $this->text;
        if (isset($this->formattedText)) $o['formattedText'] = $this->formattedText;
        if (isset($this->createdAt)) $o['createdAt'] = JsonConverters::to('DateTime', $this->createdAt);
        if (isset($this->creator)) $o['creator'] = JsonConverters::to('UserVoiceUser', $this->creator);
        return empty($o) ? new class(){} : $o;
    }
}

class PostComment implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $postId=0,
        /** @var int */
        public int $userId=0,
        /** @var int|null */
        public ?int $replyId=null,
        // @StringLength(2147483647)
        /** @var string|null */
        public ?string $content=null,

        // @StringLength(2147483647)
        /** @var string|null */
        public ?string $contentHtml=null,

        /** @var int */
        public int $score=0,
        /** @var int */
        public int $rank=0,
        /** @var int */
        public int $upVotes=0,
        /** @var int */
        public int $downVotes=0,
        /** @var int */
        public int $favorites=0,
        /** @var int */
        public int $wordCount=0,
        /** @var int */
        public int $reportCount=0,
        /** @var DateTime|null */
        public ?DateTime $deleted=null,
        /** @var DateTime|null */
        public ?DateTime $hidden=null,
        /** @var DateTime */
        public DateTime $modified=new DateTime(),
        /** @var DateTime */
        public DateTime $created=new DateTime(),
        /** @var string|null */
        public ?string $createdBy=null,
        /** @var int|null */
        public ?int $refId=null,
        /** @var string|null */
        public ?string $refSource=null,
        /** @var string|null */
        public ?string $refUrn=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['postId'])) $this->postId = $o['postId'];
        if (isset($o['userId'])) $this->userId = $o['userId'];
        if (isset($o['replyId'])) $this->replyId = $o['replyId'];
        if (isset($o['content'])) $this->content = $o['content'];
        if (isset($o['contentHtml'])) $this->contentHtml = $o['contentHtml'];
        if (isset($o['score'])) $this->score = $o['score'];
        if (isset($o['rank'])) $this->rank = $o['rank'];
        if (isset($o['upVotes'])) $this->upVotes = $o['upVotes'];
        if (isset($o['downVotes'])) $this->downVotes = $o['downVotes'];
        if (isset($o['favorites'])) $this->favorites = $o['favorites'];
        if (isset($o['wordCount'])) $this->wordCount = $o['wordCount'];
        if (isset($o['reportCount'])) $this->reportCount = $o['reportCount'];
        if (isset($o['deleted'])) $this->deleted = JsonConverters::from('DateTime', $o['deleted']);
        if (isset($o['hidden'])) $this->hidden = JsonConverters::from('DateTime', $o['hidden']);
        if (isset($o['modified'])) $this->modified = JsonConverters::from('DateTime', $o['modified']);
        if (isset($o['created'])) $this->created = JsonConverters::from('DateTime', $o['created']);
        if (isset($o['createdBy'])) $this->createdBy = $o['createdBy'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['refSource'])) $this->refSource = $o['refSource'];
        if (isset($o['refUrn'])) $this->refUrn = $o['refUrn'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->postId)) $o['postId'] = $this->postId;
        if (isset($this->userId)) $o['userId'] = $this->userId;
        if (isset($this->replyId)) $o['replyId'] = $this->replyId;
        if (isset($this->content)) $o['content'] = $this->content;
        if (isset($this->contentHtml)) $o['contentHtml'] = $this->contentHtml;
        if (isset($this->score)) $o['score'] = $this->score;
        if (isset($this->rank)) $o['rank'] = $this->rank;
        if (isset($this->upVotes)) $o['upVotes'] = $this->upVotes;
        if (isset($this->downVotes)) $o['downVotes'] = $this->downVotes;
        if (isset($this->favorites)) $o['favorites'] = $this->favorites;
        if (isset($this->wordCount)) $o['wordCount'] = $this->wordCount;
        if (isset($this->reportCount)) $o['reportCount'] = $this->reportCount;
        if (isset($this->deleted)) $o['deleted'] = JsonConverters::to('DateTime', $this->deleted);
        if (isset($this->hidden)) $o['hidden'] = JsonConverters::to('DateTime', $this->hidden);
        if (isset($this->modified)) $o['modified'] = JsonConverters::to('DateTime', $this->modified);
        if (isset($this->created)) $o['created'] = JsonConverters::to('DateTime', $this->created);
        if (isset($this->createdBy)) $o['createdBy'] = $this->createdBy;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->refSource)) $o['refSource'] = $this->refSource;
        if (isset($this->refUrn)) $o['refUrn'] = $this->refUrn;
        return empty($o) ? new class(){} : $o;
    }
}

class Organization implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $slug=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var string|null */
        public ?string $descriptionHtml=null,
        /** @var string|null */
        public ?string $color=null,
        /** @var string|null */
        public ?string $textColor=null,
        /** @var string|null */
        public ?string $linkColor=null,
        /** @var string|null */
        public ?string $backgroundColor=null,
        /** @var string|null */
        public ?string $backgroundUrl=null,
        /** @var string|null */
        public ?string $logoUrl=null,
        /** @var string|null */
        public ?string $heroUrl=null,
        /** @var string|null */
        public ?string $lang=null,
        /** @var string|null */
        public ?string $defaultPostType=null,
        /** @var string[]|null */
        public ?array $defaultSubscriptionPostTypes=null,
        /** @var string[]|null */
        public ?array $postTypes=null,
        /** @var string[]|null */
        public ?array $moderatorPostTypes=null,
        /** @var int */
        public int $deletePostsWithReportCount=0,
        /** @var bool|null */
        public ?bool $disableInvites=null,
        /** @var int */
        public int $upVotes=0,
        /** @var int */
        public int $downVotes=0,
        /** @var int */
        public int $views=0,
        /** @var int */
        public int $favorites=0,
        /** @var int */
        public int $subscribers=0,
        /** @var int */
        public int $commentsCount=0,
        /** @var int */
        public int $postsCount=0,
        /** @var int */
        public int $score=0,
        /** @var int */
        public int $rank=0,
        /** @var int|null */
        public ?int $refId=null,
        /** @var string|null */
        public ?string $refSource=null,
        /** @var DateTime|null */
        public ?DateTime $hidden=null,
        /** @var string|null */
        public ?string $hiddenBy=null,
        /** @var DateTime|null */
        public ?DateTime $locked=null,
        /** @var string|null */
        public ?string $lockedBy=null,
        /** @var DateTime|null */
        public ?DateTime $deleted=null,
        /** @var string|null */
        public ?string $deletedBy=null,
        /** @var DateTime */
        public DateTime $created=new DateTime(),
        /** @var string|null */
        public ?string $createdBy=null,
        /** @var DateTime */
        public DateTime $modified=new DateTime(),
        /** @var string|null */
        public ?string $modifiedBy=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['descriptionHtml'])) $this->descriptionHtml = $o['descriptionHtml'];
        if (isset($o['color'])) $this->color = $o['color'];
        if (isset($o['textColor'])) $this->textColor = $o['textColor'];
        if (isset($o['linkColor'])) $this->linkColor = $o['linkColor'];
        if (isset($o['backgroundColor'])) $this->backgroundColor = $o['backgroundColor'];
        if (isset($o['backgroundUrl'])) $this->backgroundUrl = $o['backgroundUrl'];
        if (isset($o['logoUrl'])) $this->logoUrl = $o['logoUrl'];
        if (isset($o['heroUrl'])) $this->heroUrl = $o['heroUrl'];
        if (isset($o['lang'])) $this->lang = $o['lang'];
        if (isset($o['defaultPostType'])) $this->defaultPostType = $o['defaultPostType'];
        if (isset($o['defaultSubscriptionPostTypes'])) $this->defaultSubscriptionPostTypes = JsonConverters::fromArray('string', $o['defaultSubscriptionPostTypes']);
        if (isset($o['postTypes'])) $this->postTypes = JsonConverters::fromArray('string', $o['postTypes']);
        if (isset($o['moderatorPostTypes'])) $this->moderatorPostTypes = JsonConverters::fromArray('string', $o['moderatorPostTypes']);
        if (isset($o['deletePostsWithReportCount'])) $this->deletePostsWithReportCount = $o['deletePostsWithReportCount'];
        if (isset($o['disableInvites'])) $this->disableInvites = $o['disableInvites'];
        if (isset($o['upVotes'])) $this->upVotes = $o['upVotes'];
        if (isset($o['downVotes'])) $this->downVotes = $o['downVotes'];
        if (isset($o['views'])) $this->views = $o['views'];
        if (isset($o['favorites'])) $this->favorites = $o['favorites'];
        if (isset($o['subscribers'])) $this->subscribers = $o['subscribers'];
        if (isset($o['commentsCount'])) $this->commentsCount = $o['commentsCount'];
        if (isset($o['postsCount'])) $this->postsCount = $o['postsCount'];
        if (isset($o['score'])) $this->score = $o['score'];
        if (isset($o['rank'])) $this->rank = $o['rank'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['refSource'])) $this->refSource = $o['refSource'];
        if (isset($o['hidden'])) $this->hidden = JsonConverters::from('DateTime', $o['hidden']);
        if (isset($o['hiddenBy'])) $this->hiddenBy = $o['hiddenBy'];
        if (isset($o['locked'])) $this->locked = JsonConverters::from('DateTime', $o['locked']);
        if (isset($o['lockedBy'])) $this->lockedBy = $o['lockedBy'];
        if (isset($o['deleted'])) $this->deleted = JsonConverters::from('DateTime', $o['deleted']);
        if (isset($o['deletedBy'])) $this->deletedBy = $o['deletedBy'];
        if (isset($o['created'])) $this->created = JsonConverters::from('DateTime', $o['created']);
        if (isset($o['createdBy'])) $this->createdBy = $o['createdBy'];
        if (isset($o['modified'])) $this->modified = JsonConverters::from('DateTime', $o['modified']);
        if (isset($o['modifiedBy'])) $this->modifiedBy = $o['modifiedBy'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->descriptionHtml)) $o['descriptionHtml'] = $this->descriptionHtml;
        if (isset($this->color)) $o['color'] = $this->color;
        if (isset($this->textColor)) $o['textColor'] = $this->textColor;
        if (isset($this->linkColor)) $o['linkColor'] = $this->linkColor;
        if (isset($this->backgroundColor)) $o['backgroundColor'] = $this->backgroundColor;
        if (isset($this->backgroundUrl)) $o['backgroundUrl'] = $this->backgroundUrl;
        if (isset($this->logoUrl)) $o['logoUrl'] = $this->logoUrl;
        if (isset($this->heroUrl)) $o['heroUrl'] = $this->heroUrl;
        if (isset($this->lang)) $o['lang'] = $this->lang;
        if (isset($this->defaultPostType)) $o['defaultPostType'] = $this->defaultPostType;
        if (isset($this->defaultSubscriptionPostTypes)) $o['defaultSubscriptionPostTypes'] = JsonConverters::toArray('string', $this->defaultSubscriptionPostTypes);
        if (isset($this->postTypes)) $o['postTypes'] = JsonConverters::toArray('string', $this->postTypes);
        if (isset($this->moderatorPostTypes)) $o['moderatorPostTypes'] = JsonConverters::toArray('string', $this->moderatorPostTypes);
        if (isset($this->deletePostsWithReportCount)) $o['deletePostsWithReportCount'] = $this->deletePostsWithReportCount;
        if (isset($this->disableInvites)) $o['disableInvites'] = $this->disableInvites;
        if (isset($this->upVotes)) $o['upVotes'] = $this->upVotes;
        if (isset($this->downVotes)) $o['downVotes'] = $this->downVotes;
        if (isset($this->views)) $o['views'] = $this->views;
        if (isset($this->favorites)) $o['favorites'] = $this->favorites;
        if (isset($this->subscribers)) $o['subscribers'] = $this->subscribers;
        if (isset($this->commentsCount)) $o['commentsCount'] = $this->commentsCount;
        if (isset($this->postsCount)) $o['postsCount'] = $this->postsCount;
        if (isset($this->score)) $o['score'] = $this->score;
        if (isset($this->rank)) $o['rank'] = $this->rank;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->refSource)) $o['refSource'] = $this->refSource;
        if (isset($this->hidden)) $o['hidden'] = JsonConverters::to('DateTime', $this->hidden);
        if (isset($this->hiddenBy)) $o['hiddenBy'] = $this->hiddenBy;
        if (isset($this->locked)) $o['locked'] = JsonConverters::to('DateTime', $this->locked);
        if (isset($this->lockedBy)) $o['lockedBy'] = $this->lockedBy;
        if (isset($this->deleted)) $o['deleted'] = JsonConverters::to('DateTime', $this->deleted);
        if (isset($this->deletedBy)) $o['deletedBy'] = $this->deletedBy;
        if (isset($this->created)) $o['created'] = JsonConverters::to('DateTime', $this->created);
        if (isset($this->createdBy)) $o['createdBy'] = $this->createdBy;
        if (isset($this->modified)) $o['modified'] = JsonConverters::to('DateTime', $this->modified);
        if (isset($this->modifiedBy)) $o['modifiedBy'] = $this->modifiedBy;
        return empty($o) ? new class(){} : $o;
    }
}

class OrganizationLabel implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $slug=null,
        /** @var int */
        public int $organizationId=0,
        /** @var string|null */
        public ?string $description=null,
        /** @var string|null */
        public ?string $color=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['color'])) $this->color = $o['color'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->color)) $o['color'] = $this->color;
        return empty($o) ? new class(){} : $o;
    }
}

class Category implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $organizationId=0,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $slug=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var string|null */
        public ?string $color=null,
        /** @var int[]|null */
        public ?array $technologyIds=null,
        /** @var int */
        public int $commentsCount=0,
        /** @var int */
        public int $postsCount=0,
        /** @var int */
        public int $score=0,
        /** @var int */
        public int $rank=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['color'])) $this->color = $o['color'];
        if (isset($o['technologyIds'])) $this->technologyIds = JsonConverters::fromArray('int', $o['technologyIds']);
        if (isset($o['commentsCount'])) $this->commentsCount = $o['commentsCount'];
        if (isset($o['postsCount'])) $this->postsCount = $o['postsCount'];
        if (isset($o['score'])) $this->score = $o['score'];
        if (isset($o['rank'])) $this->rank = $o['rank'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->color)) $o['color'] = $this->color;
        if (isset($this->technologyIds)) $o['technologyIds'] = JsonConverters::toArray('int', $this->technologyIds);
        if (isset($this->commentsCount)) $o['commentsCount'] = $this->commentsCount;
        if (isset($this->postsCount)) $o['postsCount'] = $this->postsCount;
        if (isset($this->score)) $o['score'] = $this->score;
        if (isset($this->rank)) $o['rank'] = $this->rank;
        return empty($o) ? new class(){} : $o;
    }
}

class OrganizationMember implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $organizationId=0,
        /** @var int */
        public int $userId=0,
        /** @var string|null */
        public ?string $userName=null,
        /** @var bool|null */
        public ?bool $isOwner=null,
        /** @var bool|null */
        public ?bool $isModerator=null,
        /** @var bool|null */
        public ?bool $denyAll=null,
        /** @var bool|null */
        public ?bool $denyPosts=null,
        /** @var bool|null */
        public ?bool $denyComments=null,
        /** @var string|null */
        public ?string $notes=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['userId'])) $this->userId = $o['userId'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['isOwner'])) $this->isOwner = $o['isOwner'];
        if (isset($o['isModerator'])) $this->isModerator = $o['isModerator'];
        if (isset($o['denyAll'])) $this->denyAll = $o['denyAll'];
        if (isset($o['denyPosts'])) $this->denyPosts = $o['denyPosts'];
        if (isset($o['denyComments'])) $this->denyComments = $o['denyComments'];
        if (isset($o['notes'])) $this->notes = $o['notes'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->userId)) $o['userId'] = $this->userId;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->isOwner)) $o['isOwner'] = $this->isOwner;
        if (isset($this->isModerator)) $o['isModerator'] = $this->isModerator;
        if (isset($this->denyAll)) $o['denyAll'] = $this->denyAll;
        if (isset($this->denyPosts)) $o['denyPosts'] = $this->denyPosts;
        if (isset($this->denyComments)) $o['denyComments'] = $this->denyComments;
        if (isset($this->notes)) $o['notes'] = $this->notes;
        return empty($o) ? new class(){} : $o;
    }
}

class OrganizationMemberInvite implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $organizationId=0,
        /** @var int */
        public int $userId=0,
        /** @var string|null */
        public ?string $userName=null,
        /** @var DateTime|null */
        public ?DateTime $dismissed=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['userId'])) $this->userId = $o['userId'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['dismissed'])) $this->dismissed = JsonConverters::from('DateTime', $o['dismissed']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->userId)) $o['userId'] = $this->userId;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->dismissed)) $o['dismissed'] = JsonConverters::to('DateTime', $this->dismissed);
        return empty($o) ? new class(){} : $o;
    }
}

class PostReportInfo implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $organizationId=0,
        /** @var int */
        public int $postId=0,
        /** @var int */
        public int $userId=0,
        /** @var string|null */
        public ?string $userName=null,
        /** @var FlagType|null */
        public ?FlagType $flagType=null,
        /** @var string|null */
        public ?string $reportNotes=null,
        /** @var DateTime */
        public DateTime $created=new DateTime(),
        /** @var DateTime|null */
        public ?DateTime $acknowledged=null,
        /** @var string|null */
        public ?string $acknowledgedBy=null,
        /** @var DateTime|null */
        public ?DateTime $dismissed=null,
        /** @var string|null */
        public ?string $dismissedBy=null,
        /** @var string|null */
        public ?string $title=null,
        /** @var int */
        public int $reportCount=0,
        /** @var string|null */
        public ?string $createdBy=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['postId'])) $this->postId = $o['postId'];
        if (isset($o['userId'])) $this->userId = $o['userId'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['flagType'])) $this->flagType = JsonConverters::from('FlagType', $o['flagType']);
        if (isset($o['reportNotes'])) $this->reportNotes = $o['reportNotes'];
        if (isset($o['created'])) $this->created = JsonConverters::from('DateTime', $o['created']);
        if (isset($o['acknowledged'])) $this->acknowledged = JsonConverters::from('DateTime', $o['acknowledged']);
        if (isset($o['acknowledgedBy'])) $this->acknowledgedBy = $o['acknowledgedBy'];
        if (isset($o['dismissed'])) $this->dismissed = JsonConverters::from('DateTime', $o['dismissed']);
        if (isset($o['dismissedBy'])) $this->dismissedBy = $o['dismissedBy'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['reportCount'])) $this->reportCount = $o['reportCount'];
        if (isset($o['createdBy'])) $this->createdBy = $o['createdBy'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->postId)) $o['postId'] = $this->postId;
        if (isset($this->userId)) $o['userId'] = $this->userId;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->flagType)) $o['flagType'] = JsonConverters::to('FlagType', $this->flagType);
        if (isset($this->reportNotes)) $o['reportNotes'] = $this->reportNotes;
        if (isset($this->created)) $o['created'] = JsonConverters::to('DateTime', $this->created);
        if (isset($this->acknowledged)) $o['acknowledged'] = JsonConverters::to('DateTime', $this->acknowledged);
        if (isset($this->acknowledgedBy)) $o['acknowledgedBy'] = $this->acknowledgedBy;
        if (isset($this->dismissed)) $o['dismissed'] = JsonConverters::to('DateTime', $this->dismissed);
        if (isset($this->dismissedBy)) $o['dismissedBy'] = $this->dismissedBy;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->reportCount)) $o['reportCount'] = $this->reportCount;
        if (isset($this->createdBy)) $o['createdBy'] = $this->createdBy;
        return empty($o) ? new class(){} : $o;
    }
}

class PostCommentReportInfo implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $organizationId=0,
        /** @var int */
        public int $postId=0,
        /** @var int */
        public int $postCommentId=0,
        /** @var int */
        public int $userId=0,
        /** @var string|null */
        public ?string $userName=null,
        /** @var FlagType|null */
        public ?FlagType $flagType=null,
        /** @var string|null */
        public ?string $reportNotes=null,
        /** @var DateTime */
        public DateTime $created=new DateTime(),
        /** @var DateTime|null */
        public ?DateTime $acknowledged=null,
        /** @var string|null */
        public ?string $acknowledgedBy=null,
        /** @var DateTime|null */
        public ?DateTime $dismissed=null,
        /** @var string|null */
        public ?string $dismissedBy=null,
        /** @var string|null */
        public ?string $contentHtml=null,
        /** @var int */
        public int $reportCount=0,
        /** @var string|null */
        public ?string $createdBy=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['postId'])) $this->postId = $o['postId'];
        if (isset($o['postCommentId'])) $this->postCommentId = $o['postCommentId'];
        if (isset($o['userId'])) $this->userId = $o['userId'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['flagType'])) $this->flagType = JsonConverters::from('FlagType', $o['flagType']);
        if (isset($o['reportNotes'])) $this->reportNotes = $o['reportNotes'];
        if (isset($o['created'])) $this->created = JsonConverters::from('DateTime', $o['created']);
        if (isset($o['acknowledged'])) $this->acknowledged = JsonConverters::from('DateTime', $o['acknowledged']);
        if (isset($o['acknowledgedBy'])) $this->acknowledgedBy = $o['acknowledgedBy'];
        if (isset($o['dismissed'])) $this->dismissed = JsonConverters::from('DateTime', $o['dismissed']);
        if (isset($o['dismissedBy'])) $this->dismissedBy = $o['dismissedBy'];
        if (isset($o['contentHtml'])) $this->contentHtml = $o['contentHtml'];
        if (isset($o['reportCount'])) $this->reportCount = $o['reportCount'];
        if (isset($o['createdBy'])) $this->createdBy = $o['createdBy'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->postId)) $o['postId'] = $this->postId;
        if (isset($this->postCommentId)) $o['postCommentId'] = $this->postCommentId;
        if (isset($this->userId)) $o['userId'] = $this->userId;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->flagType)) $o['flagType'] = JsonConverters::to('FlagType', $this->flagType);
        if (isset($this->reportNotes)) $o['reportNotes'] = $this->reportNotes;
        if (isset($this->created)) $o['created'] = JsonConverters::to('DateTime', $this->created);
        if (isset($this->acknowledged)) $o['acknowledged'] = JsonConverters::to('DateTime', $this->acknowledged);
        if (isset($this->acknowledgedBy)) $o['acknowledgedBy'] = $this->acknowledgedBy;
        if (isset($this->dismissed)) $o['dismissed'] = JsonConverters::to('DateTime', $this->dismissed);
        if (isset($this->dismissedBy)) $o['dismissedBy'] = $this->dismissedBy;
        if (isset($this->contentHtml)) $o['contentHtml'] = $this->contentHtml;
        if (isset($this->reportCount)) $o['reportCount'] = $this->reportCount;
        if (isset($this->createdBy)) $o['createdBy'] = $this->createdBy;
        return empty($o) ? new class(){} : $o;
    }
}

class UserRef implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $userName=null,
        /** @var string|null */
        public ?string $email=null,
        /** @var int|null */
        public ?int $refId=null,
        /** @var string|null */
        public ?string $refSource=null,
        /** @var string|null */
        public ?string $refUrn=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['refSource'])) $this->refSource = $o['refSource'];
        if (isset($o['refUrn'])) $this->refUrn = $o['refUrn'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->refSource)) $o['refSource'] = $this->refSource;
        if (isset($this->refUrn)) $o['refUrn'] = $this->refUrn;
        return empty($o) ? new class(){} : $o;
    }
}

class OrganizationSubscription implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $organizationId=0,
        /** @var int */
        public int $userId=0,
        /** @var string|null */
        public ?string $userName=null,
        /** @var string[]|null */
        public ?array $postTypes=null,
        /** @var int|null */
        public ?int $frequencyDays=null,
        /** @var int|null */
        public ?int $lastSyncedId=null,
        /** @var DateTime|null */
        public ?DateTime $lastSynced=null,
        /** @var DateTime */
        public DateTime $created=new DateTime()
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['userId'])) $this->userId = $o['userId'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['postTypes'])) $this->postTypes = JsonConverters::fromArray('string', $o['postTypes']);
        if (isset($o['frequencyDays'])) $this->frequencyDays = $o['frequencyDays'];
        if (isset($o['lastSyncedId'])) $this->lastSyncedId = $o['lastSyncedId'];
        if (isset($o['lastSynced'])) $this->lastSynced = JsonConverters::from('DateTime', $o['lastSynced']);
        if (isset($o['created'])) $this->created = JsonConverters::from('DateTime', $o['created']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->userId)) $o['userId'] = $this->userId;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->postTypes)) $o['postTypes'] = JsonConverters::toArray('string', $this->postTypes);
        if (isset($this->frequencyDays)) $o['frequencyDays'] = $this->frequencyDays;
        if (isset($this->lastSyncedId)) $o['lastSyncedId'] = $this->lastSyncedId;
        if (isset($this->lastSynced)) $o['lastSynced'] = JsonConverters::to('DateTime', $this->lastSynced);
        if (isset($this->created)) $o['created'] = JsonConverters::to('DateTime', $this->created);
        return empty($o) ? new class(){} : $o;
    }
}

class UserActivity implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $userName=null,
        /** @var int */
        public int $karma=0,
        /** @var int */
        public int $technologyCount=0,
        /** @var int */
        public int $techStacksCount=0,
        /** @var int */
        public int $postsCount=0,
        /** @var int */
        public int $postUpVotes=0,
        /** @var int */
        public int $postDownVotes=0,
        /** @var int */
        public int $commentUpVotes=0,
        /** @var int */
        public int $commentDownVotes=0,
        /** @var int */
        public int $postCommentsCount=0,
        /** @var int */
        public int $pinnedCommentCount=0,
        /** @var int */
        public int $postReportCount=0,
        /** @var int */
        public int $postCommentReportCount=0,
        /** @var DateTime */
        public DateTime $created=new DateTime(),
        /** @var DateTime */
        public DateTime $modified=new DateTime()
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['karma'])) $this->karma = $o['karma'];
        if (isset($o['technologyCount'])) $this->technologyCount = $o['technologyCount'];
        if (isset($o['techStacksCount'])) $this->techStacksCount = $o['techStacksCount'];
        if (isset($o['postsCount'])) $this->postsCount = $o['postsCount'];
        if (isset($o['postUpVotes'])) $this->postUpVotes = $o['postUpVotes'];
        if (isset($o['postDownVotes'])) $this->postDownVotes = $o['postDownVotes'];
        if (isset($o['commentUpVotes'])) $this->commentUpVotes = $o['commentUpVotes'];
        if (isset($o['commentDownVotes'])) $this->commentDownVotes = $o['commentDownVotes'];
        if (isset($o['postCommentsCount'])) $this->postCommentsCount = $o['postCommentsCount'];
        if (isset($o['pinnedCommentCount'])) $this->pinnedCommentCount = $o['pinnedCommentCount'];
        if (isset($o['postReportCount'])) $this->postReportCount = $o['postReportCount'];
        if (isset($o['postCommentReportCount'])) $this->postCommentReportCount = $o['postCommentReportCount'];
        if (isset($o['created'])) $this->created = JsonConverters::from('DateTime', $o['created']);
        if (isset($o['modified'])) $this->modified = JsonConverters::from('DateTime', $o['modified']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->karma)) $o['karma'] = $this->karma;
        if (isset($this->technologyCount)) $o['technologyCount'] = $this->technologyCount;
        if (isset($this->techStacksCount)) $o['techStacksCount'] = $this->techStacksCount;
        if (isset($this->postsCount)) $o['postsCount'] = $this->postsCount;
        if (isset($this->postUpVotes)) $o['postUpVotes'] = $this->postUpVotes;
        if (isset($this->postDownVotes)) $o['postDownVotes'] = $this->postDownVotes;
        if (isset($this->commentUpVotes)) $o['commentUpVotes'] = $this->commentUpVotes;
        if (isset($this->commentDownVotes)) $o['commentDownVotes'] = $this->commentDownVotes;
        if (isset($this->postCommentsCount)) $o['postCommentsCount'] = $this->postCommentsCount;
        if (isset($this->pinnedCommentCount)) $o['pinnedCommentCount'] = $this->pinnedCommentCount;
        if (isset($this->postReportCount)) $o['postReportCount'] = $this->postReportCount;
        if (isset($this->postCommentReportCount)) $o['postCommentReportCount'] = $this->postCommentReportCount;
        if (isset($this->created)) $o['created'] = JsonConverters::to('DateTime', $this->created);
        if (isset($this->modified)) $o['modified'] = JsonConverters::to('DateTime', $this->modified);
        return empty($o) ? new class(){} : $o;
    }
}

class TechnologyHistory extends TechnologyBase implements JsonSerializable
{
    /**
     * @param int $id
     * @param string|null $name
     * @param string|null $vendorName
     * @param string|null $vendorUrl
     * @param string|null $productUrl
     * @param string|null $logoUrl
     * @param string|null $description
     * @param DateTime $created
     * @param string|null $createdBy
     * @param DateTime $lastModified
     * @param string|null $lastModifiedBy
     * @param string|null $ownerId
     * @param string|null $slug
     * @param bool|null $logoApproved
     * @param bool|null $isLocked
     * @param TechnologyTier|null $tier
     * @param DateTime|null $lastStatusUpdate
     * @param int|null $organizationId
     * @param int|null $commentsPostId
     * @param int $viewCount
     * @param int $favCount
     */
    public function __construct(
        int $id=0,
        string $name=null,
        string $vendorName=null,
        string $vendorUrl=null,
        string $productUrl=null,
        string $logoUrl=null,
        string $description=null,
        DateTime $created=new DateTime(),
        string $createdBy=null,
        DateTime $lastModified=new DateTime(),
        string $lastModifiedBy=null,
        string $ownerId=null,
        string $slug=null,
        bool $logoApproved=null,
        bool $isLocked=null,
        TechnologyTier $tier=null,
        DateTime $lastStatusUpdate=null,
        int $organizationId=null,
        int $commentsPostId=null,
        int $viewCount=0,
        int $favCount=0,
        /** @var int */
        public int $technologyId=0,
        /** @var string|null */
        public ?string $operation=null
    ) {
        parent::__construct($id,$name,$vendorName,$vendorUrl,$productUrl,$logoUrl,$description,$created,$createdBy,$lastModified,$lastModifiedBy,$ownerId,$slug,$logoApproved,$isLocked,$tier,$lastStatusUpdate,$organizationId,$commentsPostId,$viewCount,$favCount);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['technologyId'])) $this->technologyId = $o['technologyId'];
        if (isset($o['operation'])) $this->operation = $o['operation'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->technologyId)) $o['technologyId'] = $this->technologyId;
        if (isset($this->operation)) $o['operation'] = $this->operation;
        return empty($o) ? new class(){} : $o;
    }
}

class TechnologyStackHistory extends TechnologyStackBase implements JsonSerializable
{
    /**
     * @param int $id
     * @param string|null $name
     * @param string|null $vendorName
     * @param string|null $description
     * @param string|null $appUrl
     * @param string|null $screenshotUrl
     * @param DateTime $created
     * @param string|null $createdBy
     * @param DateTime $lastModified
     * @param string|null $lastModifiedBy
     * @param bool|null $isLocked
     * @param string|null $ownerId
     * @param string|null $slug
     * @param string|null $details
     * @param string|null $detailsHtml
     * @param DateTime|null $lastStatusUpdate
     * @param int|null $organizationId
     * @param int|null $commentsPostId
     * @param int $viewCount
     * @param int $favCount
     */
    public function __construct(
        int $id=0,
        string $name=null,
        string $vendorName=null,
        string $description=null,
        string $appUrl=null,
        string $screenshotUrl=null,
        DateTime $created=new DateTime(),
        string $createdBy=null,
        DateTime $lastModified=new DateTime(),
        string $lastModifiedBy=null,
        bool $isLocked=null,
        string $ownerId=null,
        string $slug=null,
        string $details=null,
        string $detailsHtml=null,
        DateTime $lastStatusUpdate=null,
        int $organizationId=null,
        int $commentsPostId=null,
        int $viewCount=0,
        int $favCount=0,
        /** @var int */
        public int $technologyStackId=0,
        /** @var string|null */
        public ?string $operation=null,
        /** @var array<int>|null */
        public ?array $technologyIds=null
    ) {
        parent::__construct($id,$name,$vendorName,$description,$appUrl,$screenshotUrl,$created,$createdBy,$lastModified,$lastModifiedBy,$isLocked,$ownerId,$slug,$details,$detailsHtml,$lastStatusUpdate,$organizationId,$commentsPostId,$viewCount,$favCount);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['technologyStackId'])) $this->technologyStackId = $o['technologyStackId'];
        if (isset($o['operation'])) $this->operation = $o['operation'];
        if (isset($o['technologyIds'])) $this->technologyIds = JsonConverters::fromArray('int', $o['technologyIds']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->technologyStackId)) $o['technologyStackId'] = $this->technologyStackId;
        if (isset($this->operation)) $o['operation'] = $this->operation;
        if (isset($this->technologyIds)) $o['technologyIds'] = JsonConverters::toArray('int', $this->technologyIds);
        return empty($o) ? new class(){} : $o;
    }
}

class UserInfo implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $userName=null,
        /** @var string|null */
        public ?string $avatarUrl=null,
        /** @var int */
        public int $stacksCount=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['avatarUrl'])) $this->avatarUrl = $o['avatarUrl'];
        if (isset($o['stacksCount'])) $this->stacksCount = $o['stacksCount'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->avatarUrl)) $o['avatarUrl'] = $this->avatarUrl;
        if (isset($this->stacksCount)) $o['stacksCount'] = $this->stacksCount;
        return empty($o) ? new class(){} : $o;
    }
}

class TechnologyInfo implements JsonSerializable
{
    public function __construct(
        /** @var TechnologyTier|null */
        public ?TechnologyTier $tier=null,
        /** @var string|null */
        public ?string $slug=null,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $logoUrl=null,
        /** @var int */
        public int $stacksCount=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['tier'])) $this->tier = JsonConverters::from('TechnologyTier', $o['tier']);
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['logoUrl'])) $this->logoUrl = $o['logoUrl'];
        if (isset($o['stacksCount'])) $this->stacksCount = $o['stacksCount'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->tier)) $o['tier'] = JsonConverters::to('TechnologyTier', $this->tier);
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->logoUrl)) $o['logoUrl'] = $this->logoUrl;
        if (isset($this->stacksCount)) $o['stacksCount'] = $this->stacksCount;
        return empty($o) ? new class(){} : $o;
    }
}

class TechnologyInStack extends TechnologyBase implements JsonSerializable
{
    /**
     * @param int $id
     * @param string|null $name
     * @param string|null $vendorName
     * @param string|null $vendorUrl
     * @param string|null $productUrl
     * @param string|null $logoUrl
     * @param string|null $description
     * @param DateTime $created
     * @param string|null $createdBy
     * @param DateTime $lastModified
     * @param string|null $lastModifiedBy
     * @param string|null $ownerId
     * @param string|null $slug
     * @param bool|null $logoApproved
     * @param bool|null $isLocked
     * @param TechnologyTier|null $tier
     * @param DateTime|null $lastStatusUpdate
     * @param int|null $organizationId
     * @param int|null $commentsPostId
     * @param int $viewCount
     * @param int $favCount
     */
    public function __construct(
        int $id=0,
        string $name=null,
        string $vendorName=null,
        string $vendorUrl=null,
        string $productUrl=null,
        string $logoUrl=null,
        string $description=null,
        DateTime $created=new DateTime(),
        string $createdBy=null,
        DateTime $lastModified=new DateTime(),
        string $lastModifiedBy=null,
        string $ownerId=null,
        string $slug=null,
        bool $logoApproved=null,
        bool $isLocked=null,
        TechnologyTier $tier=null,
        DateTime $lastStatusUpdate=null,
        int $organizationId=null,
        int $commentsPostId=null,
        int $viewCount=0,
        int $favCount=0,
        /** @var int */
        public int $technologyId=0,
        /** @var int */
        public int $technologyStackId=0,
        /** @var string|null */
        public ?string $justification=null
    ) {
        parent::__construct($id,$name,$vendorName,$vendorUrl,$productUrl,$logoUrl,$description,$created,$createdBy,$lastModified,$lastModifiedBy,$ownerId,$slug,$logoApproved,$isLocked,$tier,$lastStatusUpdate,$organizationId,$commentsPostId,$viewCount,$favCount);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['technologyId'])) $this->technologyId = $o['technologyId'];
        if (isset($o['technologyStackId'])) $this->technologyStackId = $o['technologyStackId'];
        if (isset($o['justification'])) $this->justification = $o['justification'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->technologyId)) $o['technologyId'] = $this->technologyId;
        if (isset($this->technologyStackId)) $o['technologyStackId'] = $this->technologyStackId;
        if (isset($this->justification)) $o['justification'] = $this->justification;
        return empty($o) ? new class(){} : $o;
    }
}

class TechStackDetails extends TechnologyStackBase implements JsonSerializable
{
    /**
     * @param int $id
     * @param string|null $name
     * @param string|null $vendorName
     * @param string|null $description
     * @param string|null $appUrl
     * @param string|null $screenshotUrl
     * @param DateTime $created
     * @param string|null $createdBy
     * @param DateTime $lastModified
     * @param string|null $lastModifiedBy
     * @param bool|null $isLocked
     * @param string|null $ownerId
     * @param string|null $slug
     * @param string|null $details
     * @param string|null $detailsHtml
     * @param DateTime|null $lastStatusUpdate
     * @param int|null $organizationId
     * @param int|null $commentsPostId
     * @param int $viewCount
     * @param int $favCount
     */
    public function __construct(
        int $id=0,
        string $name=null,
        string $vendorName=null,
        string $description=null,
        string $appUrl=null,
        string $screenshotUrl=null,
        DateTime $created=new DateTime(),
        string $createdBy=null,
        DateTime $lastModified=new DateTime(),
        string $lastModifiedBy=null,
        bool $isLocked=null,
        string $ownerId=null,
        string $slug=null,
        string $details=null,
        string $detailsHtml=null,
        DateTime $lastStatusUpdate=null,
        int $organizationId=null,
        int $commentsPostId=null,
        int $viewCount=0,
        int $favCount=0,
        /** @var array<TechnologyInStack>|null */
        public ?array $technologyChoices=null
    ) {
        parent::__construct($id,$name,$vendorName,$description,$appUrl,$screenshotUrl,$created,$createdBy,$lastModified,$lastModifiedBy,$isLocked,$ownerId,$slug,$details,$detailsHtml,$lastStatusUpdate,$organizationId,$commentsPostId,$viewCount,$favCount);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['technologyChoices'])) $this->technologyChoices = JsonConverters::fromArray('TechnologyInStack', $o['technologyChoices']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->technologyChoices)) $o['technologyChoices'] = JsonConverters::toArray('TechnologyInStack', $this->technologyChoices);
        return empty($o) ? new class(){} : $o;
    }
}

class LabelInfo implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $slug=null,
        /** @var string|null */
        public ?string $color=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['color'])) $this->color = $o['color'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->color)) $o['color'] = $this->color;
        return empty($o) ? new class(){} : $o;
    }
}

class CategoryInfo implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $slug=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        return empty($o) ? new class(){} : $o;
    }
}

class OrganizationInfo implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $slug=null,
        /** @var int|null */
        public ?int $refId=null,
        /** @var string|null */
        public ?string $refSource=null,
        /** @var int|null */
        public ?int $upVotes=null,
        /** @var int|null */
        public ?int $downVotes=null,
        /** @var int */
        public int $membersCount=0,
        /** @var int */
        public int $rank=0,
        /** @var bool|null */
        public ?bool $disableInvites=null,
        /** @var string|null */
        public ?string $lang=null,
        /** @var string[]|null */
        public ?array $postTypes=null,
        /** @var string[]|null */
        public ?array $moderatorPostTypes=null,
        /** @var DateTime|null */
        public ?DateTime $locked=null,
        /** @var array<LabelInfo>|null */
        public ?array $labels=null,
        /** @var array<CategoryInfo>|null */
        public ?array $categories=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['refSource'])) $this->refSource = $o['refSource'];
        if (isset($o['upVotes'])) $this->upVotes = $o['upVotes'];
        if (isset($o['downVotes'])) $this->downVotes = $o['downVotes'];
        if (isset($o['membersCount'])) $this->membersCount = $o['membersCount'];
        if (isset($o['rank'])) $this->rank = $o['rank'];
        if (isset($o['disableInvites'])) $this->disableInvites = $o['disableInvites'];
        if (isset($o['lang'])) $this->lang = $o['lang'];
        if (isset($o['postTypes'])) $this->postTypes = JsonConverters::fromArray('string', $o['postTypes']);
        if (isset($o['moderatorPostTypes'])) $this->moderatorPostTypes = JsonConverters::fromArray('string', $o['moderatorPostTypes']);
        if (isset($o['locked'])) $this->locked = JsonConverters::from('DateTime', $o['locked']);
        if (isset($o['labels'])) $this->labels = JsonConverters::fromArray('LabelInfo', $o['labels']);
        if (isset($o['categories'])) $this->categories = JsonConverters::fromArray('CategoryInfo', $o['categories']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->refSource)) $o['refSource'] = $this->refSource;
        if (isset($this->upVotes)) $o['upVotes'] = $this->upVotes;
        if (isset($this->downVotes)) $o['downVotes'] = $this->downVotes;
        if (isset($this->membersCount)) $o['membersCount'] = $this->membersCount;
        if (isset($this->rank)) $o['rank'] = $this->rank;
        if (isset($this->disableInvites)) $o['disableInvites'] = $this->disableInvites;
        if (isset($this->lang)) $o['lang'] = $this->lang;
        if (isset($this->postTypes)) $o['postTypes'] = JsonConverters::toArray('string', $this->postTypes);
        if (isset($this->moderatorPostTypes)) $o['moderatorPostTypes'] = JsonConverters::toArray('string', $this->moderatorPostTypes);
        if (isset($this->locked)) $o['locked'] = JsonConverters::to('DateTime', $this->locked);
        if (isset($this->labels)) $o['labels'] = JsonConverters::toArray('LabelInfo', $this->labels);
        if (isset($this->categories)) $o['categories'] = JsonConverters::toArray('CategoryInfo', $this->categories);
        return empty($o) ? new class(){} : $o;
    }
}

// @DataContract
class Option implements JsonSerializable
{
    public function __construct(
        // @DataMember(Name="name")
        /** @var string|null */
        public ?string $name=null,

        // @DataMember(Name="title")
        /** @var string|null */
        public ?string $title=null,

        // @DataMember(Name="value")
        /** @var TechnologyTier|null */
        public ?TechnologyTier $value=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['value'])) $this->value = JsonConverters::from('TechnologyTier', $o['value']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->value)) $o['value'] = JsonConverters::to('TechnologyTier', $this->value);
        return empty($o) ? new class(){} : $o;
    }
}

class GetOrganizationResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $cache=0,
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $slug=null,
        /** @var Organization|null */
        public ?Organization $organization=null,
        /** @var array<OrganizationLabel>|null */
        public ?array $labels=null,
        /** @var array<Category>|null */
        public ?array $categories=null,
        /** @var array<OrganizationMember>|null */
        public ?array $owners=null,
        /** @var array<OrganizationMember>|null */
        public ?array $moderators=null,
        /** @var int */
        public int $membersCount=0,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['cache'])) $this->cache = $o['cache'];
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['organization'])) $this->organization = JsonConverters::from('Organization', $o['organization']);
        if (isset($o['labels'])) $this->labels = JsonConverters::fromArray('OrganizationLabel', $o['labels']);
        if (isset($o['categories'])) $this->categories = JsonConverters::fromArray('Category', $o['categories']);
        if (isset($o['owners'])) $this->owners = JsonConverters::fromArray('OrganizationMember', $o['owners']);
        if (isset($o['moderators'])) $this->moderators = JsonConverters::fromArray('OrganizationMember', $o['moderators']);
        if (isset($o['membersCount'])) $this->membersCount = $o['membersCount'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->cache)) $o['cache'] = $this->cache;
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->organization)) $o['organization'] = JsonConverters::to('Organization', $this->organization);
        if (isset($this->labels)) $o['labels'] = JsonConverters::toArray('OrganizationLabel', $this->labels);
        if (isset($this->categories)) $o['categories'] = JsonConverters::toArray('Category', $this->categories);
        if (isset($this->owners)) $o['owners'] = JsonConverters::toArray('OrganizationMember', $this->owners);
        if (isset($this->moderators)) $o['moderators'] = JsonConverters::toArray('OrganizationMember', $this->moderators);
        if (isset($this->membersCount)) $o['membersCount'] = $this->membersCount;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class GetOrganizationMembersResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0,
        /** @var array<OrganizationMember>|null */
        public ?array $results=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('OrganizationMember', $o['results']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('OrganizationMember', $this->results);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class GetOrganizationAdminResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<OrganizationLabel>|null */
        public ?array $labels=null,
        /** @var array<OrganizationMember>|null */
        public ?array $members=null,
        /** @var array<OrganizationMemberInvite>|null */
        public ?array $memberInvites=null,
        /** @var array<PostReportInfo>|null */
        public ?array $reportedPosts=null,
        /** @var array<PostCommentReportInfo>|null */
        public ?array $reportedPostComments=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['labels'])) $this->labels = JsonConverters::fromArray('OrganizationLabel', $o['labels']);
        if (isset($o['members'])) $this->members = JsonConverters::fromArray('OrganizationMember', $o['members']);
        if (isset($o['memberInvites'])) $this->memberInvites = JsonConverters::fromArray('OrganizationMemberInvite', $o['memberInvites']);
        if (isset($o['reportedPosts'])) $this->reportedPosts = JsonConverters::fromArray('PostReportInfo', $o['reportedPosts']);
        if (isset($o['reportedPostComments'])) $this->reportedPostComments = JsonConverters::fromArray('PostCommentReportInfo', $o['reportedPostComments']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->labels)) $o['labels'] = JsonConverters::toArray('OrganizationLabel', $this->labels);
        if (isset($this->members)) $o['members'] = JsonConverters::toArray('OrganizationMember', $this->members);
        if (isset($this->memberInvites)) $o['memberInvites'] = JsonConverters::toArray('OrganizationMemberInvite', $this->memberInvites);
        if (isset($this->reportedPosts)) $o['reportedPosts'] = JsonConverters::toArray('PostReportInfo', $this->reportedPosts);
        if (isset($this->reportedPostComments)) $o['reportedPostComments'] = JsonConverters::toArray('PostCommentReportInfo', $this->reportedPostComments);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class CreateOrganizationForTechnologyResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0,
        /** @var string|null */
        public ?string $organizationSlug=null,
        /** @var int */
        public int $commentsPostId=0,
        /** @var string|null */
        public ?string $commentsPostSlug=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['organizationSlug'])) $this->organizationSlug = $o['organizationSlug'];
        if (isset($o['commentsPostId'])) $this->commentsPostId = $o['commentsPostId'];
        if (isset($o['commentsPostSlug'])) $this->commentsPostSlug = $o['commentsPostSlug'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->organizationSlug)) $o['organizationSlug'] = $this->organizationSlug;
        if (isset($this->commentsPostId)) $o['commentsPostId'] = $this->commentsPostId;
        if (isset($this->commentsPostSlug)) $o['commentsPostSlug'] = $this->commentsPostSlug;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class CreateOrganizationResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $slug=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class UpdateOrganizationResponse implements JsonSerializable
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

class OrganizationLabelResponse implements JsonSerializable
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

class AddOrganizationCategoryResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $slug=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class UpdateOrganizationCategoryResponse implements JsonSerializable
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

class AddOrganizationMemberResponse implements JsonSerializable
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

class UpdateOrganizationMemberResponse implements JsonSerializable
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

class SetOrganizationMembersResponse implements JsonSerializable
{
    public function __construct(
        /** @var int[]|null */
        public ?array $userIdsAdded=null,
        /** @var int[]|null */
        public ?array $userIdsRemoved=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['userIdsAdded'])) $this->userIdsAdded = JsonConverters::fromArray('int', $o['userIdsAdded']);
        if (isset($o['userIdsRemoved'])) $this->userIdsRemoved = JsonConverters::fromArray('int', $o['userIdsRemoved']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->userIdsAdded)) $o['userIdsAdded'] = JsonConverters::toArray('int', $this->userIdsAdded);
        if (isset($this->userIdsRemoved)) $o['userIdsRemoved'] = JsonConverters::toArray('int', $this->userIdsRemoved);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class GetOrganizationMemberInvitesResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<OrganizationMemberInvite>|null */
        public ?array $results=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('OrganizationMemberInvite', $o['results']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('OrganizationMemberInvite', $this->results);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class RequestOrganizationMemberInviteResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class UpdateOrganizationMemberInviteResponse implements JsonSerializable
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

class GetPostResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $cache=0,
        /** @var Post|null */
        public ?Post $post=null,
        /** @var array<PostComment>|null */
        public ?array $comments=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['cache'])) $this->cache = $o['cache'];
        if (isset($o['post'])) $this->post = JsonConverters::from('Post', $o['post']);
        if (isset($o['comments'])) $this->comments = JsonConverters::fromArray('PostComment', $o['comments']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->cache)) $o['cache'] = $this->cache;
        if (isset($this->post)) $o['post'] = JsonConverters::to('Post', $this->post);
        if (isset($this->comments)) $o['comments'] = JsonConverters::toArray('PostComment', $this->comments);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class CreatePostResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $slug=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class UpdatePostResponse implements JsonSerializable
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

class DeletePostResponse implements JsonSerializable
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

class CreatePostCommentResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $postId=0,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['postId'])) $this->postId = $o['postId'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->postId)) $o['postId'] = $this->postId;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class UpdatePostCommentResponse implements JsonSerializable
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

class DeletePostCommentResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $postId=0,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['postId'])) $this->postId = $o['postId'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->postId)) $o['postId'] = $this->postId;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class GetUserPostCommentVotesResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $postId=0,
        /** @var array<int>|null */
        public ?array $upVotedCommentIds=null,
        /** @var array<int>|null */
        public ?array $downVotedCommentIds=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['postId'])) $this->postId = $o['postId'];
        if (isset($o['upVotedCommentIds'])) $this->upVotedCommentIds = JsonConverters::fromArray('int', $o['upVotedCommentIds']);
        if (isset($o['downVotedCommentIds'])) $this->downVotedCommentIds = JsonConverters::fromArray('int', $o['downVotedCommentIds']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->postId)) $o['postId'] = $this->postId;
        if (isset($this->upVotedCommentIds)) $o['upVotedCommentIds'] = JsonConverters::toArray('int', $this->upVotedCommentIds);
        if (isset($this->downVotedCommentIds)) $o['downVotedCommentIds'] = JsonConverters::toArray('int', $this->downVotedCommentIds);
        return empty($o) ? new class(){} : $o;
    }
}

class PinPostCommentResponse implements JsonSerializable
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

class GetUsersByEmailsResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<UserRef>|null */
        public ?array $results=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('UserRef', $o['results']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('UserRef', $this->results);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class GetUserPostActivityResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<int>|null */
        public ?array $upVotedPostIds=null,
        /** @var array<int>|null */
        public ?array $downVotedPostIds=null,
        /** @var array<int>|null */
        public ?array $favoritePostIds=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['upVotedPostIds'])) $this->upVotedPostIds = JsonConverters::fromArray('int', $o['upVotedPostIds']);
        if (isset($o['downVotedPostIds'])) $this->downVotedPostIds = JsonConverters::fromArray('int', $o['downVotedPostIds']);
        if (isset($o['favoritePostIds'])) $this->favoritePostIds = JsonConverters::fromArray('int', $o['favoritePostIds']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->upVotedPostIds)) $o['upVotedPostIds'] = JsonConverters::toArray('int', $this->upVotedPostIds);
        if (isset($this->downVotedPostIds)) $o['downVotedPostIds'] = JsonConverters::toArray('int', $this->downVotedPostIds);
        if (isset($this->favoritePostIds)) $o['favoritePostIds'] = JsonConverters::toArray('int', $this->favoritePostIds);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class GetUserOrganizationsResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<OrganizationMember>|null */
        public ?array $members=null,
        /** @var array<OrganizationMemberInvite>|null */
        public ?array $memberInvites=null,
        /** @var array<OrganizationSubscription>|null */
        public ?array $subscriptions=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['members'])) $this->members = JsonConverters::fromArray('OrganizationMember', $o['members']);
        if (isset($o['memberInvites'])) $this->memberInvites = JsonConverters::fromArray('OrganizationMemberInvite', $o['memberInvites']);
        if (isset($o['subscriptions'])) $this->subscriptions = JsonConverters::fromArray('OrganizationSubscription', $o['subscriptions']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->members)) $o['members'] = JsonConverters::toArray('OrganizationMember', $this->members);
        if (isset($this->memberInvites)) $o['memberInvites'] = JsonConverters::toArray('OrganizationMemberInvite', $this->memberInvites);
        if (isset($this->subscriptions)) $o['subscriptions'] = JsonConverters::toArray('OrganizationSubscription', $this->subscriptions);
        return empty($o) ? new class(){} : $o;
    }
}

class UserPostVoteResponse implements JsonSerializable
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

class UserPostFavoriteResponse implements JsonSerializable
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

class UserPostReportResponse implements JsonSerializable
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

class UserPostCommentVoteResponse implements JsonSerializable
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

class UserPostCommentReportResponse implements JsonSerializable
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

class SessionInfoResponse implements JsonSerializable
{
    public function __construct(
        /** @var DateTime */
        public DateTime $created=new DateTime(),
        /** @var string|null */
        public ?string $id=null,
        /** @var string|null */
        public ?string $referrerUrl=null,
        /** @var string|null */
        public ?string $userAuthId=null,
        /** @var string|null */
        public ?string $userAuthName=null,
        /** @var string|null */
        public ?string $userName=null,
        /** @var string|null */
        public ?string $displayName=null,
        /** @var string|null */
        public ?string $firstName=null,
        /** @var string|null */
        public ?string $lastName=null,
        /** @var string|null */
        public ?string $email=null,
        /** @var DateTime */
        public DateTime $createdAt=new DateTime(),
        /** @var DateTime */
        public DateTime $lastModified=new DateTime(),
        /** @var array<string>|null */
        public ?array $roles=null,
        /** @var array<string>|null */
        public ?array $permissions=null,
        /** @var bool|null */
        public ?bool $isAuthenticated=null,
        /** @var string|null */
        public ?string $authProvider=null,
        /** @var string|null */
        public ?string $profileUrl=null,
        /** @var string|null */
        public ?string $githubProfileUrl=null,
        /** @var string|null */
        public ?string $twitterProfileUrl=null,
        /** @var string|null */
        public ?string $accessToken=null,
        /** @var string|null */
        public ?string $avatarUrl=null,
        /** @var array<TechnologyStack>|null */
        public ?array $techStacks=null,
        /** @var array<TechnologyStack>|null */
        public ?array $favoriteTechStacks=null,
        /** @var array<Technology>|null */
        public ?array $favoriteTechnologies=null,
        /** @var UserActivity|null */
        public ?UserActivity $userActivity=null,
        /** @var array<OrganizationMember>|null */
        public ?array $members=null,
        /** @var array<OrganizationMemberInvite>|null */
        public ?array $memberInvites=null,
        /** @var array<OrganizationSubscription>|null */
        public ?array $subscriptions=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['created'])) $this->created = JsonConverters::from('DateTime', $o['created']);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['referrerUrl'])) $this->referrerUrl = $o['referrerUrl'];
        if (isset($o['userAuthId'])) $this->userAuthId = $o['userAuthId'];
        if (isset($o['userAuthName'])) $this->userAuthName = $o['userAuthName'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['displayName'])) $this->displayName = $o['displayName'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['createdAt'])) $this->createdAt = JsonConverters::from('DateTime', $o['createdAt']);
        if (isset($o['lastModified'])) $this->lastModified = JsonConverters::from('DateTime', $o['lastModified']);
        if (isset($o['roles'])) $this->roles = JsonConverters::fromArray('string', $o['roles']);
        if (isset($o['permissions'])) $this->permissions = JsonConverters::fromArray('string', $o['permissions']);
        if (isset($o['isAuthenticated'])) $this->isAuthenticated = $o['isAuthenticated'];
        if (isset($o['authProvider'])) $this->authProvider = $o['authProvider'];
        if (isset($o['profileUrl'])) $this->profileUrl = $o['profileUrl'];
        if (isset($o['githubProfileUrl'])) $this->githubProfileUrl = $o['githubProfileUrl'];
        if (isset($o['twitterProfileUrl'])) $this->twitterProfileUrl = $o['twitterProfileUrl'];
        if (isset($o['accessToken'])) $this->accessToken = $o['accessToken'];
        if (isset($o['avatarUrl'])) $this->avatarUrl = $o['avatarUrl'];
        if (isset($o['techStacks'])) $this->techStacks = JsonConverters::fromArray('TechnologyStack', $o['techStacks']);
        if (isset($o['favoriteTechStacks'])) $this->favoriteTechStacks = JsonConverters::fromArray('TechnologyStack', $o['favoriteTechStacks']);
        if (isset($o['favoriteTechnologies'])) $this->favoriteTechnologies = JsonConverters::fromArray('Technology', $o['favoriteTechnologies']);
        if (isset($o['userActivity'])) $this->userActivity = JsonConverters::from('UserActivity', $o['userActivity']);
        if (isset($o['members'])) $this->members = JsonConverters::fromArray('OrganizationMember', $o['members']);
        if (isset($o['memberInvites'])) $this->memberInvites = JsonConverters::fromArray('OrganizationMemberInvite', $o['memberInvites']);
        if (isset($o['subscriptions'])) $this->subscriptions = JsonConverters::fromArray('OrganizationSubscription', $o['subscriptions']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->created)) $o['created'] = JsonConverters::to('DateTime', $this->created);
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->referrerUrl)) $o['referrerUrl'] = $this->referrerUrl;
        if (isset($this->userAuthId)) $o['userAuthId'] = $this->userAuthId;
        if (isset($this->userAuthName)) $o['userAuthName'] = $this->userAuthName;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->displayName)) $o['displayName'] = $this->displayName;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->createdAt)) $o['createdAt'] = JsonConverters::to('DateTime', $this->createdAt);
        if (isset($this->lastModified)) $o['lastModified'] = JsonConverters::to('DateTime', $this->lastModified);
        if (isset($this->roles)) $o['roles'] = JsonConverters::toArray('string', $this->roles);
        if (isset($this->permissions)) $o['permissions'] = JsonConverters::toArray('string', $this->permissions);
        if (isset($this->isAuthenticated)) $o['isAuthenticated'] = $this->isAuthenticated;
        if (isset($this->authProvider)) $o['authProvider'] = $this->authProvider;
        if (isset($this->profileUrl)) $o['profileUrl'] = $this->profileUrl;
        if (isset($this->githubProfileUrl)) $o['githubProfileUrl'] = $this->githubProfileUrl;
        if (isset($this->twitterProfileUrl)) $o['twitterProfileUrl'] = $this->twitterProfileUrl;
        if (isset($this->accessToken)) $o['accessToken'] = $this->accessToken;
        if (isset($this->avatarUrl)) $o['avatarUrl'] = $this->avatarUrl;
        if (isset($this->techStacks)) $o['techStacks'] = JsonConverters::toArray('TechnologyStack', $this->techStacks);
        if (isset($this->favoriteTechStacks)) $o['favoriteTechStacks'] = JsonConverters::toArray('TechnologyStack', $this->favoriteTechStacks);
        if (isset($this->favoriteTechnologies)) $o['favoriteTechnologies'] = JsonConverters::toArray('Technology', $this->favoriteTechnologies);
        if (isset($this->userActivity)) $o['userActivity'] = JsonConverters::to('UserActivity', $this->userActivity);
        if (isset($this->members)) $o['members'] = JsonConverters::toArray('OrganizationMember', $this->members);
        if (isset($this->memberInvites)) $o['memberInvites'] = JsonConverters::toArray('OrganizationMemberInvite', $this->memberInvites);
        if (isset($this->subscriptions)) $o['subscriptions'] = JsonConverters::toArray('OrganizationSubscription', $this->subscriptions);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class GetTechnologyPreviousVersionsResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<TechnologyHistory>|null */
        public ?array $results=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('TechnologyHistory', $o['results']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('TechnologyHistory', $this->results);
        return empty($o) ? new class(){} : $o;
    }
}

class GetAllTechnologiesResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<Technology>|null */
        public ?array $results=null,
        /** @var int */
        public int $total=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('Technology', $o['results']);
        if (isset($o['total'])) $this->total = $o['total'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('Technology', $this->results);
        if (isset($this->total)) $o['total'] = $this->total;
        return empty($o) ? new class(){} : $o;
    }
}

class GetTechnologyResponse implements JsonSerializable
{
    public function __construct(
        /** @var DateTime */
        public DateTime $created=new DateTime(),
        /** @var Technology|null */
        public ?Technology $technology=null,
        /** @var array<TechnologyStack>|null */
        public ?array $technologyStacks=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['created'])) $this->created = JsonConverters::from('DateTime', $o['created']);
        if (isset($o['technology'])) $this->technology = JsonConverters::from('Technology', $o['technology']);
        if (isset($o['technologyStacks'])) $this->technologyStacks = JsonConverters::fromArray('TechnologyStack', $o['technologyStacks']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->created)) $o['created'] = JsonConverters::to('DateTime', $this->created);
        if (isset($this->technology)) $o['technology'] = JsonConverters::to('Technology', $this->technology);
        if (isset($this->technologyStacks)) $o['technologyStacks'] = JsonConverters::toArray('TechnologyStack', $this->technologyStacks);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class GetTechnologyFavoriteDetailsResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<string>|null */
        public ?array $users=null,
        /** @var int */
        public int $favoriteCount=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['users'])) $this->users = JsonConverters::fromArray('string', $o['users']);
        if (isset($o['favoriteCount'])) $this->favoriteCount = $o['favoriteCount'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->users)) $o['users'] = JsonConverters::toArray('string', $this->users);
        if (isset($this->favoriteCount)) $o['favoriteCount'] = $this->favoriteCount;
        return empty($o) ? new class(){} : $o;
    }
}

class CreateTechnologyResponse implements JsonSerializable
{
    public function __construct(
        /** @var Technology|null */
        public ?Technology $result=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = JsonConverters::from('Technology', $o['result']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = JsonConverters::to('Technology', $this->result);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class UpdateTechnologyResponse implements JsonSerializable
{
    public function __construct(
        /** @var Technology|null */
        public ?Technology $result=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = JsonConverters::from('Technology', $o['result']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = JsonConverters::to('Technology', $this->result);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class DeleteTechnologyResponse implements JsonSerializable
{
    public function __construct(
        /** @var Technology|null */
        public ?Technology $result=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = JsonConverters::from('Technology', $o['result']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = JsonConverters::to('Technology', $this->result);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class GetTechnologyStackPreviousVersionsResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<TechnologyStackHistory>|null */
        public ?array $results=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('TechnologyStackHistory', $o['results']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('TechnologyStackHistory', $this->results);
        return empty($o) ? new class(){} : $o;
    }
}

class GetPageStatsResponse implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $type=null,
        /** @var string|null */
        public ?string $slug=null,
        /** @var int */
        public int $viewCount=0,
        /** @var int */
        public int $favCount=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['type'])) $this->type = $o['type'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['viewCount'])) $this->viewCount = $o['viewCount'];
        if (isset($o['favCount'])) $this->favCount = $o['favCount'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->type)) $o['type'] = $this->type;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->viewCount)) $o['viewCount'] = $this->viewCount;
        if (isset($this->favCount)) $o['favCount'] = $this->favCount;
        return empty($o) ? new class(){} : $o;
    }
}

class OverviewResponse implements JsonSerializable
{
    public function __construct(
        /** @var DateTime */
        public DateTime $created=new DateTime(),
        /** @var array<UserInfo>|null */
        public ?array $topUsers=null,
        /** @var array<TechnologyInfo>|null */
        public ?array $topTechnologies=null,
        /** @var array<TechStackDetails>|null */
        public ?array $latestTechStacks=null,
        /** @var array<TechnologyStack>|null */
        public ?array $popularTechStacks=null,
        /** @var array<OrganizationInfo>|null */
        public ?array $allOrganizations=null,
        /** @var array<string,TechnologyInfo[]>|null */
        public ?array $topTechnologiesByTier=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['created'])) $this->created = JsonConverters::from('DateTime', $o['created']);
        if (isset($o['topUsers'])) $this->topUsers = JsonConverters::fromArray('UserInfo', $o['topUsers']);
        if (isset($o['topTechnologies'])) $this->topTechnologies = JsonConverters::fromArray('TechnologyInfo', $o['topTechnologies']);
        if (isset($o['latestTechStacks'])) $this->latestTechStacks = JsonConverters::fromArray('TechStackDetails', $o['latestTechStacks']);
        if (isset($o['popularTechStacks'])) $this->popularTechStacks = JsonConverters::fromArray('TechnologyStack', $o['popularTechStacks']);
        if (isset($o['allOrganizations'])) $this->allOrganizations = JsonConverters::fromArray('OrganizationInfo', $o['allOrganizations']);
        if (isset($o['topTechnologiesByTier'])) $this->topTechnologiesByTier = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','List<TechnologyInfo>']), $o['topTechnologiesByTier']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->created)) $o['created'] = JsonConverters::to('DateTime', $this->created);
        if (isset($this->topUsers)) $o['topUsers'] = JsonConverters::toArray('UserInfo', $this->topUsers);
        if (isset($this->topTechnologies)) $o['topTechnologies'] = JsonConverters::toArray('TechnologyInfo', $this->topTechnologies);
        if (isset($this->latestTechStacks)) $o['latestTechStacks'] = JsonConverters::toArray('TechStackDetails', $this->latestTechStacks);
        if (isset($this->popularTechStacks)) $o['popularTechStacks'] = JsonConverters::toArray('TechnologyStack', $this->popularTechStacks);
        if (isset($this->allOrganizations)) $o['allOrganizations'] = JsonConverters::toArray('OrganizationInfo', $this->allOrganizations);
        if (isset($this->topTechnologiesByTier)) $o['topTechnologiesByTier'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','List<TechnologyInfo>']), $this->topTechnologiesByTier);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class AppOverviewResponse implements JsonSerializable
{
    public function __construct(
        /** @var DateTime */
        public DateTime $created=new DateTime(),
        /** @var array<Option>|null */
        public ?array $allTiers=null,
        /** @var array<TechnologyInfo>|null */
        public ?array $topTechnologies=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['created'])) $this->created = JsonConverters::from('DateTime', $o['created']);
        if (isset($o['allTiers'])) $this->allTiers = JsonConverters::fromArray('Option', $o['allTiers']);
        if (isset($o['topTechnologies'])) $this->topTechnologies = JsonConverters::fromArray('TechnologyInfo', $o['topTechnologies']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->created)) $o['created'] = JsonConverters::to('DateTime', $this->created);
        if (isset($this->allTiers)) $o['allTiers'] = JsonConverters::toArray('Option', $this->allTiers);
        if (isset($this->topTechnologies)) $o['topTechnologies'] = JsonConverters::toArray('TechnologyInfo', $this->topTechnologies);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class GetAllTechnologyStacksResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<TechnologyStack>|null */
        public ?array $results=null,
        /** @var int */
        public int $total=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('TechnologyStack', $o['results']);
        if (isset($o['total'])) $this->total = $o['total'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('TechnologyStack', $this->results);
        if (isset($this->total)) $o['total'] = $this->total;
        return empty($o) ? new class(){} : $o;
    }
}

class GetTechnologyStackResponse implements JsonSerializable
{
    public function __construct(
        /** @var DateTime */
        public DateTime $created=new DateTime(),
        /** @var TechStackDetails|null */
        public ?TechStackDetails $result=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['created'])) $this->created = JsonConverters::from('DateTime', $o['created']);
        if (isset($o['result'])) $this->result = JsonConverters::from('TechStackDetails', $o['result']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->created)) $o['created'] = JsonConverters::to('DateTime', $this->created);
        if (isset($this->result)) $o['result'] = JsonConverters::to('TechStackDetails', $this->result);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class GetTechnologyStackFavoriteDetailsResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<string>|null */
        public ?array $users=null,
        /** @var int */
        public int $favoriteCount=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['users'])) $this->users = JsonConverters::fromArray('string', $o['users']);
        if (isset($o['favoriteCount'])) $this->favoriteCount = $o['favoriteCount'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->users)) $o['users'] = JsonConverters::toArray('string', $this->users);
        if (isset($this->favoriteCount)) $o['favoriteCount'] = $this->favoriteCount;
        return empty($o) ? new class(){} : $o;
    }
}

class GetConfigResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<Option>|null */
        public ?array $allTiers=null,
        /** @var array<Option>|null */
        public ?array $allPostTypes=null,
        /** @var array<Option>|null */
        public ?array $allFlagTypes=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['allTiers'])) $this->allTiers = JsonConverters::fromArray('Option', $o['allTiers']);
        if (isset($o['allPostTypes'])) $this->allPostTypes = JsonConverters::fromArray('Option', $o['allPostTypes']);
        if (isset($o['allFlagTypes'])) $this->allFlagTypes = JsonConverters::fromArray('Option', $o['allFlagTypes']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->allTiers)) $o['allTiers'] = JsonConverters::toArray('Option', $this->allTiers);
        if (isset($this->allPostTypes)) $o['allPostTypes'] = JsonConverters::toArray('Option', $this->allPostTypes);
        if (isset($this->allFlagTypes)) $o['allFlagTypes'] = JsonConverters::toArray('Option', $this->allFlagTypes);
        return empty($o) ? new class(){} : $o;
    }
}

class CreateTechnologyStackResponse implements JsonSerializable
{
    public function __construct(
        /** @var TechStackDetails|null */
        public ?TechStackDetails $result=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = JsonConverters::from('TechStackDetails', $o['result']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = JsonConverters::to('TechStackDetails', $this->result);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class UpdateTechnologyStackResponse implements JsonSerializable
{
    public function __construct(
        /** @var TechStackDetails|null */
        public ?TechStackDetails $result=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = JsonConverters::from('TechStackDetails', $o['result']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = JsonConverters::to('TechStackDetails', $this->result);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class DeleteTechnologyStackResponse implements JsonSerializable
{
    public function __construct(
        /** @var TechStackDetails|null */
        public ?TechStackDetails $result=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = JsonConverters::from('TechStackDetails', $o['result']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = JsonConverters::to('TechStackDetails', $this->result);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class GetFavoriteTechStackResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<TechnologyStack>|null */
        public ?array $results=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('TechnologyStack', $o['results']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('TechnologyStack', $this->results);
        return empty($o) ? new class(){} : $o;
    }
}

class FavoriteTechStackResponse implements JsonSerializable
{
    public function __construct(
        /** @var TechnologyStack|null */
        public ?TechnologyStack $result=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = JsonConverters::from('TechnologyStack', $o['result']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = JsonConverters::to('TechnologyStack', $this->result);
        return empty($o) ? new class(){} : $o;
    }
}

class GetFavoriteTechnologiesResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<Technology>|null */
        public ?array $results=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('Technology', $o['results']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('Technology', $this->results);
        return empty($o) ? new class(){} : $o;
    }
}

class FavoriteTechnologyResponse implements JsonSerializable
{
    public function __construct(
        /** @var Technology|null */
        public ?Technology $result=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = JsonConverters::from('Technology', $o['result']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = JsonConverters::to('Technology', $this->result);
        return empty($o) ? new class(){} : $o;
    }
}

class GetUserFeedResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<TechStackDetails>|null */
        public ?array $results=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('TechStackDetails', $o['results']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('TechStackDetails', $this->results);
        return empty($o) ? new class(){} : $o;
    }
}

class GetUsersKarmaResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<string,int>|null */
        public ?array $results=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['int','int']), $o['results']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['int','int']), $this->results);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class GetUserInfoResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $userName=null,
        /** @var DateTime */
        public DateTime $created=new DateTime(),
        /** @var string|null */
        public ?string $avatarUrl=null,
        /** @var array<TechnologyStack>|null */
        public ?array $techStacks=null,
        /** @var array<TechnologyStack>|null */
        public ?array $favoriteTechStacks=null,
        /** @var array<Technology>|null */
        public ?array $favoriteTechnologies=null,
        /** @var UserActivity|null */
        public ?UserActivity $userActivity=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['created'])) $this->created = JsonConverters::from('DateTime', $o['created']);
        if (isset($o['avatarUrl'])) $this->avatarUrl = $o['avatarUrl'];
        if (isset($o['techStacks'])) $this->techStacks = JsonConverters::fromArray('TechnologyStack', $o['techStacks']);
        if (isset($o['favoriteTechStacks'])) $this->favoriteTechStacks = JsonConverters::fromArray('TechnologyStack', $o['favoriteTechStacks']);
        if (isset($o['favoriteTechnologies'])) $this->favoriteTechnologies = JsonConverters::fromArray('Technology', $o['favoriteTechnologies']);
        if (isset($o['userActivity'])) $this->userActivity = JsonConverters::from('UserActivity', $o['userActivity']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->created)) $o['created'] = JsonConverters::to('DateTime', $this->created);
        if (isset($this->avatarUrl)) $o['avatarUrl'] = $this->avatarUrl;
        if (isset($this->techStacks)) $o['techStacks'] = JsonConverters::toArray('TechnologyStack', $this->techStacks);
        if (isset($this->favoriteTechStacks)) $o['favoriteTechStacks'] = JsonConverters::toArray('TechnologyStack', $this->favoriteTechStacks);
        if (isset($this->favoriteTechnologies)) $o['favoriteTechnologies'] = JsonConverters::toArray('Technology', $this->favoriteTechnologies);
        if (isset($this->userActivity)) $o['userActivity'] = JsonConverters::to('UserActivity', $this->userActivity);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class SyncDiscourseSiteResponse implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $timeTaken=null,
        /** @var array<string>|null */
        public ?array $userLogs=null,
        /** @var array<string>|null */
        public ?array $postsLogs=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['timeTaken'])) $this->timeTaken = $o['timeTaken'];
        if (isset($o['userLogs'])) $this->userLogs = JsonConverters::fromArray('string', $o['userLogs']);
        if (isset($o['postsLogs'])) $this->postsLogs = JsonConverters::fromArray('string', $o['postsLogs']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->timeTaken)) $o['timeTaken'] = $this->timeTaken;
        if (isset($this->userLogs)) $o['userLogs'] = JsonConverters::toArray('string', $this->userLogs);
        if (isset($this->postsLogs)) $o['postsLogs'] = JsonConverters::toArray('string', $this->postsLogs);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class LogoUrlApprovalResponse implements JsonSerializable
{
    public function __construct(
        /** @var Technology|null */
        public ?Technology $result=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = JsonConverters::from('Technology', $o['result']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = JsonConverters::to('Technology', $this->result);
        return empty($o) ? new class(){} : $o;
    }
}

class LockStackResponse implements JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
}

class EmailTestRespoonse implements JsonSerializable
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

class ImportUserResponse implements JsonSerializable
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

class ImportUserVoiceSuggestionResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $postId=0,
        /** @var string|null */
        public ?string $postSlug=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['postId'])) $this->postId = $o['postId'];
        if (isset($o['postSlug'])) $this->postSlug = $o['postSlug'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->postId)) $o['postId'] = $this->postId;
        if (isset($this->postSlug)) $o['postSlug'] = $this->postSlug;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

// @Route("/ping")
class Ping implements JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'Ping'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

// @Route("/orgs/{Id}", "GET")
#[Returns('GetOrganizationResponse')]
class GetOrganization implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $id=null
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
    public function getTypeName(): string { return 'GetOrganization'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetOrganizationResponse(); }
}

// @Route("/organizations/{Slug}", "GET")
#[Returns('GetOrganizationResponse')]
class GetOrganizationBySlug implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $slug=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['slug'])) $this->slug = $o['slug'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->slug)) $o['slug'] = $this->slug;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetOrganizationBySlug'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetOrganizationResponse(); }
}

// @Route("/orgs/{Id}/members", "GET")
#[Returns('GetOrganizationMembersResponse')]
class GetOrganizationMembers implements IReturn, IGet, JsonSerializable
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
    public function getTypeName(): string { return 'GetOrganizationMembers'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetOrganizationMembersResponse(); }
}

// @Route("/orgs/{Id}/admin", "GET")
#[Returns('GetOrganizationAdminResponse')]
class GetOrganizationAdmin implements IReturn, IGet, JsonSerializable
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
    public function getTypeName(): string { return 'GetOrganizationAdmin'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetOrganizationAdminResponse(); }
}

// @Route("/orgs/posts/new", "POST")
#[Returns('CreateOrganizationForTechnologyResponse')]
class CreateOrganizationForTechnology implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $technologyId=null,
        /** @var int|null */
        public ?int $techStackId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['technologyId'])) $this->technologyId = $o['technologyId'];
        if (isset($o['techStackId'])) $this->techStackId = $o['techStackId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->technologyId)) $o['technologyId'] = $this->technologyId;
        if (isset($this->techStackId)) $o['techStackId'] = $this->techStackId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CreateOrganizationForTechnology'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new CreateOrganizationForTechnologyResponse(); }
}

// @Route("/orgs", "POST")
#[Returns('CreateOrganizationResponse')]
class CreateOrganization implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $slug=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var int|null */
        public ?int $refId=null,
        /** @var string|null */
        public ?string $refSource=null,
        /** @var string|null */
        public ?string $refUrn=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['refSource'])) $this->refSource = $o['refSource'];
        if (isset($o['refUrn'])) $this->refUrn = $o['refUrn'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->refSource)) $o['refSource'] = $this->refSource;
        if (isset($this->refUrn)) $o['refUrn'] = $this->refUrn;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CreateOrganization'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new CreateOrganizationResponse(); }
}

// @Route("/orgs/{Id}", "PUT")
#[Returns('UpdateOrganizationResponse')]
class UpdateOrganization implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $slug=null,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var string|null */
        public ?string $color=null,
        /** @var string|null */
        public ?string $textColor=null,
        /** @var string|null */
        public ?string $linkColor=null,
        /** @var string|null */
        public ?string $backgroundColor=null,
        /** @var string|null */
        public ?string $backgroundUrl=null,
        /** @var string|null */
        public ?string $logoUrl=null,
        /** @var string|null */
        public ?string $heroUrl=null,
        /** @var string|null */
        public ?string $lang=null,
        /** @var int */
        public int $deletePostsWithReportCount=0,
        /** @var bool|null */
        public ?bool $disableInvites=null,
        /** @var string|null */
        public ?string $defaultPostType=null,
        /** @var string[]|null */
        public ?array $defaultSubscriptionPostTypes=null,
        /** @var string[]|null */
        public ?array $postTypes=null,
        /** @var string[]|null */
        public ?array $moderatorPostTypes=null,
        /** @var int[]|null */
        public ?array $technologyIds=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['color'])) $this->color = $o['color'];
        if (isset($o['textColor'])) $this->textColor = $o['textColor'];
        if (isset($o['linkColor'])) $this->linkColor = $o['linkColor'];
        if (isset($o['backgroundColor'])) $this->backgroundColor = $o['backgroundColor'];
        if (isset($o['backgroundUrl'])) $this->backgroundUrl = $o['backgroundUrl'];
        if (isset($o['logoUrl'])) $this->logoUrl = $o['logoUrl'];
        if (isset($o['heroUrl'])) $this->heroUrl = $o['heroUrl'];
        if (isset($o['lang'])) $this->lang = $o['lang'];
        if (isset($o['deletePostsWithReportCount'])) $this->deletePostsWithReportCount = $o['deletePostsWithReportCount'];
        if (isset($o['disableInvites'])) $this->disableInvites = $o['disableInvites'];
        if (isset($o['defaultPostType'])) $this->defaultPostType = $o['defaultPostType'];
        if (isset($o['defaultSubscriptionPostTypes'])) $this->defaultSubscriptionPostTypes = JsonConverters::fromArray('string', $o['defaultSubscriptionPostTypes']);
        if (isset($o['postTypes'])) $this->postTypes = JsonConverters::fromArray('string', $o['postTypes']);
        if (isset($o['moderatorPostTypes'])) $this->moderatorPostTypes = JsonConverters::fromArray('string', $o['moderatorPostTypes']);
        if (isset($o['technologyIds'])) $this->technologyIds = JsonConverters::fromArray('int', $o['technologyIds']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->color)) $o['color'] = $this->color;
        if (isset($this->textColor)) $o['textColor'] = $this->textColor;
        if (isset($this->linkColor)) $o['linkColor'] = $this->linkColor;
        if (isset($this->backgroundColor)) $o['backgroundColor'] = $this->backgroundColor;
        if (isset($this->backgroundUrl)) $o['backgroundUrl'] = $this->backgroundUrl;
        if (isset($this->logoUrl)) $o['logoUrl'] = $this->logoUrl;
        if (isset($this->heroUrl)) $o['heroUrl'] = $this->heroUrl;
        if (isset($this->lang)) $o['lang'] = $this->lang;
        if (isset($this->deletePostsWithReportCount)) $o['deletePostsWithReportCount'] = $this->deletePostsWithReportCount;
        if (isset($this->disableInvites)) $o['disableInvites'] = $this->disableInvites;
        if (isset($this->defaultPostType)) $o['defaultPostType'] = $this->defaultPostType;
        if (isset($this->defaultSubscriptionPostTypes)) $o['defaultSubscriptionPostTypes'] = JsonConverters::toArray('string', $this->defaultSubscriptionPostTypes);
        if (isset($this->postTypes)) $o['postTypes'] = JsonConverters::toArray('string', $this->postTypes);
        if (isset($this->moderatorPostTypes)) $o['moderatorPostTypes'] = JsonConverters::toArray('string', $this->moderatorPostTypes);
        if (isset($this->technologyIds)) $o['technologyIds'] = JsonConverters::toArray('int', $this->technologyIds);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'UpdateOrganization'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new UpdateOrganizationResponse(); }
}

// @Route("/orgs/{Id}", "DELETE")
class DeleteOrganization implements IReturnVoid, IDelete, JsonSerializable
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
    public function getTypeName(): string { return 'DeleteOrganization'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): void {}
}

// @Route("/orgs/{Id}/lock", "PUT")
class LockOrganization implements IReturnVoid, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var bool|null */
        public ?bool $lock=null,
        /** @var string|null */
        public ?string $reason=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['lock'])) $this->lock = $o['lock'];
        if (isset($o['reason'])) $this->reason = $o['reason'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->lock)) $o['lock'] = $this->lock;
        if (isset($this->reason)) $o['reason'] = $this->reason;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'LockOrganization'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): void {}
}

// @Route("/orgs/{OrganizationId}/labels", "POST")
#[Returns('OrganizationLabelResponse')]
class AddOrganizationLabel implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0,
        /** @var string|null */
        public ?string $slug=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var string|null */
        public ?string $color=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['color'])) $this->color = $o['color'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->color)) $o['color'] = $this->color;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'AddOrganizationLabel'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new OrganizationLabelResponse(); }
}

// @Route("/orgs/{OrganizationId}/members/{Slug}", "PUT")
#[Returns('OrganizationLabelResponse')]
class UpdateOrganizationLabel implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0,
        /** @var string|null */
        public ?string $slug=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var string|null */
        public ?string $color=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['color'])) $this->color = $o['color'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->color)) $o['color'] = $this->color;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'UpdateOrganizationLabel'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new OrganizationLabelResponse(); }
}

// @Route("/orgs/{OrganizationId}/labels/{Slug}", "DELETE")
class RemoveOrganizationLabel implements IReturnVoid, IDelete, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0,
        /** @var string|null */
        public ?string $slug=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'RemoveOrganizationLabel'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): void {}
}

// @Route("/orgs/{OrganizationId}/categories", "POST")
#[Returns('AddOrganizationCategoryResponse')]
class AddOrganizationCategory implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0,
        /** @var string|null */
        public ?string $slug=null,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var int[]|null */
        public ?array $technologyIds=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['technologyIds'])) $this->technologyIds = JsonConverters::fromArray('int', $o['technologyIds']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->technologyIds)) $o['technologyIds'] = JsonConverters::toArray('int', $this->technologyIds);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'AddOrganizationCategory'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new AddOrganizationCategoryResponse(); }
}

// @Route("/orgs/{OrganizationId}/categories/{Id}", "PUT")
#[Returns('UpdateOrganizationCategoryResponse')]
class UpdateOrganizationCategory implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0,
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $slug=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var int[]|null */
        public ?array $technologyIds=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['technologyIds'])) $this->technologyIds = JsonConverters::fromArray('int', $o['technologyIds']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->technologyIds)) $o['technologyIds'] = JsonConverters::toArray('int', $this->technologyIds);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'UpdateOrganizationCategory'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new UpdateOrganizationCategoryResponse(); }
}

// @Route("/orgs/{OrganizationId}/categories/{Id}", "DELETE")
class DeleteOrganizationCategory implements IReturnVoid, IDelete, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0,
        /** @var int */
        public int $id=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'DeleteOrganizationCategory'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): void {}
}

// @Route("/orgs/{OrganizationId}/members", "POST")
#[Returns('AddOrganizationMemberResponse')]
class AddOrganizationMember implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0,
        /** @var string|null */
        public ?string $userName=null,
        /** @var bool|null */
        public ?bool $isOwner=null,
        /** @var bool|null */
        public ?bool $isModerator=null,
        /** @var bool|null */
        public ?bool $denyPosts=null,
        /** @var bool|null */
        public ?bool $denyComments=null,
        /** @var bool|null */
        public ?bool $denyAll=null,
        /** @var string|null */
        public ?string $notes=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['isOwner'])) $this->isOwner = $o['isOwner'];
        if (isset($o['isModerator'])) $this->isModerator = $o['isModerator'];
        if (isset($o['denyPosts'])) $this->denyPosts = $o['denyPosts'];
        if (isset($o['denyComments'])) $this->denyComments = $o['denyComments'];
        if (isset($o['denyAll'])) $this->denyAll = $o['denyAll'];
        if (isset($o['notes'])) $this->notes = $o['notes'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->isOwner)) $o['isOwner'] = $this->isOwner;
        if (isset($this->isModerator)) $o['isModerator'] = $this->isModerator;
        if (isset($this->denyPosts)) $o['denyPosts'] = $this->denyPosts;
        if (isset($this->denyComments)) $o['denyComments'] = $this->denyComments;
        if (isset($this->denyAll)) $o['denyAll'] = $this->denyAll;
        if (isset($this->notes)) $o['notes'] = $this->notes;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'AddOrganizationMember'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new AddOrganizationMemberResponse(); }
}

// @Route("/orgs/{OrganizationId}/members/{Id}", "PUT")
#[Returns('UpdateOrganizationMemberResponse')]
class UpdateOrganizationMember implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0,
        /** @var int */
        public int $userId=0,
        /** @var bool|null */
        public ?bool $isOwner=null,
        /** @var bool|null */
        public ?bool $isModerator=null,
        /** @var bool|null */
        public ?bool $denyPosts=null,
        /** @var bool|null */
        public ?bool $denyComments=null,
        /** @var bool|null */
        public ?bool $denyAll=null,
        /** @var string|null */
        public ?string $notes=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['userId'])) $this->userId = $o['userId'];
        if (isset($o['isOwner'])) $this->isOwner = $o['isOwner'];
        if (isset($o['isModerator'])) $this->isModerator = $o['isModerator'];
        if (isset($o['denyPosts'])) $this->denyPosts = $o['denyPosts'];
        if (isset($o['denyComments'])) $this->denyComments = $o['denyComments'];
        if (isset($o['denyAll'])) $this->denyAll = $o['denyAll'];
        if (isset($o['notes'])) $this->notes = $o['notes'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->userId)) $o['userId'] = $this->userId;
        if (isset($this->isOwner)) $o['isOwner'] = $this->isOwner;
        if (isset($this->isModerator)) $o['isModerator'] = $this->isModerator;
        if (isset($this->denyPosts)) $o['denyPosts'] = $this->denyPosts;
        if (isset($this->denyComments)) $o['denyComments'] = $this->denyComments;
        if (isset($this->denyAll)) $o['denyAll'] = $this->denyAll;
        if (isset($this->notes)) $o['notes'] = $this->notes;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'UpdateOrganizationMember'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new UpdateOrganizationMemberResponse(); }
}

// @Route("/orgs/{OrganizationId}/members/{UserId}", "DELETE")
class RemoveOrganizationMember implements IReturnVoid, IDelete, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0,
        /** @var int */
        public int $userId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['userId'])) $this->userId = $o['userId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->userId)) $o['userId'] = $this->userId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'RemoveOrganizationMember'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): void {}
}

// @Route("/orgs/{OrganizationId}/members/set", "POST")
#[Returns('SetOrganizationMembersResponse')]
class SetOrganizationMembers implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0,
        /** @var string[]|null */
        public ?array $githubUserNames=null,
        /** @var string[]|null */
        public ?array $twitterUserNames=null,
        /** @var string[]|null */
        public ?array $emails=null,
        /** @var bool|null */
        public ?bool $removeUnspecifiedMembers=null,
        /** @var bool|null */
        public ?bool $isOwner=null,
        /** @var bool|null */
        public ?bool $isModerator=null,
        /** @var bool|null */
        public ?bool $denyPosts=null,
        /** @var bool|null */
        public ?bool $denyComments=null,
        /** @var bool|null */
        public ?bool $denyAll=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['githubUserNames'])) $this->githubUserNames = JsonConverters::fromArray('string', $o['githubUserNames']);
        if (isset($o['twitterUserNames'])) $this->twitterUserNames = JsonConverters::fromArray('string', $o['twitterUserNames']);
        if (isset($o['emails'])) $this->emails = JsonConverters::fromArray('string', $o['emails']);
        if (isset($o['removeUnspecifiedMembers'])) $this->removeUnspecifiedMembers = $o['removeUnspecifiedMembers'];
        if (isset($o['isOwner'])) $this->isOwner = $o['isOwner'];
        if (isset($o['isModerator'])) $this->isModerator = $o['isModerator'];
        if (isset($o['denyPosts'])) $this->denyPosts = $o['denyPosts'];
        if (isset($o['denyComments'])) $this->denyComments = $o['denyComments'];
        if (isset($o['denyAll'])) $this->denyAll = $o['denyAll'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->githubUserNames)) $o['githubUserNames'] = JsonConverters::toArray('string', $this->githubUserNames);
        if (isset($this->twitterUserNames)) $o['twitterUserNames'] = JsonConverters::toArray('string', $this->twitterUserNames);
        if (isset($this->emails)) $o['emails'] = JsonConverters::toArray('string', $this->emails);
        if (isset($this->removeUnspecifiedMembers)) $o['removeUnspecifiedMembers'] = $this->removeUnspecifiedMembers;
        if (isset($this->isOwner)) $o['isOwner'] = $this->isOwner;
        if (isset($this->isModerator)) $o['isModerator'] = $this->isModerator;
        if (isset($this->denyPosts)) $o['denyPosts'] = $this->denyPosts;
        if (isset($this->denyComments)) $o['denyComments'] = $this->denyComments;
        if (isset($this->denyAll)) $o['denyAll'] = $this->denyAll;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'SetOrganizationMembers'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new SetOrganizationMembersResponse(); }
}

// @Route("/orgs/{OrganizationId}/invites", "GET")
#[Returns('GetOrganizationMemberInvitesResponse')]
class GetOrganizationMemberInvites implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetOrganizationMemberInvites'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetOrganizationMemberInvitesResponse(); }
}

// @Route("/orgs/{OrganizationId}/invites", "POST")
#[Returns('RequestOrganizationMemberInviteResponse')]
class RequestOrganizationMemberInvite implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'RequestOrganizationMemberInvite'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new RequestOrganizationMemberInviteResponse(); }
}

// @Route("/orgs/{OrganizationId}/invites/{UserId}", "PUT")
#[Returns('UpdateOrganizationMemberInviteResponse')]
class UpdateOrganizationMemberInvite implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0,
        /** @var string|null */
        public ?string $userName=null,
        /** @var bool|null */
        public ?bool $approve=null,
        /** @var bool|null */
        public ?bool $dismiss=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['approve'])) $this->approve = $o['approve'];
        if (isset($o['dismiss'])) $this->dismiss = $o['dismiss'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->approve)) $o['approve'] = $this->approve;
        if (isset($this->dismiss)) $o['dismiss'] = $this->dismiss;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'UpdateOrganizationMemberInvite'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new UpdateOrganizationMemberInviteResponse(); }
}

// @Route("/posts", "GET")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Post
 */
class QueryPosts extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int[]|null */
        public ?array $ids=null,
        /** @var int|null */
        public ?int $organizationId=null,
        /** @var array<int>|null */
        public ?array $organizationIds=null,
        /** @var array<string>|null */
        public ?array $types=null,
        /** @var array<int>|null */
        public ?array $anyTechnologyIds=null,
        /** @var string[]|null */
        public ?array $is=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['ids'])) $this->ids = JsonConverters::fromArray('int', $o['ids']);
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['organizationIds'])) $this->organizationIds = JsonConverters::fromArray('int', $o['organizationIds']);
        if (isset($o['types'])) $this->types = JsonConverters::fromArray('string', $o['types']);
        if (isset($o['anyTechnologyIds'])) $this->anyTechnologyIds = JsonConverters::fromArray('int', $o['anyTechnologyIds']);
        if (isset($o['is'])) $this->is = JsonConverters::fromArray('string', $o['is']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->ids)) $o['ids'] = JsonConverters::toArray('int', $this->ids);
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->organizationIds)) $o['organizationIds'] = JsonConverters::toArray('int', $this->organizationIds);
        if (isset($this->types)) $o['types'] = JsonConverters::toArray('string', $this->types);
        if (isset($this->anyTechnologyIds)) $o['anyTechnologyIds'] = JsonConverters::toArray('int', $this->anyTechnologyIds);
        if (isset($this->is)) $o['is'] = JsonConverters::toArray('string', $this->is);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryPosts'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Post']); }
}

// @Route("/posts/{Id}", "GET")
#[Returns('GetPostResponse')]
class GetPost implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $include=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['include'])) $this->include = $o['include'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->include)) $o['include'] = $this->include;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetPost'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetPostResponse(); }
}

// @Route("/posts", "POST")
#[Returns('CreatePostResponse')]
class CreatePost implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0,
        /** @var PostType|null */
        public ?PostType $type=null,
        /** @var int */
        public int $categoryId=0,
        /** @var string|null */
        public ?string $title=null,
        /** @var string|null */
        public ?string $url=null,
        /** @var string|null */
        public ?string $imageUrl=null,
        /** @var string|null */
        public ?string $content=null,
        /** @var bool|null */
        public ?bool $lock=null,
        /** @var int[]|null */
        public ?array $technologyIds=null,
        /** @var string[]|null */
        public ?array $labels=null,
        /** @var DateTime|null */
        public ?DateTime $fromDate=null,
        /** @var DateTime|null */
        public ?DateTime $toDate=null,
        /** @var string|null */
        public ?string $metaType=null,
        /** @var string|null */
        public ?string $meta=null,
        /** @var int|null */
        public ?int $refId=null,
        /** @var string|null */
        public ?string $refSource=null,
        /** @var string|null */
        public ?string $refUrn=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['type'])) $this->type = JsonConverters::from('PostType', $o['type']);
        if (isset($o['categoryId'])) $this->categoryId = $o['categoryId'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['url'])) $this->url = $o['url'];
        if (isset($o['imageUrl'])) $this->imageUrl = $o['imageUrl'];
        if (isset($o['content'])) $this->content = $o['content'];
        if (isset($o['lock'])) $this->lock = $o['lock'];
        if (isset($o['technologyIds'])) $this->technologyIds = JsonConverters::fromArray('int', $o['technologyIds']);
        if (isset($o['labels'])) $this->labels = JsonConverters::fromArray('string', $o['labels']);
        if (isset($o['fromDate'])) $this->fromDate = JsonConverters::from('DateTime', $o['fromDate']);
        if (isset($o['toDate'])) $this->toDate = JsonConverters::from('DateTime', $o['toDate']);
        if (isset($o['metaType'])) $this->metaType = $o['metaType'];
        if (isset($o['meta'])) $this->meta = $o['meta'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['refSource'])) $this->refSource = $o['refSource'];
        if (isset($o['refUrn'])) $this->refUrn = $o['refUrn'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->type)) $o['type'] = JsonConverters::to('PostType', $this->type);
        if (isset($this->categoryId)) $o['categoryId'] = $this->categoryId;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->url)) $o['url'] = $this->url;
        if (isset($this->imageUrl)) $o['imageUrl'] = $this->imageUrl;
        if (isset($this->content)) $o['content'] = $this->content;
        if (isset($this->lock)) $o['lock'] = $this->lock;
        if (isset($this->technologyIds)) $o['technologyIds'] = JsonConverters::toArray('int', $this->technologyIds);
        if (isset($this->labels)) $o['labels'] = JsonConverters::toArray('string', $this->labels);
        if (isset($this->fromDate)) $o['fromDate'] = JsonConverters::to('DateTime', $this->fromDate);
        if (isset($this->toDate)) $o['toDate'] = JsonConverters::to('DateTime', $this->toDate);
        if (isset($this->metaType)) $o['metaType'] = $this->metaType;
        if (isset($this->meta)) $o['meta'] = $this->meta;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->refSource)) $o['refSource'] = $this->refSource;
        if (isset($this->refUrn)) $o['refUrn'] = $this->refUrn;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CreatePost'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new CreatePostResponse(); }
}

// @Route("/posts/{Id}", "PUT")
#[Returns('UpdatePostResponse')]
class UpdatePost implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $organizationId=0,
        /** @var PostType|null */
        public ?PostType $type=null,
        /** @var int */
        public int $categoryId=0,
        /** @var string|null */
        public ?string $title=null,
        /** @var string|null */
        public ?string $url=null,
        /** @var string|null */
        public ?string $imageUrl=null,
        /** @var string|null */
        public ?string $content=null,
        /** @var bool|null */
        public ?bool $lock=null,
        /** @var int[]|null */
        public ?array $technologyIds=null,
        /** @var string[]|null */
        public ?array $labels=null,
        /** @var DateTime|null */
        public ?DateTime $fromDate=null,
        /** @var DateTime|null */
        public ?DateTime $toDate=null,
        /** @var string|null */
        public ?string $metaType=null,
        /** @var string|null */
        public ?string $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['type'])) $this->type = JsonConverters::from('PostType', $o['type']);
        if (isset($o['categoryId'])) $this->categoryId = $o['categoryId'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['url'])) $this->url = $o['url'];
        if (isset($o['imageUrl'])) $this->imageUrl = $o['imageUrl'];
        if (isset($o['content'])) $this->content = $o['content'];
        if (isset($o['lock'])) $this->lock = $o['lock'];
        if (isset($o['technologyIds'])) $this->technologyIds = JsonConverters::fromArray('int', $o['technologyIds']);
        if (isset($o['labels'])) $this->labels = JsonConverters::fromArray('string', $o['labels']);
        if (isset($o['fromDate'])) $this->fromDate = JsonConverters::from('DateTime', $o['fromDate']);
        if (isset($o['toDate'])) $this->toDate = JsonConverters::from('DateTime', $o['toDate']);
        if (isset($o['metaType'])) $this->metaType = $o['metaType'];
        if (isset($o['meta'])) $this->meta = $o['meta'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->type)) $o['type'] = JsonConverters::to('PostType', $this->type);
        if (isset($this->categoryId)) $o['categoryId'] = $this->categoryId;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->url)) $o['url'] = $this->url;
        if (isset($this->imageUrl)) $o['imageUrl'] = $this->imageUrl;
        if (isset($this->content)) $o['content'] = $this->content;
        if (isset($this->lock)) $o['lock'] = $this->lock;
        if (isset($this->technologyIds)) $o['technologyIds'] = JsonConverters::toArray('int', $this->technologyIds);
        if (isset($this->labels)) $o['labels'] = JsonConverters::toArray('string', $this->labels);
        if (isset($this->fromDate)) $o['fromDate'] = JsonConverters::to('DateTime', $this->fromDate);
        if (isset($this->toDate)) $o['toDate'] = JsonConverters::to('DateTime', $this->toDate);
        if (isset($this->metaType)) $o['metaType'] = $this->metaType;
        if (isset($this->meta)) $o['meta'] = $this->meta;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'UpdatePost'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new UpdatePostResponse(); }
}

// @Route("/posts/{Id}", "DELETE")
#[Returns('DeletePostResponse')]
class DeletePost implements IReturn, IDelete, JsonSerializable
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
    public function getTypeName(): string { return 'DeletePost'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new DeletePostResponse(); }
}

// @Route("/posts/{Id}/lock", "PUT")
class LockPost implements IReturnVoid, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var bool|null */
        public ?bool $lock=null,
        /** @var string|null */
        public ?string $reason=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['lock'])) $this->lock = $o['lock'];
        if (isset($o['reason'])) $this->reason = $o['reason'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->lock)) $o['lock'] = $this->lock;
        if (isset($this->reason)) $o['reason'] = $this->reason;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'LockPost'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): void {}
}

// @Route("/posts/{Id}/hide", "PUT")
class HidePost implements IReturnVoid, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var bool|null */
        public ?bool $hide=null,
        /** @var string|null */
        public ?string $reason=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['hide'])) $this->hide = $o['hide'];
        if (isset($o['reason'])) $this->reason = $o['reason'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->hide)) $o['hide'] = $this->hide;
        if (isset($this->reason)) $o['reason'] = $this->reason;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'HidePost'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): void {}
}

// @Route("/posts/{Id}/status/{Status}", "PUT")
class ChangeStatusPost implements IReturnVoid, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $status=null,
        /** @var string|null */
        public ?string $reason=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['status'])) $this->status = $o['status'];
        if (isset($o['reason'])) $this->reason = $o['reason'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->status)) $o['status'] = $this->status;
        if (isset($this->reason)) $o['reason'] = $this->reason;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ChangeStatusPost'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): void {}
}

// @Route("/posts/{PostId}/report/{Id}", "POST")
class ActionPostReport implements IReturnVoid, IPost, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $postId=0,
        /** @var int */
        public int $id=0,
        /** @var ReportAction|null */
        public ?ReportAction $reportAction=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['postId'])) $this->postId = $o['postId'];
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['reportAction'])) $this->reportAction = JsonConverters::from('ReportAction', $o['reportAction']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->postId)) $o['postId'] = $this->postId;
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->reportAction)) $o['reportAction'] = JsonConverters::to('ReportAction', $this->reportAction);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ActionPostReport'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): void {}
}

// @Route("/posts/{PostId}/comments", "POST")
#[Returns('CreatePostCommentResponse')]
class CreatePostComment implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $postId=0,
        /** @var int|null */
        public ?int $replyId=null,
        /** @var string|null */
        public ?string $content=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['postId'])) $this->postId = $o['postId'];
        if (isset($o['replyId'])) $this->replyId = $o['replyId'];
        if (isset($o['content'])) $this->content = $o['content'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->postId)) $o['postId'] = $this->postId;
        if (isset($this->replyId)) $o['replyId'] = $this->replyId;
        if (isset($this->content)) $o['content'] = $this->content;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CreatePostComment'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new CreatePostCommentResponse(); }
}

// @Route("/posts/{PostId}/comments/{Id}", "PUT")
#[Returns('UpdatePostCommentResponse')]
class UpdatePostComment implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $postId=0,
        /** @var string|null */
        public ?string $content=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['postId'])) $this->postId = $o['postId'];
        if (isset($o['content'])) $this->content = $o['content'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->postId)) $o['postId'] = $this->postId;
        if (isset($this->content)) $o['content'] = $this->content;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'UpdatePostComment'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new UpdatePostCommentResponse(); }
}

// @Route("/posts/{PostId}/comments/{Id}", "DELETE")
#[Returns('DeletePostCommentResponse')]
class DeletePostComment implements IReturn, IDelete, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $postId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['postId'])) $this->postId = $o['postId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->postId)) $o['postId'] = $this->postId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'DeletePostComment'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new DeletePostCommentResponse(); }
}

// @Route("/posts/{PostId}/comments/{PostCommentId}/report/{Id}", "POST")
class ActionPostCommentReport implements IReturnVoid, IPost, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $postCommentId=0,
        /** @var int */
        public int $postId=0,
        /** @var ReportAction|null */
        public ?ReportAction $reportAction=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['postCommentId'])) $this->postCommentId = $o['postCommentId'];
        if (isset($o['postId'])) $this->postId = $o['postId'];
        if (isset($o['reportAction'])) $this->reportAction = JsonConverters::from('ReportAction', $o['reportAction']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->postCommentId)) $o['postCommentId'] = $this->postCommentId;
        if (isset($this->postId)) $o['postId'] = $this->postId;
        if (isset($this->reportAction)) $o['reportAction'] = JsonConverters::to('ReportAction', $this->reportAction);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ActionPostCommentReport'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): void {}
}

// @Route("/user/comments/votes")
#[Returns('GetUserPostCommentVotesResponse')]
class GetUserPostCommentVotes implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $postId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['postId'])) $this->postId = $o['postId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->postId)) $o['postId'] = $this->postId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetUserPostCommentVotes'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetUserPostCommentVotesResponse(); }
}

// @Route("/posts/{PostId}/comments/{Id}/pin", "PUT")
#[Returns('PinPostCommentResponse')]
class PinPostComment implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $postId=0,
        /** @var bool|null */
        public ?bool $pin=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['postId'])) $this->postId = $o['postId'];
        if (isset($o['pin'])) $this->pin = $o['pin'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->postId)) $o['postId'] = $this->postId;
        if (isset($this->pin)) $o['pin'] = $this->pin;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'PinPostComment'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new PinPostCommentResponse(); }
}

// @Route("/users/by-email")
#[Returns('GetUsersByEmailsResponse')]
class GetUsersByEmails implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var string[]|null */
        public ?array $emails=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['emails'])) $this->emails = JsonConverters::fromArray('string', $o['emails']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->emails)) $o['emails'] = JsonConverters::toArray('string', $this->emails);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetUsersByEmails'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetUsersByEmailsResponse(); }
}

// @Route("/user/posts/activity")
#[Returns('GetUserPostActivityResponse')]
class GetUserPostActivity implements IReturn, IGet, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetUserPostActivity'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetUserPostActivityResponse(); }
}

// @Route("/user/organizations")
#[Returns('GetUserOrganizationsResponse')]
class GetUserOrganizations implements IReturn, IGet, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetUserOrganizations'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetUserOrganizationsResponse(); }
}

// @Route("/posts/{Id}/vote", "PUT")
#[Returns('UserPostVoteResponse')]
class UserPostVote implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $weight=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['weight'])) $this->weight = $o['weight'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->weight)) $o['weight'] = $this->weight;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'UserPostVote'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new UserPostVoteResponse(); }
}

// @Route("/posts/{Id}/favorite", "PUT")
#[Returns('UserPostFavoriteResponse')]
class UserPostFavorite implements IReturn, IPut, JsonSerializable
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
    public function getTypeName(): string { return 'UserPostFavorite'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new UserPostFavoriteResponse(); }
}

// @Route("/posts/{Id}/report", "PUT")
#[Returns('UserPostReportResponse')]
class UserPostReport implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var FlagType|null */
        public ?FlagType $flagType=null,
        /** @var string|null */
        public ?string $reportNotes=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['flagType'])) $this->flagType = JsonConverters::from('FlagType', $o['flagType']);
        if (isset($o['reportNotes'])) $this->reportNotes = $o['reportNotes'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->flagType)) $o['flagType'] = JsonConverters::to('FlagType', $this->flagType);
        if (isset($this->reportNotes)) $o['reportNotes'] = $this->reportNotes;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'UserPostReport'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new UserPostReportResponse(); }
}

// @Route("/posts/{PostId}/comments/{Id}", "GET")
#[Returns('UserPostCommentVoteResponse')]
class UserPostCommentVote implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $postId=0,
        /** @var int */
        public int $weight=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['postId'])) $this->postId = $o['postId'];
        if (isset($o['weight'])) $this->weight = $o['weight'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->postId)) $o['postId'] = $this->postId;
        if (isset($this->weight)) $o['weight'] = $this->weight;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'UserPostCommentVote'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new UserPostCommentVoteResponse(); }
}

// @Route("/posts/{PostId}/comments/{Id}/report", "PUT")
#[Returns('UserPostCommentReportResponse')]
class UserPostCommentReport implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $postId=0,
        /** @var FlagType|null */
        public ?FlagType $flagType=null,
        /** @var string|null */
        public ?string $reportNotes=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['postId'])) $this->postId = $o['postId'];
        if (isset($o['flagType'])) $this->flagType = JsonConverters::from('FlagType', $o['flagType']);
        if (isset($o['reportNotes'])) $this->reportNotes = $o['reportNotes'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->postId)) $o['postId'] = $this->postId;
        if (isset($this->flagType)) $o['flagType'] = JsonConverters::to('FlagType', $this->flagType);
        if (isset($this->reportNotes)) $o['reportNotes'] = $this->reportNotes;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'UserPostCommentReport'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new UserPostCommentReportResponse(); }
}

// @Route("/prerender/{Path*}", "PUT")
class StorePreRender implements IReturnVoid, IPut, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $path=null,
        /** @var ByteArray|null */
        public ?ByteArray $requestStream=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['path'])) $this->path = $o['path'];
        if (isset($o['requestStream'])) $this->requestStream = JsonConverters::from('ByteArray', $o['requestStream']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->path)) $o['path'] = $this->path;
        if (isset($this->requestStream)) $o['requestStream'] = JsonConverters::to('ByteArray', $this->requestStream);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'StorePreRender'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): void {}
}

// @Route("/prerender/{Path*}", "GET")
#[Returns('string')]
class GetPreRender implements IReturn, IGet, JsonSerializable
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
    public function getTypeName(): string { return 'GetPreRender'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return 'string'; }
}

// @Route("/my-session")
#[Returns('SessionInfoResponse')]
class SessionInfo implements IReturn, IGet, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'SessionInfo'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new SessionInfoResponse(); }
}

// @Route("/orgs/{OrganizationId}/subscribe", "PUT")
class SubscribeToOrganization implements IReturnVoid, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0,
        /** @var PostType[]|null */
        public ?array $postTypes=null,
        /** @var Frequency|null */
        public ?Frequency $frequency=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['postTypes'])) $this->postTypes = JsonConverters::fromArray('PostType', $o['postTypes']);
        if (isset($o['frequency'])) $this->frequency = JsonConverters::from('Frequency', $o['frequency']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->postTypes)) $o['postTypes'] = JsonConverters::toArray('PostType', $this->postTypes);
        if (isset($this->frequency)) $o['frequency'] = JsonConverters::to('Frequency', $this->frequency);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'SubscribeToOrganization'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): void {}
}

// @Route("/posts/{PostId}/subscribe", "PUT")
class SubscribeToPost implements IReturnVoid, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $postId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['postId'])) $this->postId = $o['postId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->postId)) $o['postId'] = $this->postId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'SubscribeToPost'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): void {}
}

// @Route("/orgs/{OrganizationId}/subscribe", "DELETE")
class DeleteOrganizationSubscription implements IReturnVoid, IDelete, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'DeleteOrganizationSubscription'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): void {}
}

// @Route("/posts/{PostId}/subscribe", "DELETE")
class DeletePostSubscription implements IReturnVoid, IDelete, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $postId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['postId'])) $this->postId = $o['postId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->postId)) $o['postId'] = $this->postId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'DeletePostSubscription'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): void {}
}

// @Route("/technology/{Slug}/previous-versions", "GET")
#[Returns('GetTechnologyPreviousVersionsResponse')]
class GetTechnologyPreviousVersions implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $slug=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['slug'])) $this->slug = $o['slug'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->slug)) $o['slug'] = $this->slug;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetTechnologyPreviousVersions'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetTechnologyPreviousVersionsResponse(); }
}

// @Route("/technology", "GET")
#[Returns('GetAllTechnologiesResponse')]
class GetAllTechnologies implements IReturn, IGet, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetAllTechnologies'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetAllTechnologiesResponse(); }
}

// @Route("/technology/search")
// @AutoQueryViewer(DefaultSearchField="Tier", DefaultSearchText="Data", DefaultSearchType="=", Description="Explore different Technologies", IconUrl="octicon:database", Title="Find Technologies")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Technology
 * @template QueryDb1 of TechnologyView
 */
class FindTechnologies extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var array<int>|null */
        public ?array $ids=null,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $vendorName=null,
        /** @var string|null */
        public ?string $nameContains=null,
        /** @var string|null */
        public ?string $vendorNameContains=null,
        /** @var string|null */
        public ?string $descriptionContains=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['ids'])) $this->ids = JsonConverters::fromArray('int', $o['ids']);
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['vendorName'])) $this->vendorName = $o['vendorName'];
        if (isset($o['nameContains'])) $this->nameContains = $o['nameContains'];
        if (isset($o['vendorNameContains'])) $this->vendorNameContains = $o['vendorNameContains'];
        if (isset($o['descriptionContains'])) $this->descriptionContains = $o['descriptionContains'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->ids)) $o['ids'] = JsonConverters::toArray('int', $this->ids);
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->vendorName)) $o['vendorName'] = $this->vendorName;
        if (isset($this->nameContains)) $o['nameContains'] = $this->nameContains;
        if (isset($this->vendorNameContains)) $o['vendorNameContains'] = $this->vendorNameContains;
        if (isset($this->descriptionContains)) $o['descriptionContains'] = $this->descriptionContains;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'FindTechnologies'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['TechnologyView']); }
}

// @Route("/technology/query")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of Technology
 * @template QueryDb1 of TechnologyView
 */
class QueryTechnology extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var array<int>|null */
        public ?array $ids=null,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $vendorName=null,
        /** @var string|null */
        public ?string $nameContains=null,
        /** @var string|null */
        public ?string $vendorNameContains=null,
        /** @var string|null */
        public ?string $descriptionContains=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['ids'])) $this->ids = JsonConverters::fromArray('int', $o['ids']);
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['vendorName'])) $this->vendorName = $o['vendorName'];
        if (isset($o['nameContains'])) $this->nameContains = $o['nameContains'];
        if (isset($o['vendorNameContains'])) $this->vendorNameContains = $o['vendorNameContains'];
        if (isset($o['descriptionContains'])) $this->descriptionContains = $o['descriptionContains'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->ids)) $o['ids'] = JsonConverters::toArray('int', $this->ids);
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->vendorName)) $o['vendorName'] = $this->vendorName;
        if (isset($this->nameContains)) $o['nameContains'] = $this->nameContains;
        if (isset($this->vendorNameContains)) $o['vendorNameContains'] = $this->vendorNameContains;
        if (isset($this->descriptionContains)) $o['descriptionContains'] = $this->descriptionContains;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryTechnology'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['TechnologyView']); }
}

// @Route("/technology/{Slug}")
#[Returns('GetTechnologyResponse')]
class GetTechnology implements IReturn, IRegisterStats, IGet, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $slug=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['slug'])) $this->slug = $o['slug'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->slug)) $o['slug'] = $this->slug;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetTechnology'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetTechnologyResponse(); }
}

// @Route("/technology/{Slug}/favorites")
#[Returns('GetTechnologyFavoriteDetailsResponse')]
class GetTechnologyFavoriteDetails implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $slug=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['slug'])) $this->slug = $o['slug'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->slug)) $o['slug'] = $this->slug;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetTechnologyFavoriteDetails'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetTechnologyFavoriteDetailsResponse(); }
}

// @Route("/technology", "POST")
#[Returns('CreateTechnologyResponse')]
class CreateTechnology implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $slug=null,
        /** @var string|null */
        public ?string $vendorName=null,
        /** @var string|null */
        public ?string $vendorUrl=null,
        /** @var string|null */
        public ?string $productUrl=null,
        /** @var string|null */
        public ?string $logoUrl=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var bool|null */
        public ?bool $isLocked=null,
        /** @var TechnologyTier|null */
        public ?TechnologyTier $tier=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['vendorName'])) $this->vendorName = $o['vendorName'];
        if (isset($o['vendorUrl'])) $this->vendorUrl = $o['vendorUrl'];
        if (isset($o['productUrl'])) $this->productUrl = $o['productUrl'];
        if (isset($o['logoUrl'])) $this->logoUrl = $o['logoUrl'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['isLocked'])) $this->isLocked = $o['isLocked'];
        if (isset($o['tier'])) $this->tier = JsonConverters::from('TechnologyTier', $o['tier']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->vendorName)) $o['vendorName'] = $this->vendorName;
        if (isset($this->vendorUrl)) $o['vendorUrl'] = $this->vendorUrl;
        if (isset($this->productUrl)) $o['productUrl'] = $this->productUrl;
        if (isset($this->logoUrl)) $o['logoUrl'] = $this->logoUrl;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->isLocked)) $o['isLocked'] = $this->isLocked;
        if (isset($this->tier)) $o['tier'] = JsonConverters::to('TechnologyTier', $this->tier);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CreateTechnology'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new CreateTechnologyResponse(); }
}

// @Route("/technology/{Id}", "PUT")
#[Returns('UpdateTechnologyResponse')]
class UpdateTechnology implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $vendorName=null,
        /** @var string|null */
        public ?string $vendorUrl=null,
        /** @var string|null */
        public ?string $productUrl=null,
        /** @var string|null */
        public ?string $logoUrl=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var bool|null */
        public ?bool $isLocked=null,
        /** @var TechnologyTier|null */
        public ?TechnologyTier $tier=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['vendorName'])) $this->vendorName = $o['vendorName'];
        if (isset($o['vendorUrl'])) $this->vendorUrl = $o['vendorUrl'];
        if (isset($o['productUrl'])) $this->productUrl = $o['productUrl'];
        if (isset($o['logoUrl'])) $this->logoUrl = $o['logoUrl'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['isLocked'])) $this->isLocked = $o['isLocked'];
        if (isset($o['tier'])) $this->tier = JsonConverters::from('TechnologyTier', $o['tier']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->vendorName)) $o['vendorName'] = $this->vendorName;
        if (isset($this->vendorUrl)) $o['vendorUrl'] = $this->vendorUrl;
        if (isset($this->productUrl)) $o['productUrl'] = $this->productUrl;
        if (isset($this->logoUrl)) $o['logoUrl'] = $this->logoUrl;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->isLocked)) $o['isLocked'] = $this->isLocked;
        if (isset($this->tier)) $o['tier'] = JsonConverters::to('TechnologyTier', $this->tier);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'UpdateTechnology'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new UpdateTechnologyResponse(); }
}

// @Route("/technology/{Id}", "DELETE")
#[Returns('DeleteTechnologyResponse')]
class DeleteTechnology implements IReturn, IDelete, JsonSerializable
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
    public function getTypeName(): string { return 'DeleteTechnology'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new DeleteTechnologyResponse(); }
}

// @Route("/techstacks/{Slug}/previous-versions", "GET")
#[Returns('GetTechnologyStackPreviousVersionsResponse')]
class GetTechnologyStackPreviousVersions implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $slug=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['slug'])) $this->slug = $o['slug'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->slug)) $o['slug'] = $this->slug;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetTechnologyStackPreviousVersions'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetTechnologyStackPreviousVersionsResponse(); }
}

// @Route("/pagestats/{Type}/{Slug}")
#[Returns('GetPageStatsResponse')]
class GetPageStats implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $type=null,
        /** @var string|null */
        public ?string $slug=null,
        /** @var int|null */
        public ?int $id=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['type'])) $this->type = $o['type'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['id'])) $this->id = $o['id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->type)) $o['type'] = $this->type;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetPageStats'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetPageStatsResponse(); }
}

// @Route("/techstacks/search")
// @AutoQueryViewer(DefaultSearchField="Description", DefaultSearchText="ServiceStack", DefaultSearchType="Contains", Description="Explore different Technology Stacks", IconUrl="material-icons:cloud", Title="Find Technology Stacks")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of TechnologyStack
 * @template QueryDb1 of TechnologyStackView
 */
class FindTechStacks extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var array<int>|null */
        public ?array $ids=null,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $vendorName=null,
        /** @var string|null */
        public ?string $nameContains=null,
        /** @var string|null */
        public ?string $vendorNameContains=null,
        /** @var string|null */
        public ?string $descriptionContains=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['ids'])) $this->ids = JsonConverters::fromArray('int', $o['ids']);
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['vendorName'])) $this->vendorName = $o['vendorName'];
        if (isset($o['nameContains'])) $this->nameContains = $o['nameContains'];
        if (isset($o['vendorNameContains'])) $this->vendorNameContains = $o['vendorNameContains'];
        if (isset($o['descriptionContains'])) $this->descriptionContains = $o['descriptionContains'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->ids)) $o['ids'] = JsonConverters::toArray('int', $this->ids);
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->vendorName)) $o['vendorName'] = $this->vendorName;
        if (isset($this->nameContains)) $o['nameContains'] = $this->nameContains;
        if (isset($this->vendorNameContains)) $o['vendorNameContains'] = $this->vendorNameContains;
        if (isset($this->descriptionContains)) $o['descriptionContains'] = $this->descriptionContains;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'FindTechStacks'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['TechnologyStackView']); }
}

// @Route("/techstacks/query")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of TechnologyStack
 * @template QueryDb1 of TechnologyStackView
 */
class QueryTechStacks extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var array<int>|null */
        public ?array $ids=null,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $vendorName=null,
        /** @var string|null */
        public ?string $nameContains=null,
        /** @var string|null */
        public ?string $vendorNameContains=null,
        /** @var string|null */
        public ?string $descriptionContains=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['ids'])) $this->ids = JsonConverters::fromArray('int', $o['ids']);
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['vendorName'])) $this->vendorName = $o['vendorName'];
        if (isset($o['nameContains'])) $this->nameContains = $o['nameContains'];
        if (isset($o['vendorNameContains'])) $this->vendorNameContains = $o['vendorNameContains'];
        if (isset($o['descriptionContains'])) $this->descriptionContains = $o['descriptionContains'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->ids)) $o['ids'] = JsonConverters::toArray('int', $this->ids);
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->vendorName)) $o['vendorName'] = $this->vendorName;
        if (isset($this->nameContains)) $o['nameContains'] = $this->nameContains;
        if (isset($this->vendorNameContains)) $o['vendorNameContains'] = $this->vendorNameContains;
        if (isset($this->descriptionContains)) $o['descriptionContains'] = $this->descriptionContains;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryTechStacks'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['TechnologyStackView']); }
}

// @Route("/overview")
#[Returns('OverviewResponse')]
class Overview implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var bool|null */
        public ?bool $reload=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['reload'])) $this->reload = $o['reload'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->reload)) $o['reload'] = $this->reload;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'Overview'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new OverviewResponse(); }
}

// @Route("/app-overview")
#[Returns('AppOverviewResponse')]
class AppOverview implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var bool|null */
        public ?bool $reload=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['reload'])) $this->reload = $o['reload'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->reload)) $o['reload'] = $this->reload;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'AppOverview'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new AppOverviewResponse(); }
}

// @Route("/techstacks", "GET")
#[Returns('GetAllTechnologyStacksResponse')]
class GetAllTechnologyStacks implements IReturn, IGet, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetAllTechnologyStacks'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetAllTechnologyStacksResponse(); }
}

// @Route("/techstacks/{Slug}", "GET")
#[Returns('GetTechnologyStackResponse')]
class GetTechnologyStack implements IReturn, IRegisterStats, IGet, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $slug=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['slug'])) $this->slug = $o['slug'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->slug)) $o['slug'] = $this->slug;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetTechnologyStack'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetTechnologyStackResponse(); }
}

// @Route("/techstacks/{Slug}/favorites")
#[Returns('GetTechnologyStackFavoriteDetailsResponse')]
class GetTechnologyStackFavoriteDetails implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $slug=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['slug'])) $this->slug = $o['slug'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->slug)) $o['slug'] = $this->slug;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetTechnologyStackFavoriteDetails'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetTechnologyStackFavoriteDetailsResponse(); }
}

// @Route("/config")
#[Returns('GetConfigResponse')]
class GetConfig implements IReturn, IGet, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetConfig'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetConfigResponse(); }
}

// @Route("/techstacks", "POST")
#[Returns('CreateTechnologyStackResponse')]
class CreateTechnologyStack implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $slug=null,
        /** @var string|null */
        public ?string $vendorName=null,
        /** @var string|null */
        public ?string $appUrl=null,
        /** @var string|null */
        public ?string $screenshotUrl=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var string|null */
        public ?string $details=null,
        /** @var bool|null */
        public ?bool $isLocked=null,
        /** @var array<int>|null */
        public ?array $technologyIds=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['vendorName'])) $this->vendorName = $o['vendorName'];
        if (isset($o['appUrl'])) $this->appUrl = $o['appUrl'];
        if (isset($o['screenshotUrl'])) $this->screenshotUrl = $o['screenshotUrl'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['details'])) $this->details = $o['details'];
        if (isset($o['isLocked'])) $this->isLocked = $o['isLocked'];
        if (isset($o['technologyIds'])) $this->technologyIds = JsonConverters::fromArray('int', $o['technologyIds']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->vendorName)) $o['vendorName'] = $this->vendorName;
        if (isset($this->appUrl)) $o['appUrl'] = $this->appUrl;
        if (isset($this->screenshotUrl)) $o['screenshotUrl'] = $this->screenshotUrl;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->details)) $o['details'] = $this->details;
        if (isset($this->isLocked)) $o['isLocked'] = $this->isLocked;
        if (isset($this->technologyIds)) $o['technologyIds'] = JsonConverters::toArray('int', $this->technologyIds);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CreateTechnologyStack'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new CreateTechnologyStackResponse(); }
}

// @Route("/techstacks/{Id}", "PUT")
#[Returns('UpdateTechnologyStackResponse')]
class UpdateTechnologyStack implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string|null */
        public ?string $name=null,
        /** @var string|null */
        public ?string $vendorName=null,
        /** @var string|null */
        public ?string $appUrl=null,
        /** @var string|null */
        public ?string $screenshotUrl=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var string|null */
        public ?string $details=null,
        /** @var bool|null */
        public ?bool $isLocked=null,
        /** @var array<int>|null */
        public ?array $technologyIds=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['vendorName'])) $this->vendorName = $o['vendorName'];
        if (isset($o['appUrl'])) $this->appUrl = $o['appUrl'];
        if (isset($o['screenshotUrl'])) $this->screenshotUrl = $o['screenshotUrl'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['details'])) $this->details = $o['details'];
        if (isset($o['isLocked'])) $this->isLocked = $o['isLocked'];
        if (isset($o['technologyIds'])) $this->technologyIds = JsonConverters::fromArray('int', $o['technologyIds']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->vendorName)) $o['vendorName'] = $this->vendorName;
        if (isset($this->appUrl)) $o['appUrl'] = $this->appUrl;
        if (isset($this->screenshotUrl)) $o['screenshotUrl'] = $this->screenshotUrl;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->details)) $o['details'] = $this->details;
        if (isset($this->isLocked)) $o['isLocked'] = $this->isLocked;
        if (isset($this->technologyIds)) $o['technologyIds'] = JsonConverters::toArray('int', $this->technologyIds);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'UpdateTechnologyStack'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new UpdateTechnologyStackResponse(); }
}

// @Route("/techstacks/{Id}", "DELETE")
#[Returns('DeleteTechnologyStackResponse')]
class DeleteTechnologyStack implements IReturn, IDelete, JsonSerializable
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
    public function getTypeName(): string { return 'DeleteTechnologyStack'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new DeleteTechnologyStackResponse(); }
}

// @Route("/favorites/techtacks", "GET")
#[Returns('GetFavoriteTechStackResponse')]
class GetFavoriteTechStack implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $technologyStackId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['technologyStackId'])) $this->technologyStackId = $o['technologyStackId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->technologyStackId)) $o['technologyStackId'] = $this->technologyStackId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetFavoriteTechStack'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetFavoriteTechStackResponse(); }
}

// @Route("/favorites/techtacks/{TechnologyStackId}", "PUT")
#[Returns('FavoriteTechStackResponse')]
class AddFavoriteTechStack implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $technologyStackId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['technologyStackId'])) $this->technologyStackId = $o['technologyStackId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->technologyStackId)) $o['technologyStackId'] = $this->technologyStackId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'AddFavoriteTechStack'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new FavoriteTechStackResponse(); }
}

// @Route("/favorites/techtacks/{TechnologyStackId}", "DELETE")
#[Returns('FavoriteTechStackResponse')]
class RemoveFavoriteTechStack implements IReturn, IDelete, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $technologyStackId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['technologyStackId'])) $this->technologyStackId = $o['technologyStackId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->technologyStackId)) $o['technologyStackId'] = $this->technologyStackId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'RemoveFavoriteTechStack'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new FavoriteTechStackResponse(); }
}

// @Route("/favorites/technology", "GET")
#[Returns('GetFavoriteTechnologiesResponse')]
class GetFavoriteTechnologies implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $technologyId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['technologyId'])) $this->technologyId = $o['technologyId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->technologyId)) $o['technologyId'] = $this->technologyId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetFavoriteTechnologies'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetFavoriteTechnologiesResponse(); }
}

// @Route("/favorites/technology/{TechnologyId}", "PUT")
#[Returns('FavoriteTechnologyResponse')]
class AddFavoriteTechnology implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $technologyId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['technologyId'])) $this->technologyId = $o['technologyId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->technologyId)) $o['technologyId'] = $this->technologyId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'AddFavoriteTechnology'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new FavoriteTechnologyResponse(); }
}

// @Route("/favorites/technology/{TechnologyId}", "DELETE")
#[Returns('FavoriteTechnologyResponse')]
class RemoveFavoriteTechnology implements IReturn, IDelete, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $technologyId=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['technologyId'])) $this->technologyId = $o['technologyId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->technologyId)) $o['technologyId'] = $this->technologyId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'RemoveFavoriteTechnology'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new FavoriteTechnologyResponse(); }
}

// @Route("/my-feed")
#[Returns('GetUserFeedResponse')]
class GetUserFeed implements IReturn, IGet, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetUserFeed'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetUserFeedResponse(); }
}

// @Route("/users/karma", "GET")
#[Returns('GetUsersKarmaResponse')]
class GetUsersKarma implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int[]|null */
        public ?array $userIds=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['userIds'])) $this->userIds = JsonConverters::fromArray('int', $o['userIds']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->userIds)) $o['userIds'] = JsonConverters::toArray('int', $this->userIds);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetUsersKarma'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetUsersKarmaResponse(); }
}

// @Route("/userinfo/{UserName}")
#[Returns('GetUserInfoResponse')]
class GetUserInfo implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $userName=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['userName'])) $this->userName = $o['userName'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->userName)) $o['userName'] = $this->userName;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetUserInfo'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetUserInfoResponse(); }
}

// @Route("/users/{UserName}/avatar", "GET")
class UserAvatar implements IGet, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $userName=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['userName'])) $this->userName = $o['userName'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->userName)) $o['userName'] = $this->userName;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'UserAvatar'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse():void {}
}

// @Route("/mq/start")
#[Returns('string')]
class MqStart implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'MqStart'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return 'string'; }
}

// @Route("/mq/stop")
#[Returns('string')]
class MqStop implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'MqStop'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return 'string'; }
}

// @Route("/mq/stats")
#[Returns('string')]
class MqStats implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'MqStats'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return 'string'; }
}

// @Route("/mq/status")
#[Returns('string')]
class MqStatus implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'MqStatus'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return 'string'; }
}

// @Route("/sync/discourse/{Site}")
#[Returns('SyncDiscourseSiteResponse')]
class SyncDiscourseSite implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $site=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['site'])) $this->site = $o['site'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->site)) $o['site'] = $this->site;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'SyncDiscourseSite'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new SyncDiscourseSiteResponse(); }
}

// @Route("/admin/technology/{TechnologyId}/logo")
#[Returns('LogoUrlApprovalResponse')]
class LogoUrlApproval implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $technologyId=0,
        /** @var bool|null */
        public ?bool $approved=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['technologyId'])) $this->technologyId = $o['technologyId'];
        if (isset($o['approved'])) $this->approved = $o['approved'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->technologyId)) $o['technologyId'] = $this->technologyId;
        if (isset($this->approved)) $o['approved'] = $this->approved;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'LogoUrlApproval'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new LogoUrlApprovalResponse(); }
}

/** @description Limit updates to TechStack to Owner or Admin users */
// @Route("/admin/techstacks/{TechnologyStackId}/lock")
#[Returns('LockStackResponse')]
class LockTechStack implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="GreaterThan(0)")
        /** @var int */
        public int $technologyStackId=0,

        /** @var bool|null */
        public ?bool $isLocked=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['technologyStackId'])) $this->technologyStackId = $o['technologyStackId'];
        if (isset($o['isLocked'])) $this->isLocked = $o['isLocked'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->technologyStackId)) $o['technologyStackId'] = $this->technologyStackId;
        if (isset($this->isLocked)) $o['isLocked'] = $this->isLocked;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'LockTechStack'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new LockStackResponse(); }
}

/** @description Limit updates to Technology to Owner or Admin users */
// @Route("/admin/technology/{TechnologyId}/lock")
// @Api(Description="Limit updates to Technology to Owner or Admin users")
#[Returns('LockStackResponse')]
class LockTech implements IReturn, IPut, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="GreaterThan(0)")
        /** @var int */
        public int $technologyId=0,

        /** @var bool|null */
        public ?bool $isLocked=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['technologyId'])) $this->technologyId = $o['technologyId'];
        if (isset($o['isLocked'])) $this->isLocked = $o['isLocked'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->technologyId)) $o['technologyId'] = $this->technologyId;
        if (isset($this->isLocked)) $o['isLocked'] = $this->isLocked;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'LockTech'; }
    public function getMethod(): string { return 'PUT'; }
    public function createResponse(): mixed { return new LockStackResponse(); }
}

class DummyTypes implements JsonSerializable
{
    public function __construct(
        /** @var array<Post>|null */
        public ?array $post=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['post'])) $this->post = JsonConverters::fromArray('Post', $o['post']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->post)) $o['post'] = JsonConverters::toArray('Post', $this->post);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'DummyTypes'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse():void {}
}

// @Route("/email/post/{PostId}")
#[Returns('EmailTestRespoonse')]
class EmailTest implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $postId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['postId'])) $this->postId = $o['postId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->postId)) $o['postId'] = $this->postId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'EmailTest'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new EmailTestRespoonse(); }
}

#[Returns('ImportUserResponse')]
class ImportUser implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $userName=null,
        /** @var string|null */
        public ?string $email=null,
        /** @var string|null */
        public ?string $firstName=null,
        /** @var string|null */
        public ?string $lastName=null,
        /** @var string|null */
        public ?string $displayName=null,
        /** @var string|null */
        public ?string $company=null,
        /** @var string|null */
        public ?string $refSource=null,
        /** @var int|null */
        public ?int $refId=null,
        /** @var string|null */
        public ?string $refIdStr=null,
        /** @var string|null */
        public ?string $refUrn=null,
        /** @var string|null */
        public ?string $defaultProfileUrl=null,
        /** @var array<string,string>|null */
        public ?array $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['displayName'])) $this->displayName = $o['displayName'];
        if (isset($o['company'])) $this->company = $o['company'];
        if (isset($o['refSource'])) $this->refSource = $o['refSource'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['refIdStr'])) $this->refIdStr = $o['refIdStr'];
        if (isset($o['refUrn'])) $this->refUrn = $o['refUrn'];
        if (isset($o['defaultProfileUrl'])) $this->defaultProfileUrl = $o['defaultProfileUrl'];
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->displayName)) $o['displayName'] = $this->displayName;
        if (isset($this->company)) $o['company'] = $this->company;
        if (isset($this->refSource)) $o['refSource'] = $this->refSource;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->refIdStr)) $o['refIdStr'] = $this->refIdStr;
        if (isset($this->refUrn)) $o['refUrn'] = $this->refUrn;
        if (isset($this->defaultProfileUrl)) $o['defaultProfileUrl'] = $this->defaultProfileUrl;
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ImportUser'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new ImportUserResponse(); }
}

// @Route("/import/uservoice/suggestion")
#[Returns('ImportUserVoiceSuggestionResponse')]
class ImportUserVoiceSuggestion implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $organizationId=0,
        /** @var string|null */
        public ?string $url=null,
        /** @var int */
        public int $id=0,
        /** @var int */
        public int $topicId=0,
        /** @var string|null */
        public ?string $state=null,
        /** @var string|null */
        public ?string $title=null,
        /** @var string|null */
        public ?string $slug=null,
        /** @var string|null */
        public ?string $category=null,
        /** @var string|null */
        public ?string $text=null,
        /** @var string|null */
        public ?string $formattedText=null,
        /** @var int */
        public int $voteCount=0,
        /** @var DateTime|null */
        public ?DateTime $closedAt=null,
        /** @var string|null */
        public ?string $statusKey=null,
        /** @var string|null */
        public ?string $statusHexColor=null,
        /** @var UserVoiceUser|null */
        public ?UserVoiceUser $statusChangedBy=null,
        /** @var UserVoiceUser|null */
        public ?UserVoiceUser $creator=null,
        /** @var UserVoiceComment|null */
        public ?UserVoiceComment $response=null,
        /** @var DateTime */
        public DateTime $createdAt=new DateTime(),
        /** @var DateTime */
        public DateTime $updatedAt=new DateTime()
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['organizationId'])) $this->organizationId = $o['organizationId'];
        if (isset($o['url'])) $this->url = $o['url'];
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['topicId'])) $this->topicId = $o['topicId'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['title'])) $this->title = $o['title'];
        if (isset($o['slug'])) $this->slug = $o['slug'];
        if (isset($o['category'])) $this->category = $o['category'];
        if (isset($o['text'])) $this->text = $o['text'];
        if (isset($o['formattedText'])) $this->formattedText = $o['formattedText'];
        if (isset($o['voteCount'])) $this->voteCount = $o['voteCount'];
        if (isset($o['closedAt'])) $this->closedAt = JsonConverters::from('DateTime', $o['closedAt']);
        if (isset($o['statusKey'])) $this->statusKey = $o['statusKey'];
        if (isset($o['statusHexColor'])) $this->statusHexColor = $o['statusHexColor'];
        if (isset($o['statusChangedBy'])) $this->statusChangedBy = JsonConverters::from('UserVoiceUser', $o['statusChangedBy']);
        if (isset($o['creator'])) $this->creator = JsonConverters::from('UserVoiceUser', $o['creator']);
        if (isset($o['response'])) $this->response = JsonConverters::from('UserVoiceComment', $o['response']);
        if (isset($o['createdAt'])) $this->createdAt = JsonConverters::from('DateTime', $o['createdAt']);
        if (isset($o['updatedAt'])) $this->updatedAt = JsonConverters::from('DateTime', $o['updatedAt']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->organizationId)) $o['organizationId'] = $this->organizationId;
        if (isset($this->url)) $o['url'] = $this->url;
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->topicId)) $o['topicId'] = $this->topicId;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->title)) $o['title'] = $this->title;
        if (isset($this->slug)) $o['slug'] = $this->slug;
        if (isset($this->category)) $o['category'] = $this->category;
        if (isset($this->text)) $o['text'] = $this->text;
        if (isset($this->formattedText)) $o['formattedText'] = $this->formattedText;
        if (isset($this->voteCount)) $o['voteCount'] = $this->voteCount;
        if (isset($this->closedAt)) $o['closedAt'] = JsonConverters::to('DateTime', $this->closedAt);
        if (isset($this->statusKey)) $o['statusKey'] = $this->statusKey;
        if (isset($this->statusHexColor)) $o['statusHexColor'] = $this->statusHexColor;
        if (isset($this->statusChangedBy)) $o['statusChangedBy'] = JsonConverters::to('UserVoiceUser', $this->statusChangedBy);
        if (isset($this->creator)) $o['creator'] = JsonConverters::to('UserVoiceUser', $this->creator);
        if (isset($this->response)) $o['response'] = JsonConverters::to('UserVoiceComment', $this->response);
        if (isset($this->createdAt)) $o['createdAt'] = JsonConverters::to('DateTime', $this->createdAt);
        if (isset($this->updatedAt)) $o['updatedAt'] = JsonConverters::to('DateTime', $this->updatedAt);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ImportUserVoiceSuggestion'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new ImportUserVoiceSuggestionResponse(); }
}

// @Route("/posts/comment", "GET")
#[Returns('QueryResponse')]
/**
 * @template QueryDb of PostComment
 */
class QueryPostComments extends QueryDb implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $id=null,
        /** @var int|null */
        public ?int $userId=null,
        /** @var int|null */
        public ?int $postId=null,
        /** @var string|null */
        public ?string $contentContains=null,
        /** @var int|null */
        public ?int $upVotesAbove=null,
        /** @var int|null */
        public ?int $upVotesBelow=null,
        /** @var int|null */
        public ?int $downVotesAbove=null,
        /** @var int|null */
        public ?int $downVotes=null,
        /** @var int|null */
        public ?int $favoritesAbove=null,
        /** @var int|null */
        public ?int $favoritesBelow=null,
        /** @var int|null */
        public ?int $wordCountAbove=null,
        /** @var int|null */
        public ?int $wordCountBelow=null,
        /** @var int|null */
        public ?int $reportCountAbove=null,
        /** @var int|null */
        public ?int $reportCountBelow=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['userId'])) $this->userId = $o['userId'];
        if (isset($o['postId'])) $this->postId = $o['postId'];
        if (isset($o['contentContains'])) $this->contentContains = $o['contentContains'];
        if (isset($o['upVotesAbove'])) $this->upVotesAbove = $o['upVotesAbove'];
        if (isset($o['upVotesBelow'])) $this->upVotesBelow = $o['upVotesBelow'];
        if (isset($o['downVotesAbove'])) $this->downVotesAbove = $o['downVotesAbove'];
        if (isset($o['downVotes'])) $this->downVotes = $o['downVotes'];
        if (isset($o['favoritesAbove'])) $this->favoritesAbove = $o['favoritesAbove'];
        if (isset($o['favoritesBelow'])) $this->favoritesBelow = $o['favoritesBelow'];
        if (isset($o['wordCountAbove'])) $this->wordCountAbove = $o['wordCountAbove'];
        if (isset($o['wordCountBelow'])) $this->wordCountBelow = $o['wordCountBelow'];
        if (isset($o['reportCountAbove'])) $this->reportCountAbove = $o['reportCountAbove'];
        if (isset($o['reportCountBelow'])) $this->reportCountBelow = $o['reportCountBelow'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->userId)) $o['userId'] = $this->userId;
        if (isset($this->postId)) $o['postId'] = $this->postId;
        if (isset($this->contentContains)) $o['contentContains'] = $this->contentContains;
        if (isset($this->upVotesAbove)) $o['upVotesAbove'] = $this->upVotesAbove;
        if (isset($this->upVotesBelow)) $o['upVotesBelow'] = $this->upVotesBelow;
        if (isset($this->downVotesAbove)) $o['downVotesAbove'] = $this->downVotesAbove;
        if (isset($this->downVotes)) $o['downVotes'] = $this->downVotes;
        if (isset($this->favoritesAbove)) $o['favoritesAbove'] = $this->favoritesAbove;
        if (isset($this->favoritesBelow)) $o['favoritesBelow'] = $this->favoritesBelow;
        if (isset($this->wordCountAbove)) $o['wordCountAbove'] = $this->wordCountAbove;
        if (isset($this->wordCountBelow)) $o['wordCountBelow'] = $this->wordCountBelow;
        if (isset($this->reportCountAbove)) $o['reportCountAbove'] = $this->reportCountAbove;
        if (isset($this->reportCountBelow)) $o['reportCountBelow'] = $this->reportCountBelow;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryPostComments'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['PostComment']); }
}

