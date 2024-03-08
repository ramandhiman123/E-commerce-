<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ordered_products</title>
</head>
<body>
     @foreach($order_products as $order)
              
       <h4> {{$order->product_title}}</h4>
       @endforeach
       <footer>
        @include('layouts.footer')
    </footer>
</body>
</html>