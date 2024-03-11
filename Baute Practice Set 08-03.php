<?php
$dbh = new PDO('mysql:host=localhost;dbname=records_app', 'root', '');

$sqlFile = 'records_app.sql';
$sql = file_get_contents($sqlFile);

$queries = explode(';', $sql);

$dbh->beginTransaction();

$rowCount = 0;

foreach ($queries as $query) {

    $query = trim($query);
    if (!empty($query)) {
        $dbh->exec($query);
        $rowCount++;
    }
    
    if ($rowCount >= 200) {
        break;
    }
}

// Commit
$dbh->commit();

echo "Fake data loaded successfully!";
?>