<?php
$dsn = 'mysql:host=localhost;dbname=book_db';
$username = 'webuser';
$password = 'Admin@1234!';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];


try {
    $pdo = new PDO($dsn, $username, $password, $options);
    echo "Connected successfully.";
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
?>

