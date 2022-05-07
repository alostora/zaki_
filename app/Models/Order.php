<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'orderCode',
        'status',//['new','confirmed','delivey_accept',......]
        'shippingDetails',
        'notes',
        
        'paymentMethod',//[online,cash]
        
        'total_price',
        'discountCopon',
        'shippingValue',

        'user_id',
        'admin_id',
        'delivery_id',
    ];


    protected $appends = [
        'user',
        'order_status',
        'operations',
        'order_items',
    ];


    public $hidden = [
        'updated_at',
        'created_at',
        'discountCopon',
        'admin_id',
        'user_id',
        'delivery_id',
        'notes',
        'shippingDetails',
        'order_items',
        'status',
    ];


    public function order_items(){
        return $this->hasMany('App\Models\Order_item','order_id');
    }



    public function getUserAttribute($value){
        $user = User::find($this->user_id);
        return 
        '<span>anme : </span>'.$user->name .'<br>'. 
        '<span>phone : </span>'.$user->phone.'<br>'.
        '<span>country : </span>'.$user->country.'<br>'.
        '<span>city : </span>'.$user->city.'<br>'.
        '<span>address : </span>'.$user->shippingAddress;
    }


    public function getOperationsAttribute($value){

        return [
            "edit" => url('admin/Order/viewCreateOrder/'.$this->id),
            "delete" => url('admin/Order/deleteOrder/'.$this->id),
            "view" => '<button class="btn btn-warning" data-target="#items'.$this->id.'" onclick="return showItems('.$this->id.')"><span class="glyphicon glyphicon-eye-open"></span></button>',
        ];
    }




    public function getOrderItemsAttribute($value){
        return Order_item::where('order_id',$this->id)->get();
    }



    public function getOrderStatusAttribute($value){
        $orderStatus = ['new','accepted','inOperation','operationDone','salesMan','delivered','canceled','delayed'];
        $statusHTMLSELECT = 
                            '<div class="form-group" style="width:150px">
                                <select class="form-control select2" id="'.$this->id.'" onchange="return changeOrderStatus('.$this->id.')">';
                                        
                                        foreach($orderStatus as $status){
                                            $selected = $status == $this->status ? 'selected' : '';
                                            $statusHTMLSELECT .= '<option value="'.$status.'" '.$selected.'>'.$status.'</option>';
                                        }
        $statusHTMLSELECT .= '</select>
                            </div>';


        return $statusHTMLSELECT;
    }

}
