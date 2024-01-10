<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\config;
class ConfigController extends Controller
{
    public function config(){
       //$config= config::first();
      // dd($config);
       return view('admin.pages.auth.config');
    }
    public function updateConfig(Request $request){
        $config= config::first();
        $this->validate(request(),[
            'logo' => 'nullable|image|mimes:jpeg,png|max:2048',
            'email'    => 'required|email',
            'phone' => 'required|numeric|digits_between:10,12',
            'address'=>'required|min:3|max:200',
        ],
        [
            'email.required' => 'Mời nhập e-mail !',
            'email.email' => 'e-mail không đúng định dạng !',
           'logo.mimes'=>'Hình đại diện phải là tệp thuộc loại: image / png ',
           'logo.image'=>'Hình đại diện phải là tệp thuộc loại: image / png ',
            'logo.max'=>'logo dụng lượng tối đa 2048mb',
            'phone.required'=>'Bạn chưa nhập số điện thoại',
            'phone.digits_between'=>'Độ dài số điện thoại không hợp lệ',
            'phone.numeric'=>'Số điện thoại không hợp lệ',
            'address.required'=>'Bạn chưa nhập địa chỉ',
            'address.unique' => 'Địa chỉ không được trùng',
            'address.min'=>'Địa chỉ phải có Độ dài  từ 3 đến 200 ký tự',
            'address.max'=>'Địa chỉ phải có Độ dài  từ 3 đến 200 ký tự',
        ]);
        if ($request->file('logo') != null) {
          
            if (!empty($config->logo) && file_exists('storage/' . $config->logo)) {
                unlink('storage/' . $config->logo);
            }
            $pathAvatar = $request->file('logo')->store('public/images/logo');
            $pathAvatar = str_replace("public/", "", $pathAvatar);
        } else {
            $pathAvatar = $config->logo;
        }
        $data = request([
        'link_facebook',
        'link_twitter',
        'link_linkedin',
        'phone',
        'address',
        'email']);
        $data['logo'] = $pathAvatar;
        $config->update($data);
       // dd($config);
       return redirect()->back()->with('message', 'Cập nhật thông tin thành công');
     }
    
}
