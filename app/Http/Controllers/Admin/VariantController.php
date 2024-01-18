<?php

namespace App\Http\Controllers\Admin;
use App\Models\Variant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class VariantController extends Controller
{
    public function index(){
        $variants = Variant::all();
        $parentVariants = Variant::where('parent_id' , 0)->get();
        return view('admin.pages.variant.index' , compact('variants','parentVariants'));
    }

    public function create(Request $request){
        try {
            DB::beginTransaction();
            $data = request()->all();
            $data['user_id'] =  auth()->user()->id;
            Variant::create($data);
            DB::commit();
            return redirect()->route('cp-admin.variant.index')->with('message', 'Thêm biến thể thành công !');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('cp-admin.variant.index')->with('error', 'Thêm biến thể thất bại !');
            throw $th;
        }
    }

    public function delete($id){
        $variant = Variant::find($id);
        if(!$variant){
            return response()->json([
                'message' => "Không tìm thấy bài viết",
                'status' => "401"
            ]);
        }
    
        $variant->delete();
        return redirect()->route('cp-admin.variant.index')->with('error', 'Xóa biến thể thành công !');
    }
}
