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

                    <section class="section">
                        <div class="row">

                            <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Add New Category</h5>
                                        <!-- Vertical Form -->
                                        <form class="row" action="{{ route('add_product') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-12 mb-3">
                                                <label for="inputNanme4" class="form-label">Title</label>
                                                <input type="text" required class="w-100 py-1" name="title">
                                                @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea type="text" required class="w-100" name="description"></textarea>
                                                @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label class="form-label">Image</label>
                                                <input type="file" required class="w-100 py-1" name="image">
                                                @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label class="form-label">Price</label>
                                                <input type="number" required class="w-100 py-1" name="price">
                                                @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label class="form-label">Quantity</label>
                                                <input type="number" required class="w-100 py-1" name="quantity">
                                                @error('quantity')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label class="form-label">Category</label>
                                                <select name="category">
                                                    <option value="">Select Category</option>
                                                    @foreach ($category as $item)
                                                    <option value="{{ $item->category_name }}">{{ $item->category_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label class="form-label">Discount Price</label>
                                                <input type="number" class="w-100 py-1" name="discount_price">
                                                @error('discount_price')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">  Add Product</button>
                                            </div>
                                        </form><!-- Vertical Form -->

                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>

                </div>

                @include('admin.footer')
