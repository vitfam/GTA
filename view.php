
<?php
session_start();
if(!isset($_SESSION['user']))
{
    $_SESSION['user']=0;
}

require_once "pdo.php";
$msg="";
if(isset($_SESSION['msg']))
{
    $msg=$_SESSION['msg'];
    unset($_SESSION['msg']);
}
if(isset($_POST['buy']) && $_POST['buy']=="Buy")
{
    $sql="SELECT user_id,price,stars FROM cars WHERE sr_no= :s";
    $stmt= $pdo->prepare($sql);
    $stmt->execute(array(
        ':s' => $_GET['x'],
    ));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    if($row['user_id']==NULL)
    {
        $sql1="SELECT amount,stars,rounds FROM users WHERE user_id= :u";
        $stmt1= $pdo->prepare($sql1);
        $stmt1->execute(array(
            ':u' => $_SESSION['user']
        ));
        $row1=$stmt1->fetch(PDO::FETCH_ASSOC);
        if($row1['amount']-$row['price']>=0)
        {
         $rounds=$row1['rounds']+1;
         $amount=$row1['amount']-$row['price'];
         $stars=$row1['stars']+$row['stars'];
         $sql1= "UPDATE users SET amount = :a, stars = :s, rounds = :r WHERE user_id = :u";
	     $stmt1= $pdo->prepare($sql1);
	     $stmt1->execute(array(
		    ':u'=> $_SESSION['user'],
            ':a'=> $amount,
            ':r'=> $rounds,
            ':s'=> $stars
         ));
        $sql= "UPDATE cars SET user_id = :u WHERE sr_no = :s";
	    $stmt= $pdo->prepare($sql);
	    $stmt->execute(array(
		    ':u'=> $_SESSION['user'],
		    ':s'=>$_GET['x']
        ));
        $_SESSION['msg']="You have successfully bought the car.";
        }
        else
        {
            $_SESSION['msg']="You have insufficient balance.";
        }
        
    }
    else
    {
        $_SESSION['msg']="Someone else has bought the car.";
    }
    
    header("Location: view.php?x=".$_GET['x']);
}
$sql="SELECT * FROM cars WHERE sr_no= :s";
$stmt= $pdo->prepare($sql);
$stmt->execute(array(
    ':s' => $_GET['x'],
));
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Refresh" content="20">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>VITFAM</title>
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
    <?php require_once "navbar.php"; ?>
    </div>
    <br>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <?php
                foreach($rows as $row)
                {
                    echo("<div class=\"col-md-6\">");
                    $row['image']=str_replace("https://drive.google.com/file/d/", "", $row['image']);
                    $row['image']=str_replace("/view?usp=sharing", "", $row['image']);
                    echo("<div class=\"card\"><img class=\"card-img-top w-100 d-block\" src=\"https://drive.google.com/uc?id=".$row['image']."\">");
                    echo("<div class=\"card-body\" style=\"text-align:center;\">");
                    echo("<i><h2 class=\"card-title\">".$row['cars']."</h2></i>");
                    echo("<p class=\"card-text\">MILEAGE: ".$row['mileage']." Km/L<br>");
                    echo("ENGINE: ".$row['eng']." cc<br>");
                    echo("POWER: ".$row['power']." bhp<br>");
                    echo("TORQUE: ".$row['torque']." Nm<br>");
                    echo("<b>STARS: ".$row['stars']."</b><br>");
                    echo("<b>PRICE: ".$row['price']."</b><br>");
                    if($msg!="")
                    {
                        echo($msg);
                    }
                    echo("</p>");
                    if($row['user_id']==NULL)
                    {
                        echo("<form action=\"view.php?x=".$_GET['x']."\" method='post'>");
                        echo("<input class=\"btn btn-primary\" type='submit' value='Buy' name='buy'>");
                        echo("</form>");
                    }
                    else
                    {
                        echo("<p class=\"card-text\" style=\"color:red;\"> Bought </p>");
                    }
                    echo("</div>");
                    echo("</div>");
                    echo("</div>");
                }
                ?>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    <?php require_once "footer.php";?> 
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>



    
        
            
            
        
    
