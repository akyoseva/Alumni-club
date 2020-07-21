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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Alumni Club</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">

        <?php if (isset($_SESSION["username"])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="create_post.php">Create post</a>
          </li>

        <?php } ?>

        <?php if (isset($_SESSION["username"])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
          </li>

        <?php } ?>

        <li class="nav-item">
          <a class="nav-link" href="users.php">Users</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="posts.php">Posts</a>
        </li>

        <?php if (!isset($_SESSION["username"])) { ?>

          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>

        <?php } ?>

        <?php if (isset($_SESSION["username"])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>

        <?php } ?>

      </ul>
  </nav>
</body>
<?php
