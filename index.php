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
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#" aria-current="page">Home <span
                            class="visually-hidden">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Action 1</a>
                        <a class="dropdown-item" href="#">Action 2</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <div class="p-4 mb-4 bg-light rounded-3">
        <div class="row">
            <div class="col">

                <h1 class="display-5 fw-bold">Aplikacja do zawodów pływania</h1>
                <p class="col-md-8 fs-4">
                    Using a series of utilities, you can create this jumbotron, just
                    like the one in previous versions of Bootstrap. Check out the
                    examples below for how you can remix and restyle it to your liking.
                </p>
            </div>
            <div class="col">
                <img src="img/logo.png" class="img-fluid rounded-top d-block m-auto" alt="" />
            </div>
            <div class="col">
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