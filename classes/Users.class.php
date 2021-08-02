<?php

class Users extends Dbh
{
    // tylkio users rozmawia z bazą 
    // wyszukiwanie feedow, uzytkownik cos wprowadza       
    // tutaj tylko zapytania, wyświetlanie w view 

    function addUser($login, $email, $password)
    {
        $hash_pwd = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(email, login, password) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email, $login, $hash_pwd]);
    }

    function addUserFeedsTable($id)
    {
        $sql = "INSERT INTO user_feeds(id) VALUES (?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    function createUserFeedsTable($login)
    {
        $sql = "CREATE TABLE $login (`id` INT(255) UNSIGNED NOT NULL AUTO_INCREMENT , `feed_id` INT(10) NOT NULL,
                 PRIMARY KEY (`id`)) ENGINE = InnoDB";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }

    protected function isUserInDb($login)
    {
        $sql = "SELECT login FROM users WHERE login = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$login]);
        $results = $stmt->fetchAll();
        $results = count($results);
        return $results;
    }

    protected function isEmailInDb($email)
    {
        $sql = "SELECT email FROM users WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $results = $stmt->fetchAll();
        $results = count($results);
        return $results;
    }

    protected function getIdFromUserTable($login, $email)
    {
        $sql = "SELECT id FROM users WHERE email = ? AND login = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email, $login]);
        $results = $stmt->fetch();
        $return = $results[0];
        return $return;
    }



    function getUserByLoginAndPwd($login, $password)
    {

        $sql = "SELECT password FROM users WHERE login = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$login]);
        $results = $stmt->fetch();
        if (password_verify($password, $results['password'])) {
            $sql = "SELECT * FROM users WHERE login = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$login]);
            $results = $stmt->fetch();
        } else {
            header("Location:../index.php?err=invalidLoginOrPwd");
            exit();
        }

        return $results;
    }


    protected function showFeeds($login)
    {
        // todo wyświetlanie feedów


    }

    protected function getFeedsFromDatabase($login){
        //$sql = "SELECT feed_id FROM $login";
        $sql = "SELECT f.source FROM feeds f, $login u WHERE u.feed_id = f.id";
        
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }


}
