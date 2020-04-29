# The State of Streaming Media in Laravel
*By Anya Zinoveva*
## How Streaming Media Works
There are two types of video streaming:
1. Live streaming
2. Pre-recorded video streaming

In both cases, streaming refers to progressive download of video data. For the purpose of this study, I'm focusing on the pre-recorded videos.

Streaming allows to optimize user experience by providing smooth video playback, regardless of the internet connection.  It is used by the video platforms like Youtube, Vimeo, Amazon, Netflix, to name a few.

Video hosting platforms (Youtube, Vimeo) use propriatory code for their sreaming solutions. The original file is transcoded into multiple versions (different sizes and codecs), and the video player selects the appropriate file based on the users' browser and internet speed.  

Amazon offers a-la-carte services for video streaming: Amazon S3, Elastic Transcoder, and CloudFront.

>In the on-demand streaming case, your video content is stored in S3. Your viewers can choose to watch it at any desired time, hence the name on-demand. A complete on-demand streaming solution typically makes use of Amazon S3 for storage, the Amazon Elastic Transcoder for video processing, and Amazon CloudFront for delivery.
<https://aws.amazon.com/blogs/aws/using-amazon-cloudfront-for-video-streaming/>


## Laravel Packages
There are many video-related packages available on Laravel.  However, most of Laravel video packages rely on the video hosting providers, such as YouTube and Vimeo.  Therefore, they likely act as media organizers utilizing the existing streaming technology.
[Official PHP library for the Vimeo API.]<https://packagist.org/packages/vimeo/vimeo-api>
[Laravel PHP Facade/Wrapper for the Youtube Data API v3]<https://packagist.org/packages/alaouy/youtube>
[A Vimeo bridge for Laravel]<https://packagist.org/packages/vimeo/laravel>

The package by andrelohmann-silverstripe utilizes Amazon Web Services
[AWS Elastic Transcoder Video Extension]<https://packagist.org/packages/andrelohmann-silverstripe/aws_video>

>this module offers an extended VideoFile Object with automatically upload and transcoding functionality to your aws elastic transcoding and s3 account. the module extends andrelohmann-silverstripe/mediafiles

<https://github.com/andrelohmann/silverstripe-aws_video>

you need to create an account on https://aws.amazon.com/de/developers/access-keys/ and setup a groups with AmazonS3FullAccess and AmazonElasticTranscoderFullAccess permissions


Early attempts to develop media streaming in Laravel reference issues with playback, in perticular with Google Chrome.  

In 2020, the [laravel-video](https://github.com/imanghafoori1/laravel-video) package was released by imanghafoori1, It seems to fix this problem with Chrome playback in the latest release,  v2.0.2
Laravel-video uses HTML 5 player. Tt uses localpath to stream the video files uploaded to Laravel public directory:
`$path = public_path('vid.mp4');`


Changing the path to external http request `$path = public_path('http://afterschoolprogramming.com/images/vid.mp4');` returns an error:
>ErrorException
fopen(C:\xampp\htdocs\e15\independent-study\example\public\http://afterschoolprogramming.com/images/vid.mp4): failed to open stream: No such file or directory

It seems like the package optimizes one file for streaming, but it doesn't select a the based on the bandwidth or a browser.  It may be possible through the integration with a video player, such as JW Player.


#### Installation
It's recommended to install a database prior to installing the package.  If the database is missing during the install, testing the package will return an error.

The installation is done via command line.

1. Create database, if you don't have it already
2. Update .env file with the new database name
3. navigate to the directory where Laravel is installed
* on the local environment, run `composer require --dev imanghafoori/laravel-video`
* on the production environment, run `composer require imanghafoori/laravel-video`
It may take a minute or two to install. You will receive a confirmation message:
`Package manifest generated successfully.`
4. update navigate to routes directory, open web.php and add the following lines:
```git
use Iman\Streamer\VideoStreamer;

#installed laravel-video
Route::get('/home', function () {
    $path = public_path('vid.mp4');
    VideoStreamer::streamFile($path);
});

```
5. upload vid.mp4 in the public/ directory
6. navigate to the home/ directory to test the result
<http://independent-study.atozez.com/home>

#### Possible Errors:
>failed to open stream: No such file or directory

The error indicates that video file is not found.  Double-check that the file name and the location indicated in web.php is correct.

![Screenshot of Missing File Error](https://raw.githubusercontent.com/anyav77/e15/master/independent-study/images/error.png)

## Limitations
Since the package relyes on one file, its missing on the ability to adapt to different browsers and internet speeds.

## Accessibility
Laravel sreaming packages require integration with a video player to meet accessibility standards.

## Compatibility with Media Servers
- Will it work with Amazon streaming server?  Here is the post that descrives the [Amazon S3 streaming issue](https://stackoverflow.com/questions/46363623/laravel-s3-retreiving-a-video-to-stream).  Is there an alternative Amazon streaming server?

# Conclusion
It seems that [andrelohmann-silverstripe]<https://packagist.org/packages/andrelohmann-silverstripe/aws_video> package may offer better streaming solutions.  However, both packages need to be tested on Amazon server.


## References
<https://laravel.io/forum/10-06-2014-streaming-video-files-with-laravel>
<https://stackoverflow.com/questions/58709069/how-to-stream-video-in-laravel>
<https://stackoverflow.com/questions/46363623/laravel-s3-retreiving-a-video-to-stream>
<https://aws.amazon.com/blogs/aws/using-amazon-cloudfront-for-video-streaming/>
<https://packagist.org/packages/vimeo/vimeo-api>
<https://packagist.org/packages/alaouy/youtube>
<https://packagist.org/packages/vimeo/laravel>