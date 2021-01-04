@extends('template.template_original')
@section('content')
    <div class="container my-3">
        <div class="d-block text-center">
            <a href="{{ url('/') }}">
                <img src="{{ asset('img/kelas-industri-axioo.png') }}" alt="AXIOO LOGO" class="img-fluid">
            </a>
        </div>
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">E-Mail</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
                <div class="col">
                    <a class="text-decoration-none" href="{{ url('login') }}">doesn't have an accout? Login Here!</a>
                </div>
                <div class="col text-end">
                    <button class="btn btn-primary pull-right">Login</button>
                </div>
            </div>
        </form>
    </div>
@endsection
