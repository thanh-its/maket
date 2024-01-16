<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Blogs;
use App\Models\User;
use App\Models\Order;
class DashboadContrller extends Controller
{
    public function index(Request $request)
    {
        if(auth()->user()->role_id == 3){
        $products = Product::where('users_id', auth()->user()->id)->count();
        $Order = Order::where('users_id', auth()->user()->id)->count();
        }
        else{
            $products = Product::count();
            $Order = Order::count();
        }
        $Blogs = Blogs::count();
        $User = User::where('is_admin', false)->count();
        return view('admin.pages.dashboad.index',compact('products','Blogs','User','Order',));
    }
}
