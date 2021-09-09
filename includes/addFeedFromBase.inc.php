<?php
session_start();
include "../class-autoload.inc.php";

if ((isset($_POST['id'])) && isset($_SESSION['login']))
{
    $userId = $_SESSION["logged_id"];
    $feedId = $_POST['id'];

    $obj = new Userscontr();
    $obj->addChosenFeedingSite($feedId, $userId);
    
} 
