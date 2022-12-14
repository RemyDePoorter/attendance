<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;

class StudentsTest extends DuskTestCase
{
    use DatabaseMigrations;


    /**
     * Test affichage titre Liste des étudiants
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/students')
                    ->assertSee('Liste des étudiants');
        });
    }

    /**
     * Test affichage etudiant g12345
     */
    public function testDiplayStudentg12345()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/students')
                    ->assertSee('g12345');
        });
    }

    /* TODO - check si la checkbox inquant la présence d'un etudiant est cochée
    https://laravel.com/docs/8.x/dusk

    public function testCheckPresent()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/students')
                    ->check('presence');
        });
    }

    public function testCheckAbsent()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/students')
                    ->uncheck('presence');
        });
    }
    **/

}
