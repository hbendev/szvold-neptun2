<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Subject;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Users extends Controller
{

    public function getUsers()
    {
        $users = User::get();

        return response()->json($users);
    }

    public function getTeacherCount()
    {
        $count = User::where("type","teacher")->count();

        return $count;
    }

    public function getStudentCount()
    {
        $count = User::where("type","student")->count();

        return $count;
    }

    public function abandonSubject($subjectId){
        Auth::check();
        $subject = Subject::find($subjectId);
        $subject->students()->detach(Auth::user()->id);
        $subject->save();

        return response()->json($subject);
    }

    public function enrollSubject($subjectId){
        Auth::check();
        $subject = Subject::find($subjectId);
        $subject->students()->attach(Auth::user()->id);
        $subject->save();

        return response()->json($subject);
    }
}
