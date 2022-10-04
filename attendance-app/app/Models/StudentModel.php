<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PDO;

class StudentModel extends Model
{

    public static function getAllStudents()
    {
        return DB::select("SELECT matricule, prenom, nom, groupe, presence FROM students ORDER BY matricule");
    }

    public static function addStudent(Request $request)
    {
        $matricule = $request->get('matricule');
        $prenom = $request->get("prenom");
        $nom = $request->get("nom");
        $groupe = $request->get("groupe");
        $presence = $request->get("presence");
        DB::table('students')->insert(
            [
                'matricule' => $matricule,
                'prenom' => $prenom,
                'nom' => $nom,
                'groupe' => $groupe,
                'presence' => $presence
            ],
        );
    }

    public static function updateStudent(Request $request, $matricule)
    {
        $matricule = $request->get('matricule');
        $prenom = $request->get("prenom");
        $nom = $request->get("nom");
        $groupe = $request->get("groupe");
        $presence = $request->get("presence");
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
        return DB::table('students')->delete($matricule);
    }
}
