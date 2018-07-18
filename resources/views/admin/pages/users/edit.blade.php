@extends('admin.layouts.master')
@section('title')
    Edit users
@endsection
@section('content')
    <div class="content">
        <div class="widget">
            <div class="widget-title">edit user</div>
            <div class="widget-content">
                <form class="add-user" action="{{route('admin.users.edit',['id' => $user->id])}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="alert alert-success hidden SuccessMessage" id=""></div>
                    <div class="alert alert-danger hidden ErrorMessage" id=""></div>

                    <div class="col-sm-6 form-group">
                        <label>user name</label>
                        <input class="form-control" value="{{$user->username}}" name="username" type="text">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>user phone number</label>
                        <input class="form-control" value="{{$user->phone}}" name="phone" type="text">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>user address</label>
                        <input class="form-control" value="{{$user->address}}" name="address" type="text">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>user age</label>
                        <input class="form-control" value="{{$user->age}}" name="age" type="text">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>user type : </label>
                        <select class="form-control" name="type">
                            <option value="admin" @if($user->type == 'admin'){{'selected'}}@endif>admin</option>
                            <option value="promoter" @if($user->type == 'promoter'){{'selected'}}@endif>promoters</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>user Gender : </label>
                        <select class="form-control" name="gender">
                            <option value="male" @if($user->gender == 'male'){{'selected'}}@endif>male</option>
                            <option value="female" @if($user->gender == 'female'){{'selected'}}@endif>female</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>user Email address : </label>
                        <input class="form-control" type="email" value="{{$user->email}}" name="email">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>user password : </label>
                        <input class="form-control" type="password" name="password">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>user photo</label>
                        <input type="file" name="image">
                    </div>
                    <div class="col-sm-12 form-group">
                        <button class="custom-btn submitBTN">save change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection