@extends('layouts.website')
@section('title', 'Início')
@section('a-home', 'active')
@section('content')

    <!-- links -->
    <link rel="stylesheet" href="{{ URL::to('/assets/website/css/home.css') }}">
    <!-- end links -->

    <!-- Intro -->
    <section class="intro" id="intro">
        <div class="welcome-title">
            <h1>Darus Tecnologia</h1>
            <h2>Plataforma Digital Empresarial</h2>
        </div>
        <div class="welcome-text">
            <p>A <strong>DARDUS TECNOLOGIA</strong> foi criado para valorizar o comércio e serviços locais de todas as regiões do Brasil, dar mais destaque aos serviços prestados pelos nossos clientes e comerciantes que contribuem para o desenvolvimento social dos bairros.</p>
        </div>
        <div class="search-area">
            <form action="">
                <input class="form-control" type="text" name="word" id="word" placeholder="Busque por qualquer palavra">
                <select name="uf" id="uf" class="form-control @error('uf') is-invalid @enderror">
                    <option value="">Selecione um Local</option>
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
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </section>
    <!-- End Intro -->

@endsection
