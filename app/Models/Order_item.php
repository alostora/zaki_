<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;
    protected $table = "order_items",
    protected $fillable = [

        "item_count",
        "order_id",
        "item_color_id",//colore_id && size_id inside this table

    ];
}
