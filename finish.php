<?php
session_start();
if (isset($_SESSION['userEmail'])) {
    $isLogged = true;
} else {
    $isLogged = false;
}
require 'backend/dbconnection.php';
if (isset($_POST['buycheck'])) {
    if (!$isLogged) {
        $userName = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
        $userLastname = filter_var($_POST['user_lastname'], FILTER_SANITIZE_STRING);
        $userEmail = filter_var($_POST['user_email'], FILTER_SANITIZE_EMAIL);
        $userPasswd = filter_var($_POST['user_passwd'], FILTER_SANITIZE_STRING);
        $userCF = filter_var($_POST['user_cf'], FILTER_SANITIZE_STRING);
        $userBirth = $_POST['user_birth'];
        $userCity = filter_var($_POST['user_city'], FILTER_SANITIZE_STRING);
        $userAddress = filter_var($_POST['user_address'], FILTER_SANITIZE_STRING);
        $userPhone = filter_var($_POST['user_phone'], FILTER_SANITIZE_STRING);
        $queryUser = "INSERT INTO user (name,lastname,email,passwd,cf,birth,city,address,phone) VALUES 
        ('$userName','$userLastname','$userEmail','$userPasswd','$userCF','$userBirth','$userCity','$userAddress','$userPhone')";
        $mysqli->query($queryUser);
    }

    $companyName = filter_var($_POST['company_name'], FILTER_SANITIZE_STRING);
    $companyPIVA = filter_var($_POST['company_piva'], FILTER_SANITIZE_STRING);
    $companyCity = filter_var($_POST['company_city'], FILTER_SANITIZE_STRING);
    $companyCAP = filter_var($_POST['company_cap'], FILTER_SANITIZE_STRING);
    $companyAddress = filter_var($_POST['company_address'], FILTER_SANITIZE_STRING);
    $companyPhone = filter_var($_POST['company_phone'], FILTER_SANITIZE_STRING);
    $companyEmail = filter_var($_POST['company_email'], FILTER_SANITIZE_EMAIL);
    $companyPEC = filter_var($_POST['company_pec'], FILTER_SANITIZE_EMAIL);
    $companyJuridicStatus = filter_var($_POST['company_juridic-status'], FILTER_SANITIZE_STRING);

    $paymentmothod = filter_var($_POST['payment_method'], FILTER_SANITIZE_STRING);

    $cardOwner = filter_var($_POST['credit_card-owner'], FILTER_SANITIZE_STRING);
    $cardPAN = filter_var($_POST['credit_card-pan'], FILTER_SANITIZE_STRING);
    $cardEndless = filter_var($_POST['credit_card-endless'], FILTER_SANITIZE_STRING);
    $cardCVV = filter_var($_POST['credit_cvv'], FILTER_SANITIZE_STRING);

    //SALVATAGGIO DELL'ID DELL'UTENTE
    $queryID = "SELECT id FROM user WHERE email = '$userEmail'";
    $result = $mysqli->query($queryID);
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        //Debug
        $myid = $row["id"];
    }

    var_dump($myid);
    //INSERIMENTO AZIENDA 
    $queryCompany = "INSERT INTO company (name,p_iva,city,cap,address,phone,email,pec,juridical_status,user_id) VALUES
        ('$companyName','$companyPIVA','$companyCity','$companyCAP','$companyAddress','$companyPhone','$companyEmail','$companyPEC','$companyJuridicStatus','$myid')";
    $mysqli->query($queryCompany);

    if ($mysqli->query($queryCompany)) {
        printf("Record inserted successfully.<br />");
    }
    if ($mysqli->errno) {
        printf("Could not insert record into table: %s<br />", $mysqli->error);
    }
    //Chiusura DATABASE
    $mysqli->close();
}
