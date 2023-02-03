<?php
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if (isset($_POST['sendform'])) {

    $name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);

    $lastname = filter_var($_POST['user_lastname'], FILTER_SANITIZE_STRING);

    $piva = filter_var($_POST['user_p-iva'], FILTER_SANITIZE_STRING);

    $cf = filter_var($_POST['user_cf'], FILTER_SANITIZE_STRING);

    $phone = filter_var($_POST['user_phone'], FILTER_SANITIZE_STRING);

    $district = filter_var($_POST['user_district'], FILTER_SANITIZE_STRING);

    $city = filter_var($_POST['user_city'], FILTER_SANITIZE_STRING);

    $address = filter_var($_POST['user_address'], FILTER_SANITIZE_STRING);

    $email = filter_var($_POST['user_email'], FILTER_SANITIZE_EMAIL);

    $gender = filter_var($_POST['user_gender'], FILTER_SANITIZE_STRING);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = ''; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = ''; //SMTP username
        $mail->Password = ''; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom("$email"); //CHI INVIA L'EMAIL
        $mail->addAddress(''); //CHI RICEVE L'EMAIL

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'RICHIESTA SOFTWARE';
        $mail->Body = '<body style="margin: 0;
padding: 0;">
    <div style="background-color:#F50057;">
        <div style="padding-top: 5rem;padding-bottom: 5rem;margin-left: 5rem;margin-right: 5rem;">
            <h1 style="font-family: Roboto, Arial, sans-serif; color: white; font-size: 36px;text-align: center;">RICHIESTA SOFTWARE</h1>
        </div>
    </div>
    <div style="font-family: Roboto, Arial, sans-serif; text-align: center;padding-top: 2rem;padding-bottom: 2rem;"><span>RICHIESTA GENERATA DAL FORM</span></div>
    <div style="font-family: Roboto, Arial, sans-serif;display:flex!important; justify-content:center!important;flex-direction: column!important; margin-left:5rem!important; margin-right:5rem!important;">
        <hr>
        <p>Nome <b class="ps-3">' . $name . '</b></p>
        <p>Cognome <b class="ps-3">' . $lastname . '</b></p>
        <p>Partiva IVA <b class="ps-3">' . $piva . '</b></p>
        <p>Codice Fisclae <b class="ps-3">' . $cf . '</b></p>
        <p>Numero di telefono <b class="ps-3">' . $phone . '</b></p>
        <p>Regione <b class="ps-3">' . $district . '</b></p>
        <p>Città <b class="ps-3">' . $city . '</b></p>
        <p>Indirizzo <b class="ps-3">' . $address . '</b></p>
        <p>Email <b class="ps-3">' . $email . '</b></p>
        <p>Sesso <b class="ps-3">' . $gender . '</b></p>
        <hr>
    </div>
    <div style="background-color:#F50057;">
        <div style="padding-top: 8rem;margin-left: 5rem;margin-right: 5rem;">
        </div>
    </div>
</body>';
        $mail->AltBody = 'This is in plain text for non-HTML mail clients';

        $mail->send();
        header("Refresh:0");
        $_POST = array();
        unset($_POST);
        $sendmail = true;
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else if (isset($_POST['sendCV'])) {
    try {

        $employee_info = filter_var($_POST['employee_info'], FILTER_SANITIZE_STRING);

        $employee_email = filter_var($_POST['employee_email'], FILTER_SANITIZE_EMAIL);

        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = ''; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = ''; //SMTP username
        $mail->Password = ''; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom("$employee_email"); //CHI INVIA L'EMAIL
        $mail->addAddress(''); //CHI RICEVE L'EMAIL


        $allowed = array('pdf');
        $filename = $_FILES['filepdf']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            echo "NON E un FILE PDF";
        } else {
            $path = 'upload/' . $_FILES["filepdf"]["name"];
            move_uploaded_file($_FILES["filepdf"]["tmp_name"], $path);

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->AddAttachment($path);     //Adds an attachment from a path on the filesystem
            $mail->Subject = 'INVIO CANDIDATURA';
            $mail->Body = '<body style="margin: 0;
padding: 0;">
    <div style="background-color:#F50057;">
        <div style="padding-top: 5rem;padding-bottom: 5rem;margin-left: 5rem;margin-right: 5rem;">
            <h1 style="font-family: Roboto, Arial, sans-serif; color: white; font-size: 36px;text-align: center;">INVIO CANDIDATURA</h1>
        </div>
    </div>
    <div style="font-family: Roboto, Arial, sans-serif; text-align: center;padding-top: 2rem;padding-bottom: 2rem;"><span>RICHIESTA GENERATA DAL FORM</span></div>
    <div style="font-family: Roboto, Arial, sans-serif;display:flex!important; justify-content:center!important;flex-direction: column!important; margin-left:5rem!important; margin-right:5rem!important;">
        <p>Nome e Cognome <b class="ps-3">' . $employee_info . '</b></p>
        <p>Email <b class="ps-3">' . $employee_email . '</b></p>
    </div>
    <div style="background-color:#F50057;">
        <div style="padding-top: 8rem;margin-left: 5rem;margin-right: 5rem;">
        </div>
    </div>
</body>';
            $mail->AltBody = 'This is in plain text for non-HTML mail clients';
            $mail->send();
            header("Refresh:0");
            $_POST = array();
            unset($_POST);
            $sendmail = true;
        }
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZERODEV</title>
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
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#team">Chi siamo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#product">Prodotti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#worktogheter">Lavora con noi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- INTRO -->
    <div class="container px-5 mt-8">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-lg-6 mb-8 d-flex justify-content-center align-items-center">
                <div class="text-area">
                    <h1 class="mb-3"><span>ZERO</span>DEV</h1>
                    <h3 class="mb-3">PER SVILUPPARE UN MONDO MIGLIORE</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro, ipsa? Repellendus magni, repellat porro nobis laudantium, autem officia vel asperiores possimus quam architecto atque non aliquam, ad veniam saepe reiciendis.</p>
                    <button type="button" class="btn btn-success btn-lg"><a href="#team">Scopri chi siamo</a></button>
                </div>
            </div>
            <img class="col-12 col-md-6 col-lg-6 intro-container" src="assets/svg/undraw_developer_activity.svg" alt="">
        </div>
    </div>

    <!-- DEVELOP -->
    <div id="team" class="container px-5 pt-5">
        <div class="row align-items-center mt-8 flex-row-reverse full">
            <div class="col-12 col-md-6 col-lg-6 mb-8 d-flex justify-content-center align-items-center">
                <div class="text-area">
                    <h2 class="mb-3">IL NOSTRO TEAM</h2>
                    <h4 class="mb-4">PERCHE' SCEGLIERE NOI</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi cum porro pariatur tempore. Ad id molestiae, sunt, dolore eligendi deserunt dignissimos, fugit ducimus labore velit libero. Mollitia distinctio tenetur officiis.</p>
                    <button type="button" class="btn btn-success btn-lg"><a href="#face">Guarda le nostre belle
                            faccie</a></button>
                </div>
            </div>
            <img class="col-12 col-md-6 col-lg-6 " src="assets/svg/undraw_engineering.svg" alt="engineering illustration">
        </div>
    </div>

    <!-- CARD -->
    <div id="face" class="container px-5 pt-5">
        <div class="row">
            <!--PIC-->
            <div class=" col-12 col-md-6 col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="assets/svg/avatar/undraw_male_avatar.svg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">John Smith</h5>
                        <p class="text-muted mb-1">Full Stack Developer</p>
                        <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-success"><a href="#">Follow</a></button>
                            <button type="button" class="btn btn-outline-primary ms-1"><a href="#">MESSAGE</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <!--PIC-->
            <div class=" col-12 col-md-6 col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="assets/svg/avatar/undraw_female_avatar.svg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">John Smith</h5>
                        <p class="text-muted mb-1">Full Stack Developer</p>
                        <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-success"><a href="#">Follow</a></button>
                            <button type="button" class="btn btn-outline-primary ms-1"><a href="#">MESSAGE</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <!--PIC-->
            <div class=" col-12 col-md-6 col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="assets/svg/avatar/undraw_male_avatar.svg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">John Smith</h5>
                        <p class="text-muted mb-1">Full Stack Developer</p>
                        <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-success"><a href="#">Follow</a></button>
                            <button type="button" class="btn btn-outline-primary ms-1"><a href="#">MESSAGE</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <!--PIC-->
            <div class=" col-12 col-md-6 col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="assets/svg/avatar/undraw_female_avatar.svg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">John Smith</h5>
                        <p class="text-muted mb-1">Full Stack Developer</p>
                        <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-success"><a href="#">Follow</a></button>
                            <button type="button" class="btn btn-outline-primary ms-1"><a href="#">MESSAGE</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <!--PIC-->
            <div class=" col-12 col-md-6 col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="assets/svg/avatar/undraw_male_avatar.svg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">John Smith</h5>
                        <p class="text-muted mb-1">Full Stack Developer</p>
                        <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-success"><a href="#">Follow</a></button>
                            <button type="button" class="btn btn-outline-primary ms-1"><a href="#">MESSAGE</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <!--PIC-->
            <div class=" col-12 col-md-6 col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="assets/svg/avatar/undraw_female_avatar.svg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">John Smith</h5>
                        <p class="text-muted mb-1">Full Stack Developer</p>
                        <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-success"><a href="#">Follow</a></button>
                            <button type="button" class="btn btn-outline-primary ms-1"><a href="#">MESSAGE</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- INTRO SOFTWARE -->
    <div class="container px-5 pt-5">
        <div class="row">
            <img class="col-12 col-md-6 col-lg-6" src="assets/svg/undraw_dev_productivity.svg" alt="develop">
            <div class="col-12 col-md-6 col-lg-6 d-flex justify-content-center flex-column">
                <div class="text-area">
                    <h3 class="my-3">MESTRI DEL SOFTWARE</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro, ipsa? Repellendus magni, repellat porro nobis laudantium, autem officia vel asperiores possimus quam architecto atque non aliquam, ad veniam saepe reiciendis.
                    </p>
                    <h3 class="text-center">PUNTI DI FORZA</h3>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><i class="fas fa-check-double me-4"></i>Massima attenzione al cliente
                    </li>
                    <li class="list-group-item"><i class="fas fa-check-double me-4"></i>Siamo veloci</li>
                    <li class="list-group-item"><i class="fas fa-check-double me-4"></i>Utilizziamo tecnologia innovative
                    </li>
                    <li class="list-group-item"><i class="fas fa-check-double me-4"></i>Miglioriamo ogni giorno</li>
                    <li class="list-group-item"><i class="fas fa-check-double me-4"></i>Crediamo nel futuro</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- PRODUCT -->
    <div id="product" class="container px-5 pt-5">
        <div class="row pt-5 pb-5 justify-content-center">
            <h1 class="text-center">I NOSTRI PRODOTTI</h1>
            <div class="row row-cols-1 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card h-100">
                        <img src="assets/img/mockup_logo.png" class="card-img-top" alt="" />
                        <div class="card-body">
                            <h5 class="card-title">GeoLogistic</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque atque maiores architecto accusantium fuga adipisci ducimus harum, nisi, deserunt cumque amet ab dolorem ipsam voluptatibus eum et at enim velit!
                            </p>
                            <hr>
                            <button type="button" class="btn btn-outline-primary ms-1"><a href="geologistic.php">Scheda
                                    Prodotto</a></button>
                        </div>
                        <div class="card-footer">
                            <span class="badge badge-primary">Gestionale</span>
                            <span class="badge badge-danger">TAGS</span>
                            <span class="badge badge-light">TAGS</span>
                            <span class="badge badge-warning">TAGS</span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="assets/img/mockup_logo.png" class="card-img-top" alt="" />
                        <div class="card-body">
                            <h5 class="card-title">LiveMusic Booking</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque atque maiores architecto accusantium fuga adipisci ducimus harum, nisi, deserunt cumque amet ab dolorem ipsam voluptatibus eum et at enim velit!
                            </p>
                            <hr>
                            <button type="button" class="btn btn-outline-primary ms-1" disabled><a href="#">COOMING
                                    SOON</a></button>
                        </div>
                        <div class="card-footer">
                            <span class="badge badge-secondary">CRM</span>
                            <span class="badge badge-success">TAGS</span>
                            <span class="badge badge-primary">TAGS</span>
                            <span class="badge badge-danger">TAGS</span>


                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="assets/img/mockup_logo.png" class="card-img-top" alt="" />
                        <div class="card-body">
                            <h5 class="card-title">LeRn Fill</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque atque maiores architecto accusantium fuga adipisci ducimus harum, nisi, deserunt cumque amet ab dolorem ipsam voluptatibus eum et at enim velit!
                            </p>
                            <hr>
                            <button type="button" class="btn btn-outline-primary ms-1" disabled><a href="#">COOMING
                                    SOON</a></button>
                        </div>
                        <div class="card-footer">
                            <span class="badge badge-danger">ERP</span>
                            <span class="badge badge-success">TAGS</span>
                            <span class="badge badge-primary">TAGS</span>
                            <span class="badge badge-warning">TAGS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTACT FORM -->
    <div class="container py-5 px-5">
        <div class="text-center pb-5">
            <h3>NON HAI TROVATO QUELLO CHE CERCAVI?</h3>
            <p>Non ti preoccupare, compila il form e ti contatteremo presto</p>
        </div>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card card-registration my-4">
                    <div class="row g-0 align-items-center">
                        <div class="col-xl-6 d-none d-xl-block">
                            <img src="assets/svg/undraw_web_development.svg" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                        </div>
                        <div class="col-xl-6">
                            <div class="card-body p-md-5 text-black">

                                <h3 class="mb-5 text-uppercase">FORM DI RICHIESTA</h3>

                                <form action="index.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" name="user_name" class="form-control form-control-lg" placeholder="Inserisci il nome" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" name="user_lastname" class="form-control form-control-lg" placeholder="Inserisci il cognome" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" name="user_p-iva" class="form-control form-control-lg" placeholder="P.IVA" required />

                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" name="user_cf" class="form-control form-control-lg" placeholder="CF" required />

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="user_phone" class="form-control form-control-lg" placeholder="Numero di telefono" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="user_district" class="form-control form-control-lg" placeholder="Regione" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="user_city" class="form-control form-control-lg" placeholder="Città" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="user_address" class="form-control form-control-lg" placeholder="Indirizzo" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" name="user_email" class="form-control form-control-lg" placeholder="Email" required />
                                    </div>
                                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                        <h6 class="mb-0 me-4">Sesso: </h6>

                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="user_gender" id="femaleGender" value="Femmina" />Femmina
                                        </div>

                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="user_gender" id="maleGender" value="Maschio" />Maschio
                                        </div>

                                        <div class="form-check form-check-inline mb-0">
                                            <input class="form-check-input" type="radio" name="user_gender" id="otherGender" value="Altro" />Altro
                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-end pt-3">
                                        <button type="button" class="btn btn-outline-primary btn-lg">Pulisci il
                                            Form</button>
                                        <button type="submit" name="sendform" class="btn btn-success btn-lg ms-2">Invia richiesta</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- WORK -->
    <section class="bg-orangered px-5">
        <div id="worktogheter" class="container py-5">
            <div class="cv">
                <h3>SEI PER CASO UNO SVILUPPATORE</h3>
                <p>Inviaci la tua candidatura spontanea</p>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-10 col-md-7 col-lg-4 py-5">
                    <form class="cv_send" action="index.php" method="POST" enctype="multipart/form-data">
                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="employee_info" class="form-control" placeholder="Inserisci Nome e Cognome" required />
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" name="employee_email" class="form-control" placeholder="Inserisci la tua mail" required />
                        </div>
                        <!-- File -->
                        <div class="mb-4">
                            </label>
                            <input type="file" name="filepdf" class="form-control" id="customFile" placeholder="Carica CV" required />
                        </div>
                        <!-- Submit button -->
                        <button style="background-color: #a41438;" type="submit" name="sendCV" class="btn btn-success btn-block mb-4">Invia Candidatura</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


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
    </div>
</body>

</html>