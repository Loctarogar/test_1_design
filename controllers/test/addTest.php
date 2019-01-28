<?php

include_once '../../core/database.php';
include_once '../../objects/test.php';
include_once '../../objects/question.php';
include_once '../../objects/answer.php';

$database = new Database();
$conn = $database->getConnection();
$question = new Question($conn);
$allQuestions = $question->getAll();

if(isset($_POST["questionId"]) && sizeof($_POST["questionId"]) > 0){
    $questions = [];
    foreach ($_POST["questionId"] as $key => $value) {
        $questions[] = $key;
    }

}
if(isset($_POST["form"])){
    $test = new Test($conn);
    $test->setName($_POST["name"]);
    $stmt = $test->addTest();

    if(null !== $stmt){
        foreach ($questions as $key => $value){
            $question->addTest($stmt, $value);
        }
        echo "Test was successfully added";
    }else{
        echo "An error";
    }
}

?>

<html>
<head>
    <title>Add Test</title>
</head>
<body>
<h2>Create new test</h2>
<form action="addTest.php" method="post">
    <input type="hidden" name="form">
    <input type="text" name="name">
    <input type="submit" name="Submit">
    <?php foreach ($allQuestions as $item) { ?>
        <p>
            <input type="checkbox" id="question" name="questionId[<?php echo $item["question_id"]?>]">
            <label for="<?php echo $item["name"]?>"><?php echo $item["name"]?></label>
        </p>
    <?php } ?>
</form>
</body>
</html>
