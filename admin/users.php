<?php

require './inside/valid_login.php';
include '../components/_dbconn.php';

$message = "";
$type = "";

if (isset($_SESSION['msg']) && isset($_SESSION['type'])) {
    $message = $_SESSION['msg'];
    $type = $_SESSION['type'];

    unset($_SESSION['msg']);
    unset($_SESSION['type']);
}

if (isset($_POST['edit'])) {

    $sno = $_POST['edit'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $stars = $_POST['stars'];
    $amount = $_POST['amount'];
    $user_type = $_POST['user_type'];
    $link = $_POST['link'] == "-" ? "" : $_POST['link'];
    $loggedin = $_POST['login'];

    // if($link){
        $update = "UPDATE users SET name = :u, email = :e, pass = :p, mobile = :m, stars = :s, amount = :a, user_type = :ut, link = :l, loggedin = :li WHERE user_id = :ui";
        $stmt = $pdo->prepare($update);
        $stmt->execute(array(
            ':u' => $username,
            ':e' => $email,
            ':p' => $password,
            ':m' => $mobile,
            ':s' => $stars,
            ':a' => $amount,
            ':ut' => $user_type,
            ':l' => $link,
            ':li' => $loggedin,
            ':ui' => $sno,
        ));
    // } else {
    //     $update = "UPDATE users SET name = :u, email = :e, pass = :p, mobile = :m, stars = :s, amount = :a, user_type = :ut, loggedin = :li WHERE user_id = :ui";
    //     $stmt = $pdo->prepare($update);
    //     $stmt->execute(array(
    //         ':u' => $username,
    //         ':e' => $email,
    //         ':p' => $password,
    //         ':m' => $mobile,
    //         ':s' => $stars,
    //         ':a' => $amount,
    //         ':ut' => $user_type,
    //         ':li' => $loggedin,
    //         ':ui' => $sno,
    //     ));
    // }

    if ($stmt) {
        $message = "User updated successfully";
        $type = "success";
    } else {
        $message = "User update failed";
        $type = "danger";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new'])) {

    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $amount = $_POST['amount'];
    $user_type = $_POST['user_type'];
    $link = $_POST['link'] == "-" ? "" : $_POST['link'];

    $exist = "SELECT * FROM users WHERE email = :e";
    $stmte = $pdo->prepare($exist);
    $stmte->execute(array(
        ':e' => $email,
    ));
    $row = $stmte->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $message = "User already exists";
        $type = "danger";
    } else {
        if ($link) {
            $sql = "INSERT INTO users(name, email, pass, mobile, amount, user_type, link) VALUES(:n, :e, :p, :m, :a, :ut, :l)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':n' => $name,
                ':e' => $email,
                ':p' => $password,
                ':m' => $mobile,
                ':a' => $amount,
                ':ut' => $user_type,
                ':l' => $link
            ));
        } else {
            $sql = "INSERT INTO users(name, email, pass, mobile, amount, user_type) VALUES(:n, :e, :p, :m, :a, :ut)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':n' => $name,
                ':e' => $email,
                ':p' => $password,
                ':m' => $mobile,
                ':a' => $amount,
                ':ut' => $user_type
            ));
        }
        if ($stmt) {
            $message = "User added successfully";
            $type = "success";
        } else {
            $message = "User cannot be added";
            $type = "danger";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>VITFAM | USERS</title>
    <?php require "./inside/_links.php"; ?>
</head>

<body>
    <?php require './inside/_header.php'; ?>
    <?php $type ? require './inside/_alert.php' : ""; ?>

    <h2 class="text-center mt-4">Welcome <?php echo $_SESSION['username']; ?></h2>

    <div class="container mt-3">
        <p class="mb-4 text-center">List of all the users</p>
        <div class="table-responsive fixTableHead">
            <table class="table table-hover caption-top">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center px-4" scope="col">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">Mobile</th>
                        <th class="text-center">Stars</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">User Type</th>
                        <th class="text-center">Link</th>
                        <th class="text-center">LoggedIn</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM users";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


                    if ($rows) {
                        foreach ($rows as $row) {
                            $link = $row['link'] == NULL ? "-" : $row['link'];
                            echo "
                            <tr>
                                <th class='text-center px-4' scope='row'>" . $row['user_id'] . "</th>
                                <td class='ps-5'>" . $row['name'] . "</td>
                                <td class='ps-5'>" . $row['email'] . "</td>
                                <td class='text-center'>" . $row['pass'] . "</td>
                                <td class='text-center'>" . $row['mobile'] . "</td>
                                <td class='text-center'>" . $row['stars'] . "</td>
                                <td class='text-center'>" . $row['amount'] . "</td>
                                <td class='text-center'>" . $row['user_type'] . "</td>
                                <td class='text-center'>" . $link . "</td>
                                <td class='text-center'>" . $row['loggedin'] . "</td>
                                <td class='text-center d-flex justify-content-center align-items-center'>
                                    <button class='btn btn-outline-danger mx-2 my-2' data-bs-toggle='modal' data-bs-target='#editUserModal" . $row['user_id'] . "'>EDIT</button>
                            ";
                            require './inside/_usermodal.php';
                            echo "<button class='btn btn-primary text-center' data-bs-toggle='modal' data-bs-target='#allDetails" . $row['user_id'] . "'><i class='fas fa-plus m-0'></i></button>";
                            require './inside/_detailsModal.php';
                            echo "</td>";
                            echo '</tr>';
                            $i = $row['user_id'] + 1;
                        }
                    }
                    echo '
                        <tfoot>
                            <tr>
                                <form action"' . $_SERVER['PHP_SELF'] . '" method="POST">
                                    <th class="text-center" scope="row">' . $i . '</th>
                                    <td class="text-center"><input type="text" class="form-control" name="username" placeholder="Name" required/></td>
                                    <td class="text-center"><input type="email" class="form-control" name="email" placeholder="Email" required/></td>
                                    <td class="text-center"><input type="text" class="form-control" name="password" placeholder="Password" required/></td>
                                    <td class="text-center"><input type="text" class="form-control" name="mobile" placeholder="Mobile" required/></td>
                                    <td class="text-center"><input type="text" class="form-control"  value="0" disabled/></td>
                                    <td class="text-center"><input type="text" class="form-control"  name="amount" value="150000" required /></td>
                                    <td class="text-center"><input type="text" class="form-control"  name="user_type" value="L" required /></td>
                                    <td class="text-center"><input type="text" class="form-control"  name="link" value="-" required /></td>
                                    <td class="text-center"><input type="text" class="form-control"  value="0" disabled/></td>
                                    <td class="text-center">
                                        <button type="submit"class="add btn btn-success px-5" name="new">ADD</button>
                                    </td>
                                </form>
                            </tr>
                        </tfoot>
                    ';
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php require './inside/_footer.php'; ?>
</body>

</html>