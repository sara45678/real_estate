<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$servername = 'localhost';
$username = 'root';
$password = '';
$db_name='estatefind' ;
header("content-type: application/json ; charset=utf-8");
// Create connection
$mysqli = new mysqli($servername, $username, $password,$db_name,4175);




?>