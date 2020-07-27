<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome', ["greeting" => "Hello"]);
});

Route::get("/test", function () {
  config(["app.timezone" => "America/Chicago"]);
  $value = config("app.timezone");
  return "Timezone is $value";
});

// Route::get('/app', function () {
//     return view("child", ["name" => "Takuya"]);
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
