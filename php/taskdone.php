<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
header("Content-Type: application/json");

$jsonString = file_get_contents("todo.json");
$todoList = json_decode($jsonString);

$id = $_GET["id"];
$task = $todoList[$id];

if($task -> completed == true){
    $task -> completed = false;
}else{
    $task -> completed = true;
}

$todoList = json_encode($todoList);
$jsonString = file_put_contents("todo.json" , $todoList);