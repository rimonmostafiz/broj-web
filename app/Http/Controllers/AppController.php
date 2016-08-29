<?php

namespace App\Http\Controllers;

use App\Contest;
use App\Problem;
use App\Submission;
use App\User;
use Illuminate\Contracts\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use MongoDB\BSON\UTCDatetime;
use PhpParser\Node\Scalar\String_;

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

    public function viewProblem(Contest $contest, Problem $problem)
    {
        return view('app.problem-display', compact('contest', 'problem'));
    }

    public function submitProblem(Request $request, Contest $contest, Problem $problem)
    {
        if ($request->hasFile('source')) {
            $file = $request->file('source');
            $language = $request['language'];
            $data = file_get_contents($request->file('source')->getRealPath());
            //dd($file, $language, $data);
            //$file->move('uploads', 'A.cpp');

            /*$res = exec('g++ uploads/A.cpp -o uploads/A');
            echo $res;*/
            /*$string = $file->getFilename();
            $size = $file->getSize();
            $mime = $file->getClientMimeType();
            $type = $file->getClientOriginalExtension();
            $name = $file->getExtension();
            $time = $file->getCTime();
            $time += 3600 * 6;
            $type += $file->getType();
            dd($string, $size, $mime, $type, $name, $time, $type, $language);*/

            $submission = new Submission();
            $submission->user_id = 1;
            $submission->problem_id = $problem->problem_id;
            $submission->contest_id = $contest->contest_id;
            $submission->language = $language;
            $submission->source_code = $data;
            $submission->save();

            return back();
        }
    }
}
