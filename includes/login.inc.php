<?php
session_start();
include "../class-autoload.inc.php";
var_dump($_POST["login"]);
var_dump($_POST["password"]);

if (isset($_POST['login']) && isset($_POST['password']) && $_POST['login']!== "" && $_POST['password']!== ""){
    $obj = new Users();
    $userData = $obj->getUserByLoginAndPwd($_POST['login'], $_POST['password']);  
   
    $_SESSION["login"] = $userData["login"];
    $_SESSION["logged_id"] = $userData["id"];
    $_SESSION["email"] = $userData["email"];
    header('Location:../index.php');
    exit();
} else {
    header('Location:../loginForm.php?err=loginAndPwdNotSet');
    exit();
}


