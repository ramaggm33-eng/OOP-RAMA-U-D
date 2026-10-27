<?php

$host = "localhost";
$dbname = "library";
$username = "root";
$pass = "root";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    die("Connection failed: " . $ex->getMessage());
}