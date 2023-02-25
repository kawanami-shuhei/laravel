<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myPostController;
use App\Http\Controllers\researchPostController;
use App\Http\Controllers\newPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


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



Auth::routes();

Route::group(['middlemare' => 'auth'],function(){
    Route::get('/admin',[AdminController::class,'admin'])->name('admin');

    Route::get('/user/{id}/edit',[UserController::class,'edit']);
    Route::post('/user/{id}/update',[UserController::class,'update'])->name('update.user');
    Route::get('/user/{id}/delete',[UserController::class,'destroy']);
    Route::get('/search/user', 'UserController@search');
    Route::post('/completeEditUser',[UserController::class,'completeEditUser'])->name('completeEditUser');


    Route::get('/search/index', 'HomeController@search');
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/confirmNewPost',[PostController::class,'confirmNewPost'])->name('confirmNewPost');
    
    
    Route::get('/myPost',[myPostController::class,'myPost'])->name('mypost');
    // Route::get('/post/show/{post}',[PostController::class,'show']);
    Route::resource('posts', 'PostController');
});

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');