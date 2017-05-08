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
                              <a href="{{$app->make('url')->to('/l/').'/'.$link->linkid}}">{{$app->make('url')->to('/l/').'/'.$link->linkid}}</a>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="sel1" class="col-sm-3 control-label">Identifier</label>
                            <div class="col-sm-5">
                              <p>{{$link->linkid}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sel1" class="col-sm-3 control-label">Target</label>
                            <div class="col-sm-5">
                              <a href="{{$link->target}}">{{$link->target}}</a>
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

            <div class="panel panel-default">
                <div class="panel-heading">Analytics</div>

                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Time</th>
                            <th>IP</th>
                        </tr>
                        @forelse($analytics as $analytic)
                        <tr>
                            <td>{{$analytic->id}}</td>
                            <td>{{$analytic->created_at}}</td>
                            <td>{{$analytic->ip}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>Nothing to show.</td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
