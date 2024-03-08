<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<style>
    .category-box {
        box-shadow:rgb(203, 203, 203) 0px 0px 6px 2px;
        padding: 12px 10px;
        width: 70%;
        margin-left: 14%;
    }

    .sub-category-box {
        box-shadow:rgb(201, 201, 201) 0px 0px 6px 2px;
        margin-top: 20px;
        padding: 16px 10px;
        width: 70%;
        margin-left: 14%;
    }

    .category {
        margin-top: 2%;
    }
    h4{
        text-align: center;
    }
</style>

<body>
    @include('layouts.header')
    <section class="category">

        <div class="container">
            <h4><b>Add categories</b></h4>
            <div class="category-box">
                <form method="post" action="{{ route('category.create') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter a category</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="parent_category"
                            aria-describedby="emailHelp" placeholder="Parent-Category">
                    </div>
                    <button type="submit" class="btn btn-primary  btn-block">Add a category</button>
                </form>
            </div>

            <h4><b>Add Sub-categories</b></h4>
            <div class="sub-category-box">
                <form method="post" action="{{ route('sub-category.create') }}">
                @csrf
                <select id="demo_overview" name="new-parent-category" class="form-control" data-role="select-dropdown">
                    @foreach ($parentcategory as $parentcateg)
                    
                        <option value="{{ $parentcateg->id }}">{{ $parentcateg->category_name }}
                        </option>
                    @endforeach
                </select>
                <div class="form-group">
                    <label for="exampleInputEmail1">Enter a sub category</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="sub_category"
                        aria-describedby="emailHelp" placeholder="Parent-Category">
                </div>
                <button type="submit" class="btn btn-primary  btn-block">Add a sub category</button>
                </form>
            </div>
        </div>
    </section>
    <footer>
        @include('layouts.footer')
    </footer>
</body>

</html>
