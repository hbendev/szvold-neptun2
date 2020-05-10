<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

Auth::routes();

Route::post('/logout', function(){
    Auth::logout();
    return Redirect::to('/');
 })->name('logout');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

Route::get('/enroll', function () {
    return view('enroll');
})->middleware('auth')->name('enroll');

Route::get('/subjects/create', function () {
    return view('announce');
})->middleware('auth');
Route::post('subjects/create', 'Subjects@announce')->name('announce');

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

Route::get('/api/users', 'Users@getUsers');
Route::get('/api/studentCount', 'Users@getStudentCount');
Route::get('/api/teacherCount', 'Users@getTeacherCount');
Route::get('/api/subjectsCreatedBy', 'Subjects@subjectsCreatedByTeacher');
Route::post('/api/changeSubjectPublish/{subject}', 'Subjects@changeSubjectPublish');
Route::get('/api/studentSubjects/{student}', 'Subjects@studentSubjects');
Route::get('/api/studentNotEnrolled', 'Subjects@studentNotEnrolled');
Route::post('/api/abandonSubject/{subject}', 'Users@abandonSubject');
Route::post('/api/enrollSubject/{subject}', 'Users@enrollSubject');
