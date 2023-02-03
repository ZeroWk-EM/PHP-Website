<?php
session_start();
require 'dbconnection.php';
if (isset($_SESSION['userEmail'])) {
    //SE L'UTENTE E' GIA LOGGATO VIENE MANDATO ALL'INDEX
    header('Location: index.php');
    exit;
}

if (isset($_POST['loginform'])) {
    $tmp_email = $mysqli->real_escape_string($_POST['email']);
    $tmp_passwd = $mysqli->real_escape_string($_POST['password']);
    $query = "SELECT * FROM user WHERE email='$tmp_email' AND passwd='$tmp_passwd'";
    $checkExist = $mysqli->query($query);
    //Se esiste ci tornera che è stata trovata una riga
    $nrow = mysqli_num_rows($checkExist);
    if ($nrow == 1) {
        $_SESSION['userEmail'] = $tmp_email;
        echo "Login Avvenuto con succeso fra qualche secondo verrai reinderizzato all'index";
        header("refresh:3; url=index.php");
    } else {
        echo "Errore utente non presente nel database";
    }
    $mysqli->close();
}
