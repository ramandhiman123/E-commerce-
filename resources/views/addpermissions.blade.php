<link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
@include("layouts.header")
<div class="container">
    <form method="post" action="{{ route('add.rolepermission',$singlerole->id) }}">
        @csrf
        <table>
            <tr>
                <th>
                    <h3>Role:</h3>
                </th>
                <td><h3>{{ $singlerole->name }}</h3></td>
            </tr>
        </table>
        @foreach($permission as $permissions)
<input type="checkbox"  name="permission[]" value="{{$permissions->name}}"

@foreach($singlerole->permissions as $role)
@if($role->id == $permissions->id)
checked
@else

@endif
@endforeach
>
<label for="vehicle1">{{$permissions->name}}</label><br>
@endforeach
    <button type="submit" value="submit">Update</button>
</form>
<footer>
    @include('layouts.footer')
</footer>