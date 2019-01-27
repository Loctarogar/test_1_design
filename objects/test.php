<?php

class Test
{
    protected $db;
    protected $table = "test";
    private $name;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function addTest(){
        $query = "INSERT INTO ".$this->table."
                  VALUES (0, ?)
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$this->name]);

        return $stmt;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}