<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;


$real_estate = $db->query('select * from real_estates where id = :id', [
      'id' => $_POST['id']
 ])->findOrFail();

authorize($real_estate['user_id'] === $currentUserId);

$errors = [];
 
if(! Validator ::string($_POST['name'],4,15)){
    $errors['name'] = 'The name of no more than 15 caracters is required';
}


if (count($errors)) {
    return view('real_estates/edit.view.php', [
        'heading' => 'Edit Estate',
        'errors' => $errors,
        'real_estate' => $real_estate
    ]);
}

$db->query('update real_estates set name = :name where id = :id', [
    'id' => $_POST['id'],
    'name' => $_POST['name']
]);


header('location: /real_estates');
 die();