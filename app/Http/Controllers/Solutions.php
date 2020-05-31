<?php

namespace App\Http\Controllers;

use App\Solution;
use App\Task;
use Carbon\Carbon;
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

        $path = "";
        if ($request->hasFile('file')){
            $fileName = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs(
                'solutions/' . $solution->id, $fileName
            );
            $solution->filePath = $path;
            $solution->save();
        }

        return response()->json($solution);
    }

    public function rate(Request $request, $solutionId){
        $solution = Solution::with(['task'])->find($solutionId);

        $solution->rating = $request->rating;
        $solution->review = $request->review;
        $solution->rating_time = Carbon::now();

        $solution->save();

        return redirect("/tasks/" . $solution->task->id );
    }

    public function getSolutionCount(){
        $count = DB::table('solutions')->count();

        return $count;
    }
}
