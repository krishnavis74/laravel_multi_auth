<?php

namespace App\Http\Controllers\Studentauth\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;

class StudentLoginController extends Controller
{
    public function student_login()
    {
        return view('student.auth.login');
    }
    public function store(Request $request)
    {
        //   dd($request->all());
        $login = (['student_email' => $request->student_email, 'password' => $request->student_password]);
        // dd($login);
        // Hash::make($request->password);
        if (Auth::guard('student')->attempt($login)) {
            return redirect(RouteServiceProvider::STUDENT_HOME);
        } else {
            return back()->with('error', 'Whoops! invalid email and password.');
        }
    }
    public function student_logout(Request $request)
    {
        //  dd('kk');
        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/student_login');
    }
    
}
