<?php

namespace App\Http\Controllers;

use App\Contest;
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
}
