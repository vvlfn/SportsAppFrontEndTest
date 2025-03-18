<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsApp</title>
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


    <div class="p-4 mb-4 bg-light rounded-3">
        <div class="row d-flex justify-content-between">
            <div class="col-2">
                <img src="img/logo.png" class="img-fluid rounded-top d-block m-auto h-100" alt="" />
            </div>
            <div class="col-6">
                <h1 class="display-5 fw-bold text-center">Aplikacja do zawodów pływania</h1>
                <p class="col-md-8 fs-4 text-center d-block mx-auto">Lorem ipsum dolor sit amet consectetur
                    adipisicing elit.Cupiditate, odio reiciendis aperiam quisquam nihil accusantium pariatur deserunt,
                    error laudantium iure ratione fugiat perspiciatis expedita vitae?</p>
            </div>

            <div class="col-3">
                <!-- Hover added -->
                <!-- Hover added -->

                <div class="list-group">
                    <a href="contenders.php"
                        class="list-group-item list-group-item-action flex-column align-items-start"
                        aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Zawodnicy</h5>
                            <!-- <small class="text-muted"></small> -->
                        </div>
                        <p class="mb-1">Dodawanie, usuwanie, zarządzanie zawodnikami</p>
                        <!-- <small class="text-muted">paragraph footer</small> -->
                    </a>
                    <a href="teams.php" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Drużyny</h5>
                            <!-- <small class="text-muted">Description</small> -->
                        </div>
                        <p class="mb-1">Dodawanie, usuwanie, zarządzanie drużyn</p>
                        <!-- <small class="text-muted">paragraph footer</small> -->
                    </a>
                    <a href="competitions.php"
                        class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Zawody</h5>
                            <!-- <small class="text-muted">Description</small> -->
                        </div>
                        <p class="mb-1">Dodawanie, usuwanie, zarządzanie zawodów</p>
                        <!-- <small class="text-muted">paragraph footer</small> -->
                    </a>
                </div>

            </div>

        </div>
    </div>


</body>

</html>