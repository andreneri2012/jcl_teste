@extends('layout')

@section('dashboard-content')

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



<h2>Editar Aluno</h2>
<form action="{{URL::to('update-aluno-form')}}/{{ $aluno->id }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="InputNome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" placeholder="Adicione aqui seu nome" name="nome" value="{{$aluno->nome}}" required>
        <div class="invalid-feedback">
            *Campo obrigatório.
        </div>
    </div>
    <div class="mb-3">
      <label for="InputEmail" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" placeholder="Adicione aqui seu email" value="{{$aluno->email}}" name="email"  required>
      <div class="invalid-feedback">
        *Campo obrigatório.
    </div>
    </div>
    <div class="mb-3">
        <label for="selectFormControlSelect">Cursos</label>
        <select class="form-control" id="selectFormControlSelect" name="curso_id">
            @foreach ($cursos as $curso)
            <option value="{{ $curso->id }}" @if ($curso->id == $aluno->curso_id ) selected
            @endif >{{$curso->nome}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>

  <script>
    //  Inicio Verificação Campos //
      $( "#nome" ).on('change, blur, keyup', function() {

          if($.trim($('#nome').val()) != ''){
            $('#nome').removeClass('is-invalid');
            $('#nome').addClass('is-valid');
          }else{
            $('#nome').addClass('is-invalid');
          }
        });

        $( "#email" ).on('change, blur, keyup', function() {

          if($.trim($('#email').val()) != ''){
            $('#email').removeClass('is-invalid');
            $('#email').addClass('is-valid');
          }else{
            $('#email').addClass('is-invalid');
          }
        });

  </script>

@endsection




