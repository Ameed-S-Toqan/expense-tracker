<?php
declare(strict_types=1);

/**
 * Loads the local configuration and creates a PDO connection.
 * config.php is local-only; copy config.example.php to create it.
 */
$configPath = dirname(__DIR__) . '/config.php';

if (!is_file($configPath)) {
    http_response_code(500);
    exit(
        'Local configuration is missing. Copy config.example.php to config.php, ' .
        'configure your database credentials, and reload this page.'
    );
}

$config = require $configPath;

try {
    $dsn = sprintf(
        'mysql:host=%s;dbname=%s;charset=%s',
        $config['host'] ?? '127.0.0.1',
        $config['database'] ?? 'expense_tracker',
        $config['charset'] ?? 'utf8mb4'
    );

    $pdo = new PDO($dsn, (string)($config['username'] ?? 'root'), (string)($config['password'] ?? ''), [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $exception) {
    error_log('Expense Tracker database connection failed: ' . $exception->getMessage());
    http_response_code(500);
    exit('Unable to connect to the database. Check the local configuration and ensure MySQL is running.');
}
