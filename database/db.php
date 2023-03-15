<?php

require 'config.php';

$conn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
	$pdo = new PDO($conn, $user, $password);

	// if ($pdo) {
	// 	echo "Connected to the $db database successfully!";
	// }
} catch (PDOException $e) {
	echo $e->getMessage();
}