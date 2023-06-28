<?php
session_start();
include_once("inc/inc_koneksi.php");
include_once("inc/inc_fungsi.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eunoia</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="home.php">EUNOIA</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="home.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="innovation.php">Innovation</a></li>
                    <li><a class="nav-link scrollto" href="partner.php">Partner</a></li>
                    <li><a href="contact.php" class="contact-us scrollto">Contact Us</a></li>
                </ul>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->