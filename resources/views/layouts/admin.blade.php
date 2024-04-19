<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }} - Admin</title>
        <link href="{{ asset('css/admin/styles.css') }}" rel="stylesheet"/>
        <link href="{{ asset('css/markdown.css') }}" rel="stylesheet"/>
        <link href="{{ asset('css/admin/custom.css') }}" rel="stylesheet"/>
        <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}"/>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
        <script data-search-pseudo-elements defer
                src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"
                crossorigin="anonymous"></script>
    </head>
    <body class="nav-fixed">
        <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white"
             id="sidenavAccordion">
            <!-- Sidenav Toggle Button-->
            <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i
                    data-feather="menu"></i></button>
            <!-- Navbar Brand-->
            <!-- * * Tip * * You can use text or an image for your navbar brand.-->
            <!-- * * * * * * When using an image, we recommend the SVG format.-->
            <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
            <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="{{ route('admin.home') }}">{{ config('app.name') }}</a>
            <!-- Navbar Items-->
            <ul class="navbar-nav align-items-center ms-auto">
                <!-- User Dropdown-->
                <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                       href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"><img class="img-fluid" src="{{ Auth::user()->gravatar }}"/></a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                         aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="{{ Auth::user()->gravatar }}"/>
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name">{{ Auth::user()->fullname }}</div>
                                <div class="dropdown-user-details-email">{{ Auth::user()->email }}</div>
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.profile.info') }}">
                            <div class="dropdown-item-icon"><i data-feather="user"></i></div>
                            Mon compte
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Déconnexion
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <!-- Sidenav Menu Heading (Account)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <div class="sidenav-menu-heading">Accueil</div>
                            <!-- Sidenav Link (Alerts)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <a class="nav-link {{ routeIs('admin.home') ? 'active' : '' }}" href="{{ route('admin.home') }}">
                                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                                Tableau de bord
                            </a>
                            <a class="nav-link {{ routeIs('admin.case-studies.*') ? 'active' : '' }}" href="{{ route('admin.case-studies.index') }}">
                                <div class="nav-link-icon"><i data-feather="briefcase"></i></div>
                                Etudes de cas
                            </a>
                            <a class="nav-link {{ routeIs('admin.blogs.*') ? 'active' : '' }}" href="{{ route('admin.blogs.index') }}">
                                <div class="nav-link-icon"><i data-feather="feather"></i></div>
                                Blog
                            </a>
                            <a class="nav-link {{ routeIs('admin.attachments.*') ? 'active' : '' }}" href="{{ route('admin.attachments.index') }}">
                                <div class="nav-link-icon"><i data-feather="file"></i></div>
                                Pièces jointes
                            </a>

                            <a class="nav-link mt-5" href="{{ route('home') }}">
                                <div class="nav-link-icon"><i data-feather="external-link"></i></div>
                                Retour au site
                            </a>
                        </div>
                    </div>
                    <!-- Sidenav Footer-->
                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content">
                            <div class="sidenav-footer-subtitle">Connecté en tant que :</div>
                            <div class="sidenav-footer-title">{{ Auth::user()->fullname }}</div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <x-toaster/>
                    @if (isset($header))
                        {{ $header }}
                    @endif
                    <!-- Main page content-->
                    {{ $slot }}
                </main>
                <footer class="footer-admin mt-auto footer-light">
                    <div class="container-xl px-4">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &copy; {{ config('app.name') }}
                                2024{{ date('Y') > 2024 ? ' - ' . date('Y') : '' }}
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/admin.js') }}"></script>
        <script src="{{ asset('js/toaster.js') }}"></script>
        <script src="{{ asset('js/chart.min.js') }}"></script>
        <script src="{{ asset('js/simple-datatables.min.js') }}"></script>
        <script>
            let table = document.querySelector('#datatable');
            if (table) {
                let dataTable = new simpleDatatables.DataTable(table);
            }
        </script>
    </body>
</html>
