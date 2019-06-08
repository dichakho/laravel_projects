<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use App\User;
use Illuminate\Http\Request;


class userController extends Controller
{
    //
    public function getList(){
        $user = User::all();
        return view('admin.user.list', ['user'=>$user]);
    }
    public function getAdd(){
        $user = User::all();
        return view('admin.user.add', ['user'=>$user]);
    }
    public function postAdd(Request $request){
        
        $this->validate($request, 
        [
            'userName' => 'required|unique|min:2',
            'email' => 'required|email|unique:users,email',
            'pwd' => 'required|min:6',
            'repwd' => 'required|same:pwd',
            'phone' => 'required|numeric|unique:users,phone'
        ],
        [
            'userName.required' => 'Bạn chưa nhập Username',
            'userName.min' => 'Username phải nhiều hơn 2 ký tự',
            'userName.unique' => 'Username đã tồn tại',
            'email.required' => 'Bạn chưa nhập Email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'pưd.required' => 'Bạn chưa nhập Password',
            'pwd.min' => 'Password phải nhiều hơn 6 ký tự',
            'repwd.required' => 'Bạn chưa nhập RePassword',
            'repwd.same' => 'Password không trùng khớp',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.numeric' => 'Số điện thoại không có chữ',
            'phone.unique' => 'Số điện thoại đã tồn tại',
        ]);
        $user = new User;
        // var_dump($request->userName); exit();
        $user->username = $request->userName;
        $user->email = $request->email;
        $user->password = bcrypt($request->pwd);
        $user->role = $request->userLevel;
        // var_dump($request->userLevel); exit();
        $user->avatar = 'user.png';
        $user->phone = $request->phone;
        $user->save();
        return redirect('admin/user/list')->with('notice', 'Add success');
    }
    public function getEdit($id){
        $user = User::find($id);
        return view('admin.user.edit', ['user'=>$user]);
    }
    public function postEdit(Request $request, $id){
        $user = User::find($id);
        $this->validate($request, 
        [
            'userName' => 'required|min:2',
        ],
        [
            'userName.required' => 'Bạn chưa nhập Username',
            'userName.min' => 'Username phải nhiều hơn 2 ký tự',
        ]);
        $user->username = $request->userName;
        $user->role = $request->userLevel;
        $user->save();
        return redirect('admin/user/list')->with('notice', 'Edit success');
    }
    public function getDel($id){
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/list')->with('notice', "Delete success");
    }
    public function getRegister(){
        return view('admin.register');
    }
    public function postRegister(Request $request){
        $this->validate($request, 
        [
            'userName' => 'required|unique:users,username|min:2',
            'email' => 'required|email|unique:users,email',
            'pwd' => 'required|min:6',
            'repwd' => 'required|same:pwd',
            'phone' => 'required|numeric|unique:users,phone'
        ],
        [
            'userName.required' => 'Bạn chưa nhập Username',
            'userName.min' => 'Username phải nhiều hơn 2 ký tự',
            'userName.unique' => 'Username đã tồn tại',
            'email.required' => 'Bạn chưa nhập Email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'pưd.required' => 'Bạn chưa nhập Password',
            'pwd.min' => 'Password phải nhiều hơn 6 ký tự',
            'repwd.required' => 'Bạn chưa nhập RePassword',
            'repwd.same' => 'Password không trùng khớp',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.numeric' => 'Số điện thoại không có chữ',
            'phone.unique' => 'Số điện thoại đã tồn tại',
        ]);
        $user = new User;
        // var_dump($request->userName); exit();
        $user->username = $request->userName;
        $user->email = $request->email;
        $user->password = bcrypt($request->pwd);
        $user->role = '0';
        // var_dump($request->userLevel); exit();
        $user->avatar = 'user.png';
        $user->phone = $request->phone;
        $user->save();
        return back()->with('notice', 'Đăng ký thành công');;
    }
    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(Request $request){
        $this->validate($request, 
            [
               'username'=>'required',
               'password'=>'required' 
            ], 
            [
                'username.required'=>'Bạn chưa nhập username',
                'password.required'=>'Bạn chưa nhập mật khẩu'
            ]);
            if(Auth::attempt(['username' => $request->username, 'password' =>$request->password]))
            {
                // var_dump(Auth::user()); exit();
                $request->session()->put('user', ['username'=>Auth::user()->username,  'role'=>Auth::user()->role, 'id'=>Auth::user()->id]);
                // var_dump($request->session()->all()); exit();
                if($request->session()->get('user')['role'] == 0){
                    return back()->with('notice', 'Sai username hoặc password');
                } else {
                    return redirect('admin/dashboard')->with('notice', 'Đăng nhập thành công');
                }     
            } else {
                return redirect('admin/login')->with('notice', 'Sai Username hoặc password');
            }
            
    }
    public function getLogout(){
        Auth::logout();
        return redirect('admin/login');
    }
}
