<?php


use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);


$real_estates = $db->query('select * from real_estates where user_id = 1')->get();


view("/real_estates/index.view.php",[
    'heading' => 'Real Estates',
    'real_estates'=> $real_estates
]);