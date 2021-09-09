<?php
  include "../class-autoload.inc.php";
    $obj = new UsersView();
    
    $obj->printPageNumbers($_POST['rowsPerPage'], $_POST['searchQuery']);