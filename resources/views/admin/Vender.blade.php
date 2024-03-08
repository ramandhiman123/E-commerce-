
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ url('asset/css/productlist.css') }}" rel="stylesheet">
</head>
<body>

<style>
    img {
        height: auto;
        width: 100%;
        float: left;
    }

    .btn3 {
        margin-right: 80px;
        float: right;
        padding: 8px 18px;
        border: none;
         border-radius: 4px;
    }

    .mt-3 {
        margin-top: 30px;
    }
</style>
@include('layouts.header')
<h4 class="dummy-text"><u>Product-list</u></h4>
<a href="{{ route('Product_Add') }}"><button type="submit" class="btn3 btn-primary">Add Products <i
            class="fa-solid fa-plus" style="color: #ffffff;"></i></button></a>

<div class="wrapper ">
    <div class="flex-container ">
        @foreach ($sellerproducts as $additems)
            <div class="row ">
                <div class="card mt-3">
                    <div class="col-lg-3 pd-4">
                        <img src="{{ url('storage/ArticlesImages/') }}/{{ $additems->product_image_URLs }}"
                            alt="Product-Image" />
                    </div>
                    <div class="col-lg-9">
                        <div class="card__description">
                            <h5>{{ $additems->product_title }}</h5>
                            <p id="p">{{ $additems->product_description }}</p>
                            <p class="card__description__value--strike">$6.000,00</p>
                            <p id="p">${{ $additems->product_price }}</p>
                            <ul>
                                <li> <a href="{{ route('update.products', $additems->id) }}"><button type="submit"
                                            class="update">Update</button></a></li>
                                <li>
                                    <form action="{{ route('delete_add_products', $additems->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
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
