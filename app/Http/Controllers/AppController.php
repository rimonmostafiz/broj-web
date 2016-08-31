<?php

namespace App\Http\Controllers;

use App\Classes\Container;
use App\Contest;
use App\Problem;
use App\Submission;
use App\User;
use App\Verdict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Auth;
use Illuminate\Support\Facades\DB;

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

            //script($request, $contest, $problem);

            $user = Auth::user();

            $submission = new Submission();
            $submission->user_id = $user->user_id;
            $submission->problem_id = $problem->problem_id;
            $submission->contest_id = $contest->contest_id;
            $submission->language = $language;
            $submission->source_code = $data;
            $submission->save();

            return back();
        }
    }

    public function showSubmissions() {

        $listOfContainer = array();
        $submissions = Submission::all();
        $submissions = $submissions->reverse();


        foreach ($submissions as $submission) {

            $user = User::find($submission->user_id);
            $contest = Contest::find($submission->contest_id);
            $problem = Problem::find($submission->problem_id);
            /*$verdict = Verdict::where('submission_id', '=', $submission->submission_id)->get();
            dump($verdict);*/
            $verdict_collection = Verdict::where('submission_id', $submission->submission_id)->get();
            $verdict = null;
            if(count($verdict_collection) > 0) $verdict = $verdict_collection[0];
            $container = new Container($user, $contest, $problem, $submission, $verdict);
            array_push($listOfContainer, $container);
        }
        return view('app.submission-display', compact('listOfContainer'));
    }

    public function scriptSubmission(Request $request, Contest $contest, Problem $problem) {
        for($i = 0; $i < 9; $i++)
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

            $user = Auth::user();
            $submission = new Submission();
            $submission->user_id = $user->user_id;
            $submission->problem_id = $problem->problem_id;
            $submission->contest_id = $contest->contest_id;
            $submission->language = $language;
            $submission->source_code = $data;
            $submission->save();

            return back();
        }
    }
}
