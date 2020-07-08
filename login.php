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

<body>
    <div class="row card-body" style="margin-top:8%">
        <div class="col-md-12">
            <section class="col-md-12">
                <form id="account" method="post">
                    <h2>Welcome to Alumni-club</h2>
                    <hr />
                    <div class="form-group">
                        <label>Username</label>
                        <br>
                        <input type="text" name="username" class="input">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <br>
                        <input type="password" name="password" class="input">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="button" name="login" id="login-button">Login</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
    </div>
    </div>
</body>

<?php
include 'includes/footer.php';
