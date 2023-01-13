<?php

$todoList = [
    [
        "text" => "prima cosa",
        "completed" => false
    ],
    [
        "text" => "seconda cosa",
        "completed" => false
    ],
    [
        "text" => "terza cosa",
        "completed" => false
    ]
];

$jsonTodoList = json_encode($todoList);
file_put_contents("todo.json", $jsonTodoList);

