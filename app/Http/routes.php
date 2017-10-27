<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('put', function() {
    Storage::cloud()->put('test.txt', 'Hello World');
    return 'File was saved to Google Drive';
});

Route::group(['middleware'=>'cors'],function () {
    Route::get('/api/v1/stream', 'PhotoController@stream');
});


Route::get('gdrive/{filename}', function ($filename)
{
    $dir = '/';
    $recursive = false; // Get subdirectories also?
    $contents = collect(Storage::cloud()->listContents($dir, $recursive));
    //dd($contents);
    $file = $contents
        ->where('type','file')
        ->where('filename', pathinfo($filename, PATHINFO_FILENAME))
        ->where('extension', pathinfo($filename, PATHINFO_EXTENSION))
        ->first(); // there can be duplicate file names!
    //return $file; // array with file info
    //dd($file);
    $rawData = Storage::cloud()->get($file['path']);
    //dd($file);
    
    return response($rawData, 200)
        ->header('ContentType', $file['mimetype'])
        ->header('Content-Disposition', "attachment; filename='$filename'");
    
});