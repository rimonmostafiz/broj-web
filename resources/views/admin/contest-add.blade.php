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

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">Contest Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="name" class="form-control"
                                           name="title" value="{{ old('title') }}">

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                                <label for="author" class="col-md-4 control-label">Contest Author</label>

                                <div class="col-md-6">
                                    <input id="author" type="name" class="form-control"
                                           name="author" value="{{ old('author') }}">

                                    @if ($errors->has('author'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('author') }}</strong>
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
