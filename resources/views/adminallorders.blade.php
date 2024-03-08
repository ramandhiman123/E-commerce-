<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Allp Products</title>
    <link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<style>
    img {
        width: 120px;
        height: 100px;
        margin-top: 8px;
    }

    .mt-3 {
        margin-top: 8px;
    }

    .text {
        margin-top: 10px;
    }

    .text1 {
        margin-top: 10px;
        text-align: center;
    }

    .subtotal{
        font-weight: 600;
        font-size: 15px;
        margin-right:2%;
    }
</style>

<body>
    @include('layouts.header')
    <div class="container">
        <table class="table" style="border-collapse:collapse; width:100%;margin-top:2%;">
            <thead>
                <tr>
                    <th>S.NO</th>
                    <th>OrderId</th>
                    <th>Customer name</th>
                    <th>Status</th>
                    <th>Created by</th>
                    <th>View Items</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $SNO = 1;
                @endphp
                @foreach ($allorders as $orders)
                    <tr>
                        <td>
                            {{ $SNO }}
                        </td>
                        <td>{{ $orders->id }}</td>
                        <td>{{ $orders->address->fullname }}</td>
                        <td>{{ $orders->status }}</td>
                        <td>{{ date('d-m-20y', strtotime($orders->created_at)) }}</td>

                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalLong_{{ $orders->id }}">
                                View Items
                            </button>

                            <div class="modal fade" id="exampleModalLong_{{ $orders->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <b>Product Image</b>
                                                </div>
                                                <div class="col-lg-5">
                                                    <b>Product title</b>
                                                </div>
                                                <div class="col-lg-2">
                                                    <b>Quantity</b>
                                                </div>
                                                <div class="col-lg-2">
                                                    <b>Price</b>
                                                </div>
                                            </div>
                                            @foreach ($orders->orderItem as $ord)
                                                <div class="row mt-3">
                                                    <div class="col-lg-3">
                                                        <img src="{{ url('storage/ArticlesImages/') }}/{{ $ord->product->product_image_URLs }}"
                                                            alt="Product-Image" />
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <p class="text">{{ $ord->product->product_title }}</p>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <p class="text1"> {{ $ord->quantity }}</p>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <p class="text">₹{{ $ord->price }}.00/-</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="modal-footer">
                                                <p class="subtotal">Total:₹{{$orders->total_bill}}.00/-</p>
                                        
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        @php
                            $SNO++;
                        @endphp
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <footer>
        @include('layouts.footer')
    </footer>
</body>

</html>
