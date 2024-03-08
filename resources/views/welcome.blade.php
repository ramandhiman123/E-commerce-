{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping-Site</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         --}}
{{-- <link href="{{ url('asset/css/style.css') }}" rel="stylesheet"> --}}

<link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">

{{-- </head>
<body class="antialiased">
    <header>
        <div class="width-100 top-header">
            <div class="container">
                <div class="width-50">
                    <p class="head1p1 headquote">Dezven: India's Fastest Online Shopping Destination </p>
                </div>
                <div class="width-50">
                    <ul class="head1ul cashback-sect">
                        <li>
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <a class="head1mr" href="#">Refer Your Friend And Earn Rs. 500 Cashback</a>
                        </li>
                        <li>
                            <i class="fa fa-mobile" aria-hidden="true"></i>
                            <a href="#"> Download App</a>
                        </li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </header>

    <nav>
        <div class="width-100 search-panel">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 pd-1">
                        <div class="width-20">
                            <img src="{{ url('asset/images/logo.png') }}" alt="Logo"
                                style="height:60px;padding-left:100px;">
                        </div>
                    </div>
                    <div class="col-lg-4 pd-l">
                        <input class="search-textbox" type="text" Placeholder="Search for products, brand and more">
                    </div>
                    <div class="width-30">
                        <div
                            class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
                            @if (Route::has('login'))
                                {{-- <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10"> --}}
{{--
                                    @can('role-list')
                                        <a href="{{ route('role.view') }}"> <button type="button"
                                                class="btn btn-primary btn-sm">
                                                Roles</button></a>
                                    @endcan
                                    @can('product-create')
                                        <a href="{{ route('Product_Add') }}">
                                            <button type="button" class="btn btn-primary btn-sm">Add-Product</button>
                                        </a>
                                    @endcan
                                    @can('product-list')
                                        <a href="{{ route('admin.Vender') }}">
                                            <button type="button" class="btn btn-primary btn-sm">Product-list
                                            </button>
                                        </a>
                                    @endcan --}}
{{-- @can('new_vender_add')
                                                <x-nav-link :href="route('admin.add-venders')" :active="request()->routeIs('admin.add-venders')">
                                                    {{ __('+Add_vender') }}
                                                </x-nav-link>
                                    8000            <x-nav-link :href="route('admin.user')" :active="request()->routeIs('admin.user')" class="user1">
                                                    {{ __('user') }}
                                                </x-nav-link>
                                            @endrole --}}
{{-- <a href="{{ url('/dashboard') }}"
                                                    {{-- class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a> --}}
{{-- <div class="hidden sm:flex sm:items-center sm:ms-6">
                                    8000                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"> --}}


{{-- <div class="ms-1">
                                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                                        </svg>
                                                                    </div>
                                                                </button>
                                                            </x-slot>
                                                            --}}
{{-- <div class="dropdown">
                                        <button class="btn8 btn-primary dropdown-toggle" type="button" id="about-us"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <label>
                                                {{ Auth::user()->name }}<span class="caret"></span>

                                            </label>

                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="about-us">
                                            <li><x-dropdown-link :href="route('profile.edit')">
                                                    {{ __('Profile') }}
                                                </x-dropdown-link></li>
                                            <li><x-dropdown-link :href="route('profile.logout')">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link> </li>

                                        </ul>
                                    </div> --}}

{{-- <x-slot name="content"> --}}
{{-- <x-dropdown-link :href="route('profile.edit')">
                                                {{ __('Profile') }}
                                            </x-dropdown-link> --}}

<!-- Authentication -->
{{-- <form method="POST" action="{{ route('profile.destroy') }}">
                                                @csrf --}}
{{-- <x-dropdown-link :href="route('profile.logout')"> --}}
{{-- onclick="event.preventDefault(); --}}
{{-- this.closest('form').submit();"> --}}
{{-- {{ __('Log Out') }}
                                            </x-dropdown-link> --}}

{{-- </form>
                                            {{-- </x-slot>
                                                        </x-dropdown> --}}
{{-- </div> --}}
{{-- @else
                                    <a href="{{ route('login_form') }}"
                                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                        <button type="submit" class="btnlog">login
                                        </button></a>


                                    <a href="{{ route('register') }}"
                                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"><button
                                            type="submit" class="btnreg">Register</button></a>
                                @endif

                            @endauth
                        </div>
                    </div>
                    <ul>

                        <li>
                            <a href="{{ route('shopping_cart') }}" class="cart" style="position: relative">
                                <i class="fa fa-cart-arrow-down fa-2x " aria-hidden="true">
                            </a></i>
                        </li>

                        <li> <a href="{{ route('admin.sellerdashoard') }}" class="seller">Become a
                                Seller</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>

    <div class="width-100 main">
        <div class="container">
            <div class="row ">
                <ul class="main-menu">
                    <div class="col-lg-2">
                        <li>
                            <a href="#">Home</a>
                        </li>
                    </div>
                    <div class="col-lg-2">
                        <li>
                            <a href="#">iPhone</a>
                        </li>
                    </div>
                    <div class="col-lg-2">
                        <li>
                            <a href="#">Samsung</a>
                        </li>
                    </div>
                    <div class="col-lg-2">
                        <li>
                            <a href="#">Nokia</a>
                        </li>
                    </div>
                    <div class="col-lg-2">
                        <li>
                            <a href="#">Motorola</a>
                        </li>
                    </div>
                    <div class="col-lg-2">
                        <li>
                            <a href="#">iPad</a>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </div> --}}
@include('layouts.header')

<div class="container-fluid ">
    <div class="contanier">
        <div class="row shadow text-center">
            @foreach ($parent_category as $parent)
                <div class="col-lg-2 col-lg-offset-1">
                    <div class="dropdown">
                        <button class="btn4 btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-mdb-toggle="dropdown" aria-expanded="true">
                            <h4>
                                {{-- <img src="{{url('asset/images/category1.jpeg')}}" alt="category-image" style="height:60px;width:100px;"> --}}
                                {{ $parent->category_name }}</h4>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach ($parent->sub_category as $sub)
                                <li><a class="dropdown-item" href="{{ route('mens.wear', $sub->id) }}">
                                        {{ $sub->sub_category_type }}</a></li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

</div>
<div id="my-pics" class="carousel slide" data-ride="carousel" style="width:100%;margin:auto;">
    <ol class="carousel-indicators">
        <li data-target="#my-pics" data-slide-to="0" class="active"></li>
        <li data-target="#my-pics" data-slide-to="1"></li>
        <li data-target="#my-pics" data-slide-to="2"></li>
        <li data-target="#my-pics" data-slide-to="3"></li>
        <li data-target="#my-pics" data-slide-to="4"></li>
        <li data-target="#my-pics" data-slide-to="5"></li>
    </ol>
    <div class="carousel-inner" role="listbox">

        <div class="item active">
            <img src="{{ url('asset/images/bigImg1.jpg') }}" alt="Sunset over beach">
        </div>
        <div class="item">
            <img src="{{ url('asset/images/bigImg2.jpg') }}" alt="Rob Roy Glacier">
        </div>

        <div class="item">
            <img src="{{ url('asset/images/bigImg3.jpg') }}" alt="Longtail boats at Phi Phi">
        </div>
        <div class="item">
            <img src="{{ url('asset/images/bigImg4.jpg') }}" alt="Sunset over beach">
        </div>

        <div class="item">
            <img src="{{ url('asset/images/bigImg5.jpg') }}" alt="Rob Roy Glacier">
        </div>
        <div class="item">
            <img src="{{ url('asset/images/bigImg7.jpg') }}" alt="Longtail boats at Phi Phi">
        </div>
    </div>

    <a class="left carousel-control" href="#my-pics" role="button" data-slide="prev">
        <span class="icon-prev" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#my-pics" role="button" data-slide="next">
        <span class="icon-next" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<section>
    @if (session()->has('Success2'))
        <div class="alert alert-success">
            <h6>{{ session()->get('Success2') }}</h6>
        </div>
    @endif
    @if (session()->has('Items'))
        <div class="alert alert-success">
            <h6>{{ session()->get('Items') }}</h6>
        </div>
    @endif
    @if (session()->has('success'))
    <div class="alert alert-success">
        <h6>{{ session()->get('success') }}</h6>
    </div>
@endif
    </div>
    <div class="container mt-2">
        <div class="row offset-lg-2">
            @foreach ($displayproducts as $items)
                <div class="col-lg-3">
                    <div class="box">
                        <a href="{{ route('single.product', $items->id) }}">
                            <img src="{{ url('storage/ArticlesImages/' . $items->product_image_URLs) }}"
                                alt="shirt-image">
                            {{ $items->product_title }}</a><br>
                        ₹{{ $items->product_price }}<br>
                        {{ $items->stock_quantity }}
                        {{ $items->product_brand }}<br>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<footer>
    @include('layouts.footer')
</footer>
</body>

</html>
