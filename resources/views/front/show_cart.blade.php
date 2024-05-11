@include('front.header')

<section class="section container mt-5 mb-5">
    <div class="row">
        <div class="col-lg-12">

            @if (session('success'))
            {{ session('success') }}
            @endif
            <div class="card">
                <div class="card-body" style="width: 100%">
                    <h5 class="card-title">
                        Carts
                    </h5>
                    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                        <div class="datatable-container">
                            <table id="example" class="table datatable datatable-table">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">#</th> --}}
                                        <th scope="col">Product Title</th>
                                        <th scope="col">Product Quantity</th>
                                        <th scope="col">Product Image</th>
                                        <th scope="col">Product Price</th>
                                        {{-- <th scope="col">Customer Name</th> --}}
                                        {{-- <th scope="col">Customer Email</th> --}}
                                        {{-- <th scope="col">Customer Phone</th> --}}
                                        {{-- <th scope="col">Customer Address</th> --}}
                                        {{-- <th scope="col">Created Time</th> --}}
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $total = 0
                                    @endphp
                                    @forelse ($cart as $cart)
                                    <tr>
                                        {{-- <th scope="row">{{ $cart->id }}</th> --}}
                                        <td>{{ $cart->product_title }}</td>
                                        <td>{{ $cart->quantity}}</td>
                                        <td>
                                            @if (!empty($cart->product_image))
                                            <img src="{{ asset('images/products/'.$cart->product_image) }}" style="width: 40px; height:40px" alt="">
                                            @endif
                                        </td>
                                        <td> ${{ $cart->price }}</td>
                                        {{-- <td>{{ $cart->customer_name }}</td> --}}
                                        {{-- <td>{{ $cart->customer_email }}</td> --}}
                                        {{-- <td>{{ $cart->customer_phone }}</td> --}}
                                        {{-- <td>{{ $cart->customer_address }}</td> --}}
                                        {{-- <td>{{ $cart->created_at->diffForHumans() }}</td> --}}
                                        <td>
                                            <form action="{{ route('cart.delete',  $cart->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" onclick=" return confirm('Are you sure you want to delete product?')" class="btn btn-danger ms-1 btn-sm">Remove Product</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                    $total = $total + $cart->price
                                    @endphp
                                    @empty
                                    <tr>
                                        <td colspan="100%">Record not found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <h6>TOTAL PRICE: ${{ $total }}</h6>
                    </div>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>

        <div class="mt-4" style="display: flex; justify-content:center; align-items:center; flex-direction:column">
            <h4 class="text-center">Proceed to Payment</h4>
            <div class="d-flex">
                <a href="{{ route('cash_order') }}" class="btn btn-danger" style="margin-right: 10px">Cash on delivery</a>
                <a href="" class="btn btn-danger">Pay by cards</a>
            </div>
        </div>
    </div>
</section>



@include('front.footer')
