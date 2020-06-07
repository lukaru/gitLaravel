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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('todo/{id}', 'ShoppingListController@showAccepted');
Route::get('listlist/{id}', 'ShoppingListController@showOwned');
Route::get('shoppingLists', 'ShoppingListController@index');
Route::get('shoppingLists/{id}', 'ShoppingListController@showMy');
Route::get('detail/{id}', 'ShoppingListController@showDetail');
Route::get('available', 'ShoppingListController@showAvailable');
Route::get('user/{id}', 'UserController@index');
//Route::post('list', 'ShoppingListController@save');
//Route::put('signin/{id}', 'ShoppingListController@update');

/* auth */
Route::group(['middleware' => ['api', 'cors']], function(){
    Route::post('auth/login', 'Auth\ApiAuthController@login');
    Route::post('auth/register', 'Auth\ApiRegisterController@create');
});

Route::group(['middleware' => ['api', 'cors', 'auth.jwt']], function(){
    Route::post('list', 'ShoppingListController@save');
    Route::put('signin/{id}', 'ShoppingListController@update');
});