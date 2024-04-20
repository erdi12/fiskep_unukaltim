<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('lpm')) {
            return redirect()->route('lpm.index'); // Ganti 'lpm.index' dengan nama rute yang sesuai
        } elseif ($user->hasRole('admin')) {
            return redirect()->route('dashboard'); // Ganti 'admin.dashboard' dengan nama rute dashboard admin
        } elseif ($user->hasRole('super_admin')) {
            return redirect()->route('dashboard'); // Ganti 'super_admin.dashboard' dengan nama rute dashboard super admin
        }
    }
}
