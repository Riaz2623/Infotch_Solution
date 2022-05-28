<?php

namespace App\Http\Controllers;

use App\Models\Student_Result;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Session;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.home');
    }

    public function create(Request $request)
    {
        $name=$request->name;
        $subject=$request->subject;
        $image=$request->file->getClientOriginalName();
        $number=$request->number;
        $sql="INSERT INTO `students`( `name`, `image`) VALUES ('$name','$image')";
        DB::insert($sql);
        $studentId=DB::getPdo()->lastInsertId();
        $insertSubject="INSERT INTO `subjects`(`subject_name`) VALUES ('$subject')";
        DB::insert($insertSubject);
        $subjectId=DB::getPdo()->lastInsertId();
        $marks="INSERT INTO `student__results`( `subject_id`, `student_id`, `number`) VALUES ('$subjectId','$studentId','$number')";
        DB::insert($marks);
        return redirect()->back()->with('message','Student_Result info create ');
    }
}
