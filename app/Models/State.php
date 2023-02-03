<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class State extends Model
{
    use HasFactory;

    protected $table = 'states';

    protected $fillable = [

        'stateName',

        'stateNameAr',

        'city_id',

        'country_id',
    ];

    protected $hidden = [

        'stateName',

        'stateNameAr',

        'city_id',

        'country_id',

        'updated_at',

        'created_at'
    ];

    protected $appends = [

        'name',

        'country',

        'city',

        'operations'
    ];


    public function getNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->stateName : $this->stateName;
    }

    public function getCountryAttribute()
    {
        $country = Country::find($this->country_id);
        if (!empty($country)) {
            return $country->name;
        }
    }

    public function getCityAttribute()
    {
        $city = City::find($this->city_id);
        if (!empty($city)) {
            return $city->name;
        }
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
  
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function getOperationsAttribute()
    {
        return [

            "edit" => url('admin/State/edit/' . $this->id),

            "delete" => url('admin/State/delete/' . $this->id),

        ];
    }
}
