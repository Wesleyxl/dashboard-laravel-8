<!DOCTYPE html>
<html lang="en, pt-br">
<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- end meta tags -->

    <!-- links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap-grid.min.css"
        integrity="sha512-Xj2sd25G+JgJYwo0cvlGWXoUekbLg5WvW+VbItCMdXrDoZRWcS/d40ieFHu77vP0dF5PK+cX6TIp+DsPfZomhw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css"
        integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois+Shadow&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('/assets/website/css/layout.css') }}">
    <!-- end links -->

    <title>@yield('title')</title>

</head>
<body>

    <!-- header -->
    <header>
        <!-- desktop menu -->
        <div class="desktop-menu">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ URL::to('/assets/website/img/logo.png') }}" alt="Darus Tecnologia" title="Darus Tecnologia">
                </a>
            </div>
            <nav>
                <ul>
                    <li><a href="/"  alt="Início" title="Início" class="@yield('a-home')">Início</a></li>
                    <li><a href="/sobre" alt="Sobre" title="Sobre"  class="@yield('a-about')">Sobre</a></li>
                    <li><a href="/categorias" alt="Categorias" title="Categorias"  class="@yield('a-category')">Categorias</a></li>
                    <li><a href="/empresas" alt="Empresas" title="Empresas"  class="@yield('a-company')">Empresas</a></li>
                    <li><a href="/contato" alt="Contato" title="Contato"  class="@yield('a-contact')">Contato</a></li>
                </ul>
            </nav>
        </div>
        <!-- end desktop menu -->
        <!-- mobile menu -->
        <div class="mobile-menu"></div>
        <!-- end mobile menu -->
    </header>
    <!-- end header -->

    <!-- content --->
    <main>
        @yield('content')
    </main>
    <!-- end content -->

    <!-- footer -->
    <footer></footer>
    <!-- end footer -->

    <!-- scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ URL::to('/asset/website/js/main.js') }}"></script>
    <!-- end scripts -->

</body>
</html>
