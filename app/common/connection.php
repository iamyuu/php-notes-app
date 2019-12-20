<?php

ini_set('mysql.connect_timeout', 300);
ini_set('default_socket_timeout', 300);

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'secret';
$DB_NAME = 'notes';
$DB_OPTIONS = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

$db = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS, $DB_OPTIONS);
