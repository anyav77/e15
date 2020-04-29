# Streaming Media in Laravel
*By Anya Zinoveva*
## How Streaming Media Works
There are two types of video streaming:
1. Live streaming
2. Pre-recorded video streaming

In both cases, streaming refers to progressive download of video data. For the purpose of this study, I'm focusing on the pre-recorded videos.

Streaming allows to optimize user experience by providing smooth video playback, regardless of the internet connection.  It is used by the video platforms like Youtube, Vimeo, Amazon, Netflix, to name a few.

## Existing Packages
There are many video-related packages available on Laravel.  
<https://github.com/imanghafoori1/laravel-video>

In 2020, the [laravel-video](https://github.com/imanghafoori1/laravel-video) package was released by imanghafoori1.  There are no comments yet. I looks like the package is using HTML 5 player.  
Further Questions: 
- Is it smart enough to select the media source based on the bandwidth/file type/file size? Will it require an integration with a video player? if so, what is the best player option?


Prior attempts to develop media  in Laravel reference issues with playback, in perticular with Google Chrome.  imanghafoori1 seems to fix this problem in the latest release,  v2.0.2

### Installation
The package requires a database setup. The installation is done via command line.

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

![Screenshot of Missing File Error](/images/error.png)

## Limitations
Progressive dowload
one file
need media server
## Compatible Players

## Accessibility

## Compatibility with Media Servers
- Will it work with Amazon streaming server?  Here is the post that descrives the [Amazon S3 streaming issue](https://stackoverflow.com/questions/46363623/laravel-s3-retreiving-a-video-to-stream).  Is there an alternative Amazon streaming server?

## References
<https://laravel.io/forum/10-06-2014-streaming-video-files-with-laravel>
<https://stackoverflow.com/questions/58709069/how-to-stream-video-in-laravel>
<https://stackoverflow.com/questions/46363623/laravel-s3-retreiving-a-video-to-stream>
<https://aws.amazon.com/blogs/aws/using-amazon-cloudfront-for-video-streaming/>