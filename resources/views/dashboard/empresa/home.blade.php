@extends('layouts.dashboard')
@section('title', 'Dashboard - Empresa')
@section('li-company', 'menu-open')
@section('a-company', 'active')
@section('content')

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
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Empresas</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">id</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Código</th>
                                    <th>Criado por</th>
                                    <th>Criado em</th>

                                    <th style="width: 40px">status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Update software</td>
                                    <td>Descrição da empresa</td>
                                    <td>#3346</td>
                                    <td>Wesley Alves</td>
                                    <td>10:10 - 01/05/2022</td>
                                    <td>
                                        <button class="btn btn-success">
                                            <span>Ativo</span>
                                        </button>
                                    </td>
                                    <td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Update software</td>
                                    <td>Descrição da empresa</td>
                                    <td>#3346</td>
                                    <td>Wesley Alves</td>
                                    <td>20:30 - 01/05/2022</td>
                                    <td>
                                        <button class="btn btn-warning">
                                            <span>Inativo</span>
                                        </button>
                                    </td>
                                    <td>
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
</section>

@endsection
