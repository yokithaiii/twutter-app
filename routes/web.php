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
Auth::routes();

Route::controller(\App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(\App\Http\Controllers\PostController::class)->group(function () {
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/create', 'create')->name('post.create');
    Route::get('/posts/update/{post}', 'update')->name('post.update');
    Route::get('/posts/delete/{post}', 'delete')->name('post.delete');
    Route::get('/posts/{post}', 'show')->name('post.show');
    Route::post('/posts', 'store')->name('post.store');
    Route::post('/posts/like/{post}', 'like')->name('post.like');
});

Route::controller(\App\Http\Controllers\ProfileController::class)->group(function () {
    Route::get('/profile', 'index')->name('profile.index');
    Route::patch('/profile/{user}', 'editProfile')->name('profile.edit');
});

Route::controller(\App\Http\Controllers\UsersController::class)->group(function () {
    Route::get('/users', 'index')->name('users.index');
    Route::get('/users/{id}', 'show')->name('users.show');
});

Route::controller(\App\Http\Controllers\ChatController::class)->group(function () {
    Route::get('/messages', 'index')->name('messages.index');
    Route::get('/messages/roomId={id}', 'roomCreate')->name('messages.chat');
    Route::get('/messages/chatId={id}', 'room')->name('messages.room');
    Route::post('/messages/send', 'store')->name('messages.store');
});

Route::controller(\App\Http\Controllers\MessageController::class)->group(function () {
    Route::get('/chat', 'index')->name('chat.name');
    Route::get('/chat/room={{id}}', 'room')->name('chat.room');
    Route::post('/chat/store', 'store')->name('chat.store');
});

Route::controller(\App\Http\Controllers\FriendsController::class)->group(function () {
    Route::get('/friends', 'index')->name('friends.index');
    Route::get('/friends/add={id}', 'add')->name('friends.add');
    Route::get('/friends/requests', 'requests')->name('friends.requests');
    Route::get('/friends/confirm={id}', 'confirm')->name('friends.confirm');
});
