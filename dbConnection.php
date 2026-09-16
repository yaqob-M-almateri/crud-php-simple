//<!-- <?php
//$databaseHost = 'sql202.infinityfree.com';
//$databaseName = 'if0_42878651_crud_db';
//$databaseUsername = 'if0_42878651';
//$databasePassword = 'ynyn12yn';
//
//// Open a new connection to the MySQL server
//$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
//?> -->

<?php
/**
 * Database Connection - Secure Version
 * Loads credentials from environment variables (.env)
 */

// Load .env file
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($key, $value) = explode('=', $line, 2);
        $_ENV[trim($key)] = trim($value);
    }
}

$databaseHost     = $_ENV['DB_HOST'] ?? 'localhost';
$databaseName     = $_ENV['DB_NAME'] ?? 'crud_db';
$databaseUsername = $_ENV['DB_USER'] ?? 'root';
$databasePassword = $_ENV['DB_PASS'] ?? '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (!$mysqli) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>