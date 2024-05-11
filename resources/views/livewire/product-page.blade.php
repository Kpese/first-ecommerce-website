<div>

<input wire:model.live.debounce.300ms = "search" type="text" class="form-control" placeholder="search products">

<div class="row">

    @foreach ($product as $item)
    <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="box">
            <div class="option_container">
                <div class="options">
                    <a href="{{ route('product_detail', $item->id) }}" class="option1 mb-3">
                        product details
                    </a>

                    <form action="{{ route('add_cart', $item->id) }}" method="post">
                        @csrf

                        <div class="row justify-content-center">
                            <div class="col-md-3"><input type="number" name="quantity" value="1" min="1"></div>
                            <div class="col-md-4"><input type="submit" value="Add to Cart"></div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="img-box">
                <img src="{{ asset('images/products/'.$item->image) }}" alt="">
            </div>
            <div class="detail-box">
                <h5>
                    {{ $item->title }}
                </h5>

                @if (!empty($item->discount_price))
                <h6 class="text-danger">
                    <strike> ${{ $item->price }}</strike>
                </h6>

                <h6>
                    ${{ $item->discount_price }}
                </h6>
                @else
                <h6>
                    ${{ $item->price }}
                </h6>
                @endif

            </div>
        </div>
    </div>
    @endforeach

</div>

</div>
