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
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $login)) {
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


