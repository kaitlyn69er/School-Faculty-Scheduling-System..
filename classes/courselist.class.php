<?php

require_once 'database.php';

class Courses{
    //attributes

    public $id;
    public $course;
    public $description;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add(){
        $sql = "INSERT INTO courses (id, course, description) VALUES 
        (:id, :course, :description);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $this->id);
        $query->bindParam(':course', $this->course);
        $query->bindParam(':description', $this->description);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function show(){
        $sql = "SELECT * FROM courses ORDER BY CONCAT('course',', ','description') ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

}

?>