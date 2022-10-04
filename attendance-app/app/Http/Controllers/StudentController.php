<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getAllStudents()
    {
        return json_decode(StudentModel::getAllStudents());
    }

    public function getStudent($matricule)
    {
        return json_decode(StudentModel::getStudent($matricule));
    }

    public static function addStudent(Request $request)
    {
        $matricule = $request->get('matricule');
        $prenom = $request->get("prenom");
        $nom = $request->get("nom");
        $groupe = $request->get("groupe");
        $presence = $request->get("presence");
        $student = StudentModel::addStudent($matricule, $prenom, $nom, $groupe, $presence);
        return response()->json([
            "success" => true,
            "message" => "created",
            "data" => $student
        ], 201);
    }

    public static function updateStudent(Request $request, $matricule)
    {
        $matricule = $request->get('matricule');
        $prenom = $request->get("prenom");
        $nom = $request->get("nom");
        $groupe = $request->get("groupe");
        $presence = $request->get("presence");
        $student = StudentModel::updateStudent($matricule, $prenom, $nom, $groupe, $presence);
        return response()->json([
            "success" => true,
            "message" => "edited",
            "data" => $student
        ], 201);
    }

    public static function deleteStudent($matricule)
    {
        $student =  StudentModel::deleteStudent($matricule);
        return response()->json([
            "success" => true,
            "message" => "deleted",
            "data" => $student
        ], 204);
    }

    public function studentsView()
    {
        return view('students', ['students' => self::getAllStudents()]);
    }
}
