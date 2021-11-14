@extends('layout')

@section('dashboard-content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Visão Geral</li>
      </ol>

      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">{{$quantAlunos}} alunos cadastrado(s)</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Último Aluno Cadastrado : {{$ultimoAlunoInserido->nome}}</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-list"></i>
              </div>
              <div class="mr-5">{{ $quantCursos }} Curso(s) Cadastrado(s)</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Último Curso Cadastrado : {{$ultimoCursoInserido->nome}}</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

      </div>



      <!-- DataTables Example -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Alunos Cadastrados</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($alunos as $aluno)
                  <tr>
                    <td>{{$aluno->nome}}</td>
                    <td>{{$aluno->email}}</td>
                  </tr>
                  @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>



      <script>

        $(document).ready(function () {

            $('#dataTable').DataTable({
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


    </script>

@endsection
