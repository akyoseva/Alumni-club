<?php
include 'includes/header.php';


if (isset($_POST['save'])) {
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $visibility = htmlspecialchars($_POST['visibility']);
    $creation_time = new DateTime();

    var_dump(htmlspecialchars($_POST['visibility']));

    $stmt = $pdo->prepare("INSERT INTO posts (user_id,title, description, visibility, creation_time)
                        VALUES(:user_id, :title, :description, :visibility, :creation_time) ");
    $stmt->execute([
        'user_id' => $_SESSION['id'],
        'title' => $title,
        'description' => $description,
        'visibility' => $visibility,
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
                <div class="form-group">
                    <label for="visibility">Visibility</label>
                    <select name="visibility" class="form-control my-0 py-1 amber-border">
                        <option value="0">Public for everyone</option>
                        <option value="1">Public for student of my specialty</option>
                        <option value="2">Public for student of my group</option>
                        <option value="3">Private</option>
                    </select>
                </div>
                <button type="submit" name="save" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php
include 'includes/footer.php';
