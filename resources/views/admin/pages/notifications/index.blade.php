@extends('admin.layouts.master')
@section('title')
    notifications
@endsection
@section('content')

    @php
        $allUsers = \App\User::where('type' , 'promoter')->get();
    @endphp

    @if(request()->id)
        @php
            $user = \App\User::find(request()->id);
        @endphp
    @endif
    <div class="content">
        <div class="widget">
            <div class="widget-title">send Notifications</div>
            <div class="widget-content">
                <form class="send-notfy-form">
                    {!! csrf_field() !!}

                    <div class="alert alert-success hidden SuccessMessage" id=""></div>
                    <div class="alert alert-danger hidden ErrorMessage" id=""></div>

                    <div class="form-group">
                        <label>select user</label>
                        <select multiple  class="form-control tags" name="receiver_id[]">
                            @foreach($allUsers as $allUser)
                                <option value="{{$allUser->id}}" @if(request()->id) {{$allUser->id == $user->id ? 'selected' : ' '}}@endif >{{$allUser->username}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Messages</label>
                        <textarea class="form-control" placeholder="Messages" name="message"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="custom-btn submitBTN">
                            send <i class="fa fa-angle-right"></i>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection