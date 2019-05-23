<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/trangchu';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
        return '/trangchu';
    }
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:8',
        ],[
            'required' => ':attribute không thể bỏ trống!',
            'min' => ':attribute phải lớn hơn :min ký tự',
            'failed' => 'Vui lòng kiểm tra lại :attrubute!.',
        ],[
            'email' => 'Email',
            'password' => 'Mật khẩu'
        ]);
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'MaLND'=>1,'active'=>1])){
//            if (Cart::getContent()->count()>0)
//                redirect()->route('cart.index');
//            else
                return redirect()->intended(route('home.index'));
        }elseif (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'MaLND'=>2,'active'=>1])){
            return redirect()->route('admin.dashboard');
        }elseif (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'MaLND'=>3,'active'=>1])){
            return redirect()->route('admin.dashboard');
        }elseif (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'MaLND'=>4,'active'=>1])){
            return redirect()->route('admin.dashboard');
        }elseif (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'MaLND'=>5,'active'=>1])){
            return redirect()->route('admin.dashboard');
        } else{
            //chưa xử lý đc :(
            return redirect()->route('login')->with('error', 'Không tìm thấy tài khoản của bạn!');
        }
//        return view('front_end.pages.cart');
    }
}
