<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributor;

class DistributorController extends Controller
{
    public function store (Request $request){
        try {
             Distributor::create([
                'distributor_name' => $request->distributor_name,
                'person' => $request->owner_name,
                'mobile' => $request->phone,
                'email' => $request->email,
                'social_media' => $request->social_media,
            ]);
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show (){
        try {
            return Distributor::all();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit (Request $request){
        try {
            return Distributor::where('id',$request->id)->get();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update (Request $request){
        try {
            Distributor::where('id', $request->id)
                ->update([
                    'distributor_name' => $request->distributor_name,
                    'person' => $request->person,
                    'mobile' => $request->mobile,
                    'email' => $request->email,
                    'social_media' => $request->social_media,
                ]);
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete (Request $request){
        try {
            Distributor::where('id', $request->id)->delete();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

}
