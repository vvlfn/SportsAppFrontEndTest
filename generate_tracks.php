<?php 

session_start();

require_once('database.php');

$CompID = $_GET["CompID"];
$TeamIDs = $_SESSION['TeamIDs'];
$TrackNum = 1;
$TrackLimit = 5;
$Tour = 1;

$conn = connect($servername, $username, $password, $database);

$result = getTrackContenders($conn, $TeamIDs);

$CompName = getCompName($conn, $CompID);

$TracksExist = checkIfTrackDBExists($conn, $CompName);

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

    if ($Contenders > $TrackLimit && $Contenders % $TrackLimit < 3) {
        $UnevenLimit = $Contenders - (ceil($TrackLimit / 2));
    }

?>

<?php if (!$TracksExist): ?>

<?php createTrackDB($conn, $CompName); ?>

<?php foreach($result as $row): ?>
    <?php 

        if ($TrackNum > 5 || ($ContenderNum == ($UnevenLimit + 1))) {
            $TrackNum = 1;
            $Tour++;
        }

        $ContenderNum++;

    ?>

<?php addTrack($conn, $CompName, $TrackNum, $row['FirstName'], $row['LastName'], $row['Class'], $row['ID']) ?>

    <tr>
        <td>Tor:  <?= $TrackNum++ ?></td>
        <td><?= $row['FirstName'] ?></td>
        <td><?= $row['LastName'] ?></td>
        <td><?= $row['Class'] ?></td>
        <td>
        <form method="POST" action="./logic/add_score.php?ContenderID=<?= $row['ID'] ?>&CompID=<?= $CompID ?>&Tour=<?= $Tour ?>">
            <input type="text" placeholder="00:00:00" name="score">
            <input type="submit" value="OK">
        </form>
        </td>
    </tr>

<?php endforeach ?>

<?php else: ?>

<?php $result = getTrackContendersDB($conn, $CompName) ?>

<?php foreach($result as $row): ?>

<?php $scoreAdded = checkIfScorePresent($conn, $row['ID']) ?>

    <tr>
        <td>Tor: <?= $row['Track'] ?></td>
        <td><?= $row['FirstName'] ?></td>
        <td><?= $row['LastName'] ?></td>
        <td><?= $row['Class'] ?></td>
        <td>
        <form method="POST" action="./logic/add_score.php?ContenderID=<?= $row['ID'] ?>&CompID=<?= $CompID ?>&Tour=<?= $Tour ?>">
            <?php if ($scoreAdded): ?>
            <?php $score = getScore($conn, $row['ID']) ?>

            <input type="text" placeholder="00:00:00" name="score" value="<?= $score['Score'] ?>">
            <input type="submit" value="OK">

            <?php else: ?>

            <input type="text" placeholder="00:00:00" name="score">
            <input type="submit" value="OK">

            <?php endif ?>
        </form>
        </td>
    </tr>

<?php endforeach ?>

<?php endif ?>

</table>

<a href="logic/refresh_tracks.php?CompID=<?= $CompID ?>&CompName=<?= $CompName ?>">Odśwież</a>
    
</body>
</html>