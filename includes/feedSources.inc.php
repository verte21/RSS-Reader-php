<?php
    include "../class-autoload.inc.php";
    $pageNumber = $_POST['pageNumber'];
    var_dump($pageNumber);

    $obj = new UsersView();
    $obj->printFeedsInfo($pageNumber, 10);
                        