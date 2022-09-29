<?php

namespace App\Repositories;

use App\Models\Discount;

class DiscountRepository extends BaseRepository
{
    public function model()
    {
        return Discount::class;
    }

    public function getDiscount() {
        return $this->get();
    }
}
