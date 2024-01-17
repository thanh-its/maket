<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Product;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::where('users_id', auth()->user()->id)
        ->orderBy('id', 'DESC')
        ->Paginate(7);
        return view('admin.pages.voucher.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::where('users_id', auth()->user()->id)->get();

        return view('admin.pages.voucher.create', compact('products'));
    }
    public function formatdateTime($time)
    {
        $carbonInstance = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $time);

        // Format the Carbon instance as needed
        $formattedDateTime = $carbonInstance->format('Y-m-d H:i:s');
        return $formattedDateTime;
    }

    public function store(Request $request)
    { 
 
        $data = $request->all();
        $this->validate($request,[
            'code' => 'required|string|unique:sales',
            'products_id' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'active' => 'required|numeric',
            'number_sale' => 'required|numeric',
            'discount_percent' => 'required|numeric',

        ]);
       $data['time_start'] = $this->formatdateTime($data['time_start']);
       $data['time_end'] = $this->formatdateTime($data['time_end']);
       $data['products_id'] = json_encode($data['products_id']);
       $data['users_id'] = auth()->user()->id;
       Sale::create($data);
        return redirect()->route('cp-admin.voucher.index')->with('message', 'Thêm mã giảm giá thành công  !');

    }

    public function edit($id)
    {
        $products = Product::where('users_id', auth()->user()->id)->get();
        $sales = Sale::find($id);
        return view('admin.pages.voucher.edit', compact('sales','products'));
    }

    public function update(Request $request,$id)
    {
        $sales = Sale::find($id);
        $data = $request->all();
        $this->validate($request,[
            'code' => 'required|string|unique:sales,code,' .  $sales->id,
            'products_id' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'active' => 'required|numeric',
            'number_sale' => 'required|numeric',
            'discount_percent' => 'required|numeric',

        ]);

        $data['time_start'] = $this->formatdateTime($data['time_start']);
        $data['time_end'] = $this->formatdateTime($data['time_end']);
        $data['products_id'] = json_encode($data['products_id']);
        $data['users_id'] = auth()->user()->id;
        $sales->update($data);
         return redirect()->route('cp-admin.voucher.index')->with('message', 'Cập nhật mã giảm giá thành công  !');
 
    }

    public function delete($id)
    {
        $sale = Sale::find($id);
        $sale->delete();
        
        return response()->json([
            'message' => "Xóa danh mục thành công",
            'status' => "200"
        ]);
    }

}
