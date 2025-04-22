<?php

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);


$currentUserId = 1;


$real_estate = $db->query('select * from real_estates where id = :id', [
        'id' => $_POST['id']
])->findOrFail();

authorize($real_estate['user_id'] === $currentUserId);

$db->query('delete from real_estates where id = :id',[
    'id' => $_POST['id']
]);

   
header('location: /real_estates');
exit();

