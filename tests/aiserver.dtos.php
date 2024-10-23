<?php namespace aiserver;
/* Options:
Date: 2024-10-23 06:01:19
Version: 8.41
Tip: To override a DTO option, remove "//" prefix before updating
BaseUrl: https://openai.servicestack.net

GlobalNamespace: aiserver
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


// @DataContract
enum AudioFormat : string
{
    case MP3 = 'mp3';
    case WAV = 'wav';
    case FLAC = 'flac';
    case OGG = 'ogg';
}

/**
 * @property string|null $refId
 * @property string|null $tag
 */
interface IMediaTransform
{
}

/**
 * @property string|null $refId
 * @property string|null $tag
 * @property string|null $replyTo
 */
interface IQueueMediaTransform
{
}

/**
 * @property string|null $refId
 * @property string|null $tag
 */
interface IGeneration
{
}

/** @description Base class for queue generation requests */
/**
 * @property string|null $refId
 * @property string|null $replyTo
 * @property string|null $tag
 * @property string|null $state
 */
interface IQueueGeneration
{
}

// @DataContract
enum ImageOutputFormat : string
{
    case Jpg = 'jpg';
    case Png = 'png';
    case Gif = 'gif';
    case Bmp = 'bmp';
    case Tiff = 'tiff';
    case Webp = 'webp';
}

enum WatermarkPosition : string
{
    case TopLeft = 'TopLeft';
    case TopRight = 'TopRight';
    case BottomLeft = 'BottomLeft';
    case BottomRight = 'BottomRight';
    case Center = 'Center';
}

enum AiServiceProvider : string
{
    case Replicate = 'Replicate';
    case Comfy = 'Comfy';
    case OpenAi = 'OpenAi';
}

class MediaType implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $id='',
        /** @var string|null */
        public ?string $apiBaseUrl=null,
        /** @var string|null */
        public ?string $apiKeyHeader=null,
        /** @var string */
        public string $website='',
        /** @var string|null */
        public ?string $icon=null,
        /** @var array<string,string>|null */
        public ?array $apiModels=null,
        /** @var AiServiceProvider|null */
        public ?AiServiceProvider $provider=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['apiBaseUrl'])) $this->apiBaseUrl = $o['apiBaseUrl'];
        if (isset($o['apiKeyHeader'])) $this->apiKeyHeader = $o['apiKeyHeader'];
        if (isset($o['website'])) $this->website = $o['website'];
        if (isset($o['icon'])) $this->icon = $o['icon'];
        if (isset($o['apiModels'])) $this->apiModels = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['apiModels']);
        if (isset($o['provider'])) $this->provider = JsonConverters::from('AiServiceProvider', $o['provider']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->apiBaseUrl)) $o['apiBaseUrl'] = $this->apiBaseUrl;
        if (isset($this->apiKeyHeader)) $o['apiKeyHeader'] = $this->apiKeyHeader;
        if (isset($this->website)) $o['website'] = $this->website;
        if (isset($this->icon)) $o['icon'] = $this->icon;
        if (isset($this->apiModels)) $o['apiModels'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->apiModels);
        if (isset($this->provider)) $o['provider'] = JsonConverters::to('AiServiceProvider', $this->provider);
        return empty($o) ? new class(){} : $o;
    }
}

class MediaProvider implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string */
        public string $name='',
        /** @var string|null */
        public ?string $apiKeyVar=null,
        /** @var string|null */
        public ?string $apiUrlVar=null,
        /** @var string|null */
        public ?string $apiKey=null,
        /** @var string|null */
        public ?string $apiKeyHeader=null,
        /** @var string|null */
        public ?string $apiBaseUrl=null,
        /** @var string|null */
        public ?string $heartbeatUrl=null,
        /** @var int */
        public int $concurrency=0,
        /** @var int */
        public int $priority=0,
        /** @var bool|null */
        public ?bool $enabled=null,
        /** @var DateTime|null */
        public ?DateTime $offlineDate=null,
        /** @var DateTime */
        public DateTime $createdDate=new DateTime(),
        /** @var string */
        public string $mediaTypeId='',
        // @Ignore()
        /** @var MediaType|null */
        public ?MediaType $mediaType=null,

        /** @var array<string>|null */
        public ?array $models=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['apiKeyVar'])) $this->apiKeyVar = $o['apiKeyVar'];
        if (isset($o['apiUrlVar'])) $this->apiUrlVar = $o['apiUrlVar'];
        if (isset($o['apiKey'])) $this->apiKey = $o['apiKey'];
        if (isset($o['apiKeyHeader'])) $this->apiKeyHeader = $o['apiKeyHeader'];
        if (isset($o['apiBaseUrl'])) $this->apiBaseUrl = $o['apiBaseUrl'];
        if (isset($o['heartbeatUrl'])) $this->heartbeatUrl = $o['heartbeatUrl'];
        if (isset($o['concurrency'])) $this->concurrency = $o['concurrency'];
        if (isset($o['priority'])) $this->priority = $o['priority'];
        if (isset($o['enabled'])) $this->enabled = $o['enabled'];
        if (isset($o['offlineDate'])) $this->offlineDate = JsonConverters::from('DateTime', $o['offlineDate']);
        if (isset($o['createdDate'])) $this->createdDate = JsonConverters::from('DateTime', $o['createdDate']);
        if (isset($o['mediaTypeId'])) $this->mediaTypeId = $o['mediaTypeId'];
        if (isset($o['mediaType'])) $this->mediaType = JsonConverters::from('MediaType', $o['mediaType']);
        if (isset($o['models'])) $this->models = JsonConverters::fromArray('string', $o['models']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->apiKeyVar)) $o['apiKeyVar'] = $this->apiKeyVar;
        if (isset($this->apiUrlVar)) $o['apiUrlVar'] = $this->apiUrlVar;
        if (isset($this->apiKey)) $o['apiKey'] = $this->apiKey;
        if (isset($this->apiKeyHeader)) $o['apiKeyHeader'] = $this->apiKeyHeader;
        if (isset($this->apiBaseUrl)) $o['apiBaseUrl'] = $this->apiBaseUrl;
        if (isset($this->heartbeatUrl)) $o['heartbeatUrl'] = $this->heartbeatUrl;
        if (isset($this->concurrency)) $o['concurrency'] = $this->concurrency;
        if (isset($this->priority)) $o['priority'] = $this->priority;
        if (isset($this->enabled)) $o['enabled'] = $this->enabled;
        if (isset($this->offlineDate)) $o['offlineDate'] = JsonConverters::to('DateTime', $this->offlineDate);
        if (isset($this->createdDate)) $o['createdDate'] = JsonConverters::to('DateTime', $this->createdDate);
        if (isset($this->mediaTypeId)) $o['mediaTypeId'] = $this->mediaTypeId;
        if (isset($this->mediaType)) $o['mediaType'] = JsonConverters::to('MediaType', $this->mediaType);
        if (isset($this->models)) $o['models'] = JsonConverters::toArray('string', $this->models);
        return empty($o) ? new class(){} : $o;
    }
}

class TextToSpeechVoice implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $id='',
        /** @var string */
        public string $model=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['model'])) $this->model = $o['model'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->model)) $o['model'] = $this->model;
        return empty($o) ? new class(){} : $o;
    }
}

enum ComfySampler : string
{
    case euler = 'euler';
    case euler_cfg_pp = 'euler_cfg_pp';
    case euler_ancestral = 'euler_ancestral';
    case euler_ancestral_cfg_pp = 'euler_ancestral_cfg_pp';
    case huen = 'huen';
    case huenpp2 = 'huenpp2';
    case dpm_2 = 'dpm_2';
    case dpm_2_ancestral = 'dpm_2_ancestral';
    case lms = 'lms';
    case dpm_fast = 'dpm_fast';
    case dpm_adaptive = 'dpm_adaptive';
    case dpmpp_2s_ancestral = 'dpmpp_2s_ancestral';
    case dpmpp_sde = 'dpmpp_sde';
    case dpmpp_sde_gpu = 'dpmpp_sde_gpu';
    case dpmpp_2m = 'dpmpp_2m';
    case dpmpp_2m_sde = 'dpmpp_2m_sde';
    case dpmpp_2m_sde_gpu = 'dpmpp_2m_sde_gpu';
    case dpmpp_3m_sde = 'dpmpp_3m_sde';
    case dpmpp_3m_sde_gpu = 'dpmpp_3m_sde_gpu';
    case ddpm = 'ddpm';
    case lcm = 'lcm';
    case ddim = 'ddim';
    case uni_pc = 'uni_pc';
    case uni_pc_bh2 = 'uni_pc_bh2';
}

enum AiTaskType : int
{
    case TextToImage = 1;
    case ImageToImage = 2;
    case ImageUpscale = 3;
    case ImageWithMask = 4;
    case ImageToText = 5;
    case TextToAudio = 6;
    case TextToSpeech = 7;
    case SpeechToText = 8;
}

enum ComfyMaskSource : string
{
    case red = 'red';
    case blue = 'blue';
    case green = 'green';
    case alpha = 'alpha';
}

class GenerationArgs implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $model=null,
        /** @var int|null */
        public ?int $steps=null,
        /** @var int|null */
        public ?int $batchSize=null,
        /** @var int|null */
        public ?int $seed=null,
        /** @var string|null */
        public ?string $positivePrompt=null,
        /** @var string|null */
        public ?string $negativePrompt=null,
        /** @var ByteArray|null */
        public ?ByteArray $imageInput=null,
        /** @var ByteArray|null */
        public ?ByteArray $maskInput=null,
        /** @var ByteArray|null */
        public ?ByteArray $audioInput=null,
        /** @var ComfySampler|null */
        public ?ComfySampler $sampler=null,
        /** @var string|null */
        public ?string $scheduler=null,
        /** @var float|null */
        public ?float $cfgScale=null,
        /** @var float|null */
        public ?float $denoise=null,
        /** @var string|null */
        public ?string $upscaleModel=null,
        /** @var int|null */
        public ?int $width=null,
        /** @var int|null */
        public ?int $height=null,
        /** @var AiTaskType|null */
        public ?AiTaskType $taskType=null,
        /** @var string|null */
        public ?string $clip=null,
        /** @var float|null */
        public ?float $sampleLength=null,
        /** @var ComfyMaskSource|null */
        public ?ComfyMaskSource $maskChannel=null,
        /** @var string|null */
        public ?string $aspectRatio=null,
        /** @var float|null */
        public ?float $quality=null,
        /** @var string|null */
        public ?string $voice=null,
        /** @var string|null */
        public ?string $language=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['model'])) $this->model = $o['model'];
        if (isset($o['steps'])) $this->steps = $o['steps'];
        if (isset($o['batchSize'])) $this->batchSize = $o['batchSize'];
        if (isset($o['seed'])) $this->seed = $o['seed'];
        if (isset($o['positivePrompt'])) $this->positivePrompt = $o['positivePrompt'];
        if (isset($o['negativePrompt'])) $this->negativePrompt = $o['negativePrompt'];
        if (isset($o['imageInput'])) $this->imageInput = JsonConverters::from('ByteArray', $o['imageInput']);
        if (isset($o['maskInput'])) $this->maskInput = JsonConverters::from('ByteArray', $o['maskInput']);
        if (isset($o['audioInput'])) $this->audioInput = JsonConverters::from('ByteArray', $o['audioInput']);
        if (isset($o['sampler'])) $this->sampler = JsonConverters::from('ComfySampler', $o['sampler']);
        if (isset($o['scheduler'])) $this->scheduler = $o['scheduler'];
        if (isset($o['cfgScale'])) $this->cfgScale = $o['cfgScale'];
        if (isset($o['denoise'])) $this->denoise = $o['denoise'];
        if (isset($o['upscaleModel'])) $this->upscaleModel = $o['upscaleModel'];
        if (isset($o['width'])) $this->width = $o['width'];
        if (isset($o['height'])) $this->height = $o['height'];
        if (isset($o['taskType'])) $this->taskType = JsonConverters::from('AiTaskType', $o['taskType']);
        if (isset($o['clip'])) $this->clip = $o['clip'];
        if (isset($o['sampleLength'])) $this->sampleLength = $o['sampleLength'];
        if (isset($o['maskChannel'])) $this->maskChannel = JsonConverters::from('ComfyMaskSource', $o['maskChannel']);
        if (isset($o['aspectRatio'])) $this->aspectRatio = $o['aspectRatio'];
        if (isset($o['quality'])) $this->quality = $o['quality'];
        if (isset($o['voice'])) $this->voice = $o['voice'];
        if (isset($o['language'])) $this->language = $o['language'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->model)) $o['model'] = $this->model;
        if (isset($this->steps)) $o['steps'] = $this->steps;
        if (isset($this->batchSize)) $o['batchSize'] = $this->batchSize;
        if (isset($this->seed)) $o['seed'] = $this->seed;
        if (isset($this->positivePrompt)) $o['positivePrompt'] = $this->positivePrompt;
        if (isset($this->negativePrompt)) $o['negativePrompt'] = $this->negativePrompt;
        if (isset($this->imageInput)) $o['imageInput'] = JsonConverters::to('ByteArray', $this->imageInput);
        if (isset($this->maskInput)) $o['maskInput'] = JsonConverters::to('ByteArray', $this->maskInput);
        if (isset($this->audioInput)) $o['audioInput'] = JsonConverters::to('ByteArray', $this->audioInput);
        if (isset($this->sampler)) $o['sampler'] = JsonConverters::to('ComfySampler', $this->sampler);
        if (isset($this->scheduler)) $o['scheduler'] = $this->scheduler;
        if (isset($this->cfgScale)) $o['cfgScale'] = $this->cfgScale;
        if (isset($this->denoise)) $o['denoise'] = $this->denoise;
        if (isset($this->upscaleModel)) $o['upscaleModel'] = $this->upscaleModel;
        if (isset($this->width)) $o['width'] = $this->width;
        if (isset($this->height)) $o['height'] = $this->height;
        if (isset($this->taskType)) $o['taskType'] = JsonConverters::to('AiTaskType', $this->taskType);
        if (isset($this->clip)) $o['clip'] = $this->clip;
        if (isset($this->sampleLength)) $o['sampleLength'] = $this->sampleLength;
        if (isset($this->maskChannel)) $o['maskChannel'] = JsonConverters::to('ComfyMaskSource', $this->maskChannel);
        if (isset($this->aspectRatio)) $o['aspectRatio'] = $this->aspectRatio;
        if (isset($this->quality)) $o['quality'] = $this->quality;
        if (isset($this->voice)) $o['voice'] = $this->voice;
        if (isset($this->language)) $o['language'] = $this->language;
        return empty($o) ? new class(){} : $o;
    }
}

enum ModelType : string
{
    case TextToImage = 'TextToImage';
    case TextEncoder = 'TextEncoder';
    case ImageUpscale = 'ImageUpscale';
    case TextToSpeech = 'TextToSpeech';
    case TextToAudio = 'TextToAudio';
    case SpeechToText = 'SpeechToText';
    case ImageToText = 'ImageToText';
    case ImageToImage = 'ImageToImage';
    case ImageWithMask = 'ImageWithMask';
    case VAE = 'VAE';
}

class MediaModel implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $id='',
        /** @var array<string,string>|null */
        public ?array $apiModels=null,
        /** @var string|null */
        public ?string $url=null,
        /** @var float|null */
        public ?float $quality=null,
        /** @var string|null */
        public ?string $aspectRatio=null,
        /** @var float|null */
        public ?float $cfgScale=null,
        /** @var string|null */
        public ?string $scheduler=null,
        /** @var ComfySampler|null */
        public ?ComfySampler $sampler=null,
        /** @var int|null */
        public ?int $width=null,
        /** @var int|null */
        public ?int $height=null,
        /** @var int|null */
        public ?int $steps=null,
        /** @var string|null */
        public ?string $negativePrompt=null,
        /** @var ModelType|null */
        public ?ModelType $modelType=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['apiModels'])) $this->apiModels = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['apiModels']);
        if (isset($o['url'])) $this->url = $o['url'];
        if (isset($o['quality'])) $this->quality = $o['quality'];
        if (isset($o['aspectRatio'])) $this->aspectRatio = $o['aspectRatio'];
        if (isset($o['cfgScale'])) $this->cfgScale = $o['cfgScale'];
        if (isset($o['scheduler'])) $this->scheduler = $o['scheduler'];
        if (isset($o['sampler'])) $this->sampler = JsonConverters::from('ComfySampler', $o['sampler']);
        if (isset($o['width'])) $this->width = $o['width'];
        if (isset($o['height'])) $this->height = $o['height'];
        if (isset($o['steps'])) $this->steps = $o['steps'];
        if (isset($o['negativePrompt'])) $this->negativePrompt = $o['negativePrompt'];
        if (isset($o['modelType'])) $this->modelType = JsonConverters::from('ModelType', $o['modelType']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->apiModels)) $o['apiModels'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->apiModels);
        if (isset($this->url)) $o['url'] = $this->url;
        if (isset($this->quality)) $o['quality'] = $this->quality;
        if (isset($this->aspectRatio)) $o['aspectRatio'] = $this->aspectRatio;
        if (isset($this->cfgScale)) $o['cfgScale'] = $this->cfgScale;
        if (isset($this->scheduler)) $o['scheduler'] = $this->scheduler;
        if (isset($this->sampler)) $o['sampler'] = JsonConverters::to('ComfySampler', $this->sampler);
        if (isset($this->width)) $o['width'] = $this->width;
        if (isset($this->height)) $o['height'] = $this->height;
        if (isset($this->steps)) $o['steps'] = $this->steps;
        if (isset($this->negativePrompt)) $o['negativePrompt'] = $this->negativePrompt;
        if (isset($this->modelType)) $o['modelType'] = JsonConverters::to('ModelType', $this->modelType);
        return empty($o) ? new class(){} : $o;
    }
}

enum MediaTransformTaskType : string
{
    case ImageScale = 'ImageScale';
    case VideoScale = 'VideoScale';
    case ImageConvert = 'ImageConvert';
    case AudioConvert = 'AudioConvert';
    case VideoConvert = 'VideoConvert';
    case ImageCrop = 'ImageCrop';
    case VideoCrop = 'VideoCrop';
    case VideoCut = 'VideoCut';
    case AudioCut = 'AudioCut';
    case WatermarkImage = 'WatermarkImage';
    case WatermarkVideo = 'WatermarkVideo';
}

// @DataContract
enum MediaOutputFormat : string
{
    case MP4 = 'mp4';
    case AVI = 'avi';
    case MKV = 'mkv';
    case MOV = 'mov';
    case WebM = 'webm';
    case GIF = 'gif';
    case MP3 = 'mp3';
    case WAV = 'wav';
    case FLAC = 'flac';
}

class MediaTransformArgs implements JsonSerializable
{
    public function __construct(
        /** @var MediaTransformTaskType|null */
        public ?MediaTransformTaskType $taskType=null,
        /** @var ByteArray|null */
        public ?ByteArray $videoInput=null,
        /** @var ByteArray|null */
        public ?ByteArray $audioInput=null,
        /** @var ByteArray|null */
        public ?ByteArray $imageInput=null,
        /** @var ByteArray|null */
        public ?ByteArray $watermarkInput=null,
        /** @var string|null */
        public ?string $videoFileName=null,
        /** @var string|null */
        public ?string $audioFileName=null,
        /** @var string|null */
        public ?string $imageFileName=null,
        /** @var string|null */
        public ?string $watermarkFileName=null,
        /** @var MediaOutputFormat|null */
        public ?MediaOutputFormat $outputFormat=null,
        /** @var ImageOutputFormat|null */
        public ?ImageOutputFormat $imageOutputFormat=null,
        /** @var int|null */
        public ?int $scaleWidth=null,
        /** @var int|null */
        public ?int $scaleHeight=null,
        /** @var int|null */
        public ?int $cropX=null,
        /** @var int|null */
        public ?int $cropY=null,
        /** @var int|null */
        public ?int $cropWidth=null,
        /** @var int|null */
        public ?int $cropHeight=null,
        /** @var float|null */
        public ?float $cutStart=null,
        /** @var float|null */
        public ?float $cutEnd=null,
        /** @var ByteArray|null */
        public ?ByteArray $watermarkFile=null,
        /** @var string|null */
        public ?string $watermarkPosition=null,
        /** @var string|null */
        public ?string $watermarkScale=null,
        /** @var string|null */
        public ?string $audioCodec=null,
        /** @var string|null */
        public ?string $videoCodec=null,
        /** @var string|null */
        public ?string $audioBitrate=null,
        /** @var int|null */
        public ?int $audioSampleRate=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['taskType'])) $this->taskType = JsonConverters::from('MediaTransformTaskType', $o['taskType']);
        if (isset($o['videoInput'])) $this->videoInput = JsonConverters::from('ByteArray', $o['videoInput']);
        if (isset($o['audioInput'])) $this->audioInput = JsonConverters::from('ByteArray', $o['audioInput']);
        if (isset($o['imageInput'])) $this->imageInput = JsonConverters::from('ByteArray', $o['imageInput']);
        if (isset($o['watermarkInput'])) $this->watermarkInput = JsonConverters::from('ByteArray', $o['watermarkInput']);
        if (isset($o['videoFileName'])) $this->videoFileName = $o['videoFileName'];
        if (isset($o['audioFileName'])) $this->audioFileName = $o['audioFileName'];
        if (isset($o['imageFileName'])) $this->imageFileName = $o['imageFileName'];
        if (isset($o['watermarkFileName'])) $this->watermarkFileName = $o['watermarkFileName'];
        if (isset($o['outputFormat'])) $this->outputFormat = JsonConverters::from('MediaOutputFormat', $o['outputFormat']);
        if (isset($o['imageOutputFormat'])) $this->imageOutputFormat = JsonConverters::from('ImageOutputFormat', $o['imageOutputFormat']);
        if (isset($o['scaleWidth'])) $this->scaleWidth = $o['scaleWidth'];
        if (isset($o['scaleHeight'])) $this->scaleHeight = $o['scaleHeight'];
        if (isset($o['cropX'])) $this->cropX = $o['cropX'];
        if (isset($o['cropY'])) $this->cropY = $o['cropY'];
        if (isset($o['cropWidth'])) $this->cropWidth = $o['cropWidth'];
        if (isset($o['cropHeight'])) $this->cropHeight = $o['cropHeight'];
        if (isset($o['cutStart'])) $this->cutStart = $o['cutStart'];
        if (isset($o['cutEnd'])) $this->cutEnd = $o['cutEnd'];
        if (isset($o['watermarkFile'])) $this->watermarkFile = JsonConverters::from('ByteArray', $o['watermarkFile']);
        if (isset($o['watermarkPosition'])) $this->watermarkPosition = $o['watermarkPosition'];
        if (isset($o['watermarkScale'])) $this->watermarkScale = $o['watermarkScale'];
        if (isset($o['audioCodec'])) $this->audioCodec = $o['audioCodec'];
        if (isset($o['videoCodec'])) $this->videoCodec = $o['videoCodec'];
        if (isset($o['audioBitrate'])) $this->audioBitrate = $o['audioBitrate'];
        if (isset($o['audioSampleRate'])) $this->audioSampleRate = $o['audioSampleRate'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->taskType)) $o['taskType'] = JsonConverters::to('MediaTransformTaskType', $this->taskType);
        if (isset($this->videoInput)) $o['videoInput'] = JsonConverters::to('ByteArray', $this->videoInput);
        if (isset($this->audioInput)) $o['audioInput'] = JsonConverters::to('ByteArray', $this->audioInput);
        if (isset($this->imageInput)) $o['imageInput'] = JsonConverters::to('ByteArray', $this->imageInput);
        if (isset($this->watermarkInput)) $o['watermarkInput'] = JsonConverters::to('ByteArray', $this->watermarkInput);
        if (isset($this->videoFileName)) $o['videoFileName'] = $this->videoFileName;
        if (isset($this->audioFileName)) $o['audioFileName'] = $this->audioFileName;
        if (isset($this->imageFileName)) $o['imageFileName'] = $this->imageFileName;
        if (isset($this->watermarkFileName)) $o['watermarkFileName'] = $this->watermarkFileName;
        if (isset($this->outputFormat)) $o['outputFormat'] = JsonConverters::to('MediaOutputFormat', $this->outputFormat);
        if (isset($this->imageOutputFormat)) $o['imageOutputFormat'] = JsonConverters::to('ImageOutputFormat', $this->imageOutputFormat);
        if (isset($this->scaleWidth)) $o['scaleWidth'] = $this->scaleWidth;
        if (isset($this->scaleHeight)) $o['scaleHeight'] = $this->scaleHeight;
        if (isset($this->cropX)) $o['cropX'] = $this->cropX;
        if (isset($this->cropY)) $o['cropY'] = $this->cropY;
        if (isset($this->cropWidth)) $o['cropWidth'] = $this->cropWidth;
        if (isset($this->cropHeight)) $o['cropHeight'] = $this->cropHeight;
        if (isset($this->cutStart)) $o['cutStart'] = $this->cutStart;
        if (isset($this->cutEnd)) $o['cutEnd'] = $this->cutEnd;
        if (isset($this->watermarkFile)) $o['watermarkFile'] = JsonConverters::to('ByteArray', $this->watermarkFile);
        if (isset($this->watermarkPosition)) $o['watermarkPosition'] = $this->watermarkPosition;
        if (isset($this->watermarkScale)) $o['watermarkScale'] = $this->watermarkScale;
        if (isset($this->audioCodec)) $o['audioCodec'] = $this->audioCodec;
        if (isset($this->videoCodec)) $o['videoCodec'] = $this->videoCodec;
        if (isset($this->audioBitrate)) $o['audioBitrate'] = $this->audioBitrate;
        if (isset($this->audioSampleRate)) $o['audioSampleRate'] = $this->audioSampleRate;
        return empty($o) ? new class(){} : $o;
    }
}

class AiModel implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $id='',
        /** @var array<string>|null */
        public ?array $tags=null,
        /** @var string|null */
        public ?string $latest=null,
        /** @var string|null */
        public ?string $website=null,
        /** @var string|null */
        public ?string $description=null,
        /** @var string|null */
        public ?string $icon=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['tags'])) $this->tags = JsonConverters::fromArray('string', $o['tags']);
        if (isset($o['latest'])) $this->latest = $o['latest'];
        if (isset($o['website'])) $this->website = $o['website'];
        if (isset($o['description'])) $this->description = $o['description'];
        if (isset($o['icon'])) $this->icon = $o['icon'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->tags)) $o['tags'] = JsonConverters::toArray('string', $this->tags);
        if (isset($this->latest)) $o['latest'] = $this->latest;
        if (isset($this->website)) $o['website'] = $this->website;
        if (isset($this->description)) $o['description'] = $this->description;
        if (isset($this->icon)) $o['icon'] = $this->icon;
        return empty($o) ? new class(){} : $o;
    }
}

enum AiProviderType : string
{
    case OpenAiProvider = 'OpenAiProvider';
    case GoogleAiProvider = 'GoogleAiProvider';
}

class AiType implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $id='',
        /** @var AiProviderType|null */
        public ?AiProviderType $provider=null,
        /** @var string */
        public string $website='',
        /** @var string */
        public string $apiBaseUrl='',
        /** @var string|null */
        public ?string $heartbeatUrl=null,
        /** @var string|null */
        public ?string $icon=null,
        /** @var array<string,string>|null */
        public ?array $apiModels=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['provider'])) $this->provider = JsonConverters::from('AiProviderType', $o['provider']);
        if (isset($o['website'])) $this->website = $o['website'];
        if (isset($o['apiBaseUrl'])) $this->apiBaseUrl = $o['apiBaseUrl'];
        if (isset($o['heartbeatUrl'])) $this->heartbeatUrl = $o['heartbeatUrl'];
        if (isset($o['icon'])) $this->icon = $o['icon'];
        if (isset($o['apiModels'])) $this->apiModels = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['apiModels']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->provider)) $o['provider'] = JsonConverters::to('AiProviderType', $this->provider);
        if (isset($this->website)) $o['website'] = $this->website;
        if (isset($this->apiBaseUrl)) $o['apiBaseUrl'] = $this->apiBaseUrl;
        if (isset($this->heartbeatUrl)) $o['heartbeatUrl'] = $this->heartbeatUrl;
        if (isset($this->icon)) $o['icon'] = $this->icon;
        if (isset($this->apiModels)) $o['apiModels'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->apiModels);
        return empty($o) ? new class(){} : $o;
    }
}

class AiProviderModel implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $model='',
        /** @var string|null */
        public ?string $apiModel=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['model'])) $this->model = $o['model'];
        if (isset($o['apiModel'])) $this->apiModel = $o['apiModel'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->model)) $o['model'] = $this->model;
        if (isset($this->apiModel)) $o['apiModel'] = $this->apiModel;
        return empty($o) ? new class(){} : $o;
    }
}

class AiProvider implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string */
        public string $name='',
        /** @var string|null */
        public ?string $apiBaseUrl=null,
        /** @var string|null */
        public ?string $apiKeyVar=null,
        /** @var string|null */
        public ?string $apiKey=null,
        /** @var string|null */
        public ?string $apiKeyHeader=null,
        /** @var string|null */
        public ?string $heartbeatUrl=null,
        /** @var int */
        public int $concurrency=0,
        /** @var int */
        public int $priority=0,
        /** @var bool|null */
        public ?bool $enabled=null,
        /** @var DateTime|null */
        public ?DateTime $offlineDate=null,
        /** @var DateTime */
        public DateTime $createdDate=new DateTime(),
        /** @var array<AiProviderModel>|null */
        public ?array $models=null,
        /** @var string */
        public string $aiTypeId='',
        // @Ignore()
        /** @var AiType|null */
        public ?AiType $aiType=null,

        // @Ignore()
        /** @var array<string>|null */
        public ?array $selectedModels=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['apiBaseUrl'])) $this->apiBaseUrl = $o['apiBaseUrl'];
        if (isset($o['apiKeyVar'])) $this->apiKeyVar = $o['apiKeyVar'];
        if (isset($o['apiKey'])) $this->apiKey = $o['apiKey'];
        if (isset($o['apiKeyHeader'])) $this->apiKeyHeader = $o['apiKeyHeader'];
        if (isset($o['heartbeatUrl'])) $this->heartbeatUrl = $o['heartbeatUrl'];
        if (isset($o['concurrency'])) $this->concurrency = $o['concurrency'];
        if (isset($o['priority'])) $this->priority = $o['priority'];
        if (isset($o['enabled'])) $this->enabled = $o['enabled'];
        if (isset($o['offlineDate'])) $this->offlineDate = JsonConverters::from('DateTime', $o['offlineDate']);
        if (isset($o['createdDate'])) $this->createdDate = JsonConverters::from('DateTime', $o['createdDate']);
        if (isset($o['models'])) $this->models = JsonConverters::fromArray('AiProviderModel', $o['models']);
        if (isset($o['aiTypeId'])) $this->aiTypeId = $o['aiTypeId'];
        if (isset($o['aiType'])) $this->aiType = JsonConverters::from('AiType', $o['aiType']);
        if (isset($o['selectedModels'])) $this->selectedModels = JsonConverters::fromArray('string', $o['selectedModels']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->apiBaseUrl)) $o['apiBaseUrl'] = $this->apiBaseUrl;
        if (isset($this->apiKeyVar)) $o['apiKeyVar'] = $this->apiKeyVar;
        if (isset($this->apiKey)) $o['apiKey'] = $this->apiKey;
        if (isset($this->apiKeyHeader)) $o['apiKeyHeader'] = $this->apiKeyHeader;
        if (isset($this->heartbeatUrl)) $o['heartbeatUrl'] = $this->heartbeatUrl;
        if (isset($this->concurrency)) $o['concurrency'] = $this->concurrency;
        if (isset($this->priority)) $o['priority'] = $this->priority;
        if (isset($this->enabled)) $o['enabled'] = $this->enabled;
        if (isset($this->offlineDate)) $o['offlineDate'] = JsonConverters::to('DateTime', $this->offlineDate);
        if (isset($this->createdDate)) $o['createdDate'] = JsonConverters::to('DateTime', $this->createdDate);
        if (isset($this->models)) $o['models'] = JsonConverters::toArray('AiProviderModel', $this->models);
        if (isset($this->aiTypeId)) $o['aiTypeId'] = $this->aiTypeId;
        if (isset($this->aiType)) $o['aiType'] = JsonConverters::to('AiType', $this->aiType);
        if (isset($this->selectedModels)) $o['selectedModels'] = JsonConverters::toArray('string', $this->selectedModels);
        return empty($o) ? new class(){} : $o;
    }
}

/** @description The tool calls generated by the model, such as function calls. */
// @DataContract
class ToolCall implements JsonSerializable
{
    public function __construct(
        /** @description The ID of the tool call. */
        // @DataMember(Name="id")
        /** @var string */
        public string $id='',

        /** @description The type of the tool. Currently, only `function` is supported. */
        // @DataMember(Name="type")
        /** @var string */
        public string $type='',

        /** @description The function that the model called. */
        // @DataMember(Name="function")
        /** @var string */
        public string $function=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['type'])) $this->type = $o['type'];
        if (isset($o['function'])) $this->function = $o['function'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->type)) $o['type'] = $this->type;
        if (isset($this->function)) $o['function'] = $this->function;
        return empty($o) ? new class(){} : $o;
    }
}

/** @description A list of messages comprising the conversation so far. */
// @DataContract
class OpenAiMessage implements JsonSerializable
{
    public function __construct(
        /** @description The contents of the message. */
        // @DataMember(Name="content")
        /** @var string */
        public string $content='',

        /** @description The role of the author of this message. Valid values are `system`, `user`, `assistant` and `tool`. */
        // @DataMember(Name="role")
        /** @var string */
        public string $role='',

        /** @description An optional name for the participant. Provides the model information to differentiate between participants of the same role. */
        // @DataMember(Name="name")
        /** @var string|null */
        public ?string $name=null,

        /** @description The tool calls generated by the model, such as function calls. */
        // @DataMember(Name="tool_calls")
        /** @var ToolCall[]|null */
        public ?array $tool_calls=null,

        /** @description Tool call that this message is responding to. */
        // @DataMember(Name="tool_call_id")
        /** @var string|null */
        public ?string $tool_call_id=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['content'])) $this->content = $o['content'];
        if (isset($o['role'])) $this->role = $o['role'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['tool_calls'])) $this->tool_calls = JsonConverters::fromArray('ToolCall', $o['tool_calls']);
        if (isset($o['tool_call_id'])) $this->tool_call_id = $o['tool_call_id'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->content)) $o['content'] = $this->content;
        if (isset($this->role)) $o['role'] = $this->role;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->tool_calls)) $o['tool_calls'] = JsonConverters::toArray('ToolCall', $this->tool_calls);
        if (isset($this->tool_call_id)) $o['tool_call_id'] = $this->tool_call_id;
        return empty($o) ? new class(){} : $o;
    }
}

enum ResponseFormat : string
{
    case Text = 'text';
    case JsonObject = 'json_object';
}

// @DataContract
class OpenAiResponseFormat implements JsonSerializable
{
    public function __construct(
        /** @description An object specifying the format that the model must output. Compatible with GPT-4 Turbo and all GPT-3.5 Turbo models newer than gpt-3.5-turbo-1106. */
        // @DataMember(Name="response_format")
        /** @var ResponseFormat|null */
        public ?ResponseFormat $response_format=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['response_format'])) $this->response_format = JsonConverters::from('ResponseFormat', $o['response_format']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->response_format)) $o['response_format'] = JsonConverters::to('ResponseFormat', $this->response_format);
        return empty($o) ? new class(){} : $o;
    }
}

enum OpenAiToolType : string
{
    case Function = 'function';
}

// @DataContract
class OpenAiTools implements JsonSerializable
{
    public function __construct(
        /** @description The type of the tool. Currently, only function is supported. */
        // @DataMember(Name="type")
        /** @var OpenAiToolType|null */
        public ?OpenAiToolType $type=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['type'])) $this->type = JsonConverters::from('OpenAiToolType', $o['type']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->type)) $o['type'] = JsonConverters::to('OpenAiToolType', $this->type);
        return empty($o) ? new class(){} : $o;
    }
}

/** @description Given a list of messages comprising a conversation, the model will return a response. */
// @DataContract
class OpenAiChat implements JsonSerializable
{
    public function __construct(
        /** @description A list of messages comprising the conversation so far. */
        // @DataMember(Name="messages")
        /** @var array<OpenAiMessage>|null */
        public ?array $messages=null,

        /** @description ID of the model to use. See the model endpoint compatibility table for details on which models work with the Chat API */
        // @DataMember(Name="model")
        /** @var string */
        public string $model='',

        /** @description Number between `-2.0` and `2.0`. Positive values penalize new tokens based on their existing frequency in the text so far, decreasing the model's likelihood to repeat the same line verbatim. */
        // @DataMember(Name="frequency_penalty")
        /** @var float|null */
        public ?float $frequency_penalty=null,

        /** @description Modify the likelihood of specified tokens appearing in the completion. */
        // @DataMember(Name="logit_bias")
        /** @var array<string,int>|null */
        public ?array $logit_bias=null,

        /** @description Whether to return log probabilities of the output tokens or not. If true, returns the log probabilities of each output token returned in the content of message. */
        // @DataMember(Name="logprobs")
        /** @var bool|null */
        public ?bool $logprobs=null,

        /** @description An integer between 0 and 20 specifying the number of most likely tokens to return at each token position, each with an associated log probability. logprobs must be set to true if this parameter is used. */
        // @DataMember(Name="top_logprobs")
        /** @var int|null */
        public ?int $top_logprobs=null,

        /** @description The maximum number of tokens that can be generated in the chat completion. */
        // @DataMember(Name="max_tokens")
        /** @var int|null */
        public ?int $max_tokens=null,

        /** @description How many chat completion choices to generate for each input message. Note that you will be charged based on the number of generated tokens across all of the choices. Keep `n` as `1` to minimize costs. */
        // @DataMember(Name="n")
        /** @var int|null */
        public ?int $n=null,

        /** @description Number between -2.0 and 2.0. Positive values penalize new tokens based on whether they appear in the text so far, increasing the model's likelihood to talk about new topics. */
        // @DataMember(Name="presence_penalty")
        /** @var float|null */
        public ?float $presence_penalty=null,

        /** @description An object specifying the format that the model must output. Compatible with GPT-4 Turbo and all GPT-3.5 Turbo models newer than `gpt-3.5-turbo-1106`. Setting Type to ResponseFormat.JsonObject enables JSON mode, which guarantees the message the model generates is valid JSON. */
        // @DataMember(Name="response_format")
        /** @var OpenAiResponseFormat|null */
        public ?OpenAiResponseFormat $response_format=null,

        /** @description This feature is in Beta. If specified, our system will make a best effort to sample deterministically, such that repeated requests with the same seed and parameters should return the same result. Determinism is not guaranteed, and you should refer to the system_fingerprint response parameter to monitor changes in the backend. */
        // @DataMember(Name="seed")
        /** @var int|null */
        public ?int $seed=null,

        /** @description Up to 4 sequences where the API will stop generating further tokens. */
        // @DataMember(Name="stop")
        /** @var array<string>|null */
        public ?array $stop=null,

        /** @description If set, partial message deltas will be sent, like in ChatGPT. Tokens will be sent as data-only server-sent events as they become available, with the stream terminated by a `data: [DONE]` message. */
        // @DataMember(Name="stream")
        /** @var bool|null */
        public ?bool $stream=null,

        /** @description What sampling temperature to use, between 0 and 2. Higher values like 0.8 will make the output more random, while lower values like 0.2 will make it more focused and deterministic. */
        // @DataMember(Name="temperature")
        /** @var float|null */
        public ?float $temperature=null,

        /** @description An alternative to sampling with temperature, called nucleus sampling, where the model considers the results of the tokens with top_p probability mass. So 0.1 means only the tokens comprising the top 10% probability mass are considered. */
        // @DataMember(Name="top_p")
        /** @var float|null */
        public ?float $top_p=null,

        /** @description A list of tools the model may call. Currently, only functions are supported as a tool. Use this to provide a list of functions the model may generate JSON inputs for. A max of 128 functions are supported. */
        // @DataMember(Name="tools")
        /** @var array<OpenAiTools>|null */
        public ?array $tools=null,

        /** @description A unique identifier representing your end-user, which can help OpenAI to monitor and detect abuse. */
        // @DataMember(Name="user")
        /** @var string|null */
        public ?string $user=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['messages'])) $this->messages = JsonConverters::fromArray('OpenAiMessage', $o['messages']);
        if (isset($o['model'])) $this->model = $o['model'];
        if (isset($o['frequency_penalty'])) $this->frequency_penalty = $o['frequency_penalty'];
        if (isset($o['logit_bias'])) $this->logit_bias = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['int','int']), $o['logit_bias']);
        if (isset($o['logprobs'])) $this->logprobs = $o['logprobs'];
        if (isset($o['top_logprobs'])) $this->top_logprobs = $o['top_logprobs'];
        if (isset($o['max_tokens'])) $this->max_tokens = $o['max_tokens'];
        if (isset($o['n'])) $this->n = $o['n'];
        if (isset($o['presence_penalty'])) $this->presence_penalty = $o['presence_penalty'];
        if (isset($o['response_format'])) $this->response_format = JsonConverters::from('OpenAiResponseFormat', $o['response_format']);
        if (isset($o['seed'])) $this->seed = $o['seed'];
        if (isset($o['stop'])) $this->stop = JsonConverters::fromArray('string', $o['stop']);
        if (isset($o['stream'])) $this->stream = $o['stream'];
        if (isset($o['temperature'])) $this->temperature = $o['temperature'];
        if (isset($o['top_p'])) $this->top_p = $o['top_p'];
        if (isset($o['tools'])) $this->tools = JsonConverters::fromArray('OpenAiTools', $o['tools']);
        if (isset($o['user'])) $this->user = $o['user'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->messages)) $o['messages'] = JsonConverters::toArray('OpenAiMessage', $this->messages);
        if (isset($this->model)) $o['model'] = $this->model;
        if (isset($this->frequency_penalty)) $o['frequency_penalty'] = $this->frequency_penalty;
        if (isset($this->logit_bias)) $o['logit_bias'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['int','int']), $this->logit_bias);
        if (isset($this->logprobs)) $o['logprobs'] = $this->logprobs;
        if (isset($this->top_logprobs)) $o['top_logprobs'] = $this->top_logprobs;
        if (isset($this->max_tokens)) $o['max_tokens'] = $this->max_tokens;
        if (isset($this->n)) $o['n'] = $this->n;
        if (isset($this->presence_penalty)) $o['presence_penalty'] = $this->presence_penalty;
        if (isset($this->response_format)) $o['response_format'] = JsonConverters::to('OpenAiResponseFormat', $this->response_format);
        if (isset($this->seed)) $o['seed'] = $this->seed;
        if (isset($this->stop)) $o['stop'] = JsonConverters::toArray('string', $this->stop);
        if (isset($this->stream)) $o['stream'] = $this->stream;
        if (isset($this->temperature)) $o['temperature'] = $this->temperature;
        if (isset($this->top_p)) $o['top_p'] = $this->top_p;
        if (isset($this->tools)) $o['tools'] = JsonConverters::toArray('OpenAiTools', $this->tools);
        if (isset($this->user)) $o['user'] = $this->user;
        return empty($o) ? new class(){} : $o;
    }
}

enum TaskType : int
{
    case OpenAiChat = 1;
    case Comfy = 2;
}

class Prompt implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $id='',
        /** @var string */
        public string $name='',
        /** @var string */
        public string $value=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['value'])) $this->value = $o['value'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->value)) $o['value'] = $this->value;
        return empty($o) ? new class(){} : $o;
    }
}

// @DataContract
enum ConvertVideoOutputFormat : string
{
    case MP4 = 'mp4';
    case AVI = 'avi';
    case MOV = 'mov';
}

class PageStats implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $label='',
        /** @var int */
        public int $total=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['label'])) $this->label = $o['label'];
        if (isset($o['total'])) $this->total = $o['total'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->label)) $o['label'] = $this->label;
        if (isset($this->total)) $o['total'] = $this->total;
        return empty($o) ? new class(){} : $o;
    }
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

enum BackgroundJobState : string
{
    case Queued = 'Queued';
    case Started = 'Started';
    case Executed = 'Executed';
    case Completed = 'Completed';
    case Failed = 'Failed';
    case Cancelled = 'Cancelled';
}

class SummaryStats implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $name='',
        /** @var int */
        public int $total=0,
        /** @var int */
        public int $totalPromptTokens=0,
        /** @var int */
        public int $totalCompletionTokens=0,
        /** @var float */
        public float $totalMinutes=0.0,
        /** @var float */
        public float $tokensPerSecond=0.0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['total'])) $this->total = $o['total'];
        if (isset($o['totalPromptTokens'])) $this->totalPromptTokens = $o['totalPromptTokens'];
        if (isset($o['totalCompletionTokens'])) $this->totalCompletionTokens = $o['totalCompletionTokens'];
        if (isset($o['totalMinutes'])) $this->totalMinutes = $o['totalMinutes'];
        if (isset($o['tokensPerSecond'])) $this->tokensPerSecond = $o['tokensPerSecond'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->total)) $o['total'] = $this->total;
        if (isset($this->totalPromptTokens)) $o['totalPromptTokens'] = $this->totalPromptTokens;
        if (isset($this->totalCompletionTokens)) $o['totalCompletionTokens'] = $this->totalCompletionTokens;
        if (isset($this->totalMinutes)) $o['totalMinutes'] = $this->totalMinutes;
        if (isset($this->tokensPerSecond)) $o['tokensPerSecond'] = $this->tokensPerSecond;
        return empty($o) ? new class(){} : $o;
    }
}

class AiProviderTextOutput implements JsonSerializable
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
}

class AiProviderFileOutput implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $fileName='',
        /** @var string */
        public string $url=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['fileName'])) $this->fileName = $o['fileName'];
        if (isset($o['url'])) $this->url = $o['url'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->fileName)) $o['fileName'] = $this->fileName;
        if (isset($this->url)) $o['url'] = $this->url;
        return empty($o) ? new class(){} : $o;
    }
}

class GenerationResult implements JsonSerializable
{
    public function __construct(
        /** @var array<AiProviderTextOutput>|null */
        public ?array $textOutputs=null,
        /** @var array<AiProviderFileOutput>|null */
        public ?array $outputs=null,
        /** @var string|null */
        public ?string $error=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['textOutputs'])) $this->textOutputs = JsonConverters::fromArray('AiProviderTextOutput', $o['textOutputs']);
        if (isset($o['outputs'])) $this->outputs = JsonConverters::fromArray('AiProviderFileOutput', $o['outputs']);
        if (isset($o['error'])) $this->error = $o['error'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->textOutputs)) $o['textOutputs'] = JsonConverters::toArray('AiProviderTextOutput', $this->textOutputs);
        if (isset($this->outputs)) $o['outputs'] = JsonConverters::toArray('AiProviderFileOutput', $this->outputs);
        if (isset($this->error)) $o['error'] = $this->error;
        return empty($o) ? new class(){} : $o;
    }
}

// @DataContract
class OllamaModelDetails implements JsonSerializable
{
    public function __construct(
        // @DataMember(Name="parent_model")
        /** @var string */
        public string $parent_model='',

        // @DataMember(Name="format")
        /** @var string */
        public string $format='',

        // @DataMember(Name="family")
        /** @var string */
        public string $family='',

        // @DataMember(Name="families")
        /** @var array<string>|null */
        public ?array $families=null,

        // @DataMember(Name="parameter_size")
        /** @var string */
        public string $parameter_size='',

        // @DataMember(Name="quantization_level")
        /** @var string */
        public string $quantization_level=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['parent_model'])) $this->parent_model = $o['parent_model'];
        if (isset($o['format'])) $this->format = $o['format'];
        if (isset($o['family'])) $this->family = $o['family'];
        if (isset($o['families'])) $this->families = JsonConverters::fromArray('string', $o['families']);
        if (isset($o['parameter_size'])) $this->parameter_size = $o['parameter_size'];
        if (isset($o['quantization_level'])) $this->quantization_level = $o['quantization_level'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->parent_model)) $o['parent_model'] = $this->parent_model;
        if (isset($this->format)) $o['format'] = $this->format;
        if (isset($this->family)) $o['family'] = $this->family;
        if (isset($this->families)) $o['families'] = JsonConverters::toArray('string', $this->families);
        if (isset($this->parameter_size)) $o['parameter_size'] = $this->parameter_size;
        if (isset($this->quantization_level)) $o['quantization_level'] = $this->quantization_level;
        return empty($o) ? new class(){} : $o;
    }
}

// @DataContract
class OllamaModel implements JsonSerializable
{
    public function __construct(
        // @DataMember(Name="name")
        /** @var string */
        public string $name='',

        // @DataMember(Name="model")
        /** @var string */
        public string $model='',

        // @DataMember(Name="modified_at")
        /** @var DateTime */
        public DateTime $modified_at=new DateTime(),

        // @DataMember(Name="size")
        /** @var int */
        public int $size=0,

        // @DataMember(Name="digest")
        /** @var string */
        public string $digest='',

        // @DataMember(Name="details")
        /** @var OllamaModelDetails|null */
        public ?OllamaModelDetails $details=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['model'])) $this->model = $o['model'];
        if (isset($o['modified_at'])) $this->modified_at = JsonConverters::from('DateTime', $o['modified_at']);
        if (isset($o['size'])) $this->size = $o['size'];
        if (isset($o['digest'])) $this->digest = $o['digest'];
        if (isset($o['details'])) $this->details = JsonConverters::from('OllamaModelDetails', $o['details']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->model)) $o['model'] = $this->model;
        if (isset($this->modified_at)) $o['modified_at'] = JsonConverters::to('DateTime', $this->modified_at);
        if (isset($this->size)) $o['size'] = $this->size;
        if (isset($this->digest)) $o['digest'] = $this->digest;
        if (isset($this->details)) $o['details'] = JsonConverters::to('OllamaModelDetails', $this->details);
        return empty($o) ? new class(){} : $o;
    }
}

// @DataContract
class ChoiceMessage implements JsonSerializable
{
    public function __construct(
        /** @description The contents of the message. */
        // @DataMember(Name="content")
        /** @var string */
        public string $content='',

        /** @description The tool calls generated by the model, such as function calls. */
        // @DataMember(Name="tool_calls")
        /** @var ToolCall[] */
        public array $tool_calls=[],

        /** @description The role of the author of this message. */
        // @DataMember(Name="role")
        /** @var string */
        public string $role=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['content'])) $this->content = $o['content'];
        if (isset($o['tool_calls'])) $this->tool_calls = JsonConverters::fromArray('ToolCall', $o['tool_calls']);
        if (isset($o['role'])) $this->role = $o['role'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->content)) $o['content'] = $this->content;
        if (isset($this->tool_calls)) $o['tool_calls'] = JsonConverters::toArray('ToolCall', $this->tool_calls);
        if (isset($this->role)) $o['role'] = $this->role;
        return empty($o) ? new class(){} : $o;
    }
}

class Choice implements JsonSerializable
{
    public function __construct(
        /** @description The reason the model stopped generating tokens. This will be stop if the model hit a natural stop point or a provided stop sequence, length if the maximum number of tokens specified in the request was reached, content_filter if content was omitted due to a flag from our content filters, tool_calls if the model called a tool */
        // @DataMember(Name="finish_reason")
        /** @var string */
        public string $finish_reason='',

        /** @description The index of the choice in the list of choices. */
        // @DataMember(Name="index")
        /** @var int */
        public int $index=0,

        /** @description A chat completion message generated by the model. */
        // @DataMember(Name="message")
        /** @var ChoiceMessage|null */
        public ?ChoiceMessage $message=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['finish_reason'])) $this->finish_reason = $o['finish_reason'];
        if (isset($o['index'])) $this->index = $o['index'];
        if (isset($o['message'])) $this->message = JsonConverters::from('ChoiceMessage', $o['message']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->finish_reason)) $o['finish_reason'] = $this->finish_reason;
        if (isset($this->index)) $o['index'] = $this->index;
        if (isset($this->message)) $o['message'] = JsonConverters::to('ChoiceMessage', $this->message);
        return empty($o) ? new class(){} : $o;
    }
}

/** @description Usage statistics for the completion request. */
// @DataContract
class OpenAiUsage implements JsonSerializable
{
    public function __construct(
        /** @description Number of tokens in the generated completion. */
        // @DataMember(Name="completion_tokens")
        /** @var int */
        public int $completion_tokens=0,

        /** @description Number of tokens in the prompt. */
        // @DataMember(Name="prompt_tokens")
        /** @var int */
        public int $prompt_tokens=0,

        /** @description Total number of tokens used in the request (prompt + completion). */
        // @DataMember(Name="total_tokens")
        /** @var int */
        public int $total_tokens=0
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['completion_tokens'])) $this->completion_tokens = $o['completion_tokens'];
        if (isset($o['prompt_tokens'])) $this->prompt_tokens = $o['prompt_tokens'];
        if (isset($o['total_tokens'])) $this->total_tokens = $o['total_tokens'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->completion_tokens)) $o['completion_tokens'] = $this->completion_tokens;
        if (isset($this->prompt_tokens)) $o['prompt_tokens'] = $this->prompt_tokens;
        if (isset($this->total_tokens)) $o['total_tokens'] = $this->total_tokens;
        return empty($o) ? new class(){} : $o;
    }
}

class AdminDataResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<PageStats>|null */
        public ?array $pageStats=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['pageStats'])) $this->pageStats = JsonConverters::fromArray('PageStats', $o['pageStats']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->pageStats)) $o['pageStats'] = JsonConverters::toArray('PageStats', $this->pageStats);
        return empty($o) ? new class(){} : $o;
    }
}

/** @description Response object for transform requests */
class MediaTransformResponse implements JsonSerializable
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

/** @description Base class for queueable transformation requests */
class QueueMediaTransformResponse implements JsonSerializable
{
    public function __construct(
        /** @description Unique identifier of the background job */
        // @ApiMember(Description="Unique identifier of the background job")
        /** @var int */
        public int $jobId=0,

        /** @description Client-provided identifier for the request */
        // @ApiMember(Description="Client-provided identifier for the request")
        /** @var string */
        public string $refId='',

        /** @description Current state of the background job */
        // @ApiMember(Description="Current state of the background job")
        /** @var BackgroundJobState|null */
        public ?BackgroundJobState $jobState=null,

        /** @description Current status of the transformation request */
        // @ApiMember(Description="Current status of the transformation request")
        /** @var string|null */
        public ?string $status=null,

        /** @description Detailed response status information */
        // @ApiMember(Description="Detailed response status information")
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null,

        /** @description URL to check the status of the request */
        // @ApiMember(Description="URL to check the status of the request")
        /** @var string */
        public string $statusUrl=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['jobId'])) $this->jobId = $o['jobId'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['jobState'])) $this->jobState = JsonConverters::from('BackgroundJobState', $o['jobState']);
        if (isset($o['status'])) $this->status = $o['status'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
        if (isset($o['statusUrl'])) $this->statusUrl = $o['statusUrl'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->jobId)) $o['jobId'] = $this->jobId;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->jobState)) $o['jobState'] = JsonConverters::to('BackgroundJobState', $this->jobState);
        if (isset($this->status)) $o['status'] = $this->status;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        if (isset($this->statusUrl)) $o['statusUrl'] = $this->statusUrl;
        return empty($o) ? new class(){} : $o;
    }
}

class GetSummaryStatsResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<SummaryStats>|null */
        public ?array $providerStats=null,
        /** @var array<SummaryStats>|null */
        public ?array $modelStats=null,
        /** @var array<SummaryStats>|null */
        public ?array $monthStats=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['providerStats'])) $this->providerStats = JsonConverters::fromArray('SummaryStats', $o['providerStats']);
        if (isset($o['modelStats'])) $this->modelStats = JsonConverters::fromArray('SummaryStats', $o['modelStats']);
        if (isset($o['monthStats'])) $this->monthStats = JsonConverters::fromArray('SummaryStats', $o['monthStats']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->providerStats)) $o['providerStats'] = JsonConverters::toArray('SummaryStats', $this->providerStats);
        if (isset($this->modelStats)) $o['modelStats'] = JsonConverters::toArray('SummaryStats', $this->modelStats);
        if (isset($this->monthStats)) $o['monthStats'] = JsonConverters::toArray('SummaryStats', $this->monthStats);
        return empty($o) ? new class(){} : $o;
    }
}

class GetComfyModelsResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<string>|null */
        public ?array $results=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('string', $o['results']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('string', $this->results);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class GetComfyModelMappingsResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<string,string>|null */
        public ?array $models=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['models'])) $this->models = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['models']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->models)) $o['models'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->models);
        return empty($o) ? new class(){} : $o;
    }
}

class GetJobStatusResponse implements JsonSerializable
{
    public function __construct(
        /** @description Unique identifier of the background job */
        // @ApiMember(Description="Unique identifier of the background job")
        /** @var int */
        public int $jobId=0,

        /** @description Client-provided identifier for the request */
        // @ApiMember(Description="Client-provided identifier for the request")
        /** @var string */
        public string $refId='',

        /** @description Current state of the background job */
        // @ApiMember(Description="Current state of the background job")
        /** @var BackgroundJobState|null */
        public ?BackgroundJobState $jobState=null,

        /** @description Current status of the generation request */
        // @ApiMember(Description="Current status of the generation request")
        /** @var string|null */
        public ?string $status=null,

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
        if (isset($o['jobId'])) $this->jobId = $o['jobId'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['jobState'])) $this->jobState = JsonConverters::from('BackgroundJobState', $o['jobState']);
        if (isset($o['status'])) $this->status = $o['status'];
        if (isset($o['outputs'])) $this->outputs = JsonConverters::fromArray('ArtifactOutput', $o['outputs']);
        if (isset($o['textOutputs'])) $this->textOutputs = JsonConverters::fromArray('TextOutput', $o['textOutputs']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->jobId)) $o['jobId'] = $this->jobId;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->jobState)) $o['jobState'] = JsonConverters::to('BackgroundJobState', $this->jobState);
        if (isset($this->status)) $o['status'] = $this->status;
        if (isset($this->outputs)) $o['outputs'] = JsonConverters::toArray('ArtifactOutput', $this->outputs);
        if (isset($this->textOutputs)) $o['textOutputs'] = JsonConverters::toArray('TextOutput', $this->textOutputs);
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

class QueueGenerationResponse implements JsonSerializable
{
    public function __construct(
        /** @description Unique identifier of the background job */
        // @ApiMember(Description="Unique identifier of the background job")
        /** @var int */
        public int $jobId=0,

        /** @description Client-provided identifier for the request */
        // @ApiMember(Description="Client-provided identifier for the request")
        /** @var string */
        public string $refId='',

        /** @description Current state of the background job */
        // @ApiMember(Description="Current state of the background job")
        /** @var BackgroundJobState|null */
        public ?BackgroundJobState $jobState=null,

        /** @description Current status of the generation request */
        // @ApiMember(Description="Current status of the generation request")
        /** @var string|null */
        public ?string $status=null,

        /** @description Detailed response status information */
        // @ApiMember(Description="Detailed response status information")
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null,

        /** @description URL to check the status of the generation request */
        // @ApiMember(Description="URL to check the status of the generation request")
        /** @var string */
        public string $statusUrl=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['jobId'])) $this->jobId = $o['jobId'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['jobState'])) $this->jobState = JsonConverters::from('BackgroundJobState', $o['jobState']);
        if (isset($o['status'])) $this->status = $o['status'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
        if (isset($o['statusUrl'])) $this->statusUrl = $o['statusUrl'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->jobId)) $o['jobId'] = $this->jobId;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->jobState)) $o['jobState'] = JsonConverters::to('BackgroundJobState', $this->jobState);
        if (isset($this->status)) $o['status'] = $this->status;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        if (isset($this->statusUrl)) $o['statusUrl'] = $this->statusUrl;
        return empty($o) ? new class(){} : $o;
    }
}

class CreateGenerationResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string */
        public string $refId=''
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
}

class GetGenerationResponse implements JsonSerializable
{
    public function __construct(
        /** @var GenerationArgs|null */
        public ?GenerationArgs $request=null,
        /** @var GenerationResult|null */
        public ?GenerationResult $result=null,
        /** @var array<AiProviderFileOutput>|null */
        public ?array $outputs=null,
        /** @var array<AiProviderTextOutput>|null */
        public ?array $textOutputs=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['request'])) $this->request = JsonConverters::from('GenerationArgs', $o['request']);
        if (isset($o['result'])) $this->result = JsonConverters::from('GenerationResult', $o['result']);
        if (isset($o['outputs'])) $this->outputs = JsonConverters::fromArray('AiProviderFileOutput', $o['outputs']);
        if (isset($o['textOutputs'])) $this->textOutputs = JsonConverters::fromArray('AiProviderTextOutput', $o['textOutputs']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->request)) $o['request'] = JsonConverters::to('GenerationArgs', $this->request);
        if (isset($this->result)) $o['result'] = JsonConverters::to('GenerationResult', $this->result);
        if (isset($this->outputs)) $o['outputs'] = JsonConverters::toArray('AiProviderFileOutput', $this->outputs);
        if (isset($this->textOutputs)) $o['textOutputs'] = JsonConverters::toArray('AiProviderTextOutput', $this->textOutputs);
        return empty($o) ? new class(){} : $o;
    }
}

class CreateTransformResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string */
        public string $refId=''
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
}

class HelloResponse implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $result=''
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

class GetOllamaModelsResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<OllamaModel>|null */
        public ?array $results=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('OllamaModel', $o['results']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('OllamaModel', $this->results);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class GetWorkerStatsResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<WorkerStats>|null */
        public ?array $results=null,
        /** @var array<string,int>|null */
        public ?array $queueCounts=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('WorkerStats', $o['results']);
        if (isset($o['queueCounts'])) $this->queueCounts = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','int']), $o['queueCounts']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('WorkerStats', $this->results);
        if (isset($this->queueCounts)) $o['queueCounts'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','int']), $this->queueCounts);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

// @DataContract
class OpenAiChatResponse implements JsonSerializable
{
    public function __construct(
        /** @description A unique identifier for the chat completion. */
        // @DataMember(Name="id")
        /** @var string */
        public string $id='',

        /** @description A list of chat completion choices. Can be more than one if n is greater than 1. */
        // @DataMember(Name="choices")
        /** @var array<Choice>|null */
        public ?array $choices=null,

        /** @description The Unix timestamp (in seconds) of when the chat completion was created. */
        // @DataMember(Name="created")
        /** @var int */
        public int $created=0,

        /** @description The model used for the chat completion. */
        // @DataMember(Name="model")
        /** @var string */
        public string $model='',

        /** @description This fingerprint represents the backend configuration that the model runs with. */
        // @DataMember(Name="system_fingerprint")
        /** @var string */
        public string $system_fingerprint='',

        /** @description The object type, which is always chat.completion. */
        // @DataMember(Name="object")
        /** @var string */
        public string $object='',

        /** @description Usage statistics for the completion request. */
        // @DataMember(Name="usage")
        /** @var OpenAiUsage|null */
        public ?OpenAiUsage $usage=null,

        // @DataMember(Name="responseStatus")
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['choices'])) $this->choices = JsonConverters::fromArray('Choice', $o['choices']);
        if (isset($o['created'])) $this->created = $o['created'];
        if (isset($o['model'])) $this->model = $o['model'];
        if (isset($o['system_fingerprint'])) $this->system_fingerprint = $o['system_fingerprint'];
        if (isset($o['object'])) $this->object = $o['object'];
        if (isset($o['usage'])) $this->usage = JsonConverters::from('OpenAiUsage', $o['usage']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->choices)) $o['choices'] = JsonConverters::toArray('Choice', $this->choices);
        if (isset($this->created)) $o['created'] = $this->created;
        if (isset($this->model)) $o['model'] = $this->model;
        if (isset($this->system_fingerprint)) $o['system_fingerprint'] = $this->system_fingerprint;
        if (isset($this->object)) $o['object'] = $this->object;
        if (isset($this->usage)) $o['usage'] = JsonConverters::to('OpenAiUsage', $this->usage);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class QueueOpenAiChatResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string */
        public string $refId='',
        /** @var string */
        public string $statusUrl='',
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['statusUrl'])) $this->statusUrl = $o['statusUrl'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->statusUrl)) $o['statusUrl'] = $this->statusUrl;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class GetOpenAiChatResponse implements JsonSerializable
{
    public function __construct(
        /** @var BackgroundJobBase|null */
        public ?BackgroundJobBase $result=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['result'])) $this->result = JsonConverters::from('BackgroundJobBase', $o['result']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->result)) $o['result'] = JsonConverters::to('BackgroundJobBase', $this->result);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class GetOpenAiChatStatusResponse implements JsonSerializable
{
    public function __construct(
        /** @description Unique identifier of the background job */
        // @ApiMember(Description="Unique identifier of the background job")
        /** @var int */
        public int $jobId=0,

        /** @description Client-provided identifier for the request */
        // @ApiMember(Description="Client-provided identifier for the request")
        /** @var string */
        public string $refId='',

        /** @description Current state of the background job */
        // @ApiMember(Description="Current state of the background job")
        /** @var BackgroundJobState|null */
        public ?BackgroundJobState $jobState=null,

        /** @description Current status of the generation request */
        // @ApiMember(Description="Current status of the generation request")
        /** @var string|null */
        public ?string $status=null,

        /** @description Detailed response status information */
        // @ApiMember(Description="Detailed response status information")
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null,

        /** @description Chat response */
        // @ApiMember(Description="Chat response")
        /** @var OpenAiChatResponse|null */
        public ?OpenAiChatResponse $chatResponse=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['jobId'])) $this->jobId = $o['jobId'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['jobState'])) $this->jobState = JsonConverters::from('BackgroundJobState', $o['jobState']);
        if (isset($o['status'])) $this->status = $o['status'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
        if (isset($o['chatResponse'])) $this->chatResponse = JsonConverters::from('OpenAiChatResponse', $o['chatResponse']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->jobId)) $o['jobId'] = $this->jobId;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->jobState)) $o['jobState'] = JsonConverters::to('BackgroundJobState', $this->jobState);
        if (isset($this->status)) $o['status'] = $this->status;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        if (isset($this->chatResponse)) $o['chatResponse'] = JsonConverters::to('OpenAiChatResponse', $this->chatResponse);
        return empty($o) ? new class(){} : $o;
    }
}

class GetActiveProvidersResponse implements JsonSerializable
{
    public function __construct(
        /** @var AiProvider[] */
        public array $results=[],
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('AiProvider', $o['results']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('AiProvider', $this->results);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class CreateApiKeyResponse implements JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @var string */
        public string $key='',
        /** @var string */
        public string $name='',
        /** @var string|null */
        public ?string $userId=null,
        /** @var string|null */
        public ?string $userName=null,
        /** @var string */
        public string $visibleKey='',
        /** @var DateTime */
        public DateTime $createdDate=new DateTime(),
        /** @var DateTime|null */
        public ?DateTime $expiryDate=null,
        /** @var DateTime|null */
        public ?DateTime $cancelledDate=null,
        /** @var string|null */
        public ?string $notes=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['key'])) $this->key = $o['key'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['userId'])) $this->userId = $o['userId'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['visibleKey'])) $this->visibleKey = $o['visibleKey'];
        if (isset($o['createdDate'])) $this->createdDate = JsonConverters::from('DateTime', $o['createdDate']);
        if (isset($o['expiryDate'])) $this->expiryDate = JsonConverters::from('DateTime', $o['expiryDate']);
        if (isset($o['cancelledDate'])) $this->cancelledDate = JsonConverters::from('DateTime', $o['cancelledDate']);
        if (isset($o['notes'])) $this->notes = $o['notes'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->key)) $o['key'] = $this->key;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->userId)) $o['userId'] = $this->userId;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->visibleKey)) $o['visibleKey'] = $this->visibleKey;
        if (isset($this->createdDate)) $o['createdDate'] = JsonConverters::to('DateTime', $this->createdDate);
        if (isset($this->expiryDate)) $o['expiryDate'] = JsonConverters::to('DateTime', $this->expiryDate);
        if (isset($this->cancelledDate)) $o['cancelledDate'] = JsonConverters::to('DateTime', $this->cancelledDate);
        if (isset($this->notes)) $o['notes'] = $this->notes;
        return empty($o) ? new class(){} : $o;
    }
}

class DeleteFilesResponse implements JsonSerializable
{
    public function __construct(
        /** @var array<string>|null */
        public ?array $deleted=null,
        /** @var array<string>|null */
        public ?array $missing=null,
        /** @var array<string>|null */
        public ?array $failed=null,
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['deleted'])) $this->deleted = JsonConverters::fromArray('string', $o['deleted']);
        if (isset($o['missing'])) $this->missing = JsonConverters::fromArray('string', $o['missing']);
        if (isset($o['failed'])) $this->failed = JsonConverters::fromArray('string', $o['failed']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->deleted)) $o['deleted'] = JsonConverters::toArray('string', $this->deleted);
        if (isset($this->missing)) $o['missing'] = JsonConverters::toArray('string', $this->missing);
        if (isset($this->failed)) $o['failed'] = JsonConverters::toArray('string', $this->failed);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

class MigrateArtifactResponse implements JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $filePath='',
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['filePath'])) $this->filePath = $o['filePath'];
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->filePath)) $o['filePath'] = $this->filePath;
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}

#[Returns('AdminDataResponse')]
class AdminData implements IReturn, IGet, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'AdminData'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new AdminDataResponse(); }
}

/** @description Convert an audio file to a different format */
#[Returns('MediaTransformResponse')]
class ConvertAudio implements IReturn, IMediaTransform, JsonSerializable
{
    public function __construct(
        /** @description The desired output format for the converted audio */
        // @ApiMember(Description="The desired output format for the converted audio")
        // @Required()
        /** @var AudioFormat|null */
        public ?AudioFormat $outputFormat=null,

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
        if (isset($o['outputFormat'])) $this->outputFormat = JsonConverters::from('AudioFormat', $o['outputFormat']);
        if (isset($o['audio'])) $this->audio = JsonConverters::from('ByteArray', $o['audio']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->outputFormat)) $o['outputFormat'] = JsonConverters::to('AudioFormat', $this->outputFormat);
        if (isset($this->audio)) $o['audio'] = JsonConverters::to('ByteArray', $this->audio);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ConvertAudio'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new MediaTransformResponse(); }
}

/** @description Convert an audio file to a different format */
#[Returns('QueueMediaTransformResponse')]
class QueueConvertAudio implements IReturn, IQueueMediaTransform, JsonSerializable
{
    public function __construct(
        /** @description The desired output format for the converted audio */
        // @ApiMember(Description="The desired output format for the converted audio")
        // @Required()
        /** @var AudioFormat|null */
        public ?AudioFormat $outputFormat=null,

        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $audio=null,

        /** @description Optional client-provided identifier for the request */
        // @ApiMember(Description="Optional client-provided identifier for the request")
        /** @var string|null */
        public ?string $refId=null,

        /** @description Optional queue or topic to reply to */
        // @ApiMember(Description="Optional queue or topic to reply to")
        /** @var string|null */
        public ?string $replyTo=null,

        /** @description Tag to identify the request */
        // @ApiMember(Description="Tag to identify the request")
        /** @var string|null */
        public ?string $tag=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['outputFormat'])) $this->outputFormat = JsonConverters::from('AudioFormat', $o['outputFormat']);
        if (isset($o['audio'])) $this->audio = JsonConverters::from('ByteArray', $o['audio']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->outputFormat)) $o['outputFormat'] = JsonConverters::to('AudioFormat', $this->outputFormat);
        if (isset($this->audio)) $o['audio'] = JsonConverters::to('ByteArray', $this->audio);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueueConvertAudio'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new QueueMediaTransformResponse(); }
}

#[Returns('GetSummaryStatsResponse')]
class GetSummaryStats implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var DateTime|null */
        public ?DateTime $from=null,
        /** @var DateTime|null */
        public ?DateTime $to=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['from'])) $this->from = JsonConverters::from('DateTime', $o['from']);
        if (isset($o['to'])) $this->to = JsonConverters::from('DateTime', $o['to']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->from)) $o['from'] = JsonConverters::to('DateTime', $this->from);
        if (isset($this->to)) $o['to'] = JsonConverters::to('DateTime', $this->to);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetSummaryStats'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetSummaryStatsResponse(); }
}

#[Returns('StringsResponse')]
class PopulateChatSummary implements IReturn, IGet, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'PopulateChatSummary'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new StringsResponse(); }
}

#[Returns('GetComfyModelsResponse')]
class GetComfyModels implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $apiBaseUrl=null,
        /** @var string|null */
        public ?string $apiKey=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['apiBaseUrl'])) $this->apiBaseUrl = $o['apiBaseUrl'];
        if (isset($o['apiKey'])) $this->apiKey = $o['apiKey'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->apiBaseUrl)) $o['apiBaseUrl'] = $this->apiBaseUrl;
        if (isset($this->apiKey)) $o['apiKey'] = $this->apiKey;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetComfyModels'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new GetComfyModelsResponse(); }
}

#[Returns('GetComfyModelMappingsResponse')]
class GetComfyModelMappings implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetComfyModelMappings'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new GetComfyModelMappingsResponse(); }
}

/** @description Get job status */
// @Api(Description="Get job status")
#[Returns('GetJobStatusResponse')]
class GetJobStatus implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @description Unique identifier of the background job */
        // @ApiMember(Description="Unique identifier of the background job")
        /** @var int|null */
        public ?int $jobId=null,

        /** @description Client-provided identifier for the request */
        // @ApiMember(Description="Client-provided identifier for the request")
        /** @var string|null */
        public ?string $refId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['jobId'])) $this->jobId = $o['jobId'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->jobId)) $o['jobId'] = $this->jobId;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetJobStatus'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetJobStatusResponse(); }
}

/** @description Active Media Worker Models available in AI Server */
#[Returns('StringsResponse')]
class ActiveMediaModels implements IReturn, IGet, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ActiveMediaModels'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new StringsResponse(); }
}

/** @description Generate image from text description */
// @Api(Description="Generate image from text description")
#[Returns('GenerationResponse')]
class TextToImage implements IReturn, IGeneration, JsonSerializable
{
    public function __construct(
        /** @description The main prompt describing the desired image */
        // @ApiMember(Description="The main prompt describing the desired image")
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $positivePrompt='',

        /** @description Optional prompt specifying what should not be in the image */
        // @ApiMember(Description="Optional prompt specifying what should not be in the image")
        /** @var string|null */
        public ?string $negativePrompt=null,

        /** @description Desired width of the generated image */
        // @ApiMember(Description="Desired width of the generated image")
        /** @var int|null */
        public ?int $width=null,

        /** @description Desired height of the generated image */
        // @ApiMember(Description="Desired height of the generated image")
        /** @var int|null */
        public ?int $height=null,

        /** @description Number of images to generate in a single batch */
        // @ApiMember(Description="Number of images to generate in a single batch")
        /** @var int|null */
        public ?int $batchSize=null,

        /** @description The AI model to use for image generation */
        // @ApiMember(Description="The AI model to use for image generation")
        /** @var string|null */
        public ?string $model=null,

        /** @description Optional seed for reproducible results */
        // @ApiMember(Description="Optional seed for reproducible results")
        /** @var int|null */
        public ?int $seed=null,

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
        if (isset($o['positivePrompt'])) $this->positivePrompt = $o['positivePrompt'];
        if (isset($o['negativePrompt'])) $this->negativePrompt = $o['negativePrompt'];
        if (isset($o['width'])) $this->width = $o['width'];
        if (isset($o['height'])) $this->height = $o['height'];
        if (isset($o['batchSize'])) $this->batchSize = $o['batchSize'];
        if (isset($o['model'])) $this->model = $o['model'];
        if (isset($o['seed'])) $this->seed = $o['seed'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->positivePrompt)) $o['positivePrompt'] = $this->positivePrompt;
        if (isset($this->negativePrompt)) $o['negativePrompt'] = $this->negativePrompt;
        if (isset($this->width)) $o['width'] = $this->width;
        if (isset($this->height)) $o['height'] = $this->height;
        if (isset($this->batchSize)) $o['batchSize'] = $this->batchSize;
        if (isset($this->model)) $o['model'] = $this->model;
        if (isset($this->seed)) $o['seed'] = $this->seed;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'TextToImage'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new GenerationResponse(); }
}

/** @description Generate image from another image */
// @Api(Description="Generate image from another image")
#[Returns('GenerationResponse')]
class ImageToImage implements IReturn, IGeneration, JsonSerializable
{
    public function __construct(
        /** @description The image to use as input */
        // @ApiMember(Description="The image to use as input")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $image=null,

        /** @description Prompt describing the desired output */
        // @ApiMember(Description="Prompt describing the desired output")
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $positivePrompt='',

        /** @description Negative prompt describing what should not be in the image */
        // @ApiMember(Description="Negative prompt describing what should not be in the image")
        /** @var string|null */
        public ?string $negativePrompt=null,

        /** @description The AI model to use for image generation */
        // @ApiMember(Description="The AI model to use for image generation")
        /** @var string|null */
        public ?string $model=null,

        /** @description Optional specific amount of denoise to apply */
        // @ApiMember(Description="Optional specific amount of denoise to apply")
        /** @var float|null */
        public ?float $denoise=null,

        /** @description Number of images to generate in a single batch */
        // @ApiMember(Description="Number of images to generate in a single batch")
        /** @var int|null */
        public ?int $batchSize=null,

        /** @description Optional seed for reproducible results in image generation */
        // @ApiMember(Description="Optional seed for reproducible results in image generation")
        /** @var int|null */
        public ?int $seed=null,

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
        if (isset($o['image'])) $this->image = JsonConverters::from('ByteArray', $o['image']);
        if (isset($o['positivePrompt'])) $this->positivePrompt = $o['positivePrompt'];
        if (isset($o['negativePrompt'])) $this->negativePrompt = $o['negativePrompt'];
        if (isset($o['model'])) $this->model = $o['model'];
        if (isset($o['denoise'])) $this->denoise = $o['denoise'];
        if (isset($o['batchSize'])) $this->batchSize = $o['batchSize'];
        if (isset($o['seed'])) $this->seed = $o['seed'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->image)) $o['image'] = JsonConverters::to('ByteArray', $this->image);
        if (isset($this->positivePrompt)) $o['positivePrompt'] = $this->positivePrompt;
        if (isset($this->negativePrompt)) $o['negativePrompt'] = $this->negativePrompt;
        if (isset($this->model)) $o['model'] = $this->model;
        if (isset($this->denoise)) $o['denoise'] = $this->denoise;
        if (isset($this->batchSize)) $o['batchSize'] = $this->batchSize;
        if (isset($this->seed)) $o['seed'] = $this->seed;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ImageToImage'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new GenerationResponse(); }
}

/** @description Upscale an image */
// @Api(Description="Upscale an image")
#[Returns('GenerationResponse')]
class ImageUpscale implements IReturn, IGeneration, JsonSerializable
{
    public function __construct(
        /** @description The image to upscale */
        // @ApiMember(Description="The image to upscale")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $image=null,

        /** @description Optional seed for reproducible results in image generation */
        // @ApiMember(Description="Optional seed for reproducible results in image generation")
        /** @var int|null */
        public ?int $seed=null,

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
        if (isset($o['image'])) $this->image = JsonConverters::from('ByteArray', $o['image']);
        if (isset($o['seed'])) $this->seed = $o['seed'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->image)) $o['image'] = JsonConverters::to('ByteArray', $this->image);
        if (isset($this->seed)) $o['seed'] = $this->seed;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ImageUpscale'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new GenerationResponse(); }
}

/** @description Generate image with masked area */
// @Api(Description="Generate image with masked area")
#[Returns('GenerationResponse')]
class ImageWithMask implements IReturn, IGeneration, JsonSerializable
{
    public function __construct(
        /** @description Prompt describing the desired output in the masked area */
        // @ApiMember(Description="Prompt describing the desired output in the masked area")
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $positivePrompt='',

        /** @description Negative prompt describing what should not be in the masked area */
        // @ApiMember(Description="Negative prompt describing what should not be in the masked area")
        /** @var string|null */
        public ?string $negativePrompt=null,

        /** @description The image to use as input */
        // @ApiMember(Description="The image to use as input")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $image=null,

        /** @description The mask to use as input */
        // @ApiMember(Description="The mask to use as input")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $mask=null,

        /** @description Optional specific amount of denoise to apply */
        // @ApiMember(Description="Optional specific amount of denoise to apply")
        /** @var float|null */
        public ?float $denoise=null,

        /** @description Optional seed for reproducible results in image generation */
        // @ApiMember(Description="Optional seed for reproducible results in image generation")
        /** @var int|null */
        public ?int $seed=null,

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
        if (isset($o['positivePrompt'])) $this->positivePrompt = $o['positivePrompt'];
        if (isset($o['negativePrompt'])) $this->negativePrompt = $o['negativePrompt'];
        if (isset($o['image'])) $this->image = JsonConverters::from('ByteArray', $o['image']);
        if (isset($o['mask'])) $this->mask = JsonConverters::from('ByteArray', $o['mask']);
        if (isset($o['denoise'])) $this->denoise = $o['denoise'];
        if (isset($o['seed'])) $this->seed = $o['seed'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->positivePrompt)) $o['positivePrompt'] = $this->positivePrompt;
        if (isset($this->negativePrompt)) $o['negativePrompt'] = $this->negativePrompt;
        if (isset($this->image)) $o['image'] = JsonConverters::to('ByteArray', $this->image);
        if (isset($this->mask)) $o['mask'] = JsonConverters::to('ByteArray', $this->mask);
        if (isset($this->denoise)) $o['denoise'] = $this->denoise;
        if (isset($this->seed)) $o['seed'] = $this->seed;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ImageWithMask'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new GenerationResponse(); }
}

/** @description Convert image to text */
// @Api(Description="Convert image to text")
#[Returns('GenerationResponse')]
class ImageToText implements IReturn, IGeneration, JsonSerializable
{
    public function __construct(
        /** @description The image to convert to text */
        // @ApiMember(Description="The image to convert to text")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $image=null,

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
        if (isset($o['image'])) $this->image = JsonConverters::from('ByteArray', $o['image']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->image)) $o['image'] = JsonConverters::to('ByteArray', $this->image);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ImageToText'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new GenerationResponse(); }
}

/** @description Generate image from text description */
// @Api(Description="Generate image from text description")
#[Returns('QueueGenerationResponse')]
class QueueTextToImage implements IReturn, IQueueGeneration, JsonSerializable
{
    public function __construct(
        /** @description The main prompt describing the desired image */
        // @ApiMember(Description="The main prompt describing the desired image")
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $positivePrompt='',

        /** @description Optional prompt specifying what should not be in the image */
        // @ApiMember(Description="Optional prompt specifying what should not be in the image")
        /** @var string|null */
        public ?string $negativePrompt=null,

        /** @description Desired width of the generated image */
        // @ApiMember(Description="Desired width of the generated image")
        /** @var int|null */
        public ?int $width=null,

        /** @description Desired height of the generated image */
        // @ApiMember(Description="Desired height of the generated image")
        /** @var int|null */
        public ?int $height=null,

        /** @description Number of images to generate in a single batch */
        // @ApiMember(Description="Number of images to generate in a single batch")
        /** @var int|null */
        public ?int $batchSize=null,

        /** @description The AI model to use for image generation */
        // @ApiMember(Description="The AI model to use for image generation")
        /** @var string|null */
        public ?string $model=null,

        /** @description Optional seed for reproducible results */
        // @ApiMember(Description="Optional seed for reproducible results")
        /** @var int|null */
        public ?int $seed=null,

        /** @description Optional client-provided identifier for the request */
        // @ApiMember(Description="Optional client-provided identifier for the request")
        /** @var string|null */
        public ?string $refId=null,

        /** @description Optional queue or topic to reply to */
        // @ApiMember(Description="Optional queue or topic to reply to")
        /** @var string|null */
        public ?string $replyTo=null,

        /** @description Tag to identify the request */
        // @ApiMember(Description="Tag to identify the request")
        /** @var string|null */
        public ?string $tag=null,

        /** @description Optional state to associate with the request */
        // @ApiMember(Description="Optional state to associate with the request")
        /** @var string|null */
        public ?string $state=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['positivePrompt'])) $this->positivePrompt = $o['positivePrompt'];
        if (isset($o['negativePrompt'])) $this->negativePrompt = $o['negativePrompt'];
        if (isset($o['width'])) $this->width = $o['width'];
        if (isset($o['height'])) $this->height = $o['height'];
        if (isset($o['batchSize'])) $this->batchSize = $o['batchSize'];
        if (isset($o['model'])) $this->model = $o['model'];
        if (isset($o['seed'])) $this->seed = $o['seed'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
        if (isset($o['state'])) $this->state = $o['state'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->positivePrompt)) $o['positivePrompt'] = $this->positivePrompt;
        if (isset($this->negativePrompt)) $o['negativePrompt'] = $this->negativePrompt;
        if (isset($this->width)) $o['width'] = $this->width;
        if (isset($this->height)) $o['height'] = $this->height;
        if (isset($this->batchSize)) $o['batchSize'] = $this->batchSize;
        if (isset($this->model)) $o['model'] = $this->model;
        if (isset($this->seed)) $o['seed'] = $this->seed;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        if (isset($this->state)) $o['state'] = $this->state;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueueTextToImage'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new QueueGenerationResponse(); }
}

/** @description Upscale an image */
// @Api(Description="Upscale an image")
#[Returns('QueueGenerationResponse')]
class QueueImageUpscale implements IReturn, IQueueGeneration, JsonSerializable
{
    public function __construct(
        /** @description The image to upscale */
        // @ApiMember(Description="The image to upscale")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $image=null,

        /** @description Optional seed for reproducible results in image generation */
        // @ApiMember(Description="Optional seed for reproducible results in image generation")
        /** @var int|null */
        public ?int $seed=null,

        /** @description Optional client-provided identifier for the request */
        // @ApiMember(Description="Optional client-provided identifier for the request")
        /** @var string|null */
        public ?string $refId=null,

        /** @description Optional queue or topic to reply to */
        // @ApiMember(Description="Optional queue or topic to reply to")
        /** @var string|null */
        public ?string $replyTo=null,

        /** @description Tag to identify the request */
        // @ApiMember(Description="Tag to identify the request")
        /** @var string|null */
        public ?string $tag=null,

        /** @description Optional state to associate with the request */
        // @ApiMember(Description="Optional state to associate with the request")
        /** @var string|null */
        public ?string $state=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['image'])) $this->image = JsonConverters::from('ByteArray', $o['image']);
        if (isset($o['seed'])) $this->seed = $o['seed'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
        if (isset($o['state'])) $this->state = $o['state'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->image)) $o['image'] = JsonConverters::to('ByteArray', $this->image);
        if (isset($this->seed)) $o['seed'] = $this->seed;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        if (isset($this->state)) $o['state'] = $this->state;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueueImageUpscale'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new QueueGenerationResponse(); }
}

/** @description Generate image from another image */
// @Api(Description="Generate image from another image")
#[Returns('QueueGenerationResponse')]
class QueueImageToImage implements IReturn, IQueueGeneration, JsonSerializable
{
    public function __construct(
        /** @description The image to use as input */
        // @ApiMember(Description="The image to use as input")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $image=null,

        /** @description Prompt describing the desired output */
        // @ApiMember(Description="Prompt describing the desired output")
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $positivePrompt='',

        /** @description Negative prompt describing what should not be in the image */
        // @ApiMember(Description="Negative prompt describing what should not be in the image")
        /** @var string|null */
        public ?string $negativePrompt=null,

        /** @description The AI model to use for image generation */
        // @ApiMember(Description="The AI model to use for image generation")
        /** @var string|null */
        public ?string $model=null,

        /** @description Optional specific amount of denoise to apply */
        // @ApiMember(Description="Optional specific amount of denoise to apply")
        /** @var float|null */
        public ?float $denoise=null,

        /** @description Number of images to generate in a single batch */
        // @ApiMember(Description="Number of images to generate in a single batch")
        /** @var int|null */
        public ?int $batchSize=null,

        /** @description Optional seed for reproducible results in image generation */
        // @ApiMember(Description="Optional seed for reproducible results in image generation")
        /** @var int|null */
        public ?int $seed=null,

        /** @description Optional client-provided identifier for the request */
        // @ApiMember(Description="Optional client-provided identifier for the request")
        /** @var string|null */
        public ?string $refId=null,

        /** @description Optional queue or topic to reply to */
        // @ApiMember(Description="Optional queue or topic to reply to")
        /** @var string|null */
        public ?string $replyTo=null,

        /** @description Optional state to associate with the request */
        // @ApiMember(Description="Optional state to associate with the request")
        /** @var string|null */
        public ?string $state=null,

        /** @description Tag to identify the request */
        // @ApiMember(Description="Tag to identify the request")
        /** @var string|null */
        public ?string $tag=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['image'])) $this->image = JsonConverters::from('ByteArray', $o['image']);
        if (isset($o['positivePrompt'])) $this->positivePrompt = $o['positivePrompt'];
        if (isset($o['negativePrompt'])) $this->negativePrompt = $o['negativePrompt'];
        if (isset($o['model'])) $this->model = $o['model'];
        if (isset($o['denoise'])) $this->denoise = $o['denoise'];
        if (isset($o['batchSize'])) $this->batchSize = $o['batchSize'];
        if (isset($o['seed'])) $this->seed = $o['seed'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->image)) $o['image'] = JsonConverters::to('ByteArray', $this->image);
        if (isset($this->positivePrompt)) $o['positivePrompt'] = $this->positivePrompt;
        if (isset($this->negativePrompt)) $o['negativePrompt'] = $this->negativePrompt;
        if (isset($this->model)) $o['model'] = $this->model;
        if (isset($this->denoise)) $o['denoise'] = $this->denoise;
        if (isset($this->batchSize)) $o['batchSize'] = $this->batchSize;
        if (isset($this->seed)) $o['seed'] = $this->seed;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueueImageToImage'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new QueueGenerationResponse(); }
}

/** @description Generate image with masked area */
// @Api(Description="Generate image with masked area")
#[Returns('QueueGenerationResponse')]
class QueueImageWithMask implements IReturn, IQueueGeneration, JsonSerializable
{
    public function __construct(
        /** @description Prompt describing the desired output in the masked area */
        // @ApiMember(Description="Prompt describing the desired output in the masked area")
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $positivePrompt='',

        /** @description Negative prompt describing what should not be in the masked area */
        // @ApiMember(Description="Negative prompt describing what should not be in the masked area")
        /** @var string|null */
        public ?string $negativePrompt=null,

        /** @description The image to use as input */
        // @ApiMember(Description="The image to use as input")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $image=null,

        /** @description The mask to use as input */
        // @ApiMember(Description="The mask to use as input")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $mask=null,

        /** @description Optional specific amount of denoise to apply */
        // @ApiMember(Description="Optional specific amount of denoise to apply")
        /** @var float|null */
        public ?float $denoise=null,

        /** @description Optional seed for reproducible results in image generation */
        // @ApiMember(Description="Optional seed for reproducible results in image generation")
        /** @var int|null */
        public ?int $seed=null,

        /** @description Optional client-provided identifier for the request */
        // @ApiMember(Description="Optional client-provided identifier for the request")
        /** @var string|null */
        public ?string $refId=null,

        /** @description Optional queue or topic to reply to */
        // @ApiMember(Description="Optional queue or topic to reply to")
        /** @var string|null */
        public ?string $replyTo=null,

        /** @description Tag to identify the request */
        // @ApiMember(Description="Tag to identify the request")
        /** @var string|null */
        public ?string $tag=null,

        /** @description Optional state to associate with the request */
        // @ApiMember(Description="Optional state to associate with the request")
        /** @var string|null */
        public ?string $state=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['positivePrompt'])) $this->positivePrompt = $o['positivePrompt'];
        if (isset($o['negativePrompt'])) $this->negativePrompt = $o['negativePrompt'];
        if (isset($o['image'])) $this->image = JsonConverters::from('ByteArray', $o['image']);
        if (isset($o['mask'])) $this->mask = JsonConverters::from('ByteArray', $o['mask']);
        if (isset($o['denoise'])) $this->denoise = $o['denoise'];
        if (isset($o['seed'])) $this->seed = $o['seed'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
        if (isset($o['state'])) $this->state = $o['state'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->positivePrompt)) $o['positivePrompt'] = $this->positivePrompt;
        if (isset($this->negativePrompt)) $o['negativePrompt'] = $this->negativePrompt;
        if (isset($this->image)) $o['image'] = JsonConverters::to('ByteArray', $this->image);
        if (isset($this->mask)) $o['mask'] = JsonConverters::to('ByteArray', $this->mask);
        if (isset($this->denoise)) $o['denoise'] = $this->denoise;
        if (isset($this->seed)) $o['seed'] = $this->seed;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        if (isset($this->state)) $o['state'] = $this->state;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueueImageWithMask'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new QueueGenerationResponse(); }
}

/** @description Convert image to text */
// @Api(Description="Convert image to text")
#[Returns('QueueGenerationResponse')]
class QueueImageToText implements IReturn, IQueueGeneration, JsonSerializable
{
    public function __construct(
        /** @description The image to convert to text */
        // @ApiMember(Description="The image to convert to text")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $image=null,

        /** @description Optional client-provided identifier for the request */
        // @ApiMember(Description="Optional client-provided identifier for the request")
        /** @var string|null */
        public ?string $refId=null,

        /** @description Optional queue or topic to reply to */
        // @ApiMember(Description="Optional queue or topic to reply to")
        /** @var string|null */
        public ?string $replyTo=null,

        /** @description Tag to identify the request */
        // @ApiMember(Description="Tag to identify the request")
        /** @var string|null */
        public ?string $tag=null,

        /** @description Optional state to associate with the request */
        // @ApiMember(Description="Optional state to associate with the request")
        /** @var string|null */
        public ?string $state=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['image'])) $this->image = JsonConverters::from('ByteArray', $o['image']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
        if (isset($o['state'])) $this->state = $o['state'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->image)) $o['image'] = JsonConverters::to('ByteArray', $this->image);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        if (isset($this->state)) $o['state'] = $this->state;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueueImageToText'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new QueueGenerationResponse(); }
}

/** @description Convert an image to a different format */
#[Returns('MediaTransformResponse')]
class ConvertImage implements IReturn, IMediaTransform, IPost, JsonSerializable
{
    public function __construct(
        /** @description The image file to be converted */
        // @ApiMember(Description="The image file to be converted")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $image=null,

        /** @description The desired output format for the converted image */
        // @ApiMember(Description="The desired output format for the converted image")
        // @Required()
        /** @var ImageOutputFormat|null */
        public ?ImageOutputFormat $outputFormat=null,

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
        if (isset($o['image'])) $this->image = JsonConverters::from('ByteArray', $o['image']);
        if (isset($o['outputFormat'])) $this->outputFormat = JsonConverters::from('ImageOutputFormat', $o['outputFormat']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->image)) $o['image'] = JsonConverters::to('ByteArray', $this->image);
        if (isset($this->outputFormat)) $o['outputFormat'] = JsonConverters::to('ImageOutputFormat', $this->outputFormat);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ConvertImage'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new MediaTransformResponse(); }
}

/** @description Crop an image to a specified area */
#[Returns('MediaTransformResponse')]
class CropImage implements IReturn, IMediaTransform, IPost, JsonSerializable
{
    public function __construct(
        /** @description The X-coordinate of the top-left corner of the crop area */
        // @ApiMember(Description="The X-coordinate of the top-left corner of the crop area")
        /** @var int */
        public int $x=0,

        /** @description The Y-coordinate of the top-left corner of the crop area */
        // @ApiMember(Description="The Y-coordinate of the top-left corner of the crop area")
        /** @var int */
        public int $y=0,

        /** @description The width of the crop area */
        // @ApiMember(Description="The width of the crop area")
        /** @var int */
        public int $width=0,

        /** @description The height of the crop area */
        // @ApiMember(Description="The height of the crop area")
        /** @var int */
        public int $height=0,

        /** @description The image file to be cropped */
        // @ApiMember(Description="The image file to be cropped")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $image=null,

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
        if (isset($o['x'])) $this->x = $o['x'];
        if (isset($o['y'])) $this->y = $o['y'];
        if (isset($o['width'])) $this->width = $o['width'];
        if (isset($o['height'])) $this->height = $o['height'];
        if (isset($o['image'])) $this->image = JsonConverters::from('ByteArray', $o['image']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->x)) $o['x'] = $this->x;
        if (isset($this->y)) $o['y'] = $this->y;
        if (isset($this->width)) $o['width'] = $this->width;
        if (isset($this->height)) $o['height'] = $this->height;
        if (isset($this->image)) $o['image'] = JsonConverters::to('ByteArray', $this->image);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CropImage'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new MediaTransformResponse(); }
}

/** @description Add a watermark to an image */
#[Returns('MediaTransformResponse')]
class WatermarkImage implements IReturn, IMediaTransform, IPost, JsonSerializable
{
    public function __construct(
        /** @description The image file to be watermarked */
        // @ApiMember(Description="The image file to be watermarked")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $image=null,

        /** @description The position of the watermark on the image */
        // @ApiMember(Description="The position of the watermark on the image")
        /** @var WatermarkPosition|null */
        public ?WatermarkPosition $position=null,

        /** @description Scale of the watermark relative */
        // @ApiMember(Description="Scale of the watermark relative")
        /** @var float */
        public float $watermarkScale=0.0,

        /** @description The opacity of the watermark (0.0 to 1.0) */
        // @ApiMember(Description="The opacity of the watermark (0.0 to 1.0)")
        /** @var float */
        public float $opacity=0.0,

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
        if (isset($o['image'])) $this->image = JsonConverters::from('ByteArray', $o['image']);
        if (isset($o['position'])) $this->position = JsonConverters::from('WatermarkPosition', $o['position']);
        if (isset($o['watermarkScale'])) $this->watermarkScale = $o['watermarkScale'];
        if (isset($o['opacity'])) $this->opacity = $o['opacity'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->image)) $o['image'] = JsonConverters::to('ByteArray', $this->image);
        if (isset($this->position)) $o['position'] = JsonConverters::to('WatermarkPosition', $this->position);
        if (isset($this->watermarkScale)) $o['watermarkScale'] = $this->watermarkScale;
        if (isset($this->opacity)) $o['opacity'] = $this->opacity;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'WatermarkImage'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new MediaTransformResponse(); }
}

/** @description Scale an image to a specified size */
#[Returns('MediaTransformResponse')]
class ScaleImage implements IReturn, IMediaTransform, IPost, JsonSerializable
{
    public function __construct(
        /** @description The image file to be scaled */
        // @ApiMember(Description="The image file to be scaled")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $image=null,

        /** @description Desired width of the scaled image */
        // @ApiMember(Description="Desired width of the scaled image")
        /** @var int|null */
        public ?int $width=null,

        /** @description Desired height of the scaled image */
        // @ApiMember(Description="Desired height of the scaled image")
        /** @var int|null */
        public ?int $height=null,

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
        if (isset($o['image'])) $this->image = JsonConverters::from('ByteArray', $o['image']);
        if (isset($o['width'])) $this->width = $o['width'];
        if (isset($o['height'])) $this->height = $o['height'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->image)) $o['image'] = JsonConverters::to('ByteArray', $this->image);
        if (isset($this->width)) $o['width'] = $this->width;
        if (isset($this->height)) $o['height'] = $this->height;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ScaleImage'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new MediaTransformResponse(); }
}

/** @description Crop an image to a specified area */
#[Returns('QueueMediaTransformResponse')]
class QueueCropImage implements IReturn, IQueueMediaTransform, IPost, JsonSerializable
{
    public function __construct(
        /** @description The X-coordinate of the top-left corner of the crop area */
        // @ApiMember(Description="The X-coordinate of the top-left corner of the crop area")
        /** @var int */
        public int $x=0,

        /** @description The Y-coordinate of the top-left corner of the crop area */
        // @ApiMember(Description="The Y-coordinate of the top-left corner of the crop area")
        /** @var int */
        public int $y=0,

        /** @description The width of the crop area */
        // @ApiMember(Description="The width of the crop area")
        /** @var int */
        public int $width=0,

        /** @description The height of the crop area */
        // @ApiMember(Description="The height of the crop area")
        /** @var int */
        public int $height=0,

        /** @description The image file to be cropped */
        // @ApiMember(Description="The image file to be cropped")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $image=null,

        /** @description Optional client-provided identifier for the request */
        // @ApiMember(Description="Optional client-provided identifier for the request")
        /** @var string|null */
        public ?string $refId=null,

        /** @description Optional queue or topic to reply to */
        // @ApiMember(Description="Optional queue or topic to reply to")
        /** @var string|null */
        public ?string $replyTo=null,

        /** @description Tag to identify the request */
        // @ApiMember(Description="Tag to identify the request")
        /** @var string|null */
        public ?string $tag=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['x'])) $this->x = $o['x'];
        if (isset($o['y'])) $this->y = $o['y'];
        if (isset($o['width'])) $this->width = $o['width'];
        if (isset($o['height'])) $this->height = $o['height'];
        if (isset($o['image'])) $this->image = JsonConverters::from('ByteArray', $o['image']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->x)) $o['x'] = $this->x;
        if (isset($this->y)) $o['y'] = $this->y;
        if (isset($this->width)) $o['width'] = $this->width;
        if (isset($this->height)) $o['height'] = $this->height;
        if (isset($this->image)) $o['image'] = JsonConverters::to('ByteArray', $this->image);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueueCropImage'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new QueueMediaTransformResponse(); }
}

/** @description Scale an image to a specified size */
#[Returns('MediaTransformResponse')]
class QueueScaleImage implements IReturn, IQueueMediaTransform, IPost, JsonSerializable
{
    public function __construct(
        /** @description The image file to be scaled */
        // @ApiMember(Description="The image file to be scaled")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $image=null,

        /** @description Desired width of the scaled image */
        // @ApiMember(Description="Desired width of the scaled image")
        /** @var int|null */
        public ?int $width=null,

        /** @description Desired height of the scaled image */
        // @ApiMember(Description="Desired height of the scaled image")
        /** @var int|null */
        public ?int $height=null,

        /** @description Optional client-provided identifier for the request */
        // @ApiMember(Description="Optional client-provided identifier for the request")
        /** @var string|null */
        public ?string $refId=null,

        /** @description Optional queue or topic to reply to */
        // @ApiMember(Description="Optional queue or topic to reply to")
        /** @var string|null */
        public ?string $replyTo=null,

        /** @description Tag to identify the request */
        // @ApiMember(Description="Tag to identify the request")
        /** @var string|null */
        public ?string $tag=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['image'])) $this->image = JsonConverters::from('ByteArray', $o['image']);
        if (isset($o['width'])) $this->width = $o['width'];
        if (isset($o['height'])) $this->height = $o['height'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->image)) $o['image'] = JsonConverters::to('ByteArray', $this->image);
        if (isset($this->width)) $o['width'] = $this->width;
        if (isset($this->height)) $o['height'] = $this->height;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueueScaleImage'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new MediaTransformResponse(); }
}

/** @description Add a watermark to an image */
#[Returns('QueueMediaTransformResponse')]
class QueueWatermarkImage implements IReturn, IQueueMediaTransform, IPost, JsonSerializable
{
    public function __construct(
        /** @description The image file to be watermarked */
        // @ApiMember(Description="The image file to be watermarked")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $image=null,

        /** @description The position of the watermark on the image */
        // @ApiMember(Description="The position of the watermark on the image")
        /** @var WatermarkPosition|null */
        public ?WatermarkPosition $position=null,

        /** @description The opacity of the watermark (0.0 to 1.0) */
        // @ApiMember(Description="The opacity of the watermark (0.0 to 1.0)")
        /** @var float */
        public float $opacity=0.0,

        /** @description Scale of the watermark relative */
        // @ApiMember(Description="Scale of the watermark relative")
        /** @var float */
        public float $watermarkScale=0.0,

        /** @description Optional client-provided identifier for the request */
        // @ApiMember(Description="Optional client-provided identifier for the request")
        /** @var string|null */
        public ?string $refId=null,

        /** @description Optional queue or topic to reply to */
        // @ApiMember(Description="Optional queue or topic to reply to")
        /** @var string|null */
        public ?string $replyTo=null,

        /** @description Tag to identify the request */
        // @ApiMember(Description="Tag to identify the request")
        /** @var string|null */
        public ?string $tag=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['image'])) $this->image = JsonConverters::from('ByteArray', $o['image']);
        if (isset($o['position'])) $this->position = JsonConverters::from('WatermarkPosition', $o['position']);
        if (isset($o['opacity'])) $this->opacity = $o['opacity'];
        if (isset($o['watermarkScale'])) $this->watermarkScale = $o['watermarkScale'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->image)) $o['image'] = JsonConverters::to('ByteArray', $this->image);
        if (isset($this->position)) $o['position'] = JsonConverters::to('WatermarkPosition', $this->position);
        if (isset($this->opacity)) $o['opacity'] = $this->opacity;
        if (isset($this->watermarkScale)) $o['watermarkScale'] = $this->watermarkScale;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueueWatermarkImage'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new QueueMediaTransformResponse(); }
}

/** @description Convert an image to a different format */
#[Returns('QueueMediaTransformResponse')]
class QueueConvertImage implements IReturn, IQueueMediaTransform, IPost, JsonSerializable
{
    public function __construct(
        /** @description The image file to be converted */
        // @ApiMember(Description="The image file to be converted")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $image=null,

        /** @description The desired output format for the converted image */
        // @ApiMember(Description="The desired output format for the converted image")
        // @Required()
        /** @var ImageOutputFormat|null */
        public ?ImageOutputFormat $outputFormat=null,

        /** @description Optional client-provided identifier for the request */
        // @ApiMember(Description="Optional client-provided identifier for the request")
        /** @var string|null */
        public ?string $refId=null,

        /** @description Optional queue or topic to reply to */
        // @ApiMember(Description="Optional queue or topic to reply to")
        /** @var string|null */
        public ?string $replyTo=null,

        /** @description Tag to identify the request */
        // @ApiMember(Description="Tag to identify the request")
        /** @var string|null */
        public ?string $tag=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['image'])) $this->image = JsonConverters::from('ByteArray', $o['image']);
        if (isset($o['outputFormat'])) $this->outputFormat = JsonConverters::from('ImageOutputFormat', $o['outputFormat']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->image)) $o['image'] = JsonConverters::to('ByteArray', $this->image);
        if (isset($this->outputFormat)) $o['outputFormat'] = JsonConverters::to('ImageOutputFormat', $this->outputFormat);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueueConvertImage'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new QueueMediaTransformResponse(); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryDb of MediaType
 */
class QueryMediaTypes extends QueryDb implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryMediaTypes'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['MediaType']); }
}

/** @description Media Providers */
#[Returns('QueryResponse')]
/**
 * @template QueryDb of MediaProvider
 */
class QueryMediaProviders extends QueryDb implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $id=null,
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['name'])) $this->name = $o['name'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryMediaProviders'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['MediaProvider']); }
}

/** @description Text to Speech Voice models */
#[Returns('QueryResponse')]
/**
 * @template QueryDb of TextToSpeechVoice
 */
class QueryTextToSpeechVoices extends QueryDb implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryTextToSpeechVoices'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['TextToSpeechVoice']); }
}

// @Route("/generate", "POST")
#[Returns('CreateGenerationResponse')]
class CreateGeneration implements IReturn, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="NotNull")
        /** @var GenerationArgs|null */
        public ?GenerationArgs $request=null,

        /** @var string|null */
        public ?string $provider=null,
        /** @var string|null */
        public ?string $state=null,
        /** @var string|null */
        public ?string $replyTo=null,
        /** @var string|null */
        public ?string $refId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['request'])) $this->request = JsonConverters::from('GenerationArgs', $o['request']);
        if (isset($o['provider'])) $this->provider = $o['provider'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->request)) $o['request'] = JsonConverters::to('GenerationArgs', $this->request);
        if (isset($this->provider)) $o['provider'] = $this->provider;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CreateGeneration'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new CreateGenerationResponse(); }
}

/** @description Media Models */
#[Returns('QueryResponse')]
/**
 * @template QueryDb of MediaModel
 */
class QueryMediaModels extends QueryDb implements IReturn, JsonSerializable
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
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->id)) $o['id'] = $this->id;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryMediaModels'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['MediaModel']); }
}

// @Route("/generation/{Id}", "GET")
// @Route("/generation/ref/{RefId}", "GET")
#[Returns('GetGenerationResponse')]
class GetGeneration implements IReturn, JsonSerializable
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
    public function getTypeName(): string { return 'GetGeneration'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetGenerationResponse(); }
}

/** @description Update a Generation API Provider */
#[Returns('IdResponse')]
/**
 * @template IPatchDb of MediaProvider
 */
class UpdateMediaProvider implements IReturn, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @description The API Key to use for this Provider */
        /** @var string|null */
        public ?string $apiKey=null,
        /** @description Send the API Key in the Header instead of Authorization Bearer */
        /** @var string|null */
        public ?string $apiKeyHeader=null,
        /** @description Override Base URL for the Generation Provider */
        /** @var string|null */
        public ?string $apiBaseUrl=null,
        /** @description Url to check if the API is online */
        /** @var string|null */
        public ?string $heartbeatUrl=null,
        /** @description How many requests should be made concurrently */
        /** @var int|null */
        public ?int $concurrency=null,
        /** @description What priority to give this Provider to use for processing models */
        /** @var int|null */
        public ?int $priority=null,
        /** @description Whether the Provider is enabled */
        /** @var bool|null */
        public ?bool $enabled=null,
        /** @description The models this API Provider should process */
        /** @var array<string>|null */
        public ?array $models=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['apiKey'])) $this->apiKey = $o['apiKey'];
        if (isset($o['apiKeyHeader'])) $this->apiKeyHeader = $o['apiKeyHeader'];
        if (isset($o['apiBaseUrl'])) $this->apiBaseUrl = $o['apiBaseUrl'];
        if (isset($o['heartbeatUrl'])) $this->heartbeatUrl = $o['heartbeatUrl'];
        if (isset($o['concurrency'])) $this->concurrency = $o['concurrency'];
        if (isset($o['priority'])) $this->priority = $o['priority'];
        if (isset($o['enabled'])) $this->enabled = $o['enabled'];
        if (isset($o['models'])) $this->models = JsonConverters::fromArray('string', $o['models']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->apiKey)) $o['apiKey'] = $this->apiKey;
        if (isset($this->apiKeyHeader)) $o['apiKeyHeader'] = $this->apiKeyHeader;
        if (isset($this->apiBaseUrl)) $o['apiBaseUrl'] = $this->apiBaseUrl;
        if (isset($this->heartbeatUrl)) $o['heartbeatUrl'] = $this->heartbeatUrl;
        if (isset($this->concurrency)) $o['concurrency'] = $this->concurrency;
        if (isset($this->priority)) $o['priority'] = $this->priority;
        if (isset($this->enabled)) $o['enabled'] = $this->enabled;
        if (isset($this->models)) $o['models'] = JsonConverters::toArray('string', $this->models);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'UpdateMediaProvider'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

/** @description Add an API Provider to Generation API Providers */
#[Returns('IdResponse')]
/**
 * @template ICreateDb of MediaProvider
 */
class CreateMediaProvider implements IReturn, ICreateDb, JsonSerializable
{
    public function __construct(
        /** @description The name of the API Provider */
        /** @var string */
        public string $name='',
        /** @description The API Key to use for this Provider */
        /** @var string|null */
        public ?string $apiKey=null,
        /** @description Send the API Key in the Header instead of Authorization Bearer */
        /** @var string|null */
        public ?string $apiKeyHeader=null,
        /** @description Base URL for the Generation Provider */
        /** @var string|null */
        public ?string $apiBaseUrl=null,
        /** @description Url to check if the API is online */
        /** @var string|null */
        public ?string $heartbeatUrl=null,
        /** @description How many requests should be made concurrently */
        /** @var int */
        public int $concurrency=0,
        /** @description What priority to give this Provider to use for processing models */
        /** @var int */
        public int $priority=0,
        /** @description Whether the Provider is enabled */
        /** @var bool|null */
        public ?bool $enabled=null,
        /** @description The date the Provider was last online */
        /** @var DateTime|null */
        public ?DateTime $offlineDate=null,
        /** @description Models this API Provider should process */
        /** @var array<string>|null */
        public ?array $models=null,
        /** @var string */
        public string $mediaTypeId=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['apiKey'])) $this->apiKey = $o['apiKey'];
        if (isset($o['apiKeyHeader'])) $this->apiKeyHeader = $o['apiKeyHeader'];
        if (isset($o['apiBaseUrl'])) $this->apiBaseUrl = $o['apiBaseUrl'];
        if (isset($o['heartbeatUrl'])) $this->heartbeatUrl = $o['heartbeatUrl'];
        if (isset($o['concurrency'])) $this->concurrency = $o['concurrency'];
        if (isset($o['priority'])) $this->priority = $o['priority'];
        if (isset($o['enabled'])) $this->enabled = $o['enabled'];
        if (isset($o['offlineDate'])) $this->offlineDate = JsonConverters::from('DateTime', $o['offlineDate']);
        if (isset($o['models'])) $this->models = JsonConverters::fromArray('string', $o['models']);
        if (isset($o['mediaTypeId'])) $this->mediaTypeId = $o['mediaTypeId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->apiKey)) $o['apiKey'] = $this->apiKey;
        if (isset($this->apiKeyHeader)) $o['apiKeyHeader'] = $this->apiKeyHeader;
        if (isset($this->apiBaseUrl)) $o['apiBaseUrl'] = $this->apiBaseUrl;
        if (isset($this->heartbeatUrl)) $o['heartbeatUrl'] = $this->heartbeatUrl;
        if (isset($this->concurrency)) $o['concurrency'] = $this->concurrency;
        if (isset($this->priority)) $o['priority'] = $this->priority;
        if (isset($this->enabled)) $o['enabled'] = $this->enabled;
        if (isset($this->offlineDate)) $o['offlineDate'] = JsonConverters::to('DateTime', $this->offlineDate);
        if (isset($this->models)) $o['models'] = JsonConverters::toArray('string', $this->models);
        if (isset($this->mediaTypeId)) $o['mediaTypeId'] = $this->mediaTypeId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CreateMediaProvider'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

#[Returns('CreateTransformResponse')]
class CreateMediaTransform implements IReturn, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="NotNull")
        /** @var MediaTransformArgs|null */
        public ?MediaTransformArgs $request=null,

        /** @var string|null */
        public ?string $provider=null,
        /** @var string|null */
        public ?string $state=null,
        /** @var string|null */
        public ?string $replyTo=null,
        /** @var string|null */
        public ?string $refId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['request'])) $this->request = JsonConverters::from('MediaTransformArgs', $o['request']);
        if (isset($o['provider'])) $this->provider = $o['provider'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->request)) $o['request'] = JsonConverters::to('MediaTransformArgs', $this->request);
        if (isset($this->provider)) $o['provider'] = $this->provider;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CreateMediaTransform'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new CreateTransformResponse(); }
}

// @Route("/hello/{Name}")
#[Returns('HelloResponse')]
class Hello implements IReturn, IGet, JsonSerializable
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
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'Hello'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new HelloResponse(); }
}

#[Returns('GetOllamaModelsResponse')]
class GetOllamaModels implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $apiBaseUrl=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['apiBaseUrl'])) $this->apiBaseUrl = $o['apiBaseUrl'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->apiBaseUrl)) $o['apiBaseUrl'] = $this->apiBaseUrl;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetOllamaModels'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetOllamaModelsResponse(); }
}

/** @description Different Models available in AI Server */
#[Returns('QueryResponse')]
/**
 * @template QueryDb of AiModel
 */
class QueryAiModels extends QueryDb implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryAiModels'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['AiModel']); }
}

/** @description The Type and behavior of different API Providers */
#[Returns('QueryResponse')]
/**
 * @template QueryDb of AiType
 */
class QueryAiTypes extends QueryDb implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryAiTypes'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['AiType']); }
}

/** @description Active AI Worker Models available in AI Server */
#[Returns('StringsResponse')]
class ActiveAiModels implements IReturn, IGet, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ActiveAiModels'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new StringsResponse(); }
}

/** @description AI Providers */
#[Returns('QueryResponse')]
/**
 * @template QueryDb of AiProvider
 */
class QueryAiProviders extends QueryDb implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $name=null
    ) {
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
    public function getTypeName(): string { return 'QueryAiProviders'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['AiProvider']); }
}

#[Returns('GetWorkerStatsResponse')]
class GetWorkerStats implements IReturn, IGet, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetWorkerStats'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetWorkerStatsResponse(); }
}

#[Returns('EmptyResponse')]
class CancelWorker implements IReturn, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $worker=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['worker'])) $this->worker = $o['worker'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->worker)) $o['worker'] = $this->worker;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CancelWorker'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new EmptyResponse(); }
}

// @Route("/icons/models/{Model}", "GET")
#[Returns('ByteArray')]
class GetModelImage implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $model=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['model'])) $this->model = $o['model'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->model)) $o['model'] = $this->model;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetModelImage'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new ByteArray(); }
}

/** @description Given a list of messages comprising a conversation, the model will return a response. */
// @Route("/v1/chat/completions", "POST")
#[Returns('OpenAiChatResponse')]
class OpenAiChatCompletion extends OpenAiChat implements IReturn, IPost, JsonSerializable
{
    /**
     * @param array<OpenAiMessage>|null $messages
     * @param string $model
     * @param float|null $frequency_penalty
     * @param array<string,int>|null $logit_bias
     * @param bool|null $logprobs
     * @param int|null $top_logprobs
     * @param int|null $max_tokens
     * @param int|null $n
     * @param float|null $presence_penalty
     * @param OpenAiResponseFormat|null $response_format
     * @param int|null $seed
     * @param array<string>|null $stop
     * @param bool|null $stream
     * @param float|null $temperature
     * @param float|null $top_p
     * @param array<OpenAiTools>|null $tools
     * @param string|null $user
     */
    public function __construct(
        ?array $messages=null,
        string $model='',
        ?float $frequency_penalty=null,
        ?array $logit_bias=null,
        ?bool $logprobs=null,
        ?int $top_logprobs=null,
        ?int $max_tokens=null,
        ?int $n=null,
        ?float $presence_penalty=null,
        ?OpenAiResponseFormat $response_format=null,
        ?int $seed=null,
        ?array $stop=null,
        ?bool $stream=null,
        ?float $temperature=null,
        ?float $top_p=null,
        ?array $tools=null,
        ?string $user=null,
        /** @description Provide a unique identifier to track requests */
        /** @var string|null */
        public ?string $refId=null,
        /** @description Specify which AI Provider to use */
        /** @var string|null */
        public ?string $provider=null,
        /** @description Categorize like requests under a common group */
        /** @var string|null */
        public ?string $tag=null
    ) {
        parent::__construct($messages,$model,$frequency_penalty,$logit_bias,$logprobs,$top_logprobs,$max_tokens,$n,$presence_penalty,$response_format,$seed,$stop,$stream,$temperature,$top_p,$tools,$user);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['provider'])) $this->provider = $o['provider'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->provider)) $o['provider'] = $this->provider;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'OpenAiChatCompletion'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new OpenAiChatResponse(); }
}

#[Returns('QueueOpenAiChatResponse')]
class QueueOpenAiChatCompletion implements IReturn, JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $refId=null,
        /** @var string|null */
        public ?string $provider=null,
        /** @var string|null */
        public ?string $replyTo=null,
        /** @var string|null */
        public ?string $tag=null,
        /** @var OpenAiChat|null */
        public ?OpenAiChat $request=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['provider'])) $this->provider = $o['provider'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
        if (isset($o['request'])) $this->request = JsonConverters::from('OpenAiChat', $o['request']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->provider)) $o['provider'] = $this->provider;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        if (isset($this->request)) $o['request'] = JsonConverters::to('OpenAiChat', $this->request);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueueOpenAiChatCompletion'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new QueueOpenAiChatResponse(); }
}

#[Returns('GetOpenAiChatResponse')]
class WaitForOpenAiChat implements IReturn, IGet, JsonSerializable
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
    public function getTypeName(): string { return 'WaitForOpenAiChat'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetOpenAiChatResponse(); }
}

#[Returns('GetOpenAiChatResponse')]
class GetOpenAiChat implements IReturn, IGet, JsonSerializable
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
    public function getTypeName(): string { return 'GetOpenAiChat'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetOpenAiChatResponse(); }
}

#[Returns('GetOpenAiChatStatusResponse')]
class GetOpenAiChatStatus implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $jobId=0,
        /** @var string|null */
        public ?string $refId=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['jobId'])) $this->jobId = $o['jobId'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->jobId)) $o['jobId'] = $this->jobId;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetOpenAiChatStatus'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetOpenAiChatStatusResponse(); }
}

#[Returns('GetActiveProvidersResponse')]
class GetActiveProviders implements IReturn, IGet, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetActiveProviders'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetActiveProvidersResponse(); }
}

#[Returns('OpenAiChatResponse')]
class ChatAiProvider implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $provider='',
        /** @var string */
        public string $model='',
        /** @var OpenAiChat|null */
        public ?OpenAiChat $request=null,
        /** @var string|null */
        public ?string $prompt=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['provider'])) $this->provider = $o['provider'];
        if (isset($o['model'])) $this->model = $o['model'];
        if (isset($o['request'])) $this->request = JsonConverters::from('OpenAiChat', $o['request']);
        if (isset($o['prompt'])) $this->prompt = $o['prompt'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->provider)) $o['provider'] = $this->provider;
        if (isset($this->model)) $o['model'] = $this->model;
        if (isset($this->request)) $o['request'] = JsonConverters::to('OpenAiChat', $this->request);
        if (isset($this->prompt)) $o['prompt'] = $this->prompt;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ChatAiProvider'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new OpenAiChatResponse(); }
}

#[Returns('CreateApiKeyResponse')]
class CreateApiKey implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $key='',
        /** @var string */
        public string $name='',
        /** @var string|null */
        public ?string $userId=null,
        /** @var string|null */
        public ?string $userName=null,
        /** @var array<string>|null */
        public ?array $scopes=null,
        /** @var string|null */
        public ?string $notes=null,
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
        if (isset($o['key'])) $this->key = $o['key'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['userId'])) $this->userId = $o['userId'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['scopes'])) $this->scopes = JsonConverters::fromArray('string', $o['scopes']);
        if (isset($o['notes'])) $this->notes = $o['notes'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['refIdStr'])) $this->refIdStr = $o['refIdStr'];
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->key)) $o['key'] = $this->key;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->userId)) $o['userId'] = $this->userId;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->scopes)) $o['scopes'] = JsonConverters::toArray('string', $this->scopes);
        if (isset($this->notes)) $o['notes'] = $this->notes;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->refIdStr)) $o['refIdStr'] = $this->refIdStr;
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CreateApiKey'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new CreateApiKeyResponse(); }
}

/** @description Add an AI Provider to process AI Requests */
#[Returns('IdResponse')]
/**
 * @template ICreateDb of AiProvider
 */
class CreateAiProvider implements IReturn, ICreateDb, JsonSerializable
{
    public function __construct(
        /** @description The Type of this API Provider */
        // @Validate(Validator="GreaterThan(0)")
        /** @var string */
        public string $aiTypeId='',

        /** @description The Base URL for the API Provider */
        /** @var string|null */
        public ?string $apiBaseUrl=null,
        /** @description The unique name for this API Provider */
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $name='',

        /** @description The API Key to use for this Provider */
        /** @var string|null */
        public ?string $apiKeyVar=null,
        /** @description The API Key to use for this Provider */
        /** @var string|null */
        public ?string $apiKey=null,
        /** @description Send the API Key in the Header instead of Authorization Bearer */
        /** @var string|null */
        public ?string $apiKeyHeader=null,
        /** @description The URL to check if the API Provider is still online */
        /** @var string|null */
        public ?string $heartbeatUrl=null,
        /** @description Override API Paths for different AI Requests */
        /** @var array<string,string>|null */
        public ?array $taskPaths=null,
        /** @description How many requests should be made concurrently */
        /** @var int */
        public int $concurrency=0,
        /** @description What priority to give this Provider to use for processing models */
        /** @var int */
        public int $priority=0,
        /** @description Whether the Provider is enabled */
        /** @var bool|null */
        public ?bool $enabled=null,
        /** @description The models this API Provider should process */
        /** @var array<AiProviderModel>|null */
        public ?array $models=null,
        /** @description The selected models this API Provider should process */
        /** @var array<string>|null */
        public ?array $selectedModels=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['aiTypeId'])) $this->aiTypeId = $o['aiTypeId'];
        if (isset($o['apiBaseUrl'])) $this->apiBaseUrl = $o['apiBaseUrl'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['apiKeyVar'])) $this->apiKeyVar = $o['apiKeyVar'];
        if (isset($o['apiKey'])) $this->apiKey = $o['apiKey'];
        if (isset($o['apiKeyHeader'])) $this->apiKeyHeader = $o['apiKeyHeader'];
        if (isset($o['heartbeatUrl'])) $this->heartbeatUrl = $o['heartbeatUrl'];
        if (isset($o['taskPaths'])) $this->taskPaths = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['TaskType','string']), $o['taskPaths']);
        if (isset($o['concurrency'])) $this->concurrency = $o['concurrency'];
        if (isset($o['priority'])) $this->priority = $o['priority'];
        if (isset($o['enabled'])) $this->enabled = $o['enabled'];
        if (isset($o['models'])) $this->models = JsonConverters::fromArray('AiProviderModel', $o['models']);
        if (isset($o['selectedModels'])) $this->selectedModels = JsonConverters::fromArray('string', $o['selectedModels']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->aiTypeId)) $o['aiTypeId'] = $this->aiTypeId;
        if (isset($this->apiBaseUrl)) $o['apiBaseUrl'] = $this->apiBaseUrl;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->apiKeyVar)) $o['apiKeyVar'] = $this->apiKeyVar;
        if (isset($this->apiKey)) $o['apiKey'] = $this->apiKey;
        if (isset($this->apiKeyHeader)) $o['apiKeyHeader'] = $this->apiKeyHeader;
        if (isset($this->heartbeatUrl)) $o['heartbeatUrl'] = $this->heartbeatUrl;
        if (isset($this->taskPaths)) $o['taskPaths'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['TaskType','string']), $this->taskPaths);
        if (isset($this->concurrency)) $o['concurrency'] = $this->concurrency;
        if (isset($this->priority)) $o['priority'] = $this->priority;
        if (isset($this->enabled)) $o['enabled'] = $this->enabled;
        if (isset($this->models)) $o['models'] = JsonConverters::toArray('AiProviderModel', $this->models);
        if (isset($this->selectedModels)) $o['selectedModels'] = JsonConverters::toArray('string', $this->selectedModels);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CreateAiProvider'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

#[Returns('IdResponse')]
/**
 * @template IPatchDb of AiProvider
 */
class UpdateAiProvider implements IReturn, IPatchDb, JsonSerializable
{
    public function __construct(
        /** @var int */
        public int $id=0,
        /** @description The Type of this API Provider */
        /** @var string|null */
        public ?string $aiTypeId=null,
        /** @description The Base URL for the API Provider */
        /** @var string|null */
        public ?string $apiBaseUrl=null,
        /** @description The unique name for this API Provider */
        /** @var string|null */
        public ?string $name=null,
        /** @description The API Key to use for this Provider */
        /** @var string|null */
        public ?string $apiKeyVar=null,
        /** @description The API Key to use for this Provider */
        /** @var string|null */
        public ?string $apiKey=null,
        /** @description Send the API Key in the Header instead of Authorization Bearer */
        /** @var string|null */
        public ?string $apiKeyHeader=null,
        /** @description The URL to check if the API Provider is still online */
        /** @var string|null */
        public ?string $heartbeatUrl=null,
        /** @description Override API Paths for different AI Requests */
        /** @var array<string,string>|null */
        public ?array $taskPaths=null,
        /** @description How many requests should be made concurrently */
        /** @var int|null */
        public ?int $concurrency=null,
        /** @description What priority to give this Provider to use for processing models */
        /** @var int|null */
        public ?int $priority=null,
        /** @description Whether the Provider is enabled */
        /** @var bool|null */
        public ?bool $enabled=null,
        /** @description The models this API Provider should process */
        /** @var array<AiProviderModel>|null */
        public ?array $models=null,
        /** @description The selected models this API Provider should process */
        /** @var array<string>|null */
        public ?array $selectedModels=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['aiTypeId'])) $this->aiTypeId = $o['aiTypeId'];
        if (isset($o['apiBaseUrl'])) $this->apiBaseUrl = $o['apiBaseUrl'];
        if (isset($o['name'])) $this->name = $o['name'];
        if (isset($o['apiKeyVar'])) $this->apiKeyVar = $o['apiKeyVar'];
        if (isset($o['apiKey'])) $this->apiKey = $o['apiKey'];
        if (isset($o['apiKeyHeader'])) $this->apiKeyHeader = $o['apiKeyHeader'];
        if (isset($o['heartbeatUrl'])) $this->heartbeatUrl = $o['heartbeatUrl'];
        if (isset($o['taskPaths'])) $this->taskPaths = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['TaskType','string']), $o['taskPaths']);
        if (isset($o['concurrency'])) $this->concurrency = $o['concurrency'];
        if (isset($o['priority'])) $this->priority = $o['priority'];
        if (isset($o['enabled'])) $this->enabled = $o['enabled'];
        if (isset($o['models'])) $this->models = JsonConverters::fromArray('AiProviderModel', $o['models']);
        if (isset($o['selectedModels'])) $this->selectedModels = JsonConverters::fromArray('string', $o['selectedModels']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->aiTypeId)) $o['aiTypeId'] = $this->aiTypeId;
        if (isset($this->apiBaseUrl)) $o['apiBaseUrl'] = $this->apiBaseUrl;
        if (isset($this->name)) $o['name'] = $this->name;
        if (isset($this->apiKeyVar)) $o['apiKeyVar'] = $this->apiKeyVar;
        if (isset($this->apiKey)) $o['apiKey'] = $this->apiKey;
        if (isset($this->apiKeyHeader)) $o['apiKeyHeader'] = $this->apiKeyHeader;
        if (isset($this->heartbeatUrl)) $o['heartbeatUrl'] = $this->heartbeatUrl;
        if (isset($this->taskPaths)) $o['taskPaths'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['TaskType','string']), $this->taskPaths);
        if (isset($this->concurrency)) $o['concurrency'] = $this->concurrency;
        if (isset($this->priority)) $o['priority'] = $this->priority;
        if (isset($this->enabled)) $o['enabled'] = $this->enabled;
        if (isset($this->models)) $o['models'] = JsonConverters::toArray('AiProviderModel', $this->models);
        if (isset($this->selectedModels)) $o['selectedModels'] = JsonConverters::toArray('string', $this->selectedModels);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'UpdateAiProvider'; }
    public function getMethod(): string { return 'PATCH'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

/** @description Delete API Provider */
/**
 * @template IDeleteDb of AiProvider
 */
class DeleteAiProvider implements IReturnVoid, IDeleteDb, JsonSerializable
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
    public function getTypeName(): string { return 'DeleteAiProvider'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): void {}
}

#[Returns('QueryResponse')]
/**
 * @template QueryData of Prompt
 */
class QueryPrompts extends QueryData implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryPrompts'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['Prompt']); }
}

#[Returns('EmptyResponse')]
class Reload implements IReturn, IPost, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'Reload'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new EmptyResponse(); }
}

#[Returns('StringResponse')]
class ChangeAiProviderStatus implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $provider='',
        /** @var bool|null */
        public ?bool $online=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['provider'])) $this->provider = $o['provider'];
        if (isset($o['online'])) $this->online = $o['online'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->provider)) $o['provider'] = $this->provider;
        if (isset($this->online)) $o['online'] = $this->online;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ChangeAiProviderStatus'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new StringResponse(); }
}

/** @description Convert text to speech */
// @Api(Description="Convert text to speech")
#[Returns('QueueGenerationResponse')]
class QueueTextToSpeech implements IReturn, IQueueGeneration, JsonSerializable
{
    public function __construct(
        /** @description The text to be converted to speech */
        // @ApiMember(Description="The text to be converted to speech")
        // @Required()
        /** @var string */
        public string $text='',

        /** @description Optional seed for reproducible results in speech generation */
        // @ApiMember(Description="Optional seed for reproducible results in speech generation")
        /** @var int|null */
        public ?int $seed=null,

        /** @description The AI model to use for speech generation */
        // @ApiMember(Description="The AI model to use for speech generation")
        /** @var string|null */
        public ?string $model=null,

        /** @description Optional client-provided identifier for the request */
        // @ApiMember(Description="Optional client-provided identifier for the request")
        /** @var string|null */
        public ?string $refId=null,

        /** @description Optional queue or topic to reply to */
        // @ApiMember(Description="Optional queue or topic to reply to")
        /** @var string|null */
        public ?string $replyTo=null,

        /** @description Tag to identify the request */
        // @ApiMember(Description="Tag to identify the request")
        /** @var string|null */
        public ?string $tag=null,

        /** @description Optional state to associate with the request */
        // @ApiMember(Description="Optional state to associate with the request")
        /** @var string|null */
        public ?string $state=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['text'])) $this->text = $o['text'];
        if (isset($o['seed'])) $this->seed = $o['seed'];
        if (isset($o['model'])) $this->model = $o['model'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
        if (isset($o['state'])) $this->state = $o['state'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->text)) $o['text'] = $this->text;
        if (isset($this->seed)) $o['seed'] = $this->seed;
        if (isset($this->model)) $o['model'] = $this->model;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        if (isset($this->state)) $o['state'] = $this->state;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueueTextToSpeech'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new QueueGenerationResponse(); }
}

/** @description Convert speech to text */
// @Api(Description="Convert speech to text")
#[Returns('QueueGenerationResponse')]
class QueueSpeechToText implements IReturn, IQueueGeneration, JsonSerializable
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

        /** @description Optional queue or topic to reply to */
        // @ApiMember(Description="Optional queue or topic to reply to")
        /** @var string|null */
        public ?string $replyTo=null,

        /** @description Tag to identify the request */
        // @ApiMember(Description="Tag to identify the request")
        /** @var string|null */
        public ?string $tag=null,

        /** @description Optional state to associate with the request */
        // @ApiMember(Description="Optional state to associate with the request")
        /** @var string|null */
        public ?string $state=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['audio'])) $this->audio = JsonConverters::from('ByteArray', $o['audio']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
        if (isset($o['state'])) $this->state = $o['state'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->audio)) $o['audio'] = JsonConverters::to('ByteArray', $this->audio);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        if (isset($this->state)) $o['state'] = $this->state;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueueSpeechToText'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new QueueGenerationResponse(); }
}

/** @description Convert text to speech */
// @Api(Description="Convert text to speech")
#[Returns('GenerationResponse')]
class TextToSpeech implements IReturn, IGeneration, JsonSerializable
{
    public function __construct(
        /** @description The text to be converted to speech */
        // @ApiMember(Description="The text to be converted to speech")
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $input='',

        /** @description Optional specific model and voice to use for speech generation */
        // @ApiMember(Description="Optional specific model and voice to use for speech generation")
        /** @var string|null */
        public ?string $model=null,

        /** @description Optional seed for reproducible results in speech generation */
        // @ApiMember(Description="Optional seed for reproducible results in speech generation")
        /** @var int|null */
        public ?int $seed=null,

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
        if (isset($o['input'])) $this->input = $o['input'];
        if (isset($o['model'])) $this->model = $o['model'];
        if (isset($o['seed'])) $this->seed = $o['seed'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->input)) $o['input'] = $this->input;
        if (isset($this->model)) $o['model'] = $this->model;
        if (isset($this->seed)) $o['seed'] = $this->seed;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'TextToSpeech'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new GenerationResponse(); }
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

/** @description Scale video */
// @Api(Description="Scale video")
#[Returns('MediaTransformResponse')]
class ScaleVideo implements IReturn, IMediaTransform, JsonSerializable
{
    public function __construct(
        /** @description The video file to be scaled */
        // @ApiMember(Description="The video file to be scaled")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $video=null,

        /** @description Desired width of the scaled video */
        // @ApiMember(Description="Desired width of the scaled video")
        /** @var int|null */
        public ?int $width=null,

        /** @description Desired height of the scaled video */
        // @ApiMember(Description="Desired height of the scaled video")
        /** @var int|null */
        public ?int $height=null,

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
        if (isset($o['video'])) $this->video = JsonConverters::from('ByteArray', $o['video']);
        if (isset($o['width'])) $this->width = $o['width'];
        if (isset($o['height'])) $this->height = $o['height'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->video)) $o['video'] = JsonConverters::to('ByteArray', $this->video);
        if (isset($this->width)) $o['width'] = $this->width;
        if (isset($this->height)) $o['height'] = $this->height;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ScaleVideo'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new MediaTransformResponse(); }
}

/** @description Watermark video */
// @Api(Description="Watermark video")
#[Returns('MediaTransformResponse')]
class WatermarkVideo implements IReturn, IMediaTransform, JsonSerializable
{
    public function __construct(
        /** @description The video file to be watermarked */
        // @ApiMember(Description="The video file to be watermarked")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $video=null,

        /** @description The image file to use as a watermark */
        // @ApiMember(Description="The image file to use as a watermark")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $watermark=null,

        /** @description Position of the watermark */
        // @ApiMember(Description="Position of the watermark")
        /** @var WatermarkPosition|null */
        public ?WatermarkPosition $position=null,

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
        if (isset($o['video'])) $this->video = JsonConverters::from('ByteArray', $o['video']);
        if (isset($o['watermark'])) $this->watermark = JsonConverters::from('ByteArray', $o['watermark']);
        if (isset($o['position'])) $this->position = JsonConverters::from('WatermarkPosition', $o['position']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->video)) $o['video'] = JsonConverters::to('ByteArray', $this->video);
        if (isset($this->watermark)) $o['watermark'] = JsonConverters::to('ByteArray', $this->watermark);
        if (isset($this->position)) $o['position'] = JsonConverters::to('WatermarkPosition', $this->position);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'WatermarkVideo'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new MediaTransformResponse(); }
}

/** @description Convert a video to a different format */
#[Returns('MediaTransformResponse')]
class ConvertVideo implements IReturn, IMediaTransform, JsonSerializable
{
    public function __construct(
        /** @description The desired output format for the converted video */
        // @ApiMember(Description="The desired output format for the converted video")
        // @Required()
        /** @var ConvertVideoOutputFormat|null */
        public ?ConvertVideoOutputFormat $outputFormat=null,

        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $video=null,

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
        if (isset($o['outputFormat'])) $this->outputFormat = JsonConverters::from('ConvertVideoOutputFormat', $o['outputFormat']);
        if (isset($o['video'])) $this->video = JsonConverters::from('ByteArray', $o['video']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->outputFormat)) $o['outputFormat'] = JsonConverters::to('ConvertVideoOutputFormat', $this->outputFormat);
        if (isset($this->video)) $o['video'] = JsonConverters::to('ByteArray', $this->video);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'ConvertVideo'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new MediaTransformResponse(); }
}

/** @description Crop a video to a specified area */
#[Returns('MediaTransformResponse')]
class CropVideo implements IReturn, IMediaTransform, JsonSerializable
{
    public function __construct(
        /** @description The X-coordinate of the top-left corner of the crop area */
        // @ApiMember(Description="The X-coordinate of the top-left corner of the crop area")
        // @Validate(Validator="GreaterThan(0)")
        // @Required()
        /** @var int */
        public int $x=0,

        /** @description The Y-coordinate of the top-left corner of the crop area */
        // @ApiMember(Description="The Y-coordinate of the top-left corner of the crop area")
        // @Validate(Validator="GreaterThan(0)")
        // @Required()
        /** @var int */
        public int $y=0,

        /** @description The width of the crop area */
        // @ApiMember(Description="The width of the crop area")
        // @Validate(Validator="GreaterThan(0)")
        // @Required()
        /** @var int */
        public int $width=0,

        /** @description The height of the crop area */
        // @ApiMember(Description="The height of the crop area")
        // @Validate(Validator="GreaterThan(0)")
        // @Required()
        /** @var int */
        public int $height=0,

        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $video=null,

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
        if (isset($o['x'])) $this->x = $o['x'];
        if (isset($o['y'])) $this->y = $o['y'];
        if (isset($o['width'])) $this->width = $o['width'];
        if (isset($o['height'])) $this->height = $o['height'];
        if (isset($o['video'])) $this->video = JsonConverters::from('ByteArray', $o['video']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->x)) $o['x'] = $this->x;
        if (isset($this->y)) $o['y'] = $this->y;
        if (isset($this->width)) $o['width'] = $this->width;
        if (isset($this->height)) $o['height'] = $this->height;
        if (isset($this->video)) $o['video'] = JsonConverters::to('ByteArray', $this->video);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'CropVideo'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new MediaTransformResponse(); }
}

/** @description Trim a video to a specified duration via start and end times */
#[Returns('MediaTransformResponse')]
class TrimVideo implements IReturn, IMediaTransform, JsonSerializable
{
    public function __construct(
        /** @description The start time of the trimmed video (format: MM:SS) */
        // @ApiMember(Description="The start time of the trimmed video (format: MM:SS)")
        // @Required()
        /** @var string */
        public string $startTime='',

        /** @description The end time of the trimmed video (format: MM:SS) */
        // @ApiMember(Description="The end time of the trimmed video (format: MM:SS)")
        /** @var string|null */
        public ?string $endTime=null,

        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $video=null,

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
        if (isset($o['startTime'])) $this->startTime = $o['startTime'];
        if (isset($o['endTime'])) $this->endTime = $o['endTime'];
        if (isset($o['video'])) $this->video = JsonConverters::from('ByteArray', $o['video']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->startTime)) $o['startTime'] = $this->startTime;
        if (isset($this->endTime)) $o['endTime'] = $this->endTime;
        if (isset($this->video)) $o['video'] = JsonConverters::to('ByteArray', $this->video);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'TrimVideo'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new MediaTransformResponse(); }
}

/** @description Scale video */
// @Api(Description="Scale video")
#[Returns('QueueMediaTransformResponse')]
class QueueScaleVideo implements IReturn, IQueueMediaTransform, JsonSerializable
{
    public function __construct(
        /** @description The video file to be scaled */
        // @ApiMember(Description="The video file to be scaled")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $video=null,

        /** @description Desired width of the scaled video */
        // @ApiMember(Description="Desired width of the scaled video")
        /** @var int|null */
        public ?int $width=null,

        /** @description Desired height of the scaled video */
        // @ApiMember(Description="Desired height of the scaled video")
        /** @var int|null */
        public ?int $height=null,

        /** @description Optional client-provided identifier for the request */
        // @ApiMember(Description="Optional client-provided identifier for the request")
        /** @var string|null */
        public ?string $refId=null,

        /** @description Optional queue or topic to reply to */
        // @ApiMember(Description="Optional queue or topic to reply to")
        /** @var string|null */
        public ?string $replyTo=null,

        /** @description Tag to identify the request */
        // @ApiMember(Description="Tag to identify the request")
        /** @var string|null */
        public ?string $tag=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['video'])) $this->video = JsonConverters::from('ByteArray', $o['video']);
        if (isset($o['width'])) $this->width = $o['width'];
        if (isset($o['height'])) $this->height = $o['height'];
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->video)) $o['video'] = JsonConverters::to('ByteArray', $this->video);
        if (isset($this->width)) $o['width'] = $this->width;
        if (isset($this->height)) $o['height'] = $this->height;
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueueScaleVideo'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new QueueMediaTransformResponse(); }
}

/** @description Watermark video */
// @Api(Description="Watermark video")
#[Returns('QueueMediaTransformResponse')]
class QueueWatermarkVideo implements IReturn, IQueueMediaTransform, JsonSerializable
{
    public function __construct(
        /** @description The video file to be watermarked */
        // @ApiMember(Description="The video file to be watermarked")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $video=null,

        /** @description The image file to use as a watermark */
        // @ApiMember(Description="The image file to use as a watermark")
        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $watermark=null,

        /** @description Position of the watermark */
        // @ApiMember(Description="Position of the watermark")
        /** @var WatermarkPosition|null */
        public ?WatermarkPosition $position=null,

        /** @description Optional client-provided identifier for the request */
        // @ApiMember(Description="Optional client-provided identifier for the request")
        /** @var string|null */
        public ?string $refId=null,

        /** @description Optional queue or topic to reply to */
        // @ApiMember(Description="Optional queue or topic to reply to")
        /** @var string|null */
        public ?string $replyTo=null,

        /** @description Tag to identify the request */
        // @ApiMember(Description="Tag to identify the request")
        /** @var string|null */
        public ?string $tag=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['video'])) $this->video = JsonConverters::from('ByteArray', $o['video']);
        if (isset($o['watermark'])) $this->watermark = JsonConverters::from('ByteArray', $o['watermark']);
        if (isset($o['position'])) $this->position = JsonConverters::from('WatermarkPosition', $o['position']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->video)) $o['video'] = JsonConverters::to('ByteArray', $this->video);
        if (isset($this->watermark)) $o['watermark'] = JsonConverters::to('ByteArray', $this->watermark);
        if (isset($this->position)) $o['position'] = JsonConverters::to('WatermarkPosition', $this->position);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueueWatermarkVideo'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new QueueMediaTransformResponse(); }
}

/** @description Convert a video to a different format */
#[Returns('QueueMediaTransformResponse')]
class QueueConvertVideo implements IReturn, IQueueMediaTransform, JsonSerializable
{
    public function __construct(
        /** @description The desired output format for the converted video */
        // @ApiMember(Description="The desired output format for the converted video")
        // @Required()
        /** @var ConvertVideoOutputFormat|null */
        public ?ConvertVideoOutputFormat $outputFormat=null,

        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $video=null,

        /** @description Optional client-provided identifier for the request */
        // @ApiMember(Description="Optional client-provided identifier for the request")
        /** @var string|null */
        public ?string $refId=null,

        /** @description Optional queue or topic to reply to */
        // @ApiMember(Description="Optional queue or topic to reply to")
        /** @var string|null */
        public ?string $replyTo=null,

        /** @description Tag to identify the request */
        // @ApiMember(Description="Tag to identify the request")
        /** @var string|null */
        public ?string $tag=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['outputFormat'])) $this->outputFormat = JsonConverters::from('ConvertVideoOutputFormat', $o['outputFormat']);
        if (isset($o['video'])) $this->video = JsonConverters::from('ByteArray', $o['video']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->outputFormat)) $o['outputFormat'] = JsonConverters::to('ConvertVideoOutputFormat', $this->outputFormat);
        if (isset($this->video)) $o['video'] = JsonConverters::to('ByteArray', $this->video);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueueConvertVideo'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new QueueMediaTransformResponse(); }
}

/** @description Crop a video to a specified area */
#[Returns('QueueMediaTransformResponse')]
class QueueCropVideo implements IReturn, IQueueMediaTransform, JsonSerializable
{
    public function __construct(
        /** @description The X-coordinate of the top-left corner of the crop area */
        // @ApiMember(Description="The X-coordinate of the top-left corner of the crop area")
        // @Validate(Validator="GreaterThan(0)")
        // @Required()
        /** @var int */
        public int $x=0,

        /** @description The Y-coordinate of the top-left corner of the crop area */
        // @ApiMember(Description="The Y-coordinate of the top-left corner of the crop area")
        // @Validate(Validator="GreaterThan(0)")
        // @Required()
        /** @var int */
        public int $y=0,

        /** @description The width of the crop area */
        // @ApiMember(Description="The width of the crop area")
        // @Validate(Validator="GreaterThan(0)")
        // @Required()
        /** @var int */
        public int $width=0,

        /** @description The height of the crop area */
        // @ApiMember(Description="The height of the crop area")
        // @Validate(Validator="GreaterThan(0)")
        // @Required()
        /** @var int */
        public int $height=0,

        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $video=null,

        /** @description Optional client-provided identifier for the request */
        // @ApiMember(Description="Optional client-provided identifier for the request")
        /** @var string|null */
        public ?string $refId=null,

        /** @description Optional queue or topic to reply to */
        // @ApiMember(Description="Optional queue or topic to reply to")
        /** @var string|null */
        public ?string $replyTo=null,

        /** @description Tag to identify the request */
        // @ApiMember(Description="Tag to identify the request")
        /** @var string|null */
        public ?string $tag=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['x'])) $this->x = $o['x'];
        if (isset($o['y'])) $this->y = $o['y'];
        if (isset($o['width'])) $this->width = $o['width'];
        if (isset($o['height'])) $this->height = $o['height'];
        if (isset($o['video'])) $this->video = JsonConverters::from('ByteArray', $o['video']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->x)) $o['x'] = $this->x;
        if (isset($this->y)) $o['y'] = $this->y;
        if (isset($this->width)) $o['width'] = $this->width;
        if (isset($this->height)) $o['height'] = $this->height;
        if (isset($this->video)) $o['video'] = JsonConverters::to('ByteArray', $this->video);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueueCropVideo'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new QueueMediaTransformResponse(); }
}

/** @description Trim a video to a specified duration via start and end times */
#[Returns('QueueMediaTransformResponse')]
class QueueTrimVideo implements IReturn, IQueueMediaTransform, JsonSerializable
{
    public function __construct(
        /** @description The start time of the trimmed video (format: HH:MM:SS) */
        // @ApiMember(Description="The start time of the trimmed video (format: HH:MM:SS)")
        // @Required()
        /** @var string */
        public string $startTime='',

        /** @description The end time of the trimmed video (format: HH:MM:SS) */
        // @ApiMember(Description="The end time of the trimmed video (format: HH:MM:SS)")
        /** @var string|null */
        public ?string $endTime=null,

        // @Required()
        /** @var ByteArray|null */
        public ?ByteArray $video=null,

        /** @description Optional client-provided identifier for the request */
        // @ApiMember(Description="Optional client-provided identifier for the request")
        /** @var string|null */
        public ?string $refId=null,

        /** @description Optional queue or topic to reply to */
        // @ApiMember(Description="Optional queue or topic to reply to")
        /** @var string|null */
        public ?string $replyTo=null,

        /** @description Tag to identify the request */
        // @ApiMember(Description="Tag to identify the request")
        /** @var string|null */
        public ?string $tag=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['startTime'])) $this->startTime = $o['startTime'];
        if (isset($o['endTime'])) $this->endTime = $o['endTime'];
        if (isset($o['video'])) $this->video = JsonConverters::from('ByteArray', $o['video']);
        if (isset($o['refId'])) $this->refId = $o['refId'];
        if (isset($o['replyTo'])) $this->replyTo = $o['replyTo'];
        if (isset($o['tag'])) $this->tag = $o['tag'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->startTime)) $o['startTime'] = $this->startTime;
        if (isset($this->endTime)) $o['endTime'] = $this->endTime;
        if (isset($this->video)) $o['video'] = JsonConverters::to('ByteArray', $this->video);
        if (isset($this->refId)) $o['refId'] = $this->refId;
        if (isset($this->replyTo)) $o['replyTo'] = $this->replyTo;
        if (isset($this->tag)) $o['tag'] = $this->tag;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueueTrimVideo'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new QueueMediaTransformResponse(); }
}

// @Route("/artifacts/{**Path}")
#[Returns('ByteArray')]
class GetArtifact implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $path='',

        /** @var bool|null */
        public ?bool $download=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['path'])) $this->path = $o['path'];
        if (isset($o['download'])) $this->download = $o['download'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->path)) $o['path'] = $this->path;
        if (isset($this->download)) $o['download'] = $this->download;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetArtifact'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new ByteArray(); }
}

// @Route("/files/{**Path}")
#[Returns('EmptyResponse')]
class DeleteFile implements IReturn, IDelete, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $path=''
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
    public function getTypeName(): string { return 'DeleteFile'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new EmptyResponse(); }
}

#[Returns('DeleteFilesResponse')]
class DeleteFiles implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var array<string>|null */
        public ?array $paths=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['paths'])) $this->paths = JsonConverters::fromArray('string', $o['paths']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->paths)) $o['paths'] = JsonConverters::toArray('string', $this->paths);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'DeleteFiles'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new DeleteFilesResponse(); }
}

// @Route("/variants/{Variant}/{**Path}")
#[Returns('ByteArray')]
class GetVariant implements IReturn, IGet, JsonSerializable
{
    public function __construct(
        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $variant='',

        // @Validate(Validator="NotEmpty")
        /** @var string */
        public string $path=''
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['variant'])) $this->variant = $o['variant'];
        if (isset($o['path'])) $this->path = $o['path'];
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->variant)) $o['variant'] = $this->variant;
        if (isset($this->path)) $o['path'] = $this->path;
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetVariant'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new ByteArray(); }
}

#[Returns('MigrateArtifactResponse')]
class MigrateArtifact implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @var string */
        public string $path='',
        /** @var DateTime|null */
        public ?DateTime $date=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['path'])) $this->path = $o['path'];
        if (isset($o['date'])) $this->date = JsonConverters::from('DateTime', $o['date']);
    }
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->path)) $o['path'] = $this->path;
        if (isset($this->date)) $o['date'] = JsonConverters::to('DateTime', $this->date);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'MigrateArtifact'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new MigrateArtifactResponse(); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryData of MediaType
 */
class QueryMediaTypesData extends QueryData implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryMediaTypesData'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['MediaType']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryData of TextToSpeechVoice
 */
class QueryTextToSpeechVoicesData extends QueryData implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryTextToSpeechVoicesData'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['TextToSpeechVoice']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryData of AiModel
 */
class QueryAiModelsData extends QueryData implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryAiModelsData'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['AiModel']); }
}

#[Returns('QueryResponse')]
/**
 * @template QueryData of AiType
 */
class QueryAiTypesData extends QueryData implements IReturn, JsonSerializable
{
    
    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = parent::jsonSerialize();
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'QueryAiTypesData'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return QueryResponse::create(genericArgs:['AiType']); }
}

/** @description Delete a Generation API Provider */
#[Returns('IdResponse')]
/**
 * @template IDeleteDb of MediaProvider
 */
class DeleteMediaProvider implements IReturn, IDeleteDb, JsonSerializable
{
    public function __construct(
        /** @var int|null */
        public ?int $id=null,
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
    public function getTypeName(): string { return 'DeleteMediaProvider'; }
    public function getMethod(): string { return 'DELETE'; }
    public function createResponse(): mixed { return new IdResponse(); }
}

