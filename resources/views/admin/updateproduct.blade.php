@include('layouts.header')
<div class="container">
    <h1>Edit-Products</h1>

    <form method="POST" action="{{ route('Edit.items', $UpdateProduct->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <label for="exampleInputEmail1">Product-title:</label>
                    <input type="text" name="title" value="{{ $UpdateProduct->product_title }}" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Name" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-6">
                    <label for="exampleInputPassword1">Product-price:</label>
                    <input type="number" value="{{ $UpdateProduct->product_price }}" class="form-control"
                        name="pprice" id="exampleInputPassword1" placeholder="Enter Product price" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-6">
                    <label for="exampleInputPassword1">stock-quantity:</label>
                    <input type="number" class="form-control" value="{{ $UpdateProduct->stock_quantity }}"
                        name="quantity" id="exampleInputPassword1" placeholder="Enter Product quantity" required />
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-6">
                    <label for="exampleInputPassword1">Product-brand:</label>
                    <input type="text" class="form-control" value="{{ $UpdateProduct->product_brand }}"
                        name="brand" id="exampleInputPassword1" placeholder="Enter Product brand" required />
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-6">
                    <label for="demo_overview">Product_category:</label>
                    <select id="demo_overview" name="category" class="form-control" data-role="select-dropdown">
                        @foreach ($category as $categories)
                           {{-- @if() --}}
                            <option value="{{ $categories->id }}">{{ $categories->sub_category_type }}</option>
                        @endforeach
                    </select>
                </div>
                </select>
            </div>
            <br>
            {{-- <div class="form-group">
            <div class="col-lg-6">
                <label for="exampleFormControlFile1">product-image:</label>
                <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" multiple>
            </div>
        </div> --}}
            <div class="form-group ">
                <div class="col-lg-12">
                    <label for="exampleFormControlTextarea5">Product-description:</label>
                    <textarea class="form-control" value="{{ $UpdateProduct->product_description }}" id="exampleFormControlTextarea5"
                        name="pdescription" rows="3" placeholder="Enter Product description" required></textarea><br>
                </div>

                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary btn-block ">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<footer>
    @include('layouts.footer')
</footer>
