<?php
session_start();
include "../class-autoload.inc.php";

if ((isset($_POST['id'])) && isset($_SESSION['login']))
{
    $userLogin = $_SESSION["login"];
    $feedId = $_POST['id'];

    $obj = new Userscontr();
    $obj->addChosenFeedingSite($feedId, $userLogin);
    
} 
