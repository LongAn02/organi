<?php

namespace App\Repositories;

use App\Models\OrderItem;

class OrderItemRepository extends BaseRepository
{
    public function model()
    {
        return OrderItem::class;
    }

    public function createOrderItem($data)
    {
        return $this->store($data);
    }

    public function getOrderItemsByOrderId($order_id){
        return $this->where('order_id', $order_id)->get();
    }
}
