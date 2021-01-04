@section('sidebar')
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ url('dashboard') }}">
                        <span data-feather="home"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('student') }}">
                        <span data-feather="users"></span>
                        Student
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@endsection
@section('script')
    @parent
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            current_url = "{{ URL::current() }}";
            document.querySelectorAll('.nav-item a').forEach((item) => {
                url = item.getAttribute('href');
                if (current_url.includes(url)) {
                    item.classList.add('active');
                }
            });
        });

    </script>
@endsection
