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
Route::post('/ticket/{id}/update', 'TicketController@updateStatus')->where('id', '[0-9]+');

Route::get('/create', function() {
    return view('create');
});
Route::post('/create', 'TicketController@create');


Route::post('/ticket/{id}/add-message', 'MessageController@addMessage')->where('id', '[0-9]+');
