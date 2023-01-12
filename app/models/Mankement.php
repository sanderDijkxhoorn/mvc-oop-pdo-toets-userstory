<?php
class Mankement
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getMankementen()
    {
        $this->db->query("SELECT * FROM `Mankement` WHERE AutoId = :Id ORDER BY `Mankement`.`Datum` DESC;");

        $this->db->bind(':Id', 2, PDO::PARAM_INT);

        $result = $this->db->resultSet();

        return $result;
    }
}
