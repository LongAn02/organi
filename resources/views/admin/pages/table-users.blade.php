@extends('admin.app')

@section('admin__dashboard')
    <div class="container-fluid">
        <div class="row">
            <div class="col-4"><img src="{{ asset('assets/user/img/logo.png') }}" alt=""></div>
            <div class="col-4"><h1 class="text-center p-0">table User</h1></div>
            <div class="col-4 text-right">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." id="admin-search-user">
                    <div class="input-group-append">
                        <button class="btn btn-primary search-user">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr class="text-uppercase text-center">
                <th scope="col">stt</th>
                <th scope="col">ho va ten</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">address</th>
                <th scope="col">roles</th>
            </tr>
            </thead>
            <tbody class="list-user">
                @include('admin.pages.list-user')
            </tbody>
        </table>
    </div>
@endsection
@section('update-role-user')
    <script>
        $(function () {
            $('.update-role').click(function () {
                 const user_id = $(this).closest('.role-user').data('id');
                 const role_id = $(this).val();

                 if ($(this).prop('checked')){
                     $.ajax({
                         url : `{{ route('admin.view.update-role') }}`,
                         type : 'POST',
                         data : {user_id, role_id},
                     });
                 }else {
                     $.ajax({
                         url : `{{ route('admin.view.remove-role') }}`,
                         type : 'POST',
                         data : {user_id, role_id},
                     });
                 }
            });

            $('.search-user').click(function () {
                const search_user = $(this).closest('.input-group').find($('input#admin-search-user')).val();
                $.ajax({
                    url : `{{ route('admin.view.search-user') }}`,
                    data : {search_user},
                    type : "POST",

                    success : function (data) {
                        if (data.success){
                            $('.list-user').html(data.view);
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
