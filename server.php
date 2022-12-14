<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With");

$file_url = './data.json';

$file_text = file_get_contents($file_url);
$todo_list = json_decode($file_text);

// per aggiungere un nuovo task
if (isset($_POST['newTodoText'])) {
    $newTodo = [
        'text' => $_POST['newTodoText'],
        'done' => false
    ];
    array_push($todo_list, $newTodo);

    file_put_contents($file_url, json_encode($todo_list));

    // per gestire il toggle dello status
} elseif (isset($_POST['toggleTodoIndex'])) {
    $todoIndex = $_POST['toggleTodoIndex'];

    if ($todo_list[$todoIndex]->done == 1) {
        $todo_list[$todoIndex]->done = false;
    } else {
        $todo_list[$todoIndex]->done = true;
    }
    file_put_contents($file_url, json_encode($todo_list));

    // per cancellare un task
} elseif (isset($_POST['eraseTodoIndex'])) {
    $todoIndex = $_POST['eraseTodoIndex'];

    array_splice($todo_list, $todoIndex, 1);

    file_put_contents($file_url, json_encode($todo_list));

} else {
    header('Content-Type: application/json');
    echo json_encode($todo_list);
}

?>