<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Discount extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'discounts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'percentage_discount',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_id');
    }
}
