<?php

namespace App\Http\Controllers;

use App\Contest;
use App\Problem;
use Illuminate\Http\Request;

use App\Http\Requests;

class AppController extends Controller
{
    //
    public function showContestList()
    {
        $contests = Contest::all();
        $contests = $contests->reverse();
        return view('app.contest-all', compact('contests'));
    }

    public function viewContest(Contest $contest)
    {
        return view('app.contest-display', compact('contest'));
    }

    public function viewProblem(Contest $contest, Problem $problem) {
        return view('app.problem-display', compact('contest', 'problem'));
    }

    public function submitProblem(Request $request, Contest $contest, Problem $problem) {
        if($request->hasFile('source')) {
            $file = $request->file('source');
            $file->move('uploads', $file->getClientOriginalName());
            echo 'File Uploaded';
        }
    }
}
