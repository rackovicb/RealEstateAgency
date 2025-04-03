<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Real Estates';

$real_estates = $db->query('select * from real_estates where user_id = 1')->get();

require "views/real_estates.view.php";