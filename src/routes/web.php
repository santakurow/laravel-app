<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
  $links = \App\Link::all();  

  // return view('welcome', ["links" => $links]);
  return view("welcome")->with("links", $links)->with("greeting", "Hello");
  // return view("welcome")->withLinks($links);
});

Route::get("/submit", function() {
    return view("submit");
});

Route::post('/submit', function (Request $request) {
    $data = $request->validate([
      "title" => "required|max:255",
      "url" => "required|url|max:255",
      "description" => "required|max:255"
    ]);

    // $link = tap(new App\Link($data))->save();
    $link = new App\Link($data);
    $link->save();

    return redirect("/");
});

// Route::get("/test", function () {
//   config(["app.timezone" => "America/Chicago"]);
//   $value = config("app.timezone");
//   return "Timezone is $value";
// });

// Route::get('/app', function () {
//     return view("child", ["name" => "Takuya"]);
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
