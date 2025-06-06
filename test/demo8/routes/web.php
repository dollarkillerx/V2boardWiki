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

Route::get('/', [
    App\Http\Controllers\BlogController::class, 'index']);

Route::get("/detail/{id}", [
    App\Http\Controllers\BlogController::class, 'detail'
]);

Route::get("/detail/{id}/edit", [
    App\Http\Controllers\BlogController::class, 'edit'
]);

Route::post("/detail/{id}/update", [
    App\Http\Controllers\BlogController::class, 'update'
]);

Route::get("/blog/create", [
    App\Http\Controllers\BlogController::class, 'create'
]);

Route::post("/blogs", [
    App\Http\Controllers\BlogController::class, 'store'
]);

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


