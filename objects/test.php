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
        $query = "INSERT INTO ".$this->table." (name)
                  VALUES (?)
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$this->name]);
        $testId = $this->db->lastInsertId();

        return $testId;
    }

    public function getAll(){
        $query = "SELECT test.test_id AS testId, test.name AS testName,
                         question.question_id AS questionId, question.name AS questionName  
                  FROM ".$this->table."
                  LEFT JOIN question
                  ON test.test_id = question.test_id
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}