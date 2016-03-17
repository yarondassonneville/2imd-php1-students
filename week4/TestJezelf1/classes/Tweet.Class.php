<?php
class Tweet {
    private $m_sPost;
    private $m_iUserID;
    public function __set($p_sProperty, $p_vValue)
    {
        switch ($p_sProperty) {
            case "Post":
                $this->m_sPost = $p_vValue;
                break;
            case "UserID":
                $this->m_iUserID = $p_vValue;
                break;
        }
    }
    public function __get($p_sProperty)
    {
        switch ($p_sProperty) {
            case "Post":
                return $this->m_sPost;
                break;
            case "UserID":
                return $this->m_iUserID;
                break;
        }
    }
    public function Save() {
        $PDO =  Db::getInstance();
        $stmt = $PDO->prepare("INSERT INTO tweets (tweet, user_id) VALUES (:tweet, :user_id)");
        $stmt->bindValue(":tweet", $this->m_sPost, PDO::PARAM_STR);
        $stmt->bindValue(":user_id", $this->m_iUserID, PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }
    public function GetAll() {
        $PDO =  Db::getInstance();
        $stmt = $PDO->prepare("SELECT * FROM tweets WHERE user_id = :user_id ORDER BY tweet_id DESC");
        $stmt->bindValue(":user_id", $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
