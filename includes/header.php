<?php
session_start();
include 'includes/db.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Алумни клуб</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <div class="container-fluid">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Alumni</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>

          <?php if (!isset($_SESSION["username"])) {         ?>

            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>

          <?php      }        ?>

          <?php if (isset($_SESSION["username"])) {          ?>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">Profile</a>
            </li>

          <?php          }          ?>

          <?php if (isset($_SESSION["username"])) {          ?>

            <li class="nav-item">
              <a class="nav-link" href="logout.php">Изход</a>
            </li>

          <?php          }          ?>


        </ul>

      </div>
    </nav>