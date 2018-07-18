@extends('admin.layouts.master')
@section('title')
    All users
@endsection
@section('content')
    <div class="content">
        <div class="widget">
            <div class="widget-title">users</div>
            <div class="widget-content">
                <a href="{{route('admin.users.index')}}" class="custom-btn">add user</a>
                <div class="spacer-15"></div>
                @foreach($users as $user)
                    <div class="col-md-4 col-sm-6">
                        <li class="employ-item">
                            <img src="{{asset('storage/uploads/users/'.$user->image)}}">
                            <div class="employ-info">
                                <a class="title" href="{{route('admin.users.single',['id' => $user->id])}}">{{$user->username}}</a>
                                <div class="work-place">
                                    <i class="fa fa-map-marker"></i>
                                    {{$user->address}}
                                </div>
                                <div class="type">
                                    <i class="fa fa-user"></i>
                                    {{$user->type}}
                                </div>
                            </div>
                        </li>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection