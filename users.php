<?php
include 'includes/header.php';

//when no user loged in
$data = $pdo->query("SELECT first_name, last_name , visibility FROM users WHERE visibility = 0")->fetchAll();
// and somewhere later:

foreach ($data as $row) {
    echo $row['first_name'] . " " . $row['last_name'] . "<br />\n";
}
if (isset($_SESSION["username"])) {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username ');
    $stmt->execute(['username' => $_SESSION['username']]);
    $user = $stmt->fetch();
    $user_speciality = $user["speciality"];
    $user_uni_group = $user["uni_group"];

    // var_dump($user_uni_group);die();

    $data = $pdo->query("SELECT first_name, last_name, uni_group, speciality FROM users WHERE (visibility = 1 AND speciality = '$user_speciality') 
                                                                                            OR (visibility = 2 AND uni_group = '$user_uni_group')")->fetchAll();

    foreach ($data as $row) {
        echo $row['first_name'] . " " . $row['last_name'] . "<br />\n";
    }
}
?>

<div class="col-md-4">
    <!-- Users -->
    <div class="card my-4">
        <h5 class="card-header">Users</h5>
        <div class="card-body">

        </div>
    </div>
</div>

</div>