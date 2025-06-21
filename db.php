<?php
// db.php

$host = "13.48.136.91";
$port = "5432";
$dbname = "vkreddy_institute";
$user = "vk";
$password = "reddy";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Optional: You can print a success message
// echo "✅ Connected to PostgreSQL successfully!";
?>
