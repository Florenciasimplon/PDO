<?php
require_once(__DIR__."/../../pdo.php");


$patientStatement = $pdo->prepare('SELECT * FROM appointments WHERE id=?');
$patientStatement->execute([
    $_GET['id']
]);

$patient = $patientStatement->fetch();

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
    <title>Profil👁‍🗨</title>
</head>
<body>
<?php

    echo"<tr>";
    echo '<td> <b>Nom : </b>'.$patients['lastname'].'</td>';
    echo '<br>';
    echo '<td> <b> Prenom :</b> '.$patient['firstname'].'</td>';
    echo '<br>';
    echo '<td> <b> Date de naissance :</b> '.$patient['birthdate'].'</td>';
    echo '<br>';
    echo '<td> <b> Telephone :</b> '.$patient['phone'].'</td>';
    echo '<br>';
    echo '<td> <b> Email : </b> '.$patient['mail'].'</td>';
    echo "</tr>";

?>
<form action="/Exercice-PDO-2/patients/modification.php?id=<?=$_GET['id']?>" method="POST">
                <h4>Modifier profil</h4>
                
                <label><b>Nom</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="lastname" value="<?=$patient["lastname"]?>" required>

                <label><b>Prenom</b></label>
                <input type="text" placeholder="Entrer le mot de passe" name="firstname" value="<?=$patient["firstname"]?> "required>

                <label><b>Date de naissance</b></label>
                <input type="text" placeholder="Entrer le mot de passe" name="birthdate" value="<?=$birthdateFormatted?>" required>
              
                <label><b>phone</b></label>
                <input type="text" placeholder="Entrer le mot de passe" name="phone" value="<?=$patient["phone"]?>" required>

                <label><b>Email</b></label>
                <input type="text" placeholder="Entrer le mot de passe" name="mail" value="<?=$patient["mail"]?>" required>

                <input type="submit" id='submit' value='Valider ✅' >
        
            </form>


</body>
</html>