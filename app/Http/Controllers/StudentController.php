<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentRegistered;

class StudentController extends Controller
{
    public function list()
    {
        $students = Student::all();

        return view('student.list', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'age' => 'required|integer|min:1',
            'email' => 'required|email|unique:students,email',
        ]);

        $student = Student::create([
            'name'  => $request->name,
            'age'   => $request->age,
            'email' => $request->email,
        ]);

        Mail::to($student->email)
            ->send(new StudentRegistered($student));

        return redirect('/student/list')
            ->with('success', '学生を登録しました。メールを送信しました。');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'age' => 'required|integer|min:1',
            'email' => 'required|email|unique:students,email,' . $id,
        ]);

        $student = Student::findOrFail($id);

        $student->update($validated);

        return redirect('/student/list');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect('/student/list');
    }
}