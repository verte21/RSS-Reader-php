<?php

class Users extends Dbh {
    // tylkio users rozmawia z bazą 
    // wyszukiwanie feedow, uzytkownik cos wprowadza       
    // tutaj tylko zapytania, wyświetlanie w view 

    function addUser($login, $email, $password){
        $hash_pwd = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(email, login, password) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email, $login, $hash_pwd]);
    }

    protected function getUser($login){
        $sql = "SELECT * FROM users WHERE login = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$login]);
        $results = $stmt->fetchAll();
        return $results;
    }
 
    protected function getUserByLogin($login){
        $sql = "SELECT * FROM users WHERE login = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$login]);
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getUserByEmail($email){
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $results = $stmt->fetchAll();
        return $results;
    }


    protected function showFeeds($login){
        // todo wyświetlanie feedów


    }





}