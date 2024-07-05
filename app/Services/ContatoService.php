<?php

namespace App\Services;

use App\Models\Contato;
use App\Repositories\ContatoRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class ContatoService
{
    private ContatoRepository $contatoRepository;

    public function __construct(ContatoRepository $contatoRepository)
    {
        $this->contatoRepository = $contatoRepository;
    }

    public function create(array $data): bool
    {
        try {
            $contato = $this->contatoRepository->create($data);
            return $contato->id;
        } catch (\Exception $e) {
            Log::error("Erro ao criar contato!", $data);
            return false;
        }
    }

    public function edit(array $data, int $idContato): int
    {
        try {
            return $this->contatoRepository->update($data, $idContato);
        } catch (\Throwable $e) {
            Log::error("Erro ao alterar contato!", $data);
            return 0;
        }
    }

    public function getAll(): ?Collection
    {
        try {
            return $this->contatoRepository->all();
        } catch (\Throwable $e) {
            Log::error("Erro ao listar contatos!");
            return null;
        }
    }

    public function getById(int $idContato): ?Contato
    {
        try {
            return $this->contatoRepository->find($idContato);
        } catch (ModelNotFoundException) {
            Log::info("Tentando buscar um id de contato não existente, id => " . $idContato);
            return null;
        } catch (\Throwable $e) {
            Log::error("Erro ao buscar contato!");
            return null;
        }
    }
}
