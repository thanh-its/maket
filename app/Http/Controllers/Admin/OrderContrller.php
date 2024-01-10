<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class OrderContrller extends Controller
{
    public function index(Request $request)
    {
        
        $Orders = Order::filter(request(['status']))->orderBy('id', 'DESC')->Paginate(30);
        return view('admin.pages.orders.index', compact('Orders'));
    }
    
    public function edit($id)
    {
        $Orders = Order::where('id', $id)->first();
        $Orders->load('order_detail');
        if(!$Orders){
            return redirect()->back();
        }
        if($Orders){
            //  dd($Orders);
              $totalMoney = 0;
              foreach ($Orders->order_detail as $order) {
                  $totalMoney += $order->price * $order->quantity;
              }
            return view('admin.pages.orders.edit', compact('Orders','totalMoney'));
            }
            return redirect()->back()->with('error', 'Không tìm thấy sản phẩn của đơn hàng');
    }

    public function update(Request $request ,$id)
    {   
        $Orders = Order::where('id', $id)->first();
        if(!$Orders){
            return redirect()->back();
        }
        $this->validate(request(),[
            'status' => 'required|integer|min:0',
        ],
        [
            'status.required' => 'Trạng thái Không hợp lệ',
            'status.integer' => 'Trạng thái Không hợp lệ',
            'status.min'=>'Trạng thái Không hợp lệ',
        ]);
        $Orders->update($request->all());
        return redirect()->route('cp-admin.orders.index')->with('message', 'Cập nhật trạng thái thành công !');;
    }
}
