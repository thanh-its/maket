<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\Permissions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        // lấy thông của tất cả các chức vụ trừ chức vụ khách hàng
        $roles = Roles::where('id', '!=', 1)->filter(request(['search']))->orderBy('id', 'DESC')->paginate(15);
        $roles->load('users'); // load thêm các tài khoản thuộc chức vụ
        // dd($roles);
        return view('admin.pages.role.index', compact('roles'));
    }
    public function create()
    {
        $permissions = Permissions::where('parent_id', 0)->get();
        $permissions->load('permissionsChilden');
        // dd(strtoupper('Xin chào'));
        return view('admin.pages.role.create', compact('permissions'));
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:100|min:4',
            'desc' => 'required|max:200|min:4',
        ];
        $messages = [
            'name.required' => 'Mời chọn tên chức vụ!',
            'desc.required' => 'Mời nhập mô tả chức vụ!',
            'desc.max' => 'Mô tả  không quá 200 ký tự!',
            'desc.min' => 'Mô tả  ít nhất 4 ký tự!',
            'name.max' => 'Chức vụ  không quá 100 ký tự!',
            'name.min' => 'Chức vụ  ít nhất 4 ký tự!',
        ];

        $this->validate(request(), $rules, $messages);

        // try catch dùng để bắt lỗi ngoại lệ 
        try {
            DB::beginTransaction(); // Bắt đầu các hành động trên CSDL
            $roles =  Roles::create([
                'name' => $request->name,
                'desc' => $request->desc
            ]);
            //attach thêm các bản ghi vào bảng permissions_role trung gian giữa permissions và role
            $roles->permissions()->attach($request->permission_id);
            DB::commit(); //Commit dữ liệu khi hoàn thành kiểm tra
            return \redirect()->route('cp-admin.user.role.index')->with('message', 'Thêm mới chức vụ thành công !');
        } catch (Exception $exception) {
            DB::rollBack(); //Gặp lỗi nào đó mới rollback
            Log::error('message :', $exception->getMessage() . '--line :' . $exception->getLine());  // lưu lại lỗi vào file log
        }
        // khi thêm thất bại sẽ quay lại trang thêm chức vụ
        return \redirect()->back()->with('error', 'Thêm mới chức vụ thất bại !');
    }
    public function edit($id)
    {
        $roles = Roles::find($id);
        $roles->load('permissions');
        //  dd($roles->permissions);
        $permissions = Permissions::where('parent_id', 0)->get();
        $permissions->load('permissionsChilden');
        return view('admin.pages.role.edit', compact('permissions', 'roles'));
    }
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:100|min:4',
            'desc' => 'required|max:200|min:4',
        ];
        $messages = [
            'name.required' => 'Mời chọn tên chức vụ!',
            'desc.required' => 'Mời nhập mô tả chức vụ!',
            'desc.max' => 'Mô tả  không quá 200 ký tự!',
            'desc.min' => 'Mô tả  ít nhất 4 ký tự!',
            'name.max' => 'Chức vụ  không quá 100 ký tự!',
            'name.min' => 'Chức vụ  ít nhất 4 ký tự!',
        ];

        $this->validate(request(), $rules, $messages);

        // try catch dùng để bắt lỗi ngoại lệ 
        try {
            DB::beginTransaction(); // Bắt đầu các hành động trên CSDL
            $roles = Roles::find($id);
            //sync cập nhật lại các bản ghi vào bảng permissions_role trung gian giữa permissions và role
            $roles->permissions()->sync($request->permission_id);
            $roles =  $roles->update([ // update theo id
                'name' => $request->name,
                'desc' => $request->desc
            ]);

            DB::commit(); //Commit dữ liệu khi hoàn thành kiểm tra
            return \redirect()->route('cp-admin.user.role.index')->with('message', 'Cập nhật chức vụ thành công !');
        } catch (Exception $exception) {
            DB::rollBack(); //Gặp lỗi nào đó mới rollback
            Log::error('message :', $exception->getMessage() . '--line :' . $exception->getLine());  // lưu lại lỗi vào file log
        }
        // khi thêm thất bại sẽ quay lại trang thêm chức vụ
        return \redirect()->back()->with('error', 'Cập nhật chức vụ thất bại !');
    }
    public function delete($id)
    {
        $roles = Roles::find($id);
        $roles->load('users');
        if($roles){
            if($roles->users->count()>=1){
                return response()->json([
                    'message' => "Không thể xóa khi vẫn còn số lượng khách hàng",
                    'status' => "401"
                ]); 
            }
            $roles->delete();
            return response()->json([
                'message' => "Xóa chức vụ thành công",
                'status' => "200"
            ]);
        }
        return response()->json([
            'message' => "Không tìm thấy chức vụ",
            'status' => "401"
        ]);
    }
}
