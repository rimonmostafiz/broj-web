@extends('layouts.admin')

@section('content')
    {{--    @include('admin.temp.sidebar')--}}

    <!--Problem List-->
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $contest->contest_name." - Problem List" }}
                    <span class="pull-right">
                    <a href="{{ url('/c/'.$contest->contest_id.'/problem-add')  }}" class="btn btn-xs btn-info">Add Problem</a>
                </span>
                </div>
                <div class="">
                    @foreach($contest->problems as $problem)
                        <div class="">
                            <a href="{{ url('/c/'.$contest->contest_id.'/p/'.$problem->problem_id) }}"
                               class="list-group-item clearfix">
                                <i class="fa fa-file fa-lg"></i>
                                {{ $problem->problem_name }}
                            </a>
                            <span class="pull-right">
                            <button style="position: relative; top: -30px; left: -7px" id="edit-btn"
                                    onclick="editProblem({{$contest->contest_id.','.$problem->problem_id}})"
                                    class="btn btn-xs btn-info">Edit</button>
                            <button style="position: relative; top: -30px; left: -5px" id="delete-btn"
                                    onclick="deleteProblem({{$contest->contest_id.','.$problem->problem_id}})"
                                    class="btn btn-xs btn-danger">Delete</button>
                        </span>
                            {{--js  for onclick--}}
                            <script>
                                function editProblem(contest_id, problem_id) {
                                    //alert(problem_id + " " +contest_id);
                                    window.location = '/c/' + contest_id + '/p/' + problem_id + '/problem-edit';
                                }

                                function deleteProblem(contest_id, problem_id) {
                                    window.location = '/c/' + contest_id + '/p/' + problem_id + '/problem-delete';
                                }
                            </script>
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
