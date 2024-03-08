<link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
<style>
    .permission {
        border: none;
        background-color: white;
    }

    label {
        padding: 2px 4px;
        margin-top: 0px;
        margin-bottom: 0px;
        border-radius: 4px;
        font-size: 12px;
    }
</style>
@include('layouts.header')
    <div class="container">
        <form method="POST" action="{{ route('add.role') }}">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <h3><u><b>Add-Role</u></h3>
                </div>
                <div class="col-lg-9">
                    <input type="text" name="role" class="form-control" placeholder="enter the new role" /><br>
                </div>
                <div class="col-lg-7">
                    <button type="submit" class="btn btn-success">Create-Role</button>
                </div>
            </div>
        </form><br>
        <div class="row">
            <div class="col-lg-1">
                <h4><b>S.No</b></h4>
            </div>
            <div class="col-lg-1">
                <h4><b>Roles</b></h4>
            </div>
            <div class="col-lg-4">
                <h4><b>Permissions</b></h4>
            </div>
            <div class="col-lg-2">
                <h4><b>Add-permissions</b></h4>
            </div>
            <div class="col-lg-2">
                <h4><b>Delete-Role</b></h4>
            </div>
        </div>
        @foreach ($addpermissions as $addperm)
            <div class="row">
                <div class="col-lg-1">
                    <h5>{{ $addperm->id }}</h5>
                </div>
                <div class="col-lg-1">
                    <h5>{{ $addperm->name }}</h5>
                </div>
                <div class="col-lg-4">
                    @foreach ($addperm->permissions as $addpe)
                        <label class="bg-primary text-white">{{ $addpe->name }},</label>
                    @endforeach
                </div>
                <div class="col-lg-2">
                    <a href="{{ route('add.permission', $addperm->id) }}"><button type="button"
                            class="btn btn-warning">Add-Permissions</button></a>
                </div>
                <div class="col-lg-2">

                    @can('role-delete')
                        <a href="{{ route('delete.role', $addperm->id) }}">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </a>
                    @endcan
                </div>
            </div>
        @endforeach
</div>
<footer>
    @include('layouts.footer')
</footer>
