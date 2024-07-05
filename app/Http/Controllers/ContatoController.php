<?php

namespace App\Http\Controllers;

use App\Services\ContatoService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    private ContatoService $contatoService;

    public function __construct(ContatoService $contatoService)
    {
        $this->contatoService = $contatoService;
    }

    public function list()
    {
        $contatos = $this->contatoService->getAll();

        return view('pages.contato_lista')->with([
            "contatos" => $contatos
        ]);
    }

    public function post(Request $request): RedirectResponse
    {
        $data = $this->validateDataContato($request);
        $created = $this->contatoService->create($data);

        if ($created) {
            return redirect()->route('lista_contato');
        }

        return redirect()
            ->route('form-contato')
            ->with([
                "message" => "Erro ao criar contato, tente novamente mais tarde"
            ]);
    }

    private function validateDataContato(Request $request): array
    {
        return $request->validate([
            "nome"  => "required|max:100",
            "email" => "required|email"
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('pages.criar_contato');
    }

    public function put(Request $request): RedirectResponse
    {
        try {
            $idContato = $request->idContato;

            if (empty($idContato)) {
                return redirect()
                    ->route('form-contato')
                    ->with([
                        "message" => "Contato não encontrado."
                    ]);
            }

            $data = $this->validateDataContato($request);

            $this->contatoService->edit($data, $idContato);

            return redirect()->route('lista_contato');
        }catch (\Throwable) {
            return redirect()
                ->route('form-contato')
                ->with([
                    "message" => "Contato não alterado!"
                ]);
        }
    }

    public function edit(Request $request)
    {
        $idContato = $request->idContato;
        $contato = $this->contatoService->getById($idContato);

        return view('pages.criar_contato')->with([
            "contato" => $contato
        ]);
    }
}
