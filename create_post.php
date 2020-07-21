<?php
include 'includes/header.php';


if (isset($_POST['save'])) {
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $creation_time = new DateTime();

    var_dump(htmlspecialchars($_POST['visibility']));

    $stmt = $pdo->prepare("INSERT INTO posts (user_id,title, description, creation_time)
                        VALUES(:user_id, :title, :description, :creation_time) ");
    $stmt->execute([
        'user_id' => $_SESSION['id'],
        'title' => $title,
        'description' => $description,
        'creation_time' => $creation_time->format('Y-m-d H:i:s')
    ]);
    header("location:index.php");
}
?>

<div class="container">
    <div class="row">
        <div class="col-8 ">

            <form method="POST">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control" id="tite">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="6" cols="97" name="description" id="description"></textarea>
                </div>
                <button type="submit" name="save" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php
include 'includes/footer.php';
