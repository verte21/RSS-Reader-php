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
        }
        return $title;
    }

    protected function showNamesOnNav(){

    }
    
}