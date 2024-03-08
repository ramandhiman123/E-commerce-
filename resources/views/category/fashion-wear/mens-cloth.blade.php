<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mens-cloth</title>
    <link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('asset/css/mens.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.header')
    <div class="container">
        <div class="row mt-4">
            @foreach ($sub_category as $mens)
                <div class="col-lg-3">
                    <div class="box2">
                        <a href="{{ route('single.product', $mens->id) }}">
                            <img src="{{ url('storage/ArticlesImages/' . $mens->product_image_URLs) }}"
                                alt="shirt-image"></a><br>
                        <p class="title">{{ $mens->product_title }}</p>
                        <h3 class="price"> ₹{{ $mens->product_price }}</h3>
                        <div class="delivery">Free Delivery</div>
                        <div class="rating">3.9
                            <i class="fa-solid fa-star" style="color: #ffffff;"></i>
                        </div>
                        <span class="rev">Reviews</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <footer>
        @include('layouts.footer')
    </footer>
</body>

</html>
