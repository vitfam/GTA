<?php
require_once "pdo.php";
session_start();
if(!isset($_SESSION['user']))
{
    $_SESSION['user']=0;
}
$errmsg="";
$blocked=FALSE;
if(isset($_GET['in']) && $_GET['in']==1)
{
  $_GET = array();
  $errmsg="No user exists with this password and user name";
}
if(isset($_POST['email']))
{
  $sql="SELECT email FROM blocked WHERE BINARY email=:e";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    ':e'=> $_POST['email'],
  ));
  $rows = $stmt->fetch(PDO::FETCH_ASSOC);
  if($rows!==FALSE)
  {
    $sql="SELECT email,attempts FROM blocked WHERE BINARY email=:e";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
      ':e'=> $_POST['email'],
    ));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row)
    {
      if($row['attempts']>=5)
      {
        $blocked=TRUE;
        $errmsg="The user has been blocked.";
      }
    }
  }
}
if(isset($_POST['email']) && isset($_POST['password']) && $blocked==FALSE)
{
  $sql="SELECT email FROM users WHERE BINARY email=:e AND BINARY pass=:p";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
		    ':e'=> $_POST['email'],
        ':p'=> $_POST['password']
	));
  $rows = $stmt->fetch(PDO::FETCH_ASSOC);
  if($rows===FALSE)
  {
    $sql="SELECT email FROM users WHERE BINARY email=:e";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
  		':e'=> $_POST['email'],
  	));
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rows!==FALSE)
    {
      $sql="SELECT email FROM blocked WHERE BINARY email=:e";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
    		':e'=> $_POST['email'],
    	));
      $rows = $stmt->fetch(PDO::FETCH_ASSOC);
      if($rows!==FALSE)
      {
        $sql="SELECT attempts FROM blocked WHERE BINARY email=:e";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
      		':e'=> $_POST['email'],
      	));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $attempt;
        foreach($rows as $row)
        {
          $attempt=$row['attempts'];
        }
        $sql="UPDATE blocked SET attempts = :a WHERE BINARY email = :e";
        $stmt= $pdo->prepare($sql);
        $stmt->execute(array(
          ':a'=> $attempt+1,
      	  ':e'=> $_POST['email'],
      	));
      }
      if($rows===FALSE)
      {
        $sql="INSERT Into blocked(email,attempts) values(:e,:a)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute(array(
          ':e'=> $_POST['email'],
          ':a'=> 1,
      	));
      }

    }
    $_POST = array();
    header("Location: login.php?in=1");
  }
  else
  {
    if($blocked==FALSE)
    {
      $sql="SELECT email FROM blocked WHERE BINARY email=:e";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
        ':e'=> $_POST['email'],
      ));
      $rows = $stmt->fetch(PDO::FETCH_ASSOC);
      if($rows!==FALSE)
      {
        $sql="DELETE FROM blocked WHERE email = :e";
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array(
          ':e'=>$_POST['email'],
        ));
      }
      $sql="SELECT name ,user_id, email, pass FROM users WHERE BINARY email=:e AND BINARY pass=:p";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
    		':e'=> $_POST['email'],
        ':p'=> $_POST['password'],
    	));
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ( $rows as $row ) {
          $_SESSION['user']=$row['user_id'];
          $_SESSION['email']=$row['email'];
          $_SESSION['name']=$row['name'];
        }
        header("Location: index.php");
    }

  }

}
?>
<!DOCTYPE html>
<html style="opacity: 1;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>vitfampage</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-with-social-media-icons-1.css">
    <link rel="stylesheet" href="assets/css/Footer-with-social-media-icons.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body style="opacity: 1;filter: blur(0px);background-image: url(&quot;assets/img/img-1.png&quot;);background-size: cover;background-repeat: no-repeat;">
    <section>
    <?php require_once "navbar.php"; ?>
    </section>
    <div class="login-dark">
        <form method="post">
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
        <?php if($errmsg!=""){echo("<p>$errmsg</p>");} ?>
        <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" /></div>
        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" /></div>
       
        <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div>
        </form>
    </div>
    <?php require_once "footer.php";?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>