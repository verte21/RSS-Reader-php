<?php
session_start();

include "../class-autoload.inc.php";
include_once "functions.inc.php";

$feedId = $_POST['feedId'];
$feedSource = $_POST['feedSource'];
$objuv = new UsersView();



if (validateFeed($feedSource)){
    $obj = new UsersContr();
    $obj->updateFeed($feedId, $feedSource);
    $objuv->printUpdateButton("Updated!");

} else {
    alert("Your new link is not a RSS feed!");
    $objuv->printUpdateButton("Update");
}

