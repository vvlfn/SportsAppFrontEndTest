<?php

require_once('database.php');

$conn = connect($servername, $username, $password, $database);

$result = getAllCompetitions($conn);


?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zawodnicy</title>
</head>
<body>

<a href="index.php">Wróć</a>

<table>
    <tr>
        <th>Nazwa Zawodów</th>
    </tr>

<?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['Name'] ?></td>
        <td><a href="show_competition.php?CompID=<?= $row['ID'] ?>">Pokaż</a></td>
        <td><a href="logic/delete_competition.php?ID=<?= $row['ID'] ?>">Usuń</a></td>
    </tr>
<?php endwhile ?>


</table>
    
<a href="form/create_competition_form.php">Stwórz Zawody</a>

</body>

<?php   

$conn->close();

?>

</html>