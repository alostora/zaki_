<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = [

        'cityName',

        'cityNameAr',

        'country_id',
    ];

    protected $hidden = [

        'cityName',

        'cityNameAr',

        'country_id',

        'updated_at',

        'created_at'
    ];

    protected $appends = [

        'name',

        'country_name',

        'operations'
    ];

    public function getNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->cityNameAr : $this->cityName;
    }

    public function getCountryNameAttribute()
    {
        $country = Country::find($this->country_id);

        return $country->countryName;
    }

    public function getOperationsAttribute()
    {
        return [

            "edit" => url('admin/City/edit/' . $this->id),

            "delete" => url('admin/City/delete/' . $this->id),
        ];
    }

    public function states(): HasMany
    {
        return $this->hasMany(State::class, 'city_id', 'id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
