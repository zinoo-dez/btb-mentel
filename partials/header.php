<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTB Mentel</title>
    <link rel="shortcut icon" href="./Images/Logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/core.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark px-2 px-lg-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="./Images/Logo.png" width="60" alt=""></a>
                <button class="navbar-toggler text-bg-secondary" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list text-white py-4"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Mentel Health
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Depression</a></li>
                                <li><a class="dropdown-item" href="#">Anxiety</a></li>
                                <li><a class="dropdown-item" href="#">Bipolor</a></li>
                                <li><a class="dropdown-item" href="#">Adication </a></li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Doctor Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#article">Article</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact-us">Contact Us</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <a href="signin.php" class="btn btn-secondary text-white pt-3">SignIn</a>
                        <button class="btn btn-secondary dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                SignUp
                            </a>
                            <ul class="dropdown-menu mt-3" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="user-signup.php">Normal User</a></li>
                                <li><a class="dropdown-item" href="doctor-signup.php">Doctor</a></li>
                            </ul>
                        </button>
                        <a href="logout.php" class="btn btn-secondary text-white pt-3">Logout</a>
                    </ul>

                </div>
            </div>
        </nav>

    </header>