<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;

class Users extends Controller
{

    public function getUsers()
    {
        $users = DB::table('users')->get();

        return json_encode($users);
    }

    public function getTeacherCount()
    {
        $count = DB::table('users')->where("type","teacher")->count();

        return $count;
    }

    public function getStudentCount()
    {
        $count = DB::table('users')->where("type","student")->count();

        return $count;
    }
}
