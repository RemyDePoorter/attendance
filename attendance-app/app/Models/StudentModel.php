<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use PDO;

class StudentModel extends Model
{

    public static function getAllStudents()
    {
        $students = DB::select("SELECT matricule, prenom, nom, groupe, presence FROM students ORDER BY matricule");
        return json_encode($students);
    }

    public static function getStudent($matricule)
    {
        $student = DB::table('students')->where('matricule', $matricule)->get();
        return json_encode($student);
    }

    public static function addStudent($matricule, $prenom, $nom, $groupe, $presence)
    {
        $student = DB::table('students')->insert(
            [
                'matricule' => $matricule,
                'prenom' => $prenom,
                'nom' => $nom,
                'groupe' => $groupe,
                'presence' => $presence
            ],
        );

        return json_encode($student);
    }

    public static function updateStudent($matricule, $prenom, $nom, $groupe, $presence)
    {
        DB::table('students')->updateOrInsert(
            [
                'matricule' => $matricule,
                'prenom' => $prenom,
                'nom' => $nom,
                'groupe' => $groupe,
                'presence' => $presence
            ]
        );
    }

    public static function deleteStudent($matricule)
    {
        DB::table('students')->where('matricule', $matricule)->delete();
    }
}
