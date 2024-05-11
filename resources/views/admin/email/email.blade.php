<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png')}}" />
</head>
<body>
    <div class="container-scroller">
        @include('admin.sidebar')

        <div class="container-fluid page-body-wrapper">

            @include('admin.header')

            <div class="main-panel">
                <div class="content-wrapper" style="min-height: 100vh">
                    @if (session('success'))
                    {{ session('success') }}
                    @endif
                    {{-- body text goes here --}}
                    <h1 class="text-center">Send email to {{ $email->customer_email }}</h1>

                    <div style="width: 500px; margin:auto" class="mt-4">
                        <form action="{{ route('send_user_email', $email->id) }}">
                            <div class="mb-3">
                                <label for="">Email Greeting</label>
                                <input class="form-control"  type="text" name="greeting">
                            </div>

                            <div class="mb-3">
                                <label for="">Email Firstline</label>
                                <input class="form-control" type="text" name="firstline">
                            </div>

                            <div class="mb-3">
                                <label for="">Email Body</label>
                                <input class="form-control" type="text" name="body">
                            </div>

                            <div class="mb-3">
                                <label for="">Email Button Name</label>
                                <input class="form-control" type="text" name="button">
                            </div>

                            <div class="mb-3">
                                <label for="">Email Url</label>
                                <input class="form-control" type="text" name="url">
                            </div>

                            <div class="mb-3">
                                <label for="">Email Lastline</label>
                                <input class="form-control" type="text" name="lastline">
                            </div>

                            <div class="mb-3">
                                <button type="submit">Send Email</button>
                            </div>

                        </form>
                    </div>
                </div>

                @include('admin.footer')
