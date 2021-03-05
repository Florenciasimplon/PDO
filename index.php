<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (!empty($_GET["message"])) : ?>
        <div style="padding: 10px;background:gray;color:#fff;">
            <?=$_GET["message"]?>
        </div>
    <?php endif;?>
    
<a href="patients/ajout-patient.php">Formulaire 👤</a>
<a href="patients/liste-patients.php">Liste des patients 👤</a>
</body>
</html>
