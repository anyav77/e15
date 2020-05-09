# Streaming Media in Laravel
*By Anya Zinoveva*

In my graduate research, I want to explore the integration of video streaming hosting and custom web software, such as AWS and Laravel.  This outline provides a starting point.

## How Streaming Media Works

Streaming allows optimizing user experience by providing smooth video playback, regardless of the internet connection. It is achieved by progressively serving video file data to a video player, to avoid buffering.

There are two types of video streaming:
1. Live video streaming
2. On-demand (pre-recorded) video streaming

For this study, I'm focusing on pre-recorded videos.


## Video Hosting

Streaming can be achieved with self-hosted video files using plugins like [laravel-video](http://independent-study.atozez.com/).  However, the industry-standard way of streaming videos is video hosting.

In a nutshell, the video file uploaded to the media server is converted into multiple formats.  When the browser makes a request for a file, the server detects a browser version and the connection type and serves the corresponding file.

![Streaming on-demand video diagram](https://raw.githubusercontent.com/anyav77/e15/master/independent-study/images/video-streaming.gif)

There are a variety of video-hosting providers, ranging from Free to Freemium to Enterprize:

* YouTube
* Vimeo
* Wistia
* FlowPlayer
* Brightcove
* Panopto
* Kaltura
* AWS

The majority of video hosting services provide the embed code, shareable links, and the portal to manage media and view the files. They may also allow us to customize the player’s skin and add interactive elements. It is an appropriate solution for many websites that need a reliable and easy way to include videos on their webpages.  For example, a promotional video or a playlist for product training.

AWS doesn’t include the out-of-the-box portal and media player: it is focused on optimizing and delivering media via the cloud.  Instead, it provides a Software Development Kit (SDK), which allows integration of AWS media services into frameworks like Laravel for creating robust applications. AWS is a better fit for companies that focus on live streaming, video production, and distribution. 


## AWS Media Services

AWS Media Services can be classified based on the video streaming type (on-demand vs live)

### On-Demand Streaming:
* Elastic Transcoder

### On-Demand and Live Streaming:
* MediaConvert
* Elemental Appliances & Software
* MediaTailor
* MediaPackage

### Live Streaming:
* MediaStore
* MediaLive
* MediaConnect
* Kinesis Video Streams

#### Elastic Transcoder (ETC)
Elastic Transcoder is a media transcoding service that converts original video media files into a web-based format. It allows combining clips, adding captions and watermarks. ETC integrates with S3 for storing input and output videos.
 
ETC provides a cost-effective solution for long videos. For short videos, it could be replaced with AWS Lambda + FFmpeg integration. 

Elastic Transcoder is similar to MediaConvert, but it runs on EC2 and covers a greater range of file formats: “if you need to create WebM, MP3 audio-only outputs, or animated GIF files, or if you want to enable encryption in conjunction with KMS, or if you require auto-rotation of your files, you will need to use Elastic Transcoder (ETS)”
<https://forums.aws.amazon.com/thread.jspa?threadID=268221>

#### Elemental MediaConvert
MediaConvert is a newer media transcoding service, an alternative to Elastic Transcoder. it accepts video input and transcodes then into multiple formats, for both broadcast and on-demand delivery. It’s an efficient solution for transcoding large media libraries. It includes graphic overlays, content protection, multi-language audio, closed captioning support, and professional broadcast formats.
MediaConvert does not accept .mov files.
 
 
#### Elemental MediaPackage
Media package prepares the live and on-demand video for online distribution.  It accepts input from S3 or a video camera via LiveEncoding, transcodes the video and delivers it to CDN for distribution. It offers security and scalability.


#### Elemental MediaStore
Elemental MediaStore is media storage for live video streams.  It allows optimizing the delivery of live media content based on the number of viewers. It acts as an intermediate step between LiveEncoding and CDN. MediaStore can be used as a preliminary storage step before the video is written to S3.
 
MediaStore is similar to MediaPackage:
“AWS Elemental MediaPackage provides just-in-time packaging and live-to-VOD features as well as origination for live streams. If multiple formats and DRMs are required, or DVR-like features, you can use AWS Elemental MediaPackage. ”
<https://aws.amazon.com/mediastore/faqs/>


#### Elemental Appliances & Software
It provides on-premises media solutions, such as processing videos from security cameras and broadcasting them to the multi-screen devices.  It supports both live video input and server-based media files.

#### Elemental MediaTailor
EMT is an ad monetization service that displays targeted ads in the video streams without sacrificing broadcast-grade video quality (i.e. both the video stream and the ads have the same quality). It also provides accurate measurements of ad performance and optimizes efficiency.


#### Elemental MediaConnect
MediaConnect is a live video transfer service. It provides a reliable and affordable way to transmit live video via the cloud, as an alternative to video satellite transmission.  For example, a live event could be transmitted to different locations: headquarters, TV channel, industry partner, etc. MediaConnect receives the input from LiveEncoders and sends it to MediaLive or on-premise receiver or IRD.
 
#### Elemental MediaLive
MediaLive is a live broadcasting service.  It accepts input from cameras or MediaConnect, transcodes the video streams, and distributes them across CDN to the end-users.
 
#### Kinesis Video Stream
Kinesis Video Stream is the next-generation media service.  It collects input video from a variety of devices for data analysis.  The use cases include machine learning for security alerts, monitoring appliances, and manufacturing equipment, building two-way video interaction, etc.

## Streaming On-Demand Videos with AWS

AWS MediaServices is an adaptable system that can be customized based on the project needs.  It integrates with third-party tools like FFmpeg, which can help to lower the costs.

The cloud-based, on-demand streaming solution can be achieved with the combination of AWS services:
* Amazon S3
* AWS Elemental MediaConvert
* AWS Elemental MediaPackage
* Amazon CloudFront
* Compatible Media Player

![Streaming on-demand video with AWS diagram](https://raw.githubusercontent.com/anyav77/e15/master/independent-study/images/workflow-aws-on-demand-streaming.png)

The workflow involves:
1. Uploading video into S3 bucket
2. Transcoding the file using MediaConvert
3. Saving the transcoded file to S3 bucket 
4. Using MediaPackage for delivering the appropriate video file to CloudFront
5. Integrating CloudFront with a video player

S3 storage contains two baskets: the input basket stores original files, and the output basket stores the converted video files.
 
MediaConvert retrieves the original file from the input S3 basket, converts it into multiple web formats, and saves the files into output S3 basket.

AWS MediaPackage retrieves the converted file from S3, assigns the DRM profiles and delivers it to CloudFront

![AWS diagram showing streaming process from Media Transcoders to S3 to MediaPackage to CloudFront](https://d1.awsstatic.com/awselemental/Workflows/product-page-diagram_Elemental-MediaPackage_VOD_HIW_930x374_r05_@2x.c2b0531f57df99e5883c24aefc9a3863f33975a6.png)


Since AWS is focused on encoding and delivering media to CDN, the AWS MediaServices don’t include a media player. Amazon provides documentation on how to configure a media player with CloudFront. It recommends VLC player among its partners.

## References
* <https://laravel.io/forum/10-06-2014-streaming-video-files-with-laravel>
* <https://stackoverflow.com/questions/58709069/how-to-stream-video-in-laravel>
* <https://stackoverflow.com/questions/46363623/laravel-s3-retreiving-a-video-to-stream>
* <https://aws.amazon.com/blogs/aws/using-amazon-cloudfront-for-video-streaming/>
* <https://aws.amazon.com/solutions/implementations/video-on-demand-on-aws/>
* <https://en.wikipedia.org/wiki/FFmpeg>
* <https://www.ffmpeg.org/>
* <https://aws.amazon.com/media-services/>
* <https://www.elemental.com/products/aws-media-services/>
* <https://aws.amazon.com/elastictranscoder/>
* <https://stackoverflow.com/questions/25734763/amazon-elastic-transcoder-vs-ffmpeg>
* <https://cloudiamo.com/2017/03/07/five-things-i-wish-i-could-do-with-the-amazon-elastic-transcoder/>
* <https://stackshare.io/stackups/amazon-elastic-transcoder-vs-aws-elemental-mediaconvert>
* <https://forums.aws.amazon.com/thread.jspa?threadID=268221>
* <https://us-east-2.console.aws.amazon.com/mediaconvert/home?region=us-east-2#/welcome>
* <https://aws.amazon.com/mediaconvert/>
* <https://aws.amazon.com/elemental-appliances-software/>
* <https://aws.amazon.com/mediatailor/>
* <https://www.youtube.com/watch?v=3kMqz9ncCqE>
* <https://aws.amazon.com/kinesis/video-streams/>
* <https://aws.amazon.com/mediaconnect/>
* <https://aws.amazon.com/medialive/>
* <https://aws.amazon.com/mediapackage/>
* <https://github.com/aws/aws-sdk-php>
* <https://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/Streaming_URLs.html>
* <https://aws.amazon.com/marketplace/pp/Amazon-Web-Services-Inc-VLC-Media-Player/prodview-y4kbs3po3exx6>
* <https://aws.amazon.com/mediastore/>
* <https://aws.amazon.com/mediastore/faqs/>
* <https://aws.amazon.com/blogs/aws/aws-media-services-process-store-and-monetize-cloud-based-video/>
* <https://searchcio.techtarget.com/definition/digital-rights-management>
* <https://en.wikipedia.org/wiki/VLC_media_player>
* <https://en.wikipedia.org/wiki/Integrated_receiver/decoder>
* <https://aws.amazon.com/about-aws/whats-new/2018/12/aws-elemental-medialive-now-supports-aws-elemental-mediaconnect-flows-as-inputs/>
