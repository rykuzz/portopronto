<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [

        'fname',
        'lname',
        'email',
        'phone',
        'country',
        'address',
        'city',
        'total_price',
        'status',
        'message',
        'track_order',
    ];

    public function itemorder()
    {
        return $this->hasMany(OrderItem::class);
    }
}
