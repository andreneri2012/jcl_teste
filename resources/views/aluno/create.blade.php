@extends('layout')

@section('dashboard-content')


<h2>Cadastrar Aluno</h2>
<form name="cadastrar_aluno">
    @csrf
    <div class="mb-3">
        <label for="InputNome" class="form-label">*Nome</label>
        <input type="text" class="form-control" id="nome" placeholder="Adicione aqui seu nome completo" name="nome" value="" required>
        <div class="invalid-feedback">
            *Campo obrigatório.
        </div>
    </div>
    <div class="mb-3">
      <label for="InputEmail" class="form-label">*Email</label>
      <input type="email" class="form-control" id="email" placeholder="Adicione aqui seu email" value="" name="email"  required>
      <div class="invalid-feedback">
        *Campo obrigatório.
    </div>
    </div>
    <div class="mb-3">
        <label for="selectFormControlSelect">*Cursos</label>
        <select class="form-control" id="selectFormControlSelect" name="curso_id">
            @foreach ($cursos as $curso)
            <option value="{{ $curso->id }}">{{$curso->nome}}</option>
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
    //  Fim Verificação Campos //

    //Verificando email
    $(function() {
        $('form[name="cadastrar_aluno"]').submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: "{{route('aluno.store')}}",
                type: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response){
                    if( response.email_ja_cadastrado == true ){
                        alert('Ops!! Email já cadastrado no Sistema');
                        $('#email').val('');
                        $('#email').addClass('is-invalid');
                        $('#email').removeClass('is-valid');
                    }else if( response.success == true){
                        alert('Salvo com sucesso');
                        removerDadosCampos();
                    }else{
                        alert('Erro ao salvar usuário');
                        removerDadosCampos();

                    }
                }
            });
        })
    });

    function removerDadosCampos(){
        $('#nome').val('');
        $('#email').val('');
        $('#email').removeClass('is-invalid');
        $('#email').removeClass('is-valid');

        $('#nome').removeClass('is-invalid');
        $('#nome').removeClass('is-valid');
    }

  </script>

@endsection
{{--
action="{{URL::to('post-aluno-form')}}" method="post" --}}



