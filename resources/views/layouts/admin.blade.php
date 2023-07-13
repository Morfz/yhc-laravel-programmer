<!DOCTYPE html>
<html>
<head>
    <title>YHC Programmer</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar bg-primary">
        <a class="navbar-brand mr-0 mr-md-2" href="/" aria-label="Bootstrap">Sistem Informasi Mahasiswa</a>
      
        <div class="navbar-nav-scroll">
            <ul class="navbar-nav bd-navbar-nav flex-row">
                <x-admin-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')" class="nav-link">
                    {{ __('Beranda') }}
                </x-admin-nav-link>
                <x-admin-nav-link :href="route('admin.students.index')" :active="request()->routeIs('admin.students.index')" class="nav-link">
                    {{ __('Mahasiswa') }}
                </x-admin-nav-link>
            </ul>
        </div>
      
        <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
                    {{-- <x-dropdown-link :href="route('profile.edit')" class="dropdown-item">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                    <div class="dropdown-divider"></div> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();" class="dropdown-item">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </li>
        </ul>
    </header>

    <div class="container mt-4">
        {{ $slot }}
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>