<?php

use Core\App;
use Core\Validator;
use Core\Database;

require base_path('bootstrap.php');

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

$imagePath = null;

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['image']['tmp_name'];
    $fileName = basename($_FILES['image']['name']);
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

if (in_array($fileExtension, $allowedExtensions)) {
    $newFileName = uniqid() . '.' . $fileExtension;
    $uploadDir = 'public/uploads/';
    $destination = $uploadDir . $newFileName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    if (move_uploaded_file($fileTmpPath, $destination)) {
        $imagePath = $newFileName;
    }
}

}

$db->query('INSERT INTO real_estates(name, description , price , location, image, user_id)
VALUES (:name, :description, :price, :location, :image, :user_id)',[
    'name'=> $_POST['name'],
    'description'=> $_POST['description'],
    'price'=> $_POST['price'],
    'location'=> $_POST['location'],
    'image'=> $imagePath,
    'user_id' => $_SESSION['user']['id']
]);

header('location: /real_estates');
exit();


 
    
    