<?php
class UsersView extends Users
{

    protected function getFeedingSiteNameForTable($feed, $feedId)
    {
        // https://zaufanatrzeciastrona.pl/feed/
        $domOBJ = new DOMDocument();
        $domOBJ->load("$feed");

        $content = $domOBJ->getElementsByTagName('channel');


        if (!empty(count($content))) {
            foreach ($content as $data) {
                $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
                if (is_null($title)) {
                    $title = $data->getElementsByTagName("description")->item(0)->nodeValue;
                }
            }
        } else {
            $title = $domOBJ->getElementsByTagName('title')->item(0)->nodeValue;
        }
        echo "<tr>
                    <td>$title</td>
                    <td class='border-2 border-danger' style='cursor: pointer'><p class='m-0' name='addFeed' id='$feed' data-feed-id-in-db='$feedId'>Add me!</p></td>";
    }

    protected function getFeedingSiteNameForNav($feed)
    {
        // https://zaufanatrzeciastrona.pl/feed/
        $domOBJ = new DOMDocument();
        $domOBJ->load("$feed");

        $content = $domOBJ->getElementsByTagName('channel');


        if (!empty(count($content))) {
            foreach ($content as $data) {
                $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
                if (is_null($title)) {
                    $title = $data->getElementsByTagName("description")->item(0)->nodeValue;
                }
            }
        } else {
            $title = $domOBJ->getElementsByTagName('title')->item(0)->nodeValue;
        }

        echo "<li><a class='nav-link' id='$feed' name='feedSiteName' style='cursor: pointer'>$title</a></li>";
    }

    protected function getFeedingSiteForManageFeeds($feed)
    {
        // https://zaufanatrzeciastrona.pl/feed/
        $domOBJ = new DOMDocument();
        $domOBJ->load("$feed");

        $content = $domOBJ->getElementsByTagName('channel');


        if (!empty(count($content))) {
            foreach ($content as $data) {
                $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
                if (is_null($title)) {
                    $title = $data->getElementsByTagName("description")->item(0)->nodeValue;
                }
            }
        } else {
            $title = $domOBJ->getElementsByTagName('title')->item(0)->nodeValue;
        }
        echo "<tr>
                    <td>$title</td>
                    <td class='border-2 border-danger' style='cursor: pointer'><p class='m-0' name='deleteFeed' id='$feed'>Delete</p></td>";
    }

    function showNamesOnNav()
    {

        $feeds = $this->getFeedsFromDatabase($_SESSION['login']);
        foreach ($feeds as $feed) {

            $this->getFeedingSiteNameForNav($feed["source"]);
        }
    }

    function showNamesOnAddFeed($howManyToShow)
    {
        $feeds = $this->getRandomFeeds($howManyToShow);
        foreach ($feeds as $feed) {
            $this->getFeedingSiteNameForTable($feed["source"], $feed['id']);
        }
    }

    function showNamesForManageFeedsTable()
    {
        $feeds = $this->getFeedsFromDatabase($_SESSION['login']);
        foreach ($feeds as $feed) {

            $this->getFeedingSiteForManageFeeds($feed["source"]);
        }
    }


    function printFeedHeaders($title, $link)
    {
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
