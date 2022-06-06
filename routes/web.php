<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todoController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', [TodoController::class, 'index'] );
Route::resource('/', TodoController::class );

Route::get('edit/{id}', [TodoController::class, 'edit'] );
Route::post('update/{id}', [TodoController::class, 'update'] );
Route::get('dell/{id}', [TodoController::class, 'dell'] );
Route::get('homes', [TodoController::class, 'homes'] );



Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

