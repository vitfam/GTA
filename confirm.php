<?php
session_start();
if(!isset($_SESSION['user']))
{
    $_SESSION['user']=0;
}
require_once "pdo.php";
$msg="";
if(isset($_GET['x']))
{
	$sql= "SELECT process FROM temp WHERE BINARY process=:p";
	$stmt= $pdo->prepare($sql);
	$stmt->execute(array(
		':p'=> $_GET['x'],
	));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	if($row===false)
	{
    $msg="There is no such request <br> <a href='index.php'>Go back to Home</a>";
	}
  else
	{
    $sql= "SELECT email,pass FROM temp WHERE BINARY process=:p";
  	$stmt= $pdo->prepare($sql);
  	$stmt->execute(array(
  		':p'=> $_GET['x'],
  	));
  	$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $email;
    $pass;
    foreach ( $rows as $row ) {
        $email=$row['email'];
        $pass=$row['pass'];
      }
		$sql= "INSERT Into users(email,pass) values(:e,:p)";
		$stmt= $pdo->prepare($sql);
		$stmt->execute(array(
			':e'=> $email,
			':p'=> $pass,
		));
		$msg="Your account has been created. <br> Please <a href='login.php'>Log In</a>";
    $sql="DELETE FROM temp WHERE BINARY process = :p";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(
      ':p'=>$_GET['x'],
    ));
	}
}
else
{
  $msg="<p style='background-color:rgba(255,255,255,0.7);'>The request is empty <br> <a href='index.php'>Go back to Home</a></p>";
}

?>

<!DOCTYPE html>
<html>

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
<body class="flex-grow-1" style="background-image: url(&quot;assets/img/hero-bg.png&quot;);background-size: cover;background-repeat: no-repeat;background-position: center;">
<?php
require_once "navbar.php";
?>
<div class="container-fluid" style="text-align:center;">
<?php echo($msg); ?>
</div>
<?php require_once "footer.php";?>
</body>
</html>

