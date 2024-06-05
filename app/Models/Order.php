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

        'status', //['new','confirmed','delivey_accept',......]

        'shippingDetails',

        'notes',

        'paymentMethod', //[online,cash]

        //'total_price',

        'discountCopon',

        'shippingValue',

        'user_id',

        'admin_id',

        'delivery_id',

        'vandor_id',

    ];

    protected $appends = [

        'operations',

        'order_items',
    ];

    protected $casts = [

        'created_at' => 'date'
    ];

    public $hidden = [

        'updated_at',

        'discountCopon',

        'admin_id',

        'user_id',

        'delivery_id',

        'vandor_id',

        'notes',

        'shippingDetails',

        'order_items',

        'status',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function getOperationsAttribute($value)
    {

        return [

            "edit" => url('admin/Order/viewCreateOrder/' . $this->id),

            "delete" => url('admin/Order/deleteOrder/' . $this->id),

            "view" => '<button class="btn btn-warning" data-target="#items' . $this->id . '" onclick="return showItems(' . $this->id . ')"><span class="glyphicon glyphicon-eye-open"></span></button>',
        ];
    }
}
