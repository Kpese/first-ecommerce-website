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

            <div class="main-panel"  >
                <div class="content-wrapper" style="min-height: 100vh">
@if (session('success'))
{{ session('success') }}
@endif
                    {{-- body text goes here --}}
                    <form class="row g-3" action="{{ route('add_category') }}" method="post">
                        @csrf
                      <div class="" style="display: flex; margin:100px auto; width:30%; " >
                        <input type="text" name="name" style="outline:none; text-decoration:rgb(255, 255, 255), 247); padding:5px 2px" placeholder="Write category name">
                        <button type="submit" class="btn btn-primary">Submit</button>

                      </div>
            </form>

            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Category List
                                    {{-- <a href="{{ route('admin.category.add') }}" class="btn btn-primary bx-pull-right">Add New</a> --}}
                                </h5>
                                <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                    <div class="datatable-container">
                                        <table id="example" class="table datatable datatable-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Created Time</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($category as $item)
                                                    <tr>
                                                        <th scope="row">{{ $item->id }}</th>
                                                        <td>{{ $item->category_name }}</td>
                                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                                        <td>
                                                            <form action="{{ route('category.delete',  $item->id) }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" onclick=" return confirm('Are you sure you want to delete category?')" class="btn btn-danger ms-1 btn-sm">Delete</button>
                                                            </form>
                                                           </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="100%">Record not found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- End Table with stripped rows -->

                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>
                @include('admin.footer')
