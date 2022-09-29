@extends('user.app')
@section('title','Shopping Cart')
@section('section_main')
    @include('user.pages.section-hero.section-hero')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('assets/user/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th class="text-center">Image</th>
                                <th class="shoping__product text-center">Name</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="shopping__cart__render">
                                @include('user.ajax.shopping-cart')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('user.view.shop-grid') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>$0</span></li>
                            <li>Total <span class="sum-all">${{ $sumPrice }}</span></li>
                        </ul>
                        <button class="by-product-shopping-cart primary-btn w-100">
                        BY PRODUCT
                    </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection

@section('shopping-cart')
    <script>
        $(function () {
            $(document).on('click', '.icon_close', function () {
                const product_id = $(this).data('id');
                $.ajax({
                    url : `{{ route('user.shopping-cart.delete.product') }}`,
                    type : "POST",
                    data : {product_id},

                    success :function (data) {
                        if (data.success == 1) {
                            $(document).find(`.close-${product_id}`).empty()
                            $('.sum-all').html(`$${data.sumPrice}`);
                        }
                    }
                });
            });

            $(document).on('click', '.qtybtn', function () {
                const quantity = $(this).parent().find('input').val();
                const product_id = $(this).parent().find('input').data('product-id');
                $.ajax({
                    url : `{{ route('user.shopping-cart.update.product') }}`,
                    type : "POST",
                    data : {product_id, quantity},

                    success : function (data) {
                        if (data.success == 1) {
                            $(`.price-product_${product_id}`).html(data.price);
                            $('.sum-all').html(`$${data.sumPrice}`);
                        }
                    }
                });
            });

            $(document).on('click', '.by-product-shopping-cart', function () {
                $.ajax({
                    url : `{{ route('user.shopping-cart.by.product') }}`,
                    type : "POST",

                    success : function (data) {
                        if(data.success == 1) {
                            $(document).find(`.shopping__cart__render`).empty()
                            $('.sum-all').html(`$0`);
                        }
                    }
                });
            });
        })
    </script>
@endsection
