<?php
header("Content-Type: application/json");

include_once '../../config/database.php';
include_once '../../models/Task.php';

$database = new Database();
$db = $database->connect();

$task = new Task($db);
$result = $task->read();

$num = $result->rowCount();

if($num > 0) {
    $tasks_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $task_item = array(
            "id" => $id,
            "title" => $title,
            "description" => $description
        );

        array_push($tasks_arr, $task_item);
    }

    echo json_encode($tasks_arr);
} else {
    echo json_encode(["message" => "Nessun task trovato"]);
}
?>