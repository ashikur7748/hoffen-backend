<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function AddProduct(Request $request){

        $file = $request->product_image;

        // $imageName = time().'.'.$request->product_image->getClientOriginalExtension();
        $upload = $file->move(public_path('images/products/'), $request->product_image);
        dd($upload);
            Product::create([
                'cat_id' => $request->cat_id,
                'title' => $request->title,
                'description' => $request->description,
                'product_image' => $request->product_image,
            ]);

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
    public function AddCategory(Request $request){
        try {
            Category::create([
                'product_type' => $request->product_type,
                'category_name' => $request->category,
            ]);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }


public function OrderListShow(){
    try {
        return Order::all();
    } catch(\Exception $e) {
        return $e->getMessage();
    }

}

}
