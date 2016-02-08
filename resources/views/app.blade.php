<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Larassets</title>
    @section('styles')
        @include('includes.styles')
    @show
</head>
<body>
@section('navbar')
    @include('includes.navbar')
@show
<div style="margin-top:50px;">
    @include('includes.leftcol')
    <div class=" container centered col-lg-8">
        @yield('content')
    </div>
    @include('includes.rightcol')
</div>
@section('footer')
    @include('includes.footer')
@show
@section('scripts')
    @include('includes.scripts')
@show
</body>
</html>
