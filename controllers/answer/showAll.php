<?php

include_once '../../core/database.php';
include_once '../../objects/answer.php';

$database = new Database();
$conn = $database->getConnection();
$answer = new Answer($conn);
$allAnswers = $answer->getAll();
while($row = $allAnswers->fetch()){
    echo $row['name']."<br>";
}
/**
$allAnswers = $answer->getAll()->fetchAll();

foreach ($allAnswers as $arr){
    foreach ($arr as $key => $value){
        echo $key." => ".$value."<br>";
    }
    echo "/-/-/-/-/ <br>";
}
print_r($allAnswers);
 */