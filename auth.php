<?
    session_start();

    if(!isset($_SESSION['auth'])){
        $_SESSION['status'] = "Shaxsiy hisobingizga kiring!";
        header("Location: login.php");
        exit(0);
    } 
?>