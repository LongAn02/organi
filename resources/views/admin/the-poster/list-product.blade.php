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
            <td>
                {{ $product->name }}
            </td>
            <td class="text-">
                {{ $product->categories->name }}
            </td>
            <td>
                {{ $product->price }}
            </td>
            <td>
                {{ $product->discount->percentage_discount.'%' }}
            </td>
            <td>
                <button class="btn btn-success update-product-admin" data-id="{{ $product->id }}">
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
                console.log(id);
                {{--$.ajax({--}}
                {{--    url : `{{ route('admin.the-poster.delete.product') }}`,--}}
                {{--    type : 'POST',--}}
                {{--    data : {id},--}}

                {{--    success : function (data) {--}}
                {{--        if (data) {--}}
                {{--            $(document).find(`.product_${id}`).empty();--}}
                {{--        } else {--}}
                {{--            console.log('khong xoa dc');--}}
                {{--        }--}}
                {{--    }--}}
                {{--});--}}
            });
        })
    </script>
@endsection
