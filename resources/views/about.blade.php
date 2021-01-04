@extends('template.template')
@include('template.navbar_bottom')
@section('content')
    <div class="container">
        <div class="my-5 row align-items-center">
            <div class="col">
                <span class="h1 font-weight-bold text-secondary d-block">About Us</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum molestias nihil dolores. Ex quam pariatur
                    officia
                    repellat? Esse, maxime placeat corrupti, omnis aliquid tenetur quasi quam tempore, accusamus fugit
                    voluptates!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis fugit iste itaque aliquid aperiam
                    adipisci et
                    expedita ea magni? Officiis officia iure fugiat, amet velit id sapiente quibusdam cumque saepe?Lorem
                    ipsum dolor
                    sit amet consectetur adipisicing elit. Itaque corrupti facilis in aperiam. Consequatur, quod cum
                    veritatis vero
                    inventore asperiores autem, aliquam ex iste debitis obcaecati laboriosam. Cumque, incidunt perspiciatis.
                    Lorem
                    ipsum dolor sit amet consectetur adipisicing elit. Voluptates non modi cum provident accusantium
                    voluptatibus
                    maiores placeat? Quasi, atque voluptate labore soluta totam ex fugit mollitia facere? Eos, doloribus
                    earum.
                </p>
            </div>
            <div class="col text-center">
                <img src="{{ asset('img/kelas-industri-axioo.png') }}" alt="Logo Axio" class="img-fluid">
            </div>
        </div>
    </div>

@section('navbar-bottom')
@show

@endsection
