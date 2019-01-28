<?php

class Question
{
    protected $db;
    protected $table = "question";
    public $question_id;
    public $name;
    public $test_id;

    public function __construct($conn)
    {
            $this->db = $conn;
    }

    public function addTest($testId, $questionId){
        $query = "UPDATE ".$this->table."
                  SET test_id = :testId
                  WHERE question_id = :questionId
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            "testId" => $testId,
            "questionId" => $questionId
        ]);

        return ;
    }

    public function addQuestion(){
        $query = "INSERT INTO ".$this->table." (name)
                  VALUES (?)
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$this->name]);

        return $stmt;
    }

    public function getAllAll(){
        $query = "SELECT question.question_id AS questionId, question.name AS questionName,
                         answer.answer_id, answer.name, answer.point 
                  FROM ".$this->table."
                  LEFT JOIN answer
                  ON answer.question_id = question.question_id
                  ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function getAll(){
        $query = "SELECT * FROM ".$this->table."
                  WHERE test_id = NULL
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setTestId($test_id)
    {
        $this->test_id = $test_id;
    }
}