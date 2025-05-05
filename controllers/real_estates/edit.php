<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['id'] ?? null;


$real_estate = $db->query('select * from real_estates where id = :id', [
      'id' => $_GET['id']
 ])->findOrFail();

authorize($real_estate['user_id'] === $currentUserId);


view("/real_estates/edit.view.php",[
    'heading' => 'Edit Estate',
    'errors'=> [],
    'real_estate' => $real_estate
]);