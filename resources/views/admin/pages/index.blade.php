@extends('admin.layouts.master')
@section('title')
    Home page
@endsection
@section('content')
    <div class="page-content">
        <div id="welcome-home">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12 wel-cont">
                        <div class="logo">
                            <img src="{{asset('assets/admin/images/logo.png')}}">
                        </div>
                        <div class="mess">
                            <span>crystal</span><span> store</span><span> management</span>
                        </div>
                        <a href="{{route('admin.login')}}" class="custom-btn">
                            sign in <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection