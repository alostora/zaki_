<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'name',

        'email',

        'phone',

        'image',

        'gender',

        'birthDate',

        'password',

        'country_id',

        'city_id',

        'shippingAddress',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

        'image',

        'gender',

        'birthDate',

        'image_path',

        'password',

        'verify_token',

        'country_id',

        'city_id',

        'api_token',

        'remember_token',

        'email_verified_at',

        'created_at',

        'updated_at',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [

        'image_url',

        'image_path',

        'country',

        'city',

        'operations'
    ];

    public function getImageUrlAttribute()
    {
        $image = url('uploads/users/' . $this->image);
        return '<img src="' . $image . '" class="table-image">';
    }

    public function getImagePathAttribute()
    {
        return url('uploads/users/' . $this->image);
    }

    public function getCountryAttribute()
    {
        $country = Country::find($this->country_id);

        return $country ? $country->name : null;
    }

    public function getCityAttribute()
    {
        $city = City::find($this->city_id);

        return $city ? $city->name : null;
    }

    public function getOperationsAttribute()
    {
        return [

            "edit" => url('admin/User/edit/' . $this->id),

            "delete" => url('admin/User/delete/' . $this->id),
        ];
    }
}
