<html>

<head>
    <title>Hello</title>
    <link href="{{ url('asset/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.header')
    <div class="container">
        <h1>Add-Products</h1>
        <form method="POST" action="{{ route('product.Add') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <label for="exampleInputEmail1">Product-title:</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Product Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6">
                        <label for="exampleInputPassword1">Product-price:</label>
                        <input type="number" class="form-control" name="pprice" id="exampleInputPassword1"
                            placeholder="Enter Product price" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6">
                        <label for="exampleInputPassword1">stock-quantity:</label>
                        <input type="number" class="form-control" name="quantity" id="exampleInputPassword1"
                            placeholder="Enter Product quantity" required />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6">
                        <label for="exampleInputPassword1">Product-brand:</label>
                        <input type="text" class="form-control" name="brand" id="exampleInputPassword1"
                            placeholder="Enter Product brand" required />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6">
                        <label for="demo_overview">Product_category:</label>
                        <select id="demo_overview" name="category" class="form-control" data-role="select-dropdown">
                            @foreach ($category as $categories)
                                <option value="{{ $categories->id }}">{{ $categories->sub_category_type }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-lg-6">
                        <label for="exampleFormControlFile1">product-image:</label>
                        <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1"
                            multiple>
                    </div>
                </div>
                <div class="form-group green-border-focus">
                    <div class="col-lg-12">
                        <label for="exampleFormControlTextarea5">Product-description:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea5" name="pdescription" rows="3"
                            placeholder="Enter Product description" required></textarea><br>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <footer>
        @include('layouts.footer')
    </footer>
</body>

</html>
