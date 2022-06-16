<?php
session_start();
if(!isset($_SESSION['user']))
{
    $_SESSION['user']=0;
}
if(isset($_SESSION['user']) && $_SESSION['user']==0)
{
    header("Location: login.php");
}
require_once "pdo.php";
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

<body style="background-image: url(&quot;assets/img/ways-to-make-website-more-professional.jpg&quot;);background-size: cover;background-repeat: no-repeat;">
<?php require_once "navbar.php"; 
$sql="SELECT amount,stars FROM users WHERE user_id = :u";
$stmt= $pdo->prepare($sql);
$stmt->execute(array(
    ':u' => $_SESSION['user'],
));
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row)
{
    echo("<div id=\"prom\">");
    echo("<div class=\"jumbotron\">");
    echo("<h1>TOTAL STARS</h1>");
    $STARS=$row['stars']==NULL?"0":$row['stars'];
    echo(" <p><a class=\"btn btn-primary\" role=\"button\">".$STARS."</a></p>");
    echo("</div>");
    echo("</div>");
    echo("<div class=\"card\"><img class=\"card-img w-100 d-block\">");
    echo("<div class=\"card-img-overlay\"></div>");
    echo("</div>");
    echo("<div id=\"pom1\">");
    echo("<div class=\"jumbotron\">");
    echo("<h1>BALANCE LEFT</h1>");
    echo("<p><a class=\"btn btn-primary\" role=\"button\">".$row['amount']."</a></p>");
    echo("</div>");
    echo("</div>");
}
?>
<br>
<div>
<?php
$sql="SELECT * FROM cars WHERE user_id = :u";
$stmt= $pdo->prepare($sql);
$stmt->execute(array(
    ':u' => $_SESSION['user'],
));
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row)
{
    echo("<div class=\"container-fluid\">");
    echo("<div class=\"row\">");
    echo("<div class=\"col-md-3\"></div>");
    echo("<div class=\"col-md-6\">");
    $row['image']=str_replace("https://drive.google.com/file/d/", "", $row['image']);
    $row['image']=str_replace("/view?usp=sharing", "", $row['image']);
    echo("<div class=\"card\"><img class=\"card-img-top w-100 d-block\" src=\"https://drive.google.com/uc?id=".$row['image']."\">");
    echo("<div class=\"card-body\" style=\"text-align:center;\">");
    echo("<i><h2 class=\"card-title\">".$row['cars']."</h2></i>");
    echo("<p class=\"card-text\"><b>TYPE: ".$row['type']." </b><br>");
    echo("MILEAGE: ".$row['mileage']." Km/L<br>");
    echo("ENGINE: ".$row['eng']." cc<br>");
    echo("POWER: ".$row['power']." bhp<br>");
    echo("TORQUE: ".$row['torque']." Nm<br>");
    echo("<b>STARS: ".$row['stars']."</b><br>");
    echo("<b>PRICE: ".$row['price']."</b><br>");
    echo("</p>");
    echo("</div>");
    echo("</div>");
    echo("</div>");
    echo("<div class=\"col-md-3\"></div>");
    echo("</div>");
    echo("</div>");
    echo("<br>");
}
?>
</div>
<?php require_once "footer.php";?> 
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>