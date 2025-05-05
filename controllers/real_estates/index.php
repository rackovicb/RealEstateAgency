<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$real_estates = $db->query('SELECT * FROM real_estates')->get();


$locationStats = $db->query("
    SELECT location, COUNT(*) as count
    FROM real_estates
    GROUP BY location
")->get();

view("real_estates/index.view.php", [
    'heading' => 'Welcome',
    'real_estates' => $real_estates,
    'locationStats' => $locationStats
]);