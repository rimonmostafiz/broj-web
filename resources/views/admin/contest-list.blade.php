@extends('layouts.admin')

@section('content')
{{--    @include('admin.temp.sidebar')--}}

    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Contest List</div>
                <div class="">
                    @foreach($contests as $contest)
                        <div>
                            <a href="{{ url('/contest-view/'.$contest->contest_id) }}" class="list-group-item">
                                <div class="pull-left">
                                    <i class="fa fa-folder fa-lg"></i>
                                </div>
                                <div class>
                                    <h4 class="list-group-item-heading">{{ $contest->contest_name }}</h4>
                                    <span class="label label-default pull-right label-success"> Running...</span>
                                    <p class="list-group-item-text"> {{ $contest->contest_author }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
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
