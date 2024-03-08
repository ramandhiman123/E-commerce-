<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
    <link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<style>
    .btn-primary {
        float: right;
        margin-top: 20px;
    }

    .mb-1 {
        margin-bottom: 10px;
    }
</style>

<body>
    @include('layouts.header')
    <div class="container">
        <div class="row mb-1">
            <div class="col-lg-5">
                <h3><b>Categories</b></h3>
            </div>
            <div class="col-lg-5">
                <a href="{{ route('new.category') }}">
                    <button type="submit" class="btn btn-primary">Add-Category <i class="fa-solid fa-plus"
                            style="color: #ffffff;"></i></button></a>
            </div>
        </div>
        <table id="example" class="table table-striped table-bordered" style="width:100%;">
            <thead>
                <tr>
                    <th>S.NO</th>
                    <th>Parent-Category</th>
                    <th>Sub-Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $parent_category)
                    <tr>
                        <td>{{ $parent_category->id }}</td>
                        <td> {{ $parent_category->category_name }}</td>
                        <td>
                            @foreach ($parent_category->sub_category as $sub)
                                {{ $sub->sub_category_type }},
                            @endforeach
                        </td>
                        <td> <a href="">
                                <i class="fa-solid fa-pen-to-square fa-lg" style="color: #101010;"></i>
                            </a></td>
                        <td>
                            <a href="{{ route('delete.category', $parent_category->id) }}">
                                <i class="fa-solid fa-trash fa-lg" style="color: #ea2424;"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tfoot>
        </table>
    </div>
    <footer>
        @include('layouts.footer')
    </footer>
    <script>
        new DataTable('#example');
    </script>
</body>

</html>
