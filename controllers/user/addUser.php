<?php

include_once "../../core/database.php";
include_once "../../objects/user.php";

if(isset($_POST["form"])){
    $database = new Database();
    $conn = $database->getConnection();
    $user = new User($conn);
    $user->setName($_POST["name"]);
    $stmt = $user->addUser();
    if($stmt->rowCount() > 0){
        echo "user was successfully added";
    }else{
        echo "something went wrong";
    }
}

?>

<html>
<head>
    <title>Add User</title>
</head>
<body>
<form action="addUser.php" method="post">
    <input type="hidden" name="form">
    <input type="text" name="name">
    <input type="submit" value="Submit">
</form>
</body>
</html>
