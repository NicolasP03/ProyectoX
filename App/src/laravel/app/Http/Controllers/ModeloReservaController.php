<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModeloReservaRequest;
use App\Services\ReservaService;

class ModeloReservaController extends Controller
{
    protected $reservaService;

    public function __construct(ReservaService $reservaService)
    {
        $this->reservaService = $reservaService;
    }

    // Listar todas las reservas
    public function index()
    {
        return $this->reservaService->getAll();
    }

    // Crear una nueva reserva
    public function store(ModeloReservaRequest $request)
    {
        return $this->reservaService->create($request->validated());
    }

    // Mostrar una reserva por ID
    public function show($id)
    {
        $reserva = $this->reservaService->getById($id);
        if (!$reserva) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }
        return $reserva;
    }

    // Actualizar una reserva
    public function update(ModeloReservaRequest $request, $id)
    {
        $reserva = $this->reservaService->update($id, $request->validated());
        if (!$reserva) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }
        return $reserva;
    }

    // Eliminar una reserva
    public function destroy($id)
    {
        $deleted = $this->reservaService->delete($id);
        if (!$deleted) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }
        return response()->json(['message' => 'Reserva eliminada correctamente']);
    }
}
