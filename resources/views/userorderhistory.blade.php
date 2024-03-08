<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>orders</title>
    <link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.header')
    <div class="container">
        <u>
            <h2><b>Orders</b></h2>
        </u>

        <table class="table table-condensed" style="border-collapse:collapse; width:100%;margin-top:2%;">
            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>User name</th>
                    <th>Status</th>
                    <th>Total Bill</th>
                    <th>Created at</th>
                    <td>Order details</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($orderhistory as $orders)
                    <tr>
                        <td>
                            {{ $orders->id }}
                        </td>
                        <td>{{ $orders->address->fullname }}</td>
                        <td>
                            Delivered
                        </td>
                        <td>₹{{ $orders->total_bill }}.00/-</td>
                        <td>{{ $orders->created_at }}</td>
                        <td>
                            <a href="{{ route('order.users', $orders->id) }}">View</a>
                        </td>
                    </tr>
                @endforeach
        </table>

    </div>
    <footer>
        @include('layouts.footer')
    </footer>
</body>

</html>
