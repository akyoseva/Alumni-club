<?php
<<<<<<< HEAD
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

    $count = $stmt->rowCount();
    if ($count > 0) {
        $_SESSION["username"] = $username;  
        header("location:index.php");  
    } else {  
        $message = '<h3>Wrong Data</h3>';  
    } 
}
?>
<div id="login">
    <h2>Вход</h2>
    <form method="POST">
    <input type="text" name="username" placeholder="Потребителско име" class="input">
    <input type="password" name="password" placeholder="Парола" class="input">
    <button type="submit" class="button" name="login" id="login-button">Влез</button>
    </form>
</div>

<?php
include 'includes/footer.php';
=======
$name = htmlspecialchars($_POST["name"]);
$pass = htmlspecialchars($_POST["password"]);


$conn = new PDO('mysql:host=localhost;dbname=alumni_club;charset=utf8', 'root', '');

$stmt = $conn->prepare("SELECT `username`, `password` FROM `users` where (username = :name AND password = :password");
$stmt->execute(['name' => $name, 'pass' => $pass]);

var_dump($stmt);

>>>>>>> 1da1810f5d99f4f2b461b31c73db769b63b33e55
