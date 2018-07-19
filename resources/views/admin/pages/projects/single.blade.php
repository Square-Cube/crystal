@extends('admin.layouts.master')
@section('title')
    {{$singleProject->name}}
@endsection
@section('models')
    <div class="modal fade" id="delete-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content text-center" action="{{route('admin.projects.detach' ,['id' => $singleProject->id])}}" method="Get">
                {!! csrf_field() !!}

                <input type="hidden" name="user_id" id="DetachUserId">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">do you want to delete project ?</h5>
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" class="custom-btn red-bc ">delete</button>
                    <button type="submit" class="custom-btn green-bc" data-dismiss="modal">close</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="delete-proj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content text-center" >

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">do you want to delete project ?</h5>
                </div>
                <div class="modal-footer text-center">
                    <a type="button" class="custom-btn red-bc modalDLTBTN">delete</a>
                    <a type="button" class="custom-btn green-bc" data-dismiss="modal">close</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="widget">
            <div class="widget-title">{{$singleProject->name}}</div>
            <div class="widget-content only-project">
                <div class="col-md-12">
                    <div class="title">
                        {{$singleProject->name}}
                        <div class="action">
                            <a href="{{route('admin.projects.edit',['id' => $singleProject->id])}}" class="custom-btn">edit</a>
                            <button data-toggle="modal" data-url="{{route('admin.projects.delete',['id' => $singleProject->id])}}" data-target="#delete-proj" class="red-bc custom-btn deleteBTN">delete</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="details">
                        <div class="det-img">
                            <img src="{{asset('storage/uploads/projects/'.$singleProject->logo)}}">
                        </div>
                        <div class="info">
                            <span>about : </span>
                            {{$singleProject->about}}
                        </div>
                        <div class="info">
                            <span>address : </span>
                            {{$singleProject->address}}
                        </div>
                        <div class="info">
                            <span>Promoters : <i>[ {{$singleProject->users->count()}} employees ]</i></span>
                            @foreach($singleProject->users as $user)
                                <li class="employ-item inline-employ">
                                    <img src="{{asset('storage/uploads/users/'.$user->image)}}">
                                    <a href="{{route('admin.users.details' ,['singleProduct' => $singleProject->id ,'user' => $user->id])}}"> {{$user->username}}</a>
                                    <div class="action-btns">
                                        <a href="{{route('admin.notifications',['id' => $user->id])}}" class="custom-btn">
                                            <i class="fa fa-envelope"></i>
                                        </a>
                                        <button data-id="{{$user->id}}" data-toggle="modal" data-target="#delete-user" class="red-bc custom-btn detachUser">
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
                        <input type="hidden" value="{{$singleProject->address}}" id="Location" class="geocomplete"  ><br>
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