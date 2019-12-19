<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function getOrder(){
        return view('backend.order.order');
}
function getDetailOrder(){
    return view('backend.order.detailorder');
}
function getProcessed(){
    return view('backend.order.orderprocessed');
}
}
