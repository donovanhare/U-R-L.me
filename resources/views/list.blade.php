@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Active Links</div>

                <div class="panel-body">
                    <div class="">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Target</th>
                                <th>Link ID</th>
                                <th>Action</th>
                            </tr>
                            
                            @foreach($links as $link)
                            <tr>
                                <td>{{$link->id}}</td>
                                <td>{{$link->user->first()->email}}</td>
                                <td title="{{$link->target}}">{{str_limit($link->target, 28)}}</td>
                                <td>
                                    <a href="{{$app->make('url')->to('/l/').'/'.$link->linkid}}">{{$link->linkid}}</a>
                                </td>
                                <td>
                                    <a href="{{$app->make('url')->to('/manage/').'/'.$link->linkid}}">Edit</a>, 
                                    <a href="{{$app->make('url')->to('/delete/').'/'.$link->linkid}}">Delete</a> 
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
