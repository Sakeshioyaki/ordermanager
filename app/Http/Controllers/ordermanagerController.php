<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\users;
use App\orders;
use App\order_details;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\SESSION;
use phpDocumentor\Reflection\Types\Compound;
use Illuminate\Support\Facades\Redirect;

class ordemanagerController extends Controller
{
	public function order(Request $request){
		$orders = json_decode($request);
		$user_id = $request->userId;
		$current_user = User::find($user_id);
		$order = new Order();
		$order->user_id = $request->userId;
		$order->address = $request->address;
		$order->firstName = $request->firstName;
		$order->lastName = $request->lastName;
		$order->status = 1;
		$order->save();
		foreach ($orders->cart as $iteam){
			$newOrderDetail = new OrderDetail();
			$newOrderDetail->order_id = $order->id;
			$newOrderDetail->name_product = $iteam->name;
			$newOrderDetail->amount = $iteam->amount;
			$newOrderDetail->quantity = $iteam->quantity;
			$newOrderDetail->save();
		}
    return response()->json(['status'=>"OK"],['order_id'=>$order->id]);

	}


	public function getListOrder(){
		$orders = Order::get();
        return response()->json(['orders'=> $orders, 'status'=>"OK"]);
	}
}
