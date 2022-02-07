<?php

if (isset($_SESSION['user']) && $_SESSION['user'] != 0) {
    header("Location: ../");
}

$message = "";
$type = "";

if (isset($_SESSION['msg']) && isset($_SESSION['type'])) {
    $message = $_SESSION['msg'];
    $type = $_SESSION['type'];

    unset($_SESSION['msg']);
    unset($_SESSION['type']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require '../components/_dbconn.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM superuser WHERE email = :e";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':e' => $email,
    ));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        if ($password == $row['password']) {
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['sno'] = $row['sno'];
            header("Location: ./dashboard.php");
        } else {
            $message = "No user found with this email and password";
            $type = "danger";
        }
    } else {
        $message = "No user found with this email and password";
        $type = "danger";
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../images/vitfam.png" type="image/x-icon">
    <style>
        .login-btn {
            width: 100%;
            background-color: rgba(81, 97, 206, 1) !important;
            border: none !important;
            outline: none;
            padding: 10px 0 !important;
        }

        .login-btn:hover {
            background-color: rgba(81, 97, 206, .85) !important;
        }
    </style>

    <script src="https://kit.fontawesome.com/767a85f1ee.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>VITFAM | SUPER USER</title>
</head>

<body style="background: url('https://wallpapercave.com/wp/wp2508415.jpg') no-repeat fixed; background-size: cover; background-color: rgba(0, 0, 0, 0.8); background-blend-mode: multiply;">
    <?php $type ? require "./inside/_alert.php" : ""; ?>
    <div class="container" style="position: absolute; top:50%; left:50%; transform: translate(-50%, -50%); width: 35%">
        <h1 class="my-5 text-center" style="color: #FFF;">Login to Admin Panel</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                <label for="email"><i class="fas fa-user px-2"></i> Email Address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password"><i class="fas fa-lock px-2"></i> Password</label>
            </div>
            <button type="submit" class="btn btn-primary login-btn mt-2">LOGIN</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- <script src="../js/main.js"></script> -->
</body>

</html>