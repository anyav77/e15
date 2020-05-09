<?php

use Illuminate\Support\Facades\Route;
use Iman\Streamer\VideoStreamer;

#default route
Route::get('/', function () {
    return view('welcome');
});

#installed laravel-video
Route::get('/home', function () {
    $path = public_path('vid.mp4');
    # It doesn't allow to steam content via absolute URI
    //$path = public_path('http://afterschoolprogramming.com/images/vid.mp4');
    VideoStreamer::streamFile($path);
});

# testing database connecion

Route::get('/debug', function () {
    $debug = [
        'Environment' => App::environment(),
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});
