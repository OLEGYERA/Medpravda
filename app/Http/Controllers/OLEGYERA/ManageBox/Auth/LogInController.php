<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Auth;

use Auth;
use Fresh\Medpravda\User;
use Fresh\Medpravda\Http\Requests\GlobalUserRequest;
use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Mail;
use Fresh\Medpravda\Mail\ForgotEmail;

use Dirape\Token\Token;


class LogInController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller by Olegyera
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $decayMinutes = 5;
    protected $forgotType = null;
    protected $redirectTo = '/manage/medicines/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function login(Request $request){
        if ($request->isMethod('post')) {
            $credentials = $request->only('login', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->route('manage.navigation.manual.drug');
            }
            else{
                return redirect()->back()->withErrors(['authorization' => 'Некорректный логин или пароль'])->withInput();
            }
        }
        return view('OLEGYERA.ManageBox.auth.login');
    }

    protected function forgotLogin(GlobalUserRequest $request){
        if ($request->isMethod('post')) {
            $user_verification = User::where('email', $request->email)->first();
            if ($user_verification) {
                $token_login = (new Token())->Unique('users', 'login', 16);
                $user_verification->update(['login' => $token_login]);

                $this->forgotType = 1;

                Mail::to($user_verification->email)->send(new ForgotEmail($user_verification, $this->forgotType, $token_login));

                $request->session()->flash('status', 'Новый логин отправлен вам на почту!');
                return redirect()->route('manage.login');
            }
            else{
                return redirect()->back()->withErrors(['email' => 'Данной почты не существует!'])->withInput();
            }
        }
        return view('OLEGYERA.ManageBox.auth.forgot_login');
    }

    protected function forgotPass(GlobalUserRequest $request){
        if ($request->isMethod('post')) {
            $user_verification = User::where('email', $request->email)->first();
            if ($user_verification) {
                $token_pass = (new Token())->Unique('users', 'password', 16);
                $user_verification->update(['password' => bcrypt($token_pass)]);

                $this->forgotType = 2;

                Mail::to($user_verification->email)->send(new ForgotEmail($user_verification, $this->forgotType, $token_pass));

                $request->session()->flash('status', 'Новый пароль отправлен вам на почту!');
                return redirect()->route('manage.login');
            }
            else{
                return redirect()->back()->withErrors(['email' => 'Данной почты не существует!'])->withInput();
            }
        }
        return view('OLEGYERA.ManageBox.auth.forgot_password');
    }


    public function username()
    {
        return 'login';
    }


}
