<?php

if (isset($_POST["submit"])){
    //code
    $login = $_POST["login"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptySignup($login, $email, $password, $passwordRepeat) !== false){
        header("Location:../signupForm.inc.php?err=emptySignup");
        exit();
    }

    if (invalidLogin($login) !== false){
        header("Location:../signupForm.inc.php?err=invalidLogin");
        exit();
    }

    if (invalidEmail($email) !== false){
        header("Location:../signupForm.inc.php?err=invalidEmail;");
        exit();
    } 

    if (passwordMatch($password, $passwordRepeat) !== false){
        header("Location:../signupForm.inc.php?err=pwdNotMatch");
        exit();
    }

    if (loginExists($login, $db) !== false){
        header("Location:../signupForm.inc.php?err=loginExists");
        exit();
    }

    if (emailExists($email, $db) !== false){
        header("Location:../signupForm.inc.php?err=invalidLogin");
        exit();
    }


   
  
    

} else {
    header("Location:signUpForm.php");
}