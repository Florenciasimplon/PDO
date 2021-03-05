<?php
try
{
$pdo = new PDO('mysql:host=php.loc;dbname=patients;charset=utf8','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    die('Erreur:'.$e->getMessage());
}