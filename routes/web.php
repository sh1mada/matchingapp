<?php

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

Route::get('/', 'UsersController@index');
Route::resource('users', 'UsersController', ['only' => ['index' ,'show','edit','update']]);
Route::get('search','UsersController@search')->name('users.search');
Route::get('action','UsersController@action')->name('users.action');


Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
Route::post('upload','CloudinaryUploadController@store')->name('upload.store');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('like', 'UserLikeController@store')->name('user.like');
        Route::delete('rejection', 'UserLikeController@destroy')->name('user.rejection');
        Route::post('approval','UserLikeController@approval')->name('user.approval');
        //Route::delete('unlike', 'UserLikeController@destroy')->name('user.unlike');
        
        Route::get('likings', 'UsersController@likings')->name('users.likings');
        Route::get('likers', 'UsersController@likers')->name('users.likers');
        //Route::post('edit','UsersController@edit')->name('user.edit');
        //Route::get('editing', 'UsersController@editing')->name('mypage_edit');
        Route::get('liked','UsersController@liked')->name('user_like.liked');
        Route::get('likes','UsersController@likes')->name('user_like.likes');
        Route::get('friend','UsersController@friend')->name('users.friend');
        Route::get('chat','UsersChatController@chat')->name('users.chat');
        Route::get('chatroom/{friend_id}','UsersChatController@chatroom')->name('chat.chatroom');
        Route::post('chatroom/{friend_id}','UsersChatController@sendmessage')->name('chat.sendmessage');
    });
});
    
