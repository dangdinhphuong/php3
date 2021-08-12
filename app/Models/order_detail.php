<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'name',
        'slug',
        'price',
        'quantity',
        'image',
    ];
    public function getPriceVAttribute() {
        $price_v =number_format($this->attributes['price'], 0, '', '.') . ' đ';
        return $price_v;
    }
}
