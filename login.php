<?php
$name = htmlspecialchars($_POST["name"]);
$pass = htmlspecialchars($_POST["password"]);


$conn = new PDO('mysql:host=localhost;dbname=alumni_club;charset=utf8', 'root', '');

$stmt = $conn->prepare("SELECT `username`, `password` FROM `users` where (username = :name AND password = :password");
$stmt->execute(['name' => $name, 'pass' => $pass]);

var_dump($stmt);

