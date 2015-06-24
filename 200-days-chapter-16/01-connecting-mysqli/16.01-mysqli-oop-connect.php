<?php # Script 16.1 - mysqli_oop_connect.php
// This file contains the database access information. 
// This file also establishes a connection to MySQL, 
// selects the database, and sets the encoding.
// The MySQL interactions use OOP!

/*
Aside: save this file outside of the htdocs dir

CREATE DATABASE temp;

CREATE USER 'admin'@'localhost' IDENTIFIED BY '***';

GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' IDENTIFIED BY '***' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;

FLUSH PRIVILEGES;

*/

// Set the database access information as constants:
DEFINE ('DB_USER', 'dar');
DEFINE ('DB_PASSWORD', 'dar');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'sitename');

/* Aside: the constructor also optionally takes port and socket */

// Make the connection:
$mysqli = new MySQLi(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Verify the connection:
if ($mysqli->connect_error) {
	echo $mysqli->connect_error;
	unset($mysqli);
} else { // Establish the encoding.
	$mysqli->set_charset('utf8');
}