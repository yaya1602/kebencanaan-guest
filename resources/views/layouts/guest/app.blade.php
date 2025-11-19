<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kebencanaan dan Tanggap Darurat</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- star css -->
    @include('layouts.guest.css')
    <!-- end css -->
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar Start -->
        @include('layouts.guest.navbar')
        <!-- Navbar End -->

        <!-- main content -->
        @yield('content')
        <!-- main content -->

        <!-- Footer Start -->
       @include('layouts.guest.footer')
        <!-- Footer End -->

    </div>

   @include('layouts.guest.js')
</body>

</html>
