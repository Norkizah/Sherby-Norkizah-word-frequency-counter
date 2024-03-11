<?php
require_once __DIR__ . '/vendor/autoload.php';

use Faker\Factory;

$faker = Factory::create();

$dbh = new PDO('mysql:host=localhost;dbname=records_app', 'root', '');

$dbh->beginTransaction();

for ($i = 1; $i <= 20; $i++) {
    $ccid = $i;
    $creditCardType = $faker->creditCardType;
    $creditCardNumber = $faker->creditCardNumber;
    $creditCardExpirationDate = $faker->creditCardExpirationDateString;
    $userIdNumber = $faker->numberBetween(1, 100);

    $stmt = $dbh->prepare("INSERT INTO cardDetail (ccid, creditCardType, creditCardNumber, creditCardExpirationDate, userIdNumber) VALUES (?, ?, ?, ?, ?)");

    $stmt->execute([$ccid, $creditCardType, $creditCardNumber, $creditCardExpirationDate, $userIdNumber]);
}

// Commit
$dbh->commit();
?>