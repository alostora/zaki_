<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemImage extends Model
{
    use HasFactory;

    protected $table = 'item_images';

    protected $fillable = [

        'imageName',

        'isDefault',

        'isBanner',

        'isSlider',

        'item_id',
    ];

    protected $hidden = [

        'imageName',

        'updated_at',

        'created_at'
    ];

    protected $appends = [

        'image_url',

        'operations',
    ];

    public function getImageUrlAttribute()
    {

        $imageName = url('Admin_uploads/items/' . $this->imageName);

        return '<img src="' . $imageName . '" class="table-image">';
    }

    public function getOperationsAttribute()
    {
        return [

            "delete" => url('admin/Item/ItemImage/delete/' . $this->id),
        ];
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
}
