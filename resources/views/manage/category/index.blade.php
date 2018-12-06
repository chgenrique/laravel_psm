@extends('layouts.app')

<link href="{{ asset('css/category/style.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <nav class="navbar navbar-inverse">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="{{ URL::to('manage/category') }}">View All Categories</a>
                            </div>
                            <ul class="nav navbar-nav">
                                <li><a href="{{ URL::to('manage/category/create') }}">Create a Category</a>
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
                                <h1>Categories</h1>
                            </div>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{ URL::to('manage/category/export') }}">Export</a></li>
                            </ul>
                        </nav>
                        <!-- will be used to show any messages -->
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Category</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <!-- we will also add show, edit, and delete buttons -->
                                    <td>

                                        <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                        <!-- we will add this later since its a little more complicated than the other two buttons -->

                                        <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                        <a class="btn btn-small btn-success"
                                           href="{{ URL::to('manage/category/' . $value->id) }}">Show</a>

                                        <!-- edit this object (uses the edit method found at GET /category/{id}/edit -->
                                        <a class="btn btn-small btn-info"
                                           href="{{ URL::to('category/' . $value->id . '/edit') }}">Edit</a>

                                        <!-- delete -->
                                        <div class="button-inline">
                                            <form class="form-inline action-delete" action="{{ URL::to('manage/category/' . $value->id) }}" method="post">
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