<?php
    session_start();
    if ((isset($_SESSION['login']) || $_SESSION['login'] == true)){
        $login = true;
    }
    else{
        $_SESSION['login'] = false;
        header("Location: ./");
    }
    if(isset($_SESSION['user']) && $_SESSION['user'] != 0){
        header("Location: ../");
    }
?>