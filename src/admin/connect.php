<?php
try {
// connect database
    $db = new PDO('mysql:host=localhost; dbname=start_page; charset=utf8', 'root', '');
// sql statement
    $select = $db->query('SELECT * FROM tools');
// display on while loop
    $tools = $select->fetchAll();
} catch (Exception $e) {
    echo "Can not connect to database";
    throw new Exception($e);
}
?>