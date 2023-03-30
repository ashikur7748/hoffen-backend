<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function AddCompany(Request $request){

        $companyStore = Company::create([
            'company_name' => $request->company_name,
        ]);


        if ($companyStore){
            return response()->json([
                'message'=>'Company Add Successfully !!'
            ]);
        }else{
            return ['massage'=>'Failed to add Company !!'];
        }

    }
}
