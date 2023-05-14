<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;

class ProductController extends Controller
{
    public function show (){
        try {
            return Product::all();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function store (Request $request){
        try {
            $file = $request->file('image');
            $imageName = Str::random().'.'.$file->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('products/', $file,$imageName);

            Product::create([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'title' => $request->title,
                'description' => $request->description,
                'videolink' => $request->videolink,
                'image' => $imageName,
            ]);
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit (Request $request){
        try {
            return Product::where('id',$request->id)->get();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update (Request $request){
        try {

            $oldImage = Product::where('id', $request->id)->get();
            $oldImageName = $oldImage[0]->image;

            if($request->hasFile('image')){

                // remove old image
                if($request->image){
                    $exists = Storage::disk('public')->exists("products/{$oldImageName}");
                    if($exists){
                        Storage::disk('public')->delete("products/{$oldImageName}");
                    }
                }

                $file = $request->file('image');
                $imageName = Str::random().'.'.$file->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('products/', $file,$imageName);

                Product::where('id', $request->id)
                    ->update([
                        'category_id' => $request->category_id,
                        'subcategory_id' => $request->subcategory_id,
                        'title' => $request->title,
                        'description' => $request->description,
                        'videolink' => $request->videolink,
                        'image' => $imageName,
                    ]);
            }
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete (Request $request){
        try {
            // Delete from folder
            $imageDelete = Product::where('id', $request->id)->get();
            $imageDeleteFromFolder = $imageDelete[0]->image;
            Storage::disk('public')->delete("products/{$imageDeleteFromFolder}");

            // Delete from database
            Product::where('id', $request->id)->delete();

        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function CategoryWiseShowProduct (Request $request){
        try {
            return Product::where('category_id',$request->cat_id)->get();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function SubCategoryWiseShowProduct (Request $request){
        try {
            return Product::where('category_id',$request->cat_id)->get();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function FilterProductSubCategoryWise (Request $request){
        try {
            return Product::where('subcategory_id',$request->sub_id)->get();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function SubCategoryList (Request $request){
        try {
            return SubCategory::where('category_id',$request->cat_id)->get();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }
}
