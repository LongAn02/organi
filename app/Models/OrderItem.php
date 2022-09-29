<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class OrderItem extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'order_items';

    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'quantity',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
