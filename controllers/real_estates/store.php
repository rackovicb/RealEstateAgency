<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];


if(! Validator ::string($_POST['name'],4,15)){
    $errors['name'] = 'The name of no more than 15 caracters is required';
}

if (! empty($errors)) {
    return view("real_estates/create.view.php", [
        'heading' => 'Create Estate',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO real_estates(name, description , price , location, user_id)
VALUES (:name, :description, :price, :location, :user_id)',[
    'name'=> $_POST['name'],
    'description'=> $_POST['description'],
    'price'=> $_POST['price'],
    'location'=> $_POST['location'],
    'user_id'=> 1
]);

header('location: /real_estates');
exit();


 
    
    