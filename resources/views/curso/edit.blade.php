@extends('layout')

@section('dashboard-content')

<h2>Editar Curso</h2>

    @if(Session::get('sucesso'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('sucesso' )}} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('erro'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="gone">
        <strong> {{ Session::get('erro' )}} </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

<form  action="{{URL::to('update-curso-form')}}/{{ $curso->id }}" method="post">

    @csrf
    <div class="mb-3">
        <label for="InputNome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" placeholder="Adicione o nome do cursos" name="nome" value="{{$curso->nome}}" required>
    </div>
    <div class="mb-3">
        <label for="formControlTextareaDescricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="formControlTextareaDescricao" rows="3" name="descricao" required>{{$curso->descricao}}</textarea>
      </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>

@endsection
