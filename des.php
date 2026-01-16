<?php
echo 'hello';
if (PHP_SAPI === 'cli') {
    parse_str(implode('&', array_slice($argv, 1)), $_GET);
}

$file_db = new PDO('sqlite:../database/database.sqlite');

if (NULL == $_GET['id']) $_GET['id'] = 1;

$sql = 'SELECT * FROM employees WHERE employeeId = :id';
$stmt = $file_db->prepare($sql);
$stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();

foreach ($stmt as $row) {
    $employee = $row['LastName'] . " - " . $row['Email'] . "\n";

    echo $employee;
}

