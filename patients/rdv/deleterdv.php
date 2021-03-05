<?php
require_once(__DIR__."/../../pdo.php");

if (empty($_GET["id"])){
    die("paramètre manquants");
}
$deleteStatement= $pdo->prepare("DELETE FROM appointments WHERE id=?");
$deleteStatement->execute([
    $_GET["id"]
]);

header("location:liste-rdv.php?=Le RDV a bien été supprimé");