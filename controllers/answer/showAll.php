<?php

include_once '../../core/database.php';
include_once '../../objects/answer.php';

$database = new Database();
$conn = $database->getConnection();
$answer = new Answer($conn);
//$allAnswers = $answer->getAll()->fetchAll();
$allAnswers = $answer->getAll();
$arrayA = [];
while($row = $allAnswers->fetch()){
    $arrayA["answerId"][] = $row["answer_id"];
    $arrayA["answerName"][] = $row["name"];
    $arrayA["questionId"][] = $row["question_id"];
    $arrayA["questionName"][] = $row["q_name"];
}

?>

<html>
<head>
    <title>
        All answers
    </title>
</head>
<body>
<h2>All answers </h2>
<table>
    <tr>
        <th>answerId</th>
        <th>answerName</th>
        <th>questionId</th>
        <th>questionName</th>
    </tr>
    <?php for($i = 0; $i <= count($arrayA["answerId"]); $i++){ ?>
    <tr>
        <th><?php echo $arrayA["answerId"][$i] ?></th>
        <th><?php echo $arrayA["answerName"][$i] ?></th>
        <th><?php echo $arrayA["questionId"][$i] ?></th>
        <th><?php echo $arrayA["questionName"][$i] ?></th>
    </tr>
    <?php } ?>
</table>
</body>
</html>
