@extends('layouts.website')
@section('title', 'Categorias')
@section('a-category', 'active')
@section('content')

    <!-- links -->
    <link rel="stylesheet" href="{{ URL::to('/public/assets/website/css/category.css') }}">
    <!-- end links -->

    <!-- Banner -->
    <section class="banner">
        <div class="container">
            <div class="title">
                <h1>Categoria</h1>
                <p><a href="/">Início</a> - Categoria</p>
            </div>
        </div>
    </section>
    <!-- Banner -->

    <!-- Category -->
    <section class="category">
        <div class="container-fluid">
            <div class="title">
                <h1>Categorias</h1>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <aside>
                        <div class="card-area">
                            <div class="card-title">
                                <p>Faça sua busca</p>
                                {{-- <div class="input-area">
                                    <input type="text" name="search" id="search" class="form-control">
                                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div> --}}
                            </div>
                            <div class="card-content">
                                <p>Categorias</p>
                                <div class="list">
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li><span>{{ $category['name'] }}</span></li>
                                            @foreach ($subcategories as $subcategory)
                                                @if($subcategory['category_id'] === $category['id'])
                                                    <li><a href="{{ route('website-subcategory-show', ['category' => $category['url'], 'subcategory' => $subcategory['url']]) }}">{{ $subcategory['name'] }}</a></li>
                                                @endif
                                            @endforeach
                                            <div class="line"></div>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-md-8">
                    <div class="content">
                        <div class="row">
                            @if(count($categories) >= 1)
                                @foreach ( $categories as $category)

                                    <div class="col-md-4">
                                        <div class="card-area">
                                            <div class="card-area-header">
                                                <p>{{ $category['name'] }}</p>
                                            </div>
                                            <div class="card-area-body">
                                                <ul>
                                                    @foreach ($subcategories as $subcategory)
                                                        @if($subcategory['category_id'] === $category['id'])
                                                            <li><a href="{{ route('website-subcategory-show', ['category' => $category['url'], 'subcategory' => $subcategory['url']]) }}" alt="{{ $subcategory['name'] }}" title="{{ $subcategory['name'] }}">{{ $subcategory['name'] }}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h4>Nada para mostrar</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Category -->

    @if(count($highlights) >= 1)
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
                        @foreach ($highlights as $company)
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
                                                <a href="{{ url('/categoria/'.$company['category'].'/'.$company['subcategory'].'/empresa/'.$company['url']) }}">Saiba +</a>
                                            </div>
                                            @if($company['img'] != null)
                                                <img src="{{ URL::to($company['img']) }}" alt="{{ $company['name'] }}" title="{{ $company['name'] }}">
                                            @else
                                                <img src="{{ URL::to('/public/assets/website/img/no-image.webp') }}" alt="{{ $company['name'] }}" title="{{ $company['name'] }}">
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
    @endif
    <link rel="stylesheet" href="{{ URL::to('/public/assets/website/css/swiper.css') }}">
    <script src="{{ URL::to('/public/assets/website/js/swiper.js') }}"></script>
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
