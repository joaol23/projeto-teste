@extends('default')
@section('content')
    <div class="container">
        @if(!empty(session('message')))
            <div class="alert alert-danger">{{session('message')}}</div>
        @endif
        <form data-form-contato="" id="{{ !empty($contato) ? 'form-editar-contato' : 'form-criar-contato' }}" action="{{ !empty($contato) ? route('alterar_contato') : route('criar_contato') }}" method="POST" >
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" value="@if(!empty($contato)) {{ $contato->nome }} @endif" class="form-control" id="nome">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email"  value="@if(!empty($contato)) {{ $contato->email }} @endif" class="form-control" id="email">
            </div>
            @if(!empty($contato))
                @method("PUT")
                <input name="idContato" type="hidden" value="{{$contato->id}}"/>
            @endif
            <button type="submit" class="btn btn-primary">@if(!empty($contato)) Editar @else Criar @endif</button>
            <button type="button" data-lista class="btn btn-success">Lista</button>
        </form>
    </div>
@endsection
