<?php
require_once "dbconnect.php";
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION["admORuser"] == "admin"){
    $showAdmin = "";
    $showLogout = "";
    $showLogin = "visually-hidden";
}elseif(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION["admORuser"] == "user") {
    $showAdmin = "visually-hidden";
    $showLogout = "";
    $showLogin = "visually-hidden";
}else{
    $showAdmin = "visually-hidden";
    $showLogout = "visually-hidden";
    $showLogin = "";
}

echo $_SESSION["admORuser"];
?>



<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<style>
    body {
        background-color: #F3F3F3;
        margin: 0;
    }
</style>
<div class="header unselectable">
    <h1>Новости у Бориса</h1>
</div>

<div id="header" class="unselectable">
    <a class="button" href="index.php">Главная</a>
    <a class="button" href="news.php">Новости</a>
    <a class="button <?php echo $showAdmin; ?>" href="admin.php">Админка</a>
    <a class="button <?php echo $showLogout; ?>" href="logout.php">Выйти</a>
    <a class="button <?php echo $showLogin; ?>" href="login.php">Войти</a>
</div>
