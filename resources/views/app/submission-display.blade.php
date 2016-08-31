@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-1">
        <div id="main">
            <div class="panel panel-default table-responsive">
                <div class="panel-heading">Submissions</div>
                <table class="table table-submissions">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Author</th>
                        <th>Problem</th>
                        <th>Time</th>
                        <th>Language</th>
                        <th>CPU</th>
                        <th>Memory</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listOfContainer as $container)
                        <tr style="">
                            <td>{{ $container->getSubmission()->submission_id }}</td>
                            <td>
                                <div title="027_Md_Pranto_Hasan" class="ellipsis">
                                    <a href="/users/prantocse123"> {{ $container->getUser()->name }} </a>
                                </div>
                            </td>
                            <td>
                                <div title="S. Perfect Square" class="ellipsis">
                                    <a href="{{ url('/c/'.$container->getContest()->contest_id.'/p/'.$container->getProblem()->problem_id) }}"> {{ $container->getProblem()->problem_name }}</a>
                                </div>
                            </td>
                            <td>
                                <span data-timer="Tue Aug 30 2016 21:12:36 GMT+0000 (UTC)" title=""
                                      data-placement="right"
                                      class="timer timer-since hover hover-tooltip"
                                      data-original-title="Aug 31 2016 3:12 AM">32 minutes ago</span></td>
                            <td>
                                @if($container->getSubmission()->language == "cpp") {{ "C++" }}

                                @elseif($container->getSubmission()->language == "c") {{ "C" }}

                                @elseif($container->getSubmission()->language == "java") {{ "Java" }}

                                @endif
                            </td>
                            <td>
                                @if($container->getVerdict() == null) {{ "..." }}

                                @else {{ $container->getVerdict()->execution_time }}

                                @endif

                            </td>
                            <td>
                                @if($container->getVerdict() == null) {{ "..." }}

                                @else {{ $container->getVerdict()->execution_memory }}

                                @endif
                            </td>
                            <td class="text-right">
                                @if($container->getVerdict() == null)
                                    <div class="label label-default"> {{ "Processing" }}</div>

                                @elseif($container->getVerdict()->result == "ACCEPTED")
                                    <div class="label label-success"> {{ "Accepted" }}</div>

                                @elseif($container->getVerdict()->result == "TIME_LIMIT_EXIT")
                                    <div class="label label-danger"> {{ "Time Limit Exceeded" }} </div>

                                @elseif($container->getVerdict()->result == "MEMORY_LIMIT_EXIT")
                                    <div class="label label-danger"> {{ "Memory Limit Exceeded" }} </div>

                                @elseif($container->getVerdict()->result == "RUN_TIME_ERROR")
                                    <div class="label label-danger"> {{ "Run Time Error" }} </div>

                                @elseif($container->getVerdict()->result == "COMPILE_ERROR")
                                    <div class="label label-danger"> {{ "Compilation Error" }} </div>

                                @endif
                            </td>
                        </tr>
                    @endforeach

                    {{--<tr style="">--}}
                    </tbody>
                </table>
                {{--<div class="panel-body text-right">20 Out Of 300</div>--}}
            </div>
            <div class="text-center">
                <ul class="pagination">
                    <li class="disabled"><a>«</a></li>
                    <li class="active"><a href="/contests/du-lab-5-16-8/submissions/all?page=1">1</a></li>
                    <li><a href="/contests/du-lab-5-16-8/submissions/all?page=2">2</a></li>
                    <li><a href="/contests/du-lab-5-16-8/submissions/all?page=3">3</a></li>
                    <li><a href="/contests/du-lab-5-16-8/submissions/all?page=4">4</a></li>
                    <li><a href="/contests/du-lab-5-16-8/submissions/all?page=5">5</a></li>
                    <li><a href="/contests/du-lab-5-16-8/submissions/all?page=2">»</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection