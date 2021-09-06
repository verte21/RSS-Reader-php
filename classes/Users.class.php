<?php

class Users extends Dbh
{

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
            header("Location:../loginForm.php?err=invalidLoginOrPwd");
            exit();
        }

        return $results;
    }

    protected function getFeedsFromDatabase($login)
    {

        $sql = "SELECT f.source  FROM feeds f, $login u WHERE u.feed_id = f.id";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }


    function getRandomFeeds($howManyFeedsToGet)
    {
        $sql = "SELECT * FROM feeds AS t1 JOIN (SELECT id FROM feeds ORDER BY RAND() LIMIT $howManyFeedsToGet) as t2 ON t1.id=t2.id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }


    function isFeedInUserFeedsList($user, $feedId)
    {
        $sql = "SELECT * FROM $user WHERE feed_id = $feedId";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
        
    function addFeedToUserDb($login, $id)
    {
        $sql = "INSERT INTO $login (`id`, `feed_id`) VALUES (NULL, $id)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }

    function linkContent($link)
    {
        $sql = "SELECT * FROM feeds WHERE source = '$link'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetch();
        return $results;
    }

    function addFeed($link)
    {
        $sql = "INSERT INTO `feeds` (`id`, `source`) VALUES (NULL, '$link')";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }

    function getFeedIdBySource($source)
    {
        $sql = "SELECT id FROM feeds WHERE source = '$source'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetch();
        return $results;
    }

    function deleteFeedFromUserDb($feedId, $login)
    {
        $sql = "DELETE FROM $login WHERE $login.`feed_id` = $feedId";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

    }


} // end