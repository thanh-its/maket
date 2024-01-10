<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sale;

class SaleController extends Controller
{
    public function getDanhSach()
    {
        $sale = Sale::all();
        return view('admin.layout.sale.list',['sale'=>$sale]);
    }

    public function getSua($id)
    {
        $sale = Sale::find($id);
        return view('admin/layout/sale/edit',['sale'=>$sale]);
    }

    public function postSua(Request $request,$id)
    { 
        $this->validate($request,[
            'txtNumberSale' => 'required',
            'txtDiscount' => 'required',
            'txtStart' => 'required',
            'txtFinish' => 'required',

        ],
        [
            'txtNumberSale.required' => 'Bạn chưa nhập số lượng sale của sản phẩm',
            'txtDiscount.required' => 'Bạn chưa nhập số lượng sale của sản phẩm',
            'txtStart.required' => 'Bạn chưa nhập số lượng sale của sản phẩm',
            'txtFinish.required' => 'Bạn chưa nhập số lượng sale của sản phẩm',
        ]);

        $sale = Sale::find($id);
        $sale->number_sale = $request->txtNumberSale;
        $sale->discount_percent = $request->txtDiscount;
        $sale->active = $request->active;
        $sale->time_start = $request->txtStart;
        $sale->time_end = $request->txtFinish;
        $sale->save();
        return redirect('admin/sale/edit/'.$id)->with('thongbao','Sửa thành công!!!!');
    }

    public function getThem()
    {
        return view('admin.layout.sale.add');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'txtNumberSale' => 'required',
            'txtDiscount' => 'required',
            'txtStart' => 'required',
            'txtFinish' => 'required',

        ],
        [
            'txtNumberSale.required' => 'Bạn chưa nhập số lượng sale của sản phẩm',
            'txtDiscount.required' => 'Bạn chưa nhập số lượng sale của sản phẩm',
            'txtStart.required' => 'Bạn chưa nhập số lượng sale của sản phẩm',
            'txtFinish.required' => 'Bạn chưa nhập số lượng sale của sản phẩm',
        ]);

        $sale = new Sale;
        $sale->number_sale = $request->txtNumberSale;
        $sale->discount_percent = $request->txtDiscount;
        $sale->active = $request->active;
        $sale->time_start = $request->txtStart;
        $sale->time_end = $request->txtFinish;
        $sale->save();
        return redirect('admin/sale/add')->with('thongbao','Thêm thành công!!!');
    }

    public function getXoa($id)
    {
        $sale = Sale::find($id);
        $sale->delete();
        
        return redirect('admin/sale/list')->with('thongbao','Xóa thành công!!!');
    }

}
