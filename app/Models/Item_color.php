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
        'size_id',
        'qty',
    ];




    protected $appends = [
        'colors',
        'sizes',
    ];





    public function getColorsAttribute(){
        return Color::find($this->color_id);
    }


    public function getSizesAttribute(){
        return Size::find($this->size_id);
    }
}
