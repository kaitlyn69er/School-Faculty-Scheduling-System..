<?php

require_once 'database.php';

class Subjects{
    //attributes

    public $id;
    public $subject;
    public $description;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add(){
        $sql = "INSERT INTO subjects (id, subject, description) VALUES 
        (:id, :subject, :description);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $this->id);
        $query->bindParam(':subject', $this->subject);
        $query->bindParam(':description', $this->description);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function show(){
        $sql = "SELECT * FROM subjects ORDER BY CONCAT('subject',', ','description') ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

}

?>