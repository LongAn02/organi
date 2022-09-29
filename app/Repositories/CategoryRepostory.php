<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepostory extends BaseRepository
{
    public function model()
    {
        return Category::class;
    }

    public function getAllCategories()
    {
        return $this->get();
    }
}
