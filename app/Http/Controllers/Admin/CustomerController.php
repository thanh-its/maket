<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GroupUser;
class CustomerController extends Controller
{
    public function index(){
        $GroupUsers = GroupUser::all();
        $users = User::where('is_admin',false)
        ->filter(request(['search','group_user','status']))
        ->orderBy('id', 'DESC')->Paginate(15);
        $users->load('groupUser');
        return view('admin.pages.customer.index', compact('users','GroupUsers'));
    }
    public function create(){
        // dd(config('address'));
        $GroupUsers = GroupUser::all();
        return view('admin.pages.customer.create', compact('GroupUsers'));
    }
    public function edit($id)
    {
        $GroupUsers = GroupUser::all();
        $users = User::where('is_admin',false)->where('id',$id)->first();
        if($users){
            return view('admin.pages.customer.edit', compact('GroupUsers','users'));
        }
        return redirect()->back();
    }
    public function update(Request $request ,$id)
    {   
        $customer = User::where('is_admin',false)->where('id',$id)->first();
        $this->validate(request(),[
            'address'=>'required|min:3|max:200',
            'status' => 'required|integer|min:0|max:1',
            'group_user' => 'required|integer|min:1',
        ],
        [
            'address_detail.required'=>'Bạn chưa nhập địa chỉ',
            'address_detail.unique' => 'Địa chỉ không được trùng',
            'address_detail.min'=>'Địa chỉ phải có Độ dài  từ 3 đến 200 ký tự',
            'address_detail.max'=>'Địa chỉ phải có Độ dài  từ 3 đến 200 ký tự',
            'address.required'=>'Bạn chưa nhập địa chỉ',
            'address.unique' => 'Địa chỉ không được trùng',
            'address.min'=>'Địa chỉ phải có Độ dài  từ 3 đến 200 ký tự',
            'address.max'=>'Địa chỉ phải có Độ dài  từ 3 đến 200 ký tự',
            'status.required' => 'Trạng thái Không hợp lệ',
            'status.integer' => 'Trạng thái Không hợp lệ',
            'status.min'=>'Trạng thái Không hợp lệ',
            'status.max'=>'Trạng thái Không hợp lệ',
            'group_user.required' => 'Trạng thái Không hợp lệ',
            'group_user.integer' => 'Trạng thái Không hợp lệ',
            'group_user.min'=>'Trạng thái Không hợp lệ',
        ]);
        $customer->update($request->all());
        return redirect()->route('cp-admin.customers.index')->with('message', 'Cập nhật tài khoản thành công !');;
    }
    public function delete($id)
    {
        // $GroupUsers = GroupUser::all();
        // $users = User::where('is_admin',false)->where('id',$id)->first();
        // if($users){
        //     return view('admin.pages.customer.edit', compact('GroupUsers','users'));
        // }
        // return redirect()->back();
        dd('chưa xóa tài khoản. nhớ check tài khoản xem có đơn hàng nào chưa hoàn thành không');
    }
}
