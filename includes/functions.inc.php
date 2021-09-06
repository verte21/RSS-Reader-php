<?php

function emptySignup($login, $email, $password, $passwordRepeat)
{
    $result = true;

    if (empty($login || empty($email) || empty($password) || empty($passwordRepeat))) {
        $result = false;
    } else {
        $result = true;
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
    if ($loginLength > 11 || $loginLength < 3) {
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
    if ($passwordLength > 41 || $passwordLength < 5) {
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
    error_reporting(E_ALL ^ E_WARNING); 
    $domOBJ = new DOMDocument();
    $domOBJ->load($feed);
    if (!$domOBJ->load($feed)){
        return false;
    }

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
    } else 
    {
        $content = $domOBJ->getElementsByTagName('entry');
    if (!empty(count($content))) {                  // logic
        foreach ($content as $data) {
            $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
            $link = $data->getElementsByTagName("link")->item(0)->nodeValue;
        }
    }
    }

    if (!$title && !$link) return false;

    return true;                
    //  TODO ZLA LOGIKA NIE DZIALA DODAWANIE!
}


function addlinkButton($msg)
 {
    echo "<button id='submit-btn' class='btn btn-info col-4'>$msg</button>";

}   


function printInputError($err)
{
    echo '<div class="alert alert-danger" role="alert">';

    if ($err == "invalidLoginOrPwd"){
     echo "Invalid username or password!"; 
    }
    
    if ($err == "loginAndPwdNotSet"){
        echo "Enter Your login and password.";
    }

    if ($err == "emptySignup"){
        echo "Please fill all the fields.";
    }

    if ($err == "invalidLogin"){
        echo "Invalid login.";
    }

    if ($err == "loginLength"){
        echo "Invalid login length (3-10 characters).";
    }

    if ($err == "passwordLength"){
        echo "Invalid password length (min 5 characters).";
    }

    if ($err == "invalidEmail"){
        echo "Invalid email.";
    }
    
    if ($err == "pwdNotMatch"){
        echo "Passwords dont match.";
    }

    if ($err == "loginExists"){
        echo "Login already exists.";
    }

    if ($err == "emailExists"){
        echo "Email already exists.";
    }
    
    echo "</div>";
}

function printInfo($msg){
    echo '<div class="alert alert-info" role="alert">';

    if ($msg == "postSignUp"){
        echo "Congratulations!</br>You just created your account.<br> Now You can log in.";
    }



    echo "</div>";
}