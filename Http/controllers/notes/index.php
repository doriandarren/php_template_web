<?php

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);

$user_id = $_SESSION['user']['id'];

$notes = $db->query('select * from notes where user_id = :id', ['id' => $user_id])->get(); // get() first()


view('notes/index.view.php', [
    'heading' => 'Notes',
    'notes' => $notes
]);
