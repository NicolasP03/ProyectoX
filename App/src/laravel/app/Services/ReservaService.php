<?php

namespace App\Services;

use App\Repositories\Interface\ReservaRepositoryInterface;

class ReservaService
{
    protected $reservaRepo;

    public function __construct(ReservaRepositoryInterface $reservaRepo)
    {
        $this->reservaRepo = $reservaRepo;
    }

    // Listar todas las reservas
    public function getAll()
    {
        return $this->reservaRepo->all();
    }

    // Obtener reserva por ID
    public function getById($id)
    {
        return $this->reservaRepo->find($id);
    }

    // Crear reserva
    public function create(array $data)
    {
        return $this->reservaRepo->create($data);
    }

    // Actualizar reserva
    public function update($id, array $data)
    {
        return $this->reservaRepo->update($id, $data);
    }

    // Eliminar reserva
    public function delete($id)
    {
        return $this->reservaRepo->delete($id);
    }
}
