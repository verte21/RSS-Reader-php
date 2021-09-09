<?php

class UsersContr extends Users
{

    function signUp()
    {
        if (isset($_POST["submit"])) {
            $login = $_POST["login"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["passwordRepeat"];

            require_once 'functions.inc.php';

            if (emptySignup($login, $email, $password, $passwordRepeat)) {
                header("Location:../signupForm.php?err=emptySignup");
                exit();
            }

            if (invalidLogin($login)) {
                header("Location:../signupForm.php?err=invalidLogin");
                exit();
            }

            if (wrongLoginLength($login)) {
                header("Location:../signupForm.php?err=loginLength");
                exit();
            }

            if (wrongPasswordLength($password)) {
                header("Location:../signupForm.php?err=passwordLength");
                exit();
            }

            if (invalidEmail($email)) {
                header("Location:../signupForm.php?err=invalidEmail;");
                exit();
            }

            if (passwordMatch($password, $passwordRepeat)) {
                header("Location:../signupForm.php?err=pwdNotMatch");
                exit();
            }


            if ($this->isUserInDb($login)) {
                header("Location:../signupForm.php?err=loginExists");
                exit();
            }

            if ($this->isEmailInDb($email)) {
                header("Location:../signupForm.php?err=emailExists");
                exit();
            }



            $this->addUser($login, $email, $password);

            header("Location:../loginForm.php?msg=postSignUp");
        } else {
            header("Location:signUpForm.php");
        }
    }

    function addChosenFeedingSite($feedId, $userId)
    {
        require_once 'functions.inc.php';
        if (empty($this->isFeedInUserFeedsList($userId, $feedId))) {
            $this->addFeedToUserDb($userId, $feedId);
                alert('Feed added to your database');
                echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check' viewBox='0 0 16 16'>
                         <path d='M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z'/>
                         </svg>
                     Added!";
        } else {
                alert('Feed already in your database');
                echo " <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-square-fill' viewBox='0 0 16 16'>
                 <path d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z'/>
                 </svg>
                 Already in base!";
        }
    }

    

    function addFeedIdBasedOnLink($feedId, $userId)
    {
        $this->addFeedToUserDb($userId, $feedId);
    }


    function deleteFeed($feedSource, $userId)
    {
      $idToDelete = $this->getFeedIdBySource($feedSource);
      $this->deleteFeedFromUserDb($idToDelete["id"], $userId);
      echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-circle-fill' viewBox='0 0 16 16'>
                <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z'/>
            </svg>
            Deleted!";
    }

    function adminDeleteFeed($feedId){
        $this->adminDeleteFeedById($feedId);
        echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-circle-fill' viewBox='0 0 16 16'>
                <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z'/>
            </svg>
            Deleted!";
    }

    function updateFeed($feedId, $feedSource){
        $this->updateFeedSource($feedId, $feedSource);
    }
}
