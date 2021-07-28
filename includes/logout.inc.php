<?php
session_start();
if (isset($_SESSION["logged_id"])) {

    unset($_SESSION["login"]);
    unset($_SESSION["logged_id"]);
    unset($_SESSION["email"]);
    header('Location:../index.php');
    exit();
} else {
    header('Location:../index.php?err=nooneloged');
}
