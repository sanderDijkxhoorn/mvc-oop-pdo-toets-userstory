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
        // SELECT mankement.Datum, mankement.Mankement, instructeur.Naam, instructeur.Email, auto.Kenteken 
        $this->db->query("SELECT mankement.Datum, mankement.Mankement, instructeur.Naam, instructeur.Email, auto.Kenteken, auto.Id, auto.Type from mankement Inner join auto on mankement.AutoId = auto.Id Inner join instructeur on instructeur.Id = auto.InstructeurId WHERE instructeur.Id = :Id order by mankement.Datum desc;");

        $this->db->bind(':Id', 1, PDO::PARAM_INT);

        return $this->db->resultSet();
    }

    public function addMankement($post)
    {
        $sql = "INSERT INTO Mankement(AutoId, Mankement, Datum) VALUES (:AutoId, :Mankement, :Datum)";

        $this->db->query($sql);

        $this->db->bind(':AutoId', $post['AutoId'], PDO::PARAM_INT);
        $this->db->bind(':Mankement', $post['Mankement'], PDO::PARAM_STR);
        $this->db->bind(':Datum', date("Y-m-d"), PDO::PARAM_STR);

        return $this->db->execute();
    }
}
