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

$patientsStatement = $pdo->prepare("SELECT * FROM patients");
$patientsStatement->execute();

$patients = $patientsStatement->fetchAll();

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
<form action="insertrdv.php" method="POST">
        <h1>Rendez-vous</h1>

        <div class="input-field">
            Patient 
            <select class="select" name="idPatients" style="display:block;">
                <option></option>
                <?php foreach($patients as $patient) : ?>
                    <option value="<?=$patient["id"]?>"><?=$patient["firstname"]?> <?=$patient["lastname"]?></option>
                <?php endforeach; ?>  
            </select>
        </div>
        
        <input type="date" name="date">
        <input type="time" name="time">

        <button class="btn waves-effect waves-light red" type="submit" name="action">Valider RDV 🏥 <i class="material-icons right">send</i>
  </button>
</form>
</body>
</html>