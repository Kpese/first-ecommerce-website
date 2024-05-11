@include('front.header')

<div class="col-sm-6 col-md-4 col-lg-4" style="margin:20px auto; width:300px">
    <div class="box" >
        <div class="img-box">
            <img src="{{ asset('images/products/'.$product->image) }}" class="img-fluid" style="border-radius: 20px" alt="">
        </div>
        <div class="detail-box mt-3">
            <h5>
                {{ $product->title }}
            </h5>

            @if (!empty($product->discount_price))

            <h6 class="text-danger">
                <span style="font-weight: 700">Price:</span> <strike> ${{ $product->price }}</strike>
            </h6>

            <h6>
                <span style="font-weight: 700">Discount Price:</span> ${{ $product->discount_price }}
            </h6>
            @else
            <h6>
                <span style="font-weight: 700">Price:</span> ${{ $product->price }}
            </h6>
            @endif

            <div class="mb-2">
             <h6><span style="font-weight: 700">Product Category:</span>  {{ $product->category }}</h6>
              <h6><span style="font-weight: 700">Product Details:</span>  {{ $product->description }}</h6>
              <h6><span style="font-weight: 700">Available Quantity:</span> {{ $product->quantity}}</h6>
            </div>

            <div>
                <form action="{{ route('add_cart', $product->id) }}" method="post">
                    @csrf

                    <div class="row justify-content-center">
                        <div class="col-md-3"><input type="number" name="quantity" value="1" min="1"></div>
                        <div class="col-md-4"><input type="submit" value="Add to Cart"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@include('front.footer')
