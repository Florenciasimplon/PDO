<?php
require_once(__DIR__."../../../pdo.php");
if (empty($_POST["idPatients"])) {
die("paramètres manquants.");
}

$dateHour= $_POST["date"] . " " . $_POST["time"];

$insertStatement =$pdo->prepare("
        UPDATE appointments 
        SET idPatients=?,
        dateHour=?
        WHERE id = ?
");

$insertStatement->execute([
    $_POST["idPatients"],
    $dateHour,
    $_GET["id"],

]);
    
header('location: /Exercice-PDO-2/patients/rdv/modifier-rdv.php?id='.$_GET['id'].'&message=Votre profil à bien été modifier');
