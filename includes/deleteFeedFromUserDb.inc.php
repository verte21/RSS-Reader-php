<?php
session_start();
include "../class-autoload.inc.php";

if ((isset($_POST['link'])) && isset($_SESSION['login']))
{
    $userLogin = $_SESSION["login"];
    $feedSource = $_POST['link'];

    $obj = new Userscontr();
    $obj->deleteFeed($feedSource, $userLogin);
    echo "<p class='m-0'>Deleted!</p>";
} 