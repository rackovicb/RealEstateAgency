<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$real_estates = $db->query('select * from real_estates where user_id = 1')->get();


view("/real_estates/index.view.php",[
    'heading' => 'Real Estates',
    'real_estates'=> $real_estates
]);