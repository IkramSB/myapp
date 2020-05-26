<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiermedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiermedicals', function (Blueprint $table) {
            $table->increments('ID_dossier');
            $table->date('Date_Naissance');
            $table->string('Sexe' , 10);
            $table->integer('Taille');
            $table->decimal('Poids' , 5, 2);
            $table->string('Type_sanguin' , 3);
            $table->text('Maladie_chronique');
            $table->text('Allergie');
            $table->text('Maladies_antecedentes');
            $table->text('Medicaments_utilises');
            $table->binary('Nouveau_symptome');
            $table->integer('ID_patient');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dossiermedicals');
    }
}
