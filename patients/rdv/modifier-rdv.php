<?php
require_once("../../pdo.php");

$selectPatientsStatement = $pdo->prepare("SELECT * FROM patients");
$selectPatientsStatement->execute();


$selectStatement = $pdo->prepare('SELECT * FROM appointments WHERE id=?');
$selectStatement->execute([
    $_GET['id']
]);

$appointments = $selectStatement->fetch();

$dateTimeParts = explode(" ",$appointments["dateHour"]);
$date = $dateTimeParts[0];
$time = $dateTimeParts[1];
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
    <form method="POST" action="./update.php?id=<?=$appointments["id"]?>">
            <h1>Modifier RDV</h1>

                <div class="input-field">
                Patient 
                    <select class="select" name="idPatients" style="display:block;">
                        <option></option>
                        <?php foreach($selectPatientsStatement->fetchAll()as $patient){ 
                            $selected = "";
                            if ($patient["id"]=== $appointments["idPatients"]) {
                                $selected ="selected";
                            }
                            else {
                                $selected = "";
                            }
                            ?>
                            <option value="<?=$patient["id"]?>" <?=$selected?>>
                            <?=$patient["firstname"]?> <?=$patient["lastname"]?>
                            </option>
                        <?php } ?>
                    </select>
                       
            </div>
            
            <input type="date" name="date" value="<?=$date?>"><br>
            <input type="time" name="time" value="<?=$time?>">

            <button class="btn waves-effect waves-light red" type="submit" name="action">
                Valider modification rdv 🏥 <i class="material-icons right">send</i>
            </button>
    </form>
</body>
</html>