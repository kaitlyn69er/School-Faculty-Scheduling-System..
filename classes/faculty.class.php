<?php

require_once 'database.php';

class Faculty{
    //attributes

    public $id;
    public $id_no;
    public $firstname;
    public $middlename;
    public $lastname;
    public $contact;
    public $gender= 'None';
    public $address;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add(){
        $sql = "INSERT INTO faculty (id, id_no, firstname, middlename, lastname, contact, gender, address) VALUES 
        (:id, :id_no, :firstname, :middlename, :lastname, :contact, :gender, address);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $this->id);
        $query->bindParam(':id_no', $this->id_no);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':middlename', $this->middlename);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':contact', $this->contact);
        $query->bindParam(':gender', $this->gender);
        $query->bindParam(':address', $this->address);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function show(){
        $sql = "SELECT * FROM faculty ORDER BY CONCAT('lastname',', ','firstname') ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

}

?>