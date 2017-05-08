@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Link Settings</div>

                <div class="panel-body">
                    <form role="form" class="form-horizontal form-groups-bordered" accept-charset="UTF-8" action="" method="POST">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="sel1" class="col-sm-3 control-label">Link</label>
                            <div class="col-sm-5">
                              <a href="{{$app->make('url')->to('/l/').'/'.$linkid}}">{{$app->make('url')->to('/l/').'/'.$linkid}}</a>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="sel1" class="col-sm-3 control-label">Identifier</label>
                            <div class="col-sm-5">
                              <p>{{$linkid}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sel1" class="col-sm-3 control-label">Target</label>
                            <div class="col-sm-5">
                              <a href="{{$target}}">{{$target}}</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sel1" class="col-sm-3 control-label">Visibility</label>
                            <div class="col-sm-5">
                              <select class="form-control" id="sel1">
                                <option>Public</option>
                                <option>Private</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-default">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
