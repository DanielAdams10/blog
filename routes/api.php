<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('home', function() {
//     return response()->json(['status' => 'OK', 'success' => true], 200 );
// })->middleware('CheckAge');

// Route::get('gender', function() {
//     return response()->json(['status' => 'OK', 'success' => true], 200 );
// })->middleware('CheckGender');

// Route::middleware('CheckAge', 'CheckGender')->group(function() {

//     Route::get('home', function() {
//         return response()->json(['status' => 'OK', 'success' => true], 200 );
//     });

//     Route::get('gender', function() {
//         return response()->json(['status' => 'OK', 'success' => true], 200 );
//     });

// });


// Route::get('about', function() {
//     return response()->json(['status' => 'OK', 'success' => true], 200 );
// })->middleware(['CheckAge', 'CheckGender']);

#check username
// Route::get('username', function() {
//     return response()->json(['status' => 'OK', 'success' => true], 200 );
// })->middleware('CheckUsername');

// #check password
// Route::get('password', function() {
//     return response()->json(['status' => 'OK', 'success' => true], 200 );
// })->middleware('CheckPassword');

// #create acc
// Route::get('createacc', function() {
//     return response()->json(['status' => 'OK', 'success' => 'Create Acc'], 200 );
// })->middleware(['CheckUsername', 'CheckPassword']);

// #route for login
// Route::post('login', function() {
//     return response()->json(['status' => 'OK', 'success' => 'Login'], 200 );
// })->middleware(['CheckUsername', 'CheckPassword']);

// #route for logout
// Route::get('logout', function() {
//     return response()->json(['status' => 'OK', 'success' => 'Logout'], 200);
// })->withoutMiddleware(['CheckUsername', 'CheckPassword']);

// #check admin role
// Route::get('admin', function() {
//     return response()->json(['status' => 'OK', 'success' => 'You can manage users\' acc'], 200);
// })->middleware('CheckRole');

// #check role
// Route::get('permit', function() {
//     return response()->json(['status' => 'OK', 'success' => 'You can manage users\' acc'], 200);
// })->middleware(['CheckUsername', 'CheckPassword', 'CheckRole']);





#group of route
// Route::prefix('products')->group(function () {
//     Route::post('create', 'API\ProductController@create');

//     Route::get('index', 'API\ProductController@index');

//     Route::put('update/{id}', 'API\ProductController@update');

//     Route::delete('delete/{id}', 'API\ProductController@delete');

//     Route::get('view/{id}', 'API\ProductController@view');
// });

// Route::apiResource('categories', 'API\CategoryController');

Route::post('test', 'HttpRequestController@test');
Route::post('download', 'HttpRequestController@download')->name('download');
Route::post('store', 'ImageController@store');

Route::post('register', 'ImageController@register');


