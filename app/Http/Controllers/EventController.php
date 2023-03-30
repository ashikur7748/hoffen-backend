<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Event;

class EventController extends Controller
{
    public function store (Request $request){
        try {
            $file = $request->file('image');
            $imageName = Str::random().'.'.$file->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('event/', $file,$imageName);

            Event::create([
                'datetime' => $request->datetime,
                'title' => $request->title,
                'venue' => $request->venue,
                'description' => $request->description,
                'image' => $imageName,
            ]);
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show (){
        try {
            return Event::all();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit ($id){
        try {

        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update (Request $request){
        try {
            if($request->hasFile('image')){

                // remove old image
                if($request->image){
                    $exists = Storage::disk('public')->exists("event/{$request->image}");
                    if($exists){
                        Storage::disk('public')->delete("product/image/{$request->image}");
                    }
                }

                $file = $request->file('image');
                $imageName = Str::random().'.'.$file->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('event/', $file,$imageName);
            }
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete (Request $request){
        try {

        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }
}
