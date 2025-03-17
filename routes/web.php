<?php

use App\Http\Controllers\PagesController;
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
// Trang chủ
Route::get('/homepage', [PagesController::class, 'getIndex']);
//loại sp
Route::get('/type/{id}', [PagesController::class, 'getType']);
//chi tiết sp
Route::get('/detail/{id}', [PagesController::class, 'getDetail']);

Route::get('/admin', [PagesController::class, 'getIndexAdmin']);
//thêm sp
Route::get('/admin-add-form', [PagesController::class, 'getAdminAdd'])->name('add-product');
Route::post('/admin-add-form', [PagesController::class, 'postAdminAdd']);
//chỉnh sửa sp
Route::get('/admin-edit-form/{id}', [PagesController::class, 'getAdminEdit']);
Route::post('/admin-edit', [PagesController::class, 'postAdminEdit']);
//xóa sp
Route::post('/admin-delete/{id}', [PagesController::class, 'postAdminDelete']);
// about, contact
Route::get('/About', [PagesController::class, 'getAbout']);
Route::get('/Contact', [PagesController::class, 'getContact']);
