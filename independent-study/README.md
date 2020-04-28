# Streaming Media in Laravel
*By Anya Zinoveva*
## How Streaming Media Works




## Existing Packages
<https://github.com/imanghafoori1/laravel-video>

In 2020, the [laravel-video](https://github.com/imanghafoori1/laravel-video) package was released by imanghafoori1.  There are no comments yet. I looks like the package is using HTML 5 player.  
Further Questions: 
- Is it smart enough to select the media source based on the bandwidth/file type/file size? Will it require an integration with a video player? if so, what is the best player option?


Prior attempts to develop media  in Laravel reference issues with playback, in perticular with Google Chrome.  imanghafoori1 seems to fix this problem in the latest release,  v2.0.2

### Installation
To install the package on the local (development) server:
- open Composer
- navigate to the directory where Laravel is installed
- run this command: `composer require --dev imanghafoori/laravel-video`
It may take a minute or two to install. You will receive a confirmation message:
`Package manifest generated successfully.`

2. update routes/web.php file with the following lines:

If you navigate to home difectory, you will receive a database error

3. Create database (you can use phpMyAdmin)
4. Update .env file with the new database name



## Compatible Players

## Accessibility

## Compatibility with Media Servers
- Will it work with Amazon streaming server?  Here is the post that descrives the [Amazon S3 streaming issue](https://stackoverflow.com/questions/46363623/laravel-s3-retreiving-a-video-to-stream).  Is there an alternative Amazon streaming server?

## References
<https://laravel.io/forum/10-06-2014-streaming-video-files-with-laravel>
<https://stackoverflow.com/questions/58709069/how-to-stream-video-in-laravel>
<https://stackoverflow.com/questions/46363623/laravel-s3-retreiving-a-video-to-stream>