<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        "order_id",
        'name',
        'phone_number',
        'address',
    ];
}
