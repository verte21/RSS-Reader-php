<?php

function emptySignup($login, $email, $password, $passwordRepeat)
{
    $result = false;

    if (empty($login || empty($email) || empty($password) || empty($passwordRepeat))) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidLogin($login)
{
    $loginLength = strlen($login);
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $login)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function wrongLoginLength($login)
{
    $loginLength = strlen($login);
    $result = false;
    if ($loginLength > 10 || $loginLength < 3) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function wrongPasswordLength($password)
{
    $passwordLength = strlen($password);
    $result = false;
    if ($passwordLength > 40 || $passwordLength < 5) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}



function invalidEmail($email)
{
    $result = false;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $passwordRepeat)
{
    $result = false;
    if ($password !== $passwordRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function readTitleOfRSSFeed($feed)
{

    $domOBJ = new DOMDocument();
    $domOBJ->load($feed);

    $title = $domOBJ->getElementsByTagName('title')->item(0)->nodeValue;
    return $title;
}

function readFeedsFromInsertedSite($feed)
{
    $domOBJ = new DOMDocument();
    $domOBJ->load($feed);
    $content = $domOBJ->getElementsByTagName('item');

    foreach ($content as $data) {
        $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
        $link = $data->getElementsByTagName("link")->item(0)->nodeValue;
        echo "$title :: $link";
        echo "<br>";
    }
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

                
function validateFeed($feed){

    $domOBJ = new DOMDocument();
    $domOBJ->load($feed);

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

    if (!$title) return false; // false if at the end $title is empty

    $content = $domOBJ->getElementsByTagName('item');
    if (!empty(count($content))) {
        foreach ($content as $data) {
            $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
            $link = $data->getElementsByTagName("link")->item(0)->nodeValue;
        }
    }
    
    $content = $domOBJ->getElementsByTagName('entry');
    if (!empty(count($content))) {                  // TODO i messed something with logic here
        foreach ($content as $data) {
            $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
            $link = $data->getElementsByTagName("link")->item(0)->nodeValue;
        }
    }

    if (!$title && !$link) return false;

    return true;
}
