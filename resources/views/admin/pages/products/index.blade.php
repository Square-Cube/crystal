@extends('admin.layouts.master')
@section('title')
    Products
@endsection
@section('content')
    <div class="content">
        <div class="widget">
            <div class="widget-title">products</div>
            <div class="widget-content">
                <div class="col-sm-5">
                    <form class="prod-count-form" action="{{route('admin.products')}}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="alert alert-success hidden SuccessMessage" id=""></div>
                        <div class="alert alert-danger hidden ErrorMessage" id=""></div>
                        <div class="form-group">
                            <label>please put the number of products</label>
                            <input class="form-control" type="number" placeholder="Number of item" name="number">
                            <input type="hidden" name="image" id="Image">
                        </div>
                        <div class="form-group">
                            <button class="custom-btn submitBTN" type="submit">
                                update
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-7 text-center">
                    <div class="photo-wrap">
                        <div class="cam-wrap">
                            <video class="camera-bord" id="video" autoplay></video>
                        </div>
                        <canvas id="canvas" class="after_take" width="400" height="300"></canvas>

                    </div>
                    <button class="custom-btn" id="snap">
                        take a photo
                    </button>
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