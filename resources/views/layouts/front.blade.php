<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/font-awesome-6.5.1.all.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/aos.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/highlight.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/markdown.css') }}" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}" />

        <title>{{ $title ?? config('app.title') }} - {{ config('app.name') }}</title>
        <meta name="description" content="{{ $description ?? config('app.description') }}" />
        <link rel="canonical" href="{{ url()->current() }}" />

        <meta property="og:locale" content="fr_FR" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ $title ?? config('app.title') }} - {{ config('app.name') }}" />
        <meta property="og:description" content="{{ $description ?? config('app.description') }}" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:site_name" content="PHPeter" />
        <meta property="og:image" content="{{ $illustration ?? asset('img/social.jpg') }}" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="675" />
        <meta property="og:image:type" content="image/jpeg" />

        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="{{ $title ?? config('app.title') }} - {{ config('app.name') }}" />
        <meta name="twitter:description" content="{{ $description ?? config('app.description') }}" />
        <meta name="twitter:image" content="{{ $illustration ?? asset('img/social.jpg') }}" />
        <meta name="twitter:site" content="@p_cauty" />
    </head>
    <body>
        <div id="layoutDefault">
            <div id="layoutDefault_content">
                <main>
                    <!-- Navbar-->
                    <nav class="navbar navbar-marketing navbar-expand-lg bg-transparent navbar-dark fixed-top" id="main-nav">
                        <div class="container px-5">
                            <a class="navbar-brand text-white" href="{{ route('home') }}">{{ config('app.name') }}</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i  class="fas fa-ellipsis-vertical"></i></button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto me-lg-5">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('home') }}#">Accueil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('home') }}#services">Services</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('case-studies.index') }}">Études de cas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    {{ $slot }}
                </main>
            </div>
            <div id="layoutDefault_footer">
                <footer class="footer pt-10 pb-5 mt-auto bg-black footer-dark">
                    <div class="container px-5">
                        <div class="row gx-5">
                            <div class="col-lg-3">
                                <div class="footer-brand">{{ config('app.name') }}</div>
                                <div class="mb-3">Sites web & logiciels pour les Pros</div>
                                <div class="icon-list-social mb-5">
                                    <a class="icon-list-social-link" href="https://www.linkedin.com/in/peter-cauty/" target="_blank" rel="noopener">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                    <a class="icon-list-social-link" href="https://github.com/p-cauty" target="_blank" rel="noopener">
                                        <i class="fab fa-github"></i>
                                    </a>
                                    <a class="icon-list-social-link" href="https://x.com/p_cauty" target="_blank" rel="noopener">
                                        <i class="fab fa-x-twitter"></i>
                                    </a>
                                    <a class="icon-list-social-link" href="mailto:pro@phpeter.fr" target="_blank" rel="noopener">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row gx-5">
                                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                                        <div class="text-uppercase-expanded text-xs mb-4">Navigation</div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2">
                                                <a href="{{ route('home') }}#">
                                                    <i class="fas fa-home pe-1"></i>
                                                    Accueil
                                                </a>
                                            </li>
                                            <li class="mb-2">
                                                <a href="{{ route('home') }}#services">
                                                    <i class="fas fa-wrench pe-1"></i>
                                                    Services
                                                </a>
                                            </li>
                                            <li class="mb-2">
                                                <a href="{{ route('case-studies.index') }}">
                                                    <i class="fas fa-briefcase pe-1"></i>
                                                    Études de cas
                                                </a>
                                            </li>
                                            <li class="mb-2">
                                                <a href="{{ route('blog.index') }}">
                                                    <i class="fas fa-feather pe-1"></i>
                                                    Blog
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                                        <div class="text-uppercase-expanded text-xs mb-4">Contact</div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2">
                                                <a href="https://calendly.com/p-cauty/premier-echange" target="_blank" rel="noopener">
                                                    <i class="fas fa-handshake pe-1"></i>
                                                    Rendez-vous
                                                </a>
                                            </li>
                                            <li class="mb-2">
                                                <a href="mailto:pro@phpeter.fr">
                                                    <i class="fas fa-headset pe-2"></i>
                                                    Support
                                                </a>
                                            </li>
                                            <li class="mb-2">
                                                <a href="https://maps.app.goo.gl/pcr53ufJP5raHgfn8" target="_blank" rel="noopener">
                                                    <i class="fas fa-store-alt pe-1"></i>
                                                    La Valette-du-Var
                                                </a>
                                            </li>
                                            <li>
                                                <a href="tel:+33422141382">
                                                    <i class="fas fa-phone pe-2"></i>
                                                    04 22 14 13 82
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="text-uppercase-expanded text-xs mb-4">Légal</div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2">
                                                <a href="#!">
                                                    <i class="fas fa-file-alt pe-1"></i>
                                                    Mentions légales
                                                </a>
                                            </li>
                                            <li class="mb-2">
                                                <a href="https://www.pappers.fr/entreprise/cauty-peter-845088236" target="_blank" rel="noopener">
                                                    <i class="fas fa-building pe-1"></i>
                                                    Fiche entreprise
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!">
                                                    <i class="fas fa-file-signature pe-1"></i>
                                                    CGV
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-5" />
                        <div class="row gx-5 align-items-center">
                            <div class="col-md-6 small">
                                Copyright &copy; {{ config('app.name') }}
                                2024{{ date('Y') > 2024 ? ' - ' . date('Y') : '' }}
                                &middot;
                                Tous droits réservés
                            </div>
                            <div class="col-md-6 text-md-end small">
                                M. Peter Cauty, Entrepreneur Individuel enregistré sous le numéro SIREN 845 088 236
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('js/aos.min.js') }}"></script>
        <script>
            const nav = document.getElementById('main-nav');
            const header = document.getElementsByTagName('header')[0];
            const firstSection = document.getElementsByTagName('section')[0];

            if (header === undefined) {
                nav.className = nav.className.replace('bg-transparent', 'bg-dark');

                if (firstSection) {
                    firstSection.style.marginTop = `${nav.offsetHeight}px`;
                }
            }

            AOS.init({
                disable: 'mobile',
                duration: 600,
                once: true,
            });
        </script>
    </body>
</html>
