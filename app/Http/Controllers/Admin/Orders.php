<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Repo\Admin\OrderRepo;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Item;
use App\Models\Item_color;
use App\Models\User;
use App\Models\Country;
use App\Models\City;

class Orders extends Controller
{
    

    public function ordersInfo(){

        $data['data'] = Order::get()/*->makeVisible('order_items')*/;
        $data['title'] = 'order';
        $data['createPath'] = url('admin/Order/viewCreateOrder');
        $data['deletePath'] = url('admin/Order/deleteManyOrders');
        

        //return $data['data'];
        return view('Admin/Orders/ordersInfo',$data);
    }





    public function viewCreateOrder($id=false){
        $data['data'] = Order::find($id);
        if(!empty($data['data'])){
            $data['order_itemss'] = Order_item::where('order_id',$data['data']->id)->get();
        }

        $data['users'] = User::get();
        $data['items'] = Item::get();
        $data['countries'] = Country::with('cities')->get();
        //return $data;
        return view('Admin/Orders/viewCreateOrder',$data);
    }






    public function createUser(Request $request){

        $user = $request->validate(OrderRepo::UserCreateValidate($request));
        $user['country_id'] = City::find($user['city_id'])->country_id;
        if (!empty($user['id'])) {
            $user = User::where('id',$user['id'])->update($user);
        }else{
            $user = User::create($user);
        }
        session()->flash('success','Done');
        return back();

    }





    public function createOrder(Request $request){
        $data = $request->validate(OrderRepo::OrderCreateValidate($request));
        $data['orderCode'] = \Str::random(6);
        
        unset($data['item_color_id'],$data['item_count']);

        if (empty($data['id'])) {
            $order = Order::create($data);
        }else{
            $order = Order::find($data['id']);
            $order->update($data);
        }

        if (count($request->item_color_id) == count($request->item_count) ) {
            Order_item::where('order_id',$order->id)->delete();
            foreach($request->item_color_id as $key=>$item_color_id){
                Order_item::create([
                    'item_count' => $request->item_count[$key],
                    'order_id' => $order->id,
                    'item_color_id' => $item_color_id,
                ]);
            }
        }

        session()->flash('success','order created successfully');
        return back();
    }





    public function changeOrderStatus($id,$status){
        $data['status'] = Order::where('id',$id)->update(['status'=>$status]);
        return $data;
    }





    public function getUser($user_id){
        $data['status'] = true;
        $data['user'] = User::find($user_id);

        return $data;
    }




    public function oneItemInfo($item_id){
        $data['status'] = true;

        $itemColor = Item_color::find($item_id);
        $item = Item::find($itemColor->item_id);

        $data['itemPrice'] = $item->itemPrice;
        $data['item_count'] = $itemColor->qty;

        return $data;
    }





    public function deleteOrder($id){
        Order::where('id',$id)->delete();
        session()->flash('warning','Done');
        return back();
    }





    public function deleteManyOrders($ids){
        $ids = json_decode($ids);
        Order::destroy($ids);
        session()->flash('warning','Done');
        return back();
    }










}
