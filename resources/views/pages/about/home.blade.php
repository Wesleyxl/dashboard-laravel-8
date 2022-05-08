@extends('layouts.website')
@section('title', 'Sobre')
@section('a-about', 'active')
@section('content')

    <!-- links -->
    <link rel="stylesheet" href="{{ URL::to('/assets/website/css/about.css') }}">
    <!-- end links -->

    <!-- Banner -->
    <section class="banner">
        <div class="container">
            <div class="title">
                <h1>Sobre</h1>
                <p><a href="/">Início</a> - Sobre</p>
            </div>
        </div>
    </section>
    <!-- Banner -->

    <!-- About -->
    <section class="about">
        <div class="container">
            <div class="title">
                <h1>Sobre</h1>
            </div>
            <div class="text">
                <p>A Empresa <strong>DARUS TECNOLOGIA</strong>, tem como atividade empresarial a comercialização de espaço publicitário para divulgação de serviços e produtos, em portal de negócios mantido junto à internet, no qual figuram centenas de renomadas empresas, atuantes nos mais variados segmentos da atividade econômica nacional.</p>
                <p>Sabemos que nos tempos atuais, divulgar pela internet oferece um retorno maior aos divulgadores do que em outras maneiras de divulgação.</p>
                <p>Com este propósito e, com anúncios acessíveis e com ampla divulgação, o grupo pertencente a <strong>DARUS TECNOLOGIA</strong>, vem oferecer melhores serviços, a todos os seus clientes e parceiros. <strong>DARUS TECNOLOGIA</strong> é a melhor maneira de encontrar e descobrir grandes empresas em sua cidade.</p>
            </div>
        </div>
    </section>
    <!-- End About -->

    <!-- Highlights -->
    <section class="highlights" id="highlights">
        <div class="container" style="position: relative;">
            <div class="title-area">
                <h4>Empresas em Destaque</h4>
            </div>
            <div class="content">
                <div style="top: 50%; left: -35px;" class="swiper-button-prev2" tabindex="0" role="button" aria-label="Previous slide"><i class="fas fa-chevron-left"></i></div>
                <div class="swiper-containers">
                    <div class="swiper-wrapper">
                        @foreach ($companies as $company)
                            <div class="swiper-slide">
                                <div class="card-highlights">
                                    <div class="card-highlights-header">
                                        <div class="top">
                                            <div class="star">
                                                @if($company['stars'] <= 10)
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                @elseif($company['stars'] > 10 && $company['stars'] <= 20)
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                @elseif($company['stars'] > 20 && $company['stars'] <= 30)
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                @elseif($company['stars'] > 30 && $company['stars'] <= 40)
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                @else
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                @endif
                                            </div>
                                            <div class="button">
                                                <p>Destaque</p>
                                            </div>
                                        </div>
                                            <div class="link">
                                                <a href="{{ route('website-company-show', ['category' => $company['category'], 'subcategory' => $company['subcategory'], 'company' => $company['url']]) }}">Saiba +</a>
                                            </div>
                                            @if($company['img'] != null)
                                                <img src="{{ URL::to($company['img']) }}" alt="{{ $company['name'] }}" title="{{ $company['name'] }}">
                                            @else
                                                <img src="{{ URL::to('/assets/website/img/no-image.webp') }}" alt="{{ $company['name'] }}" title="{{ $company['name'] }}">
                                            @endif
                                    </div>
                                    <div class="card-highlights-body">
                                        <div class="title">
                                            <p>{{ $company['name'] }}</p>
                                        </div>
                                        <div class="text">
                                            <p>{{ $company['street'] }}, {{ $company['number'] }} - {{ $company['neighborhood'] }}, {{ $company['city'] }} - {{ $company['uf'] }}, {{ $company['cep'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div style="top: 50%; right: -35px;" class="swiper-button-next2" tabindex="0" role="button" aria-label="Next slide"><i class="fas fa-chevron-right"></i></div>
            </div>
        </div>
    </section>
    <!-- End Highlights -->
    <link rel="stylesheet" href="{{ URL::to('/assets/website/css/swiper.css') }}">
    <script src="{{ URL::to('/assets/website/js/swiper.js') }}"></script>
    <script>

        var documentation = window.innerWidth;

        if (documentation <= 700){
            var swiper = new Swiper(".swiper-containers", {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next2',
                    prevEl: '.swiper-button-prev2',
                },
            });
        } else {
            var swiper = new Swiper(".swiper-containers", {
                slidesPerView: 4,
                spaceBetween: 30,
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next2',
                    prevEl: '.swiper-button-prev2',
                },
            });
        }
    </script>

@endsection
