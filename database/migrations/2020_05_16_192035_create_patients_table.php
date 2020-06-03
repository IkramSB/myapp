<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
                $table->increments('ID_patient');
                $table->string('Nom' , 50);
                $table->string('Prenom' , 50);
                $table->string('Num_tele' , 10); 
                $table->string('CIN' , 10)->unique();
                $table->string('Num_assurance' , 30);
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
        Schema::dropIfExists('patients');
    }
}
