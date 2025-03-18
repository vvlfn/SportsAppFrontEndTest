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
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark px-3">
        <a class="navbar-brand" href="index.php">Zawody pływania</a>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contenders.php">Zawodnicy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="teams.php">Drużyny</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="competitions.php">Zawody</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <a name="Contender Creation" class="btn btn-warning mx-auto d-block w-25 my-4 btn-lg"
            href="form/create_contender_form.php" role="button">Stwórz
            zawodnika</a>
        <!-- <a href="form/create_contender_form.php">Stwórz Zawodnika</a> -->

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-light align-middle">
                <thead class="table-dark">
                    <caption>
                        Zawodnicy
                    </caption>
                    <tr>
                        <th>#</th>
                        <th>Imie</th>
                        <th>Nazwisko</th>
                        <th>Klasa</th>
                        <th>Płeć</th>
                        <th>Status</th>
                        <th>Drużyna</th>
                        <th>Akcja</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- czemu tutaj daje 1,2.... nad tabelą xdd
                     zjebałem coś -->
                    <?php $i = 1;
                    while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <th class="scope-row"><?= $i ?></th>
                            <td><?= $row['FirstName'] ?></td>
                            <td><?= $row['LastName'] ?></td>
                            <td><?= $row['Class'] ?></td>
                            <td><?= $g = $row['Gender'] == "M" ? "Mężczyzna" : "Kobieta" ?></td>
                            <td><?= $st = $row['Status'] == "C" ? "Cywil" : "Wojskowy" ?></td>
                            <td><?= getTeamName($conn, $row['TeamID']) ?></td>
                            <td><a class="text-danger" style="font-weight: bolder !important"
                                    href="logic/delete_contender.php?ID=<?= $row['ID'] ?>">Usuń</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endwhile ?>
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>


        <table>
            <tr>

            </tr>




        </table>

    </div>
</body>

<?php

$conn->close();

?>

</html>