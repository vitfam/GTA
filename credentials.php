<?php
require "./components/_dbconn.php";
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 0;
}

date_default_timezone_set('Asia/Calcutta');

$currTime = date('Y-m-d H:i:s');
$credTime = date('2022-02-06 16:15:00');

if ($currTime < date('Y-m-d H:i:s', strtotime('+0 minutes', strtotime($credTime)))) {
    header("Location: ./");
}

$email = "";
$password = "";
$name = "";

$message = "";
$type = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valid = $_POST['valid'];
    $form_email = $_POST['form_email'];

    $sql = "SELECT * FROM users WHERE valid = :m";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':m' => $valid,
    ));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $email = $row['email'];
        $password = $row['pass'];
        $name = $row['name'];

        $message = "See Your Credentials";
        $type = "success";
    } else {
        $message = "No User Found";
        $type = "danger";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Credentials | GTA 2.O</title>
    <?php require "./components/_header_links.php"; ?>
</head>

<body style="background-image: linear-gradient(rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url('https://images.unsplash.com/photo-1597007066704-67bf2068d5b2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80'); overflow: hidden;">
    <?php $type ? require "./components/_alert.php" : ""; ?>
    <div class="text-center main-container my-5 d-flex justify-content-center align-items-center flex-column">
        <div class="container text-uppercase">
            <h1>Grand Thrift Auto 2.0</h1>
        </div>

        <div class="cred-box text-center my-5">
            <?php
            if ($email && $password && $name) {
                echo '
                <div class="cred-box-header text-uppercase">
                    <h3>Hey ' . $name . ' Your Credentials</h3>
                </div>
                <div class="cred-box-body">
                    <form>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your email</label>
                            <input type="email" class="form-control" id="email" value="' . $email . '" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Your password</label>
                            <input type="text" class="form-control" id="password" value="' . $password . '" disabled>
                        </div>
                        <a href="./login.php" class="btn btn-success">START NOW</a>
                    </form>
                    ';
            } else {
                echo '
                <div class="cred-box-header text-uppercase">
                    <h2>Access the Credentials</h2>
                </div>
                <div class="cred-box-body">
                    <form action="credentials.php" method="POST">
                        <div class="mb-3">
                            <label for="valid" class="form-label">Code (Eg : abc@1234)</label>
                            <input type="phone" class="form-control" id="valid" name="valid" placeholder="Enter your code" required>
                        </div>
                        <button type="submit" class="btn btn-primary">SEE CREDENTIALS</button>
                    </form>
                    ';
            }
            ?>
        </div>
    </div>
    </div>
    <script src="./js/main.js"></script>
</body>

</html>