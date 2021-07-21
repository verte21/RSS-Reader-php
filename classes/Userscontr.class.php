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
                header("Location:../signupForm.inc.php?err=emptySignup");
                exit();
            }
        
            if (invalidLogin($login) !== false){
                header("Location:../signupForm.inc.php?err=invalidLogin");
                exit();
            }
        
            if (invalidEmail($email) !== false){
                header("Location:../signupForm.inc.php?err=invalidEmail;");
                exit();
            } 
        
            if (passwordMatch($password, $passwordRepeat) !== false){
                header("Location:../signupForm.inc.php?err=pwdNotMatch");
                exit();
            }
        
            if ($this->getUserByLogin($login) !== false){
                header("Location:../signupForm.inc.php?err=loginExists");
                exit();
            }
            
            if ($this->getUserByEmail($email) !== false){
                header("Location:../signupForm.inc.php?err=emailExists");
                exit();
            }

            $this->addUser($login, $email, $password);
            


        
        } else {
            header("Location:signUpForm.php");
        }

    } 


    function siemankoTest(){
        echo "jojojo elo elo";
    }



}