<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);


$currentUserId = 1;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Entra aqui para eliminar la nota

    $note = $db->query(
        'SELECT * FROM notes WHERE id = :id', [
            'id' => $_POST['id']
        ])->findOrFail(); // get() first()


    authorize($note['user_id'] === $currentUserId);


    $db->query('DELETE FROM notes WHERE id = :id', [
        'id' => $_POST['id']
    ]);

    // Redirecciona a una página
    header('Location: /notes');
    exit();

} else {

    // Entra aqui para mostrar la nota

    $note = $db->query(
        'SELECT * FROM notes WHERE id = :id', [
            'id' => $_GET['id']
        ])->findOrFail(); // get() first()


    authorize($note['user_id'] === $currentUserId);



    view('notes/show.view.php', [
        'heading' => 'Note',
        'note' => $note
    ]);
}
