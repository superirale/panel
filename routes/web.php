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


Route::get('campaigns/{campaign_id}/lists', 'CampaignListsController@index');
Route::get('campaigns/{campaign_id}/templates', 'CampaignTemplatesController@index');
Route::get('campaigns/{campaign_id}/message', 'CampaignMessageController@index');
Route::get('campaigns/{campaign_id}/run', 'CampaignsController@runCampaign');
Route::get('campaigns/{campaign_id}/list/{list_id}/remove', 'CampaignListsController@removeList');


Route::resource('images', 'ImagesController');
Route::resource('services', 'ServicesController');
Route::resource('user-services', 'UserServicesController');

Route::get('/crm', 'CrmController@index');
Route::get('contacts/import/{contact_list_id?}', 'FileController@index');
Route::post('contacts/import/{contact_list_id?}', 'FileController@importContacts');
Route::post('contacts/name-import/{contact_list_id?}', 'FileController@nameFieldImport');
Route::resource('contacts', 'ContactsController');
// Route::get('contacts/{contact_id}/list', 'ContactListsController@index');

Route::resource('lists', 'ContactListsController');
Route::resource('list-contacts', 'ListContactsController');
Route::resource('messages', 'MessagesController');
Route::resource('templates', 'TemplatesController');
Route::resource('campaigns', 'CampaignsController');
Route::resource('campaign-lists', 'CampaignListsController');
Route::resource('members', 'MembersController');
Route::resource('campaign-message', 'CampaignMessageController');
Route::resource('campaign-templates', 'CampaignTemplatesController');