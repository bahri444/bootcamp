<?php
    session_start();
    include "../host/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css"><link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title></title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-warning">
    <div class="container-fluid">
        <a class="navbar-brand" href="../home/index.php">Bootacamp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php if (isset($_SESSION['login'])) : ?>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../home/index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="../user/user.php">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../user/logout.php">Keluar</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../home/index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="../user/login.php">Login</a>
                </li>
            <?php endif; ?>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
</nav>
<br>