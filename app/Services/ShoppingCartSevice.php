<?php

namespace App\Services;

use App\Repositories\CartItemRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderItemRepository;
use App\Repositories\ShoppingSessionRepository;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ShoppingCartSevice
{
    protected $cartItemRepository;
    protected $shoppingSessionRepository;
    protected $orderItemRepository;
    protected $orderDetailRepository;

    public function __construct(
        CartItemRepository $cartItemRepository,
        ShoppingSessionRepository $shoppingSessionRepository,
        OrderItemRepository $orderItemRepository,
        OrderDetailRepository $orderDetailRepository,
    ) {
        $this->cartItemRepository = $cartItemRepository;
        $this->shoppingSessionRepository = $shoppingSessionRepository;
        $this->orderItemRepository = $orderItemRepository;
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function shoppingSession()
    {
        $shoppingSessionId = $this->shoppingSessionRepository->getShoppSessionIdByUserId();
        $shoppingSessionTotal = $this->shoppingSessionRepository->getShoppingSessionTotalByUserId();
        return [
            'shopping_session_id' => $shoppingSessionId,
            'shopping_session_total' => $shoppingSessionTotal
        ];
    }

    public function addCart($data)
    {
        $shoppingSession = $this->shoppingSession();
        $countCartItems = $this->cartItemRepository->countCartByShoppingSessionId($shoppingSession['shopping_session_id']);
        $cartItems = $this->cartItemRepository->getProductIdByShoppingSessionId($shoppingSession['shopping_session_id'])->toArray();
        if (empty($countCartItems)) {
            $data = [
                'shopping_session_id' => $shoppingSession['shopping_session_id'],
                'product_id' => $data['id']
            ];
            $this->cartItemRepository->addCart($data);
            $countCartItems = $countCartItems + 1;
            $this->shoppingSessionRepository->updateTotal($countCartItems);
        } else {
            $check = false;
            foreach ($cartItems as $cartItem) {
                if ($cartItem['product_id'] == $data['id']) {
                    $quantity = $cartItem['quantity'] + 1;
                    $check = true;
                    break;
                }
            }
            if ($check) {
                $this->cartItemRepository->updateQuantity($shoppingSession['shopping_session_id'], $data['id'], $quantity);
            } else {
                $data = [
                    'shopping_session_id' => $shoppingSession['shopping_session_id'],
                    'product_id' => $data['id']
                ];
                $this->cartItemRepository->addCart($data);
                $countCartItems = $countCartItems + 1;
                $this->shoppingSessionRepository->updateTotal($countCartItems);
            }
        }
    }

    public function showCart()
    {
        $shoppingSession = $this->shoppingSession();
        $arrayCart = $this->cartItemRepository->showCartByShoppingSessionId($shoppingSession['shopping_session_id'])->toArray();
        foreach ($arrayCart as $key => $value) {
            if ($value['discount'] == 0) {
                $price = $value['product_price'] * $value['quantity'];
                $value['price'] = $price;
                $arrayCart[$key] = $value;
            } else {
                $price = ($value['product_price']-($value['product_price']*($value['discount']/100)))*$value['quantity'];
                $value['price'] = $price;
                $arrayCart[$key] = $value;
            }
        }
        return $arrayCart;
    }

    public function sumPrice()
    {
        $arrayCart = $this->showCart();
        $sumPrice = 0;
        foreach ($arrayCart as $cart) {
            $sumPrice += $cart['price'];
        }
        return $sumPrice;
    }

    public function deleteProduct($data)
    {
        $shoppingSession = $this->shoppingSession();
        $delete = $this->cartItemRepository->deleteProductByShoppingSessionId($shoppingSession['shopping_session_id'], $data['product_id']);
        $success = 0;
        if ($delete) {
            $success = 1;
            $countCartItems = $this->cartItemRepository->countCartByShoppingSessionId($shoppingSession['shopping_session_id']);
            $this->shoppingSessionRepository->updateTotal($countCartItems);
        }
        $arrayCart = $this->showCart();
        $sumPrice = $this->sumPrice();
        $view_cart =  view('user.ajax.shopping-cart')->with([
            'arrayCart' => $arrayCart
        ])->render();

        return [
            $success,
            $view_cart,
            $sumPrice,
        ];
    }

    public function updateQuantity ($data)
    {
        $shoppingSession = $this->shoppingSession();
        $updateQuantity = $this->cartItemRepository->updateQuantity($shoppingSession['shopping_session_id'], $data['product_id'], $data['quantity']);
        $success = 0;
        if ($updateQuantity){
            $success = 1;
        }
        $arrayCart = $this->showCart();
        $product = collect($arrayCart)->where('product_id', $data['product_id'])->first();
        $sumPrice = $this->sumPrice();
        return [
            $success,
            $sumPrice,
            $success ? $product['price'] : null,
        ];
    }

    public function byProduct()
    {
        $order_item_id = randomTime();
        $shoppingSession = $this->shoppingSession();
        $cartItems = $this->cartItemRepository->getProductIdAndQuantity($shoppingSession['shopping_session_id']);
        $check = false;
        foreach ($cartItems  as $cartItem){
            $data = [
                'order_id' => $order_item_id,
                'product_id' => $cartItem['product_id'],
                'quantity' => $cartItem['quantity']
            ];
            $check = $this->orderItemRepository->createOrderItem($data) ? true : false;
        }
        $this->cartItemRepository->deleteCartItemByShoppingSessionId($shoppingSession['shopping_session_id']);
        $this->shoppingSessionRepository->updateTotal(0);
        $dataOrderDetail = [
            'order_id' => $order_item_id,
            'user_id' => auth()->user()->id
        ];
        !$check ?: $create = $this->orderDetailRepository->createOrderDetails($dataOrderDetail) ;
        return !empty($create);
    }
}
