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
         {  // add link to base and to the user 
            $obj->AddFeed($link);
            $content = $obj->linkContent($link);
            $id = $content["id"];
            $obj->addFeedToUserDb($_SESSION["login"], $id);
            alert("Feed added!");
           echo "Add feed";
    
    
         } else { // if already in db, add 
    
            $id = $linkContent["id"];
            $obj = new Users();
            if (empty($obj->isFeedInUserFeedsList($_SESSION["login"], $id)))
            {
                $obj->addFeedToUserDb($_SESSION["login"], $id);
                alert("Feed added!");
                echo "Add another feed";
    
            } else {
                alert("Feed already in your db!");
                echo "Try another feed!";
            }
    
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


//https://www.wykop.pl/rss/





// czy są z tego nbod
// czt jest w bazie 
// jak jest to wyjąć id i przypisać usewrowi
// ja nie ma to dodać, pobrać id i przypisać userowi

