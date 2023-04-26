<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function show()
    {
        try {
            return ContactInfo::all();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }
}
