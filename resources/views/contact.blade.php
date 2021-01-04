@extends('template.template')
@include('template.navbar_bottom')
@section('content')
    <div class="container">
        <div class="my-5 row align-items-center">
            <div class="col">
                <span class="h1 font-weight-bold text-secondary d-block">Contact Us</span>
                <form action="post">
                    <div class="my-3 row align-items-center">
                        <div class="col-2">
                            <span>Name</span>
                        </div>
                        <div class="col">
                            <input type="text" name="fullname" class="form-control" placeholder="Fullname">
                        </div>
                    </div>
                    <div class="my-3 row align-items-center">
                        <div class="col-2">
                            <span>E-Mail</span>
                        </div>
                        <div class="col">
                            <input type="email" name="email" class="form-control" placeholder="E-Mail">
                        </div>
                    </div>
                    <div class="my-3 row align-items-center">
                        <div class="col-2">
                            <span>Website</span>
                        </div>
                        <div class="col">
                            <input type="text" name="website" class="form-control" placeholder="URL">
                        </div>
                    </div>
                    <div class="my-3 row">
                        <div class="col-2">
                            <span>Message</span>
                        </div>
                        <div class="col">
                            <textarea name="message" class="form-control" style="resize: none" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <button class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col text-center">
                <img src="{{ asset('img/kelas-industri-axioo.png') }}" alt="Logo Axio" class="img-fluid">
            </div>
        </div>
    </div>

@section('navbar-bottom')
@show

@endsection
