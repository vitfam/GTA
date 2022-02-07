<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand"><img src="./images/vitfam.png" height="50px" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="./">HOME</a></li>
                <li class='nav-item'><a class='nav-link' href='./winners.php'>RESULT</a>
                <li class='nav-item'><a class='nav-link' href='./rules.php'>RULES</a>
                <?php
                if ($_SESSION['user'] == 0) {
                    echo "<li class='nav-item'><a class='nav-link' href='./credentials.php'>CREDENTIALS</a></li>";
                    echo "<li class='nav-item'><a class='nav-link' href='./login.php'>LOGIN</a></li>";
                } else {
                    echo "<li class='nav-item'><a class='nav-link' href='./event.php'>EVENT</a></li>";
                    echo "<li class='nav-item'><a class='nav-link' href='./profile.php'>MY ACCOUNT</a></li>";
                    echo "<li class='nav-item'><a class='nav-link' href='./leaderboard.php'>LEADERBOARD</a></li>";
                    echo "<li class='nav-item'>
                            <form action='./logout.php' method='POST' class='d-flex justify-self-center'>
                                <button style='color: #dc3545; background: transparent; border: none;' type='submit' name='logout' class='nav-link text-uppercase'>Logout</button>
                            </form>
                        </li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>