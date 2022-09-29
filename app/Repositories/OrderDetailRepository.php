<?php

namespace App\Repositories;

use App\Models\OrderDetail;

class OrderDetailRepository extends BaseRepository
{
    public function model()
    {
        return OrderDetail::class;
    }

    public function createOrderDetails($data)
    {
        return $this->store($data);
    }

    public function getOrderDetails()
    {
        return $this->get();
    }

    public function updateStatusByOrderId($order_id)
    {
        return $this->model->where('order_id', $order_id)->update(['status' => 1]);
    }

    public function getOrderDetailByOrderId($order_id)
    {
        return $this->model->where('order_id', 'LIKE' , '%'.$order_id.'%')->get();
    }
}
