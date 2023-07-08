<?php

$host = 'localhost';
$dbName = 'forum';
$username = 'root';
$password = '';

try {
    $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $username, $password);

    return $db;
} catch (\Throwable $error) {
    die("An error ocurred on the database connection : " . $error);
}
