<?php

require base_path('bootstrap.php');

use Core\App;
use Core\Database;

header('Content-Type: application/json');

if (!isset($_SESSION['user'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
    exit();
}

$db = App::resolve(Database::class);

$userId = $_SESSION['user']['id'];
$request = json_decode(file_get_contents('php://input'), true);

$realEstateId = $request['real_estate_id'] ?? null;

if (!$realEstateId) {
    echo json_encode(['success' => false, 'message' => 'Real estate ID is missing.']);
    exit();
}

$exists = $db->query(
    "SELECT * FROM favorites WHERE user_id = :user_id AND real_estate_id = :real_estate_id",
    [
        'user_id' => $userId,
        'real_estate_id' => $realEstateId
    ]
)->find();

if (!$exists) {
    echo json_encode(['success' => false, 'message' => 'Favorite not found.']);
    exit();
}

$db->query(
    "DELETE FROM favorites WHERE user_id = :user_id AND real_estate_id = :real_estate_id",
    [
        'user_id' => $userId,
        'real_estate_id' => $realEstateId
    ]
);

echo json_encode(['success' => true, 'message' => 'Removed from favorites.']);
