<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand">
            <a href="{{ route('home') }}" class="d-flex align-items-center justify-content-center gap-2">
                {{-- <img src="{{ asset('media/logo-dark.PNG') }}" alt="Logo Unia"
                class="navbar-brand-image rounded hide-theme-light">
                <img src="{{ asset('media/logo-light.PNG') }}" alt="Logo Unia" class="navbar-brand-image rounded hide-theme-dark"> --}}
                <img src="{{ asset('media/logo_dark.webp') }}" alt="Logo" class="navbar-brand-image rounded">
                <span class="text-uppercase" style="font-weight: 800; font-size: 1.8rem;">
                    TAREAS
                </span>
            </a>
        </h1>
        <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item dropdown">
                <a style="cursor: pointer;" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <img src="{{ asset($usuario->avatar) }}" alt="avatar" class="avatar avatar-sm">
                    <div class="d-none d-xl-block ps-2">
                        {{ $nombre }}
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a class="dropdown-item" wire:click="logout" style="cursor: pointer;">
                        Cerrar sesión
                    </a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <div class="d-flex justify-content-center mt-3 flex-column align-items-center">
                <img src="{{ asset($usuario->avatar) }}" alt="avatar" class="avatar avatar-lg ms-3">
                <span class="fw-bold fs-3 mt-3 text-center ms-3">
                    {{ $nombre }}
                </span>
                <div class="mt-3 w-full ps-3">
                    <span class="badge bg-azure-lt px-3 py-2 w-100">
                        {{ $usuario->rol->rol_nombre }}
                    </span>
                </div>
                <div class="mt-2 mb-4 mb-lg-0 w-full ps-3">
                    <div class="d-flex justify-content-center mt-1 mb-1">
                        <label class="theme-switch">
                            <input type="checkbox" class="theme-switch__checkbox" wire:click="cambiar_tema">
                            <div class="theme-switch__container">
                                <div class="theme-switch__clouds"></div>
                                <div class="theme-switch__stars-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144 55" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M135.831 3.00688C135.055 3.85027 134.111 4.29946 133 4.35447C134.111 4.40947 135.055 4.85867 135.831 5.71123C136.607 6.55462 136.996 7.56303 136.996 8.72727C136.996 7.95722 137.172 7.25134 137.525 6.59129C137.886 5.93124 138.372 5.39954 138.98 5.00535C139.598 4.60199 140.268 4.39114 141 4.35447C139.88 4.2903 138.936 3.85027 138.16 3.00688C137.384 2.16348 136.996 1.16425 136.996 0C136.996 1.16425 136.607 2.16348 135.831 3.00688ZM31 23.3545C32.1114 23.2995 33.0551 22.8503 33.8313 22.0069C34.6075 21.1635 34.9956 20.1642 34.9956 19C34.9956 20.1642 35.3837 21.1635 36.1599 22.0069C36.9361 22.8503 37.8798 23.2903 39 23.3545C38.2679 23.3911 37.5976 23.602 36.9802 24.0053C36.3716 24.3995 35.8864 24.9312 35.5248 25.5913C35.172 26.2513 34.9956 26.9572 34.9956 27.7273C34.9956 26.563 34.6075 25.5546 33.8313 24.7112C33.0551 23.8587 32.1114 23.4095 31 23.3545ZM0 36.3545C1.11136 36.2995 2.05513 35.8503 2.83131 35.0069C3.6075 34.1635 3.99559 33.1642 3.99559 32C3.99559 33.1642 4.38368 34.1635 5.15987 35.0069C5.93605 35.8503 6.87982 36.2903 8 36.3545C7.26792 36.3911 6.59757 36.602 5.98015 37.0053C5.37155 37.3995 4.88644 37.9312 4.52481 38.5913C4.172 39.2513 3.99559 39.9572 3.99559 40.7273C3.99559 39.563 3.6075 38.5546 2.83131 37.7112C2.05513 36.8587 1.11136 36.4095 0 36.3545ZM56.8313 24.0069C56.0551 24.8503 55.1114 25.2995 54 25.3545C55.1114 25.4095 56.0551 25.8587 56.8313 26.7112C57.6075 27.5546 57.9956 28.563 57.9956 29.7273C57.9956 28.9572 58.172 28.2513 58.5248 27.5913C58.8864 26.9312 59.3716 26.3995 59.9802 26.0053C60.5976 25.602 61.2679 25.3911 62 25.3545C60.8798 25.2903 59.9361 24.8503 59.1599 24.0069C58.3837 23.1635 57.9956 22.1642 57.9956 21C57.9956 22.1642 57.6075 23.1635 56.8313 24.0069ZM81 25.3545C82.1114 25.2995 83.0551 24.8503 83.8313 24.0069C84.6075 23.1635 84.9956 22.1642 84.9956 21C84.9956 22.1642 85.3837 23.1635 86.1599 24.0069C86.9361 24.8503 87.8798 25.2903 89 25.3545C88.2679 25.3911 87.5976 25.602 86.9802 26.0053C86.3716 26.3995 85.8864 26.9312 85.5248 27.5913C85.172 28.2513 84.9956 28.9572 84.9956 29.7273C84.9956 28.563 84.6075 27.5546 83.8313 26.7112C83.0551 25.8587 82.1114 25.4095 81 25.3545ZM136 36.3545C137.111 36.2995 138.055 35.8503 138.831 35.0069C139.607 34.1635 139.996 33.1642 139.996 32C139.996 33.1642 140.384 34.1635 141.16 35.0069C141.936 35.8503 142.88 36.2903 144 36.3545C143.268 36.3911 142.598 36.602 141.98 37.0053C141.372 37.3995 140.886 37.9312 140.525 38.5913C140.172 39.2513 139.996 39.9572 139.996 40.7273C139.996 39.563 139.607 38.5546 138.831 37.7112C138.055 36.8587 137.111 36.4095 136 36.3545ZM101.831 49.0069C101.055 49.8503 100.111 50.2995 99 50.3545C100.111 50.4095 101.055 50.8587 101.831 51.7112C102.607 52.5546 102.996 53.563 102.996 54.7273C102.996 53.9572 103.172 53.2513 103.525 52.5913C103.886 51.9312 104.372 51.3995 104.98 51.0053C105.598 50.602 106.268 50.3911 107 50.3545C105.88 50.2903 104.936 49.8503 104.16 49.0069C103.384 48.1635 102.996 47.1642 102.996 46C102.996 47.1642 102.607 48.1635 101.831 49.0069Z" fill="currentColor">
                                        </path>
                                    </svg>
                                </div>
                                <div class="theme-switch__circle-container">
                                    <div class="theme-switch__sun-moon-container">
                                        <div class="theme-switch__sun"></div>
                                        <div class="theme-switch__moon">
                                            {{-- @if ($theme == 'dark') --}}
                                            <div class="theme-switch__spot"></div>
                                            <div class="theme-switch__spot"></div>
                                            <div class="theme-switch__spot"></div>
                                            {{-- @endif --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>

                    <button type="button" class="btn btn-light w-100 mt-2" wire:click="logout">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-bar-to-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 12l10 0"></path>
                            <path d="M10 12l4 4"></path>
                            <path d="M10 12l4 -4"></path>
                            <path d="M4 4l0 16"></path>
                        </svg>
                        Cerrar sesión
                    </button>
                </div>
            </div>
            <ul class="navbar-nav pt-lg-3">
                <hr class="ms-lg-3 mt-2 mb-3">
                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Home
                        </span>
                    </a>
                </li>
                @if (auth()->user()->getPermisoBoolAttribute('CREAR USUARIOS'))
                <li class="nav-item {{ request()->routeIs('inicio') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('inicio') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6"></path>
                                <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Inicio
                        </span>
                    </a>
                </li>
                @endif
                {{-- <li class="nav-item {{ request()->routeIs('perfil*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('perfil', ['usuario_id' => auth()->user()->usuario_id]) }}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z" />
                            <path d="M10 16h6" />
                            <path d="M13 11m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M4 8h3" />
                            <path d="M4 12h3" />
                            <path d="M4 16h3" />
                        </svg>
                    </span>
                    <span class="nav-link-title">
                        Perfil
                    </span>
                </a>
                </li>
                @if (auth()->user()->permiso('persona-index'))
                <li class="nav-item {{ request()->routeIs('persona*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('persona') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Personas
                        </span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->permiso('obtencion-grado-index'))
                <hr class="ms-lg-3 mt-3 mb-3">
                <li class="nav-item {{ request()->routeIs('obtencion-grado*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('obtencion-grado') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-progress-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 20.777a8.942 8.942 0 0 1 -2.48 -.969" />
                                <path d="M14 3.223a9.003 9.003 0 0 1 0 17.554" />
                                <path d="M4.579 17.093a8.961 8.961 0 0 1 -1.227 -2.592" />
                                <path d="M3.124 10.5c.16 -.95 .468 -1.85 .9 -2.675l.169 -.305" />
                                <path d="M6.907 4.579a8.954 8.954 0 0 1 3.093 -1.356" />
                                <path d="M9 12l2 2l4 -4" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Obtención de Grado
                        </span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->permiso('rol-index') ||
                auth()->user()->permiso('permiso-index'))
                <li class="nav-item {{ request()->routeIs('configuracion-rol*') || request()->routeIs('configuracion-permiso') ? 'active' : '' }} dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                </path>
                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Configuración
                        </span>
                    </a>
                    <div class="dropdown-menu {{ request()->routeIs('configuracion-rol*') || request()->routeIs('configuracion-permiso') ? 'show' : '' }}">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                @if (auth()->user()->permiso('rol-index'))
                                <a class="dropdown-item {{ request()->routeIs('configuracion-rol*') ? 'active fw-medium' : '' }}" href="{{ route('configuracion-rol') }}">
                                    Roles
                                </a>
                                @endif
                                @if (auth()->user()->permiso('permiso-index'))
                                <a class="dropdown-item {{ request()->routeIs('configuracion-permiso') ? 'active fw-medium' : '' }}" href="{{ route('configuracion-permiso') }}">
                                    Permisos
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
                @endif
                @if (auth()->user()->permiso('proyecto-index'))
                <li class="nav-item {{ request()->routeIs('proyecto*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('proyecto') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                <path d="M9 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                <path d="M5 8h4" />
                                <path d="M9 16h4" />
                                <path d="M13.803 4.56l2.184 -.53c.562 -.135 1.133 .19 1.282 .732l3.695 13.418a1.02 1.02 0 0 1 -.634 1.219l-.133 .041l-2.184 .53c-.562 .135 -1.133 -.19 -1.282 -.732l-3.695 -13.418a1.02 1.02 0 0 1 .634 -1.219l.133 -.041z" />
                                <path d="M14 9l4 -1" />
                                <path d="M16 16l3.923 -.98" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Proyectos
                        </span>
                    </a>
                </li>
                @endif
                --}}
                <hr class="ms-lg-3 mt-3 mb-3">
            </ul>
        </div>
    </div>
</aside>

@push('scripts')
<script>
    // Obtén el tema del almacenamiento local, si no hay nada, usa 'light' como valor predeterminado
    var theme = localStorage.getItem('theme') || 'light';

    // Si el tema es 'dark', marca el checkbox como checked
    if (theme === 'dark') {
        document.querySelector('.theme-switch__checkbox').checked = true;
    }

    // Añade un event listener al checkbox para cambiar el tema cuando se hace click
    document.querySelector('.theme-switch__checkbox').addEventListener('change', function(event) {
        if (event.target.checked) {
            localStorage.setItem('theme', 'dark');
            theme = 'dark';
        } else {
            localStorage.setItem('theme', 'light');
            theme = 'light';
        }
    });

    window.addEventListener('cambiar_tema', event => {
        if (theme === 'light') {
            window.location.search = '?theme=light';
        } else {
            window.location.search = '?theme=dark';
        }
    });

</script>
@endpush
