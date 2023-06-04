<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "projedatabase";

$connection = mysqli_connect($hostname, $username, $password, $dbname);

if (!$connection) {
    die('connection failed' . mysqli_connect_error());
}
