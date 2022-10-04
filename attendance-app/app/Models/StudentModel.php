<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use PDO;

class StudentModel extends Model
{

    public static function getAllStudents(){
        return DB::select("SELECT matricule, prenom, nom, groupe, presence FROM students ORDER BY matricule");
    }

}
