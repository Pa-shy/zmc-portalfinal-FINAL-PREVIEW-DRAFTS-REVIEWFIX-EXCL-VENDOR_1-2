<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'ZMC Staff Portal')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap 5 (if you already load via Vite/app, remove these 2 lines) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Icons (optional) --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        :root{
            --zmc-green:#1a3a1a;
            --zmc-green-dark:#0d2810;
        }
        .zmc-topbar{
            background: url('{{ asset("zmc_building.png") }}') center center / cover no-repeat;
            position: relative;
        }
        .zmc-topbar::before{
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(90deg, rgba(26, 58, 26, 0.94), rgba(13, 40, 16, 0.96));
            z-index: 0;
        }
        .zmc-topbar > *{
            position: relative;
            z-index: 1;
        }
        .zmc-badge{
            background: rgba(255,255,255,.18);
            border: 1px solid rgba(255,255,255,.25);
            color:#fff;
        }
        .zmc-btn-outline{
            border-color: rgba(255,255,255,.5);
            color:#fff;
        }
        .zmc-btn-outline:hover{
            background: rgba(255,255,255,.12);
            border-color:#fff;
            color:#fff;
        }
        body{ 
            background: url('{{ asset("zmc_building.png") }}') no-repeat center center fixed !important;
            background-size: cover !important;
        }
        body::before{
            content: "";
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(135deg, rgba(240, 247, 240, 0.88) 0%, rgba(220, 237, 220, 0.92) 100%);
            z-index: -1;
        }
    </style>

    @stack('head')
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark zmc-topbar">
    <div class="container-fluid px-3">
        <span class="navbar-brand fw-bold d-flex align-items-center gap-2">
            <img src="{{ asset('zmc_logo.png') }}" alt="ZMC" style="height:34px">
            ZMC Staff Portal
        </span>

        <div class="d-flex align-items-center gap-2">
            @if(session('active_staff_role'))
                <span class="badge rounded-pill zmc-badge text-uppercase">
                    {{ str_replace('_',' ', session('active_staff_role')) }}
                </span>
            @endif

            <span class="text-white small d-none d-md-inline">
                {{ auth()->user()->name ?? auth()->user()->email }}
            </span>

            {{-- Switch role goes back to /staff landing --}}
            <a href="{{ route('staff.entry') }}" class="btn btn-sm zmc-btn-outline">
                <i class="ri-shuffle-line"></i> Switch Role
            </a>

            {{-- Staff logout --}}
            <form method="POST" action="{{ route('staff.logout') }}" class="m-0">
                @csrf
                <button type="submit" class="btn btn-sm btn-light">
                    <i class="ri-logout-box-r-line"></i> Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<main class="container-fluid py-3 px-3">
    @yield('content')
</main>

</body>
</html>
