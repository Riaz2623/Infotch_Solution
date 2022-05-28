<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public $student;
    public $image;
    public function index()
    {
        $student = Student::latest()->paginate(10);

        return view('students.index',compact('student'))
            ->with('i', (request()->input('page', 1) - 1) * 10);

    }

    public function create()
    {
        return view('students.create');
    }


    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'student-images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Student::create($input);

        return redirect()->route('students.index')->with('success','Students created successfully.');
    }


    public function show(Student $student)
    {
        return view('students.show',compact('student'));
    }


    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required'

        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'student-images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $student->update($input);
        return redirect()->route('students.index')->with('success','Students updated successfully');

    }


    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success','Students deleted successfully');
    }
}
