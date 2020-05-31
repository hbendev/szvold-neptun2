<?php

namespace App\Http\Controllers;

use App\Solution;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Solutions extends Controller
{
    protected function create(Request $request, $taskId)
    {
        $task = Task::find($taskId);

        $validated = $request->validate([
            'solution' => ['required', 'max:500'],
        ]);

        $solution = new Solution;
        $solution->solution = $request->solution;
        $solution->student()->associate(Auth::user()->id);
        $solution->task()->associate($taskId);
        $solution->save();

        return response()->json($solution);
    }

    public function getSolutionCount(){
        $count = DB::table('solutions')->count();

        return $count;
    }
}
