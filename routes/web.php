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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'SearchTodoController@action')->name('action');

Route::post('/ajax/postTodo', 'PostTodoController@AjaxPost');

Route::patch('/ajax/done', 'PatchTodoController@AjaxPatch');

Route::delete('/ajax/delete', 'DeleteTodoController@AjaxDelete');
