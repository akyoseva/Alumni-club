<?php
include 'includes/header.php';

$counter = 1;
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Specialty</th>
            <th scope="col">Graduation</th>
            <th scope="col">Email</th>
            <th scope="col">Group</th>
        </tr>
    </thead>
    <tbody>
        <?php
        function checkVisible($visibility, $row, $user_specialty, $user_uni_group)
        {
            if (
                $visibility == 0 ||
                ($visibility == 1 && $row['specialty'] == $user_specialty) ||
                ($visibility == 2 && $row['uni_group'] == $user_uni_group)
            )
                return true;
        }

        if (isset($_SESSION["username"])) {
            $stmt = $pdo->prepare('SELECT * FROM users INNER JOIN visibility ON id = v_user_id WHERE id = :id ');
            $stmt->execute(['id' => $_SESSION['id']]);
            $user = $stmt->fetch();
            $user_specialty = $user["specialty"];
            $user_uni_group = $user["uni_group"];

            // var_dump($user_uni_group);die();
            $data = $pdo->query("SELECT * FROM users INNER JOIN visibility ON id = v_user_id ");
            foreach ($data as $row) {
        ?>
                <tr>
                    <th scope="row"><?php echo $counter++ ?></th>
                    <td><?php if (checkVisible($row['v_username'], $row, $user_specialty, $user_uni_group)) {
                            echo $row['username'];
                        } ?></td>
                    <td><?php if (checkVisible($row['v_first_name'], $row, $user_specialty, $user_uni_group)) {
                            echo $row['first_name'];
                        } ?></td>
                    <td><?php if (checkVisible($row['v_last_name'], $row, $user_specialty, $user_uni_group)) {
                            echo $row['last_name'];
                        } ?></td>
                    <td><?php if (checkVisible($row['v_specialty'], $row, $user_specialty, $user_uni_group)) {
                            echo $row['specialty'];
                        } ?></td>
                    <td><?php if (checkVisible($row['v_graduation'], $row, $user_specialty, $user_uni_group)) {
                            echo $row['graduation'];
                        } ?></td>
                    <td><?php if (checkVisible($row['v_email'], $row, $user_specialty, $user_uni_group)) {
                            echo $row['email'];
                        } ?></td>
                    <td><?php if (checkVisible($row['v_uni_group'], $row, $user_specialty, $user_uni_group)) {
                            echo $row['uni_group'];
                        } ?></td>
                </tr>
            <?php
            }
        } else {
            $data = $pdo->query("SELECT * FROM users INNER JOIN visibility ON id = v_user_id ");
            foreach ($data as $row) {
            ?>
                <tr>
                    <th scope="row"><?php echo $counter++ ?></th>
                    <td><?php if ($row['v_username'] == 0) {
                            echo $row['username'];
                        } ?></td>
                    <td><?php if ($row['v_first_name'] == 0) {
                            echo $row['first_name'];
                        } ?></td>
                    <td><?php if ($row['v_last_name']  == 0) {
                            echo $row['last_name'];
                        } ?></td>
                    <td><?php if ($row['v_specialty'] == 0) {
                            echo $row['specialty'];
                        } ?></td>
                    <td><?php if ($row['v_graduation'] == 0) {
                            echo $row['graduation'];
                        } ?></td>
                    <td><?php if ($row['v_email'] == 0) {
                            echo $row['email'];
                        } ?></td>
                    <td><?php if ($row['v_uni_group'] == 0) {
                            echo $row['uni_group'];
                        } ?></td>
                </tr>
        <?php
            }
        }

        ?>
    </tbody>
</table>

</div>
<?php
include 'includes/footer.php';
