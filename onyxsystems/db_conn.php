<?php
session_start(); 

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "db_oss";

$conn = mysqli_connect($sname, $unmae, $password, $db_name,3306);

if (!$conn) {
	echo "Connection failed!";
}