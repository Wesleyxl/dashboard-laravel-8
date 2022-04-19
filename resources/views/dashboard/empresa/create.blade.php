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
        <div class="card card-secondary">
            <div class="card-header">
                <h4>Preencha todos os campos corretamente</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('dashboard-company-store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nome da empresa</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nome da empresa">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email da empresa</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email@empresa.com">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Telefone</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="(11) 1234-5678">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cel">Celular</label>
                                <input type="text" name="cel" id="cel" class="form-control" placeholder="(11) 91234-5678">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="code">Código de identificação</label>
                                <input type="text" name="code" id="code" class="form-control" placeholder="Ex: 1558">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Descrição da empresa" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cep">CEP</label>
                                <input type="text" name="cep" id="cep" class="form-control" placeholder="Digite um CEP">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="state">Estado</label>
                                <input type="text" name="state" id="state" class="form-control" placeholder="Digite um estado">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">Cidade</label>
                                <input type="text" name="city" id="city" class="form-control" placeholder="Digite uma cidade">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="street">Logradouro</label>
                                <input type="text" name="street" id="street" class="form-control" placeholder="Digite o endereço">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p><strong>Horários de funcionamento</strong></p>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card p-3">
                                <p><strong>Domingo:</strong></p>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="sunday-is-open">
                                        <label for="sunday-is-open">
                                            Aberto
                                        </label>
                                    </div>
                                </div>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="sunday-from">das</label>
                                        <input type="time" name="sunday-from" id="sunday-from">
                                    </div>
                                    <div class="form-group">
                                        <label for="sunday-to">até</label>
                                        <input type="time" name="sunday-to" id="sunday-to">
                                    </div>
                                </div>
                                <p style="margin-bottom: 5px;"><strong>Almoço</strong></p>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="sunday-lunch-from">das</label>
                                        <input type="time" name="sunday-lunch-from" id="sunday-lunch-from">
                                    </div>
                                    <div class="form-group">
                                        <label for="sunday-lunch-to">até</label>
                                        <input type="time" name="sunday-lunch-to" id="sunday-lunch-to">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3">
                                <p><strong>Segunda-Feira:</strong></p>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="monday-is-open">
                                        <label for="monday-is-open">
                                            Aberto
                                        </label>
                                    </div>
                                </div>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="monday-from">das</label>
                                        <input type="time" name="monday-from" id="monday-from">
                                    </div>
                                    <div class="form-group">
                                        <label for="monday-to">até</label>
                                        <input type="time" name="monday-to" id="monday-to">
                                    </div>
                                </div>
                                <p style="margin-bottom: 5px;"><strong>Almoço</strong></p>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="monday-lunch-from">das</label>
                                        <input type="time" name="monday-lunch-from" id="monday-lunch-from">
                                    </div>
                                    <div class="form-group">
                                        <label for="monday-lunch-to">até</label>
                                        <input type="time" name="monday-lunch-to" id="monday-lunch-to">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3">
                                <p><strong>Terça-Feira:</strong></p>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="tuesday-is-open">
                                        <label for="tuesday-is-open">
                                            Aberto
                                        </label>
                                    </div>
                                </div>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="tuesday-from">das</label>
                                        <input type="time" name="tuesday-from" id="tuesday-from">
                                    </div>
                                    <div class="form-group">
                                        <label for="tuesday-to">até</label>
                                        <input type="time" name="tuesday-to" id="tuesday-to">
                                    </div>
                                </div>
                                <p style="margin-bottom: 5px;"><strong>Almoço</strong></p>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="tuesday-lunch-from">das</label>
                                        <input type="time" name="tuesday-lunch-from" id="tuesday-lunch-from">
                                    </div>
                                    <div class="form-group">
                                        <label for="tuesday-lunch-to">até</label>
                                        <input type="time" name="tuesday-lunch-to" id="tuesday-lunch-to">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3">
                                <p><strong>Quarta-Feira:</strong></p>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="wednesday-is-open">
                                        <label for="wednesday-is-open">
                                            Aberto
                                        </label>
                                    </div>
                                </div>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="wednesday-from">das</label>
                                        <input type="time" name="wednesday-from" id="wednesday-from">
                                    </div>
                                    <div class="form-group">
                                        <label for="wednesday-to">até</label>
                                        <input type="time" name="wednesday-to" id="wednesday-to">
                                    </div>
                                </div>
                                <p style="margin-bottom: 5px;"><strong>Almoço</strong></p>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="wednesday-lunch-from">das</label>
                                        <input type="time" name="wednesday-lunch-from" id="wednesday-lunch-from">
                                    </div>
                                    <div class="form-group">
                                        <label for="wednesday-lunch-to">até</label>
                                        <input type="time" name="wednesday-lunch-to" id="wednesday-lunch-to">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3">
                                <p><strong>Quinta-Feira:</strong></p>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="thursday-is-open">
                                        <label for="thursday-is-open">
                                            Aberto
                                        </label>
                                    </div>
                                </div>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="thursday-from">das</label>
                                        <input type="time" name="thursday-from" id="thursday-from">
                                    </div>
                                    <div class="form-group">
                                        <label for="thursday-to">até</label>
                                        <input type="time" name="thursday-to" id="thursday-to">
                                    </div>
                                </div>
                                <p style="margin-bottom: 5px;"><strong>Almoço</strong></p>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="thursday-lunch-from">das</label>
                                        <input type="time" name="thursday-lunch-from" id="thursday-lunch-from">
                                    </div>
                                    <div class="form-group">
                                        <label for="thursday-lunch-to">até</label>
                                        <input type="time" name="thursday-lunch-to" id="thursday-lunch-to">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3">
                                <p><strong>Sexta-Feira:</strong></p>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="friday-is-open">
                                        <label for="friday-is-open">
                                            Aberto
                                        </label>
                                    </div>
                                </div>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="friday-from">das</label>
                                        <input type="time" name="friday-from" id="friday-from">
                                    </div>
                                    <div class="form-group">
                                        <label for="friday-to">até</label>
                                        <input type="time" name="friday-to" id="friday-to">
                                    </div>
                                </div>
                                <p style="margin-bottom: 5px;"><strong>Almoço</strong></p>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="friday-lunch-from">das</label>
                                        <input type="time" name="friday-lunch-from" id="friday-lunch-from">
                                    </div>
                                    <div class="form-group">
                                        <label for="friday-lunch-to">até</label>
                                        <input type="time" name="friday-lunch-to" id="friday-lunch-to">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3">
                                <p><strong>Sábado:</strong></p>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="saturnday-is-open">
                                        <label for="saturnday-is-open">
                                            Aberto
                                        </label>
                                    </div>
                                </div>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="saturnday-from">das</label>
                                        <input type="time" name="saturnday-from" id="saturnday-from">
                                    </div>
                                    <div class="form-group">
                                        <label for="saturnday-to">até</label>
                                        <input type="time" name="saturnday-to" id="saturnday-to">
                                    </div>
                                </div>
                                <p style="margin-bottom: 5px;"><strong>Almoço</strong></p>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="saturnday-lunch-from">das</label>
                                        <input type="time" name="saturnday-lunch-from" id="saturnday-lunch-from">
                                    </div>
                                    <div class="form-group">
                                        <label for="saturnday-lunch-to">até</label>
                                        <input type="time" name="saturnday-lunch-to" id="saturnday-lunch-to">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3">
                                <p><strong>Feriado:</strong></p>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="holiday-is-open">
                                        <label for="holiday-is-open">
                                            Aberto
                                        </label>
                                    </div>
                                </div>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="holiday-from">das</label>
                                        <input type="time" name="holiday-from" id="holiday-from">
                                    </div>
                                    <div class="form-group">
                                        <label for="holiday-to">até</label>
                                        <input type="time" name="holiday-to" id="holiday-to">
                                    </div>
                                </div>
                                <p style="margin-bottom: 5px;"><strong>Almoço</strong></p>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="holiday-lunch-from">das</label>
                                        <input type="time" name="holiday-lunch-from" id="holiday-lunch-from">
                                    </div>
                                    <div class="form-group">
                                        <label for="holiday-lunch-to">até</label>
                                        <input type="time" name="holiday-lunch-to" id="holiday-lunch-to">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>

</section>

@endsection
