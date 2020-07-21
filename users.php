<?php
include 'includes/header.php';

$counter = 1;
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Specialty</th>
            <th scope="col">Group</th>
        </tr>
    </thead>
    <tbody>
        <?php

        if (isset($_SESSION["username"])) {
            $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username ');
            $stmt->execute(['username' => $_SESSION['username']]);
            $user = $stmt->fetch();
            $user_specialty = $user["specialty"];
            $user_uni_group = $user["uni_group"];

            // var_dump($user_uni_group);die();

            $data = $pdo->prepare("SELECT username, first_name, last_name, uni_group, specialty FROM users
                         WHERE visibility = 0 
                         OR (visibility = 1 AND specialty = :specialty) 
                         OR (visibility = 2 AND uni_group = :uni_group)");
            $data->execute([
                'specialty' => $user_specialty,
                'uni_group' => $user_uni_group,
            ]);
        } else {
            $data = $pdo->query("SELECT username, first_name, last_name, uni_group, specialty FROM users WHERE visibility = 0")->fetchAll();
        }   
        foreach ($data as $row) {
        ?>
            <tr>
                <th scope="row"><?php echo $counter++ ?></th>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['specialty'] ?></td>
                <td><?php echo $row['uni_group'] ?></td>
            </tr>
        <?php
        }

        ?>
    </tbody>
</table>

</div>
<?php
include 'includes/footer.php';