@extends('layouts.dashboard')
@section('title', 'Dashboard - Empresa')
@section('ul-company', 'menu-open')
@section('li-company', 'active')
@section('a-company-create', 'active')
@section('content')

<!-- links -->
<link rel="stylesheet" href="{{ URL::to('/assets/dashboard/css/company.css') }}">
<!-- end links -->

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Cadastrar</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <a href="{{ route('dashboard-company') }}" class="breadcrumb-item">Empresas</a>
                    <li class="breadcrumb-item active">Cadastro</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<section class="content">
    <div class="container-fluid">

    </div>

</section>

@endsection
