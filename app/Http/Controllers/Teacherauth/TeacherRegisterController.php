<?php

namespace App\Http\Controllers\Teacherauth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherRegisterController extends Controller
{
    public function teacher_register()
    {
        return view('teacher.auth.teacherregister');
    }


    public function teacher_store(Request $request)
    {
        // dd($request->all());
        $teacher = new Teacher();
        $teacher->teacher_name = $request->teacher_name;
        $teacher->teacher_email = $request->teacher_email;
        $teacher->password = Hash::make($request->password);

        if ($teacher->save()) {
            return redirect()->back()->with('message', 'IT WORKS!');
        }
    }
}
