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


<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Alunos Cadastrados</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTableAlunos" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Email</th>
              <th>Ação</th>
            </tr>
          </thead>

          <tbody>
              @foreach ($alunos as $aluno)
              <tr>
                <td>{{$aluno->nome}}</td>
                <td>{{$aluno->email}}</td>
                <td>
                    <a href="{{ URL::to( 'editar-aluno' ) }}/{{ $aluno->id }}" class="btn btn-outline-primary btn-sm" >Editar</a>
                    |
                    <a href="{{ URL::to( 'remover-aluno' ) }}/{{ $aluno->id }}" class="btn btn-outline-danger btn-sm" onclick="return checkDelete()" >Remover</a>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <script>
          $(document).ready(function () {

                $('#dataTableAlunos').DataTable({
                    "responsive": true,
                    "aaSorting": [[0, "asc"]],
                    "iDisplayLength": 10,
                    "language": {
                        "lengthMenu": "Visualizar até _MENU_ registros por página",
                        "zeroRecords": "Nenhum registro encontrado",
                        "info": "Visualizando página _PAGE_ de _PAGES_",
                        "infoEmpty": "Nenhum registro encontrado",
                        "infoFiltered": "(filtrando de _MAX_ registros)",
                        "search": "Filtrar:",
                        "paginate": {
                            "first": "Início",
                            "last": "Última",
                            "next": "Próxima",
                            "previous": "Anterior"
                        },
                    }
                });

        });

      function checkDelete() {
         var check =  confirm('Tem certeza que deseja remover esse aluno?');
         if(check){
             return true;
         }
         return false;
      }


  </script>

  @endsection
