@extends('admin.layouts.master')
@section('title')
User details
@endsection
@section('models')
    @foreach($questionnaires as $index => $questionnaire)
        <div class="modal fade" id="view-qust{{$questionnaire->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Questionnaire</h5>
                    </div>
                    <ul class="quest-cont">
                        <li>
                            Overall , How Would You Rate Crystal
                            <span>{{$questionnaire->rate}}</span>
                        </li>
                        <li>
                            Would You Recommend Crystal To A Friend
                            <span>{{$questionnaire->recommend}}</span>
                        </li>
                        <li>
                            Where Did You First Learn About Crystal
                            <span>{{$questionnaire->learn}}</span>
                        </li>
                    </ul>
                    <div class="modal-footer text-center">
                        <button type="button" class="custom-btn green-bc" data-dismiss="modal">close</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
@section('content')
    <div class="content">
        <div class="widget">
            <div class="widget-title">user survay</div>
            <div class="widget-content only-user">
                <div class="col-sm-12">
                    <div class="user-inner-head">
                        <div class="user-inner-img">
                            <img src="{{asset('storage/uploads/users/'.$user->image)}}">
                        </div>
                        <div class="info"> user name : <span> {{$user->username}} </span></div>
                        <div class="info"> user type : <span> {{$user->type}} </span></div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">Interaction</a></li>
                        <li><a href="#tab2" data-toggle="tab">Questionnaire</a></li>
                        <li><a href="#tab3" data-toggle="tab">products</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>number</th>
                                            <th>comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($interactions as $index => $interaction)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$interaction->name}}</td>
                                            <td>{{$interaction->email}}</td>
                                            <td>{{$interaction->number}}</td>
                                            <td>
                                                {{$interaction->comment}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade in" id="tab2">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>number</th>
                                        <th>email</th>
                                        <th>Questionnaire</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($questionnaires as $index => $questionnaire)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{$questionnaire->name}}</td>
                                                <td>{{$questionnaire->phone}}</td>
                                                <td>{{$questionnaire->email}}</td>
                                                <td>
                                                    <button data-toggle="modal" data-target="#view-qust{{$questionnaire->id}}" class="custom-btn">view</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade in" id="tab3">
                            <div class="user-surv-prod">
                                @foreach($products as $product)
                                    <div class="col-sm-4">
                                        <div class="prod-item">
                                            <img src="{{asset('storage/uploads/products/'.$product->image)}}">
                                            <div class="prod-count">product number <span>{{$product->number}}</span></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection