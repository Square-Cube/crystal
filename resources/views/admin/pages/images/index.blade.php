@extends('admin.layouts.master')
@section('title')
    take photo
@endsection
@section('content')
    <div class="page-content">
        <div id="welcome-home">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12 take_photo">
                        <div class="logo">
                            <img src="{{asset('assets/admin/images/logo-icon.png')}}">
                        </div>
                        <form class="prod-count-form" action="{{route('admin.images')}}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="alert alert-success hidden SuccessMessage" id=""></div>
                            <div class="alert alert-danger hidden ErrorMessage" id=""></div>

                            <input type="hidden" name="image" id="Image">

                            <div class="photo-wrap">
                                <div class="cam-wrap">
                                    <video class="camera-bord" id="video" autoplay></video>
                                </div>
                                <canvas id="canvas" class="after_take" width="400" height="300"></canvas>
                            </div>
                            <a class="custom-btn" id="snap">
                                take a photo <i class="fa fa-angle-right"></i>
                            </a>
                            <button class="custom-btn tog-btn submitBTN" type="submit">continue</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var video = document.getElementById('video');
        if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
                video.src = window.URL.createObjectURL(stream);
                video.play();
            });
        }
        var canvas = document.getElementById('canvas');
        var context = canvas.getContext('2d');
        var video = document.getElementById('video');
        document.getElementById("snap").addEventListener("click", function() {
            context.drawImage(video, 0, 0, 400, 300);

            var image = new Image();
            var src = canvas.toDataURL("image/png");

            $('#Image').val(src);
        });
    </script>
@endsection