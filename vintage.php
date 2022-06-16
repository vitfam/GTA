<div class="container">
    <?php
    $sql="SELECT * FROM cars WHERE type = :s";
    $stmt= $pdo->prepare($sql);
    $stmt->execute(array(
        ':s' => "VINTAGE",
    ));
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
        <h1 style="background-color:rgba(255,255,255,0.7);">VINTAGE Round</h1>
</div>
<div>
    <div class="container-fluid">
        <div class="row">
        <?php
            foreach($rows as $row)
            {
                echo("<div class=\"col-md-3\" style=\"padding:5px;\">");
                $row['image']=str_replace("https://drive.google.com/file/d/", "", $row['image']);
                $row['image']=str_replace("/view?usp=sharing", "", $row['image']);
                echo("<div class=\"card\" style=\"min-height:400px; max-height:400px;\"><div style=\"max-height:200px; overflow:hidden;\"><img class=\"card-img-top\" src=\"https://drive.google.com/uc?id=".$row['image']."\"></div>");
                echo("<div class=\"card-body\" style=\"text-align:center;\">");
                echo("<i><h4 class=\"card-title\">".$row['cars']."</h4></i>");
                echo("<p class=\"card-text\"><b>STARS: ".$row['stars']."</b><br>");
                echo("<b>PRICE: ".$row['price']."</b></p>");
                if($row['user_id']==NULL)
                {
                    echo("<a class=\"btn btn-primary\" type=\"button\" href=\"view.php?x=".$row['sr_no']."\">Buy</a>");
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
        </div>
    </div>
</div>