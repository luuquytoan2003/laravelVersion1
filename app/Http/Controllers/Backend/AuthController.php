<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        //
    }
    public function index()
    {
        if (Auth::id()) {
            return redirect()->route('dashboard');
        }
        return view('backend.auth.login');
    }
    public function login(AuthRequest $request)
    {
        $credentials = $request->only([
            'email',
            'password'
        ]);
        if (Auth::attempt($credentials)) {
            toastr()->success('Đăng nhập thành công');
            return redirect()->route('dashboard');
        }
        toastr()->error('Sai email hoặc mật khẩu');
        return redirect()->route('auth.admin');
    }

    public function logout(Request $request)
    {
        echo 1234;
        die();
        // Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        // // toastr()->info('Đã đăng xuất thành công');
        // return redirect()->route('auth.admin');
    }
    public function test()
    {
        dd(Auth::id());
    }
}
