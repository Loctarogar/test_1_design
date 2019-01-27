<?php

class Answer
{
    protected $db;
    protected $table = "answer";
    private $name;
    private $point;
    private $questionId;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function addAnswer(){
        $query = "INSERT INTO ".$this->table."
                  VALUES (0, ?, ?, ?) 
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $this->name,
            $this->questionId,
            $this->point
        ]);

        return $stmt;
    }

    public function getAll(){
        $query = "SELECT answer.answer_id, answer.name, question.question_id, question.name AS q_name
                  FROM ".$this->table."
                  LEFT JOIN question
                  ON question.question_id = answer.question_id
                  ORDER BY question.question_id ASC
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function setName($answerName){
        $this->name = $answerName;
    }

    public function setPoint($point)
    {
        $this->point = $point;
    }

    public function setQuestionId($questionId)
    {
        $this->questionId = $questionId;
    }
}