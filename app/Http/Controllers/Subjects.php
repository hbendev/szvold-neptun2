<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Subject;
use Gate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Subjects extends Controller
{

    public function subjectsCreatedByTeacher()
    {
        $subjects = Subject::where('creator_id', Auth::user()->id)->get();

        return response()->json($subjects);
    }

    public function studentSubjects($studentId)
    {
        $subjects = Subject::whereHas('students', function (Builder $query) use ($studentId) {
            $query->where('student_id', $studentId);
        })->with('creator')->get();

        return response()->json($subjects);
    }

    public function studentNotEnrolled()
    {
        $subjects = Subject::whereDoesntHave('students', function (Builder $query) {
            $query->where('student_id', Auth::user()->id);
        })->with('creator')->get();

        return response()->json($subjects);
    }

    public function changeSubjectPublish($subjectId){
        $subject = Subject::find($subjectId);

        Gate::authorize('update-subject', $subject);
        $subject->isPublished = !$subject->isPublished;

        $subject->save();
        return response()->json($subject);
    }
}
