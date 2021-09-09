<?php
session_start();

include "../class-autoload.inc.php";
include_once "functions.inc.php";

if (!empty($_POST['link'])){

    $link = $_POST['link'];

    if(validateFeed($link))
    {
        $obj = new Users();
        $linkContent = $obj->linkContent($link);

         if (empty($linkContent))
         {  // add link to base
            $obj->AddFeed($link);
            alert("Feed added!");
           echo "Add feed";
    
         } else { // if already in db, add 
                alert("Feed already in db!");
                echo "Try another feed!";
         }
    
    } else { // is not a feed 
        alert('Your link is not a RSS feed.');
        // addlinkButton("Try other link");
        echo "Try other link";
    };    

} else { 
    alert('Empty feed link!.');
    addlinkButton('Add feed');
}


