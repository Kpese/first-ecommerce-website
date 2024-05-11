<div>
    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
        @csrf
        <input wire:model.live.debounce.200ms="search" type="text" name="search" class="form-control" placeholder="Search orders">
    </form>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Product Lists
                      </h5>
                      <div class="table-responsive">
                        <table id="example" class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Customer Email</th>
                                            <th scope="col">Customer Address</th>
                                            <th scope="col">Customer Phone</th>
                                            <th scope="col">Product Image</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Payment Status</th>
                                            <th scope="col">Delivery Status</th>
                                            <th scope="col">Created Time</th>
                                            <th scope="col">Delivered</th>
                                            <th scope="col">Print PDF</th>
                                            <th scope="col">Send Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order as $item)
                                            <tr>
                                                <td class="P-2"> {{ $item->customer_name }}</td>
                                                <td>{{ $item->customer_email}}</td>
                                                <td>{{ $item->customer_address}}</td>
                                                <td>{{ $item->customer_phone}}</td>
                                               <td>
                                                 @if (!empty($item->product_image))
                                                    <img src="{{ asset('images/products/'.$item->product_image) }}" style="width: 50px; height:50px" alt="">
                                                @endif
                                                </td>
                                                <td>{{ $item->product_title}}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->quantity}}</td>
                                                <td>
                                                @if($item->delivery_status === 'Delivered')
                                                <p class="text-success">paid</p>
                                                @else
                                                    {{ $item->payment_status }}
                                                @endif
                                                </td>
                                                <td>{{ $item->delivery_status }}</td>
                                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                                 <td>
                                                    @if($item->delivery_status === 'Delivered')
                                                    <p class="text-success">delivered</p>
                                                    @else
                                                     <a href="{{ route('delivered', $item->id) }}" onclick="return confirm('Are you sure this product is delivered?')" class="btn btn-primary btn-sm">Deliver</a>
                                                    @endif
                                                    </td>
                                                <td><a href="{{ route('pdf', $item->id) }}" class="btn btn-secondary">print PDF</a></td>
                                                <td><a href="{{ route('send-email', $item->id) }}" class="btn btn-secondary">Send Email</a></td>
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

            </div>
        </div>
    </section>
</div>
