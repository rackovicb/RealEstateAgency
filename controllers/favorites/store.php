<?php

require base_path('bootstrap.php'); // koristi bazni bootstrap koji se koristi u celoj aplikaciji

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

if (json_last_error() !== JSON_ERROR_NONE || !$request) {
    echo json_encode(['success' => false, 'message' => 'Invalid JSON input.']);
    exit();
}

$realEstateId = $request['real_estate_id'] ?? null;

if (!$realEstateId) {
    echo json_encode(['success' => false, 'message' => 'Real estate ID is missing.']);
    exit();
}

$alreadyExists = $db->query(
    "SELECT * FROM favorites WHERE user_id = :user_id AND real_estate_id = :real_estate_id",
    [
        'user_id' => $userId,
        'real_estate_id' => $realEstateId
    ]
)->find();

if ($alreadyExists) {
    echo json_encode(['success' => false, 'message' => 'Already in favorites.']);
    exit();
}

$db->query(
    "INSERT INTO favorites (user_id, real_estate_id) VALUES (:user_id, :real_estate_id)",
    [
        'user_id' => $userId,
        'real_estate_id' => $realEstateId
    ]
);

http_response_code(200);
echo json_encode(['success' => true, 'message' => 'Added to favorites.']);
