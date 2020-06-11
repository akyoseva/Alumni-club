<?php
include 'includes/header.php';

$data = $pdo->query("SELECT first_name, last_name FROM users")->fetchAll();
// and somewhere later:
foreach ($data as $row) {
    echo $row['first_name']." ".$row['last_name']."<br />\n";
}
?>