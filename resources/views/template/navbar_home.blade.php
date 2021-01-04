@section('head')
    @parent
    <style>
        .nav-item .nav-link.active {
            border-bottom: solid 3pt;
        }

    </style>
@endsection
@section('navbar')
    <div class="navbar navbar-expand-md navbar-dark">
        <div class="container-fluid">
            <div class="d-flex">
            </div>
            <div class="d-flex">
                <a href="/" class="navbar-brand">
                    <img class="img-fluid" src="{{ asset('img/acp-logo.png') }}" alt="ACP Logo">
                </a>
            </div>
            <div class="d-flex">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                    aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/about') }}" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/contact') }}" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-flex">
            </div>
        </div>
    </div>
@show
@section('script')
    @parent
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            current_url = "{{ URL::current() }}";
            document.querySelectorAll('.nav-item a').forEach((item) => {
                url = item.getAttribute('href');
                if (current_url == url) {
                    item.classList.add('active');
                }
            });
        });

    </script>
@endsection
