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

    function addUserFeeds($id){
        $sql = "INSERT INTO user-feeds(id) VALUES (?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    protected function getUser($login){
        $sql = "SELECT * FROM users WHERE login = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$login]);
        $results = $stmt->fetchAll();
        return $results;
    }
 
    protected function getUserByLogin($login){
        $sql = "SELECT login FROM users WHERE login = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$login]);
        $results = $stmt->fetch();
        return $results;
        // użyc row count !!!!!!
    }

    protected function getUserByEmail($email){
        $sql = "SELECT email FROM users WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $results = $stmt->fetch();
        return $results;
    }

    protected function getIdFromUserTable($login, $email){
        $sql = "SELECT id FROM users WHERE email = ? AND login = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email, $login]);
        $results = $stmt->fetchAll();
        return $results;
    }


    protected function showFeeds($login){
        // todo wyświetlanie feedów


    }





}