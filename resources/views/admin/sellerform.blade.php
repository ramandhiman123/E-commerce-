<link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ url('asset/css/sellerform.css') }}" rel="stylesheet">
@include('layouts.header')
<body>
    <div class="container">
        <div class="card">
            <div class="card_title">
                <h1>Create Account</h1>
                <span>Already have an account? <a href="login">Sign In</a></span>
            </div>
            <div class="form">
                <form method="POST" action="{{ route('admin.vender-store') }}">
                    @csrf
                    <input type="text" name="name" value="{{old('name')}}"  id="username" class="form-control" placeholder="UserName" />
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="number" name="number" value="{{old('number')}}" id="number" class="form-control" placeholder="MobileNo" />
                    <span class="text-danger">
                        @error('number')
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="email" name="email" value="{{old('email')}}" placeholder="Email" class="form-control" id="email" />
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="password" name="password" placeholder="Password" class="form-control" id="password" />
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                    <button>Sign Up</button>
                </form>
            </div>
            <div class="card_terms">
                <input type="checkbox" name="" id="terms"> <span>I have read and agree to the <a
                        href="">Terms of Service</a></span>
            </div>
        </div>
    </div>
    <footer>
        @include('layouts.footer')
    </footer>
</body>
