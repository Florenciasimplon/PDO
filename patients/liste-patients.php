<?php
require_once(__DIR__."/../pdo.php");


$count = (int)$pdo->query('SELECT count(id) FROM patients')->fetch(PDO ::FETCH_NUM)[0];
$perPage= 5;
$max = 0;
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
    $max = $perPage * intval($_GET['page']);
}
$pages = ceil($count / intval($perPage) -1);
if ($currentPage > $pages) {
    throw new Exception('Cette page n\'existe pas');
}
$sql1= 'SELECT * FROM patients LIMIT '.$max.', '.$perPage;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste 🩹</title>
</head>
<body>

<?php if (!empty($_GET["message"])) : ?>
        <div style="padding: 10px;background:gray;color:#fff;">
            <?=$_GET["message"]?>
        </div>
    <?php endif;?>

<table border="1">
   <thead>
        <tr>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Date de naissance</td>
            <td>📞</td>
            <td>📧</td>
            <td>Modifier</td>
            <td>Supprimer</td>
        </tr>
   </thead>
<tbody>
   <?php 
        foreach ($pdo->query($sql1)as $patients){
            echo"<tr>";
            echo '<td>'.$patients['lastname'].'</td>';
            echo '<td>'.$patients['firstname'].'</td>';
            echo '<td>'.$patients['birthdate'].'</td>';
            echo '<td>'.$patients['phone'].'</td>';
            echo '<td>'.$patients['mail'].'</td>';
            echo '<td><a href="profil-patient.php?id='.$patients['id'].'">👁‍🗨</a>"'.'</td>';
            echo '<td><a href="process/delete.php?id='.$patients['id'].'">❌</a>"'.'</td>';
            echo "</tr>";
   }
   ?>
</tbody>
</table>
<br>
    <a href="./ajout-patient.php">créer nouveau patient🩹</a><br>
<form action="" method="post">
    <label for="site-search">Recherche patients</label>
<input type="search" id="site-search" name="search">
<input type="submit" id="site-search" name="rechercher">
</form>
<?php
if (isset($_POST["search"])) {
    $insertStatement = $pdo->prepare(
        'SELECT * 
        FROM patients
        WHERE lastname
        LIKE ?
        OR firstname
        Like ?
        LIMIT 10'
    );
    $insertStatement->execute([
        '%'.$_POST['search'].'%',
        '%'.$_POST['search'].'%'
    ]);

    $result = $insertStatement->fetch(PDO::FETCH_ASSOC);
    ?>
    <table border="1">
   <thead>
        <tr>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Date de naissance</td>
            <td>phone</td>
            <td>mail</td>
            <td>Modifier</td>
            <td>Supprimer</td>
        </tr>
   </thead>
<tbody>
   <?php 
            echo"<tr>";
            echo '<td>'.$result['lastname'].'</td>';
            echo '<td>'.$result['firstname'].'</td>';
            echo '<td>'.$result['birthdate'].'</td>';
            echo '<td>'.$result['phone'].'</td>';
            echo '<td>'.$result['mail'].'</td>';
            echo '<td><a href="profil-patient.php?id='.$result['id'].'">👁‍🗨</a>"'.'</td>';
            echo '<td><a href="process/delete.php?id='.$result['id'].'">❌</a>"'.'</td>';
            echo "</tr>";
   ?>
</tbody>
</table>
<?php } ?>

<div class = "d-flex.justify-content-between my-4">
<?php if ($currentPage != 0): ?>
    <a href="?page=<?= $currentPage -1?>" class="btn btn-primary">&laquo; page précédente</a>
    
<?php endif ?>
<?php if ($currentPage < $pages): ?>
    <a href="?page=<?= $currentPage +1?>" class="btn btn-primary"> page suivante >></a>
    
<?php endif ?>
</div>
</body>
</html>