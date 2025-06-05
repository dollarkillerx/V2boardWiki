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
    return view('homepage');
});

Route::get("/detail",function() {
    return view("posts.detail");
});

Route::get('/string', function () {
    return "string";
});

Route::get('/json', function () {
    return [
        'name' => 'John Doe',
        'age' => 30,];
});

Route::get('/laravel', function () {
    return redirect("https://laravel.com");
});

Route::get('/user/{id}', function ($id) {
    return view("testview", ['id' => $id]);
});

Route::get('/user', function () {
    $id = request('id');
    return view("testview", ['id' => $id]);
});

Route::get('/controller/test/{id}', [
    App\Http\Controllers\UserController::class, 'show']);

Route::get('/controller/test2/{id}', [
    App\Http\Controllers\UserController::class, 'showPosts']);


