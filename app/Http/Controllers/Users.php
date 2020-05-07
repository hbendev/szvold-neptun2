<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;

class Users extends Controller
{

    public function getUsers()
    {
        $users = User::get();

        return json_encode($users);
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
}
