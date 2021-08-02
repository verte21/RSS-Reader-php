<?php

class UsersView extends Users {


    protected function getFeedingSiteName($feed)
    {
        // https://zaufanatrzeciastrona.pl/feed/
        $domOBJ = new DOMDocument();
        $domOBJ->load("$feed");

        $content = $domOBJ->getElementsByTagName('channel');

        foreach ($content as $data) {
            $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
                echo "<li><a class='nav-link' id='$title' href='/'>$title</a></li>";
        }
        
    }

     function showNamesOnNav(){

        $feeds = $this->getFeedsFromDatabase($_SESSION['login']);
        foreach($feeds as $feed) {
            
            $this->getFeedingSiteName($feed["source"]);
        }
    }

    function showFeedContent(){
       
        $feeds = $this->getFeedsFromDatabase($_SESSION['login']);
        foreach($feeds as $feed) {
            
            $this->getFeedingSiteContent($feed["source"]);
        }
    }

    function getFeedingSiteContent($feed){
         // https://zaufanatrzeciastrona.pl/feed/
         $domOBJ = new DOMDocument();
         $domOBJ->load("https://zaufanatrzeciastrona.pl/feed/");
 
         $content = $domOBJ->getElementsByTagName('item');
 
         foreach ($content as $data) {
             $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
             $link = $data->getElementsByTagName("link")->item(0)->nodeValue;
             echo " <tr>
                    <td>$title</td>
                    <td><a href='$link'>Czytaj...</a></td>
                </tr>";
         }
         



    }
    
}