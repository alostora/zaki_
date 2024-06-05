<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = "order_items";
    protected $fillable = [

        "order_id",

        "item_id",
        
        "property_id",

        "quantity",

        "measurement_unit_id",

        "price",

        "shippingDetails",

        "notes",
    ];


}
