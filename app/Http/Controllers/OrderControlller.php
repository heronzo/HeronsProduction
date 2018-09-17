<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Resources\Order as OrderResource;

class OrderControlller extends Controller
{
    //
    public function index(){
        $orders = Order::all();
        return OrderResource::collection($orders);
    }
    public function singleOrder($id){
        $order = Order::findOrFail($id);
        return new OrderResource($order);

    }
    public function add(Request $request){
        $order = $request->isMethod('put') ? Order::findOrFail($request->id): new Order();

        $order->id = $request->input('id');
        $order->name = $request->input('order_name');
        $order->supplier_id = $request->input('headquater_id');

        if ($order->save()){
            return new Order([$order]);
        }
    }
    public function delete($id){
        $order = Order::findOrFail($id);

        if ($order->delete()){
            return new Order($order);
        }
    }
}
