<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<style>
    .p-3 {
        padding: 4px 6px;
        border-radius: 4px;
        width: 100px;
        height: 28px;
        font-size: 12px;
        font-weight: 600;
        text-align: center;
        background-color: rgb(199, 199, 3);
        color: rgb(255, 255, 255);
    }

    table {
        margin-top: 30px;
    }
</style>

<body>
    @include('layouts.header')
    <div class="container">
        <h1><u>Orders</u></h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>User name</th>
                    <th>Status</th>
                    <th>User address</th>
                    <th>Created at</th>
                    <th>Product itmes</th>
                    <th>Change status</th>
                </tr>
            </thead>
            @php
                $total = 0;
            @endphp
            <tbody>
                @foreach ($orderproducts as $orders)
                    <tr>
                        <td>{{ $orders->order->id }}</td>
                        <td>
                            @foreach ($users as $user)
                                @if ($user->id == $orders->order->address_id)
                                    {{ $user->fullname }}
                                @endif
                            @endforeach

                        </td>
                        <td>
                            <div {{-- <div style={{ $orders->order->status == 'completed' ? 'background-color:green'  :  $orders->order->status == 'processing'  ? 'background-color:red' }} --}} 
                                class="p-3  text-white" id="status">{{ $orders->order->status }}
                            </div>
                        </td>
                        <td><span>
                                @foreach ($users as $user)
                                    @if ($user->id === $orders->order->address_id)
                                        #{{ $user->houseNo }},
                                        {{ $user->city }},
                                        {{ $user->state }},
                                        {{ $user->pincode }}
                                    @endif
                                @endforeach

                            </span>
                        </td>
                        <td>{{ $orders->created_at }}</td>
                        <td><a href="{{ route('vendor.products_orders', $orders->order->id) }}">View</a></td>


                        <td>
                            <button type="button" class="btn btn-primary" 
                              data-toggle="modal" data-target="#exampleModalCenter_{{ $orders->order->id }}">
                                Change status
                            </button>

                            <div class="modal fade" id="exampleModalCenter_{{ $orders->order->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action = "{{ route('vendor.update_status', $orders->order->id) }}"
                                                method="POST" id="sform">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-lg-12">

                                                            <label for="demo_overview">Status:</label>
                                                            <select id="demo_overview" name="status"
                                                                class="form-control" data-role="select-dropdown">
                                                                <option value="Completed">Completed</option>
                                                                <option value="Shipped">Shipped</option>
                                                                <option value="Processing">Processing</option>
                                                                {{-- <option value="Processing">Cancelled</option> --}}
                                                            </select>
                                                        </div>
                                                        </select>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" id="change" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

        </table>
    </div>
    <footer>
        @include('layouts.footer')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js">
        </script>
        <script>
            // $('body').on('click', '#change_status', function() {
            //     var modelId = $(this).attr('data-id');
            //     $('#exampleModal_' + modelId).modal('show');
            // });
            // $(document).ready(function (){
            //     $("#change").click(function(){
            //              $("status").css("background","red");
            //         });
            // });
        </script>
    </footer>
</body>

</html>
