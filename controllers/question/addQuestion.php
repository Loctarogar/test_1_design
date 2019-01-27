<?php

if(isset($_POST['formSubmitted'])){
    include_once '../../core/database.php';
    include_once '../../objects/question.php';

    $database = new Database();
    $conn = $database->getConnection();
    $question = new Question($conn);
    $question->setName($_POST['question']);
    $stmt = $question->addQuestion();
    $result = $stmt->rowCount();
    if($result > 0){
        echo "ok";
    }else{
        echo "not ok";
    }
}



?>

<html>
<head>
    <title>Add question</title>
</head>
<body>
    <p>
        Create new question
    </p>
    <form action="addQuestion.php" method="POST">
        <input type="hidden">
        Type new question: <br>
        <input type="text" name="question"> <br>
        <input type="submit" name="formSubmitted" value="Submit">
    </form>
</body>
</html>

