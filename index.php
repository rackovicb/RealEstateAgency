<?php

require 'functions.php';
require 'Database.php';
//require 'router.php';

$config = require ('config.php');
$db=new Database($config['database']);

$id = $_GET['id'];

$query= "select * from real_estates where id = :id";


$real_estates = $db -> query($query, ['id' => $id])->fetchAll();

dd($real_estates);
