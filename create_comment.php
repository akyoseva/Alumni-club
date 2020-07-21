<?php
include 'includes/header.php';

if (isset($_POST['save'])) {
    $text = htmlspecialchars($_POST['text']);
    $creation_time = new DateTime();

    $stmt = $pdo->prepare("INSERT INTO comments (text, user_id, post_id, creation_time)
                        VALUES(:text,:user_id, :post_id, :creation_time) ");
    var_dump($_SESSION['post_id']);die();


    $stmt->execute([
        'text' => $text,
        'user_id' => $_SESSION['id'],
        'post_id' => $_GET['post_id'],
        'creation_time' => $creation_time->format('Y-m-d H:i:s')
    ]);
    header("location:posts.php");
}
?>

<div class="container">
    <div class="row">
        <div class="col-8 ">

            <form method="POST">
                <div class="form-group">
                    <label for="text">Text</label>
                    <textarea rows="6" cols="97" name="text" id="text"></textarea>
                </div>
                <button type="submit" name="save" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php
include 'includes/footer.php';
