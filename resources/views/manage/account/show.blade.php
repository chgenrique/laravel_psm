@extends('layouts.app')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <nav class="navbar navbar-inverse">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="{{ URL::to('manage/account') }}">View All</a>
                            </div>
                            <div>
                                <h3>{{$action}} Category: {{$account->id}}</h3>
                            </div>
                        </nav>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div><br/>
                        @endif

                        <form method="post" action="{{url('manage/account')}}">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <label for="name">Account Name:</label>
                                    <input type="text" disabled class="form-control"
                                           value="{{ $account->register_name }}" name="name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <label for="name">Email:</label>
                                    <input type="text" disabled class="form-control"
                                           value="{{ $account->email }}" name="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <label for="name">Username:</label>
                                    <input type="text" disabled class="form-control"
                                           value="{{ $account->username }}" name="username">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <label for="name">Password:</label>
                                    <input type="text" disabled class="form-control"
                                           value="{{ $account->passwrd }}" name="passwrd">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <label for="name">URL:</label>
                                    <input type="text" disabled class="form-control"
                                           value="{{ $account->url }}" name="url">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <label for="name">Pin:</label>
                                    <input type="text" disabled class="form-control"
                                           value="{{ $account->pin }}" name="pin">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <label for="name">Description:</label>
                                    <input type="text" disabled class="form-control"
                                           value="{{ $account->description }}" name="description">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <label for="name">Category:</label>
                                    <input type="text" disabled class="form-control"
                                           value="{{ $account->psp_register_category->name }}" name="category">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <!-- edit this object (uses the edit method found at GET /category/{id}/edit -->
                                    <a class="btn btn-small btn-info"
                                       href="{{ URL::to('manage/account/' . $account->id . '/edit') }}">Edit</a>
                                    <!-- delete -->
                                    <div class="button-inline">
                                        <form class="form-inline action-delete" action="{{ URL::to('manage/account/' . $account->id) }}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection