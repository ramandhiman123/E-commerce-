<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>single product</title>
    <link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ url('asset/css/style.css') }}" rel="stylesheet">
</head>

    @include("layouts.header")
    
    <section class="product1">
        <div class="container">
            <div class="row">
                @php
                $sum = 0;
                @endphp
                <div class="col-lg-4">
                    <img src="{{ url('storage/ArticlesImages/' . $products->product_image_URLs) }}" alt="shirt-image"
                        class="sproduct">
                </div>
                <div class="col-lg-8">
                    <h3>{{ $products->product_title }}</h2>
                        <h3>₹{{ $products->product_price }}.00</h3>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                </div>
                <form action="{{ route('add_cart') }}" method="POST">
                    @csrf
                    <div class="col-lg-1">
                        <div class="quantity">
                            <input type="number" name="quantity" class="form-control" min="1"
                                max="8" value="1"/>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <input type="hidden" name="id" value="{{ $products->id }}" /><br>
                        <button type="submit" name="addcart" class="cart1">Add to cart</button>
                    @php
                        $sum =+ $products->product_price * $products->quantity
                    @endphp
                    {{-- {{Session::get('single',$sum)}} --}}
                </form>
                <a href="{{route('address.form')}}"><button type="button" class="buy">Buy-Now</button></a>
                <p>{{ $products->product_description }}</p>
            </div>
        </div>
    </section>
    <footer>
        @include('layouts.footer')
    </footer>
</body>

</html>
