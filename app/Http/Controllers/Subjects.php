<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Subject;
use Illuminate\Support\Facades\Auth;

class Subjects extends Controller
{

    public function getSubjectsCreatedByTeacher()
    {
        $subjects = Subject::where('creator_id', Auth::user()->id)->get();

        return response()->json($subjects);
    }

}
