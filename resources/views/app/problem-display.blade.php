@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-md-7 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $problem->title }}
                    <span class="pull-right">
                        <p style="width: 120px" class="btn btn-xs btn-warning">Score: 100</p>
                        <p style="width: 120px" class="btn btn-xs btn-warning">CPU: 0.5s</p>
                        <p style="width: 120px" class="btn btn-xs btn-warning">Memory: 512MB</p>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="description">
                        <p>Given an undirected graph find all of its articulation points.</p>
                    </div>

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
                                6
                                <br>
                                5
                                <br>
                                1 3
                                <br>
                                1 2
                                <br>
                                0 1
                                <br>
                                3 4
                                <br>
                                2 5
                                <br>
                            </td>
                            <td class="sample-output">
                                1
                                <br>
                                2
                                <br>
                                3
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
                            {{ $contest->title }}
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
                        <form role="form" action="{{ url('/c/'.$contest->id.'/submit/'.$problem->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <select name="languageId" class="form-control">
                                    <option value="">C</option>
                                    <option value="">C++</option>
                                    <option value="">Java</option>
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
