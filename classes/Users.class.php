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

    protected function getFeedsFromDatabase($userId)
    {

        $sql = "SELECT f.source  FROM feeds f, subscriptions s WHERE s.user_id = $userId && s.feed_id = f.id";

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


    function isFeedInUserFeedsList($userId, $feedId)
    {
        $sql = "SELECT * FROM subscriptions WHERE feed_id = $feedId && user_id = $userId";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
        
    function addFeedToUserDb($userId, $feedId)
    {
        $sql = "INSERT INTO subscriptions (`id` ,`user_id`, `feed_id`) VALUES (NULL, $userId, $feedId)";
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

    function deleteFeedFromUserDb($feedId, $userId)
    {
        $sql = "DELETE FROM subscriptions WHERE user_id = $userId AND feed_id = $feedId";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }
    function adminDeleteFeedById($feedId){
        $sql = "DELETE FROM feeds WHERE id = $feedId";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }



    function deleteFeedFromFeedsDb($feedId)
    {
        $sql = "DELETE FROM feeds WHERE id = $feedId";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }

    function getFeeds($howMany, $fromWhere)
    {
        $sql = "SELECT * FROM feeds ORDER BY id LIMIT $fromWhere, $howMany";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;

    }

    function howManyPagesOnPanelAdmin($howManyRecordsOnPage, $queryString){
        if (!empty($queryString)){
            $sql = "SELECT CEIL((SELECT COUNT(id) FROM feeds WHERE `source` LIKE '%$queryString%')/$howManyRecordsOnPage) 
                        AS numberOfPages";
        } else {
            $sql = "SELECT CEIL((SELECT COUNT(id) FROM feeds)/$howManyRecordsOnPage) AS numberOfPages";
        }
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetch();
        return $results;
    }

    function searchByText($string, $fromWhere, $howMany){
        $sql = "SELECT * FROM `feeds` WHERE `source` LIKE '%$string%' LIMIT $fromWhere, $howMany";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }

    function updateFeedSource($id ,$source){
        $sql = "UPDATE `feeds` SET `source` = '$source' WHERE `feeds`.`id` = $id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }


} // end