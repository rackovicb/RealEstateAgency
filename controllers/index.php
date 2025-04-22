<?php

$_SESSION['name'] = 'Bosko';

view("index.view.php",[
    'heading' => 'Home'
]);