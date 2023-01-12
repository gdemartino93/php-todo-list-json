<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

header("Content-Type: application/json");

$value = $_GET["task"];

$jsonTodoList = file_get_contents("./todo.json", true);
$todoList = json_decode($jsonTodoList);

$toDo[]= [
      "id" => 100,
      "task" => $value,
      "completed" => false,
 
];


var_dump($toDo);
file_put_contents("todo.json", json_encode($toDo));


?>