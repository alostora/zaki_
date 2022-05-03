<?php

namespace App\Helpers\Repo\Admin;
use App\Helpers\Repo\Repo;


class OrderRepo extends Repo{

	public static function OrderCreateValidate(){
		return [
            'id' => 'nullable',
            'item_color_id' => 'required|array|max:30',
            'user_id' => 'required',
            'paymentMethod' => 'required|in:online,cash',
            'shippingDetails' => 'required|max:700',
            'notes' => 'required|max:700',
            'discountCopon' => 'integer|min:100000|max:999999',
            'shippingValue' => 'integer|max:10000',

        ];
	}




    public static function UserCreateValidate($request){
        return [
            "name" => "required|max:50",
            'email' => 'unique:users,email,|max:50',
            'phone' => 'required|unique:users,phone,|max:20',
            'shippingAddress' => 'required|max:250',
            'city_id' => 'integer|max:100000',
            
        ];
    }


}