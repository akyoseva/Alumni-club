<?php
include 'includes/header.php';

$counter = 1;
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Comment</th>
            <th scope="col">Author</th>
            <th scope="col">Creation time</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($_SESSION["username"])) {
            $stmt = $pdo->prepare('SELECT comments.*, username FROM comments JOIN users ON comments.user_id = users.id WHERE post_id = :id ');
            $stmt->execute(['id' => $_GET['id']]);
            $data = $stmt->fetchAll();
           // var_dump($data);die();
            foreach ($data as $row) {
        ?>

                <tr>
                    <td scope="row"><?php echo $counter++ ?></td>
                    <td>
                        <?php echo $row['text'] ?>
                    </td>
                    <td>
                        <?php echo $row['username'] ?>
                    </td>
                    <td>
                        <?php echo $row['creation_time'] ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        <?php
        }
        ?>

    </tbody>
</table>

</div>

<?php
include 'includes/footer.php';
