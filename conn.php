<?php

// enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// disable same site cookie
ini_set('session.cookie_samesite', 'None');

// load credentials
require_once "creds.php";
$link=mysqli_connect($server, $mysql_id, $mysql_pwd, $mysql_db);

// exit on error
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>
