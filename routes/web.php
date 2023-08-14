<?php

use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
//use App\Http\Controllers\VideoController;
use \App\Http\Controllers\CategoryVideoController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::resource('videos',VideoController::class);
Route::get('categories/{category}/videos', [CategoryVideoController::class,'index'])->name('categories.videos.index');
Route::get('/',[IndexController::class,'index'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/email',function (){
   Mail::to('amin.jalili137819@gmail.com')->send(new \App\Mail\VerifyEmail());
});


//Route::get('/verify/{id}',function (){
//    dd(request()->hasValidSignature());
//echo 'verify';
//})->name('verify');
//
//Route::get('/generate',function (){
//    echo URL::temporarySignedRoute('verify',now()->addSeconds(20),['id'=>5]);
//});
Route::get('jobs',function (){
    \App\Jobs\ProcessVideo::dispatch();
});

Route::get('/event',function (){
    $video = Video::first();
    \App\Events\VideoCreated::dispatch($video);
});
Route::get('/notify',function (){
    $user = User::first();
    $video = Video::first();
    $user->notify(new \App\Notifications\VideoUploaded($video));
});




require __DIR__.'/auth.php';
