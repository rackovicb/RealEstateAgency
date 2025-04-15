<?php

use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
 
    
    if(! Validator ::string($_POST['name'],4,15)){
        $errors['name'] = 'The name of no more than 15 caracters is required';
    }

    if(empty($errors)){
        $db->query('INSERT INTO real_estates(name, description , price , location, user_id)
        VALUES (:name, :description, :price, :location, :user_id)',[
            'name'=> $_POST['name'],
            'description'=> $_POST['description'],
            'price'=> $_POST['price'],
            'location'=> $_POST['location'],
            'user_id'=> 1
        ]);
    }
}

view("/real_estates/create.view.php",[
    'heading' => 'Create Estate',
    'errors'=> $errors
]);