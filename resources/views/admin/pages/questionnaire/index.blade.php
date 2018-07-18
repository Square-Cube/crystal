@extends('admin.layouts.master')
@section('content')
    <div class="content">
        <div class="widget">
            <div class="widget-title">add questionnaire</div>
            <div class="widget-content">
                <form class="quest-form" action="{{route('admin.questionnaire')}}" method="post">

                    {!! csrf_field() !!}

                    <div class="alert alert-success hidden SuccessMessage" id=""></div>
                    <div class="alert alert-danger hidden ErrorMessage" id=""></div>

                    <div class="col-sm-4 quest-form-per-inf">
                        <div class="form-title">Personal Information</div>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Name" name="name">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Phone Number" name="phone">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="email" placeholder="Email Address" name="email">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>overall , how would you rate Crystal</label>
                            <div class="radio-wrap">
                                <input type="radio" name="rate" id="answ1-1" value="excellent">
                                <label for="answ1-1">
                                    <span>excellent</span>
                                </label>
                            </div>
                            <div class="radio-wrap">
                                <input type="radio" name="rate" value="good" id="answ1-2">
                                <label for="answ1-2">
                                    <span>good</span>
                                </label>
                            </div>
                            <div class="radio-wrap">
                                <input type="radio" name="rate" value="poor" id="answ1-3">
                                <label for="answ1-3">
                                    <span>poor</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>would you recommend crystal to a friend</label>
                            <div class="radio-wrap">
                                <input type="radio" name="recommend" value="yes" id="answ2-1">
                                <label for="answ2-1">
                                    <span>yes</span>
                                </label>
                            </div>
                            <div class="radio-wrap">
                                <input type="radio" name="recommend" value="no" id="answ2-2">
                                <label for="answ2-2">
                                    <span>no</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>where did you first learn about crystal</label>
                            <div class="radio-wrap">
                                <input type="radio" name="learn" value="tv" id="answ3-1">
                                <label for="answ3-1">
                                    <span>TV</span>
                                </label>
                            </div>
                            <div class="radio-wrap">
                                <input type="radio" name="learn" value="friend" id="answ3-2">
                                <label for="answ3-2">
                                    <span>Friend</span>
                                </label>
                            </div>
                            <div class="radio-wrap">
                                <input type="radio" name="learn" value="newspaper" id="answ3-3">
                                <label for="answ3-3">
                                    <span>Newspaper</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="custom-btn submitBTN" type="submit">
                                send <i class="fa fa-angle-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection