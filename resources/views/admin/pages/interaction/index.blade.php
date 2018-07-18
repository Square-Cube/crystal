@extends('admin.layouts.master')
@section('content')
    <div class="content">
        <div class="widget">
            <div class="widget-title">add interaction</div>
            <div class="widget-content">
                <form class="add-inter-form" action="{{route('admin.interaction')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="alert alert-success hidden SuccessMessage" id=""></div>
                    <div class="alert alert-danger hidden ErrorMessage" id=""></div>

                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="NAME" name="name">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="PHONE NUMBER" name="number">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="EMAIL" name="email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="COMMENT" name="comment"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="custom-btn submitBTN" type="submit">
                            send <i class="fa fa-angle-right"></i>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection