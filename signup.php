<?php
include("db.php"); // This file should contain your pg_connect() logic

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = pg_escape_string($_POST['first_name']);
    $last_name = pg_escape_string($_POST['last_name']);
    $email = pg_escape_string($_POST['email']);
    $phone = pg_escape_string($_POST['phone']);
    $username = pg_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Secure password hash

    $query = "INSERT INTO users (first_name, last_name, email, phone, username, password)
              VALUES ('$first_name', '$last_name', '$email', '$phone', '$username', '$password')";

    $result = pg_query($conn, $query);

    if ($result) {
        echo "<script>alert('Sign up successful!'); window.location.href = 'access.php';</script>";
    } else {
        echo "<script>alert('Error during sign up: " . pg_last_error($conn) . "'); window.history.back();</script>";
    }
}
?>
