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

Route::get('/', 'thaileaguecontroller@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/clubinfo/{club}','thaileaguecontroller@clubinfo');
Route::get('/index','thaileaguecontroller@index');
Route::get('/table','thaileaguecontroller@clubranking');
Route::get('/allclub','thaileaguecontroller@allclubshow');
Route::get('/match/{id}','thaileaguecontroller@matchinfo');

//BLACK END
Route::get('/teamupdate', 'ThaileagueAdminController@adding');
Route::post('/addteam', 'ThaileagueAdminController@teamadd');
Route::get('/admin/allteam', 'ThaileagueAdminController@adminteam');

Route::get('/admin', 'HomeController@index')->name('home');
Route::get('/admin/addplayer/{clubcode}', 'ThaileagueAdminController@addplayer');
Route::get('/admin/player/{clubcode}', 'ThaileagueAdminController@viewplayer');
Route::post('/admin/playeradding', 'ThaileagueAdminController@playeradd');
Route::get('/admin/allmatch', 'ThaileagueAdminController@adminallmatch');
Route::get('/admin/matchmaking/{matchweek}', 'ThaileagueAdminController@matchmaker');
Route::post('/admin/matchmaking2', 'ThaileagueAdminController@matchmaker2');
Route::post('/admin/matchmaking3', 'ThaileagueAdminController@matchmaker3');
//Update Match Info
Route::get('/admin/allmatch/{object}/{id}', 'ThaileagueAdminController@addobjectinfo');
Route::post('/admin/activeticket', 'ThaileagueAdminController@activeticket');
Route::post('/admin/activereferee', 'ThaileagueAdminController@activereferee');
Route::post('/admin/activebroadcast', 'ThaileagueAdminController@activebroadcast');
Route::post('/admin/matchupdate', 'ThaileagueAdminController@updatematchinfo');
Route::get('/admin/lineupmake/{team}/{id}', 'ThaileagueAdminController@lineupmaker');
Route::post('/admin/activelineup', 'ThaileagueAdminController@lineupactive');
Route::post('/admin/activebench', 'ThaileagueAdminController@benchactive');
Route::post('/admin/activeconfermlineup', 'ThaileagueAdminController@lineupconferm');