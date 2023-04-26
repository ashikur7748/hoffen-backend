<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function store (Request $request){
        try {
            $file = $request->file('image');
            $imageName = Str::random().'.'.$file->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('news/', $file,$imageName);

            News::create([
                'datetime' => $request->datetime,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName,
            ]);
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show (){
        try {
            return News::all();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit (Request $request){
        try {
            return News::where('id',$request->id)->get();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update (Request $request){
        try {

            $oldImage = News::where('id', $request->id)->get();
            $oldImageName = $oldImage[0]->image;

            if($request->hasFile('image')){

                // remove old image
                if($request->image){
                    $exists = Storage::disk('public')->exists("news/{$oldImageName}");
                    if($exists){
                        Storage::disk('public')->delete("news/{$oldImageName}");
                    }
                }

                $file = $request->file('image');
                $imageName = Str::random().'.'.$file->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('news/', $file,$imageName);

                News::where('id', $request->id)
                    ->update([
                        'datetime' => $request->datetime,
                        'title' => $request->title,
                        'description' => $request->description,
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
            $imageDelete = News::where('id', $request->id)->get();
            $imageDeleteFromFolder = $imageDelete[0]->image;
            Storage::disk('public')->delete("news/{$imageDeleteFromFolder}");

            // Delete from database
            News::where('id', $request->id)->delete();

        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }
}
