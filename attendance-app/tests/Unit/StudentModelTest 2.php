<?php

namespace Tests\Unit;

use App\Models\StudentModel;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentModelTest extends TestCase
{
    use RefreshDatabase;
    /**
     * ajout d'un étudiant classique
     */
    public function test_addStudent()
    {
        $matricule = 1;
        $prenom = "SpongeBob";
        $nom = "SquareParents";
        $groupe = "E12";
        $presence = true;

        StudentModel::addStudent($matricule, $prenom, $nom, $groupe, $presence);
        $this->assertDataBaseHas('students', [
            'matricule' => $matricule,
            'prenom' => $prenom,
            'nom' => $nom,
            'groupe' => $groupe,
            'presence' => $presence
        ]);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function test_addStudent_withNegativeMatricule()
    {
        $matricule = -11;
        $prenom = "SpongeBob";
        $nom = "SquareParents";
        $groupe = "E12";
        $presence = true;

        StudentModel::addStudent($matricule, $prenom, $nom, $groupe, $presence);

        $this->assertDatabaseMissing('students', [
            'matricule' => $matricule,
            'prenom' => $prenom,
            'nom' => $nom,
            'groupe' => $groupe,
            'presence' => $presence
        ]);
    }

    /**
     * ajout d'un étudiant avec matricule déjà existant
     */
    public function test_addStudent_AllReadyExist()
    {
        $matricule = 1;
        $prenom = "SpongeBob";
        $nom = "SquareParents";
        $groupe = "E12";
        $presence = true;

        StudentModel::addStudent($matricule, $prenom, $nom, $groupe, $presence);

        $this->assertDatabaseHas('students', [
            'matricule' => $matricule,
            'prenom' => $prenom,
            'nom' => $nom,
            'groupe' => $groupe,
            'presence' => $presence
        ]);
    }

    /**
     * Mise à jour classique d'un étudiant
     */
    public function test_updateStudent()
    {
        $matricule = 1;
        $prenom = "SpongeBob";
        $nom = "SquareParents";
        $groupe = "E12";
        $presence = true;

        $presence = "false";
        StudentModel::updateStudent($matricule, $prenom, $nom, $groupe, $presence);

        $this->assertDataBaseHas('students', [
            'matricule' => $matricule,
            'prenom' => $prenom,
            'nom' => $nom,
            'groupe' => $groupe,
            'presence' => $presence
        ]);
    }

    /**
     * Mise à jour non valide d'un étudiant
     */
    public function test_updateStudent_withNegativeMatricule()
    {
        $matricule = 1;
        $prenom = "SpongeBob";
        $nom = "SquareParents";
        $groupe = "E12";
        $presence = true;

        $matricule = -1;
        StudentModel::updateStudent($matricule, $prenom, $nom, $groupe, $presence);

        $this->assertDatabaseMissing('students', [
            'matricule' => $matricule,
            'prenom' => $prenom,
            'nom' => $nom,
            'groupe' => $groupe,
            'presence' => $presence
        ]);
    }

    /**
     * Suppression d'un étudiant
     */
    public function test_deleteStudent()
    {
        $matricule = 1;
        $prenom = "SpongeBob";
        $nom = "SquareParents";
        $groupe = "E12";
        $presence = true;

        StudentModel::addStudent($matricule, $prenom, $nom, $groupe, $presence);
        StudentModel::deleteStudent($matricule);

        $this->assertDataBaseMissing('students', [
            'matricule' => $matricule,
            'prenom' => $prenom,
            'nom' => $nom,
            'groupe' => $groupe,
            'presence' => $presence
        ]);
    }

    /**
     * Suppression d'un étudiant qui n'existe pas
     */
    public function test_deleteStudent_NoExist()
    {
        $matricule = 1;
        $prenom = "SpongeBob";
        $nom = "SquareParents";
        $groupe = "E12";
        $presence = true;

        StudentModel::addStudent($matricule, $prenom, $nom, $groupe, $presence);
        StudentModel::deleteStudent($matricule);

        $this->assertDatabaseMissing('students', [
            'matricule' => $matricule,
            'prenom' => $prenom,
            'nom' => $nom,
            'groupe' => $groupe,
            'presence' => $presence
        ]);
    }
}
