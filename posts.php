<?php
include 'includes/header.php';


$stmt = $pdo->query('SELECT posts.* , users.username FROM posts INNER JOIN users ON users.id = posts.user_id ORDER BY posts.creation_time DESC  ');
$posts = $stmt->fetchAll();
$numberOfPosts = count($posts);
$counter = 0;


$stmt2 = $pdo->query('SELECT count(id) as count FROM users');
$numberUsers = $stmt2->fetchAll()[0]['count'];
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">
            <h1 class="text-center">Recent posts</h1>
        </div>
    </div>
    <?php
    foreach ($posts as $post) {

    ?>
        <div class="row">
            <div class="col-8">
                <div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $post['title'] ?></h2>
                            <p class="card-text"><?php echo $post['description']  ?></p>
                            <a href="#" class="btn btn-primary">Read comments &rarr;</a>
                            <a href="#" class="btn btn-primary">Create comments &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on <?php echo $post['creation_time'] ?> by <?php echo $post['username']  ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if ($counter == 0) {
            ?>
                <div class="col-md-4">
                    <!-- Statistics -->
                    <div class="card my-4">
                        <h5 class="card-header">Statistics</h5>
                        <div class="card-body">
                            <div>
                                There are <?php echo $numberUsers ?> members the group
                            </div>
                            <div>
                                There are <?php echo $numberOfPosts ?> posts the group
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            $counter++;
            ?>
        </div>
    <?php } ?>
    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
        </li>
    </ul>
</div>

<?php
include 'includes/footer.php';