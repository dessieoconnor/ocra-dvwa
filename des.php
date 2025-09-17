<?php
echo 'hello';
if (PHP_SAPI === 'cli') {
    parse_str(implode('&', array_slice($argv, 1)), $_GET);
}

$file_db = new PDO('sqlite:../database/database.sqlite');

if (NULL == $_GET['id']) $_GET['id'] = 1;

$sql = 'SELECT * FROM employees WHERE employeeId = ' . $_GET['id'];

foreach ($file_db->query($sql) as $row) {
    $employee = htmlentities($row['LastName'], ENT_QUOTES, 'UTF-8') . " - " . htmlentities($row['Email'], ENT_QUOTES, 'UTF-8') . "\n";

    echo $employee;
}
echo 'tetsing';

