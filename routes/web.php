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
//portal
Route::group(['middleware' => ['web']], function () {
    Route::get('/signin', 'SigninController@signin');
    Route::get('/auth/provider/callback', 'SigninController@callback');
    Route::get('/logout', 'SigninController@logout');
});
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
Route::post('/borrow/updatenote/{id})','BorrowController@updatenote');

//已歸還資料
Route::get('/return', 'returnController@index');
//編輯資料
Route::post('/return/update/{id}','returnController@update');
//透過名字尋找
Route::post('/return/search','returnController@search');

Route::post('/return/userupdate','returncontroller@userupdate');

Route::post('/return/reasonupdate','returncontroller@reasonupdate');




//教室預約狀況(主畫面，教室列表)
Route::get('/reserve', 'CourseController@index');
//教室預約狀況(點選教室後)
Route::get('/reserve/{roomname}', 'CourseController@show');
//教室預約狀況(點選上下一週後)
Route::get('/reserve/{roomname}/{weekfirst}', 'CourseController@showOtherWeek');
// //單筆excel
// Route::post('/importExcel', 'CourseController@importExcel');
// Route::get('/downloadExcel', 'CourseController@downloadExcel');


//新增課程資料
Route::post('reserve/createCourse', 'CourseController@create');
//更新課程資料
Route::post('/reserve/updateCourse/{id}','CourseController@update');
//刪除課程資料
Route::delete('reserve/deleteCourse/{id}','CourseController@destroy');


//新增教室資料
Route::get('/newclassroom', 'ClassroomController@newClassroomPage');
Route::post('/newclassroom/create', 'ClassroomController@store');

//修改教室資料
Route::get('/editclassroom', 'ClassroomController@editClassroomPage');
Route::post('/editclassroom/{id}','ClassroomController@update');
//刪除教室資料
Route::delete('/editclassroom/{classroom}','ClassroomController@destroy');

//固定課程預約
Route::get('/inputClass/{roomname}', 'LongcourseController@index');
//新增多筆
Route::post('/inputClass/save', 'LongcourseController@store');
//固定課程excel
Route::post('/inputClass/importExcel', 'LongcourseController@importExcel');
Route::get('/longdownloadExcel', 'LongcourseController@downloadExcel');

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
	Route::post('/admin/createitem','AdminController@createitem');
	Route::get('/admin/itemlists','AdminController@itemlists');
	Route::post('/admin/itemlists/update/{id}','AdminController@updateItemLists');
	Route::post('/admin/itemlists/delete/{id}','AdminController@deleteItemLists');
	//違規次數上限
	Route::post('/admin/violationupdate','AdminController@violationupdate');
	//違規紀錄
	Route::get('/admin/reasons','AdminController@reasons');
	Route::post('/admin/reasons/update/{id}','AdminController@updateReasons');
	Route::post('/admin/searchReason','AdminController@searchReason');

Route::get('/home', 'MyLoginController@afterlogin')->name('home');
