<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User products</title>
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
    .text{
        margin-top:10px;
    }
    </style>
<body>
    @include('layouts.header')
    <table class="table table-condensed" style="border-collapse:collapse; width:90%; margin-left:4%; margin-top:4%;">
        <thead>
            <tr>
                <th>S No</th>
                <th>Product image</th>
                <th>Product title</th>
                <th>Quantity</th>
                <th>Product Price</th>
            </tr>
        </thead>
        <tbody>
            @php
                $SNO = 0;
            @endphp
            @foreach ($orderitems as $history)
                <tr>
                    <td>{{$SNO}}</td>
                    <td><img src="{{ url('storage/ArticlesImages/') }}/{{ $history->product->product_image_URLs }}"
                                    alt="Product-Image" /></td>
                    <td><p class="text">{{$history->product->product_title}}</p></td>
                    <td><p class="text">{{ $history->quantity }}</p></td>
                    <td><p class="text">₹{{ $history->price }}.00/-</p></td>
                </tr>
                @php
                    $SNO ++;
                @endphp
            @endforeach
    </table>
    <footer>
        @include('layouts.footer')
    </footer>
</body>

</html>
