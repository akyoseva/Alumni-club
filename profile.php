<?php
include 'includes/header.php';
if (!$_SESSION['username']) {
  header("location:login.php");
}
$stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username ');
$stmt->execute(['username' => $_SESSION['username']]);
$user = $stmt->fetch();
$coordinates = unpack('x/x/x/x/corder/Ltype/dlat/dlon', $user['location']);

if (isset($_POST['save'])) {
  $username = htmlspecialchars($_SESSION['username']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $first_name = htmlspecialchars($_POST['first_name']);
  $last_name = htmlspecialchars($_POST['last_name']);
  //Point(10.2045 34.2379)
  $location = htmlspecialchars($_POST['location']);
  $speciality = htmlspecialchars($_POST['speciality']);
  $group = htmlspecialchars($_POST['group']);
  $graduation = htmlspecialchars($_POST['graduation']);
  $visibility = htmlspecialchars($_POST['visibility']);

  var_dump(htmlspecialchars($_POST['visibility']));

  $stmt = $pdo->prepare("UPDATE users
                        SET email = :email,
                          last_name =:last_name,
                          first_name = :first_name,
                          uni_group = :group,
                          password = :password,
                          graduation = :graduation,
                          speciality= :speciality,
                          visibility= :visibility
                          -- location= Point(:location)
                          
                        WHERE username = :username ");
  $stmt->execute([
    'username' => $username,
    'email' => $email,
    'password' => $password,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'graduation' => $graduation,
    'group' => $group,
    'speciality' => $speciality,
    'visibility' => $visibility,
    // 'location' => $location
  ]);

  header("location:profile.php");
}
?>

<div class="container">
  <div class="card border-0 shadow my-11">
    <div class="row">
      <div class="col-11 card-body p-5 amber-text">
      <h3 style="text-align:center">Personal information</h3>
        <form method="POST">
          <div class="form-group">
            <label for="email">Email address</label>
            <input name="email" value="<?php echo $user['email']; ?>" type="email" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" id="password">
          </div>
          <div class="form-group">
            <label for="first_name">First name</label>
            <input name="first_name" value="<?php echo $user['first_name']; ?>" type="text" class="form-control" id="first_name">
          </div>
          <div class="form-group">
            <label for="last_name">Last name</label>
            <input name="last_name" value="<?php echo $user['last_name']; ?>" type="text" class="form-control" id="last_name">
          </div>
          <!-- TODO location -->
          <div class="form-group">
            <label for="location">Location</label>
            <input name="location" value="<?php echo $coordinates['lat'] . ', ' . $coordinates['lon']; ?>" type="text" class="form-control" id="location">
          </div>
          <div class="form-group">
            <label for="speciality">Speciality</label>
            <input name="speciality" type="text" value="<?php echo $user['speciality']; ?>" class="form-control" id="speciality">
          </div>
          <div class="form-group">
            <label for="group">Group</label>
            <input name="group" type="number" min="1" max="8" value="<?php echo $user['uni_group']; ?>" class="form-control" id="group">
          </div>
          <div class="form-group">
            <label for="graduation">Graduation</label>
            <input name="graduation" type="year" value="<?php echo $user['graduation']; ?>" class="form-control" id="graduation">
          </div>
          <div class="form-group">
            <label for="visibility">Visibility</label>
            <select name="visibility" class="form-control my-0 py-1 amber-border">
              <option <?php if ($user['visibility'] == 0) echo 'selected'; ?> value="0">Public for everyone</option>
              <option <?php if ($user['visibility'] == 1) echo 'selected'; ?> value="1">Public for student of my speciality</option>
              <option <?php if ($user['visibility'] == 2) echo 'selected'; ?> value="2">Public for student of my group</option>
              <option <?php if ($user['visibility'] == 3) echo 'selected'; ?> value="3">Private</option>
            </select>
          </div>
          <button type="submit" name="save" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
include 'includes/footer.php';