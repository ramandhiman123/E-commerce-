<link href="{{ url('asset/css/cart.css') }}" rel="stylesheet">
<link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">

<body>
    @include('layouts.header')

    @if (Auth::check() && count($cartsitem) > 0)
        @php
            $total = 0;
        @endphp
        {{ Session::put('items', $cartsitem) }}
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if (session()->has('update-item'))
                        <div class="alert1 ">
                            <p>{{ session()->get('update-item') }}</p>
                            {{-- <p>Your item updated successfully!</p> --}}
                        </div>
                    @endif
                </div>
            </div>
            @foreach ($cartsitem as $details)
                <div class="row mt-2">
                    <div class="col-lg-3">
                        <img src="{{ url('storage/ArticlesImages/') }}/{{ $details->product->product_image_URLs }}"
                            alt="Product-Image" />
                    </div>
                    <div class="col-lg-3">
                        <h5 class="title">{{ $details->product->product_title }}</h5>
                    </div>
                    <div class="col-lg-2 mt-5">
                        <div class="quantity">
                            <form action="{{ route('quantity.down', $details->id) }}" method="post">
                                @csrf
                                <button class="minus" aria-label="Decrease"
                                    @if ($details->quantity == 1) disabled @endif>&minus;</button>
                            </form>
                            <input type="number" name="quantity" class="input-box" value="{{ $details->quantity }}"
                                min="1" max="6">
                            <form action="{{ route('quantity.up', $details->id) }}" method="post">
                                @csrf
                                <button class="plus" aria-label="Increase">&plus;</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2 text-center">
                        <h4 class="price">₹{{ $details->product->product_price }}.00</h4>
                    </div>
                    <div class="col-lg-2 text-center">
                        <form method="post" class="delete_form" action="{{ route('delete_cart_item', $details->id) }}"
                            id="studentForm_{{ $details->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure delete your cart item')"
                                class="remove"><i class="fa-solid fa-trash"></i> Remove</button>
                        </form>
                    </div>
                </div>

                @php
                    $total += $details->product->product_price * $details->quantity;
                @endphp
            @endforeach
            <hr>
            {{-- @if ()
        <div class="empty">
            <h1>Your Cart is empty!</h1>
            <h3>Add Item to it now.</h3>
            <a href="{{ route('Product_show') }}"><button type="submit" class="btn btn-primary">Shop
                    Now</button></a>
        </div>
    @else --}}
            <div class="checkout">
                <div class="total">
                    <div>
                        <div class="Subtotal">Sub-Total</div>
                        <div class="items">{{ count($cartsitem) }}</div>
                    </div>
                    <div class="total-amount">₹{{ $total }}.00</div>
                    {{ Session::put('ammount', $total) }}
                </div>
                <a href="{{ route('address.form') }}"><button class="button">Checkout</button></a>
            </div>
        </div>
    @else
        <div class="empty">
            <h1> Your Cart is empty!</h1>
            <h3>Add Item to it now.</h3>
            <a href="{{ route('Product_show') }}"><button type="submit" class="btn btn-primary">Shop Now</button></a>
        </div>
    @endif
    <footer>
        @include('layouts.footer')
    </footer>
</body>

</html>
