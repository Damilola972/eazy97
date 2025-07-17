<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'fullname',
        'email',
        'phone',
        'address',
        'items',
        'total',
        'currency',
        'tracking_id',
        'status',
    ];
}
