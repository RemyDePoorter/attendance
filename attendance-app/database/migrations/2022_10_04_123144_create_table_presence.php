<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_presence', function (Blueprint $table) {
            $table->string("matricule")->primary();
            $table->string("prenom");
            $table->string("nom");
            $table->string("groupe");
            $table->boolean("presence");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_presence');
    }
};
