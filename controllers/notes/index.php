<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Notes';

$notes = $db->query('select * from notes where user_id = 1')->get(); // get() first()

require 'views/notes/index.view.php';
