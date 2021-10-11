
<?php // login.php

$hn = '127.0.0.1';
$un = 'staff';
$pw = 'admin123';
$db = 'UNIVERSITY';
$conn = new mysqli($hn, $un, $pw, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>