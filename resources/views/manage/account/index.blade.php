@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <nav class="navbar navbar-inverse">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="{{ URL::to('manage/account') }}">View All Accounts</a>
                            </div>
                            <ul class="nav navbar-nav">
                                <li><a href="{{ URL::to('manage/account/create') }}">Create new account</a>
                            </ul>
                        </nav>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <nav class="navbar navbar-inverse">
                            <div class="navbar-header">
                                <h1>Accounts</h1>
                            </div>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{ URL::to('manage/account/export') }}">Export</a></li>
                            </ul>
                        </nav>
                        <!-- will be used to show any messages -->
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Username</td>
                                <td>Password</td>
                                <td>URL</td>
                                <td>Pin</td>
                                <td>Description</td>
                                <td>Category</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($register as $key => $value)
                                <tr>
                                    <td>{{ $value->register_name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->username }}</td>
                                    <td>{{ $value->passwrd }}</td>
                                    <td>{{ $value->url }}</td>
                                    <td>{{ $value->pin }}</td>
                                    <td>{{ $value->description }}</td>
                                    <td>{{ $value->psp_register_category->name}}</td>

                                    <td>
                                        <!-- show the nerd (uses the show method found at GET /account/{id} -->
                                        <a class="btn btn-small btn-success"
                                           href="{{ URL::to('manage/account/' . $value->id) }}">Show</a>

                                        <!-- edit this object (uses the edit method found at GET /account/{id}/edit -->
                                        <a class="btn btn-small btn-info"
                                           href="{{ URL::to('manage/account/' . $value->id . '/edit') }}">Edit</a>

                                        <!-- delete -->
                                        <div class="button-inline">
                                            <form class="form-inline action-delete"
                                                  action="{{ URL::to('manage/account/' . $value->id) }}" method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection