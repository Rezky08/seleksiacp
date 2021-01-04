@extends('template.template_home')
@section('head')
    @parent
    <style>
        body:before {
            content: "";
            width: 100%;
            height: 100%;
            position: absolute;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("http://127.0.0.1:8000/img/Smart-School-SMK-WD.jpg");
            background-size: cover;
        }

    </style>
@endsection
@section('content')
    <div class="background">
    </div>
    <div class="position-absolute w-50" style="left: 25%;top: 35%;">
        <div class="d-block text-center text-white">
            <span class="h2">Lorem ipsum.</span>
        </div>
        <div class="d-block text-center text-white my-3">
            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, fugiat. Neque vitae ratione asperiores
                non
                hic necessitatibus illum, dolor iure cumque odit magni quidem quis ipsam ab delectus. Magni,
                iusto!</span>
        </div>
        <div class="d-block text-center">
            <a href="{{ url('/register') }}" class="btn btn-light fw-bold">Register</a>
        </div>
    </div>
@endsection
