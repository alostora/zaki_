<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Repo\Admin\OrderRepo;
use App\Models\Order;
use App\Models\User;
use App\Models\Country;
use App\Models\City;

class Orders extends Controller
{
    

    public function ordersInfo(){

        $data['data'] = Order::get();
        $data['title'] = 'order';
        $data['createPath'] = url('admin/Order/viewCreateOrder');
        $data['deletePath'] = url('admin/Order/deleteManyOrders');
        
        return view('Admin/Orders/ordersInfo',$data);
    }





    public function viewCreateOrder($id=false){
        $data['data'] = Order::find($id);
        $data['users'] = User::get();
        $data['countries'] = Country::with('cities')->get();
        return view('Admin/Orders/viewCreateOrder',$data);
    }






    public function createUser(Request $request){

        $user = $request->validate(OrderRepo::UserCreateValidate($request));
        $user['country_id'] = City::find($user['city_id'])->country_id;
        $user = User::create($user);
        session()->flash('success','Done');
        return back();

    }








}
