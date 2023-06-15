<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
    public function index(){
        return view('admin.login',[
            'title'=>'Trang Login'
        ]);
    }
    public function login(Request $request){
        //xử lý việc đăng nhập
        //echo "xử lý login";
        // dd($request->input());
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);
        $s=DB::select('select * from users where email= :email and password= :password',[
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ]);
        
        // dd($s);
//|email:filter
        // if(Auth::attempt([
        //     'email'=>$request->input('email'),
        //     'password'=>$request->input('password'),
        // ]))
        // {
            
        //     return redirect()->route('admin');
        // }
        
        // dd($request->input('email'),$request->input('password'));
        if(!$s){
        Session()->flash('error','Email hoặc mật khẩu không chính xác');
        return redirect()->back();
        }
        else{
            return redirect()->route('admin');
        }
    }
}
// <?php

// namespace App\Http\Controllers;

// use App\Http\Services\UserService;
// use App\Models\User;
// use Illuminate\Contracts\Session\Session;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class LoginController extends Controller
// {
//     protected $UserService;
//     public function __construct(UserService $UserService)
//     {
//         $this->UserService = $UserService;
//     }
//     public function list(){
//         $users = $this->UserService->getAll();
//         return view('Login',[
//             'title'=>'Danh sách lớp học',
//             'logins'=> $users
//         ]);
//     }
//     public function login(){
//         return view('Login',[
//             'title' => 'Login'
//         ]);
//     }
//     public function login_action(Request $request){
//         $this->validate($request,[
//             'email'=>'required',
//             'password'=>'required'
//         ]);//kiểm tra xem người dùng có nhập đúng với yêu cầu hay không
//         if(Auth::attempt([
//             'email'=>$request->input('email'),
//             'password'=>$request->input('password')
//         ]))
//         {
//             return redirect()->route('main');
//         }
//         else{
//             dd($request->input('email'),$request->input('password'));
//             Session()->flash('error','Email or mật khẩu không chính xác');
//             return redirect()->back();
//         }
//     }
//     public function main(){
//         return view('main');
//     }

// }
