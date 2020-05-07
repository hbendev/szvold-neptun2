<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'Users@getUsers');
Route::get('/studentCount', 'Users@getStudentCount');
Route::get('/teacherCount', 'Users@getTeacherCount');
