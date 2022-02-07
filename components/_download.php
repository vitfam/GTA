<?php

session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 0;
}

require "./_dbconn.php";

$sql = "SELECT model_id, model_name, mileage, engine, power, torque, type, stars, price FROM model WHERE model_id <= 150";
$stmt = $pdo->prepare($sql);
$stmt->execute(array());
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$data = array();
if($rows){
    foreach($rows as $row){
        $data[] = $row;
    }
}

// download
header("Content-Type: text/csv; charset=utf-8");
header("Content-Disposition: attachment; filename=Catalogue.csv");
header("Content-Description: File Transfer");
$output = fopen("php://output", "w");
fputcsv($output, array('S. No.', 'Name', 'Mileage', 'Engine', 'Power', 'Torque', 'Type', 'Stars', 'Price'));

if(count($data) > 0){
    foreach($data as $car){
        fputcsv($output, $car);
    }
}

?>