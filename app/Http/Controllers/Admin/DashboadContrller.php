<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Blogs;
use App\Models\User;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\GroupUser;
class DashboadContrller extends Controller
{
    public function index(Request $request)
    {
        $shop = [];
        if(auth()->user()->role_id == 3){
        $products = Product::where('users_id', auth()->user()->id)->where('status', 1)->get();
        $Order = OrderDetail::where('users_id', auth()->user()->id)->get();
        }
        else{
            $products = Product::where('status', 1)->get();
            $Order = Order::get();
            $shop = GroupUser::with([
                'user',
                'user.orderDetail',
                'user.products'
            ])->get();

        }
        $Blogs = Blogs::count();
        $User = User::where('is_admin', false)->count();
        return view('admin.pages.dashboad.index',compact('products','Blogs','User','Order','shop'));
    }
}
