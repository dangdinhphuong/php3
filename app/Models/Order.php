<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status',
    ];
    public function order_detail()
    {
        return $this->hasMany(order_detail::class,"order_id");
    }
    public function ShipmentDetails()
    {
        return $this->hasMany(ShipmentDetails::class, 'order_id');
    }
}
