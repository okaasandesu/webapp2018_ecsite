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

Route::get('/ECsite', function () {
    $items = DB::select("SELECT * FROM items");
    return view("ECsite",[
        "items" => $items
      ]);
});
