<?php
@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
@endsection


<!doctype html>

<html>

<head>

       @include('includes.head')

</head>

<body>

<div class="container">

       <header class="row">

               @include('includes.header')

           </header>

       <div id="main" class="row">

                   @yield('content')

           </div>

       <footer class="row">

               @include('includes.footer')

           </footer>

</div>

</body>

</html>