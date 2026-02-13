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
        // Solo crear la tabla si no existe
        if (!Schema::hasTable('reservas')) {
            Schema::create('reservas', function (Blueprint $table) {
                $table->id();                       // ID autoincrement
                $table->string('nombre_cliente');   // Nombre de la persona que reserva
                $table->integer('personas');        // Cantidad de personas
                $table->date('fecha_reserva');      // Fecha de la reserva
                $table->time('hora_reserva');       // Hora de la reserva
                $table->string('estado')->default('pendiente'); // Estado: pendiente, confirmada, cancelada
                $table->timestamps();               // created_at y updated_at
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Solo eliminar la tabla si existe
        if (Schema::hasTable('reservas')) {
            Schema::dropIfExists('reservas');
        }
    }
};

