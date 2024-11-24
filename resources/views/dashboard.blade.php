<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Clean Blog</title>
        <link rel="icon" type="image/x-icon" href="{{asset('pages/assets/favicon.ico')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('pages/css/styles.css')}}" rel="stylesheet"/>
        @if (request()->routeIs('edit.profile'))
            <link href="{{asset('pages/css/edit.css')}}" rel="stylesheet"/>
        @endif      
        
    </head>
    <body>
        <!-- Navigation-->
       @extends('layouts.navigation')
        <!-- Page Header-->
        @yield('header')
        <!-- Main Content-->
        @yield('content')
        <!-- Footer-->
        @extends('layouts.footer')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('pages/js/scripts.js')}}"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script src="http://catdad.github.io/tiny.cdn/lib/toast/1.0.0/toast.min.js"></script>
        @session('success')
            <script>
                toast.success("{{session('success')}}");
            </script>
        @endsession
        @session('error')
            <script>
                toast.error("{{session('error')}}");
            </script>
        @endsession
    </body>
</html>
