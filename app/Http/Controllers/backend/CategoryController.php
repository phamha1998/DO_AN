<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\{CategoryRequest,EditCategoryRequest};
use App\models\category;

class CategoryController extends Controller
{
    function getCategory () {
        $data['category']=category::all();
     
        return view('backend.category.category',$data);

}
function PostCategory (CategoryRequest $r) {
    $cate=new category;
    $cate->name= $r->name;
    $cate->parent= $r->parent;
    $cate->save();
     return redirect()->back()->with('thongbao','Đã thêm thành công danh mục');



}
function getEditCategory ($id) {
    $data['cate']=category::find($id);
    $data['category']=category::all();

    
    return view('backend.category.editcategory',$data);

}
function PostEditCategory(EditCategoryRequest $r, $id){
    $cate=category::find($id);
    $cate->name= $r->name;
    $cate->parent= $r->parent;
    $cate->save();
     return redirect()->back()->with('thongbao','Đã sửa thành công danh mục');



   


}

}
