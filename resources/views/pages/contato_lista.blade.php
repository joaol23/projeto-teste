@extends('default')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contatos as $contato)
                <tr>
                    <td>{{$contato->id}}</td>
                    <td>{{$contato->nome}}</td>
                    <td>{{$contato->email}}</td>
                    <td>
                        <button data-alterar-contato="{{$contato->id}}" class="btn btn-success">Editar</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <button data-criar class="btn btn-primary">Criar</button>
    </div>
@endsection
