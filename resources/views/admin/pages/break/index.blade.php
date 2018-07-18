@extends('admin.layouts.master')
@section('title')
    break
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
                        <div class="break-item">
                            <h3 class='timer element'></h3>
                        </div>
                        <a data-url="{{route('admin.breakout.edit')}}" id="EndBreakBTN" data-token="{!! csrf_token() !!}" class="custom-btn" style="cursor: pointer;">end break</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        Date.prototype.addSeconds= function(h){
            this.setSeconds(this.getSeconds()+h);
            return this;
        }
        var date = new Date().addSeconds(1800) / 1000
        $('.timer').countid({
            clock: true,
            dateTime: date,
            dateTplRemaining: "Your Break Will End After <span> %H:%M:%S </span>",
            dateTplElapsed: "<span> %M:%S </span> Minute elapsed since the break complete",
            complete: function( el ){
                el.css({ 'color': '#dd1619'})
            }
        })
    </script>
@endsection