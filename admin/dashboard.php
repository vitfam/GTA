<?php
require './inside/valid_login.php';
include '../components/_dbconn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>VITFAM | DASHBOARD</title>
    <?php require "./inside/_links.php"; ?>
</head>

<body>
    <?php require './inside/_header.php'; ?>

    <h2 class="text-center mt-4">Welcome <?php echo $_SESSION['username']; ?></h2>

    <div class="container my-5 d-flex justify-content-around align-items-center" style="height: 59vh;">

        <div class="card mx-2" id="c1" style="width: 18rem;">
            <div class="card-body">
                <?php
                $usersql = "SELECT * FROM users";
                $userRes = $pdo->prepare($usersql);
                $userRes->execute();
                $userCount = $userRes->rowCount();

                if ($userCount) {
                    echo '
                                <h2 class="card-title text-center pt-3"><i class="fa fa-users fa-3x"></i></h2>
                                <h3 class="card-text text-center py-4"><span style="color: #2A0944;">' . $userCount . '</span> Users</h3>
                            ';
                }
                ?>
            </div>
        </div>

        <div class="card mx-2" id="c2" style="width: 18rem;">
            <div class="card-body">
                <?php
                $sql = "SELECT * FROM model";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $cars = $stmt->rowCount();

                if ($cars) {
                    echo '
                                <h2 class="card-title text-center pt-3"><i class="fa fa-book-open fa-3x"></i></h2>
                                <h3 class="card-text text-center py-4"><span style="color: #2A0944;">' . $cars . '</span> Cars</h3>
                            ';
                }
                ?>
            </div>
        </div>

        <div class="card mx-2" id="c3" style="width: 18rem;">
            <div class="card-body">
                <?php
                $sql = "SELECT * FROM superuser";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $su = $stmt->rowCount();

                if ($su) {
                    echo '
                            <h2 class="card-title text-center pt-3"><i class="fa fa-user fa-3x"></i></h2>
                            <h3 class="card-text text-center py-4"><span style="color: #2A0944;">' . $su . '</span> Superuser</h3>
                        ';
                }
                ?>
            </div>
        </div>

    </div>

    <?php require './inside/_footer.php'; ?>
</body>

</html>