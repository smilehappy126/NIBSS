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
Route::get('/','MyLoginController@welcome');
//登入驗證
Route::get('/mylogin','MyLoginController@mylogin');
//登入成功測試
// Route::get('/login/success','MyLoginController@loginauth');

//新增申請單
Route::get('/create', 'ApplicationController@index');
Route::get('/create/setphone', 'ApplicationController@set');
Route::post('/create','ApplicationController@store');
Route::post('/create/setphone','ApplicationController@setphone');
//借用狀況

Route::get('/borrow', 'BorrowController@index');
Route::post('/borrow/update/{id}','BorrowController@update');
Route::post('/borrow/userupdate','BorrowController@userupdate');

//透過名字尋找
Route::post('/borrow/search','BorrowController@search');
//已歸還資料
// Route::get('/return', function () {
//     return view('button3_return.index');
// });


//已歸還資料
Route::get('/return', 'returnController@index');
//編輯資料
Route::post('/return/update/{id}','returnController@update');
//透過名字尋找
Route::post('/return/search','returnController@search');

Route::post('/return/userupdate','returncontroller@userupdate');




//預約狀況(主畫面，請先選擇教室，可再思考畫面設計)
Route::get('/reserve', 'CourseController@index');
//預約狀況(點選教室後)
Route::get('/reserve/{roomname}', 'CourseController@show');
//(點選上下一週後)
Route::get('/reserve/{roomname}/{weekfirst}', 'CourseController@showOtherWeek');
//單筆excel
Route::post('/importExcel', 'CourseController@importExcel');


//新增課程資料
Route::post('reserve/createCourse', 'CourseController@create');
//更新課程資料
Route::post('/reserve/updateCourse/{id}','CourseController@update');
//刪除課程資料
Route::delete('reserve/deleteCourse/{id}','CourseController@destroy');


//以下尚未處理
//新增教室資料
Route::post('/newclassroom','ClassroomController@store');
Route::get('/newclassroom', 'ClassroomController@newClassroomPage');
//修改教室資料
Route::get('/editclassroom', 'ClassroomController@editClassroomPage');
Route::post('/editclassroom/{classroom}','ClassroomController@update');
//刪除教室資料
Route::delete('/editclassroom/{classroom}','ClassroomController@destroy');

//固定課程預約
Route::get('/inputClass/{roomname}', 'LongcourseController@index');
//新增多筆
Route::post('/inputClass/save', 'LongcourseController@store');
//固定課程excel
Route::post('/inputClass/importExcel', 'LongcourseController@importExcel');

// Login驗證
Auth::routes();
Route::post('/loginNow', 'Auth\LoginController@login');
Route::get('/logout', 'MyLoginController@logout');

// Admin路由區
	// 管理者頁面
	Route::get('/admin','AdminController@admin');
	//使用者清單
	Route::get('/admin/userlists','AdminController@userlists');
	Route::post('/admin/searchUser','AdminController@searchUser');
	Route::post('/admin/userlists/update/{id}','AdminController@updateUserLists');
	//歷史紀錄
	Route::post('/admin/searchall','AdminController@searchall');
	Route::post('/admin/searchall/update/{id}','AdminController@updateContentData');
	//編輯條例
	Route::get('/admin/rule','AdminController@rule');
	Route::post('/admin/rules/updatenote','AdminController@noteupdate');
	Route::post('/admin/rules/updatepersonInfo','AdminController@personInfoupdate');
	//物品清單
	Route::get('/admin/item','AdminController@item');
	Route::get('/admin/itemlists','AdminController@itemlists');

Route::get('/home', 'MyLoginController@afterlogin')->name('home');
