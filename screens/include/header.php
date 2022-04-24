<?php 
    include "../assets/config/database.php"
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="../assets/css/style.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <title>Project</title>
</head>

<body>

    <!-- Navbar -->
    <div class="navbar navbar-expand-md bg-dark navbar-dark text-light">
        <div class="container ">
            <a href="#" class="navbar-brand">Students System</a>

            <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainMenu">
                <ul class="navbar-nav ms-auto">

                    <?php
                    session_start();
                    if ($_SESSION["email"] == "admin@email.com") {
                        echo '<li class="nav-item"><a href="./admin.php" class="nav-link">Admin Panel</a></li>';
                        echo '<li class="nav-item"><a href="./messages.php" class="nav-link">Messages</a></li>';
                    } else {
                        echo '<li class="nav-item"><a href="./index.php" class="nav-link">Main Panel</a></li>';
                        echo '<li class="nav-item"><a href="./contactUs.php" class="nav-link">Contact Us</a></li>';
                    }
                    ?>

                    <li class="nav-item"><a href="./logout.php" class="nav-link">Log Out</a></li>
                </ul>
            </div>

        </div>
    </div>