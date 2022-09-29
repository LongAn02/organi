<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class CartItem extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'cart_items';

    protected $fillable = [
        'id',
        'quantity',
        'shopping_session_id',
        'product_id',
    ];

    public function shopping_sessions()
    {
        return $this->belongsTo(ShoppingSession::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
