@extends('layouts.dashboard')
@section('title', 'Dashboard - Empresa')
@section('ul-company', 'menu-open')
@section('li-company', 'active')
@section('a-company', 'active')
@section('content')

<!-- links -->
<link rel="stylesheet" href="{{ URL::to('/assets/dashboard/css/layout.css') }}">
<!-- end links -->

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <a href="{{ route('dashboard-company') }}" class="breadcrumb-item">Empresas</a>
                    <li class="breadcrumb-item active">editar</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<section class="content company">
    <div class="container-fluid">
        <div class="card card-secondary">
            <div class="card-header">
                <h4>Preencha todos os campos corretamente</h4>
            </div>
            <div class="card-body">
                <form  method="POST" enctype="multipart/form-data" action="{{ route('dashboard-company-update', ['id' => $company['id']]) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nome da empresa</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nome da empresa" value="{{ $company['name'] }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email da empresa</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email@empresa.com" value="{{ $company['email'] }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" id="website" name="website" class="form-control @error('website') is-invalid @enderror" placeholder="www.website.com.br" value="{{ $company['website'] }}">
                                @error('website')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Telefone</label>
                                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="(11) 1234-5678" onkeypress="$(this).mask('(00) 0000-0000')" value="{{ $company['phone'] }}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cel">Celular</label>
                                <input type="text" name="cellphone" id="cellphone" class="form-control @error('cellphone') is-invalid @enderror" placeholder="(11) 91234-5678" onkeypress="$(this).mask('(00) 00000-0000')" value="{{ $company['cellphone'] }}">
                                @error('cellphone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="code">Código de identificação</label>
                                <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" placeholder="Ex: 1558" value="{{ $company['code'] }}">
                                @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="category">Selecione uma categoria*</label>
                                <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                                    @if (count($categories) < 1)
                                        <option value="">Não há categoria cadastrada</option>
                                    @else
                                        <option value="">Selecione uma categoria</option>
                                        @foreach ($categories as $category)
                                            <optgroup label="{{ $category['name'] }}">
                                                @foreach ($subcategories as $subcategory)
                                                    @if($subcategory['category_id'] === $category['id'])
                                                        @if($subcategory['id'] != $company['subcategory_id'])
                                                            <option value="{{ $subcategory['id'] }}-{{ $category['id'] }}">{{ $subcategory['name'] }}</option>
                                                        @else
                                                            <option selected value="{{ $subcategory['id'] }}-{{ $category['id'] }}">{{ $subcategory['name'] }}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    @endif
                                </select>
                                @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Descrição da empresa" rows="5">{{ $company['description'] }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="map">Mapa</label>
                                <textarea name="map" id="map" rows="5" class="form-control @error('map') is-invalid @enderror" placeholder="Cole o mapa aqui">{{ $company['map'] }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cep">CEP</label>
                                <input type="text" name="cep" id="cep" class="form-control @error('cep') is-invalid @enderror" placeholder="Digite um CEP" onkeypress="$(this).mask('00000-000')" value="{{ $company['cep'] }}">
                                @error('cep')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="uf">Estado</label>
                                <select name="uf" id="uf" class="form-control @error('uf') is-invalid @enderror">
                                    <option value="">Selecione um Estado</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP" id="none">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                                @error('uf')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">Cidade</label>
                                <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" placeholder="Digite uma cidade" value="{{ $company['city'] }}">
                                @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="neighborhood">Bairro</label>
                                <input type="text" name="neighborhood" id="neighborhood" class="form-control @error('neighborhood') is-invalid @enderror" placeholder="Digite o bairro" value="{{ $company['neighborhood'] }}">
                                @error('neighborhood')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="street">Logradouro</label>
                                <input type="text" name="street" id="street" class="form-control @error('street') is-invalid @enderror" placeholder="Digite o endereço" value="{{ $company['street'] }}">
                                @error('street')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="number">Numero:</label>
                                <input type="number" id="number" name="number" class="form-control @error('number') is-invalid @enderror" placeholder="000" value="{{ $company['number'] }}">
                                @error('number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group d-flex flex-column">
                                <label for="search-cep">Buscar CEP</label>
                                <button type="button" class="btn btn-secondary" style="max-width: 100px" id="search-cep">
                                    Buscar
                                </button>
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
                                        @if($company['sunday-is-open'])
                                        <input type="checkbox" name="sunday-is-open" id="sunday-is-open" checked>
                                        @else
                                        <input type="checkbox" name="sunday-is-open" id="sunday-is-open" >
                                        @endif
                                        <label for="sunday-is-open">
                                            Aberto
                                        </label>
                                    </div>
                                </div>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="sunday-from">das</label>
                                        <input type="time" name="sunday-from" id="sunday-from" value="{{ $company['sunday-from'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="sunday-to">até</label>
                                        <input type="time" name="sunday-to" id="sunday-to" value="{{ $company['sunday-to'] }}">
                                    </div>
                                </div>
                                <p style="margin-bottom: 5px;"><strong>Almoço</strong></p>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="sunday-lunch-from">das</label>
                                        <input type="time" name="sunday-lunch-from" id="sunday-lunch-from" value="{{ $company['sunday-lunch-from'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="sunday-lunch-to">até</label>
                                        <input type="time" name="sunday-lunch-to" id="sunday-lunch-to" value="{{ $company['sunday-lunch-to'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3">
                                <p><strong>Segunda-Feira:</strong></p>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        @if ($company['monday-is-open'])
                                        <input type="checkbox" name="monday-is-open" id="monday-is-open" checked>
                                        @else
                                        <input type="checkbox" name="monday-is-open" id="monday-is-open" >
                                        @endif
                                        <label for="monday-is-open">
                                            Aberto
                                        </label>
                                    </div>
                                </div>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="monday-from">das</label>
                                        <input type="time" name="monday-from" id="monday-from" value="{{ $company['monday-from'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="monday-to">até</label>
                                        <input type="time" name="monday-to" id="monday-to" value="{{ $company['monday-to'] }}">
                                    </div>
                                </div>
                                <p style="margin-bottom: 5px;"><strong>Almoço</strong></p>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="monday-lunch-from">das</label>
                                        <input type="time" name="monday-lunch-from" id="monday-lunch-from" value="{{ $company['monday-lunch-from'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="monday-lunch-to">até</label>
                                        <input type="time" name="monday-lunch-to" id="monday-lunch-to" value="{{ $company['monday-lunch-to'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3">
                                <p><strong>Terça-Feira:</strong></p>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        @if ($company['tuesday-is-open'])
                                        <input type="checkbox" name="tuesday-is-open" id="tuesday-is-open" checked>
                                        @else
                                        <input type="checkbox" name="tuesday-is-open" id="tuesday-is-open" >
                                        @endif
                                        <label for="tuesday-is-open">
                                            Aberto
                                        </label>
                                    </div>
                                </div>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="tuesday-from">das</label>
                                        <input type="time" name="tuesday-from" id="tuesday-from" value="{{ $company['tuesday-from'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tuesday-to">até</label>
                                        <input type="time" name="tuesday-to" id="tuesday-to" value="{{ $company['tuesday-to'] }}">
                                    </div>
                                </div>
                                <p style="margin-bottom: 5px;"><strong>Almoço</strong></p>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="tuesday-lunch-from">das</label>
                                        <input type="time" name="tuesday-lunch-from" id="tuesday-lunch-from" value="{{ $company['tuesday-lunch-from'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tuesday-lunch-to">até</label>
                                        <input type="time" name="tuesday-lunch-to" id="tuesday-lunch-to" value="{{ $company['tuesday-lunch-to'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3">
                                <p><strong>Quarta-Feira:</strong></p>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        @if ($company['wednesday-is-open'])
                                        <input type="checkbox" name="wednesday-is-open" id="wednesday-is-open" checked>
                                        @else
                                        <input type="checkbox" name="wednesday-is-open" id="wednesday-is-open" >
                                        @endif
                                        <label for="wednesday-is-open">
                                            Aberto
                                        </label>
                                    </div>
                                </div>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="wednesday-from">das</label>
                                        <input type="time" name="wednesday-from" id="wednesday-from" value="{{ $company['wednesday-from'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="wednesday-to">até</label>
                                        <input type="time" name="wednesday-to" id="wednesday-to" value="{{ $company['wednesday-to'] }}">
                                    </div>
                                </div>
                                <p style="margin-bottom: 5px;"><strong>Almoço</strong></p>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="wednesday-lunch-from">das</label>
                                        <input type="time" name="wednesday-lunch-from" id="wednesday-lunch-from" value="{{ $company['wednesday-lunch-from'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="wednesday-lunch-to">até</label>
                                        <input type="time" name="wednesday-lunch-to" id="wednesday-lunch-to" value="{{ $company['wednesday-lunch-to'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3">
                                <p><strong>Quinta-Feira:</strong></p>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        @if ($company['thursday-is-open'])
                                        <input type="checkbox" name="thursday-is-open" id="thursday-is-open" checked>
                                        @else
                                        <input type="checkbox" name="thursday-is-open" id="thursday-is-open" >
                                        @endif
                                        <label for="thursday-is-open">
                                            Aberto
                                        </label>
                                    </div>
                                </div>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="thursday-from">das</label>
                                        <input type="time" name="thursday-from" id="thursday-from" value="{{ $company['thursday-from'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="thursday-to">até</label>
                                        <input type="time" name="thursday-to" id="thursday-to" value="{{ $company['thursday-to'] }}">
                                    </div>
                                </div>
                                <p style="margin-bottom: 5px;"><strong>Almoço</strong></p>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="thursday-lunch-from">das</label>
                                        <input type="time" name="thursday-lunch-from" id="thursday-lunch-from" value="{{ $company['thursday-lunch-from'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="thursday-lunch-to">até</label>
                                        <input type="time" name="thursday-lunch-to" id="thursday-lunch-to" value="{{ $company['thursday-lunch-to'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3">
                                <p><strong>Sexta-Feira:</strong></p>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        @if ($company['friday-is-open'])
                                        <input type="checkbox" name="friday-is-open" id="friday-is-open" checked>
                                        @else
                                        <input type="checkbox" name="friday-is-open" id="friday-is-open" >
                                        @endif
                                        <label for="friday-is-open">
                                            Aberto
                                        </label>
                                    </div>
                                </div>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="friday-from">das</label>
                                        <input type="time" name="friday-from" id="friday-from" value="{{ $company['friday-from'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="friday-to">até</label>
                                        <input type="time" name="friday-to" id="friday-to" value="{{ $company['friday-to'] }}">
                                    </div>
                                </div>
                                <p style="margin-bottom: 5px;"><strong>Almoço</strong></p>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="friday-lunch-from">das</label>
                                        <input type="time" name="friday-lunch-from" id="friday-lunch-from" value="{{ $company['friday-lunch-from'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="friday-lunch-to">até</label>
                                        <input type="time" name="friday-lunch-to" id="friday-lunch-to" value="{{ $company['friday-lunch-to'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3">
                                <p><strong>Sábado:</strong></p>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        @if ($company['saturnday-is-open'])
                                        <input type="checkbox" name="saturnday-is-open" id="saturnday-is-open" checked>
                                        @else
                                        <input type="checkbox" name="saturnday-is-open" id="saturnday-is-open" >
                                        @endif
                                        <label for="saturnday-is-open">
                                            Aberto
                                        </label>
                                    </div>
                                </div>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="saturnday-from">das</label>
                                        <input type="time" name="saturnday-from" id="saturnday-from" value="{{ $company['saturnday-from'] }}">Abert
                                    </div>
                                    <div class="form-group">
                                        <label for="saturnday-to">até</label>
                                        <input type="time" name="saturnday-to" id="saturnday-to" value="{{ $company['saturnday-to'] }}">
                                    </div>
                                </div>
                                <p style="margin-bottom: 5px;"><strong>Almoço</strong></p>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="saturnday-lunch-from">das</label>
                                        <input type="time" name="saturnday-lunch-from" id="saturnday-lunch-from" value="{{ $company['saturnday-lunch-from'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="saturnday-lunch-to">até</label>
                                        <input type="time" name="saturnday-lunch-to" id="saturnday-lunch-to" value="{{ $company['saturnday-lunch-to'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3">
                                <p><strong>Feriado:</strong></p>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        @if ($company['holiday-is-open'])
                                        <input type="checkbox" name="holiday-is-open" id="holiday-is-open" checked>
                                        @else
                                        <input type="checkbox" name="holiday-is-open" id="holiday-is-open" >
                                        @endif
                                        <label for="holiday-is-open">
                                            Aberto
                                        </label>
                                    </div>
                                </div>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="holiday-from">das</label>
                                        <input type="time" name="holiday-from" id="holiday-from" value="{{ $company['holiday-from'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="holiday-to">até</label>
                                        <input type="time" name="holiday-to" id="holiday-to" value="{{ $company['holiday-to'] }}">
                                    </div>
                                </div>
                                <p style="margin-bottom: 5px;"><strong>Almoço</strong></p>
                                <div class="time-area d-flex">
                                    <div class="form-group">
                                        <label for="holiday-lunch-from">das</label>
                                        <input type="time" name="holiday-lunch-from" id="holiday-lunch-from" value="{{ $company['holiday-lunch-from'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="holiday-lunch-to">até</label>
                                        <input type="time" name="holiday-lunch-to" id="holiday-lunch-to" value="{{ $company['holiday-lunch-to'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-3 mb-2 d-flex justify-content-center">
                        <button type="button" id="reply-sun-to-fri" class="btn btn-light">Replicar Seg. à Sex.</button>
                    </div>

                    <div class="row" style="margin: 10px 0 40px">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="img">Selecione uma image</label>
                                <input type="file" name="img" id="img" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img-area">
                                <img src="" alt="preview" id="preview">
                            </div>
                        </div>
                    </div>

                    <div class="btn-area d-flex justify-content-between">
                        <a href="{{ route('dashboard-company') }}" class="btn btn-primary">Voltar</a>
                        <button type="submit" class="btn btn-success">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>

</section>

<script>
    var UF = '{{ $company["uf"] }}'
    $("#uf > option").each(function () {
        if (this.value === UF) {
            $(this).prop("selected", true);
        }
    });

    // search cep
    $("#search-cep").click(function () {
        var cep = $("#cep")
        .val()
        .replace(/[^0-9]/, "");
        // console.log(cep);

        if (cep) {
            var url = "https://viacep.com.br/ws/" + cep + "/json/";
            $.ajax({
                url: url,
                dataType: "jsonp",
                crossDomain: true,
                contentType: "application/json",
                success: function (json) {
                    if (json.logradouro) {
                        $("input[name=street]").val(json.logradouro);
                        $("input[name=neighborhood]").val(json.bairro);
                        $("input[name=city]").val(json.localidade);

                        $("#uf > option").each(function () {
                            if (this.value === json.uf) {
                                $(this).prop("selected", true);
                            }
                        });
                    }
                },
            });
        }
    });

    $("#reply-sun-to-fri").on("click", function () {
        var from = $("#monday-from").val();
        var to = $("#monday-to").val();
        var lunchFrom = $("#monday-lunch-from").val();
        var lunchTo = $("#monday-lunch-to").val();

        $("#tuesday-from").val(from);
        $("#tuesday-to").val(to);
        $("#tuesday-lunch-from").val(lunchFrom);
        $("#tuesday-lunch-to").val(lunchTo);

        $("#wednesday-from").val(from);
        $("#wednesday-to").val(to);
        $("#wednesday-lunch-from").val(lunchFrom);
        $("#wednesday-lunch-to").val(lunchTo);

        $("#thursday-from").val(from);
        $("#thursday-to").val(to);
        $("#thursday-lunch-from").val(lunchFrom);
        $("#thursday-lunch-to").val(lunchTo);

        $("#friday-from").val(from);
        $("#friday-to").val(to);
        $("#friday-lunch-from").val(lunchFrom);
        $("#friday-lunch-to").val(lunchTo);

    });

    function readImage() {
        if (this.files && this.files[0]) {
            var file = new FileReader();
            file.onload = function(e) {
                document.getElementById("preview").src = e.target.result;
            };
            file.readAsDataURL(this.files[0]);
        }
    }
    document.getElementById("img").addEventListener("change", readImage, false);
</script>

@endsection
