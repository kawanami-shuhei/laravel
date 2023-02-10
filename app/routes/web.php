<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myPostController;
use App\Http\Controllers\researchPostController;
use App\Http\Controllers\newPostController;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middlemare' => 'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/myPost',[myPostController::class,'myPost'])->name('mypost');
    // Route::get('/editMyPost',[myPostController::class,'editMyPost'])->name('editmypost');
    Route::post('/confirmNewPost',[PostController::class,'confirmNewPost'])->name('confirmNewPost');
    

    Route::resource('posts', 'PostController');
});