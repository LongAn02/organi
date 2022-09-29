<script src="{{ asset('assets/user/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/user/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/user/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/user/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/user/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('assets/user/js/mixitup.min.js') }}"></script>
<script src="{{ asset('assets/user/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/user/js/main.js') }}"></script>
<script>
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('ajax-categories-section-featured')
<script>
    $(function () {
        $('.add-product-to-cart').trigger('click',function () {
            const id = $(this).data('id')
            $.ajax({
                url : `{{route('user.shopping-cart.add.product') }}`,
                data : {id},
                type : "POST",

                success : function () {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Product added to cart successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        })
    })
</script>

@yield('shopping-cart')


