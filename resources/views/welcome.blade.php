@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">Welcome</div>

          <div class="panel-body">
            <h1 class="display-3">Hello, world!</h1>
            <p style="font-size: 28px" class="lead">Welcome to BroJ, A Programming contest platform, where you can host
              online and onsite contests.</p>
            <hr class="m-y-2">
            <p>Our platform currently supports a total of 3 languages: C, C++, Java.</p>
            <hr>
            <p class="lead">
              <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
