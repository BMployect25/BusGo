<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=busgo_db;charset=utf8', 'root', 'braman82');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cols = $db->query('SHOW COLUMNS FROM usuarios')->fetchAll(PDO::FETCH_ASSOC);
    foreach ($cols as $c) {
        echo $c['Field'] . ' ' . $c['Type'] . ' ' . ($c['Null'] === 'NO' ? 'NOT NULL' : 'NULL') . "\n";
    }
    echo "\n";
    $row = $db->query('SELECT * FROM usuarios LIMIT 1')->fetch(PDO::FETCH_ASSOC);
    var_export($row);
} catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>
