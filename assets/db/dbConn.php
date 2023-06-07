<?php

$serverName = "localhost";
$DBUserName = "root";
$DBPass = "";
$DBName = "payrollsystem";

$conn = mysqli_connect($serverName, $DBUserName, $DBPass, $DBName);

if (!$conn){
	die("Connection failed: " .mysqli_connect_error());
}
