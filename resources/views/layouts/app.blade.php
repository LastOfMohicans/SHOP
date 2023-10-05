<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <!-- MDB Links -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
    <!-- Plugin file -->
    <link rel="stylesheet" href="{{ asset('css/addons/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <!-- INCLUDE NAVBAR -->
        @include('layouts.partials.navbar')

        <main class="py-4">
            @yield('content')
        </main>
        
       <!-- INCLUDE FOOTER -->
       @include('layouts.partials.footer')
    </div>
    <!--JAVASCRIPT -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
    <!-- Plugin file -->
    <script src="{{ asset('js/addons/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
          $('#dtBasicExample').DataTable();
          $('.dataTables_length').addClass('bs-select');
        });
    </script>
    @yield('scripts')
</body>
</html>
