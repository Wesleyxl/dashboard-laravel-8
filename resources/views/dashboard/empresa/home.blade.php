@extends('layouts.dashboard')
@section('title', 'Dashboard - Empresa')
@section('ul-company', 'menu-open')
@section('li-company', 'active')
@section('a-company', 'active')
@section('content')

<!-- links -->
<link rel="stylesheet" href="{{ URL::to('/assets/dashboard/css/company.css') }}">
<!-- end links -->

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Empresas</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Empresas</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Empresas</h3>

                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Buscar">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 82px"></th>
                                    <th style="width: 10px">#</th>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Criado em</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="table-icons">
                                            <a class="btn btn-default" alt="Editar" title="Editar" href="{{ route('dashboard-company-edit', ['id' => 1]) }}">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-sm">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>1</td>
                                    <td>#3346</td>
                                    <td>Update software</td>
                                    <td>Descrição da empresa</td>
                                    <td>10:10 - 01/05/2022</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-danger"><strong>Atenção!</strong></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Quer mesmo apagar esta informação?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
              <a href="#" class="btn btn-danger">Apagar</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
</section>

@endsection
