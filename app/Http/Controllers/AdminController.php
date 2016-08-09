<?php

namespace App\Http\Controllers;

use App\Contest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    public function login()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {

        $username = $request['username'];
        $password = $request['password'];

        if ($username == "admin" && $password == "admin") {
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
        $contest->title = $request['title'];
        $contest->author = $request['author'];
        $contest->save();

        return Redirect::to('/dashboard');
    }

    public function showContestList()
    {
        $contests = Contest::all();
        $contests = $contests->reverse();
        return view('admin.contest-list', compact('contests'));
    }

    public function showContest($id)
    {

        $contest = Contest::find($id);
        return view('admin.admin-contests-details', compact('contest'));
    }

    public function addProblem(Request $request, Contest $contest)
    {
        $problem = new Problem();

        $problem->title = $request['title'];
        $problem->body = $request['body'];
        $problem->contest_id = $contest;

        $contest->problems()->save($problem);

        /*return Redirect::to('/some/new/url');
        return redirect()->to('/somewhere');
        return redirect('/somewhere');*/
        return back();
    }

    //Problem $problem is full problem object for route model binding
    public function editProblem(Problem $problem)
    {
        return view('admin.problem-edit', compact('problem'));
    }

    public function updateProblem(Request $request, Problem $problem)
    {

        //TODO : validation
        $problem->update($request->all());
        return back();
    }
}
