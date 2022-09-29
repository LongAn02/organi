<?php

namespace App\Services;

use App\Repositories\CategoryRepostory;
use App\Repositories\ProductRepository;

class ShowProductService
{
    protected $productRepository;

    public function __construct(
        ProductRepository $productRepository,
    ) {
        $this->productRepository = $productRepository;
    }

    public function showFeaturedProductAtHome ()
    {
        return $this->productRepository->showFeaturedProduct();
    }

    public function showProductByDiscounts(
        $discount,
        $operator
    ) {
        return $this->productRepository->showProductByDiscount($discount, $operator);
    }

    public function showProductByCategoryAtHome (
      $data
    ) {
        $products = $this->productRepository->showFeaturedProduct();
        $success = 0;
        if ($products) {
            $success = 1;
        }
        if ($data['id'] != 0){
            foreach ($products as $product) {
                if ($product['category_id'] == $data['id']) {
                    $featuredProducts[] = $product;
                }
            }
        } else {
            foreach ($products as $product) {
                $featuredProducts[] = $product;
            }
        }
        $view = view('user.ajax.featured-product')->with([
            'featuredProducts' => $featuredProducts
        ])->render();
        return [
            $view,
            $success
        ];
    }
}
