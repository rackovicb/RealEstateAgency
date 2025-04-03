<?php

$config = require('config.php');
$db = new Database($config['database']);


$heading = 'Real Estate';
$currentUserId = 1;

$real_estate = $db->query('select * from real_estates where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($real_estate['user_id'] === $currentUserId);

require "views/real_estate.view.php";