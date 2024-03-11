<?php
require_once __DIR__ . '/vendor/autoload.php';

use Faker\Factory;

$faker = Factory::create();

$dbh = new PDO('mysql:host=localhost;dbname=records_app', 'root', '');

// Startt
$dbh->beginTransaction();

for ($i=0; $i<100; $i++) {
    //fake data
    $email = $faker->email;
    $lastName = $faker->lastName;
    $firstName = $faker->firstName;
    $userName = $faker->userName;
    $password = $faker->password;


    $stmt = $dbh->prepare("INSERT INTO userAccount (email, lastname, firstname, username, password) VALUES (?, ?, ?, ?, ?)");

   
    $stmt->execute([$email, $lastName, $firstName, $userName, $password]);
}

$dbh->commit();
?>