<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    function getCategory () {
        return view('backend.category.category');
        
}
function PostCategory (CategoryRequest $r) {
    
    
}
function getEditCategory () {
    return view('backend.category.editcategory');
    
}
function getEditValue () {
    return view('backend.category.editvalue');
    
}
}
