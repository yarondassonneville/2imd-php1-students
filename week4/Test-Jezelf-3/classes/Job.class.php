<?php
class Job {
    private $m_sJobTitle;
    private $m_sJobFromUntil;
    private $m_sJobDescription;

    public function __set($p_sProperty, $p_vValue)
    {
        switch($p_sProperty) {
            case "JobTitle":
                $this->m_sJobTitle = $p_vValue;
                break;

            case "JobFromUntil":
                $this->m_sJobFromUntil = $p_vValue;
                break;

            case "JobDescription":
                $this->m_sJobDescription = $p_vValue;
                break;
        }
    }

    public function __get($p_sProperty)
    {
        switch($p_sProperty) {
            case "JobTitle":
                return $this->m_sJobTitle;
                break;

            case "JobFromUntil":
                return $this->m_sJobFromUntil;
                break;

            case "JobDescription":
                return $this->m_sJobDescription;
                break;
        }
    }

    public function Save() {
        $PDO = new Db();
        $stmt = $PDO->prepare("insert INTO jobs (jobTitle, jobFromUntil, jobDescription) VALUES(:jobTitle, :jobFromUntil, :jobDescription);");
        $stmt->bindValue(":jobTitle", $this->JobTitle, PDO::PARAM_STR);
        $stmt->bindValue(":jobFromUntil", $this->JobFromUntil, PDO::PARAM_STR);
        $stmt->bindValue(":jobDescription", $this->JobDescription, PDO::PARAM_STR);
        $result = $stmt->execute();

        return $result;
    }

    public function GetAll() {
        $PDO = new Db();

        $stmt = $PDO->query("SELECT * FROM jobs");
        $stmt->execute();
        $result = $stmt->fetchAll($PDO::FETCH_ASSOC);
        return $result;
    }
}
