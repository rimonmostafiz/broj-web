@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-md-7 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $problem->problem_name }}
                    <span class="pull-right">
                        <p style="width: 120px" class="btn btn-xs btn-warning">Score: {{$problem->score}}</p>
                        <p style="width: 120px" class="btn btn-xs btn-warning">CPU: {{$problem->time_limit}}s</p>
                        <p style="width: 120px" class="btn btn-xs btn-warning">Memory: {{$problem->memory_limit}}MB</p>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="description">
                        <?php
                            $statement = $problem->statement;
                            $statement = nl2br($statement);
                        ?>
                        {!! $statement !!}
                    </div>

                    <!--
                    <div class="specs">

                        <div class="spec">
                            <h3>Input</h3>
                            <div class="spec-body">
                                <p>
                                    First line: N ( 0&lt;N&lt;=100000), number of nodes.
                                    Second line: M ( 0&lt;N&lt;=300000), number of edges.
                                    Next M lines, each: U V (0&lt;=U, V&lt;N), defines an edge between U and V.
                                </p>
                            </div>
                        </div>

                        <div class="spec">
                            <h3>Output</h3>
                            <div class="spec-body">
                                <p>
                                    List all the articulation points in increasing order. See sample for
                                    clarification
                                </p>
                            </div>
                        </div>

                    </div>
                    -->

                    <table class="table table-sample">
                        <thead>
                        <tr>
                            <th>Input</th>
                            <th>Output</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="sample-input">
                                <?php
                                    $sample_input = $problem->sample_input;
                                    $sample_input = nl2br($sample_input);
                                ?>
                                {!! $sample_input !!}
                            </td>
                            <td class="sample-output">
                                <?php
                                    $sample_output = $problem->sample_output;
                                    $sample_output = nl2br($sample_output);
                                ?>
                                {!! $sample_output !!}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Side -->
        <div class="row">
            <div class="col-md-3">
                <div id="side-1">
                    <div class="panel panel-default panel-contest-timer">
                        <div class="panel-heading text-center">
                            {{ $contest->contest_name }}
                        </div>
                        <div class="panel-body small">
                            <div class="text-center">
                                <div class="h4">
                                <span data-timer="366684304" class="timer timer-down timer-clock timer-contest-end">
                                    {{ "Time Here" }}
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer small">
                            <div data-hidden-until=".timer-contest-end" class="hidden text-center">
                                Contest has ended.
                                <a href="#" class="btn-refresh">Refresh</a>?
                            </div>
                            <div data-visible-until=".timer-contest-end" class="visible text-center">Contest has started.</div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-3">
                <div class="panel panel-default panel-contest-timer">
                    <div class="panel-heading text-center">
                        <span> Submission </span>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{ url('/c/'.$contest->contest_id.'/submit/'.$problem->problem_id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <select name="language" class="form-control">
                                    <option value="c">C</option>
                                    <option value="cpp">C++</option>
                                    <option value="java">Java</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="file" name="source" class="form-control">
                            </div>
                            <button class="btn btn-info text-center">Submit</button>
                            <button class="btn btn-info text-center">Clear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
