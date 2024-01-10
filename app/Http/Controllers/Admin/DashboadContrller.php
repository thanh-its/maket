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
        
        $products = Product::count();
        $Blogs = Blogs::count();
        $User = User::where('is_admin', false)->count();
        $Order = Order::count();
       // dd($products);
        return view('admin.pages.dashboad.index',compact('products','Blogs','User','Order',));
    }
}
