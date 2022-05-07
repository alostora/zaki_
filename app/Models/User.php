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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
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



    public function getImageUrlAttribute($value){
        $image = url('uploads/users/'.$this->image);
        return '<img src="'.$image.'" class="table-image">';
    }


    public function getImagePathAttribute($value){
        return url('uploads/users/'.$this->image);
    }


    public function getCountryAttribute($value){
        return Country::find($this->country_id)->name;
    }


    public function getCityAttribute($value){
        return City::find($this->city_id)->name;
    }



    public function getOperationsAttribute($value){

        return [
            "edit" => url('admin/User/viewCreateUser/'.$this->id),
            "delete" => url('admin/User/deleteUser/'.$this->id),
        ];
    }

}
