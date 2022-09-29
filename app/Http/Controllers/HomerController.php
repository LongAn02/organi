<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ShowProductService;
use Illuminate\Http\Request;

class HomerController extends Controller
{
    protected $showProductService;
    protected $categoryService;

    public function __construct(
        ShowProductService $showProductService,
        CategoryService $categoryService
    ) {
        $this->showProductService = $showProductService;
        $this->categoryService = $categoryService;
    }

    public function index () {
        $featuredProducts = $this->showProductService->showFeaturedProductAtHome();
        $categories =  $this->categoryService->getCategories();
        return view('user.pages.section.section')->with([
            'featuredProducts' => $featuredProducts->toArray(),
            'categories' => $categories->toArray()
        ]);
    }

    public function showProductByCategory(
        Request $request
    ) {
        [$view, $success] = $this->showProductService->showProductByCategoryAtHome($request->all());
        return response()->json([
            'view' => $view,
            'success' => $success
        ]);
    }

    public function showProductShopGrid() {
        $products = $this->showProductService->showProductByDiscounts(1, '=');
        $productsSale = $this->showProductService->showProductByDiscounts(1, '>');
        return view('user.pages.shop-grid.shop-grid')->with([
            'products' => $products,
            'productsSale' => $productsSale
        ]);
    }
}
