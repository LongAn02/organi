<?php

namespace App\Http\Controllers;

use App\Services\ShoppingCartSevice;
use App\Services\ShoppingSessionService;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    protected $shoppingCartSevice;
    protected $shoppingSessionService;

    public function __construct(
        ShoppingCartSevice $shoppingCartSevice,
        ShoppingSessionService $shoppingSessionService
    ) {
        $this->shoppingCartSevice = $shoppingCartSevice;
        $this->shoppingSessionService = $shoppingSessionService;
    }

    public function addProductToCart(Request $request)
    {
        return $this->shoppingCartSevice->addCart($request->all());
    }

    public function showCart()
    {
        $arrayCart = $this->shoppingCartSevice->showCart();
        $sumPrice =  $this->shoppingCartSevice->sumPrice();
        $shoppingSessionId = $this->shoppingSessionService->getShoppingSessionId();
        return view('user.pages.shopping-cart.shopping-cart')->with([
            'arrayCart' => $arrayCart,
            'sumPrice' => $sumPrice,
            'shoppingSession' => $shoppingSessionId
        ]);
    }

    public function deleteProductFromCart(Request $request)
    {
        [$success, $view_cart, $sumPrice] = $this->shoppingCartSevice->deleteProduct($request->all());
        return response()->json([
            'success' => $success,
            'view_cart' => $view_cart,
            'sumPrice' => $sumPrice
        ]);
    }

    public function updateProductFromCart(Request $request)
    {
        [$success, $sumPrice, $price] = $this->shoppingCartSevice->updateQuantity($request->all());
        if($success) {
           $data = [
               'success' => $success,
               'sumPrice' => $sumPrice,
               'price' => $price
           ];
        }
        return response()->json($data ?? ['success' => $success]);
    }

    public function byProductFromCart()
    {
        $success = $this->shoppingCartSevice->byProduct();
        return response()->json([
            'success' => $success
        ]);
    }
}
