<?php

namespace App\Http\Controllers\Auth;

use App\NguoiDung;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use DB;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:nguoidung'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return NguoiDung::create([
            'TenND' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'DiaChi' => $data['diachi'],
            'SDT' => $data['sdt'],
            'MaLND' => 1,
        ]);
    }

    public function register(Request $request) {
        $input = $request->all();
        $validator = $this->validator($input);

        if ($validator->passes()){
            $user = $this->create($input)->toArray();
            $user['link'] = str_random(30);

            DB::table('xacthucnd')->insert(['MaND'=>$user['MaND'],'token'=>$user['link']]);

            Mail::send('front_end.pages.activation', $user, function($message) use ($user){
                $message->to($user['email']);
                $message->subject('Sophia Store - Activation Code');
            });
            return redirect()->to('login')->with('success',"We sent activation code. Please check your mail.");
        }
        return back()->with('errors',$validator->errors());
    }

    public function userActivation($token){
        $check = DB::table('xacthucnd')->where('token',$token)->first();
        if(!is_null($check)){
            $user = NguoiDung::find($check->MaND);
            if ($user->active == 1){
                return redirect()->to('login')->with('success',"User are already actived.");

            }
            $user->active=1;
            $user->save();
            DB::table('xacthucnd')->where('token',$token)->delete();
            return redirect()->to('login')->with('success',"User active successfully.");
        }
        return redirect()->to('login')->with('warning',"Your token is invalid");
    }
}
