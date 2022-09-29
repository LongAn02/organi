<?php

namespace App\Repositories;

use App\Models\CartItem;

class CartItemRepository extends BaseRepository
{
    public function model()
    {
        return CartItem::class;
    }

    public function addCart(
        $data
    ) {
        return $this->store($data);
    }

    public function getProductIdByShoppingSessionId($shopping_session_id) {
        return $this->model->where('shopping_session_id', $shopping_session_id)
            ->get(['quantity', 'product_id', 'shopping_session_id']);
    }

    public function updateQuantity($shopping_session_id, $product_id, $quantity) {
        return $this->model->where('shopping_session_id', $shopping_session_id)
            ->where('product_id', $product_id)
            ->update(['quantity' => $quantity]);
    }

    public function countCartByShoppingSessionId($shopping_session_id) {
        return $this->model->where('shopping_session_id', $shopping_session_id)->count();
    }

    public function showCartByShoppingSessionId ($shopping_session_id) {
        return $this->model->where('shopping_session_id', $shopping_session_id)
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->join('discounts', 'products.discount_id', '=', 'discounts.id')
            ->select('cart_items.quantity as quantity', 'products.id as product_id', 'products.name as product_name',
                'products.price as product_price', 'products.img as product_img',
            'discounts.percentage_discount as discount')
            ->get();
    }

    public function deleteProductByShoppingSessionId($shopping_session_id, $product_id)
    {
        return $this->model->where('shopping_session_id', $shopping_session_id)
            ->where('product_id', $product_id)
            ->delete();
    }

    public function getProductIdAndQuantity($shopping_session_id) {
        return $this->model->where('shopping_session_id', $shopping_session_id)
            ->select('cart_items.product_id', 'cart_items.quantity')
            ->get();
    }

    public function deleteCartItemByShoppingSessionId($shopping_session_id)
    {
        return $this->model->where('shopping_session_id', $shopping_session_id)->delete();
    }
}
