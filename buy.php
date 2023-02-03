<?php
session_start();
if (isset($_SESSION['userEmail'])) {
    $isLogged = true;
} else {
    $isLogged = false;
}
?>
<!DOCTYPE html>
<html lang="it">
<?php
if (isset($_GET['name']) && isset($_GET['code'])) {
    $name = $_GET['name'];
    $code = $_GET['code'];
    //CONTROLLO URL
    switch ($name) {
        case 'geologistic':
            if ($code == 'startup') {
                $money = 1000;
                $commission = 9000;
                $valid = true;
                break;
            } else if ($code == 'company') {
                $money = 2000;
                $commission = 8000;
                $valid = true;
                break;
            } else if ($code == 'enterprise') {
                $money = 3000;
                $commission = 7000;
                $valid = true;
                break;
            } else if ($code == 'bigcompany') {
                $money = 4000;
                $commission = 6000;
                $valid = true;
                break;
            } else {
                $money = 0;
                $commission = 0;
                $valid = false;
            }
            break;


        case 'altronomesoftware':
            break;
        default:
            $money = 0;
            $commission = 0;
            $valid = false;
            break;
    }
} else {
    $name = "";
    $code = "";
    $money = 0;
    $commission = 0;
    $valid = false;
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acquisto Licenza <?= ucfirst($code) ?></title>
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
        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <?php if (!$valid) {
                            echo "<div class='alert alert-danger' role='alert'>
                            PROBLEMA NELL'URL. SARAI RENDERIZZATO ALLA HOME 
                        </div>";
                            header("refresh:5; url=index.php");
                        }
                        ?>
                        <h5 class="mb-0 text-end">Acquisto licenza [<?= ucfirst($code) ?>]</h5>
                    </div>
                    <div class="card-body">
                        <form action="finish.php" method="POST">
                            <?php if (!$isLogged) { ?>
                                <div class="row mb-4">
                                    <div class="alert alert-secondary" role="alert">
                                        <span class="text-muted my-3">Se sei già registrato? <a href="login.php">Accedi</a></span>
                                    </div>
                                    <h5 class="mb-4"> Dati personali</h5>

                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" name="user_name" class="form-control" placeholder="Nome" <? if (!$valid) echo "disabled" ?> required />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" name="user_lastname" class="form-control" placeholder="Cognome" <? if (!$valid) echo "disabled" ?> required />
                                        </div>
                                    </div>
                                </div>

                                <!-- Text input -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="user_emil" class="form-control" placeholder="Email" <? if (!$valid) echo "disabled" ?> required />
                                </div>

                                <!-- Text input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="user_passwd" class="form-control" placeholder="Password" <? if (!$valid) echo "disabled" ?> required />
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="text" name="user_cf" class="form-control" placeholder="Codice Fiscale" <? if (!$valid) echo "disabled" ?> required />
                                </div>

                                <!-- Number input -->
                                <div class="form-outline mb-4">
                                    <input type="date" name="user_birth" class="form-control" value="1970-01-01" <? if (!$valid) echo "disabled" ?> required />
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" name="user_city" class="form-control" placeholder="Città" <? if (!$valid) echo "disabled" ?> required />
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" name="user_address" class="form-control" placeholder="Indirizzo" <? if (!$valid) echo "disabled" ?> required />
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" name="user_phone" class="form-control" placeholder="Telefono" <? if (!$valid) echo "disabled" ?> required />
                                </div>
                                <hr class="my-4" />

                            <?php
                            }
                            ?>
                            <h5 class="mb-4"> Dati dell'azienda</h5>
                            <div class="row mb-4">

                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" name="company_name" class="form-control" placeholder="Nome" <? if (!$valid) echo "disabled" ?> required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" name="company_piva" class="form-control" placeholder="P.IVA" <? if (!$valid) echo "disabled" ?> required />
                                    </div>
                                </div>
                            </div>

                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <input type="text" name="company_city" class="form-control" placeholder="Città" <? if (!$valid) echo "disabled" ?> required />
                            </div>

                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <input type="text" name="company_cap" class="form-control" placeholder="CAP" <? if (!$valid) echo "disabled" ?> required />
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="text" name="company_address" class="form-control" placeholder="Indirizzo" <? if (!$valid) echo "disabled" ?> required />
                            </div>

                            <!-- Number input -->
                            <div class="form-outline mb-4">
                                <input type="text" name="company_phone" class="form-control" placeholder="Telefono" <? if (!$valid) echo "disabled" ?> required />
                            </div>

                            <div class="form-outline mb-4">
                                <input type="email" name="company_email" class="form-control" placeholder="Email" <? if (!$valid) echo "disabled" ?> required />
                            </div>

                            <div class="form-outline mb-4">
                                <input type="email" name="company_pec" class="form-control" placeholder="PEC" <? if (!$valid) echo "disabled" ?> required />
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" name="company_juridic-status" class="form-control" placeholder="Stato giuridico" <? if (!$valid) echo "disabled" ?> required />
                            </div>

                            <hr class="my-4" />
                            <h5 class="mb-4">Metodo di Pagamento</h5>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" /> Carta di credito
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="radio" name="payment_method" checked required /> In nero
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" name="credit_card-owner" class="form-control" <? if (!$valid) echo "disabled" ?> placeholder="Titolare della carta" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" name="credit_card-pan" class="form-control" <? if (!$valid) echo "disabled" ?> placeholder="Numero della carta" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-12 mb-4">
                                    <div class="form-outline">
                                        <input type="month" name="credit_card-endless" value="1970-01" class="form-control" <? if (!$valid) echo "disabled" ?> required />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-outline">
                                        <input type="text" name="credit_cvv" class="form-control" <? if (!$valid) echo "disabled" ?> placeholder="CVV" required />
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success btn-lg btn-block" name="buycheck" type="submit" <? if (!$valid) echo "disabled" ?>>
                                ACQUISTA
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0 text-end">Riepilogo</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                <?= ucfirst($name) ?> licenza <br><?= ucfirst($code) ?>
                                <span><?= $money ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Commissioni per Emanuele
                                <span><?= $commission ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Costo finale</strong>
                                </div>
                                <span><strong><?= $money + $commission ?></strong></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MDB -->
    <script type=" text/javascript " src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js "></script>
</body>

</html>