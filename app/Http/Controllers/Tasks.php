<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Task;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        ]);

        $task = new Task;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->points = $request->points;
        $task->from = $request->from;
        $task->to = $request->to;
        $task->subject()->associate($subjectId);
        $task->save();

        $subjectId = $task->subject->id;

        return redirect("/subjects/$subjectId");
    }

    protected function update(Request $request, $taskId)
    {
        $task = Task::with(['subject', 'subject.creator', 'solutions', 'solutions.student'])->findOrFail($taskId);
        Gate::authorize('update-task', $task);

        $validated = $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:55'],
            'description' => ['required', 'max:500'],
            'points' => ['integer'],
        ]);

        $task->name = $request->name;
        $task->description = $request->description;
        $task->points = $request->points;
        $task->from = $request->from;
        $task->to = $request->to;
        $task->save();

        $subjectId = $task->subject->id;

        return redirect("/subjects/$subjectId");
    }

    public function getTask($taskId){
        $task = Task::with(['subject', 'subject.creator', 'solutions', 'solutions.student'])->find($taskId);

        return response()->json($task);
    }

    // $feladatok=Feladat::all()->groupBy('subjectId');

    public function getTaskCount(){
        $count = DB::table('tasks')->count();

        return $count;
    }
}
