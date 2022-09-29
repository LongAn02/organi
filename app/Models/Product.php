<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'price',
        'category_id',
        'discount_id',
        'status',
        'img',
        'description',
    ];

    public function cart_items()
    {
        return $this->belongsTo(CartItem::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function discount(){
        return $this->belongsTo(Discount::class, 'discount_id');
    }
}
