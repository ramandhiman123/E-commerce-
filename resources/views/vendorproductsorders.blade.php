<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor products</title>
    <link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<style>
    img {
        width: 120px;
        height: 120px;
        margin-top: 8px;
    }

    .title {
        font-size: 16px;
    }

    .text {
        margin-top: 10px;
    }
</style>

<body>
    <table class="table table-condensed" style="border-collapse:collapse; width:90%; margin-left:4%; margin-top:4%;">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Product image</th>
                <th>Product title</th>
                <th>Quantity</th>
                <th>Product price</th>
            </tr>
        </thead>

        @php
            $total = 0;
            $SNO = 1;
        @endphp
        <tbody>
            @foreach ($vendor_products as $vproducts)
                <tr>
                    <td>{{ $SNO }}</td>
                    <td><img src="{{ url('storage/ArticlesImages/') }}/{{ $vproducts->product->product_image_URLs }}"
                            alt="Product-Image" /></td>
                    <td>
                        <p class="text">{{ $vproducts->product->product_title }}</p>
                    </td>
                    <td>
                        <p class="text">{{ $vproducts->quantity }}</p>
                    </td>
                    <td>
                        <p class="text">₹{{ $vproducts->price }}.00/-</p>
                    </td>
                </tr>
                @php
                    $total += $vproducts->price * $vproducts->quantity;
                    $SNO++;
                @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Total: ₹{{$total}}.00/-</th>
            </tr>
        </tfoot>
    </table>
    <footer>
        @include('layouts.footer')
    </footer>
</body>

</html>
