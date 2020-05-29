<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Task;
use Gate;
use Illuminate\Http\Request;

class Tasks extends Controller
{
    protected function create(Request $request, $subjectId)
    {

        $subject = Subject::find($subjectId);
        Gate::authorize('update-subject', $subject);

        $validated = $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:55'],
            'description' => ['required', 'max:500'],
            'points' => ['integer'],
            'from' => ['date'],
            'to' => ['date']
        ]);

        $subject = new Task;
        $subject->name = $request->name;
        $subject->description = $request->description;
        $subject->points = $request->points;
        $subject->from = $request->from;
        $subject->to = $request->to;
        $subject->subject()->associate($subjectId);
        $subject->save();

        return redirect('home'); // TODO: ehelyett tárgy részleteire vissza
    }
}
