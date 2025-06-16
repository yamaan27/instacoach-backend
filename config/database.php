<?php
$host = '127.0.0.1';
$db   = 'instacoach';     // ✅ Your database name
$user = 'root';           // ✅ Your MySQL username
$pass = '';               // ✅ Your MySQL password ('' on XAMPP, 'root' on MAMP sometimes)
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // throw exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed.', 'message' => $e->getMessage()]);
    exit;
}
