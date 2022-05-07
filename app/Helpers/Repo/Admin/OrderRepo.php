<?php

namespace App\Helpers\Repo\Admin;
use App\Helpers\Repo\Repo;


class OrderRepo extends Repo{

	public static function OrderCreateValidate(){
		return [
            'id' => 'nullable',
            'item_color_id' => 'required|array|max:30',
            'item_color_id.*' => 'required|integer|max:30000',

            'item_count' => 'required|array|max:30',
            'item_count.*' => 'required|integer|max:3000',

            'user_id' => 'required',
            'paymentMethod' => 'required|in:online,cash',
            'total_price' => 'required|integer|min:1|max:100000',
            'discountCopon' => 'nullable|integer|min:1000|max:9999',
            'shippingValue' => 'integer|max:10000',
            'shippingDetails' => 'max:700',
            'notes' => 'max:700',

        ];
	}




    public static function UserCreateValidate($request){
        return [
            "id" => "max:9999999999",
            "name" => "required|max:50",
            'email' => 'unique:users,email,'.$request->id.'|max:50',
            'phone' => 'required|unique:users,phone,'.$request->id.'|max:20',
            'shippingAddress' => 'required|max:250',
            'city_id' => 'integer|max:100000',
            
        ];
    }


}