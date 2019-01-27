<?php

include_once '../../core/database.php';
include_once '../../objects/test.php';

if(isset($_POST["form"])){
    $database = new Database();
    $conn = $database->getConnection();
    $test = new Test($conn);
    $test->setName($_POST["name"]);
    $stmt = $test->addTest();
    $result = $stmt->rowCount();
    if($result > 0){
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
<form action="addTest.php" method="post">
    <input type="hidden" name="form">
    <input type="text" name="name">
    <input type="submit" name="Submit">
</form>
</body>
</html>
