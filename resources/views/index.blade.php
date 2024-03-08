<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="{{ url('asset/css/user.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user</title>
    <link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('asset/css/user.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.header')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if (session()->has('Updated'))
                    <div class="alert alert-success">
                        <h6>{{ session()->get('Updated') }}</h6>
                    </div>
                @endif
                @if (session()->has('Delete'))
                    <div class="alert alert-danger">
                        <h6>{{ session()->get('Delete') }}</h6>
                    </div>
                @endif
                @if (session()->has('Created'))
                <div class="alert alert-success">
                    <h6>{{ session()->get('Created') }}</h6>
                </div>
            @endif
                <div class="box1">
                    Roles
                    <a href="{{ route('user.create') }}" class="btn btn-primary">New User</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <h3> <b><u>id</u></b></h3>
            </div>
            <div class="col-lg-2">
                <h3><b><u>user-name</u></b></h3>
            </div>
            <div class="col-lg-2">
                <h3><b><u>user-email</u></b></h3>
            </div>
            <div class="col-lg-2">
                <h3><b><u>roles</u></b></h3>
            </div>
            <div class="col-lg-2">
                <h3><b><u>Actions</u></b></h3>
            </div>
        </div>
        @foreach ($users as $user)
            <div class="row">
                <div class="col-lg-2">
                    <p>{{ $user->id }}</p>
                </div>
                <div class="col-lg-2">
                    <p>{{ $user->name }}</p>
                </div>
                <div class="col-lg-2">
                    <p>{{ $user->email }}</p>
                </div>
                <div class="col-lg-2">
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $rolename)
                            <label class="bg-primary text-white">{{ $rolename }}</label>
                        @endforeach
                    @endif
                </div>
                <div class="col-lg-1">

                    <a href="{{ route('user.edit', $user->id) }}">
                        <button type="submit" class="uedit">Edit</button></a>
                </div>
                <div class="col-lg-1">
                    <form action="{{ route('user.delete', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="udelete">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach

    </div>
    <footer>
        @include('layouts.footer')
    </footer>
</body>

</html>
