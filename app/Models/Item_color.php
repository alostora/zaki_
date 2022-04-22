<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_color extends Model
{
    use HasFactory;
    protected $table = 'item_colors';
    protected $fillable = [
        'item_id',
        'color_id',
    ];
}
