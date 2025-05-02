<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table){
            $table->id();
            $table->integer('rol_id')->comment('Rol de usuario');
            $table->string('name', 50)->comment('Nombre del usuario');
            $table->string('last_name', 50)->comment('Apellidos del usuario');
            $table->integer('document_type')->comment('Tipo docuemnto documento del usuario');
            $table->string('document_number', 15)->unique()->comment('Numero de documento del usuario');
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->date('birthdate')->comment('Fecha de nacimiento');
            $table->smallInteger('state')->default(1)->comment('Estado del usuario (0, 1)');
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
        Schema::dropIfExists('users');
    }
}
