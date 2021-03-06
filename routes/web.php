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

Route::name('list')->get('/', 'TicketController@getList');
Route::name('detail')->get('/ticket/{id}', 'TicketController@getDetail')->where('id', '[0-9]+');

Route::group(['middleware' => 'role:administrator'], function() {
    Route::post('/ticket/{id}/update', 'TicketController@updateStatus')->where('id', '[0-9]+');
});

Route::group(['middleware' => 'role:administrator|moderator'], function() {
    Route::get('/create', function() {
        return view('create');
    });
    Route::post('/create', 'TicketController@create');
});

Route::post('/ticket/{id}/add-message', 'MessageController@addMessage')->where('id', '[0-9]+');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
