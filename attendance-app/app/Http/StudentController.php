<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;

class MenuEmplacementsCTRL extends Controller
{
    public function getAllStudents(){
        $Students = StudentModel::getAllStudents();
        return view('Students', ['Students' => $Students]);
    }
}
