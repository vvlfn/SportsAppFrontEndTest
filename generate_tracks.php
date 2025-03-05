<?php 

session_start();

require_once('database.php');

$TeamIDs = $_SESSION['TeamIDs'];
$TrackNum = 1;
$TrackLimit = 5;

$conn = connect($servername, $username, $password, $database);

$result = getTrackContenders($conn, $TeamIDs);

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

<table>

<?php foreach($result as $row): ?>

<?php   
    if ($TrackNum > $TrackLimit) $TrackNum = 1;    
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