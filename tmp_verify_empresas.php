<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=busgo_db;charset=utf8', 'root', 'braman82');
    $count = $pdo->query('SELECT COUNT(*) AS c FROM empresas')->fetch(PDO::FETCH_ASSOC);
    echo $count['c'] . PHP_EOL;
} catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage() . PHP_EOL;
}
