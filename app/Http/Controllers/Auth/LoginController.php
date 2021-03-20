<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = 'admin/Dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // public function showFormLogin()
    // {
    //     if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
    //         //Login Success
    //         return redirect()->route('dashboard.index');
    //     }
    //     return view('auth.login');
    // }

    // public function login(Request $request)
    // {
    //     $input = $request->all();

    //     $this->validate($request, [
    //         'email' => 'required',
    //         'password' => 'required',
    //         // 'g-recaptcha-response' => 'required|captcha',

    //     ]);

    //     $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'email';
    //     $data = array($fieldType => $input['email'], 'password' => $input['password']);
    //     if (auth()->attempt($data)) {
    //         $email = auth()->user()->email;
    //         $status = auth()->user()->status;

    //         if ($status == 1) {
    //             if (auth()->user()->hasRole('admin')) {
    //                 return redirect()->route('dashboard.index')->with(['success' => 'Welcome back ' . $email]);
    //             }
    //             return redirect()->route('admin.dashboard.index')->with(['success' => 'Welcome back ' . $email]);
    //         } else {
    //             Auth::logout();
    //             Session::flush();
    //             $this->guard()->logout();
    //             return redirect()->back()->with(['error' => 'User Not Active']);
    //         }
    //         // var_dump($status);
    //     } else {
    //         return redirect()->back()->with(['error' => 'Invalid email or password']);
    //     }
    // }
    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     Session::flush();
    //     $this->guard()->logout();
    //     $request->session()->invalidate();
    //     return redirect()->route('login')->with(['success' => 'You have successfully logged out']);
    // }
}
