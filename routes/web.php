<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomerController;
use App\Http\Controllers\CartItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function () {
    Route::get('login-admin', function () {
        return view('admin.login-admin');
    })->name('admin.view.login');


    Route::group(['prefix' => 'view', 'middleware' => 'role'], function () {
        Route::get('home-admin', function () {
            return view('admin.pages.dashboard');
        })->name('admin.view.home');

        Route::group(['prefix' => 'the-poster'], function () {
            Route::get('view-post',[AdminController::class,'viewPoster'])->name('admin.the-poster.view.post');
            Route::get('add-product', [AdminController::class, 'viewAddProduct'])->name('admin.the-poster.view.add-product');
            Route::post('add-product-list', [AdminController::class, 'addProduct'])->name('admin.the-poster.add-product');

            Route::get('list-product', [AdminController::class, 'showProduct'])->name('admin.the-poster.view.list-product');
            Route::post('delete-product-from-admin', [AdminController::class, 'deleteProductFromListProductAdmin'])->name('admin.the-poster.delete.product');
            Route::post('update-product-from-admin', [AdminController::class, 'updateProductAdmin'])->name('admin.the-poster.update-admin.product');
            Route::post('update-product', [AdminController::class, 'updateProduct'])->name('admin.the-poster.update.product');

        });

        Route::group(['prefix' => 'list-table'], function () {
            Route::get('table-users', [AdminController::class, 'showUser'])->name('admin.view.table-users');
            Route::get('table-orders', [AdminController::class, 'showOrderDetails'])->name(
                'admin.view.table-orders'
            );
            Route::post('orders', [AdminController::class, 'showOrder'])->name('admin.view.orders');
            Route::post('orders-update-status', [AdminController::class, 'updateStatus'])->name(
                'admin.view.update-status'
            );
            Route::post('users-update-role', [AdminController::class, 'updateRole'])->name(
                'admin.view.update-role'
            );
            Route::post('users-remove-role', [AdminController::class, 'removeRole'])->name(
                'admin.view.remove-role'
            );
            Route::post('search-order-detail', [AdminController::class, 'searchOrderDetail'])->name(
                'admin.view.search-order-detail'
            );
            Route::post('search-User', [AdminController::class, 'searchUser'])->name('admin.view.search-user');
        });
    });

    Route::post('login', [AdminController::class, 'loginAdmin'])->name('admin.login');
    Route::get('logout-admin', [AdminController::class, 'logoutAdmin'])->name('admin.logout');
});


Route::group(['prefix' => 'ogani'], function () {
    Route::group(['prefix' => 'view'], function () {
        Route::get('login', function () {
            return view('login');
        })->name('user.view.login');

        Route::get('logout', [UserController::class, 'logoutUser'])->name('user.logout');

        Route::get('register', function () {
            return view('register');
        })->name('user.view.register');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::group(['prefix' => 'view'], function () {
            Route::get('home', [HomerController::class, 'index'])->name('user.view.home');
            Route::get('shop-grid', [HomerController::class, 'showProductShopGrid'])->name('user.view.shop-grid');
        });
        Route::group(['prefix' => 'category'], function () {
            Route::post('products', [HomerController::class, 'showProductByCategory'])->name(
                'user.category.product.home'
            );
        });

        Route::group(['prefix' => 'shopping-cart', 'middleware' => 'login'], function () {
            Route::post('add-product', [CartItemController::class, 'addProductToCart'])->name(
                'user.shopping-cart.add.product'
            );
            Route::post('delete-product', [CartItemController::class, 'deleteProductFromCart'])->name(
                'user.shopping-cart.delete.product'
            );
            Route::post('update-product', [CartItemController::class, 'updateProductFromCart'])->name(
                'user.shopping-cart.update.product'
            );
            Route::post('by-product', [CartItemController::class, 'byProductFromCart'])->name(
                'user.shopping-cart.by.product'
            );
            Route::get('shopping-cart', [CartItemController::class, 'showCart'])->name('user.view.shopping-cart');
        });

        Route::post('login', [UserController::class, 'loginUser'])->name('user.login');
        Route::post('register', [UserController::class, 'registerUser'])->name('user.register');
    });
});
