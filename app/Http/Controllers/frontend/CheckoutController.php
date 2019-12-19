<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function getCheckout () {
        echo "Đây là trang check out";

    }
    function getComplete () {
        echo "Đây là trang hoàn thành đơn hàng";

    }
}

