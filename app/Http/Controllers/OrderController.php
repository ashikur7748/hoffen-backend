<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function show(){
        try {
            return Order::all();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function OrderNow(Request $request){
        try {
            Order::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'phone' => $request->phone,
                'product_name' => $request->productName,
                'massage' => $request->massage,
            ]);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
