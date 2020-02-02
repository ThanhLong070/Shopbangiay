<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_item;
use App\Helper\CartHelper;
use App\Models\Login;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $customer = Customer::orderBy('id', 'DESC')->get();
        return view('checkout.list',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('checkout.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CartHelper $cart, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|email',
            'password'=>'required',
            'address' => 'required',
            'payment' => 'required',
            'note' => 'required',

        ], [
            'name.required' => 'Bạn chưa nhập Họ và tên',
            'name.max' => 'Họ và tên chỉ có thế dài tối da 255 kí tự',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'email.required' => 'Bạn chưa nhập địa chỉ email',
            'email.email' => 'Email không đúng định dạng',
            'password.required'=>'Mật khẩu không được để trống',
            'address.required' => 'Bạn chưa nhập địa chỉ',
            'payment.required' => 'Bạn chưa chọn phương thức thanh toán',
            'note.required' => 'Bạn chưa nhập ghi chú',
        ]);
        $customer = Customer::create($request->all());

        // $login = new Login();
        // $login->customer_id = $request->customer_id;
        // $login->username = $request->name;
        // $login->password = $request->password;
        // $login->save();

        $order = Order::create([
            'payment' => $request->payment,
            'total' => $cart->total_price,
            'note' => $request->note,
            'customer_id' => $customer->id,
            'status' => 0
        ]); 
        foreach ($cart->items as $item) {
            Order_item::create([
                'product_id' => $item['id'],
                'order_id' => $order->id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                
            ]);
        }
        Session(['cart' => '']);
        $buyer = Customer::where('id', $customer->id)->first();
        $orders = $order::where('customer_id', $order->customer_id)->get();
        // $logins = $login::where('id',$login->id)->first();
        return redirect()->route('confirmation')->with([
            'buyer' => $buyer,
            'orders' => $orders,
           
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
