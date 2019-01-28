<?php

include_once '../../core/database.php';
include_once '../../objects/test.php';

$database = new Database();
$conn = $database->getConnection();
$test = new Test($conn);
$allTests = $test->getAll()->fetchAll();

?>

<html>
<head>
    <title>All Tests</title>
</head>
<body>
<h2>All tests + questions</h2>
<table>
    <thead>
    <tr>
        <th>Test_Id</th>
        <th>Test_Name</th>
        <th>Question_Id</th>
        <th>Question_Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($allTests as $arr){ ?>
    <tr>
        <th><?php echo $arr["testId"] ?></th>
        <th><?php echo $arr["testName"] ?></th>
        <th><?php echo $arr["questionId"] ?></th>
        <th><?php echo $arr["questionName"] ?></th>
    </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>
