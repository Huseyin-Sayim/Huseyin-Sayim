<div class="navbar navbar-dark navbar-expand-lg navbar-static">
    <div class="container-fluid">
        <div class="d-flex d-lg-none me-2">
            <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
                <i class="ph-list"></i>
            </button>
        </div>

        <div class="navbar-brand flex-1 flex-lg-0">
            <a href="{{ route("admin.home") }}" class="d-inline-flex align-items-center">
                <img src="{{ asset('admin/images/logo_sarsilmaz.png')}}" alt="">
            </a>
        </div>

        <ul class="nav flex-row">
            <li class="nav-item d-lg-none">
                <a href="#navbar_search" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="collapse">
                    <i class="ph-magnifying-glass"></i>
                </a>
            </li>

        </ul>

        <div class="navbar-collapse justify-content-center flex-lg-1 order-2 order-lg-1 collapse" id="navbar_search">
            <div class="navbar-search flex-fill position-relative mt-2 mt-lg-0 mx-lg-3">
                <div>



                </div>
            </div>
        </div>

        <ul class="nav flex-row justify-content-end order-1 order-lg-2">

            <li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
                <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                    <i class="ph ph-user-circle fs-1"></i>
                    @guest()

                    @else
                        <span class="d-none d-lg-inline-block mx-lg-2"> {{ auth()->user()->name }} </span>
                    @endguest
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{ route("profile") }}" class="dropdown-item">
                        <i class="ph-user-circle me-2"></i>
                        Profil
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="ph-sign-out me-2"></i>
                        {{ __('Logout') }}
                    </a>
                    <form action="{{ route('logout') }}" id="logout-form" method="post">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>

<div class="page-content pt-0 mt-lg-3">
