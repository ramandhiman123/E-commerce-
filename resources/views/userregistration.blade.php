<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link  href="{{ url('asset/css/userregistration.css')}}"  rel="stylesheet">
</head>

<body>
    @include("layouts.header")
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form  action="{{route('user.reg')}}"  method="post">
                @csrf
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <div class="form-group"><input  value="{{old('name')}}" class="form-control" type="name" name="name"
                    placeholder="username" >
                </div>
                <span class="text-danger">
                    @error('name')
                    {{ $message }}
                    @enderror
                </span>
                <div class="form-group"><input class="form-control" value="{{old('email')}}" type="email" name="email" placeholder="Email">
                </div>
                <span class="text-danger">
                    @error('email')
                    {{ $message }}
                    @enderror
                </span>
                <div class="form-group"><input class="form-control" type="password" name="password"
                        placeholder="Password"></div>
                        <span class="text-danger">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </span>
                <div class="form-group">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input"
                                type="checkbox">I agree to the license terms.</label></div>
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Sign Up</button></div>
                <a href="{{route('login_form')}}" class="already">You already have an account? Login here.</a>
            </form>
        </div>
    </div>
    <footer>
        @include('layouts.footer')
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
