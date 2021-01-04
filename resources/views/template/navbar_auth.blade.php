@section('navbar')
    <div class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">
                <img class="img-fluid" src="{{ asset('img/acp-logo.png') }}" alt="ACP Logo">
            </a>
            <div class="d-flex" style="width: 70%">
                <form action="" method="get" class="w-100 align-baseline">
                    <input type="text" class="form-control form-control-lg bg-secondary text-white" placeholder="Search">
                </form>
            </div>
            <div class="d-flex">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ url('logout') }}" class="nav-link">Sign out</a>
                    </li>
                </ul>
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
