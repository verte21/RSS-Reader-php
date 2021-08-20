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

            if (wrongLoginLength($login) !== false){
                header("Location:../signupForm.php?err=loginLength");
                exit();
            }

            if (wrongPasswordLength($password) !== false){
                header("Location:../signupForm.php?err=passwordLength");
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
        
        
            if ($this->isUserInDb($login) > 0){
                header("Location:../signupForm.php?err=loginExists");
                exit();
            }

            if ($this->isEmailInDb($email) > 0){
                header("Location:../signupForm.php?err=emailExists");
                exit();
            }
        
        

            $this->addUser($login, $email, $password);
                
            // getting id of the user that was just made         
           // $userTableId = $this->getIdFromUserTable($login, $email);
            
            // signing user id to  user_feeds-id table
            $this->createUserFeedsTable($login);
            
            header("Location:../index.php?msg=postSignUp");
        
        } else {
            header("Location:signUpForm.php");
        }
    } 

    function addChosenFeedingSite($id, $login){
      

        if (empty($this->isFeedInUserFeedsList($login, $id)))  
        {
                // juz w bazie
        } else { // if not in user Db add
            $this->addFeedToUserDb($login, $id);
        }

    }




    function siemankoTest(){
        echo "jojojo elo elo";
    }



}