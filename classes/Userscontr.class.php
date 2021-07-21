<?php

class Userscontr extends Users{


    function signUp(){
        if (isset($_POST["submit"])){
            $login = $_POST["login"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["passwordRepeat"];
        
            require_once 'functions.inc.php';
        
            if (emptySignup($login, $email, $password, $passwordRepeat) !== false){
                header("Location:../signupForm.php?err=emptySignup");
                exit();
            }
        
            if (invalidLogin($login) !== false){
                header("Location:../signupForm.php?err=invalidLogin");
                exit();
            }
        
            if (invalidEmail($email) !== false){
                header("Location:../signupForm.php?err=invalidEmail;");
                exit();
            } 
        
            if (passwordMatch($password, $passwordRepeat) !== false){
                header("Location:../signupForm.php?err=pwdNotMatch");
                exit();
            }
        
            $checkLogin = $this->getUserByLogin($login)[0];
            if ($checkLogin){
                header("Location:../signupForm.php?err=loginExists");
                exit();
            }

            $checkEmail = $this->getUserByEmail($email)[0];
            if ($checkEmail){
                header("Location:../signupForm.php?err=emailExists");
                exit();
            }
          

           $this->addUser($login, $email, $password);
        
           // getting id of the user that was just made
           $userTableId = $this->getIdFromUserTable($login, $email)[0];
          echo $userTableId;
          // $this->addUserFeeds($userTableId);
           


           // TODO gdzie po zarejestrowaniu 
          // header("Location:../index.php");   
        
        } else {
            header("Location:signUpForm.php");
        }

    } 

    




    function siemankoTest(){
        echo "jojojo elo elo";
    }



}