<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;
    protected $table = "order_items";
    protected $fillable = [
        "item_count",
        "order_id",
        "item_color_id",//colore_id && size_id inside this table
    ];



    protected $appends = [
        'item_colors_sizes',
        //'item_price',
    ];





    public function getItemColorsSizesAttribute(){
        $item_color = Item_color::find($this->item_color_id);
        $item = Item::find($item_color->item_id);
        $item->color = Color::find($item_color->color_id)->name;
        $item->size = Size::find($item_color->size_id)->name;

        return $item;

    }


    /*public function getItemPriceAttribute(){
        $item_ids = Item_color::find($this->item_color_id)->pluck('item_id');
        return Item::whereIn('id',$item_ids)->get();
    }*/



}
