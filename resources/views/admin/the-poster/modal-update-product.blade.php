<div class="modal-header d-flex  justify-content-center">
    <img src="{{ asset('assets/user/img/logo.png') }}" alt="">
</div>

<div class="modal-body">
    <form id="update-product-admin" enctype="multipart/form-data">
        <div class="form-group">
            <label for="productName">Name</label>
            @error('product_update_name')
            <span class="text-danger">- {{ $message }}</span>
            @enderror
            <input type="text"
                   class="form-control @error('product_update_name') is-invalid @enderror input-update-product"
                   id="updateProductName" name="product_update_name" value="{{ $products->name }}">
        </div>
        <div class="form-group">
            <label for="productPrice">Price</label>
            @error('product_update_price')
            <span class="text-danger">- {{ $message }}</span>
            @enderror
            <input type="number"
                   class="form-control @error('product_update_price') is-invalid @enderror input-update-product"
                   id="updateUproductPrice" name="product_update_price" value="{{ $products->price }}">
        </div>
        <div class="form-group">
            <label for="productDescription">Description</label>
            @error('product_update_description')
            <span class="text-danger">- {{ $message }}</span>
            @enderror
            <input type="text"
                   class="form-control @error('product_update_description') is-invalid @enderror input-update-product"
                   id="updateProductDescription" name="product_update_description" value="{{ $products->description }}">
        </div>
        <div class="form-group">
            <label for="productImage">Image</label>
            <input type="file" id="updateProductImage"
                   class="input-update-product"
                   name="product_update_image" accept=".jpg, .png, .jpeg">
        </div>
        <div class="form-group">
            <label for="productPrice">Categori</label>
            <select name="product_update_category" id="updateProductCategory">
                @foreach($categories as $category)
                    <option class="input-update-product"
                            value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="productPrice">Discount</label>
            <select name="product_update_discount" id="updateProductDiscount">
                @foreach($discounts as $discount)
                    <option class="input-update-product"
                            value="{{ $discount->id }}">{{ $discount->name }}</option>
                @endforeach
            </select>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary close-update" data-toggle="modal" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary update-product-modal">Update</button>
</div>

