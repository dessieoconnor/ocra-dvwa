<?php
echo 'hello';
if (PHP_SAPI === 'cli') {
    parse_str(implode('&', array_slice($argv, 1)), $_GET);
}

$file_db = new PDO('sqlite:../database/database.sqlite');

if (NULL == $_GET['id']) $_GET['id'] = 1;

$sql = 'SELECT * FROM employees WHERE employeeId = ' . $_GET['id'];

foreach ($file_db->query($sql) as $row) {
    $employee = $row['LastName'] . " - " . $row['Email'] . "\n";

    echo $employee;
}
echo 'tetsing';

$key = "mysecretkey12345"; // 16 bytes for AES-128
$data = "Hello, World!";

// Encrypt using Mcrypt (DEPRECATED)
$encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_ECB);
echo base64_encode($encrypted);
