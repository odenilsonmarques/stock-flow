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
        <nav class="navbar fixed-top navbar-expand-sm navbar-dark p-2" style="background-color:#94AF9F">
            <div class="container">
                <a class="navbar-brand d-flex flex-column align-items-start" href="/">
                    <span class="fw-bold fs-4">G.E.M</span>
                    {{-- <small class="fs-6 ">Gestão de Estoque Municipal</small> --}}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <nav class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link fw-bold d-flex align-items-center gap-1" href="/login">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                                Acessar
                            </a>
                        </li>
                    </ul>
                </nav>

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
