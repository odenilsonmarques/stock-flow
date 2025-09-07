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
                <a class="navbar-brand fw-bold fs-4 lh-1 m-0" href="/">
                    G.E.M
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                    aria-controls="mainNav" aria-expanded="false" aria-label="Alternar navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav ms-auto align-items-center gap-2">

                        {{-- Exibe "Acessar" apenas para visitantes --}}
                        @guest
                            <li class="nav-item">
                                <a class="nav-link py-0 lh-1" href="{{ route('login') }}">Acessar</a>
                            </li>
                        @endguest

                        {{-- Exibe "Sair" apenas para usuários logados --}}
                        @auth
                            <li class="nav-item">
                                <!-- Use navbar-text para texto simples; já alinha bem -->
                                <span class="navbar-text d-flex align-items-center gap-1 m-0 lh-1">
                                    Olá, {{ Auth::user()->name }}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg>
                                </span>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}" class="m-0">
                                    @csrf
                                    <!-- p-0/py-0 e d-flex alinham com o brand -->
                                    <button type="submit"
                                        class="btn btn-link nav-link p-0 d-flex align-items-center gap-1 lh-1"
                                        style="text-decoration:none;">
                                        <span>Sair</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146
                                                    4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0
                                                     .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0
                                                     .146-.353V4.893a.5.5 0 0 0-.146-.353zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0
                                                     1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708" />
                                        </svg>
                                    </button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <section>
        @yield('content')
    </section>

    <footer class="mt-5" style="background-color: #94AF9F; color: white;">
        <div class="container">
            <div class="row text-center p-3">
                <p class="mt-4">&copy; {{ date('Y') }} G.E.M </p>
                <small>Gestão de Estoque Municipal</small>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts-supplier.js') }}"></script>
    <script src="{{ asset('assets/js/generateProductNumber.js') }}"></script>
</body>

</html>
