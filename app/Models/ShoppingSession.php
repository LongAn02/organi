<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ShoppingSession extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'shopping_sessions';

    protected $fillable = [
        'id',
        'user_id',
        'total',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function cart_items()
    {
        return $this->hasOne(CartItem::class);
    }
}
