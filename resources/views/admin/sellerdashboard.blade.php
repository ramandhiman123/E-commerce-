<!DOCTYPE html>
{{-- <title>My Example</title> --}}
<link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
<style>
    .navbar{
        background-color:rgb(242, 234, 234);
        border:none;
        box-shadow:  inset 0px 2px 16px 0px #535455;
    }
    .btn{
        background-color:white;
        border:none;
        padding:8px 18px;
        border-radius: 4px;
        margin-left:20px;
       
    }
    .btn:hover{
        background-color:white;
        box-shadow:2px 2px 12px 4px #b3e1b3;
        transition:0.3s;
    }
    .btn a{
   text-decoration: none;
   color:black;
   font-size: 14px;
    }
 
    </style>
<nav class="navbar  navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#alignment-example"
                aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="{{ url('asset/images/logo.png') }}" alt="Logo" style="height:60px;">
        </div>

        <div class="collapse navbar-collapse" id="alignment-example">

            <!-- Links -->
            <button type="button" class="btn btn-default navbar-btn navbar-right"><a href="{{route('login_form')}}">Login</a></button>
            <button type="button" class="btn btn-default navbar-btn navbar-right"><a href="{{route('admin.sellerform')}}">Register</a></button>

        </div>

    </div>
</nav>
<footer>
    @include('layouts.footer')
</footer>

