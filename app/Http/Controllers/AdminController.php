<?php

namespace App\Http\Controllers;

use App\Contest;
use App\Problem;
use App\User;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Input;
use MongoDB\BSON\UTCDatetime;
use PhpParser\Node\Scalar\String_;


class AdminController extends Controller
{

    /*public function login()
    {
        return view('admin.login');
    }*/

    public function showAdminDashboard()
    {
        $user = Auth::user();
        if ($user->role == "ADMIN") {
            return response()->view('admin.dashboard');
        }
        return redirect()->back();
    }

    public function addContest()
    {
        return view('admin.contest-add');
    }

    public function postAddContest(Request $request)
    {
        $contest = new Contest();
        $contest->contest_name = $request['contest_name'];
        $contest->contest_author = $request['contest_author'];
        $contest->start_time = $request['start_time'];
        $contest->end_time = $request['end_time'];
        $contest->duration = $request['duration'];
        //dd($contest);

        $contest->save();

        return Redirect::to('/contest-list');
    }

    public function showContestList()
    {
        $contests = Contest::all();
        $contests = $contests->reverse();
        return view('admin.contest-list', compact('contests'));
    }

    public function viewContest(Contest $contest)
    {
        //dd($contest);
        return view('admin.contest-view', compact('contest'));
    }

    public function addProblem(Contest $contest)
    {
        //dd($contest->id);
        //$contest = Contest::find($contest_id);
        return view('admin.problem-add', compact('contest'));
    }

    public function postAddProblem(Request $request, Contest $contest)
    {
        //dd($request['problem_name']);
        $problem = new Problem();

        $problem->contest_id = $contest;
        $problem->problem_name = $request['problem_name'];
        $problem->problem_author = $request['problem_author'];
        $problem->statement = $request['statement'];
        $problem->sample_input = $request['sample_input'];
        $problem->sample_output = $request['sample_output'];
        $problem->time_limit = $request['time_limit'];
        $problem->memory_limit = $request['memory_limit'];
        $problem->score = $request['score'];
        if ($request->hasFile('judge_input')) {
            $file = $request['judge_input'];
            $judge_input = file_get_contents($request->file('judge_input')->getRealPath());
            //dd($judge_input);
            $problem->judge_input = $judge_input;
        }
        if ($request->hasFile('judge_output')) {
            $file = $request['judge_output'];
            $judge_output = file_get_contents($request->file('judge_output')->getRealPath());
            $problem->judge_output = $judge_output;
        }

        $contest->problems()->save($problem);

        /*return Redirect::to('/some/new/url');
        return redirect()->to('/somewhere');
        return redirect('/somewhere');*/
        //return back();
        return Redirect::to('/contest-view/' . $contest->contest_id)->with('contest');
    }

    //Problem $problem is full problem object for route model binding
    public function editProblem(Contest $contest, Problem $problem)
    {

        return view('admin.problem-edit', compact('contest', 'problem'));
    }

    public function updateProblem(Request $request, Contest $contest, Problem $problem)
    {

        //dd($problem->problem_id, $contest->contest_id);
        //TODO : validation
        $problem->problem_name = $request['problem_name'];
        $problem->problem_author = $request['problem_author'];
        $problem->statement = $request['statement'];
        $problem->sample_input = $request['sample_input'];
        $problem->sample_output = $request['sample_output'];
        $problem->time_limit = $request['time_limit'];
        $problem->memory_limit = $request['memory_limit'];
        $problem->score = $request['score'];

        if ($request->hasFile('judge_input')) {
            $file = $request['judge_input'];
            $judge_input = file_get_contents($request->file('judge_input')->getRealPath());
            //dd($judge_input);
            $problem->judge_input = $judge_input;
        }
        if ($request->hasFile('judge_output')) {
            $file = $request['judge_output'];
            $judge_output = file_get_contents($request->file('judge_output')->getRealPath());
            $problem->judge_output = $judge_output;
        }
        $problem->update();
        return Redirect::to('/contest-view/' . $contest->contest_id)->with('contest');
    }

    public function deleteProblem(Contest $contest, Problem $problem)
    {
        $problem->delete();
        return Redirect::to('/contest-view/' . $contest->contest_id)->with('contest');
    }


}
