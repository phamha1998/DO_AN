<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function getDetail () {
        echo "Đây là  chi tiết sản phẩm";

    }
    function getShop() {
        echo "Đây shop";

    }
}
