<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;

class StudentController extends Controller
{
    public function getAllStudents()
    {
        return StudentModel::getAllStudents();
    }

    public function studentsView()
    {
        return view('students', ['students' => self::getAllStudents()]);
    }
}
