<?php

namespace App\Repositories;

use App\Models\ModeloReserva;

class ReservaRepository implements ReservaRepositoryInterface
{
    protected $model;

    public function __construct(ModeloReserva $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model::all();
    }

    public function find(int $id): ?ModeloReserva
    {
        return $this->model::find($id);
    }

    public function create(array $data): ModeloReserva
    {
        return $this->model::create($data);
    }

    public function update(int $id, array $data): ?ModeloReserva
    {
        $reserva = $this->find($id);
        if ($reserva) {
            $reserva->update($data);
        }
        return $reserva;
    }

    public function delete(int $id): bool
    {
        $reserva = $this->find($id);
        if ($reserva) {
            return $reserva->delete();
        }
        return false;
    }
}
