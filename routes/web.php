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
//起始頁
Route::get('/', function () {
    return view('welcome');
});
//新增申請單
Route::get('/create', function () {
    return view('button1_create.index');
});
//借用狀況
Route::get('/borrow', 'BorrowController@index');
// Route::post('/borrow/{id}','BorrowController@edit');
Route::post('/borrow/update/{id}','BorrowController@update');

//已歸還資料
Route::get('/return', function () {
    return view('button3_return.index');
});
//預約狀況
Route::get('/reserve', function () {
    return view('button4_reserve.index');
});
