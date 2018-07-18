@extends('admin.layouts.master')
@section('title')
    Add project
@endsection
@section('content')
    <div class="content">
        <div class="widget">
            <div class="widget-title">add project</div>
            <div class="widget-content">
                <form class="add-user" action="{{route('admin.projects.add')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="alert alert-success hidden SuccessMessage" id=""></div>
                    <div class="alert alert-danger hidden ErrorMessage" id=""></div>

                    <input type="hidden" name="lng">
                    <input type="hidden" name="lat">

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>project name</label>
                            <input class="form-control" placeholder="" name="project_name" type="text">
                        </div>
                        <div class="form-group">
                            <label>address : </label>
                            <input class="form-control" type="text" id="geocomplete" placeholder="" name="address">
                        </div>
                        <div class="form-group">
                            <label>promoters : </label>
                            <select multiple class="tags form-control" name="promoters[]">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->username}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>about : </label>
                            <textarea class="form-control" placeholder="" name="about"></textarea>
                        </div>
                        <div class="form-group">
                            <label>project start date</label>
                            <div class="input-group date form_date" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                <input class="form-control" size="16" name="start_date" type="text" value="" >
                                <span class="input-group-addon">
                                    <span class="fa fa-"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>project end date : </label>
                            <div class="input-group date form_date" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                <input class="form-control" size="16" name="end_date" type="text" value="" >
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>project logo</label>
                            <input type="file" name="logo">
                        </div>
                        <div class="form-group">
                            <label>project locations</label>
                            <div class="map_canvas"></div>
                            {{--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110502.60389534228!2d31.188423481470984!3d30.059618470453355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2sCairo%2C+Cairo+Governorate!5e0!3m2!1sen!2seg!4v1531323280359" width="100%" height="340" frameborder="0" style="border:0" allowfullscreen></iframe>--}}
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <button class="custom-btn submitBTN">add project</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAABrilV0K0SLv21ZVMv8Inz5YMI4YAKbI&amp;libraries=places"></script>
    <script src="{{asset('assets/admin/js/jquery.geocomplete.min.js')}}"></script>

    <script>
        $("#geocomplete").geocomplete({
            map: ".map_canvas",
            details: "form ",
            markerOptions: {
                draggable: true
            }
        });
        $("#geocomplete").bind("geocode:dragged", function(event, latLng){
            $("input[name=lat]").val(latLng.lat());
            $("input[name=lng]").val(latLng.lng());
        });
    </script>
@endsection