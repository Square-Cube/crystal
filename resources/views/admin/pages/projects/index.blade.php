@extends('admin.layouts.master')
@section('title')
    Projects
@endsection
@section('content')
    <div class="content">
        <div class="widget">
            <div class="widget-title">projects</div>
            <div class="widget-content">
                <a href="{{route('admin.projects.add')}}" class="custom-btn">add project</a>
                <div class="spacer-15"></div>
                @foreach($projects as $singleProject)
                    <div class="col-md-3 col-sm-6">
                        <div class="proj-item">
                            <div class="proj-item-img">
                                <img src="{{asset('storage/uploads/projects/'.$singleProject->logo)}}">
                            </div>
                            <div class="proj-item-content">
                                <a class="title" href="{{route('admin.projects.single',['id' => $singleProject->id])}}">{{$singleProject->name}}</a>
                                <p>
                                    {{str_limit($singleProject->about , 150)}}
                                </p>
                                <a href="{{route('admin.projects.single',['id' => $singleProject->id])}}" class="custom-btn">
                                    more details
                                </a>
                                <a href="{{route('admin.projects.edit',['id' => $singleProject->id])}}" class="custom-btn">
                                    edit project
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection