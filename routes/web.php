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

Route::get('/', 'IndexController@index');
Route::get('services', 'IndexController@services');
Route::get('about', 'IndexController@about');
Route::get('terms', 'IndexController@terms');
Route::get('cookies', 'IndexController@cookie');
Route::get('politica', 'IndexController@politica');
Route::get('partners', 'IndexController@partners');
Route::get('steps', 'IndexController@steps');
Route::get('recruit', 'IndexController@recruit');
Route::get('contact', 'ContactController@index');
// Route::get('job-detail', 'JobController@job_detail');
Route::get('jobs', 'JobController@jobs');
Route::get('/job-detail/{url_slug}','JobController@job_detail');
Route::post('/submitForm', 'JobController@submit_file');



Route::post('send-message','ContactController@send_message');
Route::post('search-locations','JobController@seearch_location');
Route::post('search-category','JobController@search_category');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::get('locale/{locale}', function($locale) {
    \Session::put('locale', $locale);
    return redirect()->back();
  });

  Route::get('/storage/thumb/{query}/{file?}', 'ThumbController@index')
    ->where([
        'query' => '[A-Za-z0-9\:\;\-]+',
        'file'  => '[A-Za-z0-9\/\.\-\_]+',
    ])
    ->name('thumb');