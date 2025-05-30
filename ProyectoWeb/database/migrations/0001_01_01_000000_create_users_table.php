<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('usuario');
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->boolean('terminos')->default(false);
            $table->timestamp('terminos_aceptados_en')->nullable();
            $table->rememberToken(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
