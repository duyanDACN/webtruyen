<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\IndexController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------


| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index']);

Route::get('/doc-truyen/{id}', [IndexController::class, 'doctruyen']);

Route::get('/xem-truyen/{id}', [IndexController::class, 'xemtruyen']);

Route::get('/noi-dung/{id}', [IndexController::class, 'noidung']);

Route::get('/searchdanhmuc/{id}', [IndexController::class, 'searchdanhmuc']);


Route::post('/search', [IndexController::class, 'search']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('danhmuc', DanhMucController::class);

Route::resource('truyen', TruyenController::class);

Route::resource('chapter', ChapterController::class);



