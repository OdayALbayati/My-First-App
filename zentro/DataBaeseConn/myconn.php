<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "test";

$link = mysqli_connect($host, $user, $password, $database);
if(!$link)
{
    echo 'Error '.  mysqli_connect_error();
}
