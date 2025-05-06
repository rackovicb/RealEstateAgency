<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userId = $_SESSION['user']['id'];

$favorites = $db->query("
    SELECT re.*
    FROM real_estates re
    JOIN favorites f ON re.id = f.real_estate_id
    WHERE f.user_id = :user_id
", [
    'user_id' => $userId
])->get();

view('favorites/index.view.php', [
    'heading' => 'Your Favorites',
    'real_estates' => $favorites
]);
