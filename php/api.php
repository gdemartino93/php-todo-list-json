<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Request-Width");

header("Content-Type: application/json");


$toDo = [
    [
      "id" => 1,
      "task" => "Fare la spesa",
      "completed" => false
    ],
    [
      "id"=> 2,
      "task" => "Lavare i piatti",
      "completed" => true
    ]
];
$jsonTodoList = json_encode($toDo);
file_put_contents(__DIR__ . "todo.json", $jsonTodoList);

echo "ok";
?>