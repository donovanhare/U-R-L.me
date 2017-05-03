@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Welcome to U-R-L.me!
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Shortern URL...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                      </span>
                    </div><!-- /input-group -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
