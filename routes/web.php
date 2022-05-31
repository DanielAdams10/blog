<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentRegisterationController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// #view route
// Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

// #redirect route
// Route::redirect('/here', '/there');

// Route::get('/there', function () {
//     return "I am there";
// });

// #Required Route parameters
// Route::get('user/{id}', function($id) {
//     return 'User '.$id;
// });

// Route::get('posts/{post}/comments/{comment}', function($postId, $commentId) {
//     return 'For Post: '.$postId . '<br>For Comments: '.$commentId;
// });

// #optional-parameters
// Route::get('user/{name?}', function($name = null) {
//     return "Name ::". $name;
// });

// Route::get('user/{name?}', function($name = 'John') {
//     return "Name ::". $name;
// });

// #Regular Expression Constraints
// Route::get('user/{name}', function($name) {
//     return "Name ::". $name;
// });

// Route::get('user/{id}', function($id) {
//     return "ID :: ".$id;
// }) -> where ('id', '[0-9]+');

// Route::get('user/{id}/{name}', function($id,$name) {
//     return "ID :: ".$id. "<br> Name :: ".$name;
// }) -> where (['id', '[0-9]+', 'name' => '[a-z]+']);

// Route::get('user/{id}', function($id) {
//     // return "Name ::". $name;
//     return "Id :: ". $id;
// });

// Route::get('/', function () {
//     return View::make('pages.home');
// });
// Route::get('/about', function() {
//     return View::make('pages.contact');
// });

// Route::get('/contact', function() {
//     return View::make('pages.contact');
// });

// #Named Routes
// Route::get('user/profile', function() {
//     return View::make('pages.profile');
// })->name('profile')
// $url = route('profile');

// return redirect()->route('profile');

// #Implicit Binding
// Route::get('api/users/{user}', function (App\User $user) {
//     return  $user->name."<br>email:".$user->email;
//     });

// #route-group-prefixes
// Route::prefix('admin')->group(function () {
//     Route::get('leader', function () {
//         // Matches The "/admin/users" URL
//         return "test leader";
//     });

//     Route::get('user', function () {
//         // Matches The "/admin/users" URL
//         return "test user";
//     });

// });

// Route::any('/test', 'HttpRequestController@test');
// Route::any('index', 'API\ProductController@index');
// Route::get('register', 'StudentRegisterationController@register')->name('register');


// Route::get('form', 'StudentRegisterationController@register');
// Route::post('save', 'StudentRegisterationController@save')->name('save');
// Route::get('success', 'StudentRegisterationController@success')->name('success');

Route::get('tour-index' , 'TourBookingController@index');
Route::post('tour-save' , 'TourBookingController@save');
Route::get('tour-show' , 'TourBookingController@show')->name('tour-show');
