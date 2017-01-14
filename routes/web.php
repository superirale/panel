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

// Route::get('/home', 'HomeController@index');
Route::get('/home', 'UploadController@create');
Route::post('/upload', 'UploadController@ImageUpload');

Route::resource('images', 'ImagesController');
Route::resource('services', 'ServicesController');
Route::resource('user-services', 'UserServicesController');

Route::get('/crm', 'CrmController@index');
Route::get('contacts/import', 'FileController@index');
Route::post('contacts/import', 'FileController@importContacts');
Route::resource('contacts', 'ContactsController');
;
Route::resource('lists', 'ListsController');
Route::resource('list-contacts', 'ListContactsController');