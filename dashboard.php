<?php
session_start();
require_once('./config/db.php');
require_once('./helper/helperFunction.php');

$sql = 'SELECT * FROM users';
$result = $conn->query($sql);



?>


<!DOCTYPE html>
<html>

<head>
    <?php
    require_once('./_partials/head.php')
    ?>
</head>

<body>
    <?php
    require_once('./_partials/nav.php');
    echo 'Welcome ' . $_SESSION['auth']['username'];
    ?>


    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sno = 1;
            while ($row = $result->fetch_assoc()) { ?>

                <tr>
                    <td><?php echo $sno++; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td>Edit | Del</td>
                </tr>

            <?php } ?>
        </tbody>
    </table>




</body>

</html>