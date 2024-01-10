<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function getDanhSach()
    {
        $order = Order::all();
        return view('admin.layout.order.list',['order'=>$order]);
    }
}
