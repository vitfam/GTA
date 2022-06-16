<?php
require "./components/_dbconn.php";
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 0;
}
date_default_timezone_set('Asia/Calcutta');

$currTime = date('Y-m-d H:i:s');
$credTime = date('2022-02-07 18:00:00');

if ($currTime < date('Y-m-d H:i:s', strtotime('+0 minutes', strtotime($credTime)))) {
    header("Location: ./");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>GTA 2.O | VITFAM</title>
    <?php require "./components/_header_links.php"; ?>
</head>

<body style="background-image: linear-gradient(rgba(0, 0, 0, .85), rgba(0, 0, 0, .85)), url('https://images.unsplash.com/photo-1552176625-e47ff529b595?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1169&q=80');">
    <audio src="./music/break.mp3" autoplay loop="loop"></audio>
    <?php require "./components/_navbar.php"; ?>
    <div class="my-5">
        <h1 class="text-center">RESULT</h1>
        <table class="table table-responsive w-75 mx-auto my-5 text-light fs-5 align-middle text-center">
            <thead class="text-center">
                <tr>
                    <th scope="col">S. No.</th>
                    <th scope="col">Participants Name</th>
                    <th scope="col">Position Secured</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="text-center" scope="row">1</th>
                    <td class="px-4">
                        Aditya <br/>
                        Vaibhav
                    </td>
                    <td class="px-4">Rank 1</td>
                </tr>
                <tr>
                    <th class="text-center" scope="row">2</th>
                    <td class="px-4">
                        Sarath Prathap <br>
                        Sriram Kannan
                    </td>
                    <td class="px-4">Rank 2</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th class="pt-5 text-uppercase text-info text-start" style="border: none" scope="col">Special Mention</th>
                    <th style="border: none"></th>
                    <th style="border: none"></th>
                </tr>
                <tr>
                    <th class="text-center" scope="row">1</th>
                    <td class="px-4">
                        George Mathew <br>
                        Sahil Amritkar
                    </td>
                    <td class="px-4"> </td>
                </tr>
                <tr>
                    <th class="text-center" scope="row">2</th>
                    <td class="px-4">Ayush Singh</td>
                    <td class="px-4"> </td>
                </tr>
                <tr>
                    <th class="text-center" scope="row">2</th>
                    <td class="px-4">
                        Devansh Kothari <br>
                        Reuben Menezes
                    </td>
                    <td class="px-4"> </td>
                </tr>
                <tr style="border: none">
                    <td style="border: none; padding: 0"></td>
                    <td style="border: none; padding: 0"></td>
                    <td style="border: none; padding: 0">
                        <div class="my-4" style="margin: -9px; float: right">
                            <a href="./index.php" class="btn btn-warning text-dark mx-2 px-4">HOME</a>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <script src="./js/main.js"></script>
</body>

</html>