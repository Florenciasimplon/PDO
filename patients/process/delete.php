<?php
require_once(__DIR__."/../../pdo.php");

if (empty($_GET["id"])){
    die("paramètre manquants");
}
$deleteAppointmentsStatement= $pdo->prepare("DELETE FROM appointments WHERE idPatients=?");
$deleteAppointmentsStatement-> execute([
    $_GET["id"]
]);

$deleteStatement= $pdo->prepare("DELETE FROM patients WHERE id=?");
$deleteStatement-> execute([
    $_GET["id"]
]);

header("location:liste-patients.php?message= Le patient a bien été supprimé");