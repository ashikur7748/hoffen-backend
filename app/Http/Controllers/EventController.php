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

    public function edit (Request $request){
        try {
            return Event::where('id',$request->id)->get();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update (Request $request){
        try {

            $oldImage = Event::where('id', $request->id)->get();
            $oldImageName = $oldImage[0]->image;

            if($request->hasFile('image')){

                // remove old image
                if($request->image){
                    $exists = Storage::disk('public')->exists("event/{$oldImageName}");
                    if($exists){
                        Storage::disk('public')->delete("event/{$oldImageName}");
                    }
                }

                $file = $request->file('image');
                $imageName = Str::random().'.'.$file->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('event/', $file,$imageName);

                Event::where('id', $request->id)
                    ->update([
                    'datetime' => $request->datetime,
                    'title' => $request->title,
                    'venue' => $request->venue,
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
            $imageDelete = Event::where('id', $request->id)->get();
            $imageDeleteFromFolder = $imageDelete[0]->image;
            Storage::disk('public')->delete("event/{$imageDeleteFromFolder}");

            // Delete from database
            Event::where('id', $request->id)->delete();

        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }
}
