@foreach($arrayCart as $cart)
    <tr class="close-{{$cart['product_id']}}">
        <td class="shoping__cart__item text-center">
            <img
                src="{{ asset('assets/user/img/product'.(($cart['discount'] != 0) ? '/discount' : '').$cart['product_img']) }}"
                alt="">
        </td>
        <td class="shoping__cart__item text-center">
            <h5>{{ $cart['product_name'] }}</h5>
        </td>
        <td class="shoping__cart__price">
            ${{ $cart['product_price'] }}
        </td>
        <td class="shoping__cart__price">
            {{ $cart['discount'].'%' }}
        </td>
        <td class="shoping__cart__quantity">
            <div class="quantity">
                <div class="pro-qty">
                    <input type="text" value="{{ $cart['quantity'] }}" data-product-id="{{ $cart['product_id'] }}">
                </div>
            </div>
        </td>
        <td class="shoping__cart__total price-product_{{ $cart['product_id'] }}">
            ${{ $cart['price'] ?? $price ?? '' }}
        </td>
        <td class="shoping__cart__item__close">
            <span class="icon_close" data-id="{{ $cart['product_id'] }}"></span>
        </td>
    </tr>
@endforeach




