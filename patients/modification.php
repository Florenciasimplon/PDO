<?php
require_once(__DIR__."../../pdo.php");
if (empty($_POST["firstname"])) {
die("paramètres manquants.");
}

$dateParts=explode("/",$_POST["birthdate"]);
$birthdateFormatted=$dateParts[2]."-".$dateParts[1]."-".$dateParts[0];

$insertStatement =$pdo->prepare("
        UPDATE patients SET
            lastname =?
            firstname=?
            Birthdate=?
            phone=?
            mail=?
        WHERE id = ?
");

$insertStatement->execute([
    $_POST["lastname"],
    $_POST["firstname"],
    $birthdateFormatted,
    $_POST["phone"],
    $_POST[ "mail"],

]);
    
header('location: /Exercice-PDO-2/patients/profil-patient.php?id='.$_GET['id'].'&message=Votre profil à bien été modifier');

