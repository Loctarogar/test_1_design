<?php

include_once '../../objects/answer.php';
include_once '../../objects/question.php';
include_once '../../core/database.php';

$database = new Database();
$conn = $database->getConnection();
$answer = new Answer($conn);
$question = new Question($conn);
$allQuestions = $question->getAll();
$allQIdName = [];
while($row = $allQuestions->fetch()){
    $allQIdName[$row['question_id']] = $row['name'];
}
$p = $_POST;
//print_r($allQuestions->fetchAll());
if(isset($_POST['submit'])){
    $answer->setName($_POST['name']);
    $answer->setPoint((int)$_POST['point']);
    $answer->setQuestionId(((int)$_POST['questionId']));
    $stmt = $answer->addAnswer();
    if($stmt->rowCount() > 0){
        echo "ok";
    }else{
        echo "not ok";
    }
}else{
?>

<html>
<head>
    <title>
        Add Answer
    </title>
</head>
<body>
<form action="addAnswer.php" method="post">
    <input type="hidden" name="submit" value="1">
    Create new answer: <br>
    Answer:
    <input type="text" name="name"><br>
    Points:
    <input type="text" name="point"><br>
    Choose question:   <br>
    <select name="questionId">
        <?php foreach ($allQIdName as $key => $value){ ?>
            <option value="<?php echo $key ?>"><?php echo $value?></option>
        <?php } ?>
    </select>
    <br>
    <input type="submit" value="Submit">
</form>
</body>
</html>
<?php } ?>