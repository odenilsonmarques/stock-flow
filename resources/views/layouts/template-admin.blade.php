<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-sm navbar-dark" style="background-color:#94AF9F">
            <div class="container">
                <a class="navbar-brand" href="/">
                    Fluxo de estoque
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <nav class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        {{-- Exibe "Acessar" apenas para visitantes --}}
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Acessar</a>
                            </li>
                        @endguest

                        {{-- Exibe "Sair" apenas para usuários logados --}}
                        @auth
                            <li class="nav-item">
                                <span class="nav-link">Olá, {{ Auth::user()->name }}</span>
                            </li>

                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="nav-link btn btn-link" style="text-decoration: none;">
                                        Sair
                                    </button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </nav>
            </div>
        </nav>

    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-sm-12 text-center">
                    <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts-supplier.js') }}"></script>
    <script src="{{ asset('assets/js/generateProductNumber.js') }}"></script>
</body>

</html>
