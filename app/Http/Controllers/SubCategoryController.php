<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function show (){
        try {
            return SubCategory::all();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function store (Request $request){
        try {
            SubCategory::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
            ]);
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit (Request $request){
        try {
             $sub = SubCategory::where('id',$request->id)->get();
             $cat = Category::where('id',$sub[0]->category_id)->get();
//            $cat = Category::where('id',$request->id)->get();
            return ['category' =>$cat[0]->name,'sub_category'=>$sub[0]->name];
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update (Request $request){
        try {
            SubCategory::where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'category_id' => $request->category_id,
                ]);
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete (Request $request){
        try {
            SubCategory::where('id', $request->id)->delete();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }
}
