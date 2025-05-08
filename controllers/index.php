<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$locations = ['Beograd', 'Novi Sad', 'Kragujevac', 'Cacak', 'Nis'];
$selectedLocation = $_GET['location'] ?? null;

if ($selectedLocation) {
    $real_estates = $db->query(
        "SELECT * FROM real_estates WHERE location = :location", 
        ['location' => $selectedLocation]
    )->get();
} else {
    $real_estates = $db->query("SELECT * FROM real_estates")->get();
}

$locationStats = $db->query("
    SELECT location, COUNT(*) as count
    FROM real_estates
    GROUP BY location
")->get();

$favorites = [];

if (isset($_SESSION['user'])) {
    $userId = $_SESSION['user']['id'];
    $favoriteRecords = $db->query(
        "SELECT real_estate_id FROM favorites WHERE user_id = :user_id",
        ['user_id' => $userId]
    )->get();

    $favorites = array_column($favoriteRecords, 'real_estate_id');
}

view("index.view.php", [
    'heading' => 'Welcome',
    'real_estates' => $real_estates,
    'locationStats' => $locationStats,
    'locations' => $locations,                     
    'selectedLocation' => $selectedLocation,
    'favorites'=> $favorites     
]);
