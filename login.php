<?php
include 'includes/header.php';


if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $stmt = $pdo->prepare(
        'SELECT * FROM users WHERE username = :username AND password = :password'
    );
    $stmt->execute(array(
        'username' => $username,
        'password' => $password
    ));
    $user = $stmt->fetchALl();
    $count = $stmt->rowCount();
    if ($count > 0) {
        $_SESSION["username"] = $username;
        $_SESSION["id"] = $user[0]['id'];
        header("location:index.php");
    } else {
        $message = '<h3>Wrong Data</h3>';
    }
}
?>

<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="styles/login.css">
  <style>
      .bg-image {
        background-image: url('styles/images/connections_people.png');
        background-size: cover;
        background-position: center;
}
  </style>
</head>

<body>

<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Welcome to the Alumni club!</h3>
              <form id="account" method="post">
                <div class="form-label-group">
                  <input  type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                </div>

                <div class="form-label-group">
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" name="login" id="login-button" type="submit">Sign in</button>
               
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

<?php
include 'includes/footer.php';
