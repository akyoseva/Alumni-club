<?php
include 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Recent posts</title>
    <link href="css/blog-home.css" rel="stylesheet">
</head>

<body>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">Recent posts</h1>
                    <div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h2 class="card-title">Post Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                                <a href="#" class="btn btn-primary">Read More &rarr;</a>
                            </div>
                            <div class="card-footer text-muted">
                                Posted on January 1, 2020 by Krisaka
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

        <div class="col-md-4">
            <!-- Statistics -->
            <div class="card my-4">
                <h5 class="card-header">Statistics</h5>
                <div class="card-body">
                    <div>
                        In the group have 10 members
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
</body>
<?php
include 'includes/footer.php';
