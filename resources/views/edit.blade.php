<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('asset/css/user.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.header')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12">
                        User Edit
                        <a href="{{ route('user.index') }}" class="btn btn-danger">Back</a>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                placeholder="username" />
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                placeholder="email" />
                        </div>
                        <div class="col-lg-12">
                            <label>Roles</label>
                            <?php
                            $userRoles = [];
                            foreach ($user->roles as $role) {
                                $userRoles[] = $role->id;
                            }
                            ?>
                            @foreach ($roles as $role)
                                <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                                    @if (!empty($userRoles) && in_array($role->id, $userRoles)) checked @endif>
                                <label>{{ $role->name }}</label>
                            @endforeach
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary" style="float:left;">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <footer>
            @include('layouts.footer')
        </footer>
</body>

</html>
