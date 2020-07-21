<?php
include 'includes/header.php';
if (!$_SESSION['username']) {
  header("location:login.php");
}

$stmt = $pdo->prepare('SELECT * FROM users INNER JOIN visibility ON id = v_user_id WHERE id = :id');
$stmt->execute(['id' => $_SESSION['id']]);
$user = $stmt->fetch();
//var_dump($user['v_user_id']);
//$coordinates = unpack('x/x/x/x/corder/Ltype/dlat/dlon', $user['location']);
//var_dump($user);die();

if (isset($_POST['save'])) {
  $user_id = htmlspecialchars($user['id']);
  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $first_name = htmlspecialchars($_POST['first_name']);
  $last_name = htmlspecialchars($_POST['last_name']);
  //Point(10.2045 34.2379)
  //$location = htmlspecialchars($_POST['location']);
  $specialty = htmlspecialchars($_POST['specialty']);
  $group = htmlspecialchars($_POST['group']);
  $graduation = htmlspecialchars($_POST['graduation']);
 // var_dump($username);die();

  $v_username = htmlspecialchars($_POST['v_username']);
  $v_email = htmlspecialchars($_POST['v_email']);
  $v_first_name = htmlspecialchars($_POST['v_first_name']);
  $v_last_name = htmlspecialchars($_POST['v_last_name']);
  //vis_Point(10.2045 34vis_.2379)
  //vis_$location = htmlspecialchars($vis__POST['location']);
  $v_specialty = htmlspecialchars($_POST['v_specialty']);
  $v_group = htmlspecialchars($_POST['v_group']);
  $v_graduation = htmlspecialchars($_POST['v_graduation']);
   

//  var_dump($email);die();

  $stmt = $pdo->prepare("UPDATE users
                        SET email = :email,
                          last_name =:last_name,
                          first_name = :first_name,
                          uni_group = :group,
                          username = :username,
                         -- password = :password,
                          graduation = :graduation,
                          specialty= :specialty
                          -- location= Point(:location)                
                        WHERE id = :id");
  $stmt->execute([
    'id' => $user_id,
    'email' => $email,
//    'password' => $password,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'graduation' => $graduation,
    'group' => $group,
    'specialty' => $specialty,
    'username' => $username
    // 'location' => $location
  ]);

//print_r($stmt->errorInfo()); die();

                         
  $stmt = $pdo->prepare("UPDATE visibility 
                          SET v_email = :email,
                             v_last_name = :last_name,
                             v_first_name = :first_name,
                             v_uni_group = :group,
                             v_graduation = :graduation,
                             v_specialty = :specialty,
                             v_username = :username
                         -- location= Point(:location)
                          
                        WHERE v_user_id = :id ");
  $stmt->execute([
    'id' => $user['v_user_id'],
    'email' => $v_email,
    'first_name' => $v_first_name,
    'last_name' => $v_last_name,
    'graduation' => $v_graduation,
    'group' => $v_group,
    'specialty' => $v_specialty,
    'username' => $v_username,
    // 'location' => $location
  ]);
  //var_dump($v_email);
  //var_dump($v_first_name);
  //var_dump($v_last_name);
  //var_dump($v_graduation);
  //var_dump($v_group);
  //var_dump($v_specialty);
  //var_dump($v_username);die();
  //var_dump($v_username);
  //var_dump($user['id']);die();

  header("location:profile.php");
}
?>

<div class="container">
  <div class="card border-0 shadow my-11">
    <h3 style="text-align:center">Persoal information</h3>
    <div class="row">
      <div class="col-md-12 card-body p-5 amber-text">
        <form method="POST">
          <div class="form-group">
            <label for="username">username</label>
            <input name="username" value="<?php echo $user['username']; ?>" type="text" class="form-control" id="username">
            <select name="v_username" class="form-control my-0 py-1 amber-border">
              <option <?php if ($user['v_username'] == 0) echo 'selected'; ?> value="0">public for everyone</option>
              <option <?php if ($user['v_username'] == 1) echo 'selected'; ?> value="1">public for student of my specialty</option>
              <option <?php if ($user['v_username'] == 2) echo 'selected'; ?> value="2">public for student of my group</option>
              <option <?php if ($user['v_username'] == 3) echo 'selected'; ?> value="3">private</option>
            </select>
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input name="email" value="<?php echo $user['email']; ?>" type="email" class="form-control" id="email">
            <select name="v_email" class="form-control my-0 py-1 amber-border">
              <option <?php if ($user['v_email'] == 0) echo 'selected'; ?> value="0">public for everyone</option>
              <option <?php if ($user['v_email'] == 1) echo 'selected'; ?> value="1">public for student of my specialty</option>
              <option <?php if ($user['v_email'] == 2) echo 'selected'; ?> value="2">public for student of my group</option>
              <option <?php if ($user['v_email'] == 3) echo 'selected'; ?> value="3">private</option>
            </select>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" id="password">
          </div>
          <div class="form-group">
            <label for="first_name">First name</label>
            <input name="first_name" value="<?php echo $user['first_name']; ?>" type="text" class="form-control" id="first_name">
            <select name="v_first_name" class="form-control my-0 py-1 amber-border">
              <option <?php if ($user['v_first_name'] == 0) echo 'selected'; ?> value="0">public for everyone</option>
              <option <?php if ($user['v_first_name'] == 1) echo 'selected'; ?> value="1">public for student of my specialty</option>
              <option <?php if ($user['v_first_name'] == 2) echo 'selected'; ?> value="2">public for student of my group</option>
              <option <?php if ($user['v_first_name'] == 3) echo 'selected'; ?> value="3">private</option>
            </select>
          </div>
          <div class="form-group">
            <label for="last_name">Last name</label>
            <input name="last_name" value="<?php echo $user['last_name']; ?>" type="text" class="form-control" id="last_name">
            <select name="v_last_name" class="form-control my-0 py-1 amber-border">
              <option <?php if ($user['v_last_name'] == 0) echo 'selected'; ?> value="0">public for everyone</option>
              <option <?php if ($user['v_last_name'] == 1) echo 'selected'; ?> value="1">public for student of my specialty</option>
              <option <?php if ($user['v_last_name'] == 2) echo 'selected'; ?> value="2">public for student of my group</option>
              <option <?php if ($user['v_last_name'] == 3) echo 'selected'; ?> value="3">private</option>
            </select>
          </div>
          <!-- TODO location -->
          <!-- <div class="form-group"> -->
          <!-- <label for="location">Location</label>
            <input name="location" value="<?php echo $coordinates['lat'] . ', ' . $coordinates['lon']; ?>" type="text" class="form-control" id="location">
          </div> -->
          <div class="form-group">
            <label for="specialty">specialty</label>
            <input name="specialty" type="text" value="<?php echo $user['specialty']; ?>" class="form-control" id="specialty">
            <select name="v_specialty" class="form-control my-0 py-1 amber-border">
              <option <?php if ($user['v_specialty'] == 0) echo 'selected'; ?> value="0">public for everyone</option>
              <option <?php if ($user['v_specialty'] == 1) echo 'selected'; ?> value="1">public for student of my specialty</option>
              <option <?php if ($user['v_specialty'] == 2) echo 'selected'; ?> value="2">public for student of my group</option>
              <option <?php if ($user['v_specialty'] == 3) echo 'selected'; ?> value="3">private</option>
            </select>
          </div>
          <div class="form-group">
            <label for="group">Group</label>
            <input name="group" type="number" min="1" max="8" value="<?php echo $user['uni_group']; ?>" class="form-control" id="group">
            <select name="v_group" class="form-control my-0 py-1 amber-border">
              <option <?php if ($user['v_uni_group'] == 0) echo 'selected'; ?> value="0">public for everyone</option>
              <option <?php if ($user['v_uni_group'] == 1) echo 'selected'; ?> value="1">public for student of my specialty</option>
              <option <?php if ($user['v_uni_group'] == 2) echo 'selected'; ?> value="2">public for student of my group</option>
              <option <?php if ($user['v_uni_group'] == 3) echo 'selected'; ?> value="3">private</option>
            </select>
          </div>
          <div class="form-group">
            <label for="graduation">Graduation</label>
            <input name="graduation" type="year" value="<?php echo $user['graduation']; ?>" class="form-control" id="graduation">
            <select name="v_graduation" class="form-control my-0 py-1 amber-border">
              <option <?php if ($user['v_graduation'] == 0) echo 'selected'; ?> value="0">public for everyone</option>
              <option <?php if ($user['v_graduation'] == 1) echo 'selected'; ?> value="1">public for student of my specialty</option>
              <option <?php if ($user['v_graduation'] == 2) echo 'selected'; ?> value="2">public for student of my group</option>
              <option <?php if ($user['v_graduation'] == 3) echo 'selected'; ?> value="3">private</option>
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
