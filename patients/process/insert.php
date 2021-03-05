<?php
require_once("../../pdo.php");
if (empty($_POST["firstname"])) {
die("paramètres manquants.");
}
$dateParts=explode("/",$_POST["birthdate"]);
$birthdateFormatted=$dateParts[2]."-".$dateParts[1]."'".$dateParts[0];
$insertStatement =$pdo->prepare("
        INSERT INTO patients
        (lastname,firstname,birthdate,phone,mail)
        VALUES
        (?,?,?,?,?)
    ");

$insertStatement->execute([
    $_POST["lastname"],
    $_POST["firstname"],
    $birthdateFormatted,
    $_POST["phone"],
    $_POST[ "mail"]
]);



    
header('location: /Exercice-PDO-2/index.php?message=Votre patient à bien été créer');