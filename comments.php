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
            $stmt = $pdo->prepare('SELECT * FROM comments WHERE post_id = :id ');
            $stmt->execute(['id' => $_GET['id']]);
            $data = $stmt->fetch();
    foreach ($data as $row) {
        ?>
    
        <tr>
            <th scope="row"><?php echo $counter++ ?></th>
            <td>
                <?php echo $row['text'] ?>
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
