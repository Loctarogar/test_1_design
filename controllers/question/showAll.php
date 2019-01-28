<?php

include_once '../../core/database.php';
include_once '../../objects/question.php';

$database = new Database();
$conn = $database->getConnection();
$question = new Question($conn);
$stmt = $question->getAllAll()->fetchAll();

?>

<html>
<head>
    <title>All questions with answers</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Q_Id</th>
        <th>Question Name</th>
        <th>A_Id</th>
        <th>Answer Name</th>
        <th>Points</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($stmt as $arr){ ?>
    <tr>
        <th><?php echo $arr["questionId"] ?></th>
        <th><?php echo $arr["questionName"] ?></th>
        <th><?php echo $arr["answer_id"] ?></th>
        <th><?php echo $arr["name"] ?></th>
        <th><?php echo $arr["point"] ?></th>
    </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>
