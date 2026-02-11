<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);              // requerido
            $table->string('cif', 10);                 // requerido

            $table->string('direccion', 80)->nullable();
            $table->string('poblacion', 50)->nullable();
            $table->string('provincia', 80)->nullable();
            $table->string('codpostal', 10)->nullable();

            $table->string('telefono1', 10)->nullable();
            $table->string('telefono2', 10)->nullable();

            $table->string('correo', 100)->nullable(); // email se almacena como string

            $table->longText('observaciones')->nullable(); // equivalente a Memo
            $table->timestamps();
        });
    }

  

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
