<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['id'];

$real_estate = $db->query('SELECT * FROM real_estates WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($real_estate['user_id'] === $currentUserId);

$errors = [];

if (!Validator::string($_POST['name'], 4, 15)) {
    $errors['name'] = 'The name must be between 4 and 15 characters.';
}

if (!empty($errors)) {
    return view('real_estates/edit.view.php', [
        'heading' => 'Edit Estate',
        'errors' => $errors,
        'real_estate' => $real_estate
    ]);
}

$imagePath = $real_estate['image'];

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

$db->query('UPDATE real_estates 
            SET name = :name, description = :description, price = :price, location = :location, image = :image 
            WHERE id = :id', [
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'description' => $_POST['description'],
    'price' => $_POST['price'],
    'location' => $_POST['location'],
    'image' => $imagePath
]);

header('location: /my-properties');
exit();
