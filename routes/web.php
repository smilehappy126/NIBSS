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
Route::post('/borrow/update/{id}','BorrowController@update');
	// ID排序
	Route::get('/borrow/idasc','BorrowController@idasc');
	Route::get('/borrow/iddesc','BorrowController@iddesc');
	// Date排序
	Route::get('/borrow/dateasc','BorrowController@dateasc');
	Route::get('/borrow/datedesc','BorrowController@datedesc');
	// Class排序
	Route::get('/borrow/classasc','BorrowController@classasc');
	Route::get('/borrow/classdesc','BorrowController@classdesc');
	// Name排序
	Route::get('/borrow/nameasc','BorrowController@nameasc');
	Route::get('/borrow/namedesc','BorrowController@namedesc');
    // Item排序
    Route::get('/borrow/itemasc','BorrowController@itemasc');
	Route::get('/borrow/itemdesc','BorrowController@itemdesc');
	// Itemnnum排序
    Route::get('/borrow/itemnumasc','BorrowController@itemnumasc');
	Route::get('/borrow/itemnumdesc','BorrowController@itemnumdesc');
	// License排序
	Route::get('/borrow/licenseasc','BorrowController@licenseasc');
	Route::get('/borrow/licensedesc','BorrowController@licensedesc');
	// Classroom排序
	Route::get('/borrow/classroomasc','BorrowController@classroomasc');
	Route::get('/borrow/classroomdesc','BorrowController@classroomdesc');
	// Teacher排序
	Route::get('/borrow/teacherasc','BorrowController@teacherasc');
	Route::get('/borrow/teacherdesc','BorrowController@teacherdesc');
	// Status排序
	Route::get('/borrow/statusasc','BorrowController@statusasc');
	Route::get('/borrow/statusdesc','BorrowController@statusdesc');
	//透過名字尋找
	Route::post('/borrow/searchName','BorrowController@searchName');
//已歸還資料
// Route::get('/return', function () {
//     return view('button3_return.index');
// });

Route::get('/return', 'returnController@index');
Route::post('/return/update/{id}','returnController@update');

//預約狀況
Route::get('/reserve', 'WeekController@index');
//預約狀況的教室名稱路由
Route::post('/reserve/{classroom}', 'WeekController@classroomrefresh');
// 下一週路由
Route::post('/goWeek', 'WeekController@show');
//新增課表內的內容的下一週路由
Route::post('/goWeek2', 'WeekController@show2');
//新增教室資料
Route::post('/newclassroom','WeekController@store');
Route::get('/newclassroom', 'WeekController@newClassroomPage');
//修改教室資料
Route::post('/newclassroom/{classroom}','WeekController@update');

//新增課表內的內容
Route::get('/inputClass', 'WeekController@inputClassPage');

