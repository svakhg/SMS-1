<?php

Route::view('/', 'home.main')->name('home.main');
//Route::get('home', 'HomeController@index')->name('user.dashboard');

//Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::prefix('student')->group(function () {
    //Login Controllers
    Route::get('login', 'Auth\StudentLoginController@login')->name('student.login');
    Route::post('login', 'Auth\StudentLoginController@authenticate')->name('student.authenticate');

    //Dashboard Controllers
    Route::get('/', 'StudentController@index')->name('student.dashboard');
});

Route::prefix('teacher')->group(function () {
    //Login Controllers
    Route::get('login', 'Auth\TeacherLoginController@login')->name('teacher.login');
    Route::post('login', 'Auth\TeacherLoginController@authenticate')->name('teacher.authenticate');

    //Dashboard Controllers
    Route::get('/', 'TeacherController@index')->name('teacher.dashboard');
    Route::get('sections', 'TeacherController@sections')->name('section.list');
    Route::get('/section/{subject_id}', 'TeacherController@section')->name('section');
    Route::get('/section/{section_id}/{username}', 'ResourceGradeController@edit');
    Route::patch('grade', 'ResourceGradeController@update')->name('edit.grade');
});

Route::prefix('admin')->group(function () {
    //Login Controllers
    Route::get('login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@authenticate')->name('admin.authenticate');

    //Dashboard Controllers
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('teachers', 'AdminController@teachers')->name('teacher.list');
    Route::get('teachers/{username}', 'ResourceTeacherController@edit');
    Route::patch('teachers', 'ResourceTeacherController@update')->name('edit.teacher');
    Route::post('teachers', 'ResourceTeacherController@store')->name('add.teacher');
    Route::delete('teachers/{username}', 'ResourceTeacherController@destroy');
});

