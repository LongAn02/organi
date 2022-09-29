@extends('admin.app')

@section('admin__dashboard')
    <div class="container-fluid">
        <div class="row">
            <div class="col-4"><img src="{{ asset('assets/user/img/logo.png') }}" alt=""></div>
            <div class="col-4"><h1 class="text-center p-0">table orders</h1></div>
            <div class="col-4 text-right">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search order" id="admin-search-order">
                    <div class="input-group-append">
                        <button class="btn btn-primary search-order">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr class="text-center text-uppercase">
                <th scope="col">stt</th>
                <th scope="col">id</th>
                <th scope="col">user name</th>
                <th scope="col">order</th>
                <th scope="col">status</th>
            </tr>
            </thead>
            <tbody class="list-order">
                @include('admin.pages.list-order')
            </tbody>
        </table>
    </div>

    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content w-auto">
            </div>
        </div>
    </div>
@endsection

@section('show-order')
    <script>
        $(function (){
            $(document).on('click', '.show-order', function () {
                const id = $(this).closest('tr.text-center').find('td.order-id').data('id');
                $.ajax({
                    url : `{{ route('admin.view.orders') }}`,
                    data : {id},
                    type : "POST",

                    success : function (data) {
                        $('.modal-content').html(data)
                    }
                });
            });

            $(document).on('click', '.update-status', function () {
                const id = $(this).closest('tr.text-center').find('td.order-id').data('id');
                $.ajax({
                    url : `{{ route('admin.view.update-status') }}`,
                    data : {id},
                    type : "POST",

                    success : function (data) {
                        if (data) {
                            $(document).find(`.list-order .product_${id} .btn-danger`)
                                .removeClass('btn-danger')
                                .addClass('btn-success')
                                .html('successful confirmation');
                        }
                    }
                });
            })

            $(document).on('click', '.search-order', function () {
                const search_order = $(this).closest('div.input-group').find('input#admin-search-order').val();
                $.ajax({
                    url : `{{ route('admin.view.search-order-detail') }}`,
                    data : {search_order},
                    type : "POST",

                    success : function (data) {
                        if (data.success){
                            $('.list-order').html(data.view);
                        }else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Khong tim thay',
                            })
                        }
                    }
                });
            });
        })
    </script>
@endsection
