<?php

use App\Http\Controllers\TodoController;
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
    return view('welcome');
});


// Route::get('/table', [TodoController::class, 'create']);
// Route::post('/table', [TodoController::class, 'create']);
Route::group(['middleware' => 'auth'], function() {
    Route::group([
        'middleware' => 'auth_info',
    ], function () {
        Route::get('/', function (\Illuminate\Http\Request  $request) {
            return view('info', ['user'=>$request->user]);
        });
    });
    Route::get('/todo',  [TodoController::class, 'index'])->name('todo');
    Route::get('/todo/{id}', [TodoController::class, 'findByID'])->where('id', '\d+');
    Route::get('/todo/create', [TodoController::class, 'create']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
