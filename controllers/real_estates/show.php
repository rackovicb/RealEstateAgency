<?php


use Core\Database;


$config = require base_path('config.php');
$db = new Database($config['database']);


$currentUserId = 1;

$real_estate = $db->query('select * from real_estates where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($real_estate['user_id'] === $currentUserId);


view("/real_estates/show.view.php",[
    'heading' => 'Real Estate',
    'real_estate'=> $real_estate
]);