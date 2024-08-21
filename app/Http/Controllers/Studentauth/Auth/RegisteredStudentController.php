<?php

namespace App\Http\Controllers\Studentauth\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class RegisteredStudentController extends Controller
{
    public function student_register()
    {
        return view('student.auth.register');
    }


    public function student_store(Request $request)
    {
        //  dd($request->all());
        $student = new Student();
        $student->student_name = $request->student_name;
        $student->student_email = $request->student_email;
        $student->student_password = Hash::make($request->password);

        if ($student->save()) {
            return redirect()->back()->with('message', 'IT WORKS!');
        }
    }
}
