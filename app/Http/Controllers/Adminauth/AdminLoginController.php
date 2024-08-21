<?php

namespace App\Http\Controllers\Adminauth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;


class AdminLoginController extends Controller
{
    public function create()
    {
        return view('admin.auth.login');
    }
    public function store(Request $request)
    {
        $login = (['admin_email' => $request->email, 'password' => $request->password]);
        // Hash::make($request->password);
        // dd($login);
        if (Auth::guard('admin')->attempt($login)) {
            return redirect(RouteServiceProvider::ADMIN_HOME);
        } else {
            return back()->with('error', 'Whoops! invalid email and password.');
        }
    }
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin_login');
    }
}
