<html>
<link href="{{ url('asset/css/login.css') }}" rel="stylesheet">

<body>
    @include('layouts.header')

    <div class="banner">
    </div>
    <div class="container pd-t">
        <form class="login_form" method="POST" action="{{ route('login_data') }}">
            @if (session()->has('Success'))
                <div class="alert alert-success">
                    <h6>{{ session()->get('Success') }}</h6>
                </div>
            @endif
            @if (session()->has('Error'))
                <div class="alert alert-danger">
                    <h6>{{ session()->get('Error') }}</h6>
                 
                </div>
            @endif
            @csrf
            <h2 class="form_title">Login Form</h2>
            <div class="form-group">
                <input class="form-control" type="email"
                    placeholder="* Email address" value="{{ old('email') }}" name="email"
                    style="animation:show 0.8s cubic-bezier(0.18, 0.89, 0.32, 1.28);" />
                <span class="text">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" placeholder="* Password" name="password"
                    style="animation:show 0.9s cubic-bezier(0.18, 0.89, 0.32, 1.28);" />
                <span class="text">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <div class="checkbox" style="animationshow 0.5s ease-in;">
                    <label><input type="checkbox" style="animation:show 1s cubic-bezier(0.18, 0.89, 0.32, 1.28);">
                        Remember me</label>
                </div>
            </div>
            <input type="hidden" name="prevUrl" value="{{  URL::previous() }}" />
        
            <div class="form-group">
                <button type="submit" class="btn btn-default"
                    style="animation:show 1.2s cubic-bezier(0.18, 0.89, 0.32, 1.28);">Log in</button>
            </div>

        </form>
    </div>

    <footer>
        @include('layouts.footer')
    </footer>
</body>

</html>
