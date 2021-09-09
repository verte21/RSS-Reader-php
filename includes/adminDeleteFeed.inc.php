<?php
include "../class-autoload.inc.php";

$feedId = $_POST['feedId'];

    $obj = new Userscontr();
    $obj->adminDeleteFeed($feedId);