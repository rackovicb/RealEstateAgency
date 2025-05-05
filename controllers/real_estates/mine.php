<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userId = $_SESSION['user']['id'];

$real_estates = $db->query('SELECT * FROM real_estates WHERE user_id = :user_id', [
    'user_id' => $userId
])->get();

view('real_estates/mine.view.php', [
    'heading' => 'My Properties',
    'real_estates' => $real_estates
]);
