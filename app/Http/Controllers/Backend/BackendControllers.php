<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use App\Models\Order;
class BackendControllers extends Controller
{
    
    function admin()

    {               

            $product_count = Order::count();
            $order_count = 12;
            $cus_count = 12;
            // $orders = Order::where('status',0)->get();
            return view('backend/admin',compact('product_count','order_count','cus_count'));
    }
     
    function order()
    {
        // $orders = Order::orderBy('id', 'DESC')->get();
        return view('backend/order');
    }
      function order_items()
    {
        // $orders = Order::orderBy('id', 'DESC')->get();
        return view('backend/order_items');
    }

    // function login()

    // {
    //         return view('backend/login');
    // }

    // function post_login(Request $request)

    // {
    // 		$this->validate($request,[
				// 'email'    => 'required|email',
				// 'password' => 'required'
    // 		],[
    // 			'email.required' => 'Bạn chưa nhập email',
    // 			'email.email' => 'Email không đúng định dạng',
    // 			'password.required' => 'Bạn chưa nhập mật khẩu'
    // 		]);

    // 		if(Auth::attempt($request->only('email','password'),$request->has('rmb'))) {
    // 			return redirect()->route('backend');
    // 		}else {
    // 			 return redirect()->back();
    // 		}

    // 		// dd($request->only('email','password'));
    // }

    // function logout()    

    // {
    //     Auth::logout();
    //     return redirect()->route('login');
    // }
   

}
