<?php

require_once('database.php');

$TeamID = $_GET['TeamID'];

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
        <th>Płeć</th>
        <th>Status</th>
    </tr>

<?php while($row = $result->fetch_assoc()): ?>
    <?php

    if ($row['TeamID'] !== null) {
        continue;
    };

    ?>
    <tr>
        <td><?= $row['FirstName'] ?></td>
        <td><?= $row['LastName'] ?></td>
        <td><?= $row['Gender'] ?></td>
        <td><?= $row['Status'] ?></td>
        <td><a href="logic/add_cont_to_team.php?ID=<?= $row['ID'] ?>&TeamID=<?= $TeamID ?>">Dodaj</a></td>
    </tr>
<?php endwhile ?>


</table>

</body>

<?php   

$conn->close();

?>

</html>