@extends('admin.layouts.master')
@section('title')
    notifications
@endsection
@section('content')
    <div class="content">
        <div class="widget">
            <div class="widget-title">notifactions</div>
            <div class="widget-content">
                <ul class="inner-noty">
                    @foreach($notifications as $notification)
                        <li class="notfy-item">
                            {{$notification->message}}
                            <div class="notfy-time">
                                <i class="fas fa-clock"></i>
                                {{$notification->created_at->diffForHumans()}}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection