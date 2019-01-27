<?php

class Question
{
    protected $db;
    protected $table = "question";
    private $name;

    public function __construct($conn)
    {
            $this->db = $conn;
    }

    public function addQuestion(){
        $query = "INSERT INTO ".$this->table."
                  VALUES (0, ?)
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$this->name]);

        return $stmt;
    }

    public function getAll(){
        $query = "SELECT * FROM question";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}