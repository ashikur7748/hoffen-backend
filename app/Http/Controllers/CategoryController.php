<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show (){
        try {
            return Category::all();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function store (Request $request){
        try {
            Category::create([
                'name' => $request->name,
            ]);
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit (Request $request){
        try {
            return Category::where('id',$request->id)->get();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update (Request $request){
        try {
            Category::where('id', $request->id)
                ->update([
                    'name' => $request->name,
                ]);
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete (Request $request){
        try {
            Category::where('id', $request->id)->delete();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }
}
