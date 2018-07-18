@extends('admin.layouts.master')
@section('title')
    Edit project
@endsection
@section('content')
    <div class="content">
        <div class="widget">
            <div class="widget-title">projects</div>
            <div class="widget-content">
                <form class="add-user" action="{{route('admin.projects.edit',['id' => $project->id])}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="alert alert-success hidden SuccessMessage" id=""></div>
                    <div class="alert alert-danger hidden ErrorMessage" id=""></div>

                    <input type="hidden" name="lng">
                    <input type="hidden" name="lat">

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>project name</label>
                            <input class="form-control" value="{{$project->name}}" name="project_name">
                        </div>
                        <div class="form-group">
                            <label>address : </label>
                            <input class="form-control geocomplete" type="text" placeholder="address" id="Location" value="{{$project->address}}" name="address">
                        </div>
                        <div class="form-group">
                            <label>promoters : </label>
                            <select multiple class="tags form-control" name="promoters[]">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}" @if($project->users()->where('user_id' , $user->id)->exists()){{'selected'}}@endif>{{$user->username}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>about : </label>
                            <textarea class="form-control" placeholder="about" name="about">{{$project->about}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>project logo</label>
                            <input type="file" name="image">
                        </div>
                        <div class="form-group">
                            <label>project locations</label>
                            <div class="map_canvas"></div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <button class="custom-btn submitBTN">save change</button>
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
        $(".geocomplete").geocomplete({
            map: ".map_canvas",
            details: "form ",
            markerOptions: {
                draggable: true
            },
            location: $('#Location').val()
        });
        $(".geocomplete").bind("geocode:dragged", function(event, latLng){
            $("input[name=lat]").val(latLng.lat());
            $("input[name=lng]").val(latLng.lng());
        });
    </script>
@endsection