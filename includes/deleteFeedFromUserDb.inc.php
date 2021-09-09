<?php
session_start();
include "../class-autoload.inc.php";

if ((isset($_POST['link'])) && isset($_SESSION['login']))
{
    $userId = $_SESSION["logged_id"];
    $feedSource = $_POST['link'];

    $obj = new Userscontr();
    $obj->deleteFeed($feedSource, $userId);
} 