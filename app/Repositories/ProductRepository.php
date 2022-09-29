<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    public function model()
    {
        return Product::class;
    }

    public function showFeaturedProduct () {
        return $this->model->where('price', '>', 4000)
            ->where('discount_id', 1)
            ->orderByRaw('price DESC')
            ->limit(8)
            ->get();
    }

    public function showProductByDiscount(
        $discount,
        $operator = '='
    ) {
        return $this->model->where('discount_id', $operator, $discount)
            ->join('discounts','products.discount_id', '=', 'discounts.id')
            ->select('products.*', 'discounts.percentage_discount as discount')
            ->get();
    }

    public function getProduct() {
        return $this->get();
    }

    public function setProduct($data) {
        return $this->store($data);
    }

    public function deleteProductById($id) {
        return $this->deleteById($id);
    }
}
