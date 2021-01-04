@section('navbar-bottom')
    <nav class="navbar fixed-bottom navbar-light bg-light">
        <div class="container">
            <div class="d-flex">
                <span>&copy; 2019 Axioo class Program</span>
            </div>
            <div class="d-flex">
                <a href="" class="to-top">Back to Top</a>
            </div>
        </div>
    </nav>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelector('.to-top').addEventListener('click', () => {
                document.body.scrollTop
            });
        });

    </script>

@endsection
