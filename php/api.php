<?php

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