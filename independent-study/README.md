# Streaming Media in Laravel
*By Anya Zinoveva*

In my graduate research, I want to explore the integration of video streaming hosting and custom web software, for example as AWS and Laravel.  This outline provides a starting point.

## How Streaming Media Works

![Streaming on-demand video diagram](https://raw.githubusercontent.com/anyav77/e15/master/independent-study/images/video-streaming.gif)

Streaming allows to optimize user experience by providing smooth video playback, regardless of the internet connection. It is achieved by progressively serving video file data to a video player, to avoid buffering.

There are two types of video streaming:
1. Live video streaming
2. On-demand (pre-recorded) video streaming

For the purpose of this study, I'm focusing on the pre-recorded videos.


## Media Streaming Platforms
On-demand video platforms, such as Youtube, Vimeo, Amazon, Netflix, Hulu, have developed robust streaming solutions. The original video file is transcoded into multiple versions (different sizes and codecs), and the video player selects the appropriate file based on the users' browser and internet speed. 

Video hosting platforms (Youtube, Vimeo) offer video streaming, video player, and control panel. While it's a convenient and reliable way to deliver individual video on a website, there is limited control over customization of playlists and video player skins. 

Amazon offers robust a-la-carte services for video streaming: Amazon S3, Elastic Transcoder, and CloudFront. 

>In the on-demand streaming case, your video content is stored in S3. Your viewers can choose to watch it at any desired time, hence the name on-demand. A complete on-demand streaming solution typically makes use of Amazon S3 for storage, the Amazon Elastic Transcoder for video processing, and Amazon CloudFront for delivery.
<https://aws.amazon.com/blogs/aws/using-amazon-cloudfront-for-video-streaming/>

![Streaming on-demand video using AWS](https://d1.awsstatic.com/products/cloudfront/VOD%20Architecture%20CloudFront.aa3cb2ec3a8660b42f90072c60672a52d9c357a6.png)

FFmeg is an open source platform popular among developers.  It is used by the big brands like YouTube.  FFmeg offers downloadable code that can be installed on a hosting platform.
>FFmpeg is the leading multimedia framework, able to decode, encode, transcode, mux, demux, stream, filter and play pretty much anything that humans and machines have created. It supports the most obscure ancient formats up to the cutting edge. No matter if they were designed by some standards committee, the community or a corporation. It is also highly portable: FFmpeg compiles, runs, and passes our testing infrastructure FATE across Linux, Mac OS X, Microsoft Windows, the BSDs, Solaris, etc. under a wide variety of build environments, machine architectures, and configurations.
<https://www.ffmpeg.org/about.html>

## Laravel Streaming Packages
There is a number of Laravel packages related to video streaming. They roughly fall into these categories: 

1. Packages for FFmeg

2. Packages for video hosting providers, such as YouTube and Vimeo.  They seem to be "media organizers".
* [Official PHP library for the Vimeo API.](https://packagist.org/packages/vimeo/vimeo-api)
* [Laravel PHP Facade/Wrapper for the Youtube Data API v3](https://packagist.org/packages/alaouy/youtube)
* [A Vimeo bridge for Laravel](https://packagist.org/packages/vimeo/laravel)

3. [aws_video](https://packagist.org/packages/andrelohmann-silverstripe/aws_video) package for Amazon streaming:
>offers an extended VideoFile Object with automatically upload and transcoding functionality to your aws elastic transcoding and s3 account. the module extends andrelohmann-silverstripe/mediafiles
>you need to create an account on https://aws.amazon.com/de/developers/access-keys/ and setup a groups with AmazonS3FullAccess and AmazonElasticTranscoderFullAccess permissions

I ran into the error installing aws_video on a local server:

    ```git
    C:\xampp\htdocs\e15\independent-study\example (master){hg}
    λ composer require andrelohmann-silverstripe/aws_video
    Using version ^0.2.0 for andrelohmann-silverstripe/aws_video
    ./composer.json has been updated
    Loading composer repositories with package information
    Updating dependencies (including require-dev)
    Your requirements could not be resolved to an installable set of packages.

    Problem 1
        - Conclusion: install php-ffmpeg/php-ffmpeg 0.6.0
        - Installation request for andrelohmann-silverstripe/aws_video ^0.2.0 -> satisfiable by andrelohmann-silverstripe/aws_video[0.2.0].
        - Conclusion: remove monolog/monolog 2.0.2
        - Conclusion: don't install monolog/monolog 2.0.2
        - php-ffmpeg/php-ffmpeg 0.6.0 requires alchemy/binary-driver ~1.5 -> satisfiable by alchemy/binary-driver[1.5.0, 1.6.0].
        - alchemy/binary-driver 1.5.0 requires monolog/monolog ~1.3 -> satisfiable by monolog/monolog[1.10.0, 1.11.0, 1.12.0, 1.13.0, 1.13.1, 1.14.0, 1.15.0, 1.16.0, 1.17.0, 1.17.1, 1.17.2, 1.18.0, 1.18.1, 1.18.2, 1.19.0, 1.20.0, 1.21.0, 1.22.0, 1.22.1, 1.23.0, 1.24.0, 1.25.0, 1.25.1, 1.25.2, 1.25.3, 1.3.0, 1.3.1, 1.4.0, 1.4.1, 1.5.0, 1.6.0, 1.7.0, 1.8.0, 1.9.0, 1.9.1, 1.x-dev].
        - alchemy/binary-driver 1.6.0 requires monolog/monolog ^1.3 -> satisfiable by monolog/monolog[1.10.0, 1.11.0, 1.12.0, 1.13.0, 1.13.1, 1.14.0, 1.15.0, 1.16.0, 1.17.0, 1.17.1, 1.17.2, 1.18.0, 1.18.1, 1.18.2, 1.19.0, 1.20.0, 1.21.0, 1.22.0, 1.22.1, 1.23.0, 1.24.0, 1.25.0, 1.25.1, 1.25.2, 1.25.3, 1.3.0, 1.3.1, 1.4.0, 1.4.1, 1.5.0, 1.6.0, 1.7.0, 1.8.0, 1.9.0, 1.9.1, 1.x-dev].
        - Can only install one of: monolog/monolog[1.12.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.13.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.13.1, 2.0.2].
        - Can only install one of: monolog/monolog[1.14.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.15.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.16.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.17.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.17.1, 2.0.2].
        - Can only install one of: monolog/monolog[1.17.2, 2.0.2].
        - Can only install one of: monolog/monolog[1.18.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.18.1, 2.0.2].
        - Can only install one of: monolog/monolog[1.18.2, 2.0.2].
        - Can only install one of: monolog/monolog[1.19.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.20.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.21.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.22.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.22.1, 2.0.2].
        - Can only install one of: monolog/monolog[1.23.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.24.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.25.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.25.1, 2.0.2].
        - Can only install one of: monolog/monolog[1.25.2, 2.0.2].
        - Can only install one of: monolog/monolog[1.25.3, 2.0.2].
        - Can only install one of: monolog/monolog[1.x-dev, 2.0.2].
        - Can only install one of: monolog/monolog[1.10.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.11.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.3.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.3.1, 2.0.2].
        - Can only install one of: monolog/monolog[1.4.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.4.1, 2.0.2].
        - Can only install one of: monolog/monolog[1.5.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.6.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.7.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.8.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.9.0, 2.0.2].
        - Can only install one of: monolog/monolog[1.9.1, 2.0.2].
        - Installation request for monolog/monolog (locked at 2.0.2) -> satisfiable by monolog/monolog[2.0.2].


    Installation failed, reverting ./composer.json to its original content.
    ```


4.  [laravel-video](https://github.com/imanghafoori1/laravel-video) package was released by imanghafoori1 in 2020.  It seems to be limited to locally hosted videos. While early attempts to develop media streaming in Laravel reference issues with playback, in perticular with Google Chrome, laravel-video package seems to fix this problem with v2.0.2 release.

It's recommended to install a database prior to installing the package.  If the database is missing during the install, testing the package will return an error.

The installation is done via command line.

1. Create database, if you don't have it already
2. Update .env file with the new database name
3. navigate to the directory where Laravel is installed
* on the local environment, run `composer require --dev imanghafoori/laravel-video`
* on the production environment, run `composer require imanghafoori/laravel-video`
* wait for a confirmation message: `Package manifest generated successfully.`
4. navigate to routes directory, open web.php and add the following lines:

    ```git
    use Iman\Streamer\VideoStreamer;

    #installed laravel-video
    Route::get('/home', function () {
        $path = public_path('vid.mp4');
        VideoStreamer::streamFile($path);
    });

    ```
5. upload vid.mp4 in the public/ directory
6. navigate to the home/ directory to test the result <http://independent-study.atozez.com/home>

#### Troubleshooting
The error "failed to open stream: No such file or directory" comes after the installation. To resolve it, upload vid.mpg into the public directory, as described in step 5.

#### Observations
Laravel-video uses HTML 5 player. It uses localpath to stream the video files uploaded to Laravel public directory:
    `$path = public_path('vid.mp4');`

Changing the path to external http request `$path = public_path('http://afterschoolprogramming.com/images/vid.mp4');` returns an error:
>ErrorException
fopen(C:\xampp\htdocs\e15\independent-study\example\public\http://afterschoolprogramming.com/images/vid.mp4): failed to open stream: No such file or directory

It seems like the package relies on one local file for streaming. It doesn't select the file based on the bandwidth or a browser.  Therefore, its ability to adapt to different browsers and internet speeds is limited.  It may be possible to extend its capacity through integration with a video player, such as JW Player.

Laravel-video also require integration with a video player to meet accessibility standards. 

# Summary and Next Steps

FFmedia is an open source technology for video compression, which has a variety of Laravel packages.  It offers downloadable code that requires a hosting account.  FFmedia is similar to [Amazon Video on Demand](https://aws.amazon.com/solutions/implementations/video-on-demand-on-aws/).

AWS offers cutting edge video hosting technology at a reasonable cost, and it can be customized by region and the website needs.

Laravel can be installed on Amazon EC2. 
[andrelohmann-silverstripe]<https://packagist.org/packages/andrelohmann-silverstripe/aws_video> package may offer a streaming solutions for Laravel on EC2, but it remains to be tested.  
There is a post that descrives the [Amazon S3 streaming issue](https://stackoverflow.com/questions/46363623/laravel-s3-retreiving-a-video-to-stream).  It is not clear if the issue is related to a native Laravel code, or an external package.  The developer is using S3 bucket, but there are no references to Elastic Transcoder and CloudFront.  Would they help to address this issue?

There are a number of additional questions remain in my research:
* What caused the error with aws_video installation?
* Will aws_video package work on Laravel installed on AWS?
* Will laravel-video allow to stream the files from AWS? or is it limited to local files?  
* Can YouTube/Vimeo can be used in a database/video control panel format? 
* What are the capabilities of Laravel packages that offer API integrations with Vimeo and YouTube?


## References
* <https://laravel.io/forum/10-06-2014-streaming-video-files-with-laravel>
* <https://stackoverflow.com/questions/58709069/how-to-stream-video-in-laravel>
* <https://stackoverflow.com/questions/46363623/laravel-s3-retreiving-a-video-to-stream>
* <https://aws.amazon.com/blogs/aws/using-amazon-cloudfront-for-video-streaming/>
* <https://aws.amazon.com/solutions/implementations/video-on-demand-on-aws/>
* <https://packagist.org/packages/vimeo/vimeo-api>
* <https://packagist.org/packages/alaouy/youtube>
* <https://packagist.org/packages/vimeo/laravel>
* <https://en.wikipedia.org/wiki/FFmpeg>
* <https://www.ffmpeg.org/>