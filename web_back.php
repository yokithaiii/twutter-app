<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/posts', 'App\Http\Controllers\PostController@index')->name('posts.index');
Route::get('/posts/create', 'App\Http\Controllers\PostController@create')->name('post.create');
Route::get('/posts/update/{post}', 'App\Http\Controllers\PostController@update')->name('post.update');
Route::get('/posts/delete/{post}', 'App\Http\Controllers\PostController@delete')->name('post.delete');

Route::post('/posts', 'App\Http\Controllers\PostController@store')->name('post.store');
Route::get('/posts/{post}', 'App\Http\Controllers\PostController@show')->name('post.show');
Route::post('/posts/like/{post}', 'App\Http\Controllers\PostController@like')->name('post.like');

Route::get('/contacts', 'App\Http\Controllers\ContactsController@index')->name('contacts.index');

Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile.index');
Route::patch('/profile/{user}', 'App\Http\Controllers\ProfileController@editProfile')->name('profile.edit');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', 'App\Http\Controllers\UsersController@index')->name('users.index');
Route::get('/users/{id}', 'App\Http\Controllers\UsersController@show')->name('users.show');

Route::controller(\App\Http\Controllers\ChatController::class)->group(function () {
    Route::get('/messages', 'index')->name('messages.index');
    Route::get('/messages/roomId={id}', 'chat')->name('messages.chat');
    Route::get('/messages/chatId={id}', 'room')->name('messages.room');
    Route::post('/messages/send', 'send');
});
