@extends('layouts.admin')

@section('content')
    @include('admin.temp.sidebar')

    <!--Problem List-->
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $contest->title." - Problem List" }}
                <span class="pull-right">
                    <a href="{{ url('/c/' . $contest->id . '/problem-add')  }}" class="btn btn-xs btn-info">Add Problem</a>
                </span>
            </div>
            <div class="">
                @foreach($contest->problems as $problem)
                    <div class="">
                        <a href="#" class="list-group-item clearfix">
                            <i class="fa fa-file fa-lg"></i>
                            {{ $problem->title }}
                            <span class="pull-right">
                        <button onclick="callRoute()" class="btn btn-xs btn-info">Edit</button>
                    </span>
                            {{--js  for onclick--}}
                            <script>
                                function callRoute() {
                                    window.location="{{URL::to('/problems/' . $problem->id . '/edit')}}";
                                }
                            </script>
                        </a>
                    </div>
                @endforeach
            </div>
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


@endsection
