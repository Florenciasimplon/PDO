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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="pdo.css">
    <title>Document</title>
</head>
<body>
    <h1>créer un patient</h1>
    <form action="process/insert.php" method="POST">
                <label><b>Nom du patient</b></label>
                <input type="text" placeholder="Entrer le prenom d'utilisateur"name="lastname" required>
                <label><b>Prenom du patient</b></label>
                <input type="text" placeholder="Entrer le prenom d'utilisateur"  name="firstname" required>
                <label><b>Date de naissance</b></label>
                <input type="text" placeholder="date de naissance" name="birthdate" required>
                <label><b>Phone</b></label>
                <input type="text" placeholder="Numéro de telephone" name="phone" required>
                <label><b>Email</b></label>
                <input type="text" placeholder="Email" name="mail" required>

                <input type="submit" id='submit' value='créer le patient' >
 </form>
</body>
</html>