<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Str;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Http\Requests\{AddProductRequest,EditProductRequest,AddAttrRequest};
 use App\Http\Requests\{EditAttrRequest,EditValueRequest,AddValueRequest};
 use App\models\{product,attribute,values,category,variant};

class ProductController extends Controller
{
    function getAddProduct () {
        $data['attrs']=attribute::all();
        $data['categorys']=category::all();
        return view('backend.product.addproduct',$data);

    }
    function  PostAddProduct(AddProductRequest $r) {
        $product= new product;
        $product->product_code= $r->product_code;
        $product->name= $r->product_name;
        $product->price= $r->product_price;
        $product->featured= $r->featured;
        $product->state= $r->product_state;
        $product->info= $r->info;
        $product->describe= $r->description;
        if($r->hasFile('product_img'))
        {
            $file= $r->product_img;
            $fileName=str_random(9).'.'.$file->getClineOriginalExtention();
            $file->move('public/backend/img',$fileName);
            $product->img=$fileName;


        }else
        {
            $product->img='no-img.jpg';
        }
        $product->category_id= $r->category;
        $product->save();
        $mang=array();
        foreach ($r->attr as $value) 
        {
            foreach ($value as  $item) {
                $mang[]=$item;
            }
        }
        $product->values()->Attach($mang);
        $variant= get_combinations($r->attr);
        foreach ($variant as  $var) {
            $vari= new variant;
            $vari->product_id= $product->id; //product->id là cái product này vừa dc tạo wor trên sau đó lấy id xuống để thêm biến thể luôn
            $vari->save();
             $vari->values()->Attach($var);


           

    }
    return redirect('/admin/product/add-variant/'.$product->id);
}

    function  PostEditProduct(EditProductRequest $r,$id) {
        $product= product::find($id);
        $product->product_code= $r->product_code;
        $product->name= $r->product_name;
        $product->price= $r->product_price;
        $product->featured= $r->featured;
        $product->state= $r->product_state;
        $product->info= $r->info;
        $product->describe= $r->description;
        if($r->hasFile('product_img'))
        
        {   if($product->img!='no-img.jpg')
            {
            unlink('public/backend/img/'.$product->img);

            }
            
            $file= $r->product_img;
            $fileName=Str::slug('$r->product_name','-').'.'.$file->getClineOriginalExtention();
            $file->move('public/backend/img',$fileName);
            $product->img=$fileName;


        }
        $product->category_id= $r->category;
        $product->save();
        //sửa value
        $mang=array();
        foreach ($r->attr as $value) 
        {
            foreach ($value as  $item) {
                $mang[]=$item;
            }
        }
        $product->values()->sync($mang);
        //sửa variant
        $variant= get_combinations($r->attr);
        foreach ($variant as $var) {
            if(check_var($product,$var))
            {
                $vari=new variant;
                $vari->product_id=$product->id;
                $vari->save();
                $vari->values()->Attach($var);
            }
        }

       
            
        
        return redirect()->back()->with('thongbao','Đã sửa thành công!');
       
        




    }
    function getEditProduct (request $r,$id) {
        $data['attrs']=attribute::all();
        $data['product']=product::find($id);
        $data['category']=category::all();


        return view('backend.product.editproduct',$data);

    }
    function getListProduct () {
        
        $data['products']=product::paginate(3);

        return view('backend.product.listproduct',$data);

    }
    function DelProduct($id){
        product::destroy($id);
        
        return redirect()->back()->with('thongbao','Đã xóa thành công sản phẩm');
        

    }
    //attr
    function getAttr () {
        $data['attrs']=attribute::all();


        return view('backend.attr.attr',$data);

    }
    function getEditAttr ($id) {
        $data['attr']=attribute::find($id);

        return view('backend.attr.editattr',$data);


    }
    function PostEditAttr(EditAttrRequest $r, $id){
        $attr= attribute::find($id);
        $attr->name = $r->attr_name;
        $attr->save();
        
        return redirect()->back()->with('thongbao','Đã sửa thuộc tính thành công');
        
    }
    function DelAttr($id){
        $attr= attribute::find($id);

        attribute::destroy($id);
        
        return redirect()->back()->with('thongbao','Đã xóa thành công thuộc tính');
        
        


    }
    

    //attr-post
    function AddAttr(AddValueRequest $r){
        $attr= new attribute;
        $attr->name = $r->attr_name;
        $attr->save();
        
        return redirect()->back()->with('thongbao','Đã thêm thuộc tính thành công');
        
        

    }
    //variant
    function getAddVariant ($id) {
            $data['product']=product::find($id);
        return view('backend.variant.addvariant',$data);

    }
    function getEditVariant ($id) {
        $data['product']=product::find($id);

        return view('backend.variant.editvariant',$data);

    }
    function PostAddVariant(request $r, $id){
        foreach ($r->variant as $key => $value) {

            $vari= variant::find($key);
            $vari->price=$value;
            $vari->save();

        }
        return redirect('admin/product')->with('thongbao','Đã thêm thành công giá biến thể');
    }
    function PostEditVariant( request $r,$id){
        foreach ($r->variant as $key => $value) {

            $vari= variant::find($key);
            $vari->price=$value;
            $vari->save();

        }
        return redirect('admin/product')->with('thongbao','Đã sửa thành công giá biến thể');

    }
    function DelVariant($id){
        variant::destroy($id);
        return redirect()->back()->with('thongbao','Đã xóa biến thể thành công');

    }
    
     //add -value
     function AddValue(AddValueRequest $r){
        $value= new values;
        $value->attr_id= $r->attr_id;
        $value->value= $r->value_name;
        $value->save();
        
        return redirect()->back()->with('thongbao','Đã thêm giá trị thuộc tính thành công');



    }
    //edit-value
    function getEditValue ($id) {
        $data['value']=values::find($id);


        return view('backend.variant.editvalue',$data);

    }
   //post-edit value
   function PostEditValue(EditValueRequest $r,$id){
       $value=Values::find($id);
       

       $value->value= $r->value_name;
        
       $value->save();
        
        return redirect()->back()->with('thongbao','Đã sửa giá trị thành công');
        



   }
   function DelValue($id){
       Values::destroy($id);
       
       return redirect()->back()->with('thongbao','Đã xóa thành công giá trị');
       

   }
}

