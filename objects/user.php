<?php

class User
{
    protected $db;
    protected $table = "customer";
    private $name;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function addUser(){
        $query = "INSERT INTO ".$this->table."
                  VALUES(0, ?) 
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $this->name
        ]);

        return $stmt;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}