<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=hospitalE2N', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (Exception $e) {
    die('erreur db');
}