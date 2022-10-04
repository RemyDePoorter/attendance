<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\StudentModel;

class StudentModelTest extends TestCase
{
    /**
     * ajout d'un étudiant classique
     */
    public static function test_addStudent()
    {
        $matricule = '1';
        $prenom = "SpongeBob";
        $nom = "SquareParents";
        $groupe = "E12";
        $presence = "true";

        addStudent($matricule, $prenom, $nom, $groupe, $presence);

        $this->assertDataBaseHas('students', [
            'matricule' => $matricule,
            'prenom' => $prenom,
            'nom' => $nom,
            'groupe' => $groupe,
            'presence' => $presence]);
    }

    /**
     * ajout d'un étudiant avec matricule négatif
     */
    public static function test_addStudent_withNegativeMatricule()
    {
        $matricule = '-11';
        $prenom = "SpongeBob";
        $nom = "SquareParents";
        $groupe = "E12";
        $presence = "true";

        $test = addStudent($matricule, $prenom, $nom, $groupe, $presence);

        $this->assertException( $test, 'InvalidArgumentException', 100, 'Etudiant non valide' );
    }

    /**
     * ajout d'un étudiant avec matricule déjà existant
     */
    public static function test_addStudent_AllReadyExist()
    {
        $matricule = '1';
        $prenom = "SpongeBob";
        $nom = "SquareParents";
        $groupe = "E12";
        $presence = "true";

        $test = addStudent($matricule, $prenom, $nom, $groupe, $presence);

        $this->assertException( $test, 'InvalidArgumentException', 100, 'L étudiant existe déjà' );
    }

    /**
     * Mise à jour classique d'un étudiant
     */
    public static function test_updateStudent()
    {
        $matricule = '1';
        $prenom = "SpongeBob";
        $nom = "SquareParents";
        $groupe = "E12";
        $presence = "true";

        addStudent($matricule, $prenom, $nom, $groupe, $presence);
        $presence = "false";
        updateStudent($matricule, $prenom, $nom, $groupe, $presence);

        $this->assertDataBaseHas('students', [
            'matricule' => $matricule,
            'prenom' => $prenom,
            'nom' => $nom,
            'groupe' => $groupe,
            'presence' => $presence]);
    }

    /**
     * Mise à jour non valide d'un étudiant
     */
    public static function test_updateStudent_withNegativeMatricule()
    {
        $matricule = '1';
        $prenom = "SpongeBob";
        $nom = "SquareParents";
        $groupe = "E12";
        $presence = "true";

        addStudent($matricule, $prenom, $nom, $groupe, $presence);
        $matricule = "-1";
        $test = updateStudent($matricule, $prenom, $nom, $groupe, $presence);

        $this->assertException( $test, 'InvalidArgumentException', 100, 'Argument non valide' );
    }

    /**
     * Suppression d'un étudiant
     */
    public static function test_deleteStudent()
    {
        $matricule = '1';
        $prenom = "SpongeBob";
        $nom = "SquareParents";
        $groupe = "E12";
        $presence = "true";

        addStudent($matricule, $prenom, $nom, $groupe, $presence);
        deleteStudent($matricule);

        $this->assertDataBaseMissing('students', [
            'matricule' => $matricule,
            'prenom' => $prenom,
            'nom' => $nom,
            'groupe' => $groupe,
            'presence' => $presence]);
    }

    /**
     * Suppression d'un étudiant qui n'existe pas
     */
    public static function test_deleteStudent_NoExist()
    {
        $matricule = '1';
        $prenom = "SpongeBob";
        $nom = "SquareParents";
        $groupe = "E12";
        $presence = "true";

        addStudent($matricule, $prenom, $nom, $groupe, $presence);
        $test = deleteStudent($matricule);

        $this->assertException( $test, 'InvalidArgumentException', 100, 'L etudiant n existe pas' );
    }
}
