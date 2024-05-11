<div>

    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
        @csrf
        <input wire:model.live.debounce.500ms="search" type="text" name="search" class="form-control" placeholder="Search products">
    </form>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Product Lists
                      </h5>
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-container">
                                <table id="example" border="1" class=" datatable datatable-table">
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col">#</th> --}}
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Discount Price</th>
                                            <th scope="col">Created Time</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($product as $item)
                                            <tr>
                                                {{-- <th scope="row">{{ $item->id }}</th> --}}
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->description}}</td>
                                               <td>
                                                 @if (!empty($item->image))
                                                    <img src="{{ asset('images/products/'.$item->image) }}" style="width: 70px; height:70px" alt="">
                                                @endif
                                                </td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->category }}</td>
                                                <td>{{ $item->discount_price }}</td>
                                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <form action="{{ route('product.delete',  $item->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('edit_product', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <button type="submit" onclick=" return confirm('Are you sure you want to delete product?')" class="btn btn-danger ms-1 btn-sm">Delete</button>
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
