@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-7 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $contest->title." - Problem List" }}</div>
                <div class="">
                    @foreach($contest->problems as $problem)
                        <div class="">
                            <a href="{{ url('/c/'.$contest->id.'/p/'.$problem->id) }}" class="list-group-item clearfix">
                                <i class="fa fa-file-o fa-lg"></i>
                                {{ $problem->title }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!--pagination-->
            <div class="text-center">
                <nav>
                    <ul class="pagination pagination-sm">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="col-md-3">
            <div id="side">
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
    </div>

@endsection
