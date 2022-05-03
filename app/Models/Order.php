<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'orderCode',
        'status',//['new','confirmed','delivey_accept',......]
        'shippingDetails',
        'notes',
        
        'paymentMethod',//[online,cash]
        
        'total_price',
        'discountCopon',
        'shippingValue',

        'user_id',
        'admin_id',
        'delivery_id'
    ];


    public function order_items(){
        return $this->hasMany('App\Models\Order_item','order_id');
    }
}
