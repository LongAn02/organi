@extends('admin.app')

@section('admin__dashboard')
    <div class="container-fluid">
        <h1 class="text-center text-uppercase text-danger">list product</h1>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr class="text-uppercase text-center">
            <th scope="col">STT</th>
            <th scope="col">image</th>
            <th scope="col">name</th>
            <th scope="col">category</th>
            <th scope="col">price</th>
            <th scope="col">discount</th>
            <th scope="col">update</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        @php( $i = 0)
        @foreach($listProduct as $product)
        <tr class="text-center product_{{ $product->id }}">
            <th scope="row">{{ ++$i }}</th>
            <td>
                <img src="{{ asset('assets/user/img/product'.(($product->discount->percentage_discount == 0) ? '' : '/discount').$product->img) }}" alt="" style="width: 100px">
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->categories->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->discount->percentage_discount.'%' }}</td>
            <td>
                <button class="btn btn-success update-product-admin" data-id="{{ $product->id }}" data-toggle="modal"  data-target="#staticBackdrop">
                    <i class="fas fa-star"></i>
                </button>
            </td>
            <td>
                <button class="btn btn-danger delete-product-admin" data-id="{{ $product->id }}">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

            </div>
        </div>
    </div>
@endsection

@section('product-admin')
    <script>
        $(function () {
            $(document).on('click', '.delete-product-admin', function () {
                const id = $(this).data('id');
                $.ajax({
                    url : `{{ route('admin.the-poster.delete.product') }}`,
                    type : 'POST',
                    data : {id},

                    success : function (data) {
                        if (data) {
                            $(document).find(`.product_${id}`).empty();
                        } else {
                            console.log('khong xoa dc');
                        }
                    }
                });
            });

            $(document).on('click', '.update-product-admin', function () {
                const id = $(this).data('id');
                $.ajax({
                    url : `{{ route('admin.the-poster.update-admin.product') }}`,
                    type : 'POST',
                    data : {id},

                    success : function (data) {
                        $('.modal-content').html(data);
                        $('.update-product-modal').attr('data-id',`${id}`);
                    }
                });
            });

            $(document).on('click', '.update-product-modal', function () {
                // const id = $(this).attr('data-id');
                // const updateProductName = $('#updateProductName').val();
                // const updateUproductPrice = $('#updateUproductPrice').val();
                // const updateProductDescription = $('#updateProductDescription').val();
                // const updateProductImage = $('#updateProductImage').val();
                // const updateProductCategory = $('#updateProductCategory').val();
                // const updateProductDiscount = $('#updateProductDiscount').val();

                let form = new FormData($('#update-product-admin')[0]);
                const productUpdate = {
                    id : $(this).attr('data-id'),
                    updateProductName : $('#updateProductName').val(),
                    updateUproductPrice : $('#updateUproductPrice').val(),
                    updateProductDescription : $('#updateProductDescription').val(),
                    updateProductImage : $('#updateProductImage').val(),
                    updateProductCategory : $('#updateProductCategory').val(),
                    updateProductDiscount : $('#updateProductDiscount').val(),
                };

                if (true){
                    $.ajax({
                        url : `{{ route('admin.the-poster.update.product') }}`,
                        type : 'POST',
                        data : form,
                        processData: false,
                        contentType: false,

                        success : function (data) {
                            console.log(data);
                        },

                        error : function (data) {
                            console.log(data);
                        }
                    });
                };
            });
        })
    </script>
@endsection
