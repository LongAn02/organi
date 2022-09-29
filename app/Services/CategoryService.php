<?php

namespace App\Services;

use App\Repositories\CategoryRepostory;
use App\Repositories\ProductRepository;

class CategoryService
{
    protected $categoryRepostory;
    protected $productRepository;

    public function __construct(
        CategoryRepostory $categoryRepostory,
        ProductRepository $productRepository
    ) {
        $this->categoryRepostory = $categoryRepostory;
        $this->productRepository = $productRepository;
    }

    public function getCategories()
    {
        return $this->categoryRepostory->getAllCategories();
    }
}
