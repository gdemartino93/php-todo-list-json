<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Request-Width");

header("Content-Type: application/json");

$value = $_GET["fare"];


// $toDo = [
//     [
//       "id" => 1,
//       "task" => "Fare la spesa",
//       "completed" => false,
//       "fare" => $value
//     ],
//     [
//       "id"=> 2,
//       "task" => "Lavare i piatti",
//       "completed" => true
//     ]
// ];
$jsonTodoList = file_get_contents("todo.json", true);
$todoList = json_decode($jsonTodoList);

$toDo[]= [
      "task" => "Fare la spesa",
      "completed" => false,
      "fare" => $value
],

$jsonTodoList = json_encode($toDo);
file_put_contents("todo.json", $jsonTodoList);

?>