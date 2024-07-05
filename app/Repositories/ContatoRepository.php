<?php

namespace App\Repositories;

use App\Models\Contato;
use Illuminate\Database\Eloquent\Collection;

class ContatoRepository extends AbstractRepository
{
    protected static string $model = Contato::class;

    public function update(
        array $data,
        int $idContato
    ): int {
        return self::loadModel()
            ->query()
            ->where(static::loadModel()
                ->getKeyName(), $idContato)
            ->update($data);
    }

    public function all(): Collection
    {
        return self::loadModel()::query()
            ->get();
    }

    public function create($data): Contato
    {
        return self::loadModel()
            ->query()
            ->create($data);
    }

    public function find(int $id): Contato
    {
        return static::loadModel()
            ->query()
            ->findOrFail($id);
    }
}
