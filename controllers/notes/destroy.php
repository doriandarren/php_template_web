<?php

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);


$currentUserId = 1;


// Entra aqui para eliminar la nota

$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    [
        'id' => $_POST['id']
    ]
)->findOrFail(); // get() first()


authorize($note['user_id'] === $currentUserId);


$db->query('DELETE FROM notes WHERE id = :id', [
    'id' => $_POST['id']
]);

// Redirecciona a una página
header('Location: /notes');
exit();
