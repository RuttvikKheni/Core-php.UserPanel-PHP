<?php


$HOST_NAME = "localhost";
$ROOT_NAME = "root";
$PASSWORD = "";
$DB_NAME = "bankingsystem";



$con = new PDO("mysql:host=$HOST_NAME;dbname=$DB_NAME", $ROOT_NAME, $PASSWORD);

$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
