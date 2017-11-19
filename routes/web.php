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
Route::post('/create','ApplicationController@store');
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
// Phone排序
Route::get('/borrow/phoneasc','BorrowController@phoneasc');
Route::get('/borrow/phonedesc','BorrowController@phonedesc');
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


//已歸還資料
Route::get('/return', 'returnController@index');
//編輯資料
Route::post('/return/update/{id}','returnController@update');




//預約狀況(主畫面，請先選擇教室，可再思考畫面設計)
Route::get('/reserve', 'CourseController@index');
//預約狀況(點選教室後)
Route::get('/reserve/{roomname}', 'CourseController@show');
//(點選上下一週後)
Route::get('/reserve/{roomname}/{weekfirst}', 'CourseController@showOtherWeek');


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
Route::post('/newclassroom/{classroom}','ClassroomController@update');

//固定課程預約
Route::get('/inputClass', 'LongcourseController@index');
//新增教室內容資料
//Route::post('/inputClass', 'LongcourseController@store');

// Login驗證
Auth::routes();

Route::post('/loginNow', 'Auth\LoginController@login');
Route::get('/logout', 'MyLoginController@logout');
Route::get('/multiview','MyLoginController@switch');
// Route::post('/register','Auth\RegisterController@create');
Route::get('/home', 'MyLoginController@afterlogin')->name('home');
