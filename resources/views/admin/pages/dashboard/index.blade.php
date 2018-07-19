@extends('admin.layouts.master')
@section('content')
    @php
        $member = \App\User::where('id' , auth()->guard('admins')->user()->id)->first()
    @endphp
    <div class="content">
        <div class="widget">
            <div class="widget-title">welcome to dashboard</div>
            <div class="widget-content">
                <div class="wel-cont">
                    <div class="profile-card">
                        <img src="{{asset('storage/uploads/users/'.$member->image)}}">
                        <div class="profile-cont">
                            <ul>
                                <li><span>Your Name : </span> {{auth()->guard('admins')->user()->username}}</li>
                                @if(auth()->guard('admins')->user()->type == 'promoter')
                                    <li><span>Your Location : </span> {{$member->attendances()->latest()->value('location')}}</li>
                                @endif
                                <li><span>Date : </span> {{\Carbon\Carbon::parse($member->attendances()->latest()->value('time'))->format('d - m - Y')}}</li>
                                <li><span>Time : </span> {{\Carbon\Carbon::parse($member->attendances()->latest()->value('time'))->format('g:i A')}}</li>
                            </ul>
                            <div class="action">
                                @if(auth()->guard('admins')->user()->type == 'promoter')
                                    <a data-url="{{route('admin.breakout')}}" data-token="{!! csrf_token() !!}" class="custom-btn BreakoutBTN" style="cursor: pointer;">Break</a>
                                @endif
                                <a href="{{route('admin.logout')}}" class="custom-btn">logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection