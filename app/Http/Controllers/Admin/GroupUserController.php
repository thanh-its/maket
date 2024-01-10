<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GroupUser;
class GroupUserController extends Controller
{
    public function index(Request $request)
    {
        $GroupUser = GroupUser::filter(request(['search']))->orderBy('id','DESC')->paginate(10);
        $GroupUser->load('user'); // gọi products bên model
        return view('admin.pages.group.index',compact('GroupUser'));
    }

    public function create()
    {
        return view('admin.pages.group.create');
    }
    public function store(Request $request)
    {
      
        $this->validate(request(),[
            'name'=>'required|min:3|max:100|unique:group_users,name',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên danh mục',
            'name.unique' => 'Tên danh mục không được trùng',
            'name.min'=>'Tên danh mục phải có Độ dài  từ 3 đến 100 ký tự',
            'name.max'=>'Tên danh mục phải có Độ dài  từ 3 đến 100 ký tự',

        ]);

        GroupUser::create($request->all());
       return redirect()->route('cp-admin.groups.index')->with('message', 'Thêm nhóm khách hàng thành công !');
    }
    public function edit($id)
    {
        $GroupUser = GroupUser::find($id);
        return view('admin.pages.group.edit', compact('GroupUser'));
    }
    public function update(Request $request ,$id)
    {   
        $GroupUser = GroupUser::find($id);
        $this->validate(request(),[
            'name'=>'required|min:3|max:100|unique:group_users,name,' . $GroupUser->id,
        ],
        [
            'name.required'=>'Bạn chưa nhập tên danh mục',
            'name.unique' => 'Tên danh mục không được trùng',
            'name.min'=>'Tên danh mục phải có Độ dài  từ 3 đến 100 ký tự',
            'name.max'=>'Tên danh mục phải có Độ dài  từ 3 đến 100 ký tự',
        ]);
        $GroupUser->update($request->all());
        return redirect()->route('cp-admin.groups.index')->with('message', 'Cập nhật nhóm khách hàng thành công !');
    }
    public function delete($id)
    {
        $GroupUser = GroupUser::find($id);
        $GroupUser->load('user');
        if($GroupUser){
            if($GroupUser->user->count()>=1){
                return response()->json([
                    'message' => "Không thể xóa khi vẫn còn số lượng khách hàng",
                    'status' => "401"
                ]); 
            }
            $GroupUser->delete();
            return response()->json([
                'message' => "Xóa nhóm khách hàng thành công",
                'status' => "200"
            ]);
        }
        return response()->json([
            'message' => "Không tìm thấy nhóm khách hàng ",
            'status' => "401"
        ]);
    }
}
