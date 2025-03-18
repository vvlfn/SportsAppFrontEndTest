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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="p-4 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Aplikacja do zawodów pływania</h1>
            <p class="col-md-8 fs-4">
                Using a series of utilities, you can create this jumbotron, just
                like the one in previous versions of Bootstrap. Check out the
                examples below for how you can remix and restyle it to your liking.
            </p>
            <!-- <button class="btn btn-primary btn-lg" type="button">
                Example button
            </button> -->

        </div>
    </div>

    <nav class="navbar navbar-expand navbar-light bg-light">
        <ul class="nav navbar-nav">
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php" aria-current="page">Powrót<span
                        class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contenders.php">Zawodnicy</a>
            <li class="nav-item">
                <a class="nav-link" href="teams.php">Drużyny</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="competitions.php">Zawody</a>
            </li>
        </ul>
    </nav>

    <table>
        <tr>
            <th>Imie</th>
            <th>Nazwisko</th>
            <th>Klasa</th>
            <th>Płeć</th>
            <th>Status</th>
            <th>Drużyna</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
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