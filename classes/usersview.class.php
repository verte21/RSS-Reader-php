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
                    <td style='width:80%;'>$title</td>
                    <td style='width:20%;'><button type='button' class='btn btn-info' name='addFeed' id='$feed' data-feed-id-in-db='$feedId'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='text-success' class='bi bi-plus-circle' viewBox='0 0 16 16'>
                        path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                <path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/>
                </svg>
                    Add
                  </button></td>
                    </tr>";
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
                    <td style='width: 80%'>$title</td>
                    <td style='width: 20%' style='cursor: pointer'><p class='m-0' name='deleteFeed' id='$feed'>Delete</p></td></tr>";
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
