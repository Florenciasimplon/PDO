<?php
require_once(__DIR__."../../../pdo.php");
if (empty($_POST["idPatients"])) {
die("paramètres manquants.");
}

$dateHour= $_POST["date"] . " " . $_POST["time"];

$insertStatement =$pdo->prepare("
        INSERT INTO appointments
            (idPatients,dateHour)    
            VALUES (?,?)
");

$insertStatement->execute([
    $_POST["idPatients"],
    $dateHour,

]);
    
header('location:/Exercice-PDO-2/patients/rdv/ajout-rendezvous.php?message=Votre rendez-vous à bien été enregistré');
