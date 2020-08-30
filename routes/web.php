<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');
// Добавление Post от имени пользователя {id}
Route::get('/createPost/{id}/{title}/{body}/','MyDbController@createPost');
// Показать пользователей
Route::get('showUsers', 'MyDbController@showUsers');
// Показать посты пользователя
Route::get('/showPosts/{id}', 'MyDbController@showPosts');
// Показать данные прользователя создавшегоь пост {$id}
// TODO разобраться с обратным вызовом
Route::get('/showPostUserName/{id}', 'MyDbController@showPostUserName');
//Обновление данных
Route::get('updatePost/{idUser}/{idPost}/{newTitle}/{newBody}', 'MyDbController@updatePost');
//Удаление данных пользователя {userId} под номером {postId}
Route::get('deletePost/{userId}/{postId}', 'MyDbController@deletePost');
