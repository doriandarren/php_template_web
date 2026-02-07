<?php

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);


$currentUserId = 1;


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

