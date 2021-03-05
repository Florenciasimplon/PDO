<?php
require_once(__DIR__."/../pdo.php");
if (empty($_POST["firstname"])) {
die("paramètres manquants.");
}
$dateParts=explode("-",$_POST["birthdate"]);
$birthdateFormatted=$dateParts[2]."-".$dateParts[1]."'".$dateParts[0];
$insertPatientStatement =$pdo->prepare("
        INSERT INTO patients
        (lastname,firstname,birthdate,phone,mail)
        VALUES
        (?,?,?,?,?)
    ");

$insertPatientStatement->execute([
    $_POST["lastname"],
    $_POST["firstname"],
    $birthdateFormatted,
    $_POST["phone"],
    $_POST[ "mail"]
]);
$lastid=$pdo->lastInsertId();
$dateHour= $_POST["date"] . " " . $_POST["time"];

$insertRdvStatement =$pdo->prepare("
        INSERT INTO appointments
              (idPatients,dateHour)  
              VALUES (?,?)
");

$insertRdvStatement->execute([
    $lastid,
    $dateHour,

]);
    
header('location:/Exercice-PDO-2/patients/ajout-patient-rendez-vous.php?message=Votre rendez-vous à bien été enregistré');