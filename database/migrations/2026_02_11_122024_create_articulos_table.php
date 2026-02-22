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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('referencia',10);
            $table->string('descripcion',80);
            $table->foreignId('familia_id')->constrained('familias');
            $table->foreignId('proveedor_id')->constrained('proveedors');
            $table->decimal('preciocosto',10,2);
            $table->decimal('pvp',10,2);
            $table->string('refprove',20)->nullable();
            $table->boolean('baja')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
