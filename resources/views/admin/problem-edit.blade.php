@extends('layouts.admin')

@section('content')
    @include('admin.temp.sidebar')

    <!--Add Problem Form-->
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Problem - {{ $problem->title }}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST"
                          action="{{ url('/c/'.$contest->id.'/p/'.$problem->id.'/problem-edit') }}">
                        {{ method_field('PATCH') }} {{-- csustom method field --}}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Problem Title</label>

                            <div class="col-md-6">
                                <input id="title" type="name" class="form-control"
                                       name="title" value="{{ $problem->title }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body" class="col-md-4 control-label">Problem Body</label>

                            <div class="col-md-6">
                                <textarea id="body" type="name" class="form-control"
                                          name="body" value="{{ $problem->title }} }}"></textarea>

                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
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
