@extends('layouts.admin')

@section('content')
    @include('admin.temp.sidebar')

    <!--Add Problem Form-->
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Problem - {{ $problem->probelm_name }}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                          action="{{ url('/c/'.$contest->contest_id.'/p/'.$problem->problem_id.'/problem-edit') }}">
                        {{ method_field('PUT') }} {{-- csustom method field --}}
                        {{ csrf_field() }}

                        <!-- Problem Name -->
                        <div class="form-group{{ $errors->has('problem_name') ? ' has-error' : '' }}">
                            <label for="problem_name" class="col-md-4 control-label">Problem Title</label>

                            <div class="col-md-6">
                                <input id="problem_name" type="text" class="form-control"
                                       name="problem_name" value="{{ $problem->problem_name }}">

                                @if ($errors->has('problem_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('problem_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Problem Author -->
                        <div class="form-group{{ $errors->has('problem_author') ? ' has-error' : '' }}">
                            <label for="problem_author" class="col-md-4 control-label">Problem Author</label>

                            <div class="col-md-6">
                                <input id="problem_author" type="name" class="form-control"
                                       name="problem_author" value="{{ $problem->problem_author }}">

                                @if ($errors->has('problem_author'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('problem_author') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Problem Statement -->
                        <div class="form-group{{ $errors->has('statement') ? ' has-error' : '' }}">
                            <label for="statement" class="col-md-4 control-label">Statement</label>

                            <div class="col-md-6">
                                <textarea rows="10" cols="80" id="statement" type="text" class="form-control"
                                          name="statement">{{ $problem->statement }}</textarea>

                                @if ($errors->has('statement'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('statement') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Sample Input -->
                        <div class="form-group{{ $errors->has('sample_input') ? ' has-error' : '' }}">
                            <label for="sample_input" class="col-md-4 control-label">Sample Input</label>

                            <div class="col-md-6">
                                <textarea id="sample_input" type="text" class="form-control"
                                          name="sample_input">{{ $problem->sample_input }}</textarea>

                                @if ($errors->has('sample_input'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sample_input') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Sample Output -->
                        <div class="form-group{{ $errors->has('sample_output') ? ' has-error' : '' }}">
                            <label for="sample_output" class="col-md-4 control-label">Sample Output</label>

                            <div class="col-md-6">
                                <textarea id="sample_output" type="text" class="form-control"
                                          name="sample_output">{{ $problem->sample_output }}</textarea>

                                @if ($errors->has('sample_output'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sample_output') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Time Limit -->
                        <div class="form-group{{ $errors->has('time_limit') ? ' has-error' : '' }}">
                            <label for="time_limit" class="col-md-4 control-label">Time Limit (sec)</label>

                            <div class="col-md-6">
                                <input id="time_limit" type="text" class="form-control"
                                       name="time_limit" value="{{ $problem->time_limit }}">

                                @if ($errors->has('time_limit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('time_limit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Memory Limit -->
                        <div class="form-group{{ $errors->has('memory_limit') ? ' has-error' : '' }}">
                            <label for="memory_limit" class="col-md-4 control-label">Memory Limit (bytes)</label>

                            <div class="col-md-6">
                                <input id="memory_limit" type="text" class="form-control"
                                       name="memory_limit" value="{{ $problem->memory_limit }}">

                                @if ($errors->has('memory_limit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('memory_limit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Score -->
                        <div class="form-group{{ $errors->has('score') ? ' has-error' : '' }}">
                            <label for="score" class="col-md-4 control-label">Score/Point</label>

                            <div class="col-md-6">
                                <input id="score" type="text" class="form-control"
                                       name="score" value="{{ $problem->score }}">

                                @if ($errors->has('score'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('score') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Judge Input -->
                        <div class="form-group{{ $errors->has('judge_input') ? ' has-error' : '' }}">
                            <label for="judge_input" class="col-md-4 control-label">Judge Input(File)</label>

                            <div class="col-md-6">
                                <input id="judge_input" type="file" class="form-control"
                                       name="judge_input" value="{{ old('judge_input') }}">

                                @if ($errors->has('judge_input'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judge_input') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Judge Output -->
                        <div class="form-group{{ $errors->has('judge_output') ? ' has-error' : '' }}">
                            <label for="judge_output" class="col-md-4 control-label">Judge Output(File)</label>

                            <div class="col-md-6">
                                <input id="judge_output" type="file" class="form-control"
                                       name="judge_output" value="{{ old('judge_output') }}">

                                @if ($errors->has('judge_output'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judge_output') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-save"></i>
                                    Submit
                                </button>
                                <button class="btn btn-danger" type="submit">
                                    <i class="fa fa-times"></i>
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
