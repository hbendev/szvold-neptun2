<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Subject;
use Gate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class Subjects extends Controller
{
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create($data)
    {
        return Subject::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'credit' => $data['credit'],
            'identifier' => $data['identifier'],
            'creator' => Auth::user()->id
        ]);
    }

    protected function announce(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'unique:subjects', 'string', 'min:3', 'max:55'],
            'description' => ['max:500'],
            'credit' => ['required', 'integer'],
            'identifier' => ['required', 'string', 'size:9', 'unique:subjects', 'regex:/IK-[A-Z][A-Z][A-Z]\d\d\d/'],
        ]);

        $subject = new Subject;
        $subject->name = $request->name;
        $subject->description = $request->description;
        $subject->credit = $request->credit;
        $subject->identifier = $request->identifier;
        $subject->creator()->associate(Auth::user()->id);
        $subject->save();

        return redirect('home');
    }

    protected function update(Request $request, $subjectId)
    {
        $subject = Subject::find($subjectId);
        Gate::authorize('update-subject', $subject);

        $validated = $request->validate([
            'name' => ['required', 'unique:subjects,name,' . $subjectId, 'string', 'min:3', 'max:55'],
            'description' => ['max:500'],
            'credit' => ['required', 'integer'],
            'identifier' => ['required', 'string', 'size:9', 'unique:subjects,identifier,' . $subjectId, 'regex:/IK-[A-Z][A-Z][A-Z]\d\d\d/'],
        ]);

        $subject->name = $request->name;
        $subject->description = $request->description;
        $subject->credit = $request->credit;
        $subject->identifier = $request->identifier;
        $subject->save();

        return redirect('home');
    }

    public function getSubject($subjectId){
        $subject = Subject::with(['students', 'creator'])->find($subjectId);

        return response()->json($subject);
    }

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
        $subjects = Subject::where('isPublished', true)->whereDoesntHave('students', function (Builder $query) {
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

    public function deleteSubject($subjectId){
        $subject = Subject::find($subjectId);

        Gate::authorize('update-subject', $subject);
        $subject->delete();
        $subject->save();

        return redirect('home');
    }
}
