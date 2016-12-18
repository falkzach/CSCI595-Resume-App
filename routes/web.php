<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('main');
});

// ---------- Pages ----------------
Route::get('/main', function ()
{
  return view('main');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/build', function ()
    {
        return view('build');
    });
    Route::get('/resumes', function ()
    {
        return view('resumes');
    });
    Route::get('/account', function ()
    {
        return view('account');
    });
    Route::get('/expanded', function ()
    {
        return view('expanded-build-field');
    });
    Route::get('/yourresume', function ()
    {
        return view('expanded-resume');
    });
});

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/example', function() {
        return view('apiexample');
    });
});

Route::model('user', 'App\User');
Route::model('school', 'App\School');
Route::model('work', 'App\Work');
Route::model('skill', 'App\Skill');
Route::model('reference', 'App\Reference');

//API
Route::group(['prefix' => 'api/account'], function() {
    Route::get('/', 'AccountController@index');
    Route::post('/update', 'AccountController@update');
    Route::post('/changePassword', 'AccountController@changePassword');
});

Route::group(['prefix' => 'api/school'], function() {
    Route::get('/', 'SchoolController@index');
    Route::post('/create', 'SchoolController@create');
    Route::post('/{school}/update', 'SchoolController@update');
    Route::delete('/{school}/delete', 'SchoolController@delete');
});

Route::group(['prefix' => 'api/work'], function() {
    Route::get('/', 'WorkController@index');
    Route::post('/create', 'WorkController@create');
    Route::post('/{work}/update', 'WorkController@create');
    Route::delete('/{work}/delete', 'WorkController@delete');
});

Route::group(['prefix' => 'api/skill'], function() {
    Route::get('/', 'SkillController@index');
    Route::post('/create', 'SkillController@create');
    Route::post('/{skill}/update', 'SkillController@create');
    Route::delete('/{skill}/delete', 'SkillController@delete');
});

Route::group(['prefix' => 'api/reference'], function() {
    Route::get('/', 'ReferenceController@index');
    Route::post('/create', 'ReferenceController@create');
    Route::post('/{reference}/update', 'ReferenceController@create');
    Route::delete('/{reference}/delete', 'ReferenceController@delete');
});
