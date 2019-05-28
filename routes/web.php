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

Route::get('/', function () {
    return view('welcome');
});
 Route::get('/classroom/list', 'TestController@showClassroomList')->name('showClassroomList');
 //Route::get('/classroom/add', 'TestController@showAddClassroom')->name('showAddClassroom');
 Route::post('/classroom/add', 'TestController@handleAddClassroom')->name('handleAddClassroom');

 Route::get('/student/add', 'TestController@showAddStudent')->name('showAddStudent');
 Route::post('/student/add', 'TestController@handleAddStudent')->name('handleAddStudent');
 //Route::get('/student/delete/{id}', 'TestController@handleDeleteStudent')->name('handleDeleteStudent')->middleware('check');
 Route::get('/student/view/{id}', 'TestController@showStudent')->name('showStudent');
 //Route::get('/student/update/{id}', 'TestController@showUpdateStudent')->name('showUpdateStudent')->middleware('check');
 Route::post('/student/update/{id}', 'TestController@handleUpdateStudent')->name('handleUpdateStudent');




 Route::middleware(['check'])->group(function () {
  Route::get('/student/update/{id}', 'TestController@showUpdateStudent')->name('showUpdateStudent');
 Route::get('/student/delete/{id}', 'TestController@handleDeleteStudent')->name('handleDeleteStudent');
 Route::get('/classroom/add', 'TestController@showAddClassroom')->name('showAddClassroom');
 Route::get('/student/logout', 'TestController@handleStudentLogout')->name('handleStudentLogout');

});


 Route::get('/student/login', 'TestController@showStudentLogin')->name('showStudentLogin');
 Route::post('/student/login', 'TestController@handleStudentLogin')->name('handleStudentLogin');




 Route::get('/student/search', 'TestController@showStudentSearch')->name('showStudentSearch');
 Route::post('/student/search', 'TestController@handleStudentSearch')->name('handleStudentSearch');

 Route::get('/student/searchDate', 'TestController@showStudentSearchDate')->name('showStudentSearchDate');
 Route::post('/student/searchDate', 'TestController@handleStudentSearchDate')->name('handleStudentSearchDate');
