<?php

use App\Subject;
use App\Task;
use App\Solution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/subjects/{subject}', function ($subject) {
    return view('subject')->with('subject', $subject);
})->middleware('auth');

Route::get('/subjects/{subjectId}/edit', function ($subjectId) {
    $subject = Subject::findOrFail($subjectId);
    Gate::authorize('update-subject', $subject);

    return view('subjectedit')->with('subject', $subject);
})->middleware('auth');
Route::post('/subjects/{subjectId}/edit', 'Subjects@update')->name('update-subject');

Route::get('/tasks/{taskId}/edit', function ($taskid) {
    $task = Task::with(['subject', 'subject.creator', 'solutions', 'solutions.student'])->findOrFail($taskid);
    Gate::authorize('update-task', $task);

    return view('taskedit')->with('task', $task);
})->middleware('auth');
Route::post('/tasks/{taskId}/edit', 'Tasks@update')->name('update-task');

Route::get('/subjects/{subjectid}/task/create', function ($id) {
    return view('taskcreate')->with('id', $id);
})->middleware('auth');
Route::post('/subjects/{subjectid}/task/create', 'Tasks@create')->name('taskCreate');

Route::get('/tasks/{taskId}', function ($task) {
    return view('task')->with('task', $task);
})->middleware('auth');


Route::get('/solutions/{solutionId}/rate', function ($id) {
    $solution = Solution::with(['task'])->find($id);

    return view('rate')->with('solution', $solution);
})->middleware('auth');
Route::post('/solutions/{solutionId}/rate', 'Solutions@rate' )->middleware('auth')->name('rate-solution');


Route::get('/solutions/{solutionId}/file', function ($id) {
    $solution = Solution::findOrFail($id);

    return Storage::download($solution->filePath);
})->middleware('auth');


Route::get('/tasksGrouped', 'Tasks@tasksBySubjects');

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

Route::get('/api/users', 'Users@getUsers');
Route::get('/api/studentCount', 'Users@getStudentCount');
Route::get('/api/teacherCount', 'Users@getTeacherCount');
Route::get('/api/taskCount', 'Tasks@getTaskCount');
Route::get('/api/solutionCount', 'Solutions@getSolutionCount');
Route::get('/api/subjectsCreatedBy', 'Subjects@subjectsCreatedByTeacher');
Route::post('/api/changeSubjectPublish/{subject}', 'Subjects@changeSubjectPublish');
Route::get('/api/studentSubjects/{student}', 'Subjects@studentSubjects');
Route::get('/api/studentNotEnrolled', 'Subjects@studentNotEnrolled');
Route::post('/api/abandonSubject/{subject}', 'Users@abandonSubject');
Route::post('/api/enrollSubject/{subject}', 'Users@enrollSubject');
Route::get('/api/subjects/{subject}', 'Subjects@getSubject');
Route::post('/api/subjects/{subject}/delete', 'Subjects@deleteSubject');
Route::get('/api/tasks/{task}', 'Tasks@getTask');
Route::post('/api/tasks/{task}/solution', 'Solutions@create');
