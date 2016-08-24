@extends('layouts.admin')

@section('content')
    @include('admin.temp.sidebar')

        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Contest</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/contest-add') }}">
                            {{ csrf_field() }}

                            <!--Contest Title-->
                            <div class="form-group{{ $errors->has('contest_name') ? ' has-error' : '' }}">
                                <label for="contest_name" class="col-md-4 control-label">Contest Title</label>

                                <div class="col-md-6">
                                    <input id="contest_name" type="name" class="form-control"
                                           name="contest_name" value="{{ old('contest_name') }}">

                                    @if ($errors->has('contest_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('contest_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!--Contest Author-->
                            <div class="form-group{{ $errors->has('contest_author') ? ' has-error' : '' }}">
                                <label for="contest_author" class="col-md-4 control-label">Contest Author</label>

                                <div class="col-md-6">
                                    <input id="contest_author" type="name" class="form-control"
                                           name="contest_author" value="{{ old('contest_author') }}">

                                    @if ($errors->has('contest_author'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('contest_author') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!--Start Time-->
                            <div class="form-group{{ $errors->has('start_time') ? ' has-error' : '' }}">
                                <label for="start_time" class="col-md-4 control-label">Start Time</label>

                                <div class="col-md-6">
                                    <input id="start_time" type="datetime" class="form-control"
                                           name="start_time" value="{{ old('start_time') }}">

                                    @if ($errors->has('start_time'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('start_time') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!--End Time-->
                            <div class="form-group{{ $errors->has('end_time') ? ' has-error' : '' }}">
                                <label for="end_time" class="col-md-4 control-label">End Time</label>

                                <div class="col-md-6">
                                    <input id="end_time" type="name" class="form-control"
                                           name="end_time" value="{{ old('end_time') }}">

                                    @if ($errors->has('end_time'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('end_time') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                                
                            <!--Duration-->
                            <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                                <label for="duration" class="col-md-4 control-label">Contest Duration</label>

                                <div class="col-md-6">
                                    <input id="duration" type="name" class="form-control"
                                           name="duration" value="{{ old('duration') }}">

                                    @if ($errors->has('duration'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('duration') }}</strong>
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
