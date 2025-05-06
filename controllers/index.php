<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$locations = ['Beograd', 'Novi Sad', 'Kragujevac', 'Cacak', 'Nis'];
$selectedLocation = $_GET['location'] ?? '';

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

view("index.view.php", [
    'heading' => 'Welcome',
    'real_estates' => $real_estates,
    'locationStats' => $locationStats,
    'locations' => $locations,                     
    'selectedLocation' => $selectedLocation     
]);
