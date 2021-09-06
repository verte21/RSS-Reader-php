<?php
include "../class-autoload.inc.php";
  
            $feedLink = $_POST['link'];
            $obj = new UsersView();
            $obj->showFeedContent($feedLink);
            