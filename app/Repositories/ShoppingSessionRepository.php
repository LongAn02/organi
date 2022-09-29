<?php

namespace App\Repositories;

use App\Models\ShoppingSession;

class ShoppingSessionRepository extends BaseRepository
{
    public function model()
    {
        return ShoppingSession::class;
    }

    public function createShoppingSession(
        $data
    ) {
        return $this->store($data);
    }

    public function getShoppSessionIdByUserId ()
    {
        return $this->model->where('user_id', auth()->user()->id)->first()->id;
    }

    public function getShoppingSessionTotalByUserId()
    {
        return $this->model->where('user_id', auth()->user()->id)->first()->total;
    }

    public function updateTotal($total)
    {
        return $this->model->where('user_id', auth()->user()->id)->update(['total' => $total]);
    }

}
