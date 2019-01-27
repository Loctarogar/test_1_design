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
        $query = "SELECT answer.answer_id, answer.name, answer.point, question.name, question.question_id 
                  FROM answer 
                  LEFT JOIN question 
                  on question.question_id = answer.question_id
                  ";

        /**
        $query = "SELECT answer.answer_id, answer.name, question.question_id, question.name
                  FROM ".$this->table."
                  LEFT JOIN question
                  ON question.question_id = answer.question_id
        ";
         */
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