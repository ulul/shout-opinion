<!DOCTYPE doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <title>Shout Opinion</title>

    </head>
    <body>
        <div class="container">
            
            @yield('header')
            <div class="page-wrapper chiller-theme toggled">
                @yield('sidebar')
                @yield('content')  
            </div>
        </div>


<script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/tinymce.min.js') }}"></script>

@yield('scripts')

</body>
</html>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
