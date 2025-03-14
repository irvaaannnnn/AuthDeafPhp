<?php

$hotsname = "Localhost";
$username = "root";
$password = "";
$database_name = "deafphp";

$db = mysqli_connect($hotsname, $username, $password, $database_name);

if ($db->connect_error) {
    echo "Koneksi db rusak";
    die("dbOff!!");
}
