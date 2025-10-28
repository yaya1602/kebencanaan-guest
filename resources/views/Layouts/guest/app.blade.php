<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.guest.css')

    </style>
</head>
<body>
     {{--header--}}
   @include('layouts.guest.header')
   
    {{--APP--}}
    @yield('content')  
     
        {{-- footer --}}
    @include('layouts.guest.footer')

    {{--JS--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>