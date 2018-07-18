@extends('admin.layouts.master')
@section('title')
    {{$project->name}}
@endsection
@section('models')
    <div class="modal fade" id="delete-proj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">do you want to delete project ?</h5>
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
    <div class="content">
        <div class="widget">
            <div class="widget-title">{{$project->name}}</div>
            <div class="widget-content only-project">
                <div class="col-md-12">
                    <div class="title">
                        {{$project->name}}
                        <div class="action">
                            <a href="{{route('admin.projects.edit',['id' => $project->id])}}" class="custom-btn">edit</a>
                            <button data-toggle="modal" data-url="{{route('admin.projects.delete',['id' => $project->id])}}" data-target="#delete-proj" class="red-bc custom-btn deleteBTN">delete</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="details">
                        <div class="det-img">
                            <img src="{{asset('storage/uploads/projects/'.$project->logo)}}">
                        </div>
                        <div class="info">
                            <span>about : </span>
                            {{$project->about}}
                        </div>
                        <div class="info">
                            <span>address : </span>
                            {{$project->address}}
                        </div>
                        <div class="info">
                            <span>Promoters : <i>[ {{$project->users->count()}} employees ]</i></span>
                            @foreach($project->users as $user)
                                <li class="employ-item inline-employ">
                                    <img src="{{asset('storage/uploads/users/'.$user->image)}}">
                                    <a href="user-survay.html"> {{$user->username}}</a>
                                    <div class="action-btns">
                                        <a href="send_notifications.html" class="custom-btn">
                                            <i class="fa fa-envelope"></i>
                                        </a>
                                        <button  data-toggle="modal" data-target="#delete-user" class="red-bc custom-btn">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </li>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-map">
                        <input type="hidden" value="{{$project->address}}" id="Location" class="geocomplete"  ><br>
                        <div class="map_canvas"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAABrilV0K0SLv21ZVMv8Inz5YMI4YAKbI&amp;libraries=places"></script>
    <script src="{{asset('assets/admin/js/jquery.geocomplete.min.js')}}"></script>

    <script>
        $(function(){

            $(".geocomplete").geocomplete({
                map: ".map_canvas",
                location: $('#Location').val()
            });
        });
    </script>
@endsection