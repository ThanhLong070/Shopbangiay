<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::orderBy('id', 'DESC')->get();
        // return view('user.list', compact('users'));
        // 
        $users = User::paginate(5);
        return view('user.list', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user = User::select('id', 'name', 'email','password')->get();
        // return view('user.create', compact('user'));
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
             'name'            => 'required',
             'email'           => 'required|email|unique:users,email',
             'password'        => 'required',
             ], [
             'name.required'            => 'Tên tài khoản không được để trống',
             'email.required'           => 'Email không được để trống',
             'email.email'              => 'Email phải là một địa chỉ email hợp lệ.',
             'email.unique'             => 'Email này đã có trong CSDL',
             'password.required'        => 'Mật khẩu không được để trống',
             'confim_password.required' => 'Nhập lại mật khẩu không được để trống',
             'confim_password.same'     => 'Nhập lại mật khẩu không chính xác',
             ]);
             
             // $user                   = new User();
             // $user->name             = $request->name;
             // $user->email            = $request->email;
             // $user->password         = $request->password;
             // $user->save();
             $password               = bcrypt($request->password);
             $request->merge(['password' => $password]);

        User::create($request->all());
        return redirect()->route('user.index')->with(['level' => 'success', 'msg' => 'Bạn đã thêm thành công!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'            => 'required',
            'email'           => 'required|email|unique:users,email',
            'password'        => 'required',
            'confim_password' => 'required|same:password',
        ], [
            'name.required'            => 'Tên tài khoản không được để trống',
            'email.required'           => 'Email không được để trống',
            'email.email'              => 'Email phải là một địa chỉ email hợp lệ.',
            'email.unique'             => 'Email này đã có trong CSDL',
            'password.required'        => 'Mật khẩu không được để trống',
            'confim_password.required' => 'Nhập lại mật khẩu',
            'confim_password.same'     => 'Nhập lại mật khẩu không chính xác',
        ]);
       
        // $user                       = User::findOrFail($id);
        // $user->name                 = $request->name;
        // $user->email                = $request->email;
        // $user->password             = $request->password;
        // $user->save();
        User::findOrFail($request->all());
        $password                   = bcrypt($request->password);
        $request->merge(['password' => $password]);
        return redirect()->route('user.index')->with(['level' => 'success', 'msg' => 'Bạn đã sửa thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       User::findOrFail($id)->delete();
       return redirect()->route('user.index')->with(['level' => 'success', 'msg' => 'Xóa thành công!']);
    }
    public function ajax(Request $request)
    {

        $id = $request->id;
        $action = $request->action;
        if ($action == 'update') {
            $user = User::findOrFail($id);
            $user->role = 1;
            if ($user->role == 1) {
                $user->save();
            }
            return json_encode(true);
        }
        return json_encode(false);

    }
}
