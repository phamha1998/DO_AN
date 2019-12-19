<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    function getAddVariant () {
        return view('backend.variant.addvariant');
            
    }
    function getEditVariant () {
        return view('backend.variant.editvariant');
            
    }
}
