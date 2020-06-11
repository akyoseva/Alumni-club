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

  $stmt = $pdo->prepare("UPDATE users
                        SET email = :email,
                          last_name =:last_name,
                          first_name = :first_name,
                          uni_group = :group,
                          password = :password,
                          graduation = :graduation,
                          speciality= :speciality
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
    // 'location' => $location
  ]);
  // var_dump($stmt->errorInfo());die();
  header("location:profile.php");
}
?>

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

  <button type="submit" name="save" class="btn btn-primary">Submit</button>


</form>