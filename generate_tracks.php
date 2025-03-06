<?php 

session_start();

require_once('database.php');

$CompID = $_GET["CompID"];
$TeamIDs = $_SESSION['TeamIDs'];
$TrackNum = 1;
$TrackLimit = 5;

$conn = connect($servername, $username, $password, $database);

$result = getTrackContenders($conn, $TeamIDs);
$Contenders = count($result);
$ContenderNum = 1;

$UnevenLimit = 0;

shuffle($result);

?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<a href="show_competition.php?CompID=<?= $CompID ?>">Wróć</a>

<table>

<?php   

    if ($Contenders % $TrackLimit < 3) {
        $UnevenLimit = $Contenders - (ceil($TrackLimit / 2));
    }


?>

<?php foreach($result as $row): ?>
    <?php 
        
        $ContenderNum++;
        
        if ($TrackNum > 5) {
            $TrackNum = 1;
        }

    ?>
    <tr>
        <td>Tor:  <?= $TrackNum++ ?></td>
        <td><?= $row['FirstName'] ?></td>
        <td><?= $row['LastName'] ?></td>
        <td><?= $row['Class'] ?></td>
    </tr>
<?php endforeach ?>

</table>
    
</body>
</html>