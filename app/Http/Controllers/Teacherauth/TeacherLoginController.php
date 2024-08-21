<?php

namespace App\Http\Controllers\Teacherauth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class TeacherLoginController extends Controller
{
    public function teacher_login()
    {
        return view('teacher.auth.teacherlogin');
    }
    public function teacher_store(Request $request)
    {
        //   dd($request->all());
        $login = (['teacher_email' => $request->teacheer_email, 'password' => $request->password]);
        // dd($login);
        // Hash::make($request->password);
        if (Auth::guard('teacher')->attempt($login)) {
            return redirect(RouteServiceProvider::TEACHER_HOME);
        } else {
            return back()->with('error', 'Whoops! invalid email and password.');
        }
    }
    public function teacher_logout(Request $request)
    {
        // dd('kk');
        Auth::guard('teacher')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/teacher_login');
    }
}
