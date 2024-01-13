<?php

namespace App\Http\Controllers;

use App\Mail\NotifyMail;
use App\Models\User;
use App\Models\GroupUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Http\Requests\RegisteredStoreRequest;
use Exception;
class RegisteredStoreController extends Controller
{

    public function create()
    {
        return view('seller.create');
    }

    public function save(RegisteredStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $groupUser = GroupUser::create(['name' => $request->store_name]);
            $data = request(['fullname', 'phone', 'address', 'email']);
            // tạo mật khẩu cho tài khoản
            $data['passwordNew'] = Str::random(15); // pass chưa mã hóa
            $data['password'] = bcrypt($data['passwordNew']); // mã hóa mật khẩu
            $data['is_admin'] = true;
            $data['avatar'] = '';
            $data['status'] = true;
            $data['role_id'] = 3;
            $data['group_id'] = $groupUser->id;
            User::create($data);
            Mail::to($request->email)->send(new NotifyMail($data));
            DB::commit();
            return redirect()->back()->with('message', 'Đăng ký cửa hàng thành công  !');
        } catch
        (Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->back()->with('error', 'Đăng ký cửa hàng thất bại !');
        }

    }
}
