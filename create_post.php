<?php
include 'includes/header.php';


if (isset($_POST['save'])) {
    $message = htmlspecialchars($_POST['message']);
    $title = htmlspecialchars($_POST['title']);
    $visibility = htmlspecialchars($_POST['visibility']);
    $created = new DateTime();

    var_dump(htmlspecialchars($_POST['visibility']));

    $stmt = $pdo->prepare("INSERT INTO messages (title, message, visibility, created, user_id)
                        VALUES( :title, :message, :visibility, :created, :user_id) ");
    $stmt->execute([
        'title' => $title,
        'message' => $message,
        'visibility' => $visibility,
        'created' => $created->format('Y-m-d H:i:s'),
        'user_id' => $_SESSION['id']
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
                    <textarea rows="6" cols="101" name="message" id="message"></textarea>
                </div>
                <div class="form-group">
                    <label for="visibility">Visibility</label>
                    <select name="visibility" class="form-control my-0 py-1 amber-border">
                        <option value="0">Public for everyone</option>
                        <option value="1">Public for student of my speciality</option>
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
