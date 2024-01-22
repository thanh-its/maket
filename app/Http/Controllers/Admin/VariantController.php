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
        $variants = $this->getVariants();
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
        return response()->json([
            'message' => "Xóa sản phẩm thành công",
            'status' => "200"
        ]);
    }

    public function edit($id){
        $variant = Variant::find($id);
        $variants = $this->getVariants();
        $parentVariants = Variant::where('parent_id' , 0)->get();
    
        return view('admin.pages.variant.index' , compact('id','variant','variants','parentVariants'));
    }

    public function update(Request $request){
        $variant = Variant::find($request->id);
        if(!$variant){
            return redirect()->back();
        }
        try {
            DB::beginTransaction();
            $data = request()->all();
            $data['user_id'] =  auth()->user()->id;
            $variant->update($data);
            DB::commit();
            return redirect()->route('cp-admin.variant.index')->with('message', 'Thêm biến thể thành công !');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('cp-admin.variant.index')->with('error', 'Thêm biến thể thất bại !');
            throw $th;
        }
    }

    public function getVariants(){
        $variants = Variant::with('children')
        ->where('parent_id', 0)
        ->where('user_id', auth()->user()->id)
        ->orderBy('id') // You can change this to another column if needed
        ->get()
        ->map(function ($parentVariant) {
            // Sort children based on their parent_id
            $parentVariant->children = $parentVariant->children->sortBy('parent_id')->values()->all();
            return $parentVariant;
        });

        return $variants;
    }
}
