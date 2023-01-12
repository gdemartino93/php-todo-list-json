<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-Width");

header("Content-Type: application/json");

$value = $_GET["fare"];

$jsonTodoList = file_get_contents("todo.json", true);
$todoList = json_decode($jsonTodoList);

$toDo[]= [
      "task" => "Fare la spesa",
      "completed" => false,
      "fare" => $value
];

$jsonTodoList = json_encode($toDo);
file_put_contents("todo.json", $jsonTodoList);

?>