<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_item;
use App\Helper\CartHelper;
use App\Models\Login;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\User;

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
        return view('checkout.list', compact('customer'));
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
     * @param CartHelper $cart
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(CartHelper $cart, Request $request)
    {


        $this->validate($request, [
            'name' => 'required|max:255',
            'phone' => 'required|digits_between:10,11',
            'email' => 'required|email',
            'payment' => 'required',

        ], [
            'name.required' => 'Bạn chưa nhập Họ và tên',
            'name.max' => 'Họ và tên chỉ có thế dài tối da 255 kí tự',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.digits_between' => 'Số điện thoại nằm trong khoảng 10 hoặc 11 chữ số',
            'email.required' => 'Bạn chưa nhập địa chỉ email',
            'email.email' => 'Email không đúng định dạng',
            'payment.required' => 'Bạn chưa chọn phương thức thanh toán',
        ]);
        if ($request->createAccount && $request->createAccount == 'on') {
            $this->validate($request, [
                'password' => 'required'
            ], [
                'password.required' => 'Mật khẩu không được để trống',
            ]);
        }
        $customer = Customer::create($request->all());
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
//        $buyer = Customer::where('id', $customer->id)->first();
//        $orders = $order::where('customer_id', $order->customer_id)->get();

        //Nếu có tài khoản thì
        if ($request->createAccount == "on") {
            $rule2 = [
                'password' => 'required',
                'email' => 'unique:users'
            ];
            $validator2 = Validator::make(Input::all(), $rule2);
            if ($validator2->fails()) {
                return redirect('checkout/create')
                    ->withErrors(['password.required' => 'Bạn chưa nhập password', 'email.unique' => 'Email đã tồn tại trong hệ thống'])
                    ->withInput();
            }

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->avartar = null;
            $user->role = 0;
            $user->remember_token = null;
            $user->password = bcrypt($request->password);
            $user->save();
        }

        return redirect()->route('confirmation');


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
