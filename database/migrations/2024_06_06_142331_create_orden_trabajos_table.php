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
        Schema::create('ordenes_trabajos', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity_used');
            $table->date('date');
            $table->text('observations')->nullable();
            $table->unsignedBigInteger('mantenimiento_id');
            $table->foreign('mantenimiento_id')->references('id')->on('mantenimientos');
            $table->unsignedBigInteger('inventario_pieza_id');
            $table->foreign('inventario_pieza_id')->references('id')->on('inventario_piezas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes_trabajos');
    }
};
