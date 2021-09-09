<?php
    include "../class-autoload.inc.php";
    $pageNumber = $_POST['pageNumber'];
    $obj = new UsersView();


    if (isset($_POST['queryString'])){
        $obj->printFeedsInfo($pageNumber, 10, $_POST["queryString"]);
    } else {
         $obj->printFeedsInfo($pageNumber, 10, "");
    }



                        