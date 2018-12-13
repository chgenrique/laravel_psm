@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <nav class="navbar navbar-inverse">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="{{ URL::to('manage/account') }}">List</a>
                            </div>
                            <div>
                                <h3>Register New Account</h3>
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
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <label for="e_mail">Email:</label>
                                    <input type="text" class="form-control" name="e_mail">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control" name="username">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <label for="pswd">Password:</label>
                                    <input type="text" class="form-control" name="pswd">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <label for="">Categories</label>
                                    <select class="form-control input-sm" name="category" id="category">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <button type="submit" class="btn btn-success">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection