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
use App\Events\Subscriber;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blog', 'BlogController@index')->name('blog');
Route::get('/subscribe', 'SubscriptionController@subscribe')->name('subscribe');
Route::post('/subscribe', 'SubscriptionController@store');
//Route::view('subscribe','subscribe');

Route::group(['middleware' => ['role:super-admin','auth']], function () {

    Route::resource('admin/permission', 'Admin\\PermissionController');
    Route::resource('admin/role', 'Admin\\RoleController');
    Route::resource('admin/user', 'Admin\\UserController');

});

Route::group(['middleware' => ['auth']], function () {
    Route::view('admin','admin.dashboard');
    Route::resource('admin/posts', 'Admin\\PostsController');
});


Route::get('/event',function(){
    event(new Subscriber("helloo dipesh"));
});




