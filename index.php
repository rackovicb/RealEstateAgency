<?php

require 'functions.php';
require 'router.php';

$dsn="mysql:host=localhost;port:3306;user=root;dbname=real_estate;charset=utf8mb4";

$pdo=new PDO($dsn);

$statement=$pdo->prepare("select*from real_estates");
$statement->execute();

$real_estates=$statement->fetchAll(PDO::FETCH_ASSOC);
