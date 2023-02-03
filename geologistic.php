<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoLogistic</title>
    <link type="image/png" sizes="16x16" rel="icon" href="assets/icon/icons_16.png">
    <link type="image/png" sizes="32x32" rel="icon" href="assets/icon/icons_32.png">
    <link type="image/png" sizes="96x96" rel="icon" href="assets/icon/icons_96.png">
    <link type="image/png" sizes="120x120" rel="icon" href="assets/icon/icons_120.png">
    <?php require 'components/style.html' ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- NAVABAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-5">
            <a class="navbar-brand" href="#"><b><span>ZERO</span>DEV</b></a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- CARD -->
    <div class="container px-5 pt-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12">
                <div class="card card-registration my-4">
                    <div class="text-area">
                        <h2 class="my-3 text-center"><b class="big">GEOLOGISTIC</b></h2>
                    </div>
                    <div class="row justify-content-center align-items-center">
                        <!-- 01 -->
                        <div class="text-area col-12 col-md-6 col-lg-6 px-5 text-center spacing">
                            <h3>UN NUOVO MODO DI GESTIRE LA LOGISTICA</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda suscipit magnam maiores impedit error, labore fuga ducimus in, optio maxime commodi beatae quam quaerat laboriosam esse quidem dolor natus nobis.</p>
                        </div>
                        <img class="col-12 col-md-6 col-lg-6 px-5" src="assets/svg/geologistic/undraw_around_the_world.svg" alt="mondo">
                        <div class="row justify-content-center align-items-center mt-8">
                            <!-- 02 -->
                            <img class="col-12 col-md-6 col-lg-6 px-5" src="assets/svg/geologistic/undraw_control_panel.svg" alt="panel">
                            <div class="text-area col-12 col-md-6 col-lg-6 text-center my-5">
                                <h3 class="px-5">DASHBOARD PROFESSIONALE E FUNZIONALE</h3>
                                <p class="px-5 pt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda suscipit magnam maiores impedit error, labore fuga ducimus in, optio maxime commodi beatae quam quaerat laboriosam esse quidem dolor natus nobis.</p>
                            </div>
                            <!-- 03 -->
                            <div class="row justify-content-center tobutton panel my-3 spacing">
                                <div class="d-flex justify-content-center align-items-center col-12 col-md-4 col-lg-4 px-5 flex-column mb-5">
                                    <img class="px-5 imgbig" src="assets/svg/panel/undraw_secure_server.svg" alt="illustation-undraw">
                                    <span class="text-center pt-4"><b>SITUATO IN SERVER SICURI</b></span>
                                </div>

                                <div class="d-flex justify-content-center align-items-center col-12 col-md-4 col-lg-4 px-5 flex-column mb-5">
                                    <img class="px-5 imgbig" src="assets/svg/panel/undraw_watch_application.svg" alt="illustation-undraw">
                                    <span class="text-center pt-4"><b>COMPATIBILE CON GLI SMARTWATCH</b></span>
                                </div>

                                <div class="d-flex justify-content-center align-items-center col-12 col-md-4 col-lg-4 px-5 flex-column mb-5">
                                    <img class="px-5 imgbig" src="assets/svg/panel/undraw_maintenance.svg" alt="illustation-undraw">
                                    <span class="text-center pt-4"><b>MANTENUTO SEMPRE AL TOP</b></span>
                                </div>
                            </div>
                            <!-- 04 -->
                            <div class="row justify-content-center align-items-center">
                                <img class="col-12 col-md-6 col-lg-6 px-5" src=" assets/svg/contract/undraw_contract.svg" alt="">
                                <div class="text-area col-12 col-md-6 col-lg-6 text-center my-5">
                                    <h3 class="px-5">GESTIONE DEI CONTRATTI</h3>
                                    <p class="px-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda suscipit magnam maiores impedit error, labore fuga ducimus in, optio maxime commodi beatae quam quaerat laboriosam esse quidem dolor natus nobis.</p>
                                </div>
                            </div>
                            <div class="row my-3">
                                <h2 class="text-center p-5"> PIANI DI ACQUISTO</h2>
                                <div class="col-12 col-md-13 col-lg-3 mb-5">
                                    <div class="card">
                                        <div class="mx-2 card-body">
                                            <h5 class="card-title my-2 ">Startup</h5>
                                            <p class="text-muted">
                                                Il minimo per iniziare in questo
                                            </p>
                                            <p class="h2 fw-bold">1.000€<small class="text-muted" style="font-size: 18px;">/mo</small></p>
                                            <a href="buy.php?name=geologistic&code=startup" class="btn btn-success d-block mb-2 mt-3 text-capitalize">Buy Startup</a>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-uppercase fw-bold" style="font-size: 12px;">Cosa comprende</p>
                                            <ol class="list-unstyled mb-0 px-4">
                                                <p class="my-3 fw-bold text-muted text-center">
                                                </p>
                                                <li class="mb-3">
                                                    <i class="fas fa-check text-success me-3"></i><small>Lorem Ipsum</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-check text-success me-3"></i><small>Lorem Ipsum</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-check text-success me-3"></i><small>Lorem Ipsum</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-check text-success me-3"></i><small>Lorem Ipsum</small>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-13 col-lg-3 mb-5">
                                    <div class="card">
                                        <div class="mx-2 card-body">
                                            <h5 class="card-title my-2 ">Azienda</h5>
                                            <p class="text-muted">
                                                La scelta di ogni azienda responsabile
                                            </p>
                                            <p class="h2 fw-bold">2.000€<small class="text-muted" style="font-size: 18px;">/mo</small></p>
                                            <a href="buy.php?name=geologistic&code=company" class="btn btn-success d-block mb-2 mt-3 text-capitalize">Buy Startup</a>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-uppercase fw-bold" style="font-size: 12px;">Cosa comprende</p>
                                            <ol class="list-unstyled mb-0 px-4">
                                                <p class="my-3 fw-bold text-muted text-center">
                                                </p>
                                                <li class="mb-3">
                                                    <i class="fas fa-check text-success me-3"></i><small>Lorem Ipsum</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-check text-success me-3"></i><small>Lorem Ipsum</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-check text-success me-3"></i><small>Lorem Ipsum</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-check text-success me-3"></i><small>Lorem Ipsum</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-check text-success me-3"></i><small>Lorem Ipsum</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-check text-success me-3"></i><small>Lorem Ipsum</small>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-13 col-lg-3 mb-5">
                                    <div class="card">
                                        <div class="mx-2 card-body">
                                            <h5 class="card-title my-2 ">Enterprise</h5>
                                            <p class="text-muted">
                                                Non fermanti all'essenziale, va oltre
                                            </p>
                                            <p class="h2 fw-bold">3.000€<small class="text-muted" style="font-size: 18px;">/mo</small></p>
                                            <a href="buy.php?name=geologistic&code=enterprise" class="btn btn-success d-block mb-2 mt-3 text-capitalize">Buy Startup</a>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-uppercase fw-bold" style="font-size: 12px;">Cosa comprende</p>
                                            <ol class="list-unstyled mb-0 px-4">
                                                <p class="my-3 fw-bold text-muted text-center">
                                                </p>
                                                <li class="mb-3">
                                                    <i class="fas fa-check text-success me-3"></i><small>Lorem Ipsum</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-check text-success me-3"></i><small>Lorem Ipsum</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-check text-success me-3"></i><small>Lorem Ipsum</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-check text-success me-3"></i><small>Lorem Ipsum</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-check text-success me-3"></i><small>Lorem Ipsum</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-check text-success me-3"></i><small>Lorem Ipsum</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-check text-success me-3"></i><small>Lorem Ipsum</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-check text-success me-3"></i><small>Lorem Ipsum</small>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-13 col-lg-3 mb-5">
                                    <div class="card">
                                        <div class="mx-2 card-body">
                                            <h5 class="card-title my-2 ">Big Company</h5>
                                            <p class="text-muted">
                                                Se sei Amazon, scegli questo piano
                                            </p>
                                            <p class="h2 fw-bold">4.000€<small class="text-muted" style="font-size: 18px;">/mo</small></p>
                                            <a href="buy.php?name=geologistic&code=bigcompany" class="btn btn-success d-block mb-2 mt-3 text-capitalize">Buy Startup</a>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-uppercase fw-bold" style="font-size: 12px;">Cosa comprende</p>
                                            <ol class="list-unstyled mb-0 px-4">
                                                <p class="my-3 fw-bold text-muted text-center">
                                                </p>
                                                <li class="mb-3">
                                                    <i class="fas fa-dollar-sign text-success me-3"></i><small>Give me your money</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-dollar-sign text-success me-3"></i><small>Give me your money</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-dollar-sign text-success me-3"></i><small>Give me your money</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-dollar-sign text-success me-3"></i><small>Give me your money</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-dollar-sign text-success me-3"></i><small>Give me your money</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-dollar-sign text-success me-3"></i><small>Give me your money</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-dollar-sign text-success me-3"></i><small>Give me your money</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-dollar-sign text-success me-3"></i><small>Give me your money</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-dollar-sign text-success me-3"></i><small>Give me your money</small>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-dollar-sign text-success me-3"></i><small>Give me your money</small>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="text-center text-white mt-5 ">
        <!-- Grid container -->
        <div class="container pt-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>
                <!-- Github -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center text-white p-3 footer-bg">
            © 2023 Copyright ZERODEV
        </div>
        <!-- Copyright -->
    </footer>
    <!-- MDB -->
    <script type=" text/javascript " src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js "></script>
</body>

</html>