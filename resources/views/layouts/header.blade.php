<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('asset/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('asset/css/all.css') }}" rel="stylesheet">
</head>
<div class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="navbar-header">
                    <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span
                            class="icon-bar"></span><span class="icon-bar"></span><span
                            class="icon-bar"></span></button>
                    <a href="{{ route('welcome') }}" class="navbar-brand">GROUP.COM</a>
                </div>

                <div class="navbar-collapse collapse" id="mobile_menu">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ route('welcome') }}">Home</a></li>
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us</a> </li>
                        <li><a href="#">Welcome</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <form action="" class="navbar-form">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="search" name="search" id=""
                                        placeholder="Search Anything Here..." class="control">
                                </div>
                            </div>
                        </form>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('shopping_cart') }}" class="cart" style="position: relative">
                                <i class="fa fa-cart-arrow-down" aria-hidden="true">
                            </a></i>


                        <li> <a href="{{ route('admin.sellerdashoard') }}" class="seller">Become a
                                Seller</a></li>
                        @if (Route::has('login'))
                            @auth
                                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                            class="glyphicon glyphicon-log-in"></span> {{ Auth::user()->name }}<span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">

                                        <button type="button" class="log" id="myBtn">
                                            Profile
                                        </button>

                                        @can('role-list')
                                            <a href="{{ route('role.view') }}"><button type="submit"
                                                    class="log">Roles</button></a>
                                        @endcan

                                        @can('user-list')
                                            <a href="{{ route('user.index') }}"><button type="submit"
                                                    class="log">User</button></a>
                                        @endcan

                                        @can('vendor-product-list')
                                            <a href="{{ route('admin.Vender') }}"><button type="submit"
                                                    class="log">Product-list</button></a>
                                        @endcan

                                        @can(['category-view', 'category-create', 'category-delete'])
                                            <a href="{{ route('category.index') }}"><button type="submit"
                                                    class="log">Category-list</button></a>
                                        @endcan

                                        @can('all-orders')
                                            <a href="{{ route('admin.allorders') }}"><button type="submit" class="log">All
                                                    Orders</button></a>
                                        @endcan

                                        @can('vendor-product-orders')
                                            <a href="{{ route('vendor_orders_details') }}"><button type="submit"
                                                    class="log">Product-orders</button></a>
                                        @endcan
                                        
                                        <a href="{{ route('order.history') }}"><button type="submit" class="log">
                                                Orders</button></a>

                                        <a href="{{ route('user.logout') }}"><button type="submit" class="log">Logout
                                            </button></a>
                                    </ul>
                                </li>


                                <div id="myModal" class="modal">
                                    <div class="modal-content">
                                        <span class="close">&times;</span>
                                
                                        <div class="user">
                                            <i class="fa-solid fa-user fa-2xl"></i>
                                        </div>
                                        @foreach ($userdetails as $user)
                                            <form>
                                                @csrf
                                
                                                <div class="form-group">
                                
                                                    <label for="exampleInputEmail1">Name:</label>
                                                    <input type="text" class="form-control" value="{{ $user->name }}" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="Enter Name">
                                                </div>
                                
                                
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Email</label>
                                                    <input type="email" class="form-control" value="{{ $user->email }}"
                                                        id="exampleInputPassword1" placeholder="Enter email">
                                
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        @endforeach
                                    </div>
                                </div>

                            @else
                                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                            class="glyphicon glyphicon-log-in"></span> Login / Sign Up<span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <a href="{{ route('login_form') }}"><button type="submit"
                                                class="log">Login</button></a><br>
                                        <a href="{{ route('user.registration') }}"><button type="submit"
                                                class="log">Sign
                                                Up</button></a>
                                    </ul>
                                </li>

                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    var modal = document.getElementById("myModal");

    var btn = document.getElementById("myBtn");

    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>

</html>
