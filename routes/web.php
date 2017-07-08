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
Route::get('/borrow', function () {
    return view('button2_borrow.index');
});
//已歸還資料
Route::get('/return', function () {
    return view('button3_return.index');
});
//預約狀況
Route::get('/reserve', 'WeekController@index');
// 下一週路由
Route::post('/goWeek', 'WeekController@show');

//新增教室資料
Route::post('/newclassroom','WeekController@store');
Route::get('/newclassroom', 'WeekController@new');
//修改教室資料
Route::post('/newclassroom','WeekController@update');

