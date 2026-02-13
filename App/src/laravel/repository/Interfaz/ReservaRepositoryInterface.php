<?php

namespace App\Repositories;

use App\Models\ModeloReserva;

interface ReservaRepositoryInterface
{
    public function all();
    public function find(int $id): ?ModeloReserva;
    public function create(array $data): ModeloReserva;
    public function update(int $id, array $data): ?ModeloReserva;
    public function delete(int $id): bool;
}
