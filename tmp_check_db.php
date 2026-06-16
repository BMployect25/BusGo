<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=busgo_db;charset=utf8", "root", "braman82");
    $res = $pdo->query("SHOW TABLES LIKE '%empresa%'");
    foreach ($res as $row) {
        echo $row[0] . PHP_EOL;
    }
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
