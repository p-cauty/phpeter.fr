<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/font-awesome-6.5.1.all.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/aos.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}" />

        <title>Sites web & logiciels pour les Pros - {{ config('app.name') }}</title>
        <meta name="description" content="PHPeter, le partenaire des Pros pour des sites web et logiciels sur mesure. Expert en développement, nous concrétisons vos idées en applications métiers, vitrines en ligne percutantes et solutions logicielles innovantes. Avec la maintenance et le support inclus, donnez une nouvelle dimension à votre présence en ligne." />
        <meta name="author" content="Peter Cauty" />
        <link rel="canonical" href="{{ url()->current() }}" />
        <meta property="og:locale" content="fr_FR" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Sites web &amp; logiciels pour les Pros &#8211; PHPeter" />
        <meta property="og:description" content="PHPeter, le partenaire des Pros pour des sites web et logiciels sur mesure. Experts en développement, nous concrétisons vos idées en applications métiers, vitrines en ligne percutantes et solutions logicielles innovantes. Avec la maintenance et le support inclus, donnez une nouvelle dimension à votre présence en ligne." />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:site_name" content="PHPeter" />
        <meta property="og:image" content="{{ asset('img/social.jpg') }}" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="675" />
        <meta property="og:image:type" content="image/jpeg" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@p_cauty" />
    </head>
    <body>
        <div id="layoutDefault">
            <div id="layoutDefault_content">
                <main>
                    <!-- Navbar-->
                    <nav class="navbar navbar-marketing navbar-expand-lg bg-{{ routeIs('home') ? 'transparent' : 'dark' }} navbar-dark fixed-top">
                        <div class="container px-5">
                            <a class="navbar-brand text-white" href="index.html">{{ config('app.name') }}</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i  class="fas fa-ellipsis-vertical"></i></button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto me-lg-5">
                                    <li class="nav-item">
                                        <a class="nav-link {{ routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Accueil</a>
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
                                <div class="footer-brand">SB UI Kit Pro</div>
                                <div class="mb-3">Design made easy</div>
                                <div class="icon-list-social mb-5">
                                    <a class="icon-list-social-link" href="#!"><i class="fab fa-instagram"></i></a>
                                    <a class="icon-list-social-link" href="#!"><i class="fab fa-facebook"></i></a>
                                    <a class="icon-list-social-link" href="#!"><i class="fab fa-github"></i></a>
                                    <a class="icon-list-social-link" href="#!"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row gx-5">
                                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                                        <div class="text-uppercase-expanded text-xs mb-4">Product</div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><a href="#!">Landing</a></li>
                                            <li class="mb-2"><a href="#!">Pages</a></li>
                                            <li class="mb-2"><a href="#!">Sections</a></li>
                                            <li class="mb-2"><a href="#!">Documentation</a></li>
                                            <li><a href="#!">Changelog</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                                        <div class="text-uppercase-expanded text-xs mb-4">Technical</div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><a href="#!">Documentation</a></li>
                                            <li class="mb-2"><a href="#!">Changelog</a></li>
                                            <li class="mb-2"><a href="#!">Theme Customizer</a></li>
                                            <li><a href="#!">UI Kit</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                                        <div class="text-uppercase-expanded text-xs mb-4">Includes</div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><a href="#!">Utilities</a></li>
                                            <li class="mb-2"><a href="#!">Components</a></li>
                                            <li class="mb-2"><a href="#!">Layouts</a></li>
                                            <li class="mb-2"><a href="#!">Code Samples</a></li>
                                            <li class="mb-2"><a href="#!">Products</a></li>
                                            <li class="mb-2"><a href="#!">Affiliates</a></li>
                                            <li><a href="#!">Updates</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="text-uppercase-expanded text-xs mb-4">Legal</div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><a href="#!">Privacy Policy</a></li>
                                            <li class="mb-2"><a href="#!">Terms and Conditions</a></li>
                                            <li><a href="#!">License</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-5" />
                        <div class="row gx-5 align-items-center">
                            <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
                            <div class="col-md-6 text-md-end small">
                                <a href="#!">Privacy Policy</a>
                                &middot;
                                <a href="#!">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.0/lity.min.js"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
                disable: 'mobile',
                duration: 600,
                once: true,
            });
        </script>
    </body>
</html>