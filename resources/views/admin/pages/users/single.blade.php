@extends('admin.layouts.master')
@section('title')
    {{$user->username}}
@endsection
@section('models')
    <div class="modal fade" id="delete-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">do you want to delete user?</h5>
                </div>
                <div class="modal-footer text-center">
                    <a type="button" style="cursor: pointer;" class="custom-btn red-bc modalDLTBTN">delete</a>
                    <a type="button" style="cursor: pointer;" class="custom-btn green-bc" data-dismiss="modal">close</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('content')
    <div class="widget">
        <div class="widget-title">{{$user->username}}</div>
        <div class="widget-content only-user">
            <div class="col-sm-12">
                <div class="title">
                    <div class="action">
                        <a href="{{route('admin.users.edit' ,['id' => $user->id])}}" class="custom-btn">edit</a>
                        <button data-url="{{route('admin.users.delete',['id' => $user->id])}}" data-toggle="modal" data-target="#delete-user" class="red-bc custom-btn deleteBTN">delete</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="user-inner-head">
                    <div class="user-inner-img">
                        <img src="{{asset('storage/uploads/users/'.$user->image)}}">
                    </div>
                    <div class="info"> user name : <span> {{$user->username}} </span></div>
                    <div class="info"> user type : <span> {{$user->type}} </span></div>
                </div>
                <div class="col-sm-6"><div class="info"> User Phone Number : <span> {{$user->phone}} </span></div></div>
                <div class="col-sm-6"><div class="info"> User Address : <span> {{$user->address}} </span></div></div>
                <div class="col-sm-6"><div class="info"> User gender: <span> {{$user->gender}} </span></div></div>
                <div class="col-sm-6"><div class="info"> User Age : <span> {{$user->age}} </span></div></div>
                <div class="col-sm-6"><div class="info"> User Email Address : <span> {{$user->email}}</span></div></div>
            </div>
        </div>
    </div>
@endsection