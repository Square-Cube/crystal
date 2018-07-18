@extends('admin.layouts.master')
@section('title')
    Add users
@endsection
@section('content')
    <div class="content">
        <div class="widget">
            <div class="widget-title">add user</div>
            <div class="widget-content">
                <form class="add-user" action="{{route('admin.users.add')}}" method="post" enctype="multipart/form-data">

                    {!! csrf_field() !!}

                    <div class="alert alert-success hidden SuccessMessage" id=""></div>
                    <div class="alert alert-danger hidden ErrorMessage" id=""></div>

                    <div class="col-sm-6 form-group">
                        <label>user name</label>
                        <input class="form-control" type="text" name="username">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>user phone number</label>
                        <input class="form-control" type="text" name="phone">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>user address</label>
                        <input class="form-control" type="text" name="address">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>user age</label>
                        <input class="form-control" type="number" name="age">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>user type : </label>
                        <select class="form-control" name="type">
                            <option value="admin">admin</option>
                            <option value="promoter">promoters</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>user Gender : </label>
                        <select class="form-control" name="gender">
                            <option value="male">male</option>
                            <option value="female">female</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>user Email address : </label>
                        <input class="form-control" type="email" name="email">
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
                        <button class="custom-btn submitBTN">add user</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection