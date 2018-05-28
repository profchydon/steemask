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

Route::get('/faq', 'PagesController@faq');
Route::get('/terms', 'PagesController@terms');
Route::get('/privacy', 'PagesController@privacy');
Route::get('/disclaimer', 'PagesController@disclaimer');
Route::get('/ask-a-question', 'PagesController@askAQuestion');


Route::get('/', 'CoinmarketcapController@getAllCoinDetails');
Route::get('/updatecoins', 'CoinmarketcapController@updateCoins');


Route::get('/profile', 'UsersController@profile');
Route::get('/payout', 'UsersController@payout');
Route::post('/payoutcheck', 'UsersController@payoutcheck');
Route::post('/ask-a-question', 'UsersController@askAQuestion');
// Route::get('/payout?username={username}&check=ok', 'UsersController@notLoggedInPayout');

Route::get('/payout/{username}', 'UsersController@notLoggedInPayout');
Route::get('/logout', 'UsersController@logout');
Route::get('/login' , 'UsersController@login');
Route::get('/callback', 'UsersController@loginViaSteemConnect');
