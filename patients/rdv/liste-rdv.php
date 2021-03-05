<?php
require_once(__DIR__."/../../pdo.php");
$selectStatement = $pdo->prepare(
    'SELECT appointments.*, patients.firstname, patients.lastname 
     FROM appointments 
     JOIN patients
        ON patients.id = appointments.idPatients');
$selectStatement->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste rdv</title>
</head>
<body>
    <H1>LISTE des Rendez-vous</H1>
    <?php if (!empty($_GET["message"])) : ?>
        <div style="padding: 10px;background:gray;color:#fff;">
            <?=$_GET["message"]?>
        </div>
    <?php endif;?>

<table border="1">
   <thead>
        <tr>
            <td>ID</td>
            <td>Patient👤</td>
             <td> Date & Heure</td>
             <td>Modifier</td>
             <td>Supprimer</td>
             </tr>
   </thead>
<tbody>
   <?php 
        foreach ($selectStatement->fetchAll() as $appointment){
    ?>      <tr>
             <td><?=$appointment["id"]?> </td>
             <td><?=$appointment["lastname"]?> <?=$appointment["firstname"]?></td>
             <td><?=$appointment["dateHour"]?></td>
            <td><a href="modifier-rdv.php?id=<?=$appointment["id"]?>">👁</a></td>
            <td><a href="../rdv/deleterdv.php?id=<?=$appointment["id"]?>">❌</a></td>
            </tr>
<?php }
    ?>
</tbody>
</table>
<br>
    <a href="./ajout-rendezvous.php">Prendre un Rendez-vous</a>
</body>
</html>