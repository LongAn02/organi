@extends('admin.app')

@section('admin__dashboard')
    <div class="container-fluid">
        <h1 class="text-center text-uppercase text-danger">Add product</h1>
        <div class="d-flex justify-content-center">
            <div style="width: 600px">
                <form action="{{ route('admin.the-poster.add-product') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <span class="success-add-product">
                            <div class="alert alert-success">
                                {{ \Illuminate\Support\Facades\Session::get('success') }}
                            </div>
                        </span>
                    @endif
                    <div class="form-group">
                        <label for="productName">Name</label>
                        @error('product_name')
                        <span class="text-danger">- {{ $message }}</span>
                        @enderror
                        <input type="text"
                               class="form-control @error('product_name') is-invalid @enderror input-add-product"
                               id="productName" name="product_name">
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Price</label>
                        @error('product_price')
                        <span class="text-danger">- {{ $message }}</span>
                        @enderror
                        <input type="number"
                               class="form-control @error('product_price') is-invalid @enderror input-add-product"
                               id="productPrice" name="product_price">
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Description</label>
                        @error('product_description')
                        <span class="text-danger">- {{ $message }}</span>
                        @enderror
                        <input type="text"
                               class="form-control @error('product_description') is-invalid @enderror input-add-product"
                               id="productDescription" name="product_description">
                    </div>
                    <div class="form-group">
                        <label for="productImage">Image</label>
                        <input type="file" id="productImage"
                               class="@error('product_image') is-invalid @enderror input-add-product"
                               name="product_image" accept=".jpg, .png, .jpeg">
                        @error('product_image')
                        <span class="text-danger">- {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Categori</label>
                        <select name="product_category" id="">
                            @foreach($categories as $category)
                                <option class="input-add-product"
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Discount</label>
                        <select name="product_discount" id="">
                            @foreach($discounts as $discount)
                                <option class="input-add-product"
                                        value="{{ $discount->id }}">{{ $discount->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <span class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary add-product-to-admin">Add Product</button>
                    </span>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('admin-add-product')
    <script>
        $(function () {
            $(document).on('click', '.input-add-product', function () {
                $('.success-add-product').empty();
            })
        })
    </script>
@endsection
