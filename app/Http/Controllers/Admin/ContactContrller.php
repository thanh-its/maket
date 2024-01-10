<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contact;
class ContactContrller extends Controller
{
    public function index(Request $request)
    {
        
        $contacts = contact::filter(request(['search','email']))->orderBy('id', 'DESC')->Paginate(30);
        return view('admin.pages.contact.index', compact('contacts'));
    }
    public function edit($id)
    {
        $contact = contact::find($id);
        if(!$contact){
            return redirect()->back();
        }
        return view('admin.pages.contact.edit', compact('contact'));
    }
    public function update(Request $request ,$id)
    {   
        $contact = contact::find($id);
        if(!$contact){
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
        $contact->update($request->all());
        return redirect()->route('cp-admin.contact.index')->with('message', 'Cập nhật trạng thái thành công !');;
    }
}
