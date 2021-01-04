@include('template.navbar')
@include('template.head')
@include('template.script')
<!doctype html>
<html lang="en">

<head>
    @section('head')
    @show
</head>

<body>
    @section('navbar')
    @endsection
    @section('content')

    @show
    @section('script')

    @show
</body>

</html>
