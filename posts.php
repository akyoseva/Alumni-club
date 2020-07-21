<?php
include 'includes/header.php';

$counter = 1;
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Creation time</th>
            <th scope="col">Author</th>
        </tr>
    </thead>
<tbody>
        <?php

        if (isset($_SESSION["username"])) {
            $stmt = $pdo->prepare('SELECT username, specialty, uni_group FROM users WHERE username = :username ');
            $stmt->execute(['username' => $_SESSION['username']]);
            $user = $stmt->fetch();
            $user_specialty = $user["specialty"];
            $user_uni_group = $user["uni_group"];

            // var_dump($user_uni_group);die();

            $data = $pdo->prepare("SELECT title, description, creation_time, user_id FROM posts
                         WHERE visibility = 0 
                         OR (visibility = 1 AND specialty = :specialty) 
                         OR (visibility = 2 AND uni_group = :uni_group)");
            $data->execute([
                'specialty' => $user_specialty,
                'uni_group' => $user_uni_group,
            ]);
        } else {
            $data = $pdo->query("SELECT title, description, creation_time, user_id FROM posts WHERE visibility = 0")->fetchAll();
        }   
        foreach ($data as $row) {
        ?>
            <tr>
                <th scope="row"><?php echo $counter++ ?></th>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['description'] ?></td>
                <td><?php echo $row['creation_time'] ?></td>
                <td><?php echo $row['user_id'] ?></td>
            </tr>
        <?php
        }

        ?>
    </tbody>
</table>

</div>
<?php
include 'includes/footer.php';