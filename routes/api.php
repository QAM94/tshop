<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['namespace' => 'API'], function () {

    /**Save POS Orders
     */
    Route::post('store-order', 'OrderController@store');
    Route::get('scrap-all', 'ScrapController@scrapAll');
    Route::get('scrap-api', 'ScrapController@scrapApi');
});
