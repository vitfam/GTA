<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=vitfam', 'fam', 'fam123');
/*$pdo = new PDO('mysql:host=localhost;port=3306;dbname=id15433241_test', 'id15433241_mydatabase', '!MyDatabase123');*/
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);