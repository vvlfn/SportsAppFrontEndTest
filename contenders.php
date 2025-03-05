<?php

require_once('database.php');

$conn = connect($servername, $username, $password, $database);

$result = getAllContenders($conn);


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
        <th>Imie</th>
        <th>Nazwisko</th>
        <th>Klasa</th>
        <th>Płeć</th>
        <th>Status</th>
        <th>Drużyna</th>
    </tr>

<?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['FirstName'] ?></td>
        <td><?= $row['LastName'] ?></td>
        <td><?= $row['Class'] ?></td>
        <td><?= $row['Gender'] ?></td>
        <td><?= $row['Status'] ?></td>
        <td><?= getTeamName($conn, $row['TeamID']) ?></td>
        <td><a href="logic/delete_contender.php?ID=<?= $row['ID'] ?>">Usuń</a></td>
    </tr>
<?php endwhile ?>


</table>
    
<a href="form/create_contender_form.php">Stwórz Zawodnika</a>

</body>

<?php   

$conn->close();

?>

</html>