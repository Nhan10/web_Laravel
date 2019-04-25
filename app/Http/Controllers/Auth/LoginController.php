<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function login(Request $request)
    {
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'MaLND'=>1,'active'=>1])){
//            if (Cart::content()->count()>0)
//                return view('front_end.pages.cart');
//            else
                return redirect()->route('home.index');
        }elseif (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'MaLND'=>2,'active'=>1])){
            return redirect()->route('danhmuc.index');
        } else{
            return redirect()->route('login')->with('error', 'Incorrect information!!!');
        }
//        return view('front_end.pages.cart');
    }
}
