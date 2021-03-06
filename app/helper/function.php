<?php
function showErrors ($errors, $name){
    if($errors->has($name)){
                        echo'<div class="alert alert-danger alert-dismissible" role="alert">';
                        echo'<button type="button" class="close" data-dismiss="alert">&times;</button>';
                        echo'<strong>'.$errors->first($name).'</strong>';
                        echo'</div>';
    }
}
function GetCategory($mang,$parent,$shift,$act){
    foreach ($mang as $value)
     {
        if($value->parent==$parent)
        {
            if($value->id==$act){
                echo"<option  selected value='$value->id'>" .$shift.$value->name."<option>";
             }else{
                echo"<option  value='$value->id'>" .$shift.$value->name."<option>";
             }

            GetCategory($mang,$value->id,$shift.'---|',$act);
        }
    }
}
function showCate($mang,$parent,$shift){
	foreach($mang as $value){

		if($value->parent==$parent){
			echo '<div class="item-menu"><span>'.$shift.$value->name.'</span><div class="category-fix">';
            echo '<a class="btn-category btn-primary" href="/admin/category/edit/'.$value->id.'"><i class="fa fa-edit"></i></a>';
            echo '<a onclick="return Del('."'".$value['name']."'".')" class="btn-category btn-danger" href="/admin/category/del/'.$value->id.'"><i class="fas fa-times"></i></i></a>';
            echo '</div></div>';

		    showCate($mang,$value->id,$shift.'--|');

		}
    }
    
}
function attr_values($mang)
    {
        $result=array();
        foreach ($mang as $value) 
        {
            $attr=$value->attribute->name;
            $result[$attr][]=$value->value;

        }
        return $result;
        
    }
function get_combinations($arrays){
    $result= array(array());
    foreach ($arrays as $property => $property_values) {
        $tmp= array();
        foreach ($result as $result_item) {

            foreach ($property_values as $property_value) {
                $tmp[]=array_merge($result_item,array($property=>$property_value));

                
            }
        }
        $result=$tmp;
    }
    return  $result;

}
//hàm check value
function check_value($product, $value_check){
    
    foreach ($product->values as $value) {
        if($value->id==$value_check){
            return true;
        }
       

        
    }
    return false;
}
//kiểm tra biến thế

function check_var($product,$array){
    foreach ($product->variant as $row) {
        $mang=array();
        foreach ($row->values as $value) {

           $mang[]=$value->id;
        }
        if(array_diff($mang,$array)==NULL){
            return false;

        }
    }
    return true;

}
//getprice
function getprice($product,$array)
{
    foreach ($product->variant as  $row) {
        $mang= array();
        foreach ($row->values as  $value) {
            $mang[]=$value->value;
        }
        if(array_diff($mang, $array)==NUll){
            if($row->price==0){
                return $product->price;
            }
            return $row->price;

        }

    }
    return $product->price;
}


