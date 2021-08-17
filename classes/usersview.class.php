<?php
class UsersView extends Users
{
     
    protected function getFeedingSiteName($feed)
    {
        // https://zaufanatrzeciastrona.pl/feed/
        $domOBJ = new DOMDocument();
        $domOBJ->load("$feed");

        $content = $domOBJ->getElementsByTagName('channel');


        if (!empty(count($content))) {
            foreach ($content as $data) {
                $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
                if(is_null($title)) {
                    $title = $data->getElementsByTagName("description")->item(0)->nodeValue;

                }
            }
        }
        else {
            $title = $domOBJ->getElementsByTagName('title')->item(0)->nodeValue;
        }

        echo "<li><a class='nav-link' id='$feed' name='feedSiteName' style='cursor: pointer'>$title</a></li>";
    }

    function showNamesOnNav()
    {

        $feeds = $this->getFeedsFromDatabase($_SESSION['login']);
        foreach ($feeds as $feed) {

            $this->getFeedingSiteName($feed["source"]);
        }
    }


    function printFeedHeaders($title, $link){
        echo    "<tr>
             <td>$title</td>
            <td><a href='$link'>Read more...</a></td>
        </tr>";
}

    function showFeedContent($feed)
    {

        $this->getFeedingSiteContent($feed);
    }

    function getFeedingSiteContent($feed)
    {
        // https://zaufanatrzeciastrona.pl/feed/
        $domOBJ = new DOMDocument();
        $domOBJ->load("$feed");

        $content = $domOBJ->getElementsByTagName('item');
        if (!empty(count($content))) {
            foreach ($content as $data) {
                $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
                $link = $data->getElementsByTagName("link")->item(0)->nodeValue;
                $this->printFeedHeaders($title, $link);
            }
        }

        $content = $domOBJ->getElementsByTagName('entry');
        if (!empty(count($content))) {
            foreach ($content as $data) {
                $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
                $link = $data->getElementsByTagName("link")->item(0)->nodeValue;
                $this->printFeedHeaders($title, $link);
            }
        }
        
    }

    
}
