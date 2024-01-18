<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function getDanhSach()
    {
        $order = OrderDetail::where('users_id', auth()->user()->id)->Paginate(7);
        return view('admin.layout.order.list',['order'=>$order]);
    }
}
