<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';

    protected $fillable = [
        'nombre_cliente',
        'personas',
        'fecha_reserva',
        'hora_reserva',
        'estado',
    ];
}
