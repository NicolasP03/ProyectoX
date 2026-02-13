<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Solo crear la tabla si no existe
        if (!Schema::hasTable('reservas')) {
            Schema::create('reservas', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('cliente_id');
                $table->date('fecha_reserva');
                $table->time('hora_reserva');
                $table->string('estado')->default('pendiente');
                $table->timestamps();

                // Llave foránea
                $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('reservas')) {
            // Primero eliminar foreign key si existe
            Schema::table('reservas', function (Blueprint $table) {
                $table->dropForeign(['cliente_id']);
            });

            // Luego eliminar la tabla
            Schema::dropIfExists('reservas');
        }
    }
};
